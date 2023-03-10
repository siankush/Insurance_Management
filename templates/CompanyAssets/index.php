<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\CompanyAsset> $companyAssets
 */
?>
<div class="companyAssets index content">
    <?= $this->Html->link(__('New Company Asset'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Company Assets') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('contact_listing_id') ?></th>
                    <th><?= $this->Paginator->sort('insurance_company_id') ?></th>
                    <th><?= $this->Paginator->sort('insurance_policy_id') ?></th>
                    <th><?= $this->Paginator->sort('premium') ?></th>
                    <th><?= $this->Paginator->sort('term_length') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('deleted') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($companyAssets as $companyAsset): ?>
                <tr>
                    <td><?= $this->Number->format($companyAsset->id) ?></td>
                    <td><?= $companyAsset->has('user') ? $this->Html->link($companyAsset->user->id, ['controller' => 'Users', 'action' => 'view', $companyAsset->user->id]) : '' ?></td>
                    <td><?= $this->Number->format($companyAsset->contact_listing_id) ?></td>
                    <td><?= $companyAsset->has('insurance_company') ? $this->Html->link($companyAsset->insurance_company->id, ['controller' => 'InsuranceCompanies', 'action' => 'view', $companyAsset->insurance_company->id]) : '' ?></td>
                    <td><?= $companyAsset->has('insurance_policy') ? $this->Html->link($companyAsset->insurance_policy->name, ['controller' => 'InsurancePolicies', 'action' => 'view', $companyAsset->insurance_policy->id]) : '' ?></td>
                    <td><?= $this->Number->format($companyAsset->premium) ?></td>
                    <td><?= h($companyAsset->term_length) ?></td>
                    <td><?= h($companyAsset->status) ?></td>
                    <td><?= h($companyAsset->deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $companyAsset->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $companyAsset->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $companyAsset->id], ['confirm' => __('Are you sure you want to delete # {0}?', $companyAsset->id)]) ?>
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
