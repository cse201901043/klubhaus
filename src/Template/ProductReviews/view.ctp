<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductReview $productReview
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product Review'), ['action' => 'edit', $productReview->product_review_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product Review'), ['action' => 'delete', $productReview->product_review_id], ['confirm' => __('Are you sure you want to delete # {0}?', $productReview->product_review_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Product Reviews'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Review'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productReviews view large-9 medium-8 columns content">
    <h3><?= h($productReview->product_review_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Review Description') ?></th>
            <td><?= h($productReview->review_description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= h($productReview->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated By') ?></th>
            <td><?= h($productReview->updated_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Review Id') ?></th>
            <td><?= $this->Number->format($productReview->product_review_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reviews Product Id') ?></th>
            <td><?= $this->Number->format($productReview->reviews_product_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Review User Id') ?></th>
            <td><?= $this->Number->format($productReview->review_user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= $this->Number->format($productReview->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($productReview->created_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated At') ?></th>
            <td><?= h($productReview->updated_at) ?></td>
        </tr>
    </table>
</div>
