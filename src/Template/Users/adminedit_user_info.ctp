<div> <!--class="right_col" role="main"-->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit This User</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <form class="form-horizontal form-label-left" novalidate
                              action="<?php echo $this->Url->build('/', true) ?>users/AdminsingleEditUser" method="post">
                            <span class="section">Edit User Information</span>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span
                                        class="required">*</span>
                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control"
                                           name="name" value="<?php echo $user->name; ?>"
                                           placeholder="" required="required" type="text">
                                </div>

                                <input type="hidden" name="id" value="<?php echo $user->id; ?>">
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" id="email" required="required"
                                           value="<?php echo $user->email; ?>"
                                           class="form-control col-md-7 col-xs-12" name="email">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Mobile No
                                    <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="telephone" name="user_mobile" required="required"
                                           value="<?php echo $user->user_mobile; ?>" data-validate-length-range="8,20"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">User Role
                                    <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <select required="required" name="user_role"
                                            class="form-control col-md-7 col-xs-12"
                                            id="appendSubCatId">


                                        <option value="<?php echo $user->user_role; ?>"><?php echo $user->user_role; ?></option>


                            
                                        <option value="admin">Admin</option>
                                        


                                    </select>
                                </div>
                            </div>


                            <div class="ln_solid"></div>
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
        </div>
    </div>
</div>

<?= $this->Html->script('vendors/jquery/dist/jquery.min.js') ?>

<?= $this->Html->script('vendors/bootstrap/dist/js/bootstrap.min.js') ?>

<?= $this->Html->script('vendors/fastclick/lib/fastclick.js') ?>

<?= $this->Html->script('vendors/nprogress/nprogress.js') ?>

<?= $this->Html->script('vendors/validator/validator.js') ?>





<?= $this->Html->css('vendors/font-awesome/css/font-awesome.min.css') ?>

<?= $this->Html->css('vendors/nprogress/nprogress.css') ?>

<?= $this->Html->css('vendors/css/custom.min.css') ?>


