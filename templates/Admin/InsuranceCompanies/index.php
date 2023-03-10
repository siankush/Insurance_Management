<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\InsuranceCompany> $insuranceCompanies
 */
?>
<div class="insuranceCompanies index content">
    <?= $this->Html->link(__('New Insurance Company'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Insurance Companies') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('insurance_company_name') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('deleted') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($insuranceCompanies as $insuranceCompany): ?>
                <tr>
                    <td><?= $this->Number->format($insuranceCompany->id) ?></td>
                    <td><?= h($insuranceCompany->insurance_company_name) ?></td>
                    <td><?= h($insuranceCompany->status) ?></td>
                    <td><?= h($insuranceCompany->deleted) ?></td>
                    <td><?= h($insuranceCompany->created_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $insuranceCompany->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $insuranceCompany->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $insuranceCompany->id], ['confirm' => __('Are you sure you want to delete # {0}?', $insuranceCompany->id)]) ?>
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
