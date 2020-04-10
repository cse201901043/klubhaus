<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AttributeType $attributeType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Attribute Type'), ['action' => 'edit', $attributeType->attribute_type_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Attribute Type'), ['action' => 'delete', $attributeType->attribute_type_id], ['confirm' => __('Are you sure you want to delete # {0}?', $attributeType->attribute_type_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Attribute Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attribute Type'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="attributeTypes view large-9 medium-8 columns content">
    <h3><?= h($attributeType->attribute_type_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Attribute Type Name') ?></th>
            <td><?= h($attributeType->attribute_type_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Attribute Type Slug') ?></th>
            <td><?= h($attributeType->attribute_type_slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= h($attributeType->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated By') ?></th>
            <td><?= h($attributeType->updated_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Attribute Type Id') ?></th>
            <td><?= $this->Number->format($attributeType->attribute_type_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Attribute Types Class Id') ?></th>
            <td><?= $this->Number->format($attributeType->attribute_types_class_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= $this->Number->format($attributeType->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($attributeType->created_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated At') ?></th>
            <td><?= h($attributeType->updated_at) ?></td>
        </tr>
    </table>
</div>
