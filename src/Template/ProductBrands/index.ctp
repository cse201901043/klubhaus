<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductBrand[]|\Cake\Collection\CollectionInterface $productBrands
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Product Brand'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Shop Products'), ['controller' => 'ShopProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Shop Product'), ['controller' => 'ShopProducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productBrands index large-9 medium-8 columns content">
    <h3><?= __('Product Brands') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('brand_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('brand_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('brand_slug') ?></th>
                <th scope="col"><?= $this->Paginator->sort('brand_image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('brand_featured_product') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productBrands as $productBrand): ?>
            <tr>
                <td><?= $this->Number->format($productBrand->brand_id) ?></td>
                <td><?= h($productBrand->brand_name) ?></td>
                <td><?= h($productBrand->brand_slug) ?></td>
                <td><?= h($productBrand->brand_image) ?></td>
                <td><?= h($productBrand->brand_featured_product) ?></td>
                <td><?= h($productBrand->created_by) ?></td>
                <td><?= h($productBrand->updated_by) ?></td>
                <td><?= h($productBrand->created_at) ?></td>
                <td><?= h($productBrand->updated_at) ?></td>
                <td><?= $this->Number->format($productBrand->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $productBrand->brand_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productBrand->brand_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productBrand->brand_id], ['confirm' => __('Are you sure you want to delete # {0}?', $productBrand->brand_id)]) ?>
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
