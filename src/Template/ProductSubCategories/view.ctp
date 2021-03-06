<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductSubCategory $productSubCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product Sub Category'), ['action' => 'edit', $productSubCategory->sub_category_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product Sub Category'), ['action' => 'delete', $productSubCategory->sub_category_id], ['confirm' => __('Are you sure you want to delete # {0}?', $productSubCategory->sub_category_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Product Sub Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Sub Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Shop Products'), ['controller' => 'ShopProducts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Shop Product'), ['controller' => 'ShopProducts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productSubCategories view large-9 medium-8 columns content">
    <h3><?= h($productSubCategory->sub_category_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sub Category Name') ?></th>
            <td><?= h($productSubCategory->sub_category_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sub Category Slug') ?></th>
            <td><?= h($productSubCategory->sub_category_slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sub Category Featured Image') ?></th>
            <td><?= h($productSubCategory->sub_category_featured_image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sub Category Featured Product') ?></th>
            <td><?= h($productSubCategory->sub_category_featured_product) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= h($productSubCategory->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated By') ?></th>
            <td><?= h($productSubCategory->updated_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sub Category Id') ?></th>
            <td><?= $this->Number->format($productSubCategory->sub_category_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sub Categories Category Id') ?></th>
            <td><?= $this->Number->format($productSubCategory->sub_categories_category_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= $this->Number->format($productSubCategory->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($productSubCategory->created_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated At') ?></th>
            <td><?= h($productSubCategory->updated_at) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Shop Products') ?></h4>
        <?php if (!empty($productSubCategory->shop_products)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Products Id') ?></th>
                <th scope="col"><?= __('Product Arrival Date') ?></th>
                <th scope="col"><?= __('Product Sku') ?></th>
                <th scope="col"><?= __('Product Name') ?></th>
                <th scope="col"><?= __('Product Name Slug') ?></th>
                <th scope="col"><?= __('Product Featured Image') ?></th>
                <th scope="col"><?= __('Product Category Id') ?></th>
                <th scope="col"><?= __('Product Sub Category Id') ?></th>
                <th scope="col"><?= __('Product Brand Id') ?></th>
                <th scope="col"><?= __('Product Attribute Class Id') ?></th>
                <th scope="col"><?= __('Product Short Description') ?></th>
                <th scope="col"><?= __('Product Buy Price') ?></th>
                <th scope="col"><?= __('Product Unit Sale Price') ?></th>
                <th scope="col"><?= __('Product Dummy Price') ?></th>
                <th scope="col"><?= __('Product Stock') ?></th>
                <th scope="col"><?= __('Product Sold') ?></th>
                <th scope="col"><?= __('Product Sale Status') ?></th>
                <th scope="col"><?= __('Created By') ?></th>
                <th scope="col"><?= __('Updated By') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col"><?= __('Updated At') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($productSubCategory->shop_products as $shopProducts): ?>
            <tr>
                <td><?= h($shopProducts->products_id) ?></td>
                <td><?= h($shopProducts->product_arrival_date) ?></td>
                <td><?= h($shopProducts->product_sku) ?></td>
                <td><?= h($shopProducts->product_name) ?></td>
                <td><?= h($shopProducts->product_name_slug) ?></td>
                <td><?= h($shopProducts->product_featured_image) ?></td>
                <td><?= h($shopProducts->product_category_id) ?></td>
                <td><?= h($shopProducts->product_sub_category_id) ?></td>
                <td><?= h($shopProducts->product_brand_id) ?></td>
                <td><?= h($shopProducts->product_attribute_class_id) ?></td>
                <td><?= h($shopProducts->product_short_description) ?></td>
                <td><?= h($shopProducts->product_buy_price) ?></td>
                <td><?= h($shopProducts->product_unit_sale_price) ?></td>
                <td><?= h($shopProducts->product_dummy_price) ?></td>
                <td><?= h($shopProducts->product_stock) ?></td>
                <td><?= h($shopProducts->product_sold) ?></td>
                <td><?= h($shopProducts->product_sale_status) ?></td>
                <td><?= h($shopProducts->created_by) ?></td>
                <td><?= h($shopProducts->updated_by) ?></td>
                <td><?= h($shopProducts->created_at) ?></td>
                <td><?= h($shopProducts->updated_at) ?></td>
                <td><?= h($shopProducts->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ShopProducts', 'action' => 'view', $shopProducts->products_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ShopProducts', 'action' => 'edit', $shopProducts->products_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ShopProducts', 'action' => 'delete', $shopProducts->products_id], ['confirm' => __('Are you sure you want to delete # {0}?', $shopProducts->products_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
