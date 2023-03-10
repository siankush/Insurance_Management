<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ContactListings> $contactListings
 */
?>
<div class="contactListings index content">
    <?= $this->Html->link(__('New Contact Listings'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Contact Listings') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contactListings as $contactListings): ?>
                <tr>
                    <td><?= $this->Number->format($contactListings->id) ?></td>
                    <td><?= $contactListings->has('user') ? $this->Html->link($contactListings->user->id, ['controller' => 'Users', 'action' => 'view', $contactListings->user->id]) : '' ?></td>
                    <td><?= h($contactListings->name) ?></td>
                    <td><?= h($contactListings->email) ?></td>
                    <td><?= h($contactListings->phone) ?></td>
                    <td><?= h($contactListings->address) ?></td>
                    <td><?= h($contactListings->status) ?></td>
                    <td><?= h($contactListings->created_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $contactListings->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contactListings->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contactListings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contactListings->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
