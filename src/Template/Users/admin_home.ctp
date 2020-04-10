<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row tile_count">
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Users</span>

            <?php
            $count = 0;
            foreach ($user as $information) {
                $count_user = $information->user_type;

                if (isset($count_user)) {
                    $count++;
                }
            }
            ?>


            <div class="count"><?php echo $count++ ?></div>
            <span class="count_bottom"><i class="green"><i
                        class="fa fa-sort-asc"></i></i>Register Users</span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-clock-o"></i> Total Guest Users</span>

            <?php
            $counts = 0;
            foreach ($guest as $information) {
                $count_guest = $information->user_type;

                if (isset($count_guest)) {
                    $counts++;
                }
            }
            ?>


            <div class="count"><?php echo $counts++ ?></div>
            <span class="count_bottom"><i class="green"><i
                        class="fa fa-sort-asc"></i></i> Visitor</span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Sell</span>

            <?php
            $total = 0;
            foreach ($totalSells as $information) {
                $count_sells = $information->order_product_total_price;


//                print_r($count_sells);
//
////                die();

                $total = $total + $count_sells;

            }
            ?>


            <div class="count green"><?php echo $total ?></div>
            <span class="count_bottom"><i class="green"><i
                        class="fa fa-sort-asc"></i></i> Total Sell</span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Publish Product</span>
            <?php
            $productCount = 0;
            foreach ($totalProduct as $information) {
                $countProduct = $information->product_unit_sale_price;

                if (isset($countProduct)) {
                    $productCount++;
                }
            }
            ?>

            <div class="count"><?php echo $productCount++ ?></div>
            <span class="count_bottom"><i class="green"><i
                        class="fa fa-sort-desc"></i> </i> Total Publish Product</span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Publish Instagram Product</span>

            <?php
            $productInsta = 0;
            foreach ($totalInstaProduct as $information) {
                $countProduct = $information->product_name;

//                print_r($countProduct);
//                die();

                if (isset($productInsta)) {
                    $productInsta++;
                }
            }
            ?>

            <div class="count"><?php echo $productInsta++ ?></div>
            <span class="count_bottom"><i class="green"><i
                        class="fa fa-sort-asc"></i></i>Instagram</span>
        </div>
        <!-- <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
            <div class="count">7,325</div>
            <span class="count_bottom"><i class="green"><i
                        class="fa fa-sort-asc"></i>34% </i> From last Week</span>
        </div> -->
    </div>
    <!-- /top tiles -->
</div>