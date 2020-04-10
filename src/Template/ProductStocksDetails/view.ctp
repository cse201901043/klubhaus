<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductStocksDetail $productStocksDetail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product Stocks Detail'), ['action' => 'edit', $productStocksDetail->product_stocks_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product Stocks Detail'), ['action' => 'delete', $productStocksDetail->product_stocks_id], ['confirm' => __('Are you sure you want to delete # {0}?', $productStocksDetail->product_stocks_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Product Stocks Details'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Stocks Detail'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productStocksDetails view large-9 medium-8 columns content">
    <h3><?= h($productStocksDetail->product_stocks_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= h($productStocksDetail->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated By') ?></th>
            <td><?= h($productStocksDetail->updated_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Stocks Id') ?></th>
            <td><?= $this->Number->format($productStocksDetail->product_stocks_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stocks Product Id') ?></th>
            <td><?= $this->Number->format($productStocksDetail->stocks_product_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stocks Attribute Class Id') ?></th>
            <td><?= $this->Number->format($productStocksDetail->stocks_attribute_class_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stocks Attribute Type Id') ?></th>
            <td><?= $this->Number->format($productStocksDetail->stocks_attribute_type_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stocks Attribute Field Id') ?></th>
            <td><?= $this->Number->format($productStocksDetail->stocks_attribute_field_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Attribute Stock') ?></th>
            <td><?= $this->Number->format($productStocksDetail->product_attribute_stock) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Attribute Sold') ?></th>
            <td><?= $this->Number->format($productStocksDetail->product_attribute_sold) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= $this->Number->format($productStocksDetail->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($productStocksDetail->created_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated At') ?></th>
            <td><?= h($productStocksDetail->updated_at) ?></td>
        </tr>
    </table>
</div>
