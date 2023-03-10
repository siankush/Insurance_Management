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

            if((fname_err == true)&&(lname_err == true)&&(email_err == true)&&(phone_err == true)&&(pass_err == true)&&
            (conpass_err == true)&&(address_err == true)){
                return true;                
            }else{
                return false;
            }

            


        });

});






