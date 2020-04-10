<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductRating $productRating
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product Rating'), ['action' => 'edit', $productRating->ratings_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product Rating'), ['action' => 'delete', $productRating->ratings_id], ['confirm' => __('Are you sure you want to delete # {0}?', $productRating->ratings_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Product Ratings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Rating'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productRatings view large-9 medium-8 columns content">
    <h3><?= h($productRating->ratings_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= h($productRating->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated By') ?></th>
            <td><?= h($productRating->updated_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ratings Id') ?></th>
            <td><?= $this->Number->format($productRating->ratings_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ratings Product Id') ?></th>
            <td><?= $this->Number->format($productRating->ratings_product_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rate Point') ?></th>
            <td><?= $this->Number->format($productRating->rate_point) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rate User Id') ?></th>
            <td><?= $this->Number->format($productRating->rate_user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= $this->Number->format($productRating->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($productRating->created_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated At') ?></th>
            <td><?= h($productRating->updated_at) ?></td>
        </tr>
    </table>
</div>
