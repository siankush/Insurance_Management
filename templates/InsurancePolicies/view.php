




<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InsurancesCompany $insurancesCompany
 */
?>
<?php echo $this->element('sidebar1') ?>
<style>
    a{
        color:white;
    }
</style>
<div class="row">
   
    <div class="column-responsive column-80">
        <div class="insurancesCompany view content">
        <h1 style="padding-bottom:70px; text-align:center;font-weight:800;font-size:35px;color:white">INSURANCE COMPANIES VIEW</h1>

            <h3 style="color: white;"><?= h($insurancePolicy->id) ?></h3>
            <table class="table">
            <tr>
                    <th><?= __('Insurance Company') ?></th>
                    <td><?= $insurancePolicy->has('insurance_company') ? $this->Html->link($insurancePolicy->insurance_company->name, ['controller' => 'InsuranceCompanies', 'action' => 'view', $insurancePolicy->insurance_company->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($insurancePolicy->name) ?></td>
                </tr>
                <!-- <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($insurancePolicy->id) ?></td>
                </tr> -->
            </table>
        </div>
    </div>
</div>




