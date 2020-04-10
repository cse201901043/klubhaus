<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductRating[]|\Cake\Collection\CollectionInterface $productRatings
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Product Rating'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productRatings index large-9 medium-8 columns content">
    <h3><?= __('Product Ratings') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ratings_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ratings_product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rate_point') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rate_user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productRatings as $productRating): ?>
            <tr>
                <td><?= $this->Number->format($productRating->ratings_id) ?></td>
                <td><?= $this->Number->format($productRating->ratings_product_id) ?></td>
                <td><?= $this->Number->format($productRating->rate_point) ?></td>
                <td><?= $this->Number->format($productRating->rate_user_id) ?></td>
                <td><?= h($productRating->created_by) ?></td>
                <td><?= h($productRating->updated_by) ?></td>
                <td><?= h($productRating->created_at) ?></td>
                <td><?= h($productRating->updated_at) ?></td>
                <td><?= $this->Number->format($productRating->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $productRating->ratings_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productRating->ratings_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productRating->ratings_id], ['confirm' => __('Are you sure you want to delete # {0}?', $productRating->ratings_id)]) ?>
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
