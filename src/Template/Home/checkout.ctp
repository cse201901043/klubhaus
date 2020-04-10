<?php $this->start('css'); ?>
    <style>
        .address input[type=text] {
            margin-top: -10px;
            width: 50%;
            font-size: 12px;
            padding: 9px;
        }

        .address input#InfoPhone {
            margin-left: 9.5px;
        }

        .btn-link {
            color: #FDDC48;
            font-weight: 600;
        }

        .btn-link:hover,
        .btn-link:focus {
            color: #FDDC48;
            text-decoration: none;
        }

        a#change-phone,
        a#change-address {
            color: #FDDC48;
        }
        @media only screen and (max-width: 600px) {
            .address input[type=text] {
                width: 80%;
            }
        }
    </style>
<?php $this->end(); ?>

    <div class="container-fluid">
        <div class="text-center home-title">
            <h2>Checkout</h2>
        </div>
        <div class="row content">
            <div class="col-md-8 col-md-offset-2 checkout-content">
                <div class="step login">
                    <div class="top">
                        <div class="row">
                            <div class="col-md-10">
                                <h3><b>1. Your Email </b></h3>
                            </div>
                            <!--
                            <div class="col-md-2 text-right">
                                <button class="btn btn-lg <?php echo (!empty($Auth->user('id'))) ? "Closed" : "Open" ?>">Done</button>
                            </div>
                            -->
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <?php if (empty($Auth->user('id'))) { ?>
                        <div class="content">
                            <div class="row">
                                <div class="col-md-6">
                                    <form role="form" method="post" class="login-form-checkout">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input class="form-control login-control" type="email" name="email"
                                                       placeholder="Enter Email">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input class="form-control login-control" type="password"
                                                       name="password" placeholder="Enter Password">
                                            </div>
                                        </div>

                                        <p class="text-danger text-center text-bold Invalid-login-label"></p>

                                        <div class="form-group row">
                                            <div class="col-md-8">
                                                <label class="form-label text-left" for="logged">
                                                    <input type="checkbox" class="form-check-input" name="logged"
                                                           id="logged"> Keep me logged in.</label>
                                            </div>
                                            <!-- <div class="col-md-4">
                                                <a class="form-label text-right" data-toggle="modal" data-target = "#registration-modal"> Register Here</a>
                                            </div> -->
                                        </div>

                                        <div class="form-group">
                                            <p class="btn btn-lg btn-warning login-btn text-uppercase"><a href="#"
                                                                                                          class="reg-modal">Sign
                                                    up</a> / <a href="#" class="login-submit-checkout">Login</a></p>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-6 facebook-div">

                                    <h4 class="text-center"><b>SOCIAL PROFILE LOGIN</b></h4>

                                    <div class="form-group">
                                        <?php echo $this->Form->postLink(
                                            '<button class="btn btn-default btn-lg login-btn"> <i class="fa fa-envelope"></i> Login with <b>Email</b></button>',
                                            [
                                                'plugin' => 'ADmad/SocialAuth',
                                                'controller' => 'Auth',
                                                'action' => 'login',
                                                'provider' => 'google'
                                            ], ['escape' => false]
                                        ); ?>
                                    </div>
                                    <br>
                                    <hr>
                                    <h5 class="text-center login-or"><b>OR</b></h5>

                                    <h5 class="text-center"><b>No post on your behalf, promise!</b></h5>
                                    <div class="form-group">
                                        <?php echo $this->Form->postLink(
                                            '<button class="btn btn-lg btn-primary login-btn"> <i class="fa fa-facebook"></i> Sign up or Login with <b>Facebook</b></button>',
                                            [
                                                'plugin' => 'ADmad/SocialAuth',
                                                'controller' => 'Auth',
                                                'action' => 'login',
                                                'provider' => 'facebook',
                                                '?' => ['redirect' => $this->request->getQuery('redirect')]
                                            ], ['escape' => false]
                                        ); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="step address">
                    <div class="top">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>
                                    <b>2. Your Address </b>
                                    <span class="pull-right btn btn-success expand"><i class="fa fa-check-square-o"></i> View</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default panel-white">
                                    <div class="panel-heading">
                                        <h4><?php echo $user->name; ?></h4>
                                    </div>
                                    <div class="panel-body address">
                                        <h4><b><i class="fa fa-home"></i>My Address:
                                                <?php
                                                $address = "";
                                                foreach ($user->user_metas as $meta) {
                                                    if ($meta->user_meta_field_name == 'user_address') {
                                                        $address = $meta->user_meta_field_value;
                                                    }
                                                }
                                                ?>
                                                <input type="text" name="info-address" id="InfoAddress"
                                                       value="<?php echo $address; ?>" required="">
                                            </b></h4>
                                        <h4><b><i class="fa fa-phone"></i> My Mobile: 
                                            <input type="text" name="info-phone" id="InfoPhone" value="<?php echo is_numeric($user->user_mobile) ? $user->user_mobile : ""; ?>" required=""></b>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-md-offset-4">
                                <div class="form-group">
                                    <button class="btn btn-lg btn-warning login-btn text-uppercase step-address-submit">
                                        Use This address
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="step order">
                    <div class="top">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>
                                    <b>3. Order Summary </b>
                                    <span class="pull-right btn btn-success expand"><i class="fa fa-check-square-o"></i> View</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="content">
                        <div class="row mgl-15">
                            <div class="table-responsive">
                                <table class="table table-bordered table-cart">
                                    <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Subtotal</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($orders as $cart) { ?>
                                        <tr id="cart<?= $cart->cart_id ?>" class="cart-list">
                                            <td style="width: 60%">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <?= $this->Html->image('/productImage/productImage/' . $cart->cart_product_image, [
                                                            'alt' => $cart->shop_product->product_name,
                                                            'class' => 'img img-responsive'
                                                        ]) ?>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <p class="h4 text-bold"><?= $cart->shop_product->product_sub_category->sub_category_name ?></p>
                                                        <p class="h4 text-bold">
                                                            <b><?= $cart->shop_product->product_name ?></b></p>
                                                        <a href="#" class="remove-order">remove item</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group">
                                          <span class="input-group-btn">
                                            <button class="btn btn-default dec-item" type="button" id="btn-plus"><span
                                                        class="glyphicon glyphicon-minus"></span></button>
                                          </span>
                                                    <input type="number" value="<?= $cart->cart_product_quantity ?>"
                                                           readonly="" class="form-control item-quantity">
                                                    <span class="input-group-btn">
                                            <button class="btn btn-default inc-item" type="button" id="btn-minus"><span
                                                        class="glyphicon glyphicon-plus"></span></button>
                                          </span>
                                                </div>
                                            </td>
                                            <td>৳ <span class="price"><?= $cart->cart_product_unit_price ?></span></td>
                                            <td>৳
                                                <span class="total_price"><?= $cart->cart_product_total_price ?></span>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12">
                                <div class="total-price row">
                                    <div class="col-md-8">
                                        <!-- <h3>Total: <b class="h3">৳ <span class="order_total">0.00</span></b> </h3> -->
                                    </div>
                                    <div class="col-md-4">
                                        <h4>Subtotal: <p class="pull-right">৳ <span class="order_total">0.00</span></p>
                                        </h4>
                                        <h4>Discount: <p class="pull-right">৳ <span class="discount">0.00</span></p>
                                        </h4>
                                        <h4>Delivery Charge: <p class="pull-right">৳ <span
                                                        class="delivery_charge">0.00</span></p></h4>
                                        <hr>
                                        <h4>Total : <p class="pull-right">৳ <span class="grand_total">0.00</span></p>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-md-offset-4">
                                <div class="form-group">
                                    <button class="btn btn-lg btn-warning login-btn text-uppercase step-order-submit">
                                        Check and place order
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="step confirm">
                    <div class="top">
                        <div class="row">
                            <div class="col-md-10">
                                <h3><b>4. Payment </b></h3>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="content">
                        <div class="row">
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 bhoechie-tab-container">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
                                    <div class="list-group">
                                        <a href="#" class="list-group-item active text-center">
                                            <h4 class="fa fa-money"></h4><br/>Cash on Delivery
                                        </a>
                                        <!-- <a href="#" class="list-group-item text-center">
                                          <h4 class="fa fa-credit-card"></h4><br/>Online Payment
                                        </a> -->
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
                                    <!-- flight section -->
                                    <div class="bhoechie-tab-content active">
                                        <div class="std" style="padding: 0 15px">
                                            <p><strong>Cash on Delivery is available in:</strong></p>
                                            <ul>
                                                <li>Dhaka</li>
                                            </ul>
                                            <p><span style="font-size: 14px; color: #ff0000;">*** Only the areas under the Metropolitan City</span>
                                            </p>
                                            <p>&nbsp;<strong>Delivery time:</strong></p>
                                            <ul>
                                                <li>In Dhaka the product delivery takes 24 hours and in some cases it
                                                    may take upto 48 Hours.
                                                </li>
                                                <li>For any query please contact us at our hotline number is 01841297253
                                                    (Everyday 9am to 8pm) or e-mail us at info@klubhaus.com.bd
                                                </li>
                                            </ul>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <a class="btn btn-lg login-btn btn-warning text-uppercase step-order-confirm"
                                               href="<?= $this->Url->build('/order/cash-on-delivery') ?>">Confirm
                                                Order</a>
                                        </div>
                                    </div>
                                    <!-- train section -->
                                    <!-- <div class="bhoechie-tab-content">
                                        <div class="std" style="padding: 0 15px">
                                            <p><strong>Pay directly via online with:</strong></p>
                                            <ul>
                                                <li>bKash</li>
                                                <li>DBBL Mobile Banking</li>
                                                <li>Credit/Debit Card</li>
                                                <li>Bank Deposit</li>
                                            </ul>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <a class="btn btn-lg login-btn btn-warning text-uppercase step-order-confirm" href="<?= $this->Url->build('/order/testSsl') ?>">Confirm Order</a>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

                                <!-- <div class="coupon">
                                    <div class="form-group">
                                        <input class="form-control" type="text" />
                                    </div>
                                    <button class="btn btn-sm btn-block btn-default text-uppercase">Add Voucher</button>
                                </div>

                                <br>

                                <h4>Total: <p class="pull-right">৳ <span class="order_total">0.00</span></h4> -->


                                <h4>Referer</h4>
                                <select class="select-color" id="refererID">
                                    <option>Please Select Referer</option>
                                    <?php foreach ($referer as $salesman) { ?>
                                        <option value="<?= $salesman->id ?>">
                                            <?= $salesman->name ?>
                                        </option>
                                    <?php } ?>
                                </select>


                            </div>
                            <!-- <div class="col-md-4 col-md-offset-4">
                                
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $this->start('script'); ?>
    <script>
        var address = '<?php echo $address ?>';
        var mobile = '<?php echo $user->user_mobile; ?>';
        var user_id = <?php echo ($Auth->user('id') != "") ? $Auth->user('id') : 0 ?>;

        $(document).on('ready', function () {
            // discount()
        });


        //Checkout First Step
        console.log(step);

        $(".step-login-submit").on("click", function (e) {
            step = 1;
        });
        $(".login-submit").on("click", function (e) {
            step = 1;
        });

        //Checkout Second Step
        $(".step-address-submit").on("click", function (e) {
            e.preventDefault();
            user_mobile = $('#InfoPhone').val();
            user_address = $('#InfoAddress').val();
            if ($.trim(user_mobile).length == 0 || user_mobile == "" || isNaN(user_mobile) || $.trim(user_address).length == 0 || user_address == "") {
                alert('Check Address and Mobile');
            } else if (user_id > 0 || step > 0) {
                $.ajax({
                    type: "POST",
                    data: {
                        'user_id': user_id,
                        'user_address': user_address,
                        'user_mobile': user_mobile
                    },
                    url: "<?php echo $this->Url->build('/', true) ?>" + "change-info/",
                    success: function (data) {
                        console.log(data);
                        $('.step.address .content').slideUp("slow");
                        $('.step.order .content').slideDown("slow");
                        $('.expand').css("display", "none");
                        $('.step.address .expand').css("display", "inline-block");
                        step = 2;
                        swal({
                            title: "Successfully Updated!",
                            text: "You have successfully updated your address.",
                            type: "success",
                            showConfirmButton: false,
                            timer: 3000
                        });
                    },
                    error: function () {
                        console.log("Error");
                    },
                    dataType: "json"
                });
            } else {
                alert('Login first');
            }
        });

        //Checkout Third Step 
        $(".step-order-submit").on("click", function (e) {
            e.preventDefault();

            var orders = <?php echo $orders->count(); ?>;

            if (orders == 0) {
                alert('Please Add Products In your Cart List');
            } else if (step == 1) {
                alert('Check Address');
            } else {
                $('.step.order .content').slideUp("slow");
                $('.step.confirm .content').slideDown("slow");
                $('.step.order .expand').css("display", "inline-block");
                step = 3;
            }
        });

        //Checkout Last Step
        $(".step-order-confirm").on("click", function (e) {
            if (step <= 2) {
                e.preventDefault();
                alert('Place Order');
            }
        });

        $(".expand").on("click", function (e) {
            $(this).parent().parent().parent().parent().siblings().slideToggle("slow");
            $(this).css("display", "none");
        });


        /* Change Address */
        var user_address = "<?php echo !empty($address) ? $address : ""; ?>";
        var user_id = "<?php echo $user->id; ?>";
        $("#info-address").on("click", "#change-address", function () {
            $('#info-address').empty();
            $('#info-address').append('<input type="text" name="info-address" id="InfoAddress" value="' + user_address + '"><button class="btn btn-link">Save</button>');
        });

        $("#info-address").on("click", ".btn-link", function (e) {
            e.preventDefault();
            user_address = $('#InfoAddress').val();
            if (user_address != "") {
                $.ajax({
                    type: "POST",
                    data: {
                        'user_id': user_id,
                        'user_address': user_address
                    },
                    url: "<?php echo $this->Url->build('/', true) ?>" + "change-info/",
                    success: function (data) {
                        console.log(data);
                        address = user_address;
                        $('#InfoAddress').val(user_address);
                        $('#info-address').empty();
                        $('#info-address').append(user_address + ' <a href="javascript:;" id="change-address">Change Address</a>');
                        swal({
                            title: "Successfully Updated!",
                            text: "You have successfully updated your address.",
                            type: "success",
                            showConfirmButton: false,
                            timer: 3000
                        });
                    },
                    error: function () {
                        console.log("Error");
                    },
                    dataType: "json"
                });
            } else {
                alert('Field can not be Empty');
            }

        });

        /* Change Phone */
        var user_mobile = "<?php echo $user->user_mobile; ?>";
        $("#info-phone").on("click", ".btn-link", function (e) {
            e.preventDefault();
            user_mobile = $('#InfoPhone').val();
            if (user_mobile != "") {
                $.ajax({
                    type: "POST",
                    data: {
                        'user_id': user_id,
                        'user_mobile': user_mobile
                    },
                    url: "<?php echo $this->Url->build('/', true) ?>" + "change-info/",
                    success: function (data) {
                        mobile = user_mobile;
                        $('#InfoPhone').val(user_mobile);
                        console.log("Success");
                        $('#info-phone').empty();
                        $('#info-phone').append(user_mobile + ' <a href="javascript:;" id="change-phone">Change Phone</a>');
                        swal({
                            title: "Successfully Updated!",
                            text: "You have successfully updated your Phone Number.",
                            type: "success",
                            showConfirmButton: false,
                            timer: 3000
                        });
                    },
                    error: function () {
                        console.log("Error");
                    },
                    dataType: "json"
                });
            } else {
                alert('Field can not be Empty');
            }
        });

        $("#info-phone").on("click", "#change-phone", function () {
            $('#info-phone').empty();
            $('#info-phone').append('<input type="text" name="info-phone" id="InfoPhone" value="' + user_mobile + '"><button class="btn btn-link">Save</button>');
        });

    </script>
<?php $this->end(); ?>