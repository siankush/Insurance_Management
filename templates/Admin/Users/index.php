
<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\InsurancesCompany> $insurancesCompany
 */
?>
<style>
#sidebar {
    min-width: 280px;
    max-width: 280px;
    background-color: #15283c;
    color: #fff;
    transition: all 0.3s;
    position: relative;
    z-index: 11;
    box-shadow: 0 0 3px 0px rgba(0, 0, 0, 0.4);
    float: left;
    width: 100%;
    background-image: url('images/layout_img/pattern_h.png');
    position: fixed;
    height: 100%;
    overflow: auto;
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
p {
    color: #58718a;
    font-size: 14px;
    line-height: 21px;
}
#sidebar ul li a {
    padding: 15px 25px;
    display: block;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.9);
    font-weight: 300;
}
.edit-user {
  width: 100%;
  background-color: #ff5722;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
button#useradd {
    float: right;
    margin-top: -107px;
    padding: 6px;
    border-radius: 20px;
    width: 133px;
    background: #ff5722;
    color: white;
    border: 2px solid #0067ff;
    font-size: 18px;
    font-weight: 800;
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
<body class="dashboard dashboard_1">
<div class='container-fluid'>
    <?php echo $this->Flash->render(); ?>
</div>
      <div class="full_container" id='change-status'>
         <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section">
                        <a href="index.html"><?php echo $this->Html->image('logo/logo_icon.png',['class'=>'logo_icon img-responsive']) ?></a>
                     </div>
                  </div>
                  
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <div class="user_img"><?php echo $this->Html->image('layout_img/user_img.jpg',['class'=>'img-responsive']) ?></div>
                        <div class="user_info">
                           <h6 style="text-transform: capitalize;"><?php echo $user->first_name; ?></h6>
                           <p><span class="online_animation"></span> Online</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  <h4>General</h4>
                  <ul class="list-unstyled components">
                     <li class="active">
                        <a href="/admin/users/admin" ><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a>
                        
                     </li>
                     <li><a href="/insurance-companies/index"><i class="fa fa-clock-o orange_color"></i> <span>Insurance Companies</span></a></li>
                    
                     <li><a href="/insurance-policies/index"><i class="fa fa-table purple_color2"></i> <span>Insurance Policy</span></a></li>
                   
                     <li><a href="/admin/users/"><i class="fa fa-briefcase blue1_color"></i> <span>Users</span></a></li>
                   
                  </ul>
               </div>
            </nav>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="logo_section">
                           <a href="index.html"><?php echo $this->Html->image('logo/logo.png') ?></a>
                        </div>
                        <div class="right_topbar">
                           <div class="icon_info">
                              <ul>
                                 <li><a href="#"><i class="fa fa-bell-o"></i><span class="badge">2</span></a></li>
                                 <li><a href="#"><i class="fa fa-question-circle"></i></a></li>
                                 <li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li>
                              </ul>
                              <ul class="user_profile_dd">
                                 <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->Html->image('layout_img/user_img.jpg',['class'=>'img-responsive rounded-circle']) ?><span class="name_user">John David</span></a>
                                    <div class="dropdown-menu">
                                       <a class="dropdown-item" href="/admin/users/logout"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
               <!-- end topbar -->

<div class="insurancesCompany index content" style="margin-top: 120px;">

<div class="container-fluid">
<h1 style="padding-bottom:70px; text-align:center;font-weight:800;font-size:35px;">USERS LISTINGS</h1>
        <table class="table table-hover" >

            <thead>
            <tr id="#tablerow_user">
            <th><?= $this->Paginator->sort('id') ?></th>
                    <th>FIRST NAME</th>
                    <th>LAST NAME</th>
                    <th>EMAIL</th>
                    <th>PHONE.NO</th>
                    <th>ADDRESS</th>
                    <th>STATUS</th>
                    <th>CREATED AT</th>
                    <th class="actions">ACTIONS</th>
            </tr>
            </thead>
            <tbody>
            <?php $n = $this->Paginator->counter('{{start}}') ?>

            <?php foreach ($users as $user): ?>
                <?php if($user->deleted==1): ?>
            <tr id="data<?php echo $user->id;?>" class="tabledata_user">
            <td><?= h($n); ?></td>
                    <td><?= h($user->first_name) ?></td>
                    <td><?= h($user->last_name) ?></td>
                    <td><?= h($user->email) ?></td>
                    <td><?= h($user->contact_number) ?></td>
                    <td><?= h($user->address) ?></td>
                    <td class="align-middle text-sm">
                          <!-- <?= h($contactlist->status); ?> -->
                          <?php  if($user->status == 1) : ?>
                            
                            <?= $this->Form->postLink(__('Active'),['action' => 'userstatus', $user->id, $user->status],['class'=>'badge badge-sm bg-gradient-success','confirm' => __('Are you sure you want to Inactive ?', $user->id)]) ?>
                            <?php else : ?>
                                
                                <?= $this->Form->postLink(__('Inactive'), ['action' => 'userstatus', $user->id, $user->status], ['class'=>'badge badge-sm bg-gradient-secondary','confirm' => __('Are you sure you want to Active ?', $user->id)]) ?>
                                <?php endif; ?> 
                         </td>                         <td><?= h($user->created_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__(''), ['action' => 'view', $user->id],['class'=>'fa-solid fa-eye']) ?>
                        <i class="fa-solid fa-pen-to-square get-userinfo " data-bs-toggle="modal" data-bs-target="#myModal" style="color: orange; font-size: 18px;" edituser-id ="<?= $user->id ?>"></i>
                        <i class="fa-solid fa-trash-can delete-user-info" style="color: red; font-size: 18px; cursor: pointer;" status-id ="<?= $user->deleted?>" deleteuser-id ="<?= $user->id?>"></i> 
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
        
   
   <div class="column-responsive column-80">
     <div class="insurancesCompany view content">
       <h1 style="padding-bottom:70px; text-align:center;font-weight:800;font-size:35px;color:white">INSURANCE USER EDIT</h1>

       <?= $this->Form->create($user,['id'=>'formid']) ?>
       <input type="hidden" id="userlisting_id" name="id">
       
           <fieldset>
               <legend><?= __('Edit User') ?></legend>
               
               <?php echo $this->Form->control('first_name',['class'=>'policy','id'=>'first_name']); ?>
               <span id="uname"></span>
               <?php echo $this->Form->control('last_name',['class'=>'policy','id'=>'last_name']); ?>
               <span id="luname"></span>
               <?php echo $this->Form->control('email',['class'=>'policy','id'=>'email']); ?>
               <span id="uemail"></span>
               <?php echo $this->Form->control('contact_number',['class'=>'policy','id'=>'contact_number']); ?>
               <span id="uphone"></span>
               <?php echo $this->Form->control('address',['class'=>'policy', 'id'=> 'address']); ?>
               <span id="uaddress"></span>
               
           </fieldset>
           <?= $this->Form->button(__('Submit'),['class'=>'edit-user','id'=>'submit']) ?>
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
<?= $this->Html->script('script1') ?>


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
    $('#first_name').keyup(function(){
        username_check();
    });

    function username_check(){
        var user_val = $('#first_name').val();                

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
    $('#last_name').keyup(function(){
        lastname_check();
    });

    function lastname_check(){
        var user_val1 = $('#last_name').val();                

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
    $('#contact_number').keyup(function(){
        phone_check();
    });
                
    function phone_check(){
        var phone_val = $('#contact_number').val();           

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
            address_check();
            // password_check();
            // con_password();
            

            
            // if ($('input[name="gender"]:checked').length == 0) {
            //     $("#radio").html("* please select one");
            //     return false; }

            if((fname_err == true)&&(lname_err == true)&&(email_err == true)&&(phone_err == true)&&(pass_err == true)&&
            (conpass_err == true)&&(address_err == true)){
                return true;                
            }else{
                return false;
            }

            


        });

});







</script>