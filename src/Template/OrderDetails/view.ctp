<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrderDetail $orderDetail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Order Detail'), ['action' => 'edit', $orderDetail->order_details_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Order Detail'), ['action' => 'delete', $orderDetail->order_details_id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderDetail->order_details_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Order Details'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order Detail'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="orderDetails view large-9 medium-8 columns content">
    <h3><?= h($orderDetail->order_details_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Order') ?></th>
            <td><?= $orderDetail->has('order') ? $this->Html->link($orderDetail->order->order_id, ['controller' => 'Orders', 'action' => 'view', $orderDetail->order->order_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order Product Stocks Id') ?></th>
            <td><?= h($orderDetail->order_product_stocks_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order Product Name') ?></th>
            <td><?= h($orderDetail->order_product_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order Product Image') ?></th>
            <td><?= h($orderDetail->order_product_image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= h($orderDetail->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated By') ?></th>
            <td><?= h($orderDetail->updated_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order Details Id') ?></th>
            <td><?= $this->Number->format($orderDetail->order_details_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order User Id') ?></th>
            <td><?= $this->Number->format($orderDetail->order_user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order Product Id') ?></th>
            <td><?= $this->Number->format($orderDetail->order_product_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order Product Quantity') ?></th>
            <td><?= $this->Number->format($orderDetail->order_product_quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order Product Unit Price') ?></th>
            <td><?= $this->Number->format($orderDetail->order_product_unit_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order Product Total Price') ?></th>
            <td><?= $this->Number->format($orderDetail->order_product_total_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= $this->Number->format($orderDetail->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($orderDetail->created_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated At') ?></th>
            <td><?= h($orderDetail->updated_at) ?></td>
        </tr>
    </table>
</div>
