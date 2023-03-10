<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\InsurancesCompany> $insurancesCompany
 */
?>
<?php echo $this->element('sidebar1') ?>
<style>
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
.edit-company{
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
  -webkit-box-flex: 1;
  -ms-flex: 1 1 auto;
  flex: 1 1 auto;
  padding: 1rem;
    padding-top: 1rem;
  padding-top: 0px;
  margin-top: -167px;
}
</style>
<div class='container-fluid'>
    <?php echo $this->Flash->render(); ?>
</div>
<div class="insurancesCompany index content" style="margin-top: 120px;" id='change-status'>
    
<div class="container-fluid">

    <h1 style="padding-bottom:70px; text-align:center;font-weight:800;font-size:35px;">COMPANIES LISTINGS</h1>
    <a href="/insurance-companies/add" class="addcomp">Add Company</a>
    <table class="table table-hover" >

            <thead>
            <tr id="#tablerow_user">
                    <th>ID</th>
                    <th>NAME</th>
                    <th>STATUS</th>

                    <th class="actions">ACTIONS</th>
            </tr>
            </thead>
            <tbody>
            <?php $n = $this->Paginator->counter('{{start}}') ?>

            <?php foreach ($insuranceCompanies as $insuranceCompany): ?>
                <?php if($insuranceCompany->deleted==1): ?>
                <tr id="data<?php echo $insuranceCompany->id;?>" class="tabledata_user">
                    <td><?php echo $n ?></td>
                    <td><?= h($insuranceCompany->name) ?></td>
                    <td>
                    <?php  if($insuranceCompany->status == 1) : ?>
                            
                            <?= $this->Form->postLink(__('Active'),['action' => 'userstatus', $insuranceCompany->id, $insuranceCompany->status],['class'=>'badge badge-sm bg-gradient-success'], ['confirm' => __('Are you sure you want to Inactive ?', $insuranceCompany->id)]) ?>
                            <?php else : ?>
                                
                                <?= $this->Form->postLink(__('Deactive'), ['action' => 'userstatus', $insuranceCompany->id, $insuranceCompany->status],['class'=>'badge badge-sm bg-gradient-secondary'], ['confirm' => __('Are you sure you want to Active ?', $insuranceCompany->id)]) ?>
                                <?php endif; ?> 
                    </td>
                    <td class="actions">
                        <!-- <?= $this->Html->link(__(''), ['action' => 'view', $insuranceCompany->id],['class'=>'fa-solid fa-eye']) ?> -->
                        <i class="fa-solid fa-pen-to-square get-companyinfo" data-bs-toggle="modal" data-bs-target="#myModalcompany" style="color: orange; font-size: 18px;" editcompany-id ="<?= $insuranceCompany->id ?>"></i>
                        <i class="fa-solid fa-trash-can delete-insurance-company" style="color: red; font-size: 18px; cursor: pointer;" status-id ="<?= $insuranceCompany->deleted?>" deleteinsurance-id ="<?= $insuranceCompany->id?>"></i>         
                        <!-- <i class="fa-solid fa-trash delete-user" style="color: red; font-size: 18px;" <?= $insuranceCompany->id?>></i>                           -->

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

<div class="modal" id="myModalcompany">
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

       <?= $this->Form->create($insuranceCompany,['id'=>'formid']) ?>
       <input type="hidden" id="companylisting_id" name="id">
       
           <fieldset>
               <legend><?= __('Edit User') ?></legend>
               <?php
                   echo $this->Form->control('name',['class'=>'policy','id'=>'name']);

               ?>
           </fieldset>
           <?= $this->Form->button(__('Submit'),['class'=>'edit-company', 'data-bs-dismiss' =>'modal']) ?>
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



