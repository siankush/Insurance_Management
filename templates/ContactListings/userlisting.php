<?php echo $this->Html->css('cake'); ?>
<style>
/* .cake-error {
    display: none;
} */
h4.card-title {
    font-size: 20px !important;
    text-transform: uppercase !important;
    font-weight: 800 !important;
}
th {
    font-size: 17px !important;
    font-weight: 700 !important;
}
td , td.py-1{
    font-size: 17px !important;
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
</style>
<?php echo $this->element("sidebar"); ?>      
      <div class="main-panel" id="change-status">
        <div class="content-wrapper">
          <div class="row">

              
              <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                      <div class="card-body">
                    <!-- <?= $this->Html->link(__('Add'), ['controller'=>'ContactListings','action' => 'add'], ['class' => 'btn btn-primary float-right','type'=>'button']) ?> -->
                    <a href="/contact-listings/add" class="btn btn-primary float-right">Add</a>                    
                  <h4 class="card-title">Contact Listings</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Sr.
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
                            
                            <?= $this->Form->postLink(__('Active'),['action' => 'userstatus', $contactlist->id, $contactlist->status],['class'=>'badge badge-sm bg-gradient-success'], ['confirm' => __('Are you sure you want to Inactive ?', $contactlist->id)]) ?>
                            <?php else : ?>
                                
                                <?= $this->Form->postLink(__('Inactive'), ['action' => 'userstatus', $contactlist->id, $contactlist->status],['class'=>'badge badge-sm bg-gradient-secondary'], ['confirm' => __('Are you sure you want to Active ?', $contactlist->id)]) ?>
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
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
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
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
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
<?= $this->Html->script('userscript') ?>

  

<script>
  $(document).ready(function(){
    


    var fname_err = true;  
    var lname_err = true;
    var email_err = true;
    var phone_err = true;      
    var pass_err = true;
    var conpass_err = true;
    var address_err = true;
    

    $('#uname').hide();
    $('#name').keyup(function(){
        username_check();
    });

    function username_check(){
        var user_val = $('#name').val();                

        if(user_val.length == ''){
            $('#uname').show();
            $('#uname').html("Please fill first name");
            $('#uname').focus();
            $('#uname').css("color","red");
            fname_err = false;
            return false;

        }else{
            $('#uname').hide();
        }

        if((user_val.length < 3) || (user_val.length > 20)){
            $('#uname').show();
            $('#uname').html("please enter user name between 3 and 20");
            $('#uname').focus();
            $('#uname').css("color","red");
            fname_err = false;
            return false;

        }else{
            $('#uname').hide();
        }


        if(!isNaN(user_val)){
            $('#uname').show();
            $('#uname').html("please enter valid name");
            $('#uname').focus();
            $('#uname').css("color","red");
            fname_err = false;
            return false;

        }else{
            $('#uname').hide();
        }
        
    }

                //----------------------last name validation--------------

    $('#luname').hide();                
    $('#lastName').keyup(function(){
        lastname_check();
    });

    function lastname_check(){
        var user_val1 = $('#lastName').val();                

        if(user_val1.length == ''){
            $('#luname').show();
            $('#luname').html("Please fill last name");
            $('#luname').focus();
            $('#luname').css("color","red");
            lname_err = false;
            return false;

        }else{
            $('#luname').hide();
        }

        if((user_val1.length < 3) || (user_val1.length > 20)){
            $('#luname').show();
            $('#luname').html("please enter user name between 3 and 20");
            $('#luname').focus();
            $('#luname').css("color","red");
            lname_err = false;
            return false;

        }else{
            $('#luname').hide();
        }

        if(!isNaN(user_val1)){
            $('#luname').show();
            $('#luname').html("please enter valid name");
            $('#luname').focus();
            $('#luname').css("color","red");
            lname_err = false;
            return false;

        }else{
            $('#luname').hide();
        }
        
    }

                //----------------------email validation--------------
    $('#uemail').hide();
    $('#email').keyup(function(){
        user_mail_check();
    });
                
    function user_mail_check(){
        var email_val = $('#email').val(); 
        var mailformat = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;               

        // $.ajax({
        //     type:'post',
        //     url: 'http://localhost:8765/users/register',
        //     data: {
        //         'check_Emailbtn':1,
        //         'email':email_val,
        //     },
        //     success: function (response) {
        //         console.log(response);
        //     }
        // });

        if(email_val.length == ''){
            $('#uemail').show();
            $('#uemail').html("Please fill email");
            $('#uemail').focus();
            $('#uemail').css("color","red");
            email_err = false;
            return false;

        }else{
            $('#uemail').hide();
        }

        if (!email_val.toLowerCase().match(mailformat)){
            $('#uemail').show();
            $('#uemail').html("Please fill valid email");
            $('#uemail').focus();
            $('#uemail').css("color","red");
            email_err = false;
            return false;

        }else{
            $('#uemail').hide();
        }


        if((email_val.length < 5) || (email_val.length > 50)){
            $('#uemail').show();
            $('#uemail').html("*please enter valid email");
            $('#uemail').focus();
            $('#uemail').css("color","red");
            email_err = false;
            return false;

        }else{
            $('#uemail').hide();
        }
        
        
    }

    //----------------------phone validation--------------

    $('#uphone').hide();
    $('#phone').keyup(function(){
        phone_check();
    });
                
    function phone_check(){
        var phone_val = $('#phone').val();           

        if(phone_val.length == ''){
            $('#uphone').show();
            $('#uphone').html("Please fill 10 digit phone number");
            $('#uphone').focus();
            $('#uphone').css("color","red");
            phone_err = false;
            return false;

        }else{
            $('#uphone').hide();
        }
       

        if((phone_val.length != 10) || (isNaN(phone_val))){
            $('#uphone').show();
            $('#uphone').html("phone number must be 10 digit only");
            $('#uphone').focus();
            $('#uphone').css("color","red");
            phone_err = false;
            return false;

        }else{
            $('#uphone').hide();
        }
        
        
    }

                //----------------------password validation--------------
    $('#upass').hide();
    $('#password').keyup(function(){
        password_check();
    });

    function password_check(){
        var pass = $('#password').val();
            if(pass.length == ''){
                $('#upass').show();
                $('#upass').html("Please fill password");
                $('#upass').focus();
                $('#upass').css("color","red");
                pass_err = false;
                return false;

            }else{
                $('#upass').hide();
            }

            if((pass.length < 5) || (pass.length > 20)){
                $('#upass').show();
                $('#upass').html("password length must be 5 words");
                $('#upass').focus();
                $('#upass').css("color","red");
                pass_err = false;
                return false;
    
            }else{
                $('#upass').hide();
            }  

        
    }

                    //----------------------confirm password validation--------------

    $('#conupass').hide();
    $('#cpassword').keyup(function(){
        con_password();
    });

        function con_password(){

            var conpass = $('#cpassword').val();
            var pass = $('#password').val();

            if(conpass.length == ''){
                $('#conupass').show();
                $('#conupass').html("Please fill confirm password");
                $('#conupass').focus();
                $('#conupass').css("color","red");
                conpass_err = false;
                return false;

            }else{
                $('#conupass').hide();
            }

            if(pass != conpass){
                $('#conupass').show();
                $('#conupass').html("Password not matching");
                $('#conupass').focus();
                $('#conupass').css("color","red");
                conpass_err = false;
                return false;

            }else{
                $('#conupass').hide();
            }
        }  

                //----------------------address validation--------------
                      
        $('#uaddress').hide();
        $('#address').keyup(function(){
        address_check();
        });                
        function address_check(){
        var user_val = $('#address').val();                

        if(user_val.length == ''){
            $('#uaddress').show();
            $('#uaddress').html("Please fill address");
            $('#uaddress').focus();
            $('#uaddress').css("color","red");
            address_err = false;
            return false;

        }else{
            $('#uaddress').hide();
        }        
    }

        //----------------------address validation--------------

        

        


        $('#submit').click(function(){
            fname_err = true;
            lname_err = true;
            email_err = true;
            phone_err = true;
            pass_err = true;
            conpass_err = true;
            address_err = true;

            username_check();
            lastname_check();
            user_mail_check();            
            phone_check();
            password_check();
            con_password();
            address_check();
            

            
            // if ($('input[name="gender"]:checked').length == 0) {
            //     $("#radio").html("* please select one");
            //     return false; }

            if((fname_err == true)&&(lname_err == true)&&(umail_err == true)&&(phone_err == true)&&(pass_err == true)&&
            (conpass_err == true)&&(address_err == true)){
                return true;                
            }else{
                return false;
            }

            


        });

});







</script>