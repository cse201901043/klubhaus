<div class="right_col" role="main"> <!--class="right_col" role="main"-->
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>View Full User List</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>All User Information
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
                                <th>User Name</th>
                                <th>User Status</th>
                                <th>User Role</th>
                                <th>User Email</th>
                                <th>User Mobile</th>

                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            if(isset( $_GET['page'])){
                                $count = $_GET['page']*10+1;
                            }else{
                                $count = 1;
                            }
                            foreach ($userList

                                     as $information) {


                                ?>

                                <tr>
                                    <td><?php echo $count++ ?></td>
                                    <td><?php echo $information->name ?></td>

                                    <td>
                                        <?php
                                        $status = $information->status;

                                        if ($status) :
                                            ?>

                                            <a href="<?php echo $this->Url->build('/', true) ?>users/AdminUserStatusNotPublish/<?php echo $information->id ?>"
                                               class="label label-danger"><i class="fa fa-times"></i> Disable </a>
                                        <?php
                                        else :
                                            ?>

                                            
                                               
                                            <a href="<?php echo $this->Url->build('/', true) ?>users/AdminUserStatusPublish/<?php echo $information->id ?>"
                                               class="label label-success"><i class="fa fa-check"></i>
                                                Active </a>
                                        <?php
                                        endif;
                                        ?>

                                    </td>

                                    <td><?php echo $information->user_role ?></td>
                                    <td><?php echo $information->email ?></td>
                                    <td><?php echo $information->user_mobile ?></td>
                                    <td>
                                        <a href="<?php echo $this->Url->build('/', true) ?>users/AdmineditUserInfo/<?php echo $information->id ?>"
                                           class="btn btn-info btn-xs"><i
                                                class="fa fa-repeat"></i>
                                            Edit </a>

                                        <a href="<?php echo $this->Url->build('/', true) ?>users/AdminDeleteUser/<?php echo $information->id ?>"
                                        onclick="return checkDelete()" class="btn btn-danger btn-xs"><i
                                                class="fa fa-trash-o" ></i> Delete
                                        </a>
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

