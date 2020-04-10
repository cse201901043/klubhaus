<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductCategory[]|\Cake\Collection\CollectionInterface $productCategories
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Product Category'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Shop Products'), ['controller' => 'ShopProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Shop Product'), ['controller' => 'ShopProducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productCategories index large-9 medium-8 columns content">
    <h3><?= __('Product Categories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category_slug') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productCategories as $productCategory): ?>
            <tr>
                <td><?= $this->Number->format($productCategory->category_id) ?></td>
                <td><?= h($productCategory->category_name) ?></td>
                <td><?= h($productCategory->category_slug) ?></td>
                <td><?= h($productCategory->created_by) ?></td>
                <td><?= h($productCategory->updated_by) ?></td>
                <td><?= h($productCategory->created_at) ?></td>
                <td><?= h($productCategory->updated_at) ?></td>
                <td><?= $this->Number->format($productCategory->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $productCategory->category_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productCategory->category_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productCategory->category_id], ['confirm' => __('Are you sure you want to delete # {0}?', $productCategory->category_id)]) ?>
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
