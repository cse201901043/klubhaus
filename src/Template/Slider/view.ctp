<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Slider $slider
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Slider'), ['action' => 'edit', $slider->slider_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Slider'), ['action' => 'delete', $slider->slider_id], ['confirm' => __('Are you sure you want to delete # {0}?', $slider->slider_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Slider'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Slider'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="slider view large-9 medium-8 columns content">
    <h3><?= h($slider->slider_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Slider Title') ?></th>
            <td><?= h($slider->slider_title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slider Image') ?></th>
            <td><?= h($slider->slider_image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slider Id') ?></th>
            <td><?= $this->Number->format($slider->slider_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slider SubCategory Id') ?></th>
            <td><?= $this->Number->format($slider->slider_subCategory_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= $this->Number->format($slider->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($slider->created_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated By') ?></th>
            <td><?= h($slider->updated_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= h($slider->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated At') ?></th>
            <td><?= h($slider->updated_at) ?></td>
        </tr>
    </table>
</div>
