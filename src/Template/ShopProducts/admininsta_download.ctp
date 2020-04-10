<div class="right_col" role="main">
    <div class="row">
        <form action="<?php echo $this->Url->build('/', true) ?>ShopProducts/AdmininstragramImageSave" id="fullData"
              method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Select Category</label>
                        <select required="required" name="product_category_id"
                                class="form-control categoriesId" id="appendCatId" onchange="get_SubCategories()">
                            <option>Choose One</option>
                            <?php foreach ($productCategories as $info): ?>
                                <option value="<?php echo $info->category_id ?>">
                                    <?php echo $info->category_name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Select Sub-Category</label>
                        <select required="required" name="product_sub_category_id"
                                class="form-control subCategories"
                                id="appendSubCatId">
                            <option>Choose One</option>
                            <?php foreach ($productSubCategories as $info): ?>
                                <option value="<?php echo $info->sub_category_id ?>">
                                    <?php echo $info->sub_category_name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product Name
                        <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-5 col-sm-6 col-xs-6">
                        <input id="name" class="form-control "
                               data-validate-length-range="1" name="product_name"
                               placeholder="" required="required" type="text">
                    </div>
                </div>


                <div class="col-md-12">
                    <button type="reset" class="btn btn-primary">Reset</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>

            <br><br><br>

            <!--            <button type="button" class="btn btn-success btn-xs dwnldImage">-->
            <!--                Download Picture-->
            <!--            </button>-->
            <!--            <div class="showImages"></div>-->


            <?php echo $this->Html->link('Download Picture', ['controller' => 'ShopProducts', 'action' => 'AdminretRiveImage'], ['class' => 'btn btn-success btn-xs', 'escape' => false]) ?>


            <br><br><br>

            <?php
            $files = glob(WWW_ROOT . "productImage/InstaDownload/*.*");


            for ($i = 0; $i < count($files); $i++) {
                $num = $files[$i];


                $data = explode("/", $num);

            //    echo "<pre>";
            //     print_r($data);
                
                // data[9] for my pc windows need $data[2] may be


                echo $this->Html->image("InstaDownload/" . $data[2], ['alt' => '...', 'style' => 'height:100px; width:150px; padding-right: 10px']);

                echo '<input type="radio" name="product_featured_image" value="' . $data[2] . '">';
            }
            ?>

        </form>
    </div>
</div>

<!---->
<!--<script type="text/javascript">-->
<!--    $(function () {-->
<!--        $('.main_container').on('click', '.dwnldImage', function () {-->
<!--            $.get('--><?php //echo $this->Url->build('/', true); ?><!--ShopProducts/retrive_image', function (data) {-->
<!--//                console.log(data);-->
<!--//                $.each(data, function (i, j) {-->
<!--//                    $('.showImages').append(-->
<!--//                        '<img src="--><?php ////echo $this->Url->build('/', true); ?><!--//productImage/InstaGram/' + j + '" style="width:150px; height: 100px; padding-right: 10px">' +-->
<!--//                        '<input type="radio" name="product_featured_image" value="' + j + '">'-->
<!--//                    )-->
<!--//                });-->
<!--//            }, 'json');-->
<!--//        });-->
<!--//   });-->
<!--////</script>-->

<?php
//
//function scrape_insta($username)
//{
//    $insta_source = file_get_contents('http://instagram.com/' . $username);
//    $shards = explode('window._sharedData = ', $insta_source);
//    $insta_json = explode(';</script>', $shards[1]);
//    $insta_array = json_decode($insta_json[0], TRUE);
//    return $insta_array;
//}
//
//$my_account = 'klubhausbd';
//
//$results_array = scrape_insta($my_account);
//
//echo "<pre>";
//
//
//$images = $results_array;
//
//
//for ($i = 0; $i < 2; $i++) {
//
//
//    $url = $images['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'][$i]['node']['display_url'];
//
//    $img = WWW_ROOT . 'productImage/InstaGram/';
//
//    $data = explode("/", $url);
//
//
//    $ch = curl_init($url);
//    $fp = fopen($img . $data[8], 'wb');
//    curl_setopt($ch, CURLOPT_FILE, $fp);
//    curl_setopt($ch, CURLOPT_HEADER, 0);
//    curl_exec($ch);
//    curl_close($ch);
//    fclose($fp);
//
//
////            $image_new_name = "instragram" . uniqid(mt_rand(10, 700)) . '.jpg';
////
////            rename($img . $data[8], $img . $image_new_name);
//
//
//}
//
//?>

<script>
    function get_SubCategories() {
        var categories_id = $('.categoriesId').val();

        //  console.log(categories_id);

        $.ajax({


            url: "<?php echo $this->Url->build('/', true) ?>" + "/ProductSubCategories/AdmingetSubCategoriesData",


            data: {'categoriesId': categories_id},
            type: "post",
            success: function (data) {

                // console.log(data);

                var length = data.length;
                $('.subCategories').empty();

                // $('.appendType').append('<option value="">Choose Attribute Type</option>');
                // '<option value="' + data[0].user.attribute_class_id + '" selected="selected">' + data[0].user.attribute_class_id + '</option>'
                for (var i = 0; i < length; i++) {
                    $('.subCategories').append('<option value="' + data[i]['sub_category_id'] + '">' + data[i]['sub_category_name'] + ' </option>');

                }
            },

            dataType: "json"
        });

    }
</script>