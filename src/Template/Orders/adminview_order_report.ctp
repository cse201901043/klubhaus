<div class="right_col" role="main"> <!--class="right_col" role="main"-->

    <div class="page-title">
        <div class="title_left">
            <h3>Sells Report</h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <form action="<?php echo $this->Url->build('/', true) ?>Orders/AdminviewOrderReport" method="post"
                          class="form-horizontal form-label-left"
                          novalidate>

                        <span class="section"></span>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Product Name
                                <span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control col-md-7 col-xs-12" name="product_id">
                            <option>Choose One</option>
                                <?php

                                foreach ($allProduct as $information): ?>

                                    
                                        

                                        <option value="<?php echo $information['products_id'] ?>">
                                            <?php echo $information['product_name'] ?>
                                        </option>

                                    

                                <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">To
                                <span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">


                                <input type="date" required="required" name="to_date"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">From
                                <span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">


                                <input type="date" required="required" name="from_date"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button id="send" type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
                        <h2>View All Information
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
                                <th>Date</th>
                                <th>Product Name</th>
                                <th>Total Sell</th>
                                <th>Total Money</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <?php

                                $count = 1;

                                foreach ($orderProduct

                                as $key => $information) {
                                ?>
                                <td><?php echo $count++ ?></td>
                                <td><?php echo $information['created_at']; ?></td>
                                <td><?php echo $information['order_product_name']; ?></td>
                                <td><?php echo $information['order_product_quantity']; ?></td>
                                <td><?php echo $information['order_product_unit_price']; ?></td>


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

