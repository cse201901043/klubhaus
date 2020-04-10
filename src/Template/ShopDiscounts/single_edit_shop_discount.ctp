<div>
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Add Shop Discount</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <form class="form-horizontal form-label-left" novalidate enctype="multipart/form-data"
                              action="<?php echo $this->Url->build('/', true) ?>ShopDiscounts/editShopDiscountData" method="post">
                            <span class="section">Add Information</span>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Name
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control"
                                           name="shop_discount_name" value="<?php echo $shopDiscount->shop_discount_name ?>"
                                           placeholder="" required="required" type="text">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Code
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control"
                                           name="shop_discount_code" value="<?php echo $shopDiscount->shop_discount_code ?>"
                                           placeholder="" type="text">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Rate
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control"
                                           name="shop_discount_rate" value="<?php echo $shopDiscount->shop_discount_rate ?>"
                                           placeholder="" type="text">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> From
                                    <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input class="form-control"
                                           name="shop_discount_from" value="<?php echo date_format($shopDiscount->shop_discount_from,"Y-m-d") ?>"
                                           placeholder="" type="text">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> To
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input class="form-control"
                                           name="shop_discount_to" value="<?php echo date_format($shopDiscount->shop_discount_to,"Y-m-d") ?>"
                                           placeholder="" type="text">
                                </div>
                            </div>
                            <input type="hidden" value="<?php echo $shopDiscount->shop_discount_id?>" name="shop_discount_id" >
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button type="reset" class="btn btn-primary">Reset</button>
                                    <button id="send" type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
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
<?= $this->Html->script('vendors/jquery/dist/jquery.min.js') ?>
<?= $this->Html->script('vendors/bootstrap/dist/js/bootstrap.min.js') ?>
<?= $this->Html->script('vendors/fastclick/lib/fastclick.js') ?>
<?= $this->Html->script('vendors/nprogress/nprogress.js') ?>
<?= $this->Html->script('vendors/validator/validator.js') ?>
<?= $this->Html->css('vendors/font-awesome/css/font-awesome.min.css') ?>
<?= $this->Html->css('vendors/nprogress/nprogress.css') ?>
<?= $this->Html->css('vendors/css/custom.min.css') ?>


