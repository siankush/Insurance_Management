
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InsurancesCompany $insurancesCompany
 */
?>
<?php echo $this->element('sidebar1') ?>
<style>
h3 {
    font-size: 24px;
    color: white;
    line-height: normal;
    font-weight: 700;
    text-transform: uppercase;
}
th {
    font-size: 20px;
}
td {
    font-size: 18px;
    color: white;
    font-weight: 300;
}
</style>
<div class="row">
   
    <div class="column-responsive column-80">
        <div class="insurancesCompany view content">
        <h1 style="padding-bottom:70px; text-align:center;font-weight:800;font-size:35px;color:white">USERS VIEW</h1>
        <?php $totalPrice = 0;
foreach ($companyAssetss as $company) {

    $totalPrice += $company->insurance_policy->premium;

    // echo $company->insurance_policy->premium;
} 
// $totalPrice = $companyAssetss->sumOf('premium');
?>

                 
                  <h3>Total Policies : <span class="badge"><?php echo count($companyAssetss); ?></span></h3>
                  <h3>Total Premium Price : <span class="badge"><?php echo $totalPrice;; ?></span></h3>
            <table class="table">
            <tr>
                    <th><?= __('First Name') ?></th>
                    <td><?= h($user->first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Name') ?></th>
                    <td><?= h($user->last_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Contact No') ?></th>
                    <td><?= h($user->contact_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($user->address) ?></td>
                </tr>
                <!-- <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($user->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= h($user->deleted) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr> -->
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($user->created_at) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>




