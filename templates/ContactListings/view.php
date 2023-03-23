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
select#policyname,select#premiumnumber {
    border: 1px solid #CED4DA;
    color: #495057;
}
#download {
    float: right;
    background-color: DodgerBlue;
    border: none;
    color: white;
    padding: 12px 30px;
    cursor: pointer;
    font-size: 20px;
    animation: button-loading-spinner 1s ease infinite;
}
#download--loading::after {
    content: "";
    position: absolute;
    width: 16px;
    height: 16px;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    margin: auto;
    border: 4px solid transparent;
    border-top-color: #ffffff;
    border-radius: 50%;
    animation: button-loading-spinner 1s ease infinite;
}
/* Paginator */
.paginator {
    text-align: right;
}
.pagination {
    display: flex;
    justify-content: center;
    list-style: none;
    padding: 0;
    margin: 0 0 1rem;
}
.pagination li {
    margin: 0 0.5rem;
}
.prev.disabled a,
.next.disabled a {
    cursor: not-allowed;
    color: #606c76;
}
.asc:after {
    content: " \2193";
}
.desc:after {
    content: " \2191";
}
.card {
    margin-top: 80px;
}
h1#check {
    text-align: center;
    margin-right: 180px;
}
</style>


<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>


    <?php echo $this->element("sidebar"); ?>

      <div class="main-panel" id="change-status">
      <?php echo $this->Flash->render(); ?>

        <div class="content-wrapper">
        <button class="btn"  id="download"><i class="fa fa-download"></i> Download</button>


          <div class="row background-container" style="justify-content: center;">
          
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <!-- <h4 class="card-title">Basic Table</h4> -->
                  <!-- <h3><?= h($contactListings->name) ?> -->
                  <!-- <?= $this->Html->link(__('Add Policy'), [ $contactListings->id], ['class' => 'btn btn-primary float-right mb-4 data-bs-toggle="modal" data-bs-target="#exampleModal"']) ?> -->
                  
                  <?php $totalPrice = 0;
                  foreach ($policycount as $policycountt) {
                   
                      
                      $totalPrice += $policycountt->insurance_policy->premium;
                      
                      // echo $company->insurance_policy->premium;
                    } 
                    // $totalPrice = $companyAssetss->sumOf('premium');
                  
                  ?>
                 
                  <h3>Total Policies : <span class='badge'><?php echo ($count); ?></span></h3>
                  <h3>Total Premium Price : <span class='badge'><?php echo ($totalPrice); ?></span></h3>
                  

                  <!-- <h2 style="text-align: center;">Contact View</h2> -->
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add Policy
                  </button>
                  <!-- <button onclick="window.print();">Convert HTML to PDF</button> -->

                  </h3>
                  <!-- <p class="card-description">
                    Add class <code>.table</code>
                  </p> -->
                  <div class="table-responsive">
                    <table class="table">
                        
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

<div class="content-wrapper " id="contentToPrint">
<div class="container background-container">  
<?php foreach($companyAssetss as $company){ ?>
<?php  

?>
<table class="table table-hover" id="tablehide">
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
    <?php $n = $this->Paginator->counter('{{start}}') ?>

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
   <?php else : ?>
   <?php  echo 'Pending'; ?>
                       
    <?php endif; ?> 
</td>
        <td>
          <i class="fa-solid fa-trash delete-policy" style="color: red; font-size: 18px; cursor: pointer;" status-id ="<?= $companyAsset->deleted?>" deletepolicy-id ="<?= $company->id?>"></i>                          
         </td>
      </tr>
     
    </tbody>

    <?php endif; ?> 
    <?php $n++; ?>
  <?php } ?>

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
    <?php  
?>
  <?php } ?>

    </div>
    
    </div>

    <a  class="whats-app" href="https://web.whatsapp.com/" target="_blank">
    <!-- <i class="fa fa-whatsapp my-float"></i> -->
    <i class="fa-brands fa-whatsapp my-float"></i>
</a>



        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Policy</h5>
        <i class="fa-solid fa-xmark" data-bs-dismiss="modal" aria-label="Close"></i>
      </div>
      <div class="modal-body">
      <div class="content-wrapper d-flex align-items-center auth px-0">
         <div class="row w-100 mx-0">
          <div class="col-lg-12 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <?php echo $this->Html->image('images/logo.svg',['alt'=>'logo'])?>
              </div>
                <?php echo $this->Form->create($companyAsset,['id'=>'formid'])?>
                <input type="hidden" id="contactlist_id" name="id">
                
                <div class="form-group">                  
                <!-- <?php echo $this->Form->control("user_id",['label'=>false,'id'=>'user_id', 'class'=>'form-control form-control-lg','placeholder'=>'Email', 'value'=> '']); ?>  -->
                <input type="hidden" name="user_id" value="<?php echo $result->id ?>">
                <input type="hidden" name="contact_listing_id" value="<?php echo $contactListings->id ?>">
                </div>

                <div class="form-group">     
                <?php echo $this->Form->control("insurance_company_id",['id'=>'', 'class'=>'form-control form-control-lg','id'=>'insurancecomapny','required'=>false]); ?>
                </div>
                <div class="form-group">    
                <?php echo $this->Form->control("insurance_policy_id",['id'=>'', 'options' => $insurancePolicies,'class'=>'form-control form-control-lg','id'=>'policyname','required'=>false]); ?>
              </div>
                <div class="form-group">     
                <?php echo $this->Form->control("premium",['id'=>'', 'options' => $insurancePremium,'class'=>'form-control form-control-lg','id'=>'premiumnumber','required'=>false]); ?>
                </div>
                <label>Term Length</label><br>
                  <?php echo $this->Form->radio('term_length',['3 month'=>'3 Month','6 month'=> '6 Month', '9 month'=>'9 Month'],['required'=>true]) ?>
                  <span class="errorTxt text-danger"></span>
                <?php                
                // echo $this->Form->control('term_length',['class'=>'clt','label'=>false]);
                    echo $this->Form->control('status',['class'=>'clt','label'=>false]);
                    echo $this->Form->control('deleted',['class'=>'clt','label'=>false]);
?>
                <?php echo $this->Form->control('policy_status',['value'=>'1', 'class'=>'clt','label'=>false]); ?>

                <div class="mt-3">
                  <!-- <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html">SIGN UP</a> -->
                  <?= $this->Form->button(__('Submit'),['class'=>'btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn edit-data']) ?>

                </div>
                <?= $this->Form->end() ?> 
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<script>
        $(document).ready(function() {
            var csrfToken = $('meta[name="csrfToken"]').attr('content');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
                }
            });
            $("#policyname").on('change', function() {

                var id = $(this).val();

                //  alert(id);
                // return false;
                $("#premiumnumber").find('option').remove();
                // $("#color").find('option').remove();
                // if (id) {
                // var dataString = 'id=' + id;
                // alert(dataString);
                // return false;
                $.ajax({
                    type: "post",
                    url: '/contact-listings/getpremium',
                    data: {
                        'id': id
                    },
                    cache: false,
                    success: function(html) {
                        // $('.modeldiv').html(response);
                        // $("#loding1").hide();

                        //   alert(response);
                        // alert('ghhjjhnjk');

                        $.each(html, function(key, value) {
                            // alert(value);
                            $('<option>').val(value.id).text('select');
                            $("#premiumnumber").append('<option value=' + value.id + '>' + value.premium + '</option>');
                            //  $('<option>').text(value).appendTo($("#car_model"));
                        });
                        // $('.')
                    }
                });
                // }
            });
            });

  </script>
  <script>
window.onload = function () {
    document.getElementById("download")
        .addEventListener("click", () => {
            const invoice = this.document.getElementById("contentToPrint");
            console.log(invoice);
            console.log(window);
            var opt = {
              margin: [1, -2.5, 0, 0], 
                filename: 'myfile.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(invoice).set(opt).save();
        })
}

const theButton = document.querySelector("#download");

theButton.addEventListener("click", () => {
    theButton.classList.add("button--loading");
});
  </script>
  <?= $this->Html->script(['pdf']); ?>
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
   
      // alert(formData+statusData);
      // alert(formData);
      // var statusData = $(this).attr("status-id");
  
        swal({
        title: "Are you sure to delete this  of ?",
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
                      location.reload('/contact-listings/view/ #change-status');

          
                    }
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


<script>
// just for the demos, avoids form submit
jQuery(function($) {
  var validator = $('#formid').validate({
    rules: {
      term_length: {
        required: true
      }
      
    },
    messages: {},
    errorElement : 'div',
    errorLabelContainer: '.errorTxt'
  });
});
</script>
