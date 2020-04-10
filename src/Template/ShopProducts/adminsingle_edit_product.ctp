<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductSubCategory[]|\Cake\Collection\CollectionInterface $productSubCategories
 */
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" xmlns=""></script>


<style>
    .material-switch > input[type="checkbox"] {
        display: none;
    }

    .material-switch > label {
        cursor: pointer;
        height: 0px;
        position: relative;
        width: 40px;
    }

    .material-switch > label::before {
        background: rgb(0, 0, 0);
        box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.5);
        border-radius: 8px;
        content: '';
        height: 16px;
        margin-top: -8px;
        position: absolute;
        opacity: 0.3;
        transition: all 0.4s ease-in-out;
        width: 40px;
    }

    .material-switch > label::after {
        background: rgb(255, 255, 255);
        border-radius: 16px;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
        content: '';
        height: 24px;
        left: -4px;
        margin-top: -8px;
        position: absolute;
        top: -4px;
        transition: all 0.3s ease-in-out;
        width: 24px;
    }

    .material-switch > input[type="checkbox"]:checked + label::before {
        background: inherit;
        opacity: 0.5;
    }

    .material-switch > input[type="checkbox"]:checked + label::after {
        background: inherit;
        left: 20px;
    }
</style>

<div class="right_col" role="main"> <!--class="right_col" role="main"-->
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit This Product</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <form action="<?php echo $this->Url->build('/', true) ?>ShopProducts/AdminUpdateShopProduct"
                              method="post"
                              class="form-horizontal form-label-left"
                              novalidate
                              enctype="multipart/form-data">

                            <span class="section">Product Information</span>

 
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product Name
                                    <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control "
                                           data-validate-length-range="1" name="product_name"
                                           placeholder="" required="required" type="text"
                                           value="<?php echo $shopProduct->product_name; ?>">
                                    <input type="hidden" name="products_id"
                                           value="<?php echo $shopProduct->products_id; ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product Code
                                    <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control "
                                           data-validate-length-range="1" name="product_sku"
                                           placeholder="" required="required" type="text"
                                           value="<?php echo $shopProduct->product_sku; ?>">
                                    
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Attribute
                                    Class
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select required="required" name="product_attribute_class_id"
                                            class="form-control col-md-7 col-xs-12">

                                        <?php foreach ($attributeClasses as $attributeClass) : ?>

                                            <?php
                                            $ProductClassId = $shopProduct->product_attribute_class_id;
                                            $classId = $attributeClass->attribute_class_id;

                                            if ($ProductClassId == $classId) :
                                            ?>
                                                <option selected="selected"
                                                        value="<?= $attributeClass->attribute_class_id ?>">
                                                    <?= $attributeClass->attribute_class_name ?>
                                                </option>

                                            <?php
                                            else :
                                            ?>
                                                <option value="<?= $attributeClass->attribute_class_id ?>">
                                                    <?= $attributeClass->attribute_class_name ?>
                                                </option>

                                            <?php
                                            endif;
                                            ?>

                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Arrival Date
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="product_arrival_date" required="required"
                                           class="form-control col-md-7 col-xs-12"
                                           value="<?php echo date_format($shopProduct->product_arrival_date, "Y-m-d"); ?>">


                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Categories
                                    <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <select required="required" name="product_category_id"
                                            class="form-control col-md-7 col-xs-12" id="appendCatId">

                                        <?php foreach ($productCategories as $productCategory) : ?>


                                            <?php
                                            $ProductCtId = $shopProduct->product_category_id;
                                            $catId = $productCategory->category_id;

                                            if ($ProductCtId == $catId) :
                                            ?>
                                                <option selected="selected"
                                                        value="<?= $productCategory->category_id ?>">
                                                    <?= $productCategory->category_name ?>
                                                </option>

                                            <?php
                                            else :
                                            ?>
                                                <option value="<?= $productCategory->category_id ?>">
                                                    <?= $productCategory->category_name ?>
                                                </option>

                                            <?php
                                            endif;
                                            ?>

                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Sub
                                    Categories
                                    <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <select required="required" name="product_sub_category_id"
                                            class="form-control col-md-7 col-xs-12"
                                            id="appendSubCatId">


                                        <?php foreach ($productSubCategories as $productSubCategory) : ?>


                                            <?php
                                            $prosubCtId = $shopProduct->product_sub_category_id;

                                            $SubcatId = $productSubCategory->sub_category_id;

                                            if ($prosubCtId == $SubcatId) :
                                            ?>

                                                <option selected="selected"
                                                        value="<?= $productSubCategory->sub_category_id ?>">
                                                    <?= $productSubCategory->sub_category_name ?>
                                                </option>

                                            <?php
                                            else :
                                            ?>

                                                <option value="<?= $productSubCategory->sub_category_id ?>">
                                                    <?= $productSubCategory->sub_category_name ?>
                                                </option>


                                            <?php
                                            endif;
                                            ?>


                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Brand
                                    <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <select required="required" name="product_brand_id"
                                            class="form-control col-md-7 col-xs-12"
                                            id="appendBrndId">

                                        <?php foreach ($productBrands as $productBrand) : ?>

                                            <?php
                                            $prosubCtId = $shopProduct->product_brand_id;

                                            $SubcatId = $productBrand->brand_name;

                                            if ($prosubCtId == $SubcatId) :
                                            ?>

                                                <option selected="selected"
                                                        value="<?= $productBrand->brand_id ?>">
                                                    <?= $productBrand->brand_name ?>
                                                </option>

                                            <?php
                                            else :
                                            ?>

                                                <option value="<?= $productBrand->brand_id ?>">
                                                    <?= $productBrand->brand_name ?>
                                                </option>

                                            <?php
                                            endif;
                                            ?>

                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Short
                                    Description
                                    <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <textarea id="name" class="form-control" placeholder="Description About Product"
                                              required="required"
                                              name="product_short_description"><?php echo $shopProduct->product_short_description ?></textarea>
                                </div>
                            </div>





                           <!-- <div class="item form-group">
                               
                                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Product Detail <span
                                            class="required">*</span>
                               </label>
                               <div class="col-md-6 col-sm-6 col-xs-12">
                                   <input type="text" name="product_detail"
                                          required="required"
                                          class="form-control col-md-7 col-xs-12"
                                          value="."
                                   >
                               </div>
                           </div>


                           <div class="item form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Product Size & Fit <span
                                            class="required">*</span>
                               </label>
                               <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="product_size_fit"
                                          required="required"
                                           class="form-control col-md-7 col-xs-12"
                                           value="."
                                    >
                                </div>
                            </div>  -->

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Price <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="number" name="product_unit_sale_price"
                                           required="required"
                                           data-validate-minmax="" class="form-control col-md-7 col-xs-12"
                                           value="<?php echo $shopProduct->product_unit_sale_price; ?>"
                                    >
                                </div>
                            </div>

                            <!-- <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">New Arrival
                                    <span>*</span>
                                </label>
                                <div class="material-switch">

                                    <?php

                                    if (empty($productMetaNewResize->product_meta_field_value)) :
                                    ?>
                                        <input id="someSwitchOptionSuccess" class="newArivalTrue"
                                               name="product_meta_arrival_name"
                                               value="0" type="checkbox"/>

                                        <label for="someSwitchOptionSuccess" onclick="return ChangeMetaFieldNameTrue()"
                                               class="label-success"></label>
                                    <?php
                                    else :
                                    ?>
                                        <input id="someSwitchOptionSuccess" class="newArivalFalse"
                                               name="product_meta_arrival_name"
                                               value="1" type="checkbox" checked="checked"/>
                                        <label for="someSwitchOptionSuccess" class="label-success"
                                               onclick="return ChangeMetaFieldNameFalse()"></label>
                                    <?php
                                    endif;
                                    ?>

                                </div>
                            </div> -->


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button type="reset" class="btn btn-primary">Reset</button>
                                    <button id="send" type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="ln_solid"></div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product Image
                                    <span>*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <button type="button" data-toggle="modal" data-target="#imageModal"
                                            class="btn btn-success btn-xs">Add Picture
                                    </button>


                                    <button type="button" data-toggle="modal" data-target="#viewimageModal"
                                            class="btn btn-success btn-xs">View Picture
                                    </button>
                                    <!--<button type="button" data-toggle="modal" data-target="#viewresizeimageModal"-->
                                    <!--        class="btn btn-success btn-xs">View Resize Picture-->
                                    <!--</button>-->

                                    <input type="hidden" name="product_featured_image" id="mainImgNmId">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Related Product
                                    Image
                                    <span>*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <!--                                    <button type="button" data-toggle="modal" data-target="#mltiimageModal"-->
                                    <!--                                            class="btn btn-success btn-xs">Add Multiple Picture-->
                                    <!--                                    </button>-->
                                    <button type="button" data-toggle="modal" data-target="#viewMultiimageModal"
                                            class="btn btn-success btn-xs">View Related Image
                                    </button>

                                </div>
                            </div>


                            <br>
                            <br>


                        </form>
                        <?php
                        $message = $this->Flash->render('positive');
                        echo "<h1 class='text-center'>" . $message . "</h1>";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--<div class="container">-->
<!--    <div class="modal fade" id="mltiimageModal" role="dialog">-->
<!--        <div class="modal-dialog">-->
<!---->
<!---->
<!--            <div class="modal-content">-->
<!--                <div class="modal-header">-->
<!--                    <button type="button" class="close" data-dismiss="modal">&times;</button>-->
<!--                    <h4 class="modal-title">Add Multiple Related Image</h4>-->
<!--                </div>-->
<!--                <form action="" id="" enctype="multipart/form-data">-->
<!--                    <div class="modal-body">-->
<!---->
<!--                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Choose Image Max Four-->
<!--                            <span-->
<!--                                    class="required">*</span>-->
<!--                        </label>-->
<!--                        <div class="col-md-6 col-sm-6 col-xs-12">-->
<!--                            <input type="file" id="mltImgFldId" class="form-control"-->
<!--                                   name="product_meta_field_value[]"-->
<!--                                   placeholder="" required="required" multiple>-->
<!--                        </div>-->
<!--                        <br><br><br>-->
<!---->
<!--                        <div class="modal-footer">-->
<!--                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
<!--                            <button type="reset" class="btn btn-primary">Reset</button>-->
<!--                            <button id="sendMultplImage" type="submit" class="btn btn-success">-->
<!--                                Submit-->
<!--                            </button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </form>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!---->
<!---->

<div class="container">
    <div class="modal fade" id="imageModal" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Resize This Image</h4>
                </div>
                <div class="form-group-image">
                    <form action="" method="post" enctype="multipart/form-data"
                          class="form-horizontal form-label-left input_mask_image">

                        <div class="modal-body">
                            <div class="form-group-image">

                                <?php echo $this->Html->image('productImage/' . $shopProduct->product_featured_image, ['alt' => '...', 'class' => 'img img-responsive', 'id' => 'ResizeMainImage']) ?>


                                <input type="hidden" id="products_id" name="products_id"
                                       value="<?php echo $shopProduct->products_id ?>">

                                <input type="hidden" name="product_featured_image" id="imageFileId"
                                       value="<?php echo $shopProduct->product_featured_image ?>">

                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="number" class="form-control has-feedback-left imageHightClass"
                                   placeholder="Image Hight" name="image_hight[]">
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="number" class="form-control imageWeightClass"
                                   placeholder="Image Weight" name="image_weight[]">
                            <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <a href="javascript:void(0);" class="add_button_image" title="Add field">
                            Add
                        </a>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="reset" class="btn btn-primary">Reset</button>
                    <button id="sendImage" type="submit" class="btn btn-success">
                        Submit
                    </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="modal fade" id="viewimageModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> Feature Image</h4>
                </div>
                <form id="mainImageFrmData" enctype="multipart/form-data">
                    <div class="form-group-image">


                        <?php echo $this->Html->image('productImage/' . $shopProduct->product_featured_image, ['alt' => '...', 'class' => 'img img-responsive', 'id' => 'viewMainImage']) ?>


                    </div>
                    <input type="hidden" id="products_id" name="products_id"
                           value="<?php echo $shopProduct->products_id ?>">

                    <div class="modal-footer">

                        <input type="file" id="mainImage" name="product_featured_image" accept="image/*">

                        <select id="deleteResizeImage">
                            <option value="0">Only Delete Feature Image</option>
                            <option value="1">Delete Feature Image With Resize Image</option>
                        </select>
                        <button type="submit" class="btn btn-danger btn-xs mainImageBtn">Update Image ?
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="modal fade" id="viewresizeimageModal" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Your Resize Image</h4>
                </div>
                <form id="resizeImage">
                    <div class="form-group-image">

                        <input type="hidden" name="products_id"
                               value="<?php echo $shopProduct->products_id; ?>">

                        <?php foreach ($productMetaResize as $image) : ?>


                            <?php echo $this->Html->image('productImage/' . $image->product_meta_field_value, ['alt' => '...', 'class' => 'img img-responsive viewResizeImage', 'id' => 'viewResizeImage']) ?>


                        <?php endforeach; ?>
                    </div>

                    <div class="modal-footer">

                        <button type="button"
                                class="btn btn-danger btn-xs removeResizeImg">Remove Picture
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="modal fade" id="viewMultiimageModal" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Related Product Image</h4>
                </div>

                <form action="<?php echo $this->Url->build('/', true) ?>ProductMetas/AdminUpdateMultiImageUpld" method="post"
                      enctype="multipart/form-data" id="relatedImage">

                    <div class="form-group-image">

                        <input type="hidden" name="products_id"
                               value="<?php echo $shopProduct->products_id; ?>">

                        <?php

                        $count = 1;

                        foreach ($productMeta as $image) :

                        ?>

                            <?php echo $this->Html->image('ProductRelated/' . $image->product_meta_field_value, ['alt' => '...', 'class' => 'img img-responsive', 'id' => 'viewMultimge']) ?>


                            <input type="checkbox" value="<?php echo $image->product_meta_field_value ?>"
                                   name="related_product_image[]">

                            <?php $va = $count++;

                            endforeach; ?>

                        <?php

                        if ($va < 4) {
                            ?>

                            <br><br>
                            <label class="control-label col-md-3 col-sm-3 col-xs-6"
                                   for="name">Choose <b style="color: red"><?php echo (4 - $va) ?> Image</b> Only
                                <span
                                        class="required">*</span>
                            </label>

                            <input type="file" class="form-control"
                                   name="product_meta_field_value[]" required="required" multiple accept="image/*">

                            <button type="submit" class="btn btn-success btn-xs">Submit Image
                            </button>

                            <?php

                        }

                        ?>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-xs rmvPrdImg">Remove Picture
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        var maxField = 50; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.form-group .input_mask'); //Input field wrapper

        var fieldHTML = '<div><div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback"><input type="text" class="form-control has-feedback-left" id="inputSuccess2"\n' +
            'placeholder="Product Name" name="product_meta_field_name[]"></div>' +
            '<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback"><input type="text" class="form-control" id="inputSuccess3"\n' +
            'placeholder="Product Description" name="product_meta_field_value[]">' +
            '<a href="javascript:void(0);" class="remove_button" title="Remove field">Remove</a></div></div>'; //New input field html


        var x = 1; //Initial field counter is 1
        $(addButton).click(function () { //Once add button is clicked
            if (x < maxField) { //Check maximum number of input fields
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); // Add field html
            }
        });
        $(wrapper).on('click', '.remove_button', function (e) { //Once remove button is clicked
            e.preventDefault();
            $(this).parent('div').parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function () {
        var maxField = 50; //Input fields increment limitation
        var addButton = $('.add_button_image'); //Add button selector
        var wrapper = $('.form-group-image .input_mask_image'); //Input field wrapper


        var fieldHTML = '<div><div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback"><input type="number" class="form-control has-feedback-left imageHightClass"\n' +
            'placeholder="Image Hight" required="" name="image_hight[]"></div>' +
            '<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback"><input type="number" class="form-control imageWeightClass"\n' +
            'placeholder="Image Weight" required="" name="image_weight[]">' +
            '<a href="javascript:void(0);" class="remove_button" title="Remove field">Remove</a></div></div>'; //New input field html


        var x = 1; //Initial field counter is 1
        $(addButton).click(function () { //Once add button is clicked
            if (x < maxField) { //Check maximum number of input fields
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); // Add field html
            }
        });
        $(wrapper).on('click', '.remove_button', function (e) { //Once remove button is clicked
            e.preventDefault();
            $(this).parent('div').parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });


</script>


<script>


    //$("#sendSubCat").on("click", function (e) {
    //
    //    e.preventDefault();
    //
    //    // alert("hello");
    //
    //    var file = document.getElementById("subImage").files[0];
    //
    //    var name = document.getElementById("subName").value;
    //
    //
    //    console.log(name);
    //
    //
    //    var form_data = new FormData(); // Creating object of FormData class
    //    form_data.append("sub_category_featured_image", file); // Appending parameter named file with properties of file_field to form_data
    //
    //    form_data.append("sub_category_name", name);// Adding extra parameters to form_data.
    //
    //
    //    $.ajax({
    //        type: "POST",
    //        data: form_data,
    //
    //        url: "<?php //echo $this->Url->build('/', true) ?>//" + "/ProductSubCategories/add"
    //
    //
    //        cache: false,
    //        contentType: false,
    //        processData: false,
    //
    //        success: function (data) {
    //
    //            console.log(data);
    //            $('#addSubCategories').modal('hide');
    //            $('#appendSubCatId').append('<option value="' + data['sub_category_id'] + '" selected="selected">' + data['sub_category_name'] + '</option>');
    //
    //        },
    //        dataType: "json"
    //    });
    //
    //    return false;
    //
    //});


    $("#sendImage").on("click", function (e) {  ////image

        e.preventDefault();


        var file = document.getElementById("imageFileId").value;

        var id = document.getElementById("products_id").value;

        var hightArray = [];

////////////////////////// each function

        $(".imageHightClass").each(function (i, j) {
                hightArray[i] = $(this).val();
            }
        );


        var weightArray = [];

        $(".imageWeightClass").each(function (i, j) {
                weightArray[i] = $(this).val();
            }
        );


        var form_data = new FormData(); // Creating object of FormData class
        form_data.append("product_meta_field_value", file); // Appending parameter named file with properties of file_field to form_data


        form_data.append("image_hight", hightArray);

        // Adding extra parameters to form_data.
        form_data.append("image_weight", weightArray);// Adding extra parameters to form_data.

        form_data.append("products_id", id);// Adding extra parameters to form_data.

        //
        $.ajax({
            type: "POST",
            // data: $("#subCatFrmID").serialize(),
            // new FormData(sendSubCat),
            data: form_data,

            url: "<?php echo $this->Url->build('/', true) ?>" + "/ProductMetas/AdminupdateAddedImage",
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data);

                location.reload();
            },
            dataType: "json"

            // mainImage
        });

    });


    //////////////////////////////////// Multiple Image Handeling /////////////////////

    //$("#sendMultplImage").on("click", function (e) {  ////image
    //
    //    e.preventDefault();
    //
    //
    //    // var file = document.getElementsByName("product_meta_field_value");
    //
    //
    //    //file = array();
    //
    //    var file = {};
    //    var form_data = new FormData();
    //    var id = document.getElementById("product_Id").value;
    //    for (i = 0; i < document.getElementById("mltImgFldId").files.length; i++) {
    //        file[i] = document.getElementById("mltImgFldId").files[i];
    //        form_data.append("product_meta_field_value[" + i + "]", file[i]);
    //
    //
    //        form_data.append("products_id", id);
    //    }
    //
    //
    //
    //    console.log(file);
    //
    //    console.log(form_data);
    //
    //    // Creating object of FormData class
    //
    //    // Appending parameter named file with properties of file_field to form_data
    //
    //
    //    $.ajax({
    //        type: "POST",
    //        data: form_data,
    //
    //
    //        url: "<?php //echo $this->Url->build('/', true) ?>//" + "/ProductMetas/multiImageUpld",
    //
    //
    //        cache: false,
    //        contentType: false,
    //        processData: false,
    //        success: function (data) {
    //            console.log(data);
    //
    //            $('#mltiimageModal').modal('hide');
    //
    //            // $('#mainImgNmId').val(data[0].mainImage);
    //
    //            // console.log($('#mainImgNmId').val());
    //        },
    //        dataType: "json"
    //
    //        // mainImage
    //    });
    //
    //
    //});


</script>


<script>

    $(".mainImageBtn").on("click", function (e) {
        e.preventDefault();

        var file = document.getElementById("mainImage").files[0];

        var id = document.getElementById("products_id").value;

        var select = document.getElementById("deleteResizeImage").value;

        var form_data = new FormData(); // Creating object of FormData class
        form_data.append("product_featured_image", file);

        form_data.append("products_id", id);

        form_data.append("select", select);


        $.ajax({


            url: "<?php echo $this->Url->build('/', true) ?>" + "ShopProducts/AdmindeleteMainImage",


            data: form_data,
            type: "post",
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data);

                $('#viewimageModal').modal('hide');

                $('#viewMainImage').attr('src', '/productImage/productImage/' + data['product_featured_image']);

                $('#ResizeMainImage').attr('src', '/productImage/productImage/' + data['product_featured_image']);


                location.reload();
            },
            dataType: "json"
        });
    });


</script>


<script>

    $(".rmvPrdImg").on("click", function (e) {
        e.preventDefault();

        $.ajax({

            url: "<?php echo $this->Url->build('/', true) ?>" + "ShopProducts/AdmindeleteRelatedImage",

            data: $("#relatedImage").serialize(),
            type: "post",

            success: function (data) {
                console.log(data);

                // $('#viewMultiimageModal').modal('hide');
                //
                // $('#viewMultimge').attr('src', '/productImage/ProductRelated/' + data['product_meta_field_value']);
                location.reload();

            },
            dataType: "json"
        });
    });
</script>


<script>
    $(".removeResizeImg").on("click", function (e) {  ////image

        e.preventDefault();

        $.ajax({

            url: "<?php echo $this->Url->build('/', true) ?>" + "ProductMetas/AdmindeleteResizeImage",

            data: $("#resizeImage").serialize(),
            type: "post",

            success: function (data) {
                console.log(data);

                location.reload();

                // $('#viewresizeimageModal').modal('hide');
                //
                // $('#viewResizeImage').attr('src', '/productImage/' + data['product_meta_field_value']);

            },
            dataType: "json"
        });

    });
</script>


<script>

    // function ChangeMetaFieldNameFalse() {


    //     var productId = <?php echo $shopProduct->products_id; ?>;


    //     $.ajax({

    //         url: "<?php echo $this->Url->build('/', true) ?>" + "/ProductMetas/updateNewArivalFalse",

    //         data: {productId: productId},
    //         type: "post",

    //         success: function (data) {
    //             console.log(data);


    //             $('.newArivalTrue').attr('value' + data['product_meta_field_value']);

    //         },
    //         dataType: "json"
    //     });

    // }

    // function ChangeMetaFieldNameTrue() {

    //     var productId = <?php echo $shopProduct->products_id; ?>;

    //     $.ajax({

    //         url: "<?php echo $this->Url->build('/', true) ?>" + "/ProductMetas/updateNewArivalTrue",

    //         data: {productId: productId},
    //         type: "post",

    //         success: function (data) {
    //             console.log(data);


    //             $('.newArivalFalse').attr('value' + data['product_meta_field_value']);

    //         },
    //         dataType: "json"
    //     });
    // }

</script>


<?= $this->Html->css('vendors/bootstrap/dist/css/bootstrap.min.css') ?>
<?= $this->Html->css('vendors/font-awesome/css/font-awesome.min.css') ?>
<?= $this->Html->css('vendors/nprogress/nprogress.css') ?>
<?= $this->Html->css('template/build/css/custom.min.css') ?>



<?= $this->Html->script('vendors/jquery/dist/jquery.min.js') ?>
<?= $this->Html->script('vendors/bootstrap/dist/js/bootstrap.min.js') ?>
<?= $this->Html->script('vendors/fastclick/lib/fastclick.js') ?>
<?= $this->Html->script('vendors/nprogress/nprogress.js') ?>
<?= $this->Html->script('vendors/validator/validator.js') ?>


<!--<script>-->
<!--    function delete_main_image(id) {-->
<!--        m = confirm("Are you sure you want to delete this Image?");-->
<!--        if (m == true) {-->
<!--            $.post('/ShopProducts/deleteMainImage', {products_id: id}, // Set your ajax file path-->
<!--                function (data) {-->
<!--                    $('#yourDataContainer').html(data); // You can Use .load too-->
<!--                });-->
<!--        } else {-->
<!--            return false;-->
<!--        }-->
<!--    }-->
<!--</script>-->
