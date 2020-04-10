<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShopDiscount[]|\Cake\Collection\CollectionInterface $shopDiscounts
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Shop Discount'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="shopDiscounts index large-9 medium-8 columns content">
    <h3><?= __('Shop Discounts') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('shop_discount_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('shop_discount_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('shop_discount_slug') ?></th>
                <th scope="col"><?= $this->Paginator->sort('shop_discount_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('shop_discount_rate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('shop_discount_from') ?></th>
                <th scope="col"><?= $this->Paginator->sort('shop_discount_to') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($shopDiscounts as $shopDiscount): ?>
            <tr>
                <td><?= $this->Number->format($shopDiscount->shop_discount_id) ?></td>
                <td><?= h($shopDiscount->shop_discount_name) ?></td>
                <td><?= h($shopDiscount->shop_discount_slug) ?></td>
                <td><?= h($shopDiscount->shop_discount_code) ?></td>
                <td><?= h($shopDiscount->shop_discount_rate) ?></td>
                <td><?= h($shopDiscount->shop_discount_from) ?></td>
                <td><?= h($shopDiscount->shop_discount_to) ?></td>
                <td><?= h($shopDiscount->created_by) ?></td>
                <td><?= h($shopDiscount->updated_by) ?></td>
                <td><?= h($shopDiscount->created_at) ?></td>
                <td><?= h($shopDiscount->updated_at) ?></td>
                <td><?= $this->Number->format($shopDiscount->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $shopDiscount->shop_discount_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $shopDiscount->shop_discount_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $shopDiscount->shop_discount_id], ['confirm' => __('Are you sure you want to delete # {0}?', $shopDiscount->shop_discount_id)]) ?>
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
