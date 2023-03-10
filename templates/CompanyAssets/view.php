<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CompanyAsset $companyAsset
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Company Asset'), ['action' => 'edit', $companyAsset->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Company Asset'), ['action' => 'delete', $companyAsset->id], ['confirm' => __('Are you sure you want to delete # {0}?', $companyAsset->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Company Assets'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Company Asset'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="companyAssets view content">
            <h3><?= h($companyAsset->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $companyAsset->has('user') ? $this->Html->link($companyAsset->user->id, ['controller' => 'Users', 'action' => 'view', $companyAsset->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Insurance Company') ?></th>
                    <td><?= $companyAsset->has('insurance_company') ? $this->Html->link($companyAsset->insurance_company->id, ['controller' => 'InsuranceCompanies', 'action' => 'view', $companyAsset->insurance_company->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Insurance Policy') ?></th>
                    <td><?= $companyAsset->has('insurance_policy') ? $this->Html->link($companyAsset->insurance_policy->name, ['controller' => 'InsurancePolicies', 'action' => 'view', $companyAsset->insurance_policy->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($companyAsset->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= h($companyAsset->deleted) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($companyAsset->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Contact Listing Id') ?></th>
                    <td><?= $this->Number->format($companyAsset->contact_listing_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Premium') ?></th>
                    <td><?= $this->Number->format($companyAsset->premium) ?></td>
                </tr>
                <tr>
                    <th><?= __('Term Length') ?></th>
                    <td><?= h($companyAsset->term_length) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
