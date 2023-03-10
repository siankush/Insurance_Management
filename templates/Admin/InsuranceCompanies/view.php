<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InsuranceCompany $insuranceCompany
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Insurance Company'), ['action' => 'edit', $insuranceCompany->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Insurance Company'), ['action' => 'delete', $insuranceCompany->id], ['confirm' => __('Are you sure you want to delete # {0}?', $insuranceCompany->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Insurance Companies'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Insurance Company'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="insuranceCompanies view content">
            <h3><?= h($insuranceCompany->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Insurance Company Name') ?></th>
                    <td><?= h($insuranceCompany->insurance_company_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($insuranceCompany->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= h($insuranceCompany->deleted) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($insuranceCompany->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($insuranceCompany->created_at) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
