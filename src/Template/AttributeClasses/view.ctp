<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AttributeClass $attributeClass
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Attribute Class'), ['action' => 'edit', $attributeClass->attribute_class_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Attribute Class'), ['action' => 'delete', $attributeClass->attribute_class_id], ['confirm' => __('Are you sure you want to delete # {0}?', $attributeClass->attribute_class_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Attribute Classes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attribute Class'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="attributeClasses view large-9 medium-8 columns content">
    <h3><?= h($attributeClass->attribute_class_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Attribute Class Name') ?></th>
            <td><?= h($attributeClass->attribute_class_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Attribute Class Slug') ?></th>
            <td><?= h($attributeClass->attribute_class_slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= h($attributeClass->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated By') ?></th>
            <td><?= h($attributeClass->updated_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Attribute Class Id') ?></th>
            <td><?= $this->Number->format($attributeClass->attribute_class_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= $this->Number->format($attributeClass->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($attributeClass->created_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated At') ?></th>
            <td><?= h($attributeClass->updated_at) ?></td>
        </tr>
    </table>
</div>
