<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>KLUBHAUS</title>

    <!-- Bootstrap -->

    <?= $this->Html->css('vendors/bootstrap/dist/css/bootstrap.min.css') ?>

    <?= $this->Html->css('vendors/font-awesome/css/font-awesome.min.css') ?>

    <?= $this->Html->css('vendors/nprogress/nprogress.css') ?>

    <?= $this->Html->css('vendors/iCheck/skins/flat/green.css') ?>

    <?= $this->Html->css('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') ?>

    <?= $this->Html->css('vendors/jqvmap/dist/jqvmap.min.css') ?>

    <?= $this->Html->css('vendors/bootstrap-daterangepicker/daterangepicker.css') ?>

    <?= $this->Html->css('template/build/css/custom.min.css') ?>

    <?= $this->Html->css('chosen/chosen.css') ?>

    <?= $this->Html->css('chosen/chosen.min.css') ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>




<script type="text/javascript">
		function checkDelete() {
			var chk = confirm('Are You Sure To Delete This Recode ?')

			if (chk) {
				return true;
			}
			else {
				return false;
			}

		}

		// function checkUpdate(){
		// 	var chk = confirm('Are You Sure To Update This Recode ?')

		// 	if (chk) {
		// 		return true;
		// 	}
		// 	else {
		// 		return false;
		// 	}
		// }

		// function checkAccept() {
		// 	var chk = confirm('Are You Sure To Change This Recode ?')

		// 	if (chk) {
		// 		return true;
		// 	}
		// 	else {
		// 		return false;
		// 	}
		// }

	</script>






</head>


<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="#" class="site_title"><i class="fa fa-home"></i> <span>KH Admin</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <!--                        <img src="" alt="..." class="img-circle profile_img">-->

                        <?php echo $this->Html->image('admin.png', ['class' => 'img-circle profile_img'], ['alt' => '...']) ?>


                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2>Admin</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <li><?php echo $this->Html->link('<i class="fa fa-home"></i> DashBoard', ['controller' => 'Users', 'action' => 'admin_home'], ['escape' => false]); ?></li>
                            <li><a><i class="fa fa-edit"></i> Product <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li>
                                        <?php echo $this->Html->link('Attribute Settings', ['controller' => 'AttributeClasses', 'action' => 'AdminAttributeSettings']); ?>
                                    </li>
                                    <li>
                                        <?php echo $this->Html->link('Add Product', ['controller' => 'ProductCategories', 'action' => 'AdminaddProduct']); ?>
                                    </li>

                                    <li>
                                        <?php echo $this->Html->link('Product List', ['controller' => 'ShopProducts', 'action' => 'AdminviewProductList']); ?>
                                    </li>

                                    
                                     <li>
                                     <?php echo $this->Html->link('View Slider Image List', ['controller' => 'ProductMetas', 'action' => 'coverimagelistview']); ?>
                                    </li>

                                    <li>
                                        <?php echo $this->Html->link('Advanced Edit', ['controller' => 'AttributeValues', 'action' => 'AdminadvancedEdit']); ?>
                                    </li>

                                    <li>
                                        <?php echo $this->Html->link('Add Community', ['controller' => 'Community', 'action' => 'addCommunity']); ?>
                                    </li>

                                    <li>
                                        <?php echo $this->Html->link('View Community', ['controller' => 'Community', 'action' => 'viewCommunity']); ?>
                                    </li>

                                     <!-- <li>
                                        <?php echo $this->Html->link('Add Baner Image', ['controller' => 'ProductSubCategories', 'action' => 'addBanerImageView']); ?>
                                    </li> -->

                                    <!--<li>-->
                                    <!--    <?php echo $this->Html->link('Download Instagram Image', ['controller' => 'ShopProducts', 'action' => 'AdmininstaDownload']); ?>-->
                                    <!--</li>-->
                                
                                </ul>
                            </li>
                            <li><a><i class="fa fa-bar-chart-o"></i> Shop Discounts <span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li>
                                        <?php echo $this->html->link('Add', ['controller' => 'ShopDiscounts', 'action' => 'addShopDiscounts']); ?>
                                    </li>
                                    <li>
                                        <?php echo $this->html->link('List', ['controller' => 'ShopDiscounts', 'action' => 'shopDiscountsListView']); ?>
                                    </li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-desktop"></i> Order <span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li>
                                        <?php echo $this->Html->link('Order Details', ['controller' => 'Orders', 'action' => 'AdminOrderList']); ?>
                                    </li>
                                    <!-- <li>
                                        <?php echo $this->Html->link('Order Record', ['controller' => 'Orders', 'action' => 'AdminorderRecord']); ?>
                                    </li> -->
                                </ul>
                            </li>
                            <li><a><i class="fa fa-table"></i> User <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li>
                                        <?php echo $this->html->link('Add User', ['controller' => 'Users', 'action' => 'AdminUsersAdd']); ?>
                                    </li>
                                    <li>
                                        <?php echo $this->html->link('View User', ['controller' => 'Users', 'action' => 'AdminViewUserList']); ?>
                                    </li>
                                </ul>
                            </li>
                            <!-- <li><a><i class="fa fa-bar-chart-o"></i> Store <span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">

                                    <li><a href="#">Other Charts</a></li>
                                </ul>
                            </li> -->
                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <!-- <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a> -->
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">

                                <?php echo $this->Html->image('admin.png', ['alt' => '...']) ?>

                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="javascript:;"> Profile</a></li>
                                <!--                                <li>-->
                                <!--                                    <a href="javascript:;">-->
                                <!--                                        <span class="badge bg-red pull-right">50%</span>-->
                                <!--                                        <span>Settings</span>-->
                                <!--                                    </a>-->
                                <!--                                </li>-->
                                <!--                                <li><a href="javascript:;">Help</a></li>-->
                                <li><?php echo $this->html->link('Log Out', ['controller' => 'Users', 'action' => 'AdminLogout']); ?>

                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>

        </div>

        <!-- /top navigation -->

        <!-- page content -->

        <?= $this->fetch('content') ?>


        <!-- /page content -->

        <!-- footer content -->


        <footer>
            <div class="pull-right">
                klubhaus
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>


<?= $this->fetch('script') ?>
<!-- jQuery -->
<?= $this->Html->script('vendors/jquery/dist/jquery.min.js') ?>

<!--<script src="../vendors/jquery/dist/jquery.min.js"></script>-->
<!-- Bootstrap -->
<?= $this->Html->script('vendors/bootstrap/dist/js/bootstrap.min.js') ?>

<?= $this->Html->script('vendors/fastclick/lib/fastclick.js') ?>

<?= $this->Html->script('vendors/nprogress/nprogress.js') ?>


<?= $this->Html->script('vendors/Chart.js/dist/Chart.min.js') ?>


<?= $this->Html->script('vendors/gauge.js/dist/gauge.min.js') ?>


<?= $this->Html->script('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') ?>

<?= $this->Html->script('vendors/iCheck/icheck.min.js') ?>

<?= $this->Html->script('vendors/skycons/skycons.js') ?>

<?= $this->Html->script('chosen/chosen.jquery.min.js') ?>

<?= $this->Html->script('chosen/chosen.jquery.js') ?>

<?= $this->Html->script('chosen/chosen.proto.js') ?>

<?= $this->Html->script('chosen/chosen.proto.min.js') ?>


<!--<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>-->
<!-- FastClick -->
<!--<script src="../vendors/fastclick/lib/fastclick.js"></script>-->
<!-- NProgress -->
<!--<script src="../vendors/nprogress/nprogress.js"></script>-->
<!-- Chart.js -->
<!--<script src="../vendors/Chart.js/dist/Chart.min.js"></script>-->
<!-- gauge.js -->
<!--<script src="../vendors/gauge.js/dist/gauge.min.js"></script>-->
<!-- bootstrap-progressbar -->
<!--<script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>-->
<!-- iCheck -->
<!--<script src="../vendors/iCheck/icheck.min.js"></script>-->
<!-- Skycons -->


<?= $this->Html->script('vendors/Flot/jquery.flot.js') ?>
<?= $this->Html->script('vendors/Flot/jquery.flot.pie.js') ?>
<?= $this->Html->script('vendors/Flot/jquery.flot.time.js') ?>
<?= $this->Html->script('vendors/Flot/jquery.flot.stack.js') ?>
<?= $this->Html->script('vendors/Flot/jquery.flot.resize.js') ?>
<?= $this->Html->script('vendors/flot.orderbars/js/jquery.flot.orderBars.js') ?>
<?= $this->Html->script('vendors/flot-spline/js/jquery.flot.spline.min.js') ?>
<?= $this->Html->script('vendors/flot.curvedlines/curvedLines.js') ?>
<?= $this->Html->script('vendors/DateJS/build/date.js') ?>
<?= $this->Html->script('vendors/jqvmap/dist/jquery.vmap.js') ?>
<?= $this->Html->script('vendors/jqvmap/dist/maps/jquery.vmap.world.js') ?>
<?= $this->Html->script('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') ?>
<?= $this->Html->script('vendors/moment/min/moment.min.js') ?>
<?= $this->Html->script('template/build/js/custom.min.js') ?>
<?= $this->Html->script('vendors/bootstrap-daterangepicker/daterangepicker.js') ?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<!--<script src="../vendors/skycons/skycons.js"></script>-->
<!-- Flot -->
<!--<script src="../vendors/Flot/jquery.flot.js"></script>-->
<!--<script src="../vendors/Flot/jquery.flot.pie.js"></script>-->
<!--<script src="../vendors/Flot/jquery.flot.time.js"></script>-->
<!--<script src="../vendors/Flot/jquery.flot.stack.js"></script>-->
<!--<script src="../vendors/Flot/jquery.flot.resize.js"></script>-->
<!-- Flot plugins -->
<!--<script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>-->
<!--<script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>-->
<!--<script src="../vendors/flot.curvedlines/curvedLines.js"></script>-->
<!-- DateJS -->
<!--<script src="../vendors/DateJS/build/date.js"></script>-->
<!-- JQVMap -->
<!--<script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>-->
<!--<script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>-->
<!--<script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>-->
<!-- bootstrap-daterangepicker -->
<!--<script src="../vendors/moment/min/moment.min.js"></script>-->
<!--<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>-->

<!-- Custom Theme Scripts -->
<!--<script src="../build/js/custom.min.js"></script>-->


</html>