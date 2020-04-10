<!DOCTYPE html>
<html lang="en">

    <head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-122732602-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-122732602-1');
        </script>

        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CAKE-Ecommerce Bangladesh</title>
        <meta name="Title" Content="KLUBHAUS Bangladesh">
        <meta name="description" content="Presenting world class apparel made by Bangladesh. For #Bangladesh Stores in: Bashundhara City, Jamuna Future Park, Wari and Mirpur.">
        
        <!-- Canonical SEO -->
        <link rel="canonical" href="<?php echo $this->Url->build('/', true) ?>" />
        <!--  Social tags      -->
        <meta name="keywords" content="ecommerce, ecommerce portal, shopping, Bangladeshi ecommerce, clothing Bangladesh, Shopping online, online clothing, online shopping in Bangladesh, Apparel, Men's clothing, female clothing, Accessories, Female Accessories, Kid's clothing, clothing website, designed Apparel">

        <?= $this->Html->meta('favicon.ico', '/productImage/favicon.ico', ['type' => 'icon']); ?>

        <!--- All CSS -->
        <?= $this->Html->css(['font-awesome.min.css', 'slick.css', 'slick-theme.css', 'jquery-ui.css', 'select2.min.css', 'bootstrap.min.css', 'sweetalert.css', 'bootstrap-multiselect.css', 'styles.css', 'responsive.css']) ?>

        <?= $this->fetch('css') ?>

        <!--- All CSS End -->

        

        <script type="text/javascript">
            var url = "<?php echo $this->Url->build('/', true) ?>"; 
        </script>

        <?= $this->Html->script(['jquery.js', 'bootstrap.min.js', 'sweetalert.js', 'select2.min.js', 'select2.multi-checkboxes.js', 'jquery-ui.min.js', 'intlTelInput.min.js', 'slick.min.js', 'jquery.spincrement.min.js', 'script.js']) ?>

        <!-- html5 shim and Respond.js for IE8 support of html5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]--> 

    </head>

    <body>

        <!--- Header Menu -->
        <div class="row header-menu">
            <!--- Navbar -->
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="fa fa-bars"></span> Menu
                        </button>
                        <!-- <button type="button"><span class="fa fa-search"></span></button> -->
                        <!--- Logo -->
                        <?= $this->Html->link($this->Html->image('Logo-black.png', ['alt' => 'logo', 'class' => 'logo']), '/', ['class' => ['navbar-brand'], 'escape' => false]); ?>
                        <!--- Logo End -->
                    </div>

                    <!--- Menu -->
                    <div class="collapse navbar-collapse" id="bs-collapse">
                        <!--- Category Menu -->
                        <ul class="nav navbar-nav menu text-uppercase">
                            <li>
                                <?= $this->Html->link("Accessories", "/accessories"); ?>
                            </li>
                            <li class="menu-item-separator hidden-xs">|</li>
                            <li>
                                <?= $this->Html->link("Men", "/men"); ?>
                            </li>
                            <li class="menu-item-separator hidden-xs">|</li>
                            <li>
                                <?= $this->Html->link("Women", "/women"); ?>
                            </li>
                            <li class="menu-item-separator hidden-xs">|</li>
                            <li>
                                <?= $this->Html->link("Kids", "/kids"); ?>
                            </li>
                            <li class="menu-item-separator hidden-xs">|</li>
                            <li>
                                <?= $this->Html->link("COMMUNITY", "/community"); ?>
                            </li>
                        </ul>
                        <!--- Category Menu End -->
                        <!--- Order Menu -->
                        <ul class="nav navbar-nav navbar-right">
                            <li class="search-box">
                                <form class="form" method="get" action="<?= $this->Url->build('/search', true) ?>">
                                    <input type="text" name="search_key" class="search-input" placeholder="Search items">
                                    <button type="submit" class="btn btn-link search-icon"><i class="fa fa-search"></i></button>
                                </form>
                            </li>
                            <li class="text-right">
                                <span id="Authentication">
                                    <?php if(!is_null( $Auth->user('id'))){?>
                                        <a href="#" id="logout"> Logout </a>
                                         | 
                                        <?= $this->Html->link(' My Account ', "/my-account"); ?>
                                        <?php } else{ ?>
                                        <a href="#"  data-toggle="modal" data-target="#login-modal"> Sign in </a> | 
                                        <a href="#" data-toggle="modal" data-target="#registration-modal"> Register </a>
                                    <?php } ?>
                                     |
                                    <?= $this->Html->link('Find a store', "/find-store"); ?>
                                </span>
                            </li>
                        </ul>
                        <!--- Order Menu End -->
                    </div>
                    <!-- Menu End -->
                </div>
            </nav>
            <!--- Navbar End -->
        </div>
        <!--- Header Menu End -->



        <!-- sidebar Cart -->
        <ul class="widget">
            <button class="widget_button cart_button">
                <i class="fa fa-shopping-cart"></i>
                <p><span class="item_total">0</span> ITEM</p>
                <!-- <p class="color">৳ <span class="order_total spincrement">0.00</span></p> -->
            </button>
            <li class="relative">
                <div class="widget_content">
                    <div class="close-nav nav-header">
                        <h3 class="color_dark"><span class="item_total">0</span> ITEM</h3>
                        <button class="btn">-</button>
                    </div>
                    <div class="sidebar-cart-list">
                        <?php if(!empty($orders)){ $order_total = 0; $item_total = 0; foreach($orders as $order) {?>
                            <div class="sidebar-cart-item" id="<?= $order->cart_id ?>">
                                <div class="quantity">
                                    <button class="inc-item"><i class="fa fa-angle-up"></i></button>
                                    <input type="text" name="" value="<?= $order->cart_product_quantity ?>" readonly="" class="item-quantity">
                                    <button class="dec-item"><i class="fa fa-angle-down"></i></button>
                                </div>
                                <?= $this->Html->image('/productImage/productImage/'.$order->cart_product_image, [
                                    'alt' => $order->cart_product_image, 
                                    'class' => 'img img-responsive'
                                ]) ?>
                                    <div class="item-details">
                                        <h5 class="text-uppercase"><?= $order->shop_product->product_sub_category->sub_category_name ?></h5>
                                        <p>
                                            <?= $order->shop_product->product_name ?>
                                        </p>
                                        <p>৳ <span class="price"><?= $order->cart_product_unit_price ?></span></p>
                                    </div>
                                    <button class="cancel-order">X</button>
                            </div>
                            <?php 
                                $item_total = $item_total + $order->cart_product_quantity; 
                                $order_total = $order_total + $order->cart_product_total_price; 
                                $cartID[] = $order->cart_id;
                            } } ?>
                    </div>
                    <div class="place-order">
                        <!-- <div class="discount">
                            <p><i class="fa fa-angle-down"></i> Have a special code</p>
                            <input type="text" name="" placeholder="Type your discount code here">
                            <button>USE</button>
                        </div> -->
                        <button class="amount"> ৳ <span class="order_total">0</span> </button>
                        <?= $this->Html->link('<button class="checkout"> Checkout </button>', '#', ['escape' => false]); ?>
                    </div>
                </div>
            </li>
        </ul>
        <!-- sidebar Cart -->

        <!--- Content from CTP -->
        <?= $this->fetch('content') ?>
        <!--- Content from CTP End -->

        <!--- Footer -->
        <div class="row footer-header">
            <!--- Footer Top -->
            <p class="footer-title">FEAR OF MISSING OUT?</p>
            <p class="footer-sub-title">Be the first to know about the latest deals, style update &amp; more!</p>
            <div>
                <input type="text" name="sub_mail" placeholder="Email Address" class="email" id="sub_mail">
                <a href="javascript:;" class="join" id="subscribe_me">JOIN</a>
                <p class="terms">By clicking join, I accept the Privacy Policy and Terms of Use. You may unsubscribe at any time.</p>
            </div>
            <!--- Footer Top End -->

            <!--- Social Links -->
            <div>
                <ul class="social">
                    <li>
                        <a href="https://www.instagram.com/klubhausbd/" target="_blank">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/klubhausbd/" target="_blank">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/klubhausbd" target="_blank">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="#">
                            <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-google-plus" aria-hidden="true"></i>
                        </a>
                    </li> -->
                </ul>
            </div>
            <!--- Social Links End -->

            <!--- Footer Links -->
            <div class="col-md-6 col-md-offset-3">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 footer-links">
                    <p class="footer-link-title">Company Info</p>
                    <!--<p><?= $this->Html->link("About Us","/about", ['class' => ['footer-link']]); ?></p>-->
                    <p><?= $this->Html->link("About Us","#", ['class' => ['footer-link']]); ?></p>
                    <p><?= $this->Html->link("Find a Store","/find-store", ['class' => ['footer-link']]); ?></p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 footer-links">
                    <p class="footer-link-title">Help</p>
                    <p><?= $this->Html->link("Contact Us","/contact", ['class' => ['footer-link']]); ?></p>
                    <!-- <p><a href="#" class="footer-link">Order Status</a></p>
                    <p><a href="#" class="footer-link">Shipping Info</a></p> -->
                    <!--<p><?= $this->Html->link("Returns & Exchanges","/returns-exchanges", ['class' => ['footer-link']]); ?></p>-->
                    <p><?= $this->Html->link("Returns & Exchanges","#", ['class' => ['footer-link']]); ?></p>
                    <p><?= $this->Html->link("Size Guide","/size-guide", ['class' => ['footer-link']]); ?></p>
                    <p><?= $this->Html->link("FAQ","/faq", ['class' => ['footer-link']]); ?></p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 footer-links">
                    <p class="footer-link-title">Quick Links</p>
                    <!-- <p><a href="#" class="footer-link">Special Offers</a></p>
                    <p><a href="#" class="footer-link">Gift Cards</a></p> -->
                    <p><?= $this->Html->link("Privacy Policy","/privacy-policy", ['class' => ['footer-link']]); ?></p>
                    <p><?= $this->Html->link("Cookie Policy","/cookie-policy", ['class' => ['footer-link']]); ?></p>
                    <p><?= $this->Html->link("Terms of Use","/terms-of-use", ['class' => ['footer-link']]); ?></p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 footer-links">
                    <p class="footer-link-title">Useful Links</p>
                    <p><?= $this->Html->link("Customer Care 24/7","/customer-care", ['class' => ['footer-link']]); ?></p>
                    <p><?= $this->Html->link("Delivery","/delivery", ['class' => ['footer-link']]); ?></p>
                    <p><?= $this->Html->link("Payment","/payment-methods", ['class' => ['footer-link']]); ?></p>
                </div>


            </div>
            <div class="clearfix"></div>
            <!--- Footer Links End -->
        </div>
        <div class="container-fluid">
            <div class="row" style="margin-bottom: 10px; font-size: 12px; font-style: italic;">
                <p>Copyright © 2020</p>
            </div>
        </div>
        <!--- Footer End -->

        <!-- Modal Login -->
        <div class="modal fade" id="login-modal" role="dialog">
            <div class="modal-dialog modal-md">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="Text-bold"> Login</h3>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" style="padding:15px 40px;">
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
                            <!-- <button class="btn btn-default btn-lg login-btn"> <i class="fa fa-envelope"></i> Login with <b>Email</b></button> -->
                        </div>

                        <hr>
                        <h5 class="text-center login-or"><b>OR</b></h5>

                        <h5 class="text-center"><b>PLEASE ENTER YOUR EMAIL ADDRESS</b></h5>

                        <form role="form" method="post" class="login-form">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <!-- <input class="form-control" type="text" id="user_mobile" name="user_mobile"> -->
                                    <input class="form-control login-control" type="email" id="user" name="email" placeholder="Enter Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input class="form-control login-control" type="password" id="password" name="password" placeholder="Enter Password">
                                </div>
                            </div>
                            <p class="text-danger text-center text-bold Invalid-login-label"></p>
                            <br>
                            <br>
                            <div class="form-group">
                                <p class="btn btn-lg btn-warning login-btn text-uppercase"><a href="#" class="reg-modal">Sign up</a> / <a href="#" class="login-submit">Login</a></p>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>

        <!-- Modal Registration -->
        <div class="modal fade" id="registration-modal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="padding:15px 15px;">
                        <h3 class="text-center Text-bold"> Create New Customer Account</h3>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" style="padding:40px 50px;">
                        <form role="form" method="post" id="registration-form">
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="">
                                    <p class="text-danger text-bold" id="Invalid-registration-name"></p>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label" name="user_type">Gender</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="gender" name="gender">
                                        <option value="">Select</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    <p class="text-danger text-bold" id="Invalid-registration-gender"></p>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Birthday</label>
                                <div class="col-sm-8">
                                    <div class="col-sm-4 dob-col">
                                        <select class="form-control" name="date">
                                            <option>Day</option>
                                            <?php for($d=1; $d<=31; $d++){ ?>
                                                <option>
                                                    <?php
                                                    if($d<10)
                                                        echo '0';
                                                    echo $d;
                                                ?>
                                                </option>
                                                <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-4 dob-col">
                                        <select class="form-control" name="month">
                                            <option>Month</option>
                                            <option>January</option>
                                            <option>February</option>
                                            <option>March</option>
                                            <option>April</option>
                                            <option>May</option>
                                            <option>June</option>
                                            <option>July</option>
                                            <option>August</option>
                                            <option>September</option>
                                            <option>October</option>
                                            <option>November</option>
                                            <option>December</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4 dob-col dob-col-year">
                                        <select class="form-control" name="year">
                                            <option>Year</option>
                                            <?php for($y=2018; $y>1950; $y--){ ?>
                                                <option>
                                                    <?php echo $y; ?>
                                                </option>
                                                <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Mobile Number</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="user_mobile" id="mobile" placeholder="">
                                    <p class="text-danger text-bold" id="Invalid-registration-mobile"></p>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="">
                                    <p class="text-danger text-bold" id="Invalid-registration-email"></p>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Password</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="password" id="user_password" placeholder="">
                                    <p class="text-danger text-bold" id="Invalid-registration-password"></p>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Retype Password</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="retype-password" id="confirm" placeholder="">
                                    <p class="text-danger text-bold" id="Invalid-registration-confirm"></p>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Mailing Addeess</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" rows="3" name="user_address" placeholder="Enter home address, like road, home etc..."></textarea>
                                    <!-- <select class="form-control" name="location" id="location">
                                        <option></option>
                                        <?php foreach($locations as $location){ ?>
                                            <option>
                                                <?php echo $location->thana . ", " . $location->district . ", Bangladesh."; ?>
                                            </option>
                                            <?php } ?>
                                    </select> -->
                                    <p class="text-danger text-bold" id="Invalid-registration-address"></p>
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="form-label" for="subscriber">
                                    <input type="checkbox" class="form-check-input" name="subscriber" id="subscriber" checked=""> I want to receive Klubhaus Newsletter with best deal and offers</label>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="terms">
                                    <input type="checkbox" class="form-check-input" name="terms" id="terms"> I have read and accept the Teams & Condition</label>
                                <p class="text-danger text-center text-bold" id="Invalid-registration-term"></p>
                            </div>

                            <p class="text-danger text-center text-bold" id="Invalid-registration-label"></p>

                            <div class="form-group row">
                                <button class="btn btn-lg btn-warning col-sm-12 login-btn" id="reg-submit">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>

        <!--<script type="text/javascript" src="https://alustech.com/livechat/php/app.php?widget-init.js"></script>-->

        <script type="text/javascript">

            setTimeout(function(){
                $('body').addClass('loaded');
                $('h1').css('color','#222222')
            }, 3000);

            // alert("<?php echo $cookieHelper->read('remember_token'); ?>");

            
            //Default Value
            var size = 0;
            var color = 0;
            var step = 0;
            var sold = 0;
            var status = 0;
            var order_total = "";

            function getCookie(name) {
                var value = "; " + document.cookie;
                var parts = value.split("; " + name + "=");
                if (parts.length == 2) return parts.pop().split(";").shift();
            }

            var user=getCookie("remember_token");
            window.setInterval(CheckIdleTime, 10000);

            function CheckIdleTime() {
                if (user != "") {
                    
                }
            }

            //Initially Hide Sold Out
            // $('#sold-out').hide();

            //Initially Hide Address, Order Cart, Confirm Order
            $('.step.address .content').hide();
            $('.step.order .content').hide();
            $('.step.confirm .content').hide();

            //Initially Open if Logged in
            var Auth_id = '<?php echo !empty($Auth->user('id')) ? $Auth->user('id') : 0 ?>';
            if (Auth_id > 0) {
                $('.step.address .content').toggle();
            }

            //After Ready Document Do these Actions
            $(document).ready(function() {

                //Select2 for Registration Modal Locations
                $('#location').select2({
                    placeholder: "Select Thana, District, Bangladesh"
                });

                //Multiple Check Box for Sorting size and Color
                $('#sorting-color').select2MultiCheckboxes({
                    width: "100%",
                    deselect: true,
                    templateSelection: function(selected, total) {
                        return "Color";
                    }
                });
                $('#sorting-size').select2MultiCheckboxes({
                    width: "100%",
                    deselect: true,
                    templateSelection: function(selected, total) {
                        return "Size";
                    }
                });

                //Check if Size available for Product in Product details
                if ($('#size_value').length > 0) {
                    $('#size_value').on('change', function() {
                        size = $(this).val();
                        $('#size_value').css('border', '1px solid #a9a9a9');
                        var url = (color > 0) ? "check-stock/" + size + "/" + color : "check-stock/" + size;
                        url = "<?php echo $this->Url->build('/', true) ?>" + url;
                        if(!isNaN(size)){
                            $.ajax({
                                type: "POST",
                                url: url,
                                success: function(data) {
                                    sold = 0;
                                    for (var i = data.length - 1; i >= 0; i--) {
                                        if (data[i].product_attribute_stock == data[i].product_attribute_sold) {
                                            sold++;
                                        }
                                    }
                                    if (sold > 0) {
                                        $('#add-to-cart').hide();
                                        $('#sold-out').show();
                                    } else {
                                        $('#sold-out').hide();
                                        $('#add-to-cart').show();
                                    }
                                },
                                error: function() {
                                    console.log("error");
                                },
                                dataType: "json"
                            });
                        }
                    });
                }

                //Check if Color available for Product in Product details
                if ($('#color_value').length > 0) {
                    $('#color_value').on('change', function() {
                        color = $(this).val();
                        $('#color_value').css('border', '1px solid #a9a9a9');
                        var url = (size > 0) ? "check-stock/" + size + "/" + color : "check-stock/" + color;
                        url = "<?php echo $this->Url->build('/', true) ?>" + url;
                        if(!isNaN(color)){
                            $.ajax({
                            type: "POST",
                            url: url,
                            success: function(data) {
                                for (var i = data.length - 1; i >= 0; i--) {
                                    if (data[i].product_attribute_stock == data[i].product_attribute_sold) {
                                        sold++;
                                    }
                                }
                                if (sold > 0) {
                                    $('#add-to-cart').hide();
                                    $('#sold-out').show();
                                } else {
                                    $('#sold-out').hide();
                                    $('#add-to-cart').show();
                                }
                            },
                            error: function() {
                                console.log("error");
                            },
                            dataType: "json"
                            });
                        }
                    });
                }

                //Add the Product in Cart
                $('#add-to-cart').on('click', function() {

                    var item_order_details_id;
                    var cart_product_stocks_id;
                    var prioduct_stocks_ids = $('.stocks_id').val().split(',');

                    var car_product_stock_id = '';
                    var underscroe = '';
                    var select_color = '';
                    var select_size = '';

                    if ($('#select_color').val() == 'yes') {
                        if (jQuery.inArray(color, prioduct_stocks_ids) !== -1) {
                            car_product_stock_id = color;
                            underscroe = '_';
                        } else{
                            select_color = 'yes';
                        }
                    }

                    if ($('#select_size').val() == 'yes') {
                        if (jQuery.inArray(size, prioduct_stocks_ids) !== -1) {
                            car_product_stock_id = car_product_stock_id + underscroe + size;
                        } else{
                            select_size = 'yes';
                        }
                    }


                    if (car_product_stock_id.length == 0) {
                        $('#size_value').css('border', '2px solid #d33c44');
                        $('#color_value').css('border', '2px solid #d33c44');
                        return false;
                    } else if (select_color == 'yes') {
                        $('#color_value').css('border', '2px solid #d33c44');
                        return false;
                    } else if (select_size == 'yes') {
                        $('#size_value').css('border', '2px solid #d33c44');
                        return false;
                    } else {
                        $.ajax({
                            type: "POST",
                            data: {
                                "cart_user_id": '<?php echo ($user->id != "") ? $user->id : 0 ?>',
                                "cart_product_id": '<?php echo isset($product->products_id) ? $product->products_id : 0 ?>',
                                "cart_product_stocks_id": car_product_stock_id,
                                "cart_product_name": "<?php echo isset($product->product_name) ? $product->product_name : 0 ?>",
                                "cart_product_quantity": 1,
                                "cart_product_unit_price": '<?php echo isset($product->product_unit_sale_price) ? $product->product_unit_sale_price : 0 ?>',
                                "cart_product_total_price": '<?php echo isset($product->product_unit_sale_price) ? $product->product_unit_sale_price : 0 ?>',
                                "cart_product_image": "<?php echo isset($product->product_featured_image) ? $product->product_featured_image : 0 ?>",
                                "created_by": '<?php echo ($user->id != "") ? $user->id : 0 ?>',
                                "updated_by": '<?php echo ($user->id != "") ? $user->id : 0 ?>',
                                "in_wishlist": 0,
                                "deleted": 0
                            },
                            url: "<?= $this->Url->build('/add-to-cart', true) ?>",
                            success: function(data) {
                                item_order_details_id = data.cart_id;
                                if (data.cart_product_quantity == 1) {
                                    $('.sidebar-cart-list').append('<div class="sidebar-cart-item" id="' + item_order_details_id + '">' + '<div class="quantity">' + '<button class="inc-item"><i class="fa fa-angle-up"></i></button>' + '<input type="text" name="" value="1" readonly="" class="item-quantity">' + '<button class="dec-item"><i class="fa fa-angle-down"></i></button>' + '</div>' + '<?php echo isset($product->product_featured_image) ? $this->Html->image('/productImage/productImage/'.$product->product_featured_image, [ "alt" => "New Project", "class" => "img img-responsive" ]) : 0 ?>' + '<div class="item-details">' + '<h5 class="text-uppercase"><?php echo isset($product->product_sub_category) ? $product->product_sub_category->sub_category_name : 0 ?></h5>' + '<p><?php echo isset($product->product_name) ? $product->product_name : 0 ?></p>' + '<p>৳  <span class="price"><?php echo isset($product->product_unit_sale_price) ? $product->product_unit_sale_price : 0 ?></span></p>' + '</div>' + '<button class="cancel-order">X</button>' + '</div>');

                                    swal({
                                        title: "Successfully Added!",
                                        text: "You have successfully added Product in Cart.",
                                        type: "success",
                                        showConfirmButton: false,
                                        timer: 3000
                                    });

                                } else {
                                    var value = $(".sidebar-cart-list").children('#' + data.cart_id).children(".quantity").children("input").val();
                                    value++;
                                    $(".sidebar-cart-list").children('#' + data.cart_id).children(".quantity").children("input").val(value);

                                    swal({
                                        title: "WOW, Great!",
                                        text: "You have added this Product once again.",
                                        type: "success",
                                        showConfirmButton: false,
                                        timer: 3000
                                    });

                                }

                                var item = parseInt($('.item_total').html());
                                var item_total = item + 1;
                                $('.item_total').html(item_total);

                                var price = parseInt($('.order_total').html());
                                order_total = price + parseInt('<?php echo isset($product->product_unit_sale_price) ? $product->product_unit_sale_price : 0 ?>');
                                $('.order_total').html(order_total);
                            },
                            error: function() {
                                console.log("error");
                            },
                            dataType: "json"
                        });
                    }
                });

                //Remove the Product from Cart Page
                $(".cart-list").on('click', '.remove-order', function() {
                    var idString = $(this).parent().parent().parent().parent().attr('id');
                    var id = idString.substring(4);

                    swal({
                        title: "Are you Sure?",
                        text: "Your desired product will be removed from your cart. Please check out our social media handles to avail any offers going on at the moment.",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Yes, remove it!",
                        closeOnConfirm: false
                    },

                    function(){

                        $.ajax({
                            type: "POST",
                            url: "<?php echo $this->Url->build('/', true) ?>" + "/remove-from-cart/" + id,
                            success: function(orderDetail) {
                                console.log("Success");
                            },
                            error: function() {
                                console.log("error");
                            },
                            dataType: "json"
                        });

                        var item = parseInt($("#cart" + id).children('td').children('.input-group').children(".item-quantity").val());
                        var dec_price = parseInt($("#cart" + id).children('td').children('.price').html());

                        var item_total = parseInt($('.item_total').html());
                        var item_total = item_total - item;
                        $('.item_total').html(item_total);

                        var price = parseInt($('.order_total').html());
                        order_total = price - (dec_price * item);
                        $('.order_total').html(order_total);

                        discount(order_total);

                        $(".sidebar-cart-list").children('#' + id).remove();
                        $('#' + idString).remove();

                        swal({
                            title: "Successfully Deleted!",
                            text: "You have successfully removed the product from your cart. Please check out the other product categories for your desired items.",
                            type: "success",
                            showConfirmButton: false,
                            timer: 3000
                        });
                    });

                });

                //Remove the Product from Sidebar Cart
                $(".sidebar-cart-list").on('click', '.cancel-order', function() {
                    var id = $(this).parent().attr('id');
                    swal({
                        title: "Are you Sure?",
                        text: "Your will not be able to undo this Action.",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Yes, remove it!",
                        closeOnConfirm: false
                    },

                    function(){

                        $.ajax({
                            type: "POST",
                            url: "<?php echo $this->Url->build('/', true) ?>" + "/remove-from-cart/" + id,
                            success: function(orderDetail) {
                                console.log("Success");
                            },
                            error: function() {
                                console.log("error");
                            },
                            dataType: "json"
                        });

                        var itemQuantity = parseInt($("#"+id).children(".quantity").children(".item-quantity").val());
                        var item = parseInt($('.item_total').html());
                        var item_total = item - itemQuantity;
                        $('.item_total').html(item_total);

                        var price = parseInt($('.order_total').html());
                        var de_price = parseInt($("#"+id).children(".item-details").children("p").children('.price').html());
                        order_total = price - (de_price * itemQuantity);
                        $('.order_total').html(order_total);

                        discount(order_total);

                        $("#"+id).remove();

                        swal({
                            title: "Successfully Deleted!",
                            text: "You have successfully remove this product from Wishlist.",
                            type: "success",
                            showConfirmButton: false,
                            timer: 3000
                        });
                    });
                });

                //Increase Product Quantiy from Cart Page
                $(".cart-list").on('click', '.inc-item', function() {
                    var item = parseInt($(this).parent().siblings(".item-quantity").val());
                    
                    var inc_item = item + 1;
                    
                    var inc_price = parseInt($(this).parent().parent().parent().siblings('td').children('.price').html());
                    
                    var inc_total_price = parseInt($(this).parent().parent().parent().siblings('td').children('.total_price').html());
                    var total_price = inc_price + inc_total_price;
                    
                    var idString = $(this).parent().parent().parent().parent().attr('id');
                    var id = idString.substring(4);
                    
                    $.ajax({
                        type: "POST",
                        data: {
                            'cart_product_quantity': inc_item,
                            'cart_product_total_price': inc_item * inc_price
                        },
                        url: "<?php echo $this->Url->build('/', true) ?>" + "/update-cart-quantity/" + id,
                        success: function(data) {
                            if(data == 0){
                                swal({
                                    title: "Opps Sorry!",
                                    text: "You are crossing our stock limit.",
                                    type: "warning",
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                            }else if(data == 1){
                                $(this).parent().siblings(".item-quantity").val(inc_item);
                                $(this).parent().parent().parent().siblings('td').children('.total_price').html(total_price);
                                $("#" + id).children('.quantity').children(".item-quantity").val(inc_item);
                                var item = parseInt($('.item_total').html());
                                var item_total = item + 1;
                                $('.item_total').html(item_total);

                                var price = parseInt($('.order_total').html());
                                order_total = price + inc_price;
                                $('.order_total').html(order_total);

                                discount(order_total);
                            }
                        },
                        error: function() {
                            console.log("error");
                        },
                        dataType: "json"
                    });

                });

                //Increase Product Quantiy from Sidebar Cart
                $(".sidebar-cart-list").on('click', '.inc-item', function() {
                    var item = parseInt($(this).siblings(".item-quantity").val());
                    var inc_item = item + 1;

                    var price = parseInt($('.order_total').html());
                    var inc_price = parseInt($(this).parent().siblings(".item-details").children("p").children('.price').html());
                    order_total = price + inc_price;

                    var id = $(this).parent().parent().attr('id');
                    var This = $(this);
                    $.ajax({
                        type: "POST",
                        data: {
                            'cart_product_quantity': inc_item,
                            'cart_product_total_price': inc_item * inc_price
                        },
                        url: "<?php echo $this->Url->build('/', true) ?>" + "/update-cart-quantity/" + id,
                        success: function(data) {
                            if(data == 0){
                                swal({
                                    title: "Opps Sorry!",
                                    text: "You are crossing our stock limit.",
                                    type: "warning",
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                            }else if(data == 1){
                                This.siblings(".item-quantity").val(inc_item);
                                $('.order_total').html(order_total);
                                var item = parseInt($('.item_total').html());
                                var item_total = item + 1;
                                $('.item_total').html(item_total);
                                discount(order_total);
                            }
                        },
                        error: function() {
                            console.log("error");
                        },
                        dataType: "json"
                    });

                });

                //Decrease Product Quantiy from Cart Page
                $(".cart-list").on('click', '.dec-item', function() {
                    var item = parseInt($(this).parent().siblings(".item-quantity").val());
                    var dec_item = item - 1;
                    if (dec_item < 1) {
                        dec_item = 1;
                    }
                    $(this).parent().siblings(".item-quantity").val(dec_item);

                    var dec_price = parseInt($(this).parent().parent().parent().siblings('td').children('.price').html());

                    var dec_total_price = parseInt($(this).parent().parent().parent().siblings('td').children('.total_price').html());
                    if (item > 1) {
                        var total_price = dec_total_price - dec_price;
                    }
                    $(this).parent().parent().parent().siblings('td').children('.total_price').html(total_price);
                    
                    var idString = $(this).parent().parent().parent().parent().attr('id');
                    var id = idString.substring(4);
                    
                    $("#" + id).children('.quantity').children(".item-quantity").val(dec_item);

                    $.ajax({
                        type: "POST",
                        data: {
                            'cart_product_quantity': dec_item,
                            'cart_product_total_price': dec_item * dec_price
                        },
                        url: "<?php echo $this->Url->build('/', true) ?>" + "/update-cart-quantity/" + id,
                        success: function(orderDetail) {
                            console.log("Success");

                        },
                        error: function() {
                            console.log("error");
                        },
                        dataType: "json"
                    });

                    var item_total = parseInt($('.item_total').html());
                    if (item > 1) {
                        var item_total = item_total - 1;
                    }
                    $('.item_total').html(item_total);

                    var price = parseInt($('.order_total').html());
                    if (item > 1) {
                        order_total = price - dec_price;
                    }
                    $('.order_total').html(order_total);

                    discount(order_total);
                });

                //Decrease Product Quantiy from Sidebar Cart 
                $(".sidebar-cart-list").on('click', '.dec-item', function() {
                    var item = parseInt($(this).siblings(".item-quantity").val());
                    var dec_item = item - 1;
                    if (dec_item < 1) {
                        dec_item = 1;
                    }
                    $(this).siblings(".item-quantity").val(dec_item);

                    var price = parseInt($('.order_total').html());
                    var dec_price = parseInt($(this).parent().siblings(".item-details").children("p").children('.price').html());
                    if (item > 1) {
                        order_total = price - dec_price;
                    }
                    $('.order_total').html(order_total);

                    var id = $(this).parent().parent().attr('id');
                    $.ajax({
                        type: "POST",
                        data: {
                            'cart_product_quantity': dec_item,
                            'cart_product_total_price': dec_item * dec_price
                        },
                        url: url + "/update-cart-quantity/" + id,
                        success: function(orderDetail) {
                            console.log("Success");
                        },
                        error: function() {
                            console.log("error");
                        },
                        dataType: "json"
                    });

                    var item_total = parseInt($('.item_total').html());
                    if (item > 1) {
                        var item_total = item_total - 1;
                    }
                    $('.item_total').html(item_total);

                    discount(order_total);
                });

                $('.item_total').html('<?= $item_total ?>');
                $('.order_total').html('<?= $order_total ?>');

                discount(<?= $order_total ?>);

                //Add the Product in Wishlist
                $(".category-products-div").on("click", ".favourite-image", function(e) {
                    var idString = $(this).attr('id');
                    var id = idString.substring(3);
                    wishlistFunc(id);
                });
                $(".products-div").on("click", ".favourite-image", function(e) {
                    var idString = $(this).attr('id');
                    var id = idString.substring(3);
                    wishlistFunc(id);
                });
                $(".add-to-cart-fav").on("click", function(e) {
                    var idString = $(this).attr('id');
                    var id = idString.substring(3);
                    wishlistFunc(id);
                });
                $(".favourite-product-image").on("click", function(e) {
                    var idString = $(this).attr('id');
                    var id = idString.substring(3);
                    wishlistFunc(id);
                });

                function wishlistFunc(id) {
                    
                    $.ajax({
                        type: "POST",
                        data: {
                            'cart_user_id':' <?php echo ($user->id != "") ? $user->id : 0 ?>',
                            'cart_product_id': id,
                            'created_by': '<?php echo ($user->id != "") ? $user->id : 0 ?>',
                            'updated_by': '<?php echo ($user->id != "") ? $user->id : 0 ?>',
                            'in_wishlist': 1,
                            'deleted': 0
                        },
                        url: "<?= $this->Url->build('/add-to-wishlist', true) ?>",
                        success: function(data) {
                            if(isNaN(data)){
                                swal({
                                    title: "Successfully Added!",
                                    text: "Product successfully added in Wishlist.",
                                    type: "success",
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                            }else{
                                swal({
                                    title: "Already Exist!",
                                    text: "Product already exist in Wishlist.",
                                    type: "warning",
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                            }

                        },
                        error: function() {
                            console.log("error");
                        },
                        dataType: "json"
                    });
                }

                //Remove the Product from Wishlist
                $(".remove-fav").on('click', function() {
                    var idString = $(this).attr('id');
                    var id = idString.substring(9);

                    swal({
                        title: "Are you Sure?",
                        text: "Your will not be able to undo this Action.",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Yes, remove it!",
                        closeOnConfirm: false
                    },

                    function(){
                        $.ajax({
                            type: "POST",
                            url: "<?php echo $this->Url->build('/', true) ?>" + "/remove-from-wishlist/" + id,
                            success: function(data) {
                                var wlc = parseInt($('#wishlistCount').html());
                                wlc--;
                                parseInt($('#wishlistCount').html(wlc));
                            },
                            error: function() {
                                console.log("error");
                            },
                            dataType: "json"
                        });

                        $("#"+idString).parent().hide();

                        swal({
                            title: "Successfully Deleted!",
                            text: "You have successfully remove this product from Wishlist.",
                            type: "success",
                            showConfirmButton: false,
                            timer: 3000
                        });
                    });

                });

                //Subscribe
                function validateEmail(sub_mail) {
                    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
                    if (filter.test(sub_mail)) {
                        return true;
                    }
                    else {
                        return false;
                    }
                }
                $("#subscribe_me").on('click', function() {
                    var sub_mail = $('#sub_mail').val();
                    // console.log(sub_mail);
                    if (validateEmail(sub_mail)) {         
                        $.ajax({
                            type: "POST",
                            data: {
                                'meta_user_id': <?php echo ($user->id != "") ? $user->id : 0 ?>,
                                'sub_mail': sub_mail,
                                'created_by': <?php echo ($user->id != "") ? $user->id : 0 ?>,
                                'updated_by': <?php echo ($user->id != "") ? $user->id : 0 ?>,
                                'in_wishlist': 1,
                                'deleted': 0
                            },
                            url: url + "subscribe/",
                            success: function(data) {
                                console.log('data');
                                $('#sub_mail').val('');
                                swal({
                                    title: "Thank you!",
                                    text: "Thank you to Subbscribe us.",
                                    type: "success",
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                            },
                            error: function() {
                                console.log("error");
                            },
                            dataType: "json"
                        });
                    }
                    else {
                        swal({
                            title: "Sorry",
                            text: "You need to write a valid email.",
                            type: "info",
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                });


                // alert(order_total);

            });




            function discount(order_total){

                var delivery_charge = 60;
                var discount = parseInt('<?php echo str_replace("%","", $discount['shop_discount_rate']); ?>');
                var discount_rate = discount/100;
                var discount_amount = order_total*discount_rate;
                var grand_total = parseInt(order_total) + parseInt(delivery_charge) - parseInt(discount_amount);


                $('.discount').html(discount_amount);
                $('.delivery_charge').html(delivery_charge);
                $('.grand_total').html(grand_total);
            }
        </script>

        <?= $this->fetch('script') ?>

    </body>
</html>