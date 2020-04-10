<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cart $cart
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cart'), ['action' => 'edit', $cart->cart_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cart'), ['action' => 'delete', $cart->cart_id], ['confirm' => __('Are you sure you want to delete # {0}?', $cart->cart_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Carts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cart'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="carts view large-9 medium-8 columns content">
    <h3><?= h($cart->cart_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cart Product Name') ?></th>
            <td><?= h($cart->cart_product_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cart Product Image') ?></th>
            <td><?= h($cart->cart_product_image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= h($cart->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated By') ?></th>
            <td><?= h($cart->updated_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cart Id') ?></th>
            <td><?= $this->Number->format($cart->cart_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cart Product Id') ?></th>
            <td><?= $this->Number->format($cart->cart_product_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cart Product Stocks Id') ?></th>
            <td><?= $this->Number->format($cart->cart_product_stocks_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cart User Id') ?></th>
            <td><?= $this->Number->format($cart->cart_user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cart Product Quantity') ?></th>
            <td><?= $this->Number->format($cart->cart_product_quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cart Product Unit Price') ?></th>
            <td><?= $this->Number->format($cart->cart_product_unit_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cart Product Total Price') ?></th>
            <td><?= $this->Number->format($cart->cart_product_total_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= $this->Number->format($cart->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($cart->created_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated At') ?></th>
            <td><?= h($cart->updated_at) ?></td>
        </tr>
    </table>
</div>
