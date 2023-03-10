

<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\InsurancesCompany> $insurancesCompany
 */
?>
<?php echo $this->element('sidebar1') ?>
<style>
    td {
    color: white;
}
a {
    color: white;
}
a.addcomp {
    float: right;
    /* margin-top: -92px; */
    padding: 7px;
    width: 176px;
    border-radius: 20px;
    border: 3px solid black;
    background: #ff5722;
    color: white;
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 25px;
}
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
.edit-policy{
  width: 100%;
  background-color: #ff5722;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
.modal-body {
  position: relative;
  -webkit-box-flex: 1;
  -ms-flex: 1 1 auto;
  flex: 1 1 auto;
  padding: 1rem;
    padding-top: 1rem;
  padding-top: 0px;
  margin-top: -167px;
}
img#policyimg {
    width: 75px;
    border-radius: 50px;
    height: 70px;
}
</style>
<div class='container-fluid'>
    <?php echo $this->Flash->render(); ?>
</div>
<div class="insurancesCompany index content" style="margin-top: 120px;" id = 'change-status'>

<div class="container-fluid">
<h1 style="padding-bottom:70px; text-align:center;font-weight:800;font-size:35px;">POLICIES LISTINGS</h1>
<a href="/insurance-policies/add" class="addcomp">Add Company</a>

        <table class="table table-hover" >

            <thead>
            <tr id="#tablerow_user">
            <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('insurance_company_id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('premium') ?></th>
                    <th><?= $this->Paginator->sort('image') ?></th>
                    <th>Status</th>
                    <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php $n = $this->Paginator->counter('{{start}}') ?>

            <?php foreach ($insurancePolicies as $insurancePolicy): ?>
                <?php if($insurancePolicy->deleted == 1) :?>
                <tr id="data<?php echo $insurancePolicy->id;?>" class="tabledata_user">
                <td><?php echo $n; ?></td>
                    <td><?= $insurancePolicy->has('insurance_company') ? $this->Html->link($insurancePolicy->insurance_company->name, ['controller' => 'InsuranceCompanies', 'action' => 'view', $insurancePolicy->insurance_company->insurance_company_name]) : '' ?></td>                    
                    <td><?= h($insurancePolicy->name) ?></td>
                    <td><?= h($insurancePolicy->premium) ?></td>
                    <td><?= $this->Html->image($insurancePolicy->image,['id'=>'policyimg']); ?></td>
                    <td>
                    <?php  if($insurancePolicy->status == 1) : ?>
                            
                            <?= $this->Form->postLink(__('Active'),['action' => 'userstatus', $insurancePolicy->id, $insurancePolicy->status],['class'=>'badge badge-sm bg-gradient-success'], ['confirm' => __('Are you sure you want to Inactive ?', $insurancePolicy->id)]) ?>
                            <?php else : ?>
                                
                                <?= $this->Form->postLink(__('Deactive'), ['action' => 'userstatus', $insurancePolicy->id, $insurancePolicy->status],['class'=>'badge badge-sm bg-gradient-secondary'], ['confirm' => __('Are you sure you want to Active ?', $insurancePolicy->id)]) ?>
                                <?php endif; ?> 
                    </td>
                    <td class="actions">
                        <?= $this->Html->link(__(''), ['action' => 'view', $insurancePolicy->id],['class'=>'fa-solid fa-eye']) ?>
                        
                        <i class="fa-solid fa-pen-to-square get-policyinfo" data-bs-toggle="modal" data-bs-target="#myModalpolicy" style="color: orange; font-size: 18px;" editpolicy-id ="<?= $insurancePolicy->id ?>"></i>
                        
                        <i class="fa-solid fa-trash-can delete-insurance-policy" style="color: red; font-size: 18px; cursor: pointer;" status-id ="<?= $insurancePolicy->deleted?>" deletepolicy-id ="<?= $insurancePolicy->id?>"></i>                          

                    </td>
                    
                </tr>
                <?php endif; ?>
                <?php $n++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
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
                   
</div>
<div class="modal" id="myModalpolicy">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
       </div>

       <!-- Modal body -->
       <div class="modal-body">
        
   
   <div class="column-responsive column-80">
     <div class="insurancesCompany view content">
       <h1 style="padding-bottom:70px; text-align:center;font-weight:800;font-size:35px;color:white">INSURANCE USER EDIT</h1>

       <?= $this->Form->create($insurancePolicy,['enctype'=>'multipart/form-data','id'=>'insuranceform']) ?>
       <input type="hidden" id="policylisting_id" name="id">
       
           <fieldset>
               <legend><?= __('Edit User') ?></legend>
               <img id="image-preview" src="">

               <?php
                    echo $this->Form->control('insurance_company_id',['options' => $insuranceCompanies,'class'=>'policy','id'=>'insurance_id']);
                    echo $this->Form->control('name',['class'=>'policy','id'=>'name']);                    
                    echo $this->Form->control('premium',['class'=>'policy','id'=>'premium']);      
                    echo $this->Form->control('image',['class'=>'policy','type'=> 'file','id'=>'image']);

               ?>
           </fieldset>
           <?= $this->Form->button(__('Submit'),['class'=>'edit-policy','data-bs-dismiss' =>'modal']) ?>
           <?= $this->Form->end() ?>
   </div>
</div>
    

      <!-- Modal footer -->
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div> -->

    </div>
  </div>
</div> 
<?= $this->Html->script('adminscript') ?>