<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<!-- <div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create() ?>
            <fieldset>
                <legend><?= __('Add User') ?></legend>
                <?php
                    echo $this->Form->control('email');
                    echo $this->Form->control('password');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div> -->


<style>
.logindesign{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
.full_container {
    width: 100%;
    max-width: 100%;
    padding: 0;
    margin: 0;
    background: #000038 !important;
    position: absolute !important;
    z-index: -1 !important;
    /* margin-top: -140px !important; */

}
.main_bt {
    min-width: 125px;
    height: auto;
    float: left;
    background: #000000 !important;
    text-align: center;
    color: #fff;
    padding: 10px 25px;
    font-size: 16px;
    border-radius: 5px;
    border: none;
    transition: ease all 0.5s;
    cursor: pointer;
    font-weight: 300;
}
.message.error {
    background: #fcebea;
    color: #cc1f1a;
    border-color: #ef5753;
    text-align: center !important;
    margin-top: 60px !important;
    width: 400px;
    margin: 0 auto;
}
</style>

<div class="full_container">
         <div class="container">
            <div class="center verticle_center full_height">
               <div class="login_section">
                  <div class="logo_login">
                     <div class="center">
                        <?php echo $this->Html->image('logo/logo.png',['width'=>'210']) ?>
                     </div>
                  </div>
                  <div class="login_form">
                  <?= $this->Form->create() ?>
                        <fieldset>
                              <?php echo $this->Form->control('email',['class'=>'logindesign']);?>
                              <span id="uemail"></span>

                              <?php echo $this->Form->control('password',['class'=>'logindesign']);?>
                              <span id="upass"></span>
                       
                           <div class="field margin_0">
                              <label class="label_field hidden">hidden label</label>
                              <button class="main_bt" id="submit">Sing In</button>
                           </div>
                        </fieldset>
                        <?= $this->Form->end() ?>
                  </div>
               </div>
            </div>
         </div>
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

        

        


        $('#submit').click(function(){
            
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