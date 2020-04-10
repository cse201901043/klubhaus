<div class="right_col" role="main"> <!--class="right_col" role="main"-->
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>View Full Shop Discount List</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>All Shop Discount Information
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
                                <th>Shop Discount Name</th>
                                <th>Shop Discount Code</th>
                                <th>Shop Discount Rate</th>
                                <th>Shop Discount From</th>
                                <th>Shop Discount To</th>
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
                            foreach ($shopDiscount as $information) {
                                ?>

                                <tr>
                                    <td><?php echo $count++ ?></td>
                                    <td><?php echo $information->shop_discount_name ?></td>
                                    <td><?php echo $information->shop_discount_code ?></td>
                                    <td><?php echo $information->shop_discount_rate ?></td>
                                    <td><?php echo date_format($information->shop_discount_from, "Y-m-d") ?></td>
                                    <td><?php echo date_format($information->shop_discount_to, "Y-m-d") ?></td>

                                    <td>
                                        <?php echo $this->Html->link('<i class="fa fa-repeat"></i> Edit', ['controller' => 'ShopDiscounts', 'action' => 'singleEditShopDiscount', $information->shop_discount_id], ['class' => 'btn btn-info btn-xs', 'escape' => false]) ?>
                                        <?php
                                        $status = $information->deleted;

                                        if ($status) :
                                            ?>
                                            <?php echo $this->Html->link('<i class="fa fa-times"></i> Not Published', ['controller' => 'ShopDiscounts', 'action' => 'discountPublished', $information->shop_discount_id], ['class' => 'label label-danger', 'escape' => false]) ?>
                                        <?php
                                        else :
                                            ?>
                                            <?php echo $this->Html->link('<i class="fa fa-check"></i> Published', ['controller' => 'ShopDiscounts', 'action' => 'discountsNotPublished', $information->shop_discount_id], ['class' => 'label label-success', 'escape' => false]) ?>
                                            
                                        <?php
                                        endif;
                                        ?>
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