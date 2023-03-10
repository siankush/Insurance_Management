
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InsurancePolicy $insurancePolicy
 * @var string[]|\Cake\Collection\CollectionInterface $insuranceCompanies
 */
?>
<?php echo $this->element('sidebar1') ?>
<style>
.policy {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  color: black!important;
}
.submit {
  width: 100%;
  background-color: #ff5722;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
</style>


<div class="row">
   
    <div class="column-responsive column-80">
        <div class="insurancesCompany view content">
        <h1 style="padding-bottom:70px; text-align:center;font-weight:800;font-size:35px;color:white">INSURANCE USER EDIT</h1>

        <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Edit User') ?></legend>
                <?php
                    echo $this->Form->control('first_name',['class'=>'policy']);
                    echo $this->Form->control('last_name',['class'=>'policy']);
                    echo $this->Form->control('email',['class'=>'policy']);
                    echo $this->Form->control('contact_number',['class'=>'policy']);
                    echo $this->Form->control('address',['class'=>'policy']);
                    // echo $this->Form->control('password',['class'=>'policy']);
                    // echo $this->Form->control('status',['class'=>'policy']);
                    // echo $this->Form->control('deleted');
                    // echo $this->Form->control('created_at');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'),['class'=>'submit']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>