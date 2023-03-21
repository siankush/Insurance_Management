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
    margin-top: -61px;
    padding: 4px;
    width: 176px;
    border-radius: 20px;
    /* border: 3px solid black; */
    background: #ff5722;
    color: white;
    text-align: center;
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
input#searchbox {
    padding: 7px;
    margin-bottom: 23px;
    border-radius: 20px;
    border: 1px solid grey;
}
body.modal-open .background-container{
    -webkit-filter: blur(4px);
    -moz-filter: blur(4px);
    -o-filter: blur(4px);
    -ms-filter: blur(4px);
    filter: blur(4px);

}
</style>
<div class='container-fluid background-container'>
    <?php echo $this->Flash->render(); ?>
</div>
<div class="insurancesCompany index content" style="margin-top: 120px;" id='change-status'>
    
<div class="container-fluid">
   
    <h1 style="padding-bottom:70px; text-align:center;font-weight:800;font-size:35px;">COMPANIES LISTINGS</h1>
    <?= $this->Form->create(null,['type'=>'GET']) ?>
    <?= $this->Form->control('key',['label'=>false,'placeholder'=>'Search And Enter','id'=>'searchbox']) ?>
    <!-- <?= $this->Form->submit() ?> -->
    <?= $this->Form->end() ?>
    <a href="/insurance-companies/add" class="addcomp">Add Company</a>
    <table class="table table-hover" id="datatablesSimple" >

            <thead>
            <tr id="#tablerow_user">
                    <th>Sr.No</th>
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
                        <i class="fa-solid fa-pen-to-square get-companyinfo" data-bs-toggle="modal" data-bs-target="#myModalcompany" style="color: orange; font-size: 18px; cursor: pointer;" editcompany-id ="<?= $insuranceCompany->id ?>"></i>
                        <i class="fa-solid fa-trash-can delete-insurance-company" style="color: red; font-size: 18px; cursor: pointer;" status-id ="<?= $insuranceCompany->deleted?>" deleteinsurance-id ="<?= $insuranceCompany->id?>"></i>         
                        <!-- <i class="fa-solid fa-trash delete-user" style="color: red; font-size: 18px;" <?= $insuranceCompany->id?>></i>                           -->

                    </td>

                </tr>
                <?php $n++; ?>
                <?php endif; ?>
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

     
       <!-- Modal body -->
       <div class="modal-body">
        
   
   <div class="column-responsive column-80">
     <div class="insurancesCompany view content">
       <h1 style="padding-bottom:70px; text-align:center;font-weight:800;font-size:25px;color:white">INSURANCE COMPANY EDIT</h1>

       <?= $this->Form->create($insuranceCompany,['id'=>'formid']) ?>
       <input type="hidden" id="companylisting_id" name="id">
       
           <fieldset>
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



<script>
  function performSearch() {
      
      // Declare search string 
      var filter = searchBox.value.toUpperCase();
      
      // Loop through first tbody's rows
      for (var rowI = 0; rowI < trs.length; rowI++) {
        
        // define the row's cells
        var tds = trs[rowI].getElementsByTagName("td");

    // hide the row
    trs[rowI].style.display = "none";
    
    // loop through row cells
    for (var cellI = 0; cellI < tds.length; cellI++) {

        // if there's a match
        if (tds[cellI].innerHTML.toUpperCase().indexOf(filter) > -1) {

          // show the row
          trs[rowI].style.display = "";
          
            // skip to the next row
            continue;
            
          }
    }
}

}

// declare elements
const searchBox = document.getElementById('searchbox');
const table = document.getElementById("datatablesSimple");
const trs = table.tBodies[0].getElementsByTagName("tr");

// add event listener to search box
searchBox.addEventListener('keyup', performSearch);

</script>