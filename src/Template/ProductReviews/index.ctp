<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductReview[]|\Cake\Collection\CollectionInterface $productReviews
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Product Review'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productReviews index large-9 medium-8 columns content">
    <h3><?= __('Product Reviews') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('product_review_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reviews_product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('review_description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('review_user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productReviews as $productReview): ?>
            <tr>
                <td><?= $this->Number->format($productReview->product_review_id) ?></td>
                <td><?= $this->Number->format($productReview->reviews_product_id) ?></td>
                <td><?= h($productReview->review_description) ?></td>
                <td><?= $this->Number->format($productReview->review_user_id) ?></td>
                <td><?= h($productReview->created_by) ?></td>
                <td><?= h($productReview->updated_by) ?></td>
                <td><?= h($productReview->created_at) ?></td>
                <td><?= h($productReview->updated_at) ?></td>
                <td><?= $this->Number->format($productReview->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $productReview->product_review_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productReview->product_review_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productReview->product_review_id], ['confirm' => __('Are you sure you want to delete # {0}?', $productReview->product_review_id)]) ?>
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
