<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductStocksDetail[]|\Cake\Collection\CollectionInterface $productStocksDetails
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Product Stocks Detail'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productStocksDetails index large-9 medium-8 columns content">
    <h3><?= __('Product Stocks Details') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('product_stocks_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stocks_product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stocks_attribute_class_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stocks_attribute_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stocks_attribute_field_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_attribute_stock') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_attribute_sold') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productStocksDetails as $productStocksDetail): ?>
            <tr>
                <td><?= $this->Number->format($productStocksDetail->product_stocks_id) ?></td>
                <td><?= $this->Number->format($productStocksDetail->stocks_product_id) ?></td>
                <td><?= $this->Number->format($productStocksDetail->stocks_attribute_class_id) ?></td>
                <td><?= $this->Number->format($productStocksDetail->stocks_attribute_type_id) ?></td>
                <td><?= $this->Number->format($productStocksDetail->stocks_attribute_field_id) ?></td>
                <td><?= $this->Number->format($productStocksDetail->product_attribute_stock) ?></td>
                <td><?= $this->Number->format($productStocksDetail->product_attribute_sold) ?></td>
                <td><?= h($productStocksDetail->created_by) ?></td>
                <td><?= h($productStocksDetail->updated_by) ?></td>
                <td><?= h($productStocksDetail->created_at) ?></td>
                <td><?= h($productStocksDetail->updated_at) ?></td>
                <td><?= $this->Number->format($productStocksDetail->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $productStocksDetail->product_stocks_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productStocksDetail->product_stocks_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productStocksDetail->product_stocks_id], ['confirm' => __('Are you sure you want to delete # {0}?', $productStocksDetail->product_stocks_id)]) ?>
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
