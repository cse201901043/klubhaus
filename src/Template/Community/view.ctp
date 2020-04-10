<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Community $community
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Community'), ['action' => 'edit', $community->community_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Community'), ['action' => 'delete', $community->community_id], ['confirm' => __('Are you sure you want to delete # {0}?', $community->community_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Community'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Community'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="community view large-9 medium-8 columns content">
    <h3><?= h($community->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($community->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Discription') ?></th>
            <td><?= h($community->discription) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Video Code') ?></th>
            <td><?= h($community->video_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($community->created_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated At') ?></th>
            <td><?= h($community->updated_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Community Id') ?></th>
            <td><?= $this->Number->format($community->community_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($community->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated By') ?></th>
            <td><?= $this->Number->format($community->updated_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= $this->Number->format($community->deleted) ?></td>
        </tr>
    </table>
</div>
