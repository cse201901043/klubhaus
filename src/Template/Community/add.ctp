<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Community $community
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Community'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="community form large-9 medium-8 columns content">
    <?= $this->Form->create($community) ?>
    <fieldset>
        <legend><?= __('Add Community') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('discription');
            echo $this->Form->control('video_code');
            echo $this->Form->control('created_at');
            echo $this->Form->control('updated_at');
            echo $this->Form->control('created_by');
            echo $this->Form->control('updated_by');
            echo $this->Form->control('deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
