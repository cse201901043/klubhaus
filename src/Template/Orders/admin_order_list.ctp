<style>
    body {
        font-family: Arial;
    }

    /* Style the tab */
    .tab {  
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
    }

    /* Style the buttons inside the tab */
    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
    }
</style>


<div class="right_col" role="main"> <!--class="right_col" role="main"-->
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>View Full Order Details List</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>All Order Details Information
                            <small>KlubHaus</small>
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                        </ul>
                        <div class="clearfix"></div>
                    </div>


                    <div class="tab">
                        <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">All Order List</button>
                        <button class="tablinks" onclick="openCity(event, 'Paris')">Pending Order List</button>
                        <button class="tablinks" onclick="openCity(event, 'Tokyo')">Success Order List</button>
                    </div>


                    <div id="London" class="tabcontent">

                        <div class="x_content">
                            <p class="text-muted font-13 m-b-30">
                            </p>

                            <table id="datatable-responsive"
                                   class="table table-striped table-bordered dt-responsive nowrap"
                                   cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Date</th>
                                    <th width="500 px">Shipping</th>
                                    <th>Payable Amount</th>
                                    <th>Payment Status</th>
                                    <th>Status</th>
                                    <th>Pick-Up Status</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                if (isset($_GET['page'])) {
                                    $count = $_GET['page'] * 10 + 1;
                                } else {
                                    $count = 1;
                                }

                                foreach ($orders as $information) {
                                    ?>

                                    <tr>
                                        <td><?php echo $count++ ?></td>
                                        <td><?php echo date_format($information->created_at,"d F, Y h:m A") ?></td>
                                        <td><?php echo $information->order_shipping_address ?></td>
                                        <td><?php echo $information->order_grand_total ?></td>


                                        <td>
                                            <?php
                                                $status = $information->order_payment_status;

                                                if ($status == 1) :
                                                    echo "Done";
                                                else :
                                                    echo "Cash On Delivery";
                                                endif;
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                $status = $information->order_status;

                                                if ($status) :
                                                    // echo $this->Html->link('<i class="fa fa-check"></i> Confirmed', ['controller' => 'Orders', 'action' => 'orderStatusSuccess', $information->order_id], ['class' => 'label label-success', 'escape' => false]);
                                                    echo '<a href="javascript:;" class="label label-success"><i class="fa fa-check"></i> Confirmed</a>';
                                                else :
                                                    // echo $this->Html->link('<i class="fa fa-times"></i> Pending', ['controller' => 'Orders', 'action' => 'orderStatusPending', $information->order_id], ['class' => 'label label-danger', 'escape' => false]);
                                                    echo '<a href="javascript:;" class="label label-danger order-confirmation" data-id='. $information->order_id .' data-target="#confirm-order" data-toggle="modal"><i class="fa fa-times"></i> Pending</a>';
                                                endif;
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                $status = $information->order_deliver_status;

                                                if ($status) :
                                                    echo $this->Html->link('<i class="fa fa-check"></i> Success', [], ['class' => 'label label-success', 'escape' => false]);
                                                else :
                                                    echo $this->Html->link('<i class="fa fa-times"></i> Pending', [], ['class' => 'label label-danger', 'escape' => false]);
                                                endif;
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $this->Html->link('<i class="fa fa-folder"></i> View Details', ['controller' => 'OrderDetails', 'action' => 'AdminsingleViewProduct', $information->order_id], ['class' => 'btn btn-primary btn-xs', 'escape' => false]) ?>


                                            <?php echo $this->Html->link('<i class="fa fa-folder"></i> User Details', ['controller' => 'Orders', 'action' => 'userOrderInfo', $information->order_id], ['class' => 'btn btn-primary btn-xs', 'escape' => false]) ?>


                                            <a href="<?php echo $this->Url->build('/', true) ?>Orders/AdminDeleteOrder/<?php echo $information->order_id ?>"
                                            onclick="return checkDelete()" class="btn btn-danger btn-xs"><i
                                                        class="fa fa-trash-o"></i> Delete
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
                    <div id="Paris" class="tabcontent">
                        <div class="x_content">
                            <p class="text-muted font-13 m-b-30">
                            </p>

                            <table id="datatable-responsive"
                                   class="table table-striped table-bordered dt-responsive nowrap"
                                   cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Date</th>
                                    <th>Shipping</th>
                                    <th>Amount( BDT )</th>
                                    <th>Status</th>
                                    <th>Pick Up Status</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                if (isset($_GET['page'])) {
                                    $count = $_GET['page'] * 10 + 1;
                                } else {
                                    $count = 1;
                                }

                                foreach ($pendingOrder as $information) {
                                    ?>

                                    <tr>
                                        <td><?php echo $count++ ?></td>
                                        <td><?php echo date_format($information->created_at,"d F, Y h:m A") ?></td>
                                        <td><?php echo $information->order_shipping_address ?></td>
                                        <td><?php echo $information->order_amount ?></td>


                                        <td>
                                            <?php
                                            $status = $information->order_status;

                                            if ($status) :
                                                ?>


                                                <?php echo $this->Html->link('<i class="fa fa-check"></i> Success', ['controller' => 'Orders', 'action' => 'orderStatusSuccess', $information->order_id], ['class' => 'label label-success', 'escape' => false]) ?>


                                            <?php
                                            else :
                                                ?>

                                                <?php echo $this->Html->link('<i class="fa fa-times"></i> Pending', ['controller' => 'Orders', 'action' => 'orderStatusPending', $information->order_id], ['class' => 'label label-danger', 'escape' => false]) ?>


                                            <?php
                                            endif;
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $status = $information->order_deliver_status;

                                            if ($status) :
                                                ?>


                                                <!--                                            --><?php //echo $this->Html->link('<i class="fa fa-check"></i> Success', ['controller' => 'Orders', 'action' => 'orderDeliverStatusSuccess', $information->order_id], ['class' => 'label label-success', 'escape' => false])
                                                ?>

                                                <?php echo $this->Html->link('<i class="fa fa-check"></i> Success', [], ['class' => 'label label-success', 'escape' => false]) ?>

                                            <?php
                                            else :
                                                ?>

                                                <!--                                            --><?php //echo $this->Html->link('<i class="fa fa-times"></i> Pending', ['controller' => 'Orders', 'action' => 'orderDeliverStatusPending', $information->order_id], ['class' => 'label label-danger', 'escape' => false])
                                                ?>

                                                <?php echo $this->Html->link('<i class="fa fa-times"></i> Pending', [], ['class' => 'label label-danger', 'escape' => false]) ?>

                                            <?php
                                            endif;
                                            ?>
                                        </td>
                                        <td>

                                            <?php echo $this->Html->link('<i class="fa fa-folder"></i> View Details', ['controller' => 'OrderDetails', 'action' => 'AdminsingleViewProduct', $information->order_id], ['class' => 'btn btn-primary btn-xs', 'escape' => false]) ?>
                                            <a href="<?php echo $this->Url->build('/', true) ?>Orders/AdminDeleteOrder/<?php echo $information->order_id ?>"
                                               class="btn btn-danger btn-xs"><i
                                                        class="fa fa-trash-o"></i> Delete
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

                    <div id="Tokyo" class="tabcontent">
                        <div class="x_content">
                            <p class="text-muted font-13 m-b-30">
                            </p>

                            <table id="datatable-responsive"
                                   class="table table-striped table-bordered dt-responsive nowrap"
                                   cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Date</th>
                                    <th>Shipping</th>
                                    <th>Amount( BDT )</th>
                                    <th>Status</th>
                                    <th>Pick Up Status</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                if (isset($_GET['page'])) {
                                    $count = $_GET['page'] * 10 + 1;
                                } else {
                                    $count = 1; 
                                }

                                foreach ($successOrder as $information) {
                                    ?>

                                    <tr>
                                        <td><?php echo $count++ ?></td>
                                        <td><?php echo $information->created_at ?></td>
                                        <td><?php echo $information->order_shipping_address ?></td>
                                        <td><?php echo $information->order_amount ?></td>


                                        <td>
                                            <?php
                                            $status = $information->order_status;

                                            if ($status) :
                                                ?>


                                                <?php echo $this->Html->link('<i class="fa fa-check"></i> Success', ['controller' => 'Orders', 'action' => 'orderStatusSuccess', $information->order_id], ['class' => 'label label-success', 'escape' => false]) ?>


                                            <?php
                                            else :
                                                ?>

                                                <?php echo $this->Html->link('<i class="fa fa-times"></i> Pending', ['controller' => 'Orders', 'action' => 'orderStatusPending', $information->order_id], ['class' => 'label label-danger', 'escape' => false]) ?>


                                            <?php
                                            endif;
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $status = $information->order_deliver_status;

                                            if ($status == 1) :
                                                ?>
                                                <span class="label label-success"><i class="fa fa-times"></i> Success</span>

                                            <?php
                                            elseif ($status == 2) :
                                                ?>
                                                <span class="label label-warning"><i class="fa fa-times"></i> Picked</span>

                                            <?php
                                            else :
                                                ?>

                                                <span class="label label-danger"><i class="fa fa-times"></i> Pending</span>

                                            <?php
                                            endif;
                                            ?>
                                        </td>
                                        <td>

                                            <?php echo $this->Html->link('<i class="fa fa-folder"></i> View Details', ['controller' => 'OrderDetails', 'action' => 'AdminsingleViewProduct', $information->order_id], ['class' => 'btn btn-primary btn-xs', 'escape' => false]) ?>
                                            <a href="<?php echo $this->Url->build('/', true) ?>Orders/AdminDeleteOrder/<?php echo $information->order_id ?>"
                                               class="btn btn-danger btn-xs"><i
                                                        class="fa fa-trash-o"></i> Delete
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
</div>

<!-- Modal -->
<div class="modal fade" id="confirm-order" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Confirm Order</h4>
        </div>
        <div class="modal-body">
          <form action="<?php echo $this->Url->build('/', true) ?>orders/order-status-pending" method="post">
               <center>
                  <input type="hidden" name="order_id" id="orderId" value="">
                  <h4>Select Shop to pick up product(s)</h4>
                  <label class="radio-inline">
                    <input type="radio" name="shop_id" value="237051">Bashundhara City Shopping Mall
                  </label>
                  <!-- <label class="radio-inline">
                    <input type="radio" name="shop_id" value="419" readonly>Jamuna Future Park
                  </label> -->
              </center>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success pull-left">Confirm</button>
          </form>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cencel</button>
        </div>
      </div>
      
    </div>
</div>


<?php $this->start('script'); ?>
<script>
    document.getElementById("defaultOpen").click();
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    $(document).on("click", ".order-confirmation", function () {
         var orderId = $(this).data('id');
         console.log(orderId);
         $(".modal-body #orderId").val(orderId );
    });
</script>
<?php $this->end(); ?>