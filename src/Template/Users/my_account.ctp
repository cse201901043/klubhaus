    <?php $this->start('css'); ?>
    <style>

        .account input[type=text]{
            margin-top: -10px;
            width: 200px;
            border: none;
            border-bottom: 1px solid #aaa;
        }
        .btn-link{
            font-weight: 600;
        }
        .btn-link:hover,
        .btn-link:focus{
            text-decoration:none;
        }

        #info-mail input{
            width: 200px;
        }

        #info-phone input{
            width: 111px;
        }

        .table-order a{
            color: #FDDC48;
            font-weight: 700;
        }

        #order-modal .modal-header .close{
            margin-top: -30px;
            color: #111;
            opacity: 1;
        }
        .table-order-details td:nth-child(n+2) {
            text-align: center;
            font-weight: 700;
        }
        .table-order-details th {
            text-align: center;
            font-weight: 700;
        }
    </style>
    <?php $this->end(); ?>



    <div class="container-fluid">
        <div class="text-center home-title">
            <h2>My Account</h2>
        </div>
        <div class="row content">
            <div class="col-md-8 col-md-offset-2 cart-content">
                <div class="col-md-10 col-md-offset-1">
                    <div class="account dashboard">
                        <div class="clearfix"></div>
                        <div class="row mgl-15 text-center">
                            <h3 class="text-uppercase text-bold"> Account Control Panel </h3>
                            <p> Hello <?= $Auth->user('name') ?>,</p>
                            <p>From your My Account Dashboard you have the ability to view a snapshot of your recent account activity and update your account information. Select a link below to view or edit information.</p>
                        </div>
                    </div>
                    <div class="account info">
                        <div class="clearfix"></div>
                        <div class="row mgl-15">
                            <h4> Personal Informations
                                <!-- <span href="#" class="pull-right text-muted"><i class="fa fa-pencil"></i>&nbsp; <i class="fa fa-trash"></i></span> -->
                            </h4>
                            <div class="info">          
                                <p><?= $Auth->user('name') ?></p>
                                <p id="info-mail"> <?php echo $user->email; ?> <a href="javascript:;" id="change-mail" class="btn btn-warning btn-xs">Change E-mail</a></p>
                                <p><a href="javascript:;" id="change-password" class="btn btn-warning btn-xs">Change Password</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="account address">
                        <div class="clearfix"></div>
                        <div class="row mgl-15">
                            <h4> Address Book
                                <!-- <span href="#" class="pull-right text-muted"><i class="fa fa-pencil"></i>&nbsp; <i class="fa fa-trash"></i></span> -->
                            </h4>
                            <div class="address-book">          
                                <p> My Address - 
                                    <?php
                                    $address = "";
                                        foreach($user->user_metas as $meta){
                                            if($meta->user_meta_field_name == 'user_address'){
                                                $address =  $meta->user_meta_field_value;
                                            }
                                        }
                                    ?>

                                    <span id="info-address"><?= $address ?>

                                    <a href="javascript:;" id="change-address" class="btn btn-warning btn-xs">Change Address</a></span>
                                </p>
                                <p>My Mobile - <span id="info-phone"><?php echo is_numeric($user->user_mobile) ? $user->user_mobile : ""; ?> <a href="javascript:;" id="change-phone" class="btn btn-warning btn-xs">Change Phone</a></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="account order">
                        <div class="clearfix"></div>
                        <div class="row mgl-15">
                            <h4> My Orders
                                <!-- <span href="#" class="pull-right text-muted"><i class="fa fa-pencil"></i>&nbsp; <i class="fa fa-trash"></i></span> -->
                            </h4>
                            <div class="table-responsive">          
                              <table class="table table-bordered table-order">
                                <thead>
                                  <tr>
                                    <th>Date</th>
                                    <th>Order No.</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>Shipment</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php foreach($myorders as $order){ ?> 
                                  <tr>
                                    <td><?= date_format($order->created_at,"d M, Y") ?></td>
                                    <td>Inv-<?= date('y') ?>1000<?= $order->order_id ?></td>
                                    <td> ৳<?= $order->order_amount ?></td>
                                    <td> ৳<?= $order->order_deduct_amount ?></td>
                                    <td> ৳<?= $order->order_shipping_cost ?></td>
                                    <td> ৳<?= $order->order_grand_total ?></td>
                                    <td>
                                        <?php 
                                            if($order->order_status == 0)
                                                echo "Pending";
                                            elseif($order->order_status == 1)
                                                echo "On the Way";
                                            else
                                                echo "Delivered";
                                        ?>
                                            
                                    </td>
                                    <td><a href="javascript:;" class="order-link" data-order-id = "<?= $order->order_id ?>">View Details</a></td>
                                  </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                            </div>
                        </div>
                    </div>
                    <div class="account order">
                        <div class="clearfix"></div>
                        <div class="row mgl-15">
                            <h4> My Saved Items
                                <!-- <span href="#" class="pull-right text-muted"><i class="fa fa-pencil"></i>&nbsp; <i class="fa fa-trash"></i></span> -->
                            </h4>
                            <div class="table-responsive">          
                              <table class="table table-bordered table-cart">
                                <thead>
                                  <tr>
                                    <th style="width: 50%">Item</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Subtotal</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php foreach($orders as $cart){ ?>
                                  <tr id="cart<?= $cart->cart_id ?>" class="cart-list">
                                    <td>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <?= $this->Html->image('/productImage/productImage/'.$cart->cart_product_image, [
                                                'alt' => $cart->shop_product->product_name, 
                                                'class' => 'img img-responsive'
                                            ]) ?>
                                        </div>
                                        <div class="col-md-10">
                                            <p class="h4 text-bold"><?= $cart->shop_product->product_sub_category->sub_category_name ?></p>
                                            <p class="h4 text-bold"><b><?= $cart->shop_product->product_name ?></b></p>
                                            <a href="#" class="remove-order">remove item</a>
                                        </div>
                                    </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                          <span class="input-group-btn">
                                            <button class="btn btn-default dec-item" type="button" id="btn-plus"><span class="glyphicon glyphicon-minus"></span></button>
                                          </span>
                                          <input type="number" value="<?= $cart->cart_product_quantity ?>" readonly="" class="form-control item-quantity">
                                          <span class="input-group-btn">
                                            <button class="btn btn-default inc-item" type="button" id="btn-minus"><span class="glyphicon glyphicon-plus"></span></button>
                                          </span>
                                        </div>
                                    </td>
                                    <td>৳ <span class="price"><?= $cart->cart_product_unit_price ?></span></td>
                                    <td>৳ <span class="total_price"><?= $cart->cart_product_total_price ?></span></td>
                                  </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                            </div>
                        </div>
                      
                    </div>
                    <!-- <div class="account coupon">
                        <div class="clearfix"></div>
                        <div class="row mgl-15">
                            <h4> My Coupons -->
                                <!-- <span href="#" class="pull-right text-muted"><i class="fa fa-pencil"></i>&nbsp; <i class="fa fa-trash"></i></span> -->
                            <!-- </h4>
                            <div class="table-responsive">          
                              <table class="table table-bordered table-cart">
                                <thead>
                                  <tr>
                                    <th>Active</th>
                                    <th>Times to use again</th>
                                    <th>Coupon Code</th>
                                    <th>Valid from</th>
                                    <th>Valid till</th>
                                    <th>Amount</th>
                                  </tr>
                                </thead>
                                <tbody> -->
                                  <!-- <tr>
                                    <th>Yes</th>
                                    <th>1</th>
                                    <th>NLW3fa307</th>
                                    <th>14/09/17 09:14</th>
                                    <th>14/03/18 23:59</th>
                                    <th>৳ 200.00</th>
                                  </tr> -->
                                <!-- </tbody>
                              </table>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Order Details -->
    <div class="modal fade" id="order-modal" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="Text-bold"> Order Details </h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" style="padding:15px 30px 30px 10px;">
                    <div class="row">
                        <div class="col-lg-12 order-div">
                            <table class="table table-bordered table-order-details">
                                <thead>
                                  <tr>
                                    <th>Item</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Subtotal</th>
                                  </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal Login -->
    <div class="modal fade" id="password-modal" role="dialog">
        <div class="modal-dialog modal-md">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="Text-bold"> Change Password</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" style="padding:15px 40px;">
                    <form role="form" method="post" class="password-form">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input class="form-control login-control" type="password" name="current_password" placeholder="Old Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input class="form-control login-control" type="password" name="password" placeholder="Enter New Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input class="form-control login-control" type="password" name="confirm_password" placeholder="Re-Type Password">
                            </div>
                        </div>
                        <p class="text-danger text-center text-bold" id="Invalid-login-label"></p>
                        <br>
                        <div class="form-group">
                            <button class="btn btn-lg btn-warning password-btn login-btn text-uppercase">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <?php $this->start('script'); ?>
        <script>
            var user_id = '<?php echo $Auth->user('id'); ?>';

            var order_status = '<?php echo $status; ?>';
            // alert(order_status);
            if(order_status.length > 0){
                swal({
                    title: "Order Placed!",
                    text: "Please check your mail for the billing details! Happy shopping!",
                    type: "success",
                    showConfirmButton: false,
                    timer: 3000
                });
            }

            /* Change Password */
            $('#change-password').click(function() {
                $("#password-modal").modal();
            });

            $(".password-btn").on("click", function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    data: $(".password-form").serialize(),
                    url: "<?php echo $this->Url->build('/', true) ?>"+"change-password",
                    success: function(data) {
                        console.log("Success");
                        setTimeout(function(){
                            $("#password-modal").modal('hide');
                        }, 500);
                        swal({
                            title: "Successfully Updated!",
                            text: "You have successfully updated your Password.",
                            type: "success",
                            showConfirmButton: false,
                            timer: 3000
                        });
                    },
                    error: function() {
                        console.log("Error");
                    },
                    dataType: "json"
                });
            });


            /* Change Mail */
            var user_email = "<?php echo $user->email; ?>";
            $('#change-mail').click(function() {
                $('#info-mail').empty();
                $('#info-mail').append('<input type="text" name="info-mail" id="InfoMail" value="'+ user_email +'"><button class="btn btn-warning btn-xs btn-mail">Save E-mail</button>');
            });

            $("#info-mail").on("click", ".btn-mail", function(e) {
                e.preventDefault();
                user_email = $('#InfoMail').val();

                $.ajax({
                    type: "POST",
                    data: {
                        'user_id': user_id,
                        'user_email': user_email
                    },
                    url: "<?php echo $this->Url->build('/', true) ?>" + "change-info/",
                    success: function(data) {
                        console.log("Success");
                    },
                    error: function() {
                        console.log("Error");
                    },
                    dataType: "json"
                });

                swal({
                    title: "Successfully Updated!",
                    text: "You have successfully updated your Email.",
                    type: "success",
                    showConfirmButton: false,
                    timer: 3000
                });
            });

            /* Change Phone */
            var user_mobile = "<?php echo $user->user_mobile; ?>";
            $("#info-phone").on("click", ".btn-phn", function(e) {
                e.preventDefault();
                user_mobile = $('#InfoPhone').val();

                $.ajax({
                    type: "POST",
                    data: {
                        'user_id': user_id,
                        'user_mobile': user_mobile
                    },
                    url: "<?php echo $this->Url->build('/', true) ?>" + "change-info/",
                    success: function(data) {
                        $('#InfoPhone').val(user_mobile);
                        console.log("Success");
                        $('#info-phone').empty();
                        $('#info-phone').append(user_mobile+' <a href="javascript:;" id="change-phone" class="btn btn-warning btn-xs">Change Phone</a>');

                        swal({
                            title: "Successfully Updated!",
                            text: "You have successfully updated your Phone Number.",
                            type: "success",
                            showConfirmButton: false,
                            timer: 3000
                        });
                    },
                    error: function() {
                        console.log("Error");
                    },
                    dataType: "json"
                });
            });

            $("#info-phone").on("click", "#change-phone", function() {
                $('#info-phone').empty();
                $('#info-phone').append('<input type="text" name="info-phone" id="InfoPhone" value="'+ user_mobile +'"><button class="btn btn-warning btn-xs btn-phn">Save Phone</button>');
            });

            /* Change Address */
            var user_address = "<?php echo $address; ?>";
            $("#info-address").on("click", "#change-address", function() {
                $('#info-address').empty();
                $('#info-address').append('<input type="text" name="info-address" id="InfoAddress" value="'+ user_address +'"><button class="btn btn-warning btn-xs btn-address">Save Address</button>');
            });

            $("#info-address").on("click", ".btn-address", function(e) {
                e.preventDefault();
                user_address = $('#InfoAddress').val();
                if(user_address != ""){
                    $.ajax({
                        type: "POST",
                        data: {
                            'user_id': user_id,
                            'user_address': user_address
                        },
                        url: "<?php echo $this->Url->build('/', true) ?>" + "change-info/",
                        success: function(data) {
                            console.log(data);
                            $('#InfoAddress').val(user_address);
                            $('#info-address').empty();
                            $('#info-address').append(user_address+' <a href="javascript:;" id="change-address" class="btn btn-warning btn-xs">Change Address</a>');
                            swal({
                                title: "Successfully Updated!",
                                text: "You have successfully updated your address.",
                                type: "success",
                                showConfirmButton: false,
                                timer: 3000
                            });
                        },
                        error: function() {
                            console.log("Error");
                        },
                        dataType: "json"
                    });
                }else{
                    alert('Field can not be Empty');
                }

            });

    //Modal Action Order
    $(".order-link").click(function() {
        var order_id = $(this).data('order-id');

        $.ajax({
            type: "POST",
            data: {order_id:order_id},
            url: url+"ajax-order-details",
            success: function(orders) {
                console.log(orders.length);
                $("#order-modal").modal();

                $('#order-modal .modal-body > .row > .order-div > .table > tbody').empty();
                for (var i = orders.length - 1; i >= 0; i--) {
                    $('#order-modal .modal-body > .row > .order-div > .table > tbody').append('<tr>'
                        +'<td>'
                            +'<img src="<?= $this->Url->build('/', true) ?>productImage/productImage/'+ orders[i]['order_product_image'] +'" class="img img-responsive pull-left" style="width: 50px; padding-right: 20px;">'
                            +'<p class="h4 text-bold"><b>'+ orders[i]['order_product_name'] +'</b></p>'
                        +'</td>'
                        +'<td>'
                            +'<p class="h4 text-bold"><b>'+ orders[i]['order_product_quantity'] +'</b></p>'
                        +'</td>'
                        +'<td>'
                            +'<p class="h4 text-bold"><b>'+ orders[i]['order_product_unit_price'] +'</b></p>'
                        +'</td>'
                        +'<td>'
                            +'<p class="h4 text-bold"><b>'+ orders[i]['order_product_total_price'] +'</b></p>'
                        +'</td>'
                    +'</tr>');

                }
            },
            error: function() {
                console.log("error");
            },
            dataType: "json"
        });

    });
        </script>
    <?php $this->end(); ?>