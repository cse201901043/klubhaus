<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductDiscount $productDiscount
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product Discount'), ['action' => 'edit', $productDiscount->product_discount_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product Discount'), ['action' => 'delete', $productDiscount->product_discount_id], ['confirm' => __('Are you sure you want to delete # {0}?', $productDiscount->product_discount_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Product Discounts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Discount'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productDiscounts view large-9 medium-8 columns content">
    <h3><?= h($productDiscount->product_discount_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Discount Type') ?></th>
            <td><?= h($productDiscount->discount_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Discount Rate') ?></th>
            <td><?= h($productDiscount->discount_rate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= h($productDiscount->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated By') ?></th>
            <td><?= h($productDiscount->updated_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Discount Id') ?></th>
            <td><?= $this->Number->format($productDiscount->product_discount_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Discount Type Id') ?></th>
            <td><?= $this->Number->format($productDiscount->discount_type_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= $this->Number->format($productDiscount->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($productDiscount->created_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated At') ?></th>
            <td><?= h($productDiscount->updated_at) ?></td>
        </tr>
    </table>
</div>
