<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShopProduct $shopProduct
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Shop Product'), ['action' => 'edit', $shopProduct->products_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Shop Product'), ['action' => 'delete', $shopProduct->products_id], ['confirm' => __('Are you sure you want to delete # {0}?', $shopProduct->products_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Shop Products'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Shop Product'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product Categories'), ['controller' => 'ProductCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Category'), ['controller' => 'ProductCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product Sub Categories'), ['controller' => 'ProductSubCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Sub Category'), ['controller' => 'ProductSubCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product Brands'), ['controller' => 'ProductBrands', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Brand'), ['controller' => 'ProductBrands', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="shopProducts view large-9 medium-8 columns content">
    <h3><?= h($shopProduct->products_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Product Sku') ?></th>
            <td><?= h($shopProduct->product_sku) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Name') ?></th>
            <td><?= h($shopProduct->product_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Name Slug') ?></th>
            <td><?= h($shopProduct->product_name_slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Featured Image') ?></th>
            <td><?= h($shopProduct->product_featured_image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Category') ?></th>
            <td><?= $shopProduct->has('product_category') ? $this->Html->link($shopProduct->product_category->category_id, ['controller' => 'ProductCategories', 'action' => 'view', $shopProduct->product_category->category_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Sub Category') ?></th>
            <td><?= $shopProduct->has('product_sub_category') ? $this->Html->link($shopProduct->product_sub_category->sub_category_id, ['controller' => 'ProductSubCategories', 'action' => 'view', $shopProduct->product_sub_category->sub_category_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Brand') ?></th>
            <td><?= $shopProduct->has('product_brand') ? $this->Html->link($shopProduct->product_brand->brand_id, ['controller' => 'ProductBrands', 'action' => 'view', $shopProduct->product_brand->brand_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Short Description') ?></th>
            <td><?= h($shopProduct->product_short_description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Sale Status') ?></th>
            <td><?= h($shopProduct->product_sale_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= h($shopProduct->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated By') ?></th>
            <td><?= h($shopProduct->updated_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Products Id') ?></th>
            <td><?= $this->Number->format($shopProduct->products_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Attribute Class Id') ?></th>
            <td><?= $this->Number->format($shopProduct->product_attribute_class_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Buy Price') ?></th>
            <td><?= $this->Number->format($shopProduct->product_buy_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Unit Sale Price') ?></th>
            <td><?= $this->Number->format($shopProduct->product_unit_sale_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Dummy Price') ?></th>
            <td><?= $this->Number->format($shopProduct->product_dummy_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Stock') ?></th>
            <td><?= $this->Number->format($shopProduct->product_stock) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Sold') ?></th>
            <td><?= $this->Number->format($shopProduct->product_sold) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= $this->Number->format($shopProduct->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Arrival Date') ?></th>
            <td><?= h($shopProduct->product_arrival_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($shopProduct->created_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated At') ?></th>
            <td><?= h($shopProduct->updated_at) ?></td>
        </tr>
    </table>
</div>
