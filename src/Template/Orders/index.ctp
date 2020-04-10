<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order[]|\Cake\Collection\CollectionInterface $orders
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Order'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orders index large-9 medium-8 columns content">
    <h3><?= __('Orders') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('order_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_payment_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_payment_transaction') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_shipping_cost') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_shipping_address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_discount_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_discount_rate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_deduct_amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_tax_amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_grand_total') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_payment_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_deliver_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
            <tr>
                <td><?= $this->Number->format($order->order_id) ?></td>
                <td><?= $this->Number->format($order->order_user_id) ?></td>
                <td><?= $this->Number->format($order->order_payment_id) ?></td>
                <td><?= h($order->order_payment_transaction) ?></td>
                <td><?= $this->Number->format($order->order_shipping_cost) ?></td>
                <td><?= h($order->order_shipping_address) ?></td>
                <td><?= h($order->order_discount_code) ?></td>
                <td><?= $this->Number->format($order->order_discount_rate) ?></td>
                <td><?= $this->Number->format($order->order_amount) ?></td>
                <td><?= $this->Number->format($order->order_deduct_amount) ?></td>
                <td><?= $this->Number->format($order->order_tax_amount) ?></td>
                <td><?= $this->Number->format($order->order_grand_total) ?></td>
                <td><?= h($order->order_payment_status) ?></td>
                <td><?= h($order->order_deliver_status) ?></td>
                <td><?= h($order->order_status) ?></td>
                <td><?= h($order->created_by) ?></td>
                <td><?= h($order->updated_by) ?></td>
                <td><?= h($order->created_at) ?></td>
                <td><?= h($order->updated_at) ?></td>
                <td><?= $this->Number->format($order->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $order->order_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $order->order_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $order->order_id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->order_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
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
