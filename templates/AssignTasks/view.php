<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AssignTask $assignTask
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Assign Task'), ['action' => 'edit', $assignTask->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Assign Task'), ['action' => 'delete', $assignTask->id], ['confirm' => __('Are you sure you want to delete # {0}?', $assignTask->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Assign Tasks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Assign Task'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="assignTasks view content">
            <h3><?= h($assignTask->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $assignTask->has('user') ? $this->Html->link($assignTask->user->id, ['controller' => 'Users', 'action' => 'view', $assignTask->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($assignTask->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($assignTask->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($assignTask->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($assignTask->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Due Date') ?></th>
                    <td><?= h($assignTask->due_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($assignTask->created_at) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
