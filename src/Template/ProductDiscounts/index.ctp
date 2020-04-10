<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductDiscount[]|\Cake\Collection\CollectionInterface $productDiscounts
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Product Discount'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productDiscounts index large-9 medium-8 columns content">
    <h3><?= __('Product Discounts') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('product_discount_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('discount_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('discount_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('discount_rate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productDiscounts as $productDiscount): ?>
            <tr>
                <td><?= $this->Number->format($productDiscount->product_discount_id) ?></td>
                <td><?= h($productDiscount->discount_type) ?></td>
                <td><?= $this->Number->format($productDiscount->discount_type_id) ?></td>
                <td><?= h($productDiscount->discount_rate) ?></td>
                <td><?= h($productDiscount->created_by) ?></td>
                <td><?= h($productDiscount->updated_by) ?></td>
                <td><?= h($productDiscount->created_at) ?></td>
                <td><?= h($productDiscount->updated_at) ?></td>
                <td><?= $this->Number->format($productDiscount->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $productDiscount->product_discount_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productDiscount->product_discount_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productDiscount->product_discount_id], ['confirm' => __('Are you sure you want to delete # {0}?', $productDiscount->product_discount_id)]) ?>
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
