<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AttributeType $attributeType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $attributeType->attribute_type_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $attributeType->attribute_type_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Attribute Types'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="attributeTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($attributeType) ?>
    <fieldset>
        <legend><?= __('Edit Attribute Type') ?></legend>
        <?php
            echo $this->Form->control('attribute_type_name');
            echo $this->Form->control('attribute_type_slug');
            echo $this->Form->control('attribute_types_class_id');
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
