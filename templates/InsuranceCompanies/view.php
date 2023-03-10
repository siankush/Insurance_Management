

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InsurancesCompany $insurancesCompany
 */
?>
<?php echo $this->element('sidebar1') ?>

<div class="row">
   
    <div class="column-responsive column-80">
        <div class="insurancesCompany view content">
        <h1 style="padding-bottom:70px; text-align:center;font-weight:800;font-size:35px;color:white">INSURANCE COMPANIES VIEW</h1>

            <h3 style="color: white;"><?= h($insuranceCompany->id) ?></h3>
            <table class="table">
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($insuranceCompany->name) ?></td>
                </tr>
                <!-- <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($insuranceCompany->id) ?></td>
                </tr> -->
            </table>
        </div>
    </div>
</div>




