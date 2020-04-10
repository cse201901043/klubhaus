<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShopProduct[]|\Cake\Collection\CollectionInterface $shopProducts
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Shop Product'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product Categories'), ['controller' => 'ProductCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Category'), ['controller' => 'ProductCategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product Sub Categories'), ['controller' => 'ProductSubCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Sub Category'), ['controller' => 'ProductSubCategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product Brands'), ['controller' => 'ProductBrands', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Brand'), ['controller' => 'ProductBrands', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="shopProducts index large-9 medium-8 columns content">
    <h3><?= __('Shop Products') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('products_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_arrival_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_sku') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_name_slug') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_featured_image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_sub_category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_brand_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_attribute_class_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_short_description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_buy_price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_unit_sale_price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_dummy_price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_stock') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_sold') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_sale_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($shopProducts as $shopProduct): ?>
            <tr>
                <td><?= $this->Number->format($shopProduct->products_id) ?></td>
                <td><?= h($shopProduct->product_arrival_date) ?></td>
                <td><?= h($shopProduct->product_sku) ?></td>
                <td><?= h($shopProduct->product_name) ?></td>
                <td><?= h($shopProduct->product_name_slug) ?></td>
                <td><?= h($shopProduct->product_featured_image) ?></td>
                <td><?= $shopProduct->has('product_category') ? $this->Html->link($shopProduct->product_category->category_id, ['controller' => 'ProductCategories', 'action' => 'view', $shopProduct->product_category->category_id]) : '' ?></td>
                <td><?= $shopProduct->has('product_sub_category') ? $this->Html->link($shopProduct->product_sub_category->sub_category_id, ['controller' => 'ProductSubCategories', 'action' => 'view', $shopProduct->product_sub_category->sub_category_id]) : '' ?></td>
                <td><?= $shopProduct->has('product_brand') ? $this->Html->link($shopProduct->product_brand->brand_id, ['controller' => 'ProductBrands', 'action' => 'view', $shopProduct->product_brand->brand_id]) : '' ?></td>
                <td><?= $this->Number->format($shopProduct->product_attribute_class_id) ?></td>
                <td><?= h($shopProduct->product_short_description) ?></td>
                <td><?= $this->Number->format($shopProduct->product_buy_price) ?></td>
                <td><?= $this->Number->format($shopProduct->product_unit_sale_price) ?></td>
                <td><?= $this->Number->format($shopProduct->product_dummy_price) ?></td>
                <td><?= $this->Number->format($shopProduct->product_stock) ?></td>
                <td><?= $this->Number->format($shopProduct->product_sold) ?></td>
                <td><?= h($shopProduct->product_sale_status) ?></td>
                <td><?= h($shopProduct->created_by) ?></td>
                <td><?= h($shopProduct->updated_by) ?></td>
                <td><?= h($shopProduct->created_at) ?></td>
                <td><?= h($shopProduct->updated_at) ?></td>
                <td><?= $this->Number->format($shopProduct->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $shopProduct->products_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $shopProduct->products_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $shopProduct->products_id], ['confirm' => __('Are you sure you want to delete # {0}?', $shopProduct->products_id)]) ?>
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
