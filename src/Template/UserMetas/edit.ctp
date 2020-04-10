<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserMeta $userMeta
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $userMeta->user_meta_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $userMeta->user_meta_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List User Metas'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="userMetas form large-9 medium-8 columns content">
    <?= $this->Form->create($userMeta) ?>
    <fieldset>
        <legend><?= __('Edit User Meta') ?></legend>
        <?php
            echo $this->Form->control('meta_user_id');
            echo $this->Form->control('user_meta_field_name');
            echo $this->Form->control('user_meta_field_value');
            echo $this->Form->control('created_by');
            echo $this->Form->control('updated_by');
            echo $this->Form->control('created_at');
            echo $this->Form->control('updated_at');
            echo $this->Form->control('deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
