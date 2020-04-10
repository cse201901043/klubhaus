<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AttributeValue $attributeValue
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $attributeValue->attribute_field_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $attributeValue->attribute_field_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Attribute Values'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="attributeValues form large-9 medium-8 columns content">
    <?= $this->Form->create($attributeValue) ?>
    <fieldset>
        <legend><?= __('Edit Attribute Value') ?></legend>
        <?php
            echo $this->Form->control('attribute_field_value');
            echo $this->Form->control('attribute_values_type_id');
            echo $this->Form->control('attribute_values_class_id');
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
