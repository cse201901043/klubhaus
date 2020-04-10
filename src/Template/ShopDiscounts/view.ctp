<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShopDiscount $shopDiscount
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Shop Discount'), ['action' => 'edit', $shopDiscount->shop_discount_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Shop Discount'), ['action' => 'delete', $shopDiscount->shop_discount_id], ['confirm' => __('Are you sure you want to delete # {0}?', $shopDiscount->shop_discount_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Shop Discounts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Shop Discount'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="shopDiscounts view large-9 medium-8 columns content">
    <h3><?= h($shopDiscount->shop_discount_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Shop Discount Name') ?></th>
            <td><?= h($shopDiscount->shop_discount_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Shop Discount Slug') ?></th>
            <td><?= h($shopDiscount->shop_discount_slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Shop Discount Code') ?></th>
            <td><?= h($shopDiscount->shop_discount_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Shop Discount Rate') ?></th>
            <td><?= h($shopDiscount->shop_discount_rate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= h($shopDiscount->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated By') ?></th>
            <td><?= h($shopDiscount->updated_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Shop Discount Id') ?></th>
            <td><?= $this->Number->format($shopDiscount->shop_discount_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= $this->Number->format($shopDiscount->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Shop Discount From') ?></th>
            <td><?= h($shopDiscount->shop_discount_from) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Shop Discount To') ?></th>
            <td><?= h($shopDiscount->shop_discount_to) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($shopDiscount->created_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated At') ?></th>
            <td><?= h($shopDiscount->updated_at) ?></td>
        </tr>
    </table>
</div>
