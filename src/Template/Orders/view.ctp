<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Order'), ['action' => 'edit', $order->order_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Order'), ['action' => 'delete', $order->order_id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->order_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="orders view large-9 medium-8 columns content">
    <h3><?= h($order->order_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Order Payment Transaction') ?></th>
            <td><?= h($order->order_payment_transaction) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order Shipping Address') ?></th>
            <td><?= h($order->order_shipping_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order Discount Code') ?></th>
            <td><?= h($order->order_discount_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order Payment Status') ?></th>
            <td><?= h($order->order_payment_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order Deliver Status') ?></th>
            <td><?= h($order->order_deliver_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order Status') ?></th>
            <td><?= h($order->order_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= h($order->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated By') ?></th>
            <td><?= h($order->updated_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order Id') ?></th>
            <td><?= $this->Number->format($order->order_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order User Id') ?></th>
            <td><?= $this->Number->format($order->order_user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order Payment Id') ?></th>
            <td><?= $this->Number->format($order->order_payment_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order Shipping Cost') ?></th>
            <td><?= $this->Number->format($order->order_shipping_cost) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order Discount Rate') ?></th>
            <td><?= $this->Number->format($order->order_discount_rate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order Amount') ?></th>
            <td><?= $this->Number->format($order->order_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order Deduct Amount') ?></th>
            <td><?= $this->Number->format($order->order_deduct_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order Tax Amount') ?></th>
            <td><?= $this->Number->format($order->order_tax_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order Grand Total') ?></th>
            <td><?= $this->Number->format($order->order_grand_total) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= $this->Number->format($order->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($order->created_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated At') ?></th>
            <td><?= h($order->updated_at) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Order Discount Type') ?></h4>
        <?= $this->Text->autoParagraph(h($order->order_discount_type)); ?>
    </div>
</div>
