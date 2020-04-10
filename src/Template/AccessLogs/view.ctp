<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AccessLog $accessLog
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Access Log'), ['action' => 'edit', $accessLog->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Access Log'), ['action' => 'delete', $accessLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accessLog->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Access Logs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Access Log'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="accessLogs view large-9 medium-8 columns content">
    <h3><?= h($accessLog->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $accessLog->has('user') ? $this->Html->link($accessLog->user->name, ['controller' => 'Users', 'action' => 'view', $accessLog->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ip Address') ?></th>
            <td><?= h($accessLog->ip_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Controller') ?></th>
            <td><?= h($accessLog->controller) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Action') ?></th>
            <td><?= h($accessLog->action) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mac Id') ?></th>
            <td><?= h($accessLog->mac_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($accessLog->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($accessLog->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($accessLog->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Prev Data') ?></h4>
        <?= $this->Text->autoParagraph(h($accessLog->prev_data)); ?>
    </div>
</div>
