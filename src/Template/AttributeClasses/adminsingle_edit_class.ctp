<div> <!--class="right_col" role="main"-->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit This Attribute Class</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <form class="form-horizontal form-label-left" novalidate
                              action="<?php echo $this->Url->build('/', true) ?>AttributeClasses/AdminsingleEditClassData" method="post">
                            <span class="section">Edit Attribute Class Information</span>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Attribute Class Name
                                    <span
                                        class="required">*</span>
                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control "
                                           data-validate-length-range="1" data-validate-words="0"
                                           name="attribute_class_name" value="<?php echo $attributeClasses->attribute_class_name; ?>"
                                           placeholder="" required="required" type="text">
                                </div>

                                <input type="hidden" name="attribute_class_id"
                                       value="<?php echo $attributeClasses->attribute_class_id; ?>">
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button type="reset" class="btn btn-primary">Reset</button>
                                    <button id="send" type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
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


