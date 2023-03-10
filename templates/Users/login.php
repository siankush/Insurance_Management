<style>
.auth .auth-form-light {
    background: #000038;
    color: white !important;
}
input#email,input#password {
    color: white;
}
h4 {
    font-size: 18px;
    color: white;
    line-height: 21px;
    font-weight: 600;
    text-transform: none;
    margin-bottom: 15px;
}
a.text-primary {
    color: #6eff05 !important;
}
h6.font-weight-light {
    color: white;
}
</style>
<div class="container-scroller">
<?php echo $this->Flash->render(); ?>

    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="<?= $baseurl ?>img/logo-svg.png" alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>              
              <?php echo $this->Form->create()?>              
                <div class="form-group">
                <?php echo $this->Form->control("email",['label'=>false,'id'=>'email', 'class'=>'form-control form-control-lg','placeholder'=>'Email']); ?>
                  <span id="uemail"></span>
                </div>
                <div class="form-group">
                <?php echo $this->Form->control("password",['label'=>false,'id'=>'password', 'class'=>'form-control form-control-lg','placeholder'=>'Password']); ?>
                  <span id="upass"></span>
                </div>
                <div class="mt-3">                  
                  <?php echo $this->Form->button(__('Sign In'),['class'=>'btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn',
                  'id'=>'login'])?>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register" class="text-primary">Create</a>
                </div>
                <?= $this->Form->end() ?> 
              
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>




  <script>
  
  $(document).ready(function(){
    


    
    var email_err = true;
          
    var pass_err = true;
    
    

    // $('#uname').hide();
    // $('#firstName').keyup(function(){
    //     username_check();
    // });

    // function username_check(){
    //     var user_val = $('#firstName').val();                

    //     if(user_val.length == ''){
    //         $('#uname').show();
    //         $('#uname').html("Please fill first name");
    //         $('#uname').focus();
    //         $('#uname').css("color","red");
    //         fname_err = false;
    //         return false;

    //     }else{
    //         $('#uname').hide();
    //     }

    //     if((user_val.length < 3) || (user_val.length > 20)){
    //         $('#uname').show();
    //         $('#uname').html("please enter user name between 3 and 20");
    //         $('#uname').focus();
    //         $('#uname').css("color","red");
    //         fname_err = false;
    //         return false;

    //     }else{
    //         $('#uname').hide();
    //     }


    //     if(!isNaN(user_val)){
    //         $('#uname').show();
    //         $('#uname').html("please enter valid name");
    //         $('#uname').focus();
    //         $('#uname').css("color","red");
    //         fname_err = false;
    //         return false;

    //     }else{
    //         $('#uname').hide();
    //     }
        
    // }

                //----------------------last name validation--------------

    

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

    
        //----------------------address validation--------------

        

        


        $('#login').click(function(){
            
            email_err = true;
            

            pass_err = true;
            

            
            user_mail_check();            
            
            password_check();
            
            
            

            
        

            if((email_err == true)&&(pass_err == true)){
                return true;                
            }else{
                return false;
            }

            


        });

});








  </script>
