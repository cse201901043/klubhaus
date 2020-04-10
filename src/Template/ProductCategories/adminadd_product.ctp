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
                <h3>Add Your Product</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">

                        <form class="form-horizontal form-label-left"
                              novalidate enctype="multipart/form-data" id="finalSubmitData">
                            <!--                              onsubmit="validate(); validateMultipale();">-->

                            <span class=" section">Product Information</span>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product Name
                                    <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control "
                                           data-validate-length-range="1" name="product_name"
                                           placeholder="" required="required" type="text">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product Code
                                    <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control"
                                           name="product_sku"
                                           placeholder="" type="text">
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

                                        <option value="">Choose One</option>
                                        <?php foreach ($attributeClasses as $attributeClass) : ?>

                                            <option value="<?= $attributeClass->attribute_class_id ?>">
                                                <?= $attributeClass->attribute_class_name ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Arrival Date
                                    <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="date" id="number" name="product_arrival_date" required="required"
                                           data-validate-minmax="" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Categories
                                    <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <select required="required" name="product_category_id"
                                            class="form-control col-md-7 col-xs-12 categoriesId" id="appendCatId"
                                            onchange="get_SubCategories()">
                                        <option value="">Choose One</option>
                                        <?php foreach ($productCategories as $productCategory) : ?>

                                            <option value="<?= $productCategory->category_id ?>">
                                                <?= $productCategory->category_name ?>
                                            </option>

                                        <?php endforeach; ?>
                                    </select>
                                    <a href="#" class="btn btn-info btn-xs" data-toggle="modal"
                                       data-target="#addCategories"><i class="fa fa-pencil"></i> Add Categories
                                    </a>

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
                                            class="form-control col-md-7 col-xs-12 subCategories"
                                            id="appendSubCatId">
                                        <option value="">Choose Sub Categories</option>

                                        <?php foreach ($productSubCategories as $productSubCategory) : ?>

                                            <option value="<?= $productSubCategory->sub_category_id ?>">
                                                <?= $productSubCategory->sub_category_name ?>
                                            </option>

                                        <?php endforeach; ?>
                                    </select>

                                    <a href="#" class="btn btn-info btn-xs" data-toggle="modal"
                                       data-target="#addSubCategories"><i class="fa fa-pencil"></i> Add Sub
                                        Categories
                                    </a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Brand
                                    <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <select required name="product_brand_id"
                                            class="form-control col-md-7 col-xs-12"
                                            id="appendBrndId">
                                        <option value="">Choose Brand</option>
                                        <?php foreach ($productBrands as $productBrand) : ?>

                                            <option value="<?= $productBrand->brand_id ?>">
                                                <?= $productBrand->brand_name ?>
                                            </option>

                                        <?php endforeach; ?>
                                    </select>
                                    <a href="#" class="btn btn-info btn-xs" data-toggle="modal"
                                       data-target="#addBrand"><i class="fa fa-pencil"></i> Add Brand
                                    </a>
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
                                              required="required" name="product_short_description"></textarea>
                                    <a href="#" class="btn btn-info btn-xs" data-toggle="modal"
                                       data-target="#descriptionModel"><i class="fa fa-pencil"></i> Add More
                                        Description
                                    </a>
                                </div>
                            </div>


                            <input class="appendMetaId" type="hidden" name="product_des_meta_id">


                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Price <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="number" name="product_unit_sale_price"
                                           required="required"
                                           data-validate-minmax="" class="form-control col-md-7 col-xs-12"
                                    >
                                </div>
                            </div>


                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product Image
                                    <span>*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <button type="button" data-toggle="modal" data-target="#imageModal"
                                            class="btn btn-success btn-xs">Add Picture
                                    </button>

                                    <input type="hidden" name="product_featured_image" id="mainImgNmId">

                                    <!--<input type="hidden" name="meta_product_size_image_id" id="mainImgId">-->

                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Related Product
                                    Image
                                    <span>*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <button type="button" data-toggle="modal" data-target="#mltiimageModal"
                                            class="btn btn-success btn-xs">Add Multiple Picture
                                    </button>

                                    <input class="appendImageMeta" type="hidden" name="product_meta_image_id">

                                </div>
                            </div>


                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">New Arrival
                                    <span>*</span>
                                </label>
                                <div class="material-switch">
                                    <input id="someSwitchOptionSuccess" name="product_meta_arrival_name"
                                           value="new_arrival" type="checkbox"/>
                                    <label for="someSwitchOptionSuccess" class="label-success"></label>
                                </div>
                            </div>


                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Make It Cover Image
                                    <span>*</span>
                                </label>
                                <div class="material-switch">
                                    <input id="someSwitchOptionSuccess2" name="product_meta_cover_image" 
                                           value="cover_image" type="checkbox"/>
                                    <label for="someSwitchOptionSuccess2" class="label-success"></label>
                                </div>
                            </div>



                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Slide Image
                                <span>*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <button type="button" data-toggle="modal" data-target="#coverImageModel"
                                            class="btn btn-success btn-xs">Add A Slider Image
                                    </button>
                                    <!-- <input class="appendImageMeta" type="hidden" name="product_meta_image_id"> -->
                                </div>
                            </div>

                            <input id="appendImagename" type = "hidden" name="sliderImagename">
                            
                            <input id="appendImagenameMobo" type = "hidden" name="sliderImagenameMobo">
                            
                            <input id="appendTitle" type = "hidden" name="sliderTitle">



                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button id="send" class="btn btn-success imgBtnn">Submit</button>

                                    <!--                                    id="send"-->
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <!--                                          typeModel-->
    <div class="modal fade" id="addCategories" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Product Categories</h4>
                </div>

                <form method="post" id="categoryFomId">
                    <div class="modal-body">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product Categories Name
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="name" class="form-control" name="category_name"
                                   placeholder="Enter Categories Name" required="required" type="text">
                        </div>
                        <br><br><br>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="reset" class="btn btn-primary">Reset</button>
                            <button id="sendCategory" type="submit" class="btn btn-success">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="modal fade" id="addSubCategories" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Product Sub Categories</h4>
                </div>
                <form id="subCatFrmID" enctype="multipart/form-data">
                    <div class="modal-body">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Sub Category Name <span
                                    class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="subName" class="form-control" name="sub_category_name"
                                   placeholder="" required="required" type="text">
                        </div>
                        <br><br><br>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Choose An Image <span
                                    class="required">*</span>
                        </label>
                        
                        <div class="modal-body">
                            <input type="file" id="subImage" name="sub_category_featured_image" accept="image/*">
                        </div>
                    </div>
                    <br><br>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="reset" class="btn btn-primary">Reset</button>
                        <button id="sendSubCat" class="btn btn-success imgBtn">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>








<div class="container">
    <div class="modal fade" id="coverImageModel" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            
                
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Slider Image</h4>
                </div>
                <form id="" enctype="multipart/form-data">
                    <div class="modal-body">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Title<span
                                    class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="sliderTitle" class="form-control" name="product_meta_field_title"
                                   placeholder="" required="required" type="text">
                        </div>
                        <br><br><br>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Choose An Image (Desktop)<span
                                    class="required">*</span>
                        </label>
                        
                        <div class="modal-body">
                            <input type="file" id="sliderImage" name="product_meta_field_imageUrl" accept="image/*">
                        </div>
                        
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Choose An Image (Mobile)<span
                                    class="required">*</span>
                        </label>
                        
                        <div class="modal-body">
                            <input type="file" id="sliderImageMobo" name="product_meta_field_imageUrl_mobo" accept="image/*">
                        </div>
                       
                    </div>


                    <br><br>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="reset" class="btn btn-primary">Reset</button>
                        <button id="sendsliderImage" class="btn btn-success imgBtn">
                            Submit
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


















<div class="container">
    <div class="modal fade" id="addBrand" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Product Brand</h4>
                </div>
                <form action="" method="post" id="BrndFrmID">
                    <div class="modal-body">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product Brand Name
                            <span
                                    class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="name" class="form-control" name="brand_name"
                                   placeholder="" required="required" type="text">
                        </div>
                        <br><br><br>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="reset" class="btn btn-primary">Reset</button>
                            <button id="sendBrnd" type="submit" class="btn btn-success">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="modal fade" id="mltiimageModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Multiple Related Image</h4>
                </div>
                <form action="" id="" enctype="multipart/form-data">
                    <div class="modal-body">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Choose Image Max Four
                            <span
                                    class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file" id="mltImgFldId" class="form-control"
                                   name="product_meta_field_value[]" accept="image/*"
                                   placeholder="" required="required" multiple>
                        </div>
                        <br><br><br>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="reset" class="btn btn-primary">Reset</button>
                            <button onClick="return validateMultipaleImgLnt()"
                                    class="btn btn-success"> Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<div class="container">
    <div class="modal fade" id="descriptionModel" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Product Description</h4>
                </div>

                <div class="field_wrapper">
                    <div class="modal-body">
                        <div class="form-group">

                            <form id="metaFrmID" class="form-horizontal form-label-left input_mask">

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <input type="text" class="form-control has-feedback-left" id="inputSuccess2"
                                           placeholder="Product Name" value="product_detail" 
                                           name="product_meta_field_name[]"
                                           required="required">
                                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <input type="text" class="form-control" id="inputSuccess3"
                                           placeholder="Product Description" name="product_meta_field_value[]"
                                           required="required">
                                    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                </div>
                                <a href="javascript:void(0);" class="add_button" title="Add field">
                                    Add
                                </a>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="reset" class="btn btn-primary">Reset</button>
                    <button id="sendMeta" type="submit" class="btn btn-success">
                        Submit
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="modal fade" id="imageModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Choose An Image</h4>
                </div>
                <div class="form-group-image">
                    <form action="" method="post" enctype="multipart/form-data"
                          class="form-horizontal form-label-left input_mask_image">
                          <br>
            
                        <input type="file" required='required' id="imageFileId" name="product_meta_field_value"
                               accept="image/*">
                        <br><br>
                        
                        
                        <!--<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">-->
                        <!--    <input type="number" class="form-control has-feedback-left imageHightClass"-->
                        <!--           placeholder="Image Hight" value="50" name="image_hight[]">-->
                        <!--    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>-->
                        <!--</div>-->

                        <!--<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">-->
                        <!--    <input type="number" class="form-control imageWeightClass" value="50"-->
                        <!--           placeholder="Image Weight" name="image_weight[]">-->
                        <!--    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>-->
                        <!--</div>-->
                        <!--<a href="javascript:void(0);" class="add_button_image" title="Add field">-->
                        <!--    Add-->
                        <!--</a>-->

                    


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


<script type="text/javascript">


    $('.imgBtnn').on('click', function (e) {
        e.preventDefault();


        // console.log('ok');


        // function validate() {
        var inp = document.getElementById('imageFileId');

        var inp = document.getElementById('mltImgFldId');
        if (inp.files.length === 0) {
            alert("Image Required");
            inp.focus();
            return false;
        }

        // }


        // function validateMultipale() {


        else if (inp.files.length === 0) {
            alert("Multiple Image Field Required");
            inp.focus();
            return false;
        }
        else {


            $.ajax({
                type: "POST",
                data: $("#finalSubmitData").serialize(),


                url: "<?php echo $this->Url->build('/', true) ?>ShopProducts/Adminadd",

                success: function (data) {

                    location.reload(data);

                },
                dataType: "json"


            });


        }

        // }


    })


    function validateMultipaleImgLnt() {

        var inp = document.getElementById('mltImgFldId');

        console.log(inp.files.length);


        if (inp.files.length >= 5) {
            alert("Please Select Less Then 4 Image");
            inp.focus();
            return false;
        }
        else {

            var file = {};
            var form_data = new FormData();
            for (i = 0; i < document.getElementById("mltImgFldId").files.length; i++) {
                file[i] = document.getElementById("mltImgFldId").files[i];
                form_data.append("product_meta_field_value[" + i + "]", file[i]);

            }

            console.log(file);


            $.ajax({
                type: "POST",
                data: form_data,


                url: "<?php echo $this->Url->build('/', true) ?>" + "/ProductMetas/AdminMultiImageUpld",

                cache: false,
                contentType: false,
                processData: false,
                success: function (updatedData) {

                    // console.log(updatedData);

                    $('#mltiimageModal').modal('hide');

                    var length = updatedData.length;

                    // console.log(length);
                    var string = "";

                    for (var i = 0; i < length; i++) {
                        if (i > 0) {
                            string += ',';
                        }
                        string += updatedData[i]['product_meta_id'];

                    }
                    // console.log(string);
                    $('.appendImageMeta').val(string);

                },
                dataType: "json"

                // mainImage
            });

            return false;

        }
    }


</script>

<script type="text/javascript">
    $(document).ready(function () {
        var maxField = 2; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.form-group .input_mask'); //Input field wrapper

        var fieldHTML = '<div><div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback"><input type="text" value="product_size_fit" class="form-control has-feedback-left" id="inputSuccess2"\n' +
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
//     $(document).ready(function () {
//         var maxField = 50; //Input fields increment limitation
//         var addButton = $('.add_button_image'); //Add button selector
//         var wrapper = $('.form-group-image .input_mask_image'); //Input field wrapper


//         var fieldHTML = '<div><div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback"><input type="number" class="form-control has-feedback-left imageHightClass"\n' +
//             'placeholder="Image Hight" required="" name="image_hight[]"></div>' +
//             '<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback"><input type="number" class="form-control imageWeightClass"\n' +
//             'placeholder="Image Weight" required="" name="image_weight[]">' +
//             '<a href="javascript:void(0);" class="remove_button" title="Remove field">Remove</a></div></div>'; //New input field html


//         var x = 1; //Initial field counter is 1
//         $(addButton).click(function () { //Once add button is clicked
//             if (x < maxField) { //Check maximum number of input fields
//                 x++; //Increment field counter
//                 $(wrapper).append(fieldHTML); // Add field html
//             }
//         });
//         $(wrapper).on('click', '.remove_button', function (e) { //Once remove button is clicked
//             e.preventDefault();
//             $(this).parent('div').parent('div').remove(); //Remove field html
//             x--; //Decrement field counter
//         });
//     });


</script>


<script>
    $("#sendCategory").on("click", function (e) {

        e.preventDefault();

        // $("#registerSubmit").serialize();
        $.ajax({
            type: "POST",
            data: $("#categoryFomId").serialize(),

            url: "<?php echo $this->Url->build('/', true) ?>" + "ProductCategories/Adminadd",

            success: function (data) {

                console.log(data);
                $('#addCategories').modal('hide');
                $('#appendCatId').append('<option value="' + data['category_id'] + '" selected="selected">' + data['category_name'] + '</option>');
            },
            dataType: "json"
        });

    });


    $("#sendSubCat").on("click", function (e) {

        e.preventDefault();

        // alert("hello");


        var inp = document.getElementById('subImage');

        if (inp.files.length === 0) {
            alert("Image Field Required");
            inp.focus();
            return false;
        } else {

            var file = document.getElementById("subImage").files[0];

            var name = document.getElementById("subName").value;


            console.log(name);


            var form_data = new FormData(); // Creating object of FormData class
            form_data.append("sub_category_featured_image", file); // Appending parameter named file with properties of file_field to form_data

            form_data.append("sub_category_name", name);// Adding extra parameters to form_data.


            $.ajax({
                type: "POST",
                data: form_data,

                url: "<?php echo $this->Url->build('/', true) ?>" + "ProductSubCategories/Adminadd",

                cache: false,
                contentType: false,
                processData: false,

                success: function (data) {

                    console.log(data);
                    $('#addSubCategories').modal('hide');
                    $('#appendSubCatId').append('<option value="' + data['sub_category_id'] + '" selected="selected">' + data['sub_category_name'] + '</option>');

                },
                dataType: "json"
            });

            return false;

        }


    });




$("#sendImage").on("click", function (e) {  

        e.preventDefault();

        var file = document.getElementById("imageFileId").files[0];


        var form_data = new FormData(); // Creating object of FormData class
        form_data.append("product_meta_field_value", file); // Appending parameter named file with properties of file_field to form_data

        $.ajax({
            type: "POST",
            // data: $("#subCatFrmID").serialize(),
            // new FormData(sendSubCat),
            data: form_data,

            url: "<?php echo $this->Url->build('/', true) ?>" + "ProductMetas/Adminadd",


            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {

                console.log(data.product_meta_field_value);

                $('#imageModal').modal('hide');
                
                $('#mainImgNmId').val(data.product_meta_field_value);

            },
            dataType: "json"

            // mainImage
        });

    });





    $("#sendsliderImage").on("click", function (e) {

    e.preventDefault();

        // alert("hello");


    var inp = document.getElementById('sliderImage');
    
    var inpMobo = document.getElementById('sliderImageMobo');

    if (inp.files.length === 0) {
        alert("Image Field Required");
        inp.focus();
        return false;
    } else {

    var file = document.getElementById("sliderImage").files[0];
    
    var fileMobo = document.getElementById("sliderImageMobo").files[0];

    var name = document.getElementById("sliderTitle").value;


    // console.log(name);
    // console.log(file);


    var form_data = new FormData(); // Creating object of FormData class
    form_data.append("product_meta_field_imageUrl", file); // Appending parameter named file with properties of file_field to form_data

    form_data.append("product_meta_field_imageUrl_mobo", fileMobo);

    form_data.append("product_meta_field_title", name);// Adding extra parameters to form_data.


    $.ajax({
        type: "POST",
        data: form_data,

        url: "<?php echo $this->Url->build('/', true) ?>" + "/ProductMetas/addSliderImage",


        cache: false,
        contentType: false,
        processData: false,

        success: function (data) {

            console.log(data);

            $('#coverImageModel').modal('hide');

            $('#appendImagename').val(data.product_meta_field_value);
            $('#appendImagenameMobo').val(data.product_meta_field_value_Mobo);
            $('#appendTitle').val(data.product_meta_field_name);

        },
        dataType: "json"
    });

    return false;

}


});





    $("#sendBrnd").on("click", function (e) {

        e.preventDefault();

        $.ajax({
            type: "POST",
            data: $("#BrndFrmID").serialize(),


            url: "<?php echo $this->Url->build('/', true) ?>" + "ProductBrands/Adminadd",

            success: function (data) {

                console.log(data);
                $('#addBrand').modal('hide');
                $('#appendBrndId').append('<option value="' + data['brand_id'] + '" selected="selected">' + data['brand_name'] + '</option>');
            },
            dataType: "json"
        });

    });


    $("#sendMeta").on("click", function (e) {

        e.preventDefault();

        // $("#registerSubmit").serialize();
        $.ajax({
            type: "POST",
            data: $("#metaFrmID").serialize(),

            url: "<?php echo $this->Url->build('/', true) ?>" + "ProductMetas/AdminaddMetas",

            success: function (data) {

                console.log(data);
                $('#descriptionModel').modal('hide');
                // $('#appendBrndId').append('<option value="' + data['brand_id'] + '" selected="selected">' + data['brand_name'] + '</option>');


                var length = data.length;

                console.log(length);
                var string = "";

                for (var i = 0; i < length; i++) {
                    if (i > 0) {
                        string += ',';
                    }
                    string += data[i]['product_meta_id'];
                }
                console.log(string);
                $('.appendMetaId').val(string);

            }
            ,
            dataType: "json"
        })
        ;

    });


    // $("#sendImage").on("click", function (e) {  ////image

    //     e.preventDefault();

    //     var file = document.getElementById("imageFileId").files[0];

    //     var hightArray = [];

    //     ////////////////////////// each function

    //     $(".imageHightClass").each(function (i, j) {
    //             hightArray[i] = $(this).val();
    //         }
    //     );


    //     var weightArray = [];

    //     $(".imageWeightClass").each(function (i, j) {
    //             weightArray[i] = $(this).val();
    //         }
    //     );


    //     var form_data = new FormData(); // Creating object of FormData class
    //     form_data.append("product_meta_field_value", file); // Appending parameter named file with properties of file_field to form_data


    //     form_data.append("image_hight", hightArray);

    //     // Adding extra parameters to form_data.
    //     form_data.append("image_weight", weightArray);// Adding extra parameters to form_data.

    //     //
    //     $.ajax({
    //         type: "POST",
    //         // data: $("#subCatFrmID").serialize(),
    //         // new FormData(sendSubCat),
    //         data: form_data,

    //         url: "<?php echo $this->Url->build('/', true) ?>" + "ProductMetas/Adminadd",


    //         cache: false,
    //         contentType: false,
    //         processData: false,
    //         success: function (data) {

    //             console.log(data);

    //             $('#imageModal').modal('hide');

    //             $('#mainImgNmId').val(data[0].mainImage);

    //             var length = data.length;

    //             // console.log(length);

    //             var string_id = "";

    //             for (var i = 0; i < length; i++) {
    //                 if (i > 0) {
    //                     string_id += ',';
    //                 }
    //                 string_id += data[i]['product_meta_id'];
    //             }
    //             // console.log(string_id);

    //             $('#mainImgId').val(string_id);

    //         },
    //         dataType: "json"

    //         // mainImage
    //     });

    // });


    //////////////////////////////////////// Multiple Image Handeling /////////////////////
    //
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
    //    for (i = 0; i < document.getElementById("mltImgFldId").files.length; i++) {
    //        file[i] = document.getElementById("mltImgFldId").files[i];
    //        form_data.append("product_meta_field_value[" + i + "]", file[i]);
    //
    //    }
    //
    //    // console.log(file);
    //
    //
    //    $.ajax({
    //        type: "POST",
    //        data: form_data,
    //
    //
    //        url: "<?php //echo $this->Url->build('/', true) ?>//" + "/ProductMetas/multiImageUpld",
    //
    //        cache: false,
    //        contentType: false,
    //        processData: false,
    //        success: function (updatedData) {
    //
    //            // console.log(updatedData);
    //
    //            $('#mltiimageModal').modal('hide');
    //
    //            var length = updatedData.length;
    //
    //            // console.log(length);
    //            var string = "";
    //
    //            for (var i = 0; i < length; i++) {
    //                if (i > 0) {
    //                    string += ',';
    //                }
    //                string += updatedData[i]['product_meta_id'];
    //
    //            }
    //            // console.log(string);
    //            $('.appendImageMeta').val(string);
    //
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
    function get_SubCategories() {
        var categories_id = $('.categoriesId').val();

        //  console.log(categories_id);

        $.ajax({


            url: "<?php echo $this->Url->build('/', true) ?>" + "ProductSubCategories/AdmingetSubCategoriesData",


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


<?= $this->Html->css('vendors/bootstrap/dist/css/bootstrap.min.css') ?>
<?= $this->Html->css('vendors/font-awesome/css/font-awesome.min.css') ?>
<?= $this->Html->css('vendors/nprogress/nprogress.css') ?>
<?= $this->Html->css('template/build/css/custom.min.css') ?>



<?= $this->Html->script('vendors/jquery/dist/jquery.min.js') ?>
<?= $this->Html->script('vendors/bootstrap/dist/js/bootstrap.min.js') ?>
<?= $this->Html->script('vendors/fastclick/lib/fastclick.js') ?>
<?= $this->Html->script('vendors/nprogress/nprogress.js') ?>
<?= $this->Html->script('vendors/validator/validator.js') ?>
