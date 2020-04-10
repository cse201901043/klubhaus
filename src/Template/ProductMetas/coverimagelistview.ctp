<div class="right_col" role="main"> <!--class="right_col" role="main"-->
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>View Full Slider List List</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>All Slider Image Information
                            <small>KlubHaus</small> 
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <p class="text-muted font-13 m-b-30">
                        </p>
                        <?php
                            foreach ($productSliderImage as $information) {
                                echo $information->product_meta_field_value;
                            }
                        ?>

                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Slider Title</th>
                                <th>Slider Image Desktop</th>
                                <th>Slider Image Mobile</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            // if(isset( $_GET['page'])){
                            //     $count = $_GET['page']*10+1;
                            // }else{
                                $count = 1;
                                $num = 1;
                            // }
                            foreach ($productSliderImage as $information) {
                                if(count($information->product_metas) > 0){
                                ?>

                                <tr>
                                    <td><?php echo $count++ ?></td>
                                <?php
                                    $i = 0;
                                    foreach ($information->product_metas as $meta) {
                                        if($i>0){
                                ?>

                                <td>  <?php echo $this->Html->image('Slider/' . $meta->product_meta_field_value, ['alt' => '...', 'style' => 'height:50px; width:50px']) ?></td>

                                <?php
                                        } else{
                                ?>
                                <td><?php echo $meta->product_meta_field_value; ?></td>
                                <?php
                                        }
                                        $i++;
                                    }
                                ?>
                                          
                                    <td>
                                        
                                    <input type="button" value="Edit" data-id = '<?php echo $information->products_id ?>' data-toggle="modal" data-target="#coverImageModel"
                                            class="btn btn-success btn-xs metaId">
                                            
                                    <input type="button" value="Color" data-id = '<?php echo $information->products_id ?>' data-toggle="modal" data-target="#coverImageModelColor"
                                            class="btn btn-success btn-xs metaIdColor">
                                       
                                        <?php echo $this->Html->link('<i class="fa fa-trash-o"></i> Delete', ['controller' => 'ProductMetas', 'action' => 'deleteSlider', $information->products_id], ['class' => 'btn btn-danger btn-xs','onclick'=>'return checkDelete()', 'escape' => false]) ?>
                            
                                    </td>
                                </tr>
                                <?php
                                    }
                                }
                            ?>
                            </tbody>
                        </table>

                        <!-- <div class="paginator">
                            <ul class="pagination">
                                <?= $this->Paginator->first('<< ' . __('first')) ?>
                                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                                <?= $this->Paginator->numbers() ?>
                                <?= $this->Paginator->next(__('next') . ' >') ?>
                                <?= $this->Paginator->last(__('last') . ' >>') ?>
                            </ul>
                            <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
                        </div> -->
                    </div>
                </div>
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
                <form id="formData">
                    <div class="modal-body">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Title<span
                                    class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="appendTitle" class="form-control" name="product_meta_field_title"
                                   placeholder="" required="required" type="text">
                        </div>
                        <br><br>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Choose Color<span
                                    class="required">*</span>
                        </label>
                        
                        <input type="hidden" id="appendMetaId" name="product_meta_id">
                        <br><br><br>
                        
                    </div>

                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="reset" class="btn btn-primary">Reset</button>
                        <button id="sendSliderTitle" class="btn btn-success imgBtn">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>








<div class="container">
    <div class="modal fade" id="coverImageModelColor" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Slider Image</h4>
                </div>
                <form id="formDataColor">
                    <div class="modal-body">

                        <br><br>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Choose Color<span
                                    class="required">*</span>
                        </label>
                        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="" class="form-control" name="product_meta_field_title_color"
                                     type="color">
                        </div>
                        <br><br>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Update This Color<span
                                    class="required">*</span>
                        </label>
                        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="" name="product_meta_color_update" value = "update"
                                     type="checkbox"> Yes
                        </div>
                        
                        <input type="hidden" id="appendMetaIdColor" name="product_meta_id">
                        
                        <input type="hidden" id="appendMetaProductId" name="meta_product_id">
                        <br><br><br>
                        
                    </div>

                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="reset" class="btn btn-primary">Reset</button>
                        <button id="sendSliderTitleColor" class="btn btn-success imgBtn">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>









<script>
    $("#sendSliderTitle").on("click", function (e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        data: $("#formData").serialize(),
        url: "<?php echo $this->Url->build('/', true) ?>" + "ProductMetas/editSliderTitle",
        success: function (data) {
        // console.log(data);
        location.reload(data);
    },
    dataType: "json"
    });

});




$("#sendSliderTitleColor").on("click", function (e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        data: $("#formDataColor").serialize(),
        url: "<?php echo $this->Url->build('/', true) ?>" + "ProductMetas/editSliderTitleColor",
        success: function (data) {
        // console.log(data);
        location.reload(data);
    },
    dataType: "json"
    });
});




    $('.metaId').click(function () {
        console.log($(this).data('id')) // sanity check
        $.ajax({
            type: "POST", // http method
            data: {SliderTitleid: $(this).data('id')}, // data sent with the post request
            url: "<?php echo $this->Url->build('/', true) ?>" + "ProductMetas/getSliderTitle", // the endpoint
            dataType: 'json',
            success: function (json) {
                // console.log(json);
                $('#appendTitle').val(json.product_meta_field_value);
                $('#appendMetaId').val(json.product_meta_id);
                $('#appendMetaIdColor').val(json.product_meta_id);
                
                $('#appendMetaProductId').val(json.meta_product_id);
                
            },
        });
    });
    
    
    $('.metaIdColor').click(function () {
        console.log($(this).data('id')) // sanity check
        $.ajax({
            type: "POST", // http method
            data: {SliderTitleid: $(this).data('id')}, // data sent with the post request
            url: "<?php echo $this->Url->build('/', true) ?>" + "ProductMetas/getSliderTitleColor", // the endpoint
            dataType: 'json',
            success: function (json) {
                console.log(json);
                
                
            },
        });
    });



</script>