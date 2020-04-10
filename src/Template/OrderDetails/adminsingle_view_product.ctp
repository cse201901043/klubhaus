<div class="right_col" role="main"> <!--class="right_col" role="main"-->
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>View Selected Order List</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Selected Order Information
                            <small>KlubHaus</small>
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <p class="text-muted font-13 m-b-30">
                        </p>

                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Product Name</th>
                                <th>Product Image</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Total Price</th>


                            </tr>
                            </thead>
                            <tbody>

                            <?php

                            ////
                            //                                    print_r($orderDetail);
                            //                                    die();
                            $count = 1;

                            foreach ($orderDetail as $information) {

//
                                ?>

                                <tr>
                                    <td><?php echo $count++ ?></td>
                                    <td><?php echo $information->order_product_name ?></td>

                                    <td><?php echo $this->Html->image('productImage/' . $information->order_product_image, ['alt' => '...', 'style' => 'height:100px; width:100px']) ?></td>


                                    <td><?php echo $information->order_product_quantity ?></td>
                                    <td><?php echo $information->order_product_unit_price ?></td>
                                    <td><?php echo $information->order_product_total_price ?></td>
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