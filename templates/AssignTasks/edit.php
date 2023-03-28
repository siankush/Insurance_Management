<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AssignTask $assignTask
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $assignTask->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $assignTask->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Assign Tasks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="assignTasks form content">
            <?= $this->Form->create($assignTask) ?>
            <fieldset>
                <legend><?= __('Edit Assign Task') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('title');
                    echo $this->Form->control('description');
                    echo $this->Form->control('due_date');
                    echo $this->Form->control('status');
                    echo $this->Form->control('created_at');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
