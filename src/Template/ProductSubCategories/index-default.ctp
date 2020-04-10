<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductSubCategory[]|\Cake\Collection\CollectionInterface $productSubCategories
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Product Sub Category'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Shop Products'), ['controller' => 'ShopProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Shop Product'), ['controller' => 'ShopProducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productSubCategories index large-9 medium-8 columns content">
    <h3><?= __('Product Sub Categories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('sub_category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sub_category_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sub_category_slug') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sub_category_featured_image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sub_category_featured_product') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sub_categories_category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productSubCategories as $productSubCategory): ?>
            <tr>
                <td><?= $this->Number->format($productSubCategory->sub_category_id) ?></td>
                <td><?= h($productSubCategory->sub_category_name) ?></td>
                <td><?= h($productSubCategory->sub_category_slug) ?></td>
                <td><?= h($productSubCategory->sub_category_featured_image) ?></td>
                <td><?= h($productSubCategory->sub_category_featured_product) ?></td>
                <td><?= $this->Number->format($productSubCategory->sub_categories_category_id) ?></td>
                <td><?= h($productSubCategory->created_by) ?></td>
                <td><?= h($productSubCategory->updated_by) ?></td>
                <td><?= h($productSubCategory->created_at) ?></td>
                <td><?= h($productSubCategory->updated_at) ?></td>
                <td><?= $this->Number->format($productSubCategory->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $productSubCategory->sub_category_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productSubCategory->sub_category_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productSubCategory->sub_category_id], ['confirm' => __('Are you sure you want to delete # {0}?', $productSubCategory->sub_category_id)]) ?>
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
