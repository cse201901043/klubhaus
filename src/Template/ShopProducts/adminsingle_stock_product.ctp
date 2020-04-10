<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" xmlns=""></script>

<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
</style>

<div class="right_col" role="main"> <!--class="right_col" role="main"-->
    <div class="">

        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Product Stock</h3>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="x_panel">
                    <div class="x_content">
                        <form action="<?php echo $this->Url->build('/', true) ?>ProductStocksDetails/Adminadd" method="post"
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
                                    <input id="" class="form-control"
                                           value="<?php echo $shopProduct->product_name ?>"
                                           data-validate-length-range="1"
                                           placeholder="" required="required" type="text" disabled="disabled">

                                    <input type="hidden" name="stocks_product_id"
                                           value="<?php echo $shopProduct->products_id ?>">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product Stock
                                    <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="" class="form-control"
                                           value="<?php echo $shopProduct->product_stock ?>"
                                           data-validate-length-range="1"
                                           placeholder="" required="required" type="text" disabled="disabled">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Attribute Class
                                    <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control"
                                           value="<?php echo $shopProduct->attribute_class->attribute_class_name ?>"
                                           data-validate-length-range="1" name=""
                                           placeholder="" required="required" type="text" disabled="disabled"
                                    >
                                    <input type="hidden"
                                           value="<?php echo $shopProduct->attribute_class->attribute_class_id ?>"
                                           name="stocks_attribute_class_id">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Attribute Settings
                                    <span>*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">


                                    <?php

                                    foreach ($data as $information) : ?>
                                        <br>
                                        <select required="required" name="stocks_attribute_field_id[]"
                                                class="form-control">
                                                <option value="0">
                                                    Choose Information
                                                </option>

                                            <?php foreach ($information as $info) : ?>
                                                <option value="<?php echo $info['attribute_field_id'] ?>">
                                                    <?php echo $info['attribute_field_value'] ?>
                                                </option>


                                            <?php endforeach; ?>
                                        </select>

                                        <input type="hidden" class="form-control"
                                               value="<?php echo $info['attribute_type_id'] ?>"
                                               name="stocks_attribute_type_id[]" required="required">

                                        <br>
                                    <?php endforeach; ?>

                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product Stock Value
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" class="form-control stockVal"
                                           placeholder="Stock Value" name="product_attribute_stock">
                                </div>
                            </div>

                            <br>
                            <br>
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


            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="page-title">
                    <div class="title_left">
                        <h3>This Product Previous Stock</h3>
                    </div>
                </div>
                <div class="x_panel">

                    <div class="x_content">
                        <p class="text-muted font-13 m-b-30">
                        </p>

                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Attribute Value</th>
                                <th>Attribute Type</th>
                                <th>Product Stock</th>
                                <!--  <th>Action</th>-->

                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            $count = 1;
                            foreach ($productStocksDetail as $information) {

                                ?>

                                <tr>
                                    <td><?php echo $count++ ?></td>
                                    <td><?php echo $information['attribute_field_value'] ?></td>
                                    <td><?php echo $information['attribute_type_name'] ?></td>
                                    <td><?php echo $information['product_attribute_stock'] ?></td>
                                    <!--                                    <td><a href="#" class="btn btn-info btn-xs" onclick="editAttribute()"><i-->
                                    <!--                                                    class="fa fa-repeat"></i>Edit </a></td>-->

                                    <!--  <td><?php echo $this->Html->link('<i class="fa fa-repeat"></i> Edit', ['controller' => 'ShopProducts', 'action' => 'SingleStockProductEditView', $shopProduct->products_id], ['class' => 'btn btn-info btn-xs', 'escape' => false]) ?></td>-->

                                </tr>


                                <?php

                            }
                            ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>

    </div>
</div>




