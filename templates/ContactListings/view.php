<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContactListings $contactListings
 */
?>
<style>
  .clt{
    display: none;
  }

  td {
    font-size: 16px !important;
    font-weight: 500;
}
.error-message {
    display: none;
    
}
button.btn.btn-primary {
    margin-bottom: 17px;
    float: right;
}
i.fa-solid.fa-xmark {
    color: black;
    font-size: 23px;
}
.auth .auth-form-light {
    background: #ffffff;
    padding-bottom: 79px !important;
}
label {
    font-size: 15px !important;
    font-weight: 800 !important;
}
span.badge {
    font-size: 22px;
    font-weight: 600;
}
table.table.table-hover {
    /* border: 1px solid black; */
    background: white;
    border-radius: 20px;
}
th {
    font-size: 17px !important;
    font-weight: 800 !important;
}
.table td img, .jsgrid .jsgrid-table td img {
    width: 65px;
    height: 60px;
    border-radius: 100%;
}
.input.select.error {
  display: none !important;
}
#insurancesscomapny {
  display: none;
}
</style>
<div class="row">
    <!-- <aside class="column"> -->
        <!-- <div class="side-nav"> -->
            <!-- <h4 class="heading"><?= __('Actions') ?></h4> -->
            <!-- <?= $this->Html->link(__('Edit Contacts Listing'), ['action' => 'edit', $contactListings->id], ['class' => 'side-nav-item']) ?> -->
            <!-- <?= $this->Form->postLink(__('Delete Contacts Listing'), ['action' => 'delete', $contactListings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contactListings->id), 'class' => 'side-nav-item']) ?> -->
            <!-- <?= $this->Html->link(__('List Contacts Listing'), ['action' => 'index'], ['class' => 'side-nav-item']) ?> -->
            <!-- <?= $this->Html->link(__('New Contacts Listing'), ['action' => 'add'], ['class' => 'side-nav-item']) ?> -->
        <!-- </div> -->
    <!-- </aside> -->
    <!-- <div class="column-responsive column-80">
        <div class="contactListings view content">
            <h3><?= h($contactListings->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $contactListings->has('user') ? $this->Html->link($contactListings->user->id, ['controller' => 'Users', 'action' => 'view', $contactListings->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($contactListings->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($contactListings->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td.input.select.error {
   display: none;
   }><?= h($contactListings->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($contactListings->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($contactListings->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($contactListings->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($contactListings->created_at) ?></td>
                </tr>
            </table>
        </div>
    </div> -->
 </div>






    <?php echo $this->element("sidebar"); ?>

      <div class="main-panel" >
        <div class="content-wrapper">
          <div class="row" style="justify-content: center;">
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <!-- <h4 class="card-title">Basic Table</h4> -->
                  <!-- <h3><?= h($contactListings->name) ?> -->
                  <!-- <?= $this->Html->link(__('Add Policy'), [ $contactListings->id], ['class' => 'btn btn-primary float-right mb-4 data-bs-toggle="modal" data-bs-target="#exampleModal"']) ?> -->
                  <?php $totalPrice = 0;
                
                  foreach ($companyAssetss as $company) {
                      $totalPrice += $company->insurance_policy->premium;
                      // echo $company->insurance_policy->premium;
                  } 
                        // $totalPrice = $companyAssetss->sumOf('premium');
                  ?>
                 <div id="change-status">
                  <h3>Total Policies : <span class="badge"><?php echo count($companyAssetss); ?></span></h3>
                  <h3>Total Premium Price : <span class="badge"><?php echo $totalPrice; ?></span></h3>
                </div> 
                  <!-- <h2 style="text-align: center;">Contact View</h2> -->
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add Policy
                  </button>
                  </h3>
                  <!-- <p class="card-description">
                    Add class <code>.table</code>
                  </p> -->
                  <div class="table-responsive">
                    <table class="table">
                        <!-- <tr>
                            <th><?= __('User') ?></th>
                            <td><?= $contactListings->has('user') ? $this->Html->link($contactListings->user->id, ['controller' => 'Users', 'action' => 'view', $contactListings->user->id]) : '' ?></td>
                        </tr> -->
                        <tr>
                            <th><?= __('Name') ?></th>
                            <td><?= h($contactListings->name) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Email') ?></th>
                            <td><?= h($contactListings->email) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Phone') ?></th>
                            <td><?= h($contactListings->phone) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Address') ?></th>
                            <td><?= h($contactListings->address) ?></td>
                        </tr>
                        <!-- <tr>
                            <th><?= __('Status') ?></th>
                            <td><?= h($contactListings->status) ?></td>
                        </tr> -->
                        <!-- <tr>
                            <th><?= __('Id') ?></th>
                            <td><?= $this->Number->format($contactListings->id) ?></td>
                        </tr> -->
                        <tr>
                            <th><?= __('Created At') ?></th>
                            <td><?= h($contactListings->created_at) ?></td>

                        </tr>
                    
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
<!--   -->

<div class="content-wrapper">
<div class="container">  
<table class="table table-hover">
  <h2 style="text-align: center; margin-bottom:20px;">Insurance List  </h2>
    <thead>
      <tr>
        <th>S.No</th>
        <th>Image</th>
        <th>Insurance Company </th>
        <th>Insurance Policy</th>
        <th>Premium</th>
        <th>Term Length</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php $n=1; ?>

    <?php foreach($companyAssetss as $company){ ?>
      <?php if($company->deleted == 1 || $company->policy_status == 1) : ?>

      <tr id="data<?php echo $company->id;?>">
        <td><?php echo $n ?></td>
        <td><?php   echo $this->Html->image($company->insurance_policy->image);  ?></td>
        <td><?php   echo $company->insurance_company->name; ?></td>
        <td><?php   echo $company->insurance_policy->name;  ?></td>
        <td><?php   echo $company->insurance_policy->premium; ?></td>
        <td><?php   echo $company->term_length; ?></td>
        <td>
 
          <?php  if($company->checkstatus == 1) : ?>
            <?php  echo 'Approved'; ?>
            <?php elseif($company->checkstatus == 0) : ?>
            <?php  echo 'Rejected'; ?>
            <?php else : ?>
            <?php  echo 'Pending'; ?>
                                
             <?php endif; ?> 
        </td>
        <td>
          <i class="fa-solid fa-trash delete-policy" style="color: red; font-size: 18px; cursor: pointer;" status-id ="<?= $companyAsset->deleted ?>" deletepolicy-id ="<?= $company->id?>"></i>                          
        </td>
      </tr>
      
    </tbody>
    <?php endif; ?>
    <?php $n++; ?>
    <?php } ?>
    
  </table>
</div>
<?php echo $this->Form->create($companyAsset,['id'=>'formid'])?>
    <div class="form-group">                  
    <input type="hidden" name="user_id" value="<?php echo $result->id ?>">
    <input type="hidden" name="contact_listing_id" value="<?php echo $contactListings->id ?>">
    </div>
    <div class="container m-auto row">
      <div class="col-3">
      <?php echo $this->Form->control("insurance_company_id",['id'=>'', 'class'=>'form-control form-control-lg','id'=>'insurancecomapny','required'=>false]); ?>
      </div>
      <div class="col-3">
      <?php echo $this->Form->control("insurance_policy_id",['id'=>'', 'options' => $insurancePolicies,'class'=>'form-control form-control-lg','id'=>'insurancecomapny','required'=>false]); ?>
      </div>
      <div class="col-3">
      <?php echo $this->Form->control("premium",['id'=>'', 'options' => $insurancePremium,'class'=>'form-control form-control-lg','required'=>false]); ?>
      </div>
      <div class="col-3">
      <?php echo '<label for="make">Term Length</label>';
            echo $this->Form->select('term_length', [
              '3 month'=>'3 Month',
              '6 month'=> '6 Month',
              '9 month'=>'9 Month',
            ],
            ['class'=>'form-control p-2'],
          );
          ?>
      </div>
          <?php                
              echo $this->Form->control('status',['class'=>'clt','label'=>false]);
              echo $this->Form->control('deleted',['class'=>'clt','label'=>false]);
          ?>
          
          <?php echo $this->Form->control('policy_status',['value'=>'1', 'class'=>'clt','label'=>false]); ?>
          
          
          <div class="form-group">                  
            <input type="hidden" name="user_id1" value="<?php echo $result->id ?>">
    <input type="hidden" name="contact_listing_id1" value="<?php echo $contactListings->id ?>">
    </div>
    <div class="container m-auto row">
      <div class="col-3">
      <?php echo $this->Form->control("insurance_company_id1",['id'=>'', 'options' => $insuranceCompanies,'class'=>'form-control form-control-lg','id'=>'insurancecomapny','required'=>false]); ?>
      </div>
      <div class="col-3">
        <?php echo $this->Form->control("insurance_policy_id1",['id'=>'', 'options' => $insurancePolicies,'class'=>'form-control form-control-lg','id'=>'insurancecomapny','required'=>false]); ?>
      </div>
      <div class="col-3">
        <?php echo $this->Form->control("premium1",['id'=>'', 'options' => $insurancePremium,'class'=>'form-control form-control-lg','required'=>false]); ?>
      </div>
      <div class="col-3">
        <?php echo '<label for="make">Term Length</label>';
            echo $this->Form->select('term_length1', [
              '3 month'=>'3 Month',
              '6 month'=> '6 Month',
              '9 month'=>'9 Month',
            ],
            ['class'=>'form-control p-2'],
          );
          ?>
      </div>
      <?php                
              echo $this->Form->control('status1',['value'=>'1','class'=>'clt','label'=>false]);
              echo $this->Form->control('deleted1',['value'=>'1','class'=>'clt','label'=>false]);
              ?>
          
          <?php echo $this->Form->control('policy_status1',['value'=>'1', 'class'=>'clt','label'=>false]); ?>

          <div class="form-group">                  
            <input type="hidden" name="user_id2" value="<?php echo $result->id ?>">
    <input type="hidden" name="contact_listing_id2" value="<?php echo $contactListings->id ?>">
    </div>
    <div class="container m-auto row">
      <div class="col-3">
      <?php echo $this->Form->control("insurance_company_id2",['id'=>'', 'options' => $insuranceCompanies,'class'=>'form-control form-control-lg','id'=>'insurancecomapny','required'=>false]); ?>
      </div>
      <div class="col-3">
        <?php echo $this->Form->control("insurance_policy_id2",['id'=>'', 'options' => $insurancePolicies,'class'=>'form-control form-control-lg','id'=>'insurancecomapny','required'=>false]); ?>
      </div>
      <div class="col-3">
        <?php echo $this->Form->control("premium2",['id'=>'', 'options' => $insurancePremium,'class'=>'form-control form-control-lg','required'=>false]); ?>
      </div>
      <div class="col-3">
        <?php echo '<label for="make">Term Length</label>';
            echo $this->Form->select('term_length2', [
              '3 month'=>'3 Month',
              '6 month'=> '6 Month',
              '9 month'=>'9 Month',
            ],
            ['class'=>'form-control p-2'],
          );
          ?>
      </div>
      <?php                
              echo $this->Form->control('status2',['value'=>'1','class'=>'clt','label'=>false]);
              echo $this->Form->control('deleted2',['value'=>'1','class'=>'clt','label'=>false]);
              ?>
          
          <?php echo $this->Form->control('policy_status2',['value'=>'1', 'class'=>'clt','label'=>false]); ?>
          
          
          
          <div class="mt-3">
        <?= $this->Form->button(__('Submit'),['class'=>'btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn edit-data']) ?>
        
      </div>
      <?= $this->Form->end() ?> 
    </div>

  </div>

  
  
  <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title margin-auto" id="exampleModalLabel">Add Policy</h5>
          <i class="fa-solid fa-xmark" data-bs-dismiss="modal" aria-label="Close"></i>
        </div>
        <div class="col-12 m-auto modal-body">
          <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
          <div class="col-lg-8 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
             <div class="brand-logo">
                <?php echo $this->Html->image('images/logo.svg',['alt'=>'logo'])?>
              </div>
              <div class="form-group">                  
               <input type="hidden" name="user_id" value="<?php echo $result->id ?>">
                <input type="hidden" name="contact_listing_id" value="<?php echo $contactListings->id ?>">
                </div>
                <div class="form-group">     
                <?php echo $this->Form->control("insurance_company_id",['id'=>'', 'class'=>'form-control form-control-lg','id'=>'insurancecomapny','required'=>false]); ?>
                </div>
                <div class="form-group">    
                <?php echo $this->Form->control("insurance_policy_id",['id'=>'', 'options' => $insurancePolicies,'class'=>'form-control form-control-lg','id'=>'insurancecomapny','required'=>false]); ?>
              </div>
                <div class="form-group">     
                <?php echo $this->Form->control("premium",['label'=> false,'id'=>'insurancesscomapny', 'options' => $insurancePremium,'class'=>'form-control form-control-lg','required'=>false]); ?>
                </div>
                <label>Term Length</label><br>
                  <?php echo $this->Form->radio('term_length',['3 month'=>'3 Month','6 month'=> '6 Month', '9 month'=>'9 Month']) ?>
                  <?php                
                   echo $this->Form->control('status',['class'=>'clt','label'=>false]);
                   echo $this->Form->control('deleted',['class'=>'clt','label'=>false]);
                   ?>
          
                   <?php echo $this->Form->control('policy_status',['value'=>'1', 'class'=>'clt','label'=>false]); ?>
                <div class="mt-3">
                  <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html">SIGN UP</a>
                  <?= $this->Form->button(__('Submit'),['class'=>'btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn edit-data']) ?>

                </div>

                </div>
                <?= $this->Form->end() ?> 
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>
   </div>
</div> -->


<script>
  $(document).on("click", ".delete-policy", function(){
    var csrfToken = $('meta[name="csrfToken"]').attr('content');
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
      }
    });
    var formData = $(this).attr("deletepolicy-id");
    var statusData = $(this).attr("status-id");
    // alert(formData);
   
      // alert(formData+statusData);
      // alert(formData);
      // var statusData = $(this).attr("status-id");
  
        swal({
        title: "Are you sure to delete this ?",
        text: "Delete Confirmation?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Delete",
        closeOnConfirm: false
        },
        function() {
              $.ajax({
                  url: "http://localhost:8765/ContactListings/deletepolicy/"+formData,
                  data: {'id':formData, 'deleted': statusData},
                  type: "JSON",
                  method: "post",
                  success:function(response){
                    
                    swal("Done!","It was succesfully deleted!","success");
                    var dataArr = JSON.parse(response);
                    if(dataArr.status ==1 ){
                      $("#data"+formData).hide();
                    }
                    // $('#change-status').load('contact-listings/view');
                    location.reload('contact-listings/view/');

                  }
              }).done(function(data) {
                  swal("Deleted!", "Data successfully Deleted!", "success");
                })
                .error(function(data) {
                  swal("Oops", "We couldn't connect to the server!", "error");
                });
                    }
        )
  });  
</script>  