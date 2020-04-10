<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AttributeValue $attributeValue
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Attribute Value'), ['action' => 'edit', $attributeValue->attribute_field_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Attribute Value'), ['action' => 'delete', $attributeValue->attribute_field_id], ['confirm' => __('Are you sure you want to delete # {0}?', $attributeValue->attribute_field_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Attribute Values'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attribute Value'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="attributeValues view large-9 medium-8 columns content">
    <h3><?= h($attributeValue->attribute_field_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Attribute Field Value') ?></th>
            <td><?= h($attributeValue->attribute_field_value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= h($attributeValue->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated By') ?></th>
            <td><?= h($attributeValue->updated_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Attribute Field Id') ?></th>
            <td><?= $this->Number->format($attributeValue->attribute_field_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Attribute Values Type Id') ?></th>
            <td><?= $this->Number->format($attributeValue->attribute_values_type_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Attribute Values Class Id') ?></th>
            <td><?= $this->Number->format($attributeValue->attribute_values_class_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= $this->Number->format($attributeValue->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($attributeValue->created_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated At') ?></th>
            <td><?= h($attributeValue->updated_at) ?></td>
        </tr>
    </table>
</div>
