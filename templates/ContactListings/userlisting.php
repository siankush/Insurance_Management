<?php echo $this->Html->css('cake'); ?>
<style>
/* .cake-error {
    display: none;
} */
h4.card-title {
    font-size: 20px !important;
    text-transform: uppercase !important;
    font-weight: 800 !important;
    width: 50%;
}
th {
    font-size: 17px !important;
    font-weight: 700 !important;
}
td , td.py-1{
    font-size: 17px !important;
}
a.badge.badge-sm.bg-gradient-secondary {
    background: #d42d00;
    font-size: 14px;
    border-radius: 10px;
    color: white !important;
}
a.badge.badge-sm.bg-gradient-success {
    background: #00c583;
    font-size: 14px;
    border-radius: 10px;
    color: white !important;
}
.stretch-card > .card {
    width: 100% !important;
    min-width: 100% !important;
}
.main-panel {
    transition: width 0.25s ease, margin 0.25s ease;
    width: calc(100% - 235px);
    min-height: calc(100vh - 60px);
    display: -webkit-flex;
    display: flex;
    -webkit-flex-direction: column;
    flex-direction: column;
    width: 100% !important;
}
button.btn-close{
  border:none;
}
.col-lg-12.grid-margin.stretch-card {
    margin-top: 50px;
}
i.fa-solid.fa-xmark {
    font-size: 24px;
    color: black;
    background: white;
}
.message.success {
    background: #e3fcec;
    color: #1f9d55;
    border-color: #51d88a;
    margin-top: -115px !important;
}

input#searchbox {
    padding: 7px;
    margin-bottom: 23px;
    border-radius: 20px;
    border: 1px solid grey;
}
</style>
<?php echo $this->element("sidebar"); ?>     
      <div class="main-panel background-container" id="change-status">
        <div class="content-wrapper">
          <div class="row">              
              <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                      <div class="card-body">
                    <!-- <?= $this->Html->link(__('Add'), ['controller'=>'ContactListings','action' => 'add'], ['class' => 'btn btn-primary float-right','type'=>'button']) ?> -->
                    <?= $this->Form->create(null,['type'=>'GET']) ?>
    <?= $this->Form->control('key',['label'=>false,'placeholder'=>'Search','id'=>'searchbox']) ?>
    <!-- <?= $this->Form->submit() ?> -->
    <?= $this->Form->end() ?>
                    <a href="/contact-listings/add" class="btn btn-primary float-right">Add</a>                    
                  <h4 class="card-title">Contact Listings</h4>
                  <?php echo $this->Flash->render(); ?>

                  <div class="table-responsive">
                
                    <table class="table table-striped" id="datatablesSimple">
                      <thead>
                        <tr>
                          <th>
                            Sr.No
                          </th>
                          <th>
                            Name
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            Phone
                          </th>
                          <th>
                            Address
                          </th>
                   
                          <th>
                            Status
                          </th>
                          <th>
                            Client Status
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $n = $this->Paginator->counter('{{start}}') ?>
                        <?php foreach ($contactListings  as $contactlist) :?> 
                          <?php if($contactlist->deletestatus == 1) :?>
                        <tr id="data<?php echo $contactlist->id;?>">
                          <td class="py-1">
                          <?= h($n); ?>
                          </td>
                          <td>
                            <?= h($contactlist->name); ?>
                          </td>
                          <td>
                          <?= h($contactlist->email); ?>
                          </td>
                          <td>
                          <?= h($contactlist->phone); ?>
                          </td>
                          <td>
                          <?= h($contactlist->address); ?>
                          </td>
                        
                        
                          <td class="align-middle text-sm">
                          <!-- <?= h($contactlist->status); ?> -->
                          <?php  if($contactlist->status == 1) : ?>
                            
                            <?= $this->Form->postLink(__('Active'),['action' => 'userstatus', $contactlist->id, $contactlist->status],['class'=>'badge badge-sm bg-gradient-success','confirm' => __('Are you sure you want to Inactive ?', $contactlist->id)]) ?>
                            <?php else : ?>
                                
                                <?= $this->Form->postLink(__('Inactive'), ['action' => 'userstatus', $contactlist->id, $contactlist->status],['class'=>'badge badge-sm bg-gradient-secondary','confirm' => __('Are you sure you want to Active ?', $contactlist->id)]) ?>
                                <?php endif; ?> 
                         </td>
                         <td>
                          <?php $asserarray = array(); foreach($contactlist->company_assets as $assets):
                                  $asserarray[] =+ $assets->policy_status;
                                endforeach;
                            ?>
                         <?php  if(in_array(1,$asserarray)) {?>
                                  <?php echo "Client"; ?>                            
                            <?php }else { ?>
                                
                              <?php echo "Prospect"; ?>                            
                                <?php } ?> 
                          </td>
                          
                          <td>
                          
                          <i class="fa-solid fa-pen-to-square edit-user" data-bs-toggle="modal" data-bs-target="#myModal" style="color: orange; font-size: 18px;" edituser-id ="<?= $contactlist->id ?>"></i>
                          <?= $this->Form->postLink(__(''), ['action' => 'view', $contactlist->id], ['class'=>'fa-solid fa-eye p-2']) ?>
                          <i class="fa-solid fa-trash delete-user" style="color: red; font-size: 18px;" status-id ="<?= $contactlist->deletestatus?>" deleteuser-id ="<?= $contactlist->id?>"></i>                          
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
              </div>
            </div>
          </div>
        </div>
        <a  class="whats-app" href="https://web.whatsapp.com/" target="_blank">
    <!-- <i class="fa fa-whatsapp my-float"></i> -->
    <i class="fa-brands fa-whatsapp my-float"></i>
</a>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
          <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023 All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Made By SkyDash <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->  

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i></button>
       </div>

       <!-- Modal body -->
       <div class="modal-body">
        

       <div class="content-wrapper d-flex align-items-center auth px-0">
         <div class="row w-100 mx-0">
          <div class="col-lg-12 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <?php echo $this->Html->image('images/logo.svg',['alt'=>'logo'])?>
              </div>
                <?php echo $this->Form->create($contactListings,['id'=>'formid'])?>
                <input type="hidden" id="contactlist_id" name="id">
                
                <!-- <div class="form-group">                  
                <?php echo $this->Form->control('user_id', ['label'=>false,'options' => $users ,'class'=>'form-control','id'=>'','required'=>false]); ?>
                </div> -->
                <div class="form-group">                  
                <?php echo $this->Form->control("name",['label'=>false,'id'=>'name', 'class'=>'form-control form-control-lg','placeholder'=>'Name','required'=>false]); ?>
                <span id="uname"></span>
                </div>
                <div class="form-group">                
                  <?php echo $this->Form->control("email",['label'=>false,'id'=>'email', 'class'=>'form-control form-control-lg','placeholder'=>'Email','id'=>'email','required'=>false]); ?>                  
                  <span id="uemail"></span>
                </div>
                <div class="form-group">                  
                <?php echo $this->Form->control("phone",['label'=>false, 'class'=>'form-control form-control-lg','placeholder'=>'Phone','id'=>'phone','required'=>false]); ?>
                <span id="uphone"></span>
                </div>
                <div class="form-group">                  
                  <?php echo $this->Form->control("address",['label'=>false,'id'=>'address', 'class'=>'form-control form-control-lg','placeholder'=>'Address','id'=>'address','required'=>false]); ?>                  
                  <span id="uaddress"></span>
                </div>

                <div class="mt-3">
                  <!-- <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html">SIGN UP</a> -->
                <?= $this->Form->button(__('Submit'),['class'=>'btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn edit-data','id'=>'submit']) ?>
                  

                </div>
                <?= $this->Form->end() ?> 
            </div>
          </div>
        </div>
       </div>
      </div>

      <!-- Modal footer -->
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div> -->

    </div>
  </div>
</div> 

<script>
  function performSearch() {
      
      // Declare search string 
      var filter = searchBox.value.toUpperCase().trim();
      
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
<?= $this->Html->script('userscript') ?>
<?= $this->Html->script('script1') ?>

  








