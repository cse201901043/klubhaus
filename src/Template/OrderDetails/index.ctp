<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrderDetail[]|\Cake\Collection\CollectionInterface $orderDetails
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Order Detail'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orderDetails index large-9 medium-8 columns content">
    <h3><?= __('Order Details') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('order_details_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_product_stocks_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_product_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_product_quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_product_unit_price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_product_total_price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_product_image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orderDetails as $orderDetail): ?>
            <tr>
                <td><?= $this->Number->format($orderDetail->order_details_id) ?></td>
                <td><?= $this->Number->format($orderDetail->order_user_id) ?></td>
                <td><?= $orderDetail->has('order') ? $this->Html->link($orderDetail->order->order_id, ['controller' => 'Orders', 'action' => 'view', $orderDetail->order->order_id]) : '' ?></td>
                <td><?= $this->Number->format($orderDetail->order_product_id) ?></td>
                <td><?= h($orderDetail->order_product_stocks_id) ?></td>
                <td><?= h($orderDetail->order_product_name) ?></td>
                <td><?= $this->Number->format($orderDetail->order_product_quantity) ?></td>
                <td><?= $this->Number->format($orderDetail->order_product_unit_price) ?></td>
                <td><?= $this->Number->format($orderDetail->order_product_total_price) ?></td>
                <td><?= h($orderDetail->order_product_image) ?></td>
                <td><?= h($orderDetail->created_by) ?></td>
                <td><?= h($orderDetail->updated_by) ?></td>
                <td><?= h($orderDetail->created_at) ?></td>
                <td><?= h($orderDetail->updated_at) ?></td>
                <td><?= $this->Number->format($orderDetail->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $orderDetail->order_details_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $orderDetail->order_details_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $orderDetail->order_details_id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderDetail->order_details_id)]) ?>
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
