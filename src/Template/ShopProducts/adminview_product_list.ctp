<div class="right_col" role="main"> <!--class="right_col" role="main"-->
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>View Full Product List</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>All Product Information
                            <small>KlubHaus</small>
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <p class="text-muted font-13 m-b-30">
                            <form action="<?= $this->Url->build('/shop-products/adminview-product-search-list', true) ?>" id='searchProductForm'>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Select Category</label>
                                            <select class="form-control" name="category" id="category">
                                                <option value="">Choose One</option>
                                                <?php foreach ($productCategories as $category) : ?>
                                                <option value="<?php echo $category->category_id ?>" <?php if(isset($_GET['category'])){ echo ($_GET['category'] == $category->category_id) ? 'selected' : ''; } ?>>
                                                    <?php echo $category->category_name ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Select Sub-Category</label>
                                            <select class="form-control" name="subcategory" id="subcategory">
                                                <option value="">Choose Category First</option>
                                                <?php foreach ($productSubCategories as $subcategory) : ?>
                                                <option value="<?php echo $subcategory->sub_category_id ?>" <?php if(isset($_GET['subcategory'])){ echo ($_GET['subcategory'] == $subcategory->sub_category_id) ? 'selected' : ''; } ?>>
                                                    <?php echo $subcategory->sub_category_name ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Enter Product name</label>
                                            <input class="form-control" type="text" id="product" name="product" value="<?php echo isset($_GET['product']) ? $_GET['product'] : '' ?>" />
                                        </div>

                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <br>
                                            <button style="margin-top: 5px;" type="submit" class="btn btn-success">Search
                                            </button>
                                            <a style="margin-top: 5px;" class="btn btn-warning" href="<?= $this->Url->build('/shop-products/adminview-product-list', true) ?>">See All
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </p>

                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Product Name</th>
                                <th>Product Status</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Arrival Date</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            if (isset($_GET['page'])) {
                                $count = $_GET['page'] * 10 + 1;
                            } else {
                                $count = 1;
                            }


                            foreach ($shopProduct

                                     as $information) {
                                ?>

                                <tr>
                                    <td><?php

                                        echo $count++;


                                        ?></td>
                                    <td><?php echo $information->product_name ?></td>

                                    <td>
                                        <?php
                                        $status = $information->product_sale_status;

                                        if ($status) :
                                            ?>


                                            <?php echo $this->Html->link('<i class="fa fa-check"></i> Published', ['controller' => 'ShopProducts', 'action' => 'AdminproductSaleStatusNotPublish', $information->products_id], ['class' => 'label label-success', 'escape' => false]) ?>


                                        <?php
                                        else :
                                            ?>

                                            <?php echo $this->Html->link('<i class="fa fa-times"></i> Not Published', ['controller' => 'ShopProducts', 'action' => 'AdminproductSaleStatusPublish', $information->products_id], ['class' => 'label label-danger', 'escape' => false]) ?>


                                        <?php
                                        endif;
                                        ?>

                                    </td>
                                    <td><?php echo $information->product_unit_sale_price ?></td>
                                    <td><?php echo $information->product_stock ?></td>
                                    <td><?php echo $information->product_arrival_date ?></td>
                                    <td>

                                        <?php

                                        $forInstra = $information->product_unit_sale_price;

                                        if ($forInstra != 0) :
                                            ?>

                                            <?php echo $this->Html->link('<i class="fa fa-folder"></i> View', ['controller' => 'ShopProducts', 'action' => 'AdminsingleViewProduct', $information->products_id], ['class' => 'btn btn-primary btn-xs', 'escape' => false]) ?>


                                            <?php echo $this->Html->link('<i class="fa fa-repeat"></i> Edit', ['controller' => 'ShopProducts', 'action' => 'AdminsingleEditProduct', $information->products_id], ['class' => 'btn btn-info btn-xs', 'escape' => false]) ?>


                                            <?php echo $this->Html->link('<i class="fa fa-trash-o"></i> Delete', ['controller' => 'ShopProducts', 'action' => 'AdminsingleDeleteProduct', $information->products_id], ['class' => 'btn btn-danger btn-xs', 'onclick'=>'return checkDelete()', 'escape' => false]) ?>


                                            <?php echo $this->Html->link('<i class="fa fa-bolt"></i> Stock', ['controller' => 'ShopProducts', 'action' => 'AdminsingleStockProduct', $information->products_id], ['class' => 'btn btn-warning btn-xs', 'escape' => false]) ?>


                                        <?php
                                        else :
                                            ?>


                                            <?php echo $this->Html->image('InstaGram/' . $information->product_featured_image, ['alt' => '...', 'style' => 'height:50px; width:50px']) ?>

                                            <?php echo $this->Html->link('<i class="fa fa-trash-o"></i> Delete', ['controller' => 'ShopProducts', 'action' => 'AdminsingleDeleteProduct', $information->products_id], ['class' => 'btn btn-danger btn-xs' , 'onclick'=>'return checkDelete()', 'escape' => false]) ?>

                                        <?php
                                        endif;
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>

                        <div class="paginator">
                            <ul class="pagination">
                                <?= $this->Paginator->first('<< ' . __('first')) ?>
                                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                                <?= $this->Paginator->numbers() ?>
                                <?= $this->Paginator->next(__('next') . ' >') ?>
                                <?= $this->Paginator->last(__('last') . ' >>') ?>

                            </ul>
                            <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $this->start('script'); ?>
<script type="text/javascript">
    var url = "<?php echo $this->Url->build('/', true) ?>"; 
    
    $("#searchProductForm").on("change", '#category', function(e) {

        e.preventDefault();
        var categoriesId = $('#category').val();
        // alert(categoriesId);

        $.ajax({
            type: "POST",
            url: url+"ProductSubCategories/AdmingetSubCategoriesData",
            data: {categoriesId:categoriesId},
            dataType: "json",
            success: function(data) {
                console.log(data);
                var length = data.length;
                $('#subcategory').empty();
                $('#subcategory').append('<option value="">Choose one</option>');
                for (var i = 0; i < length; i++) {
                    $('#subcategory').append('<option value="' + data[i].sub_category_id + '">' + data[i].sub_category_name + '</option>');
                }
            },
            error: function() {
                console.log('error');
            },
        });
    });
</script>
<?php $this->end(); ?>