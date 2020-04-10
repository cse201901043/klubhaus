
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
                                <th>User Name</th>
                                <th>User Mobile</th>
                                <th>User Email</th>
                            </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td><?php echo $orderProduct['name'] ?></td>
                                    <td><?php echo $orderProduct['user_mobile'] ?></td>
                                    <td><?php echo $orderProduct['email'] ?></td>
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>