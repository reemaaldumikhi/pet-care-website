$(document).ready(function () {

    $('#firstName').mouseleave(function(){
        check_fname();
    });
    $('#lastName').mouseleave(function(){
        check_lastName();
    });

    $('#email').mouseleave(function(){
        check_email();
    });

    $('#Psw').mouseleave(function(){
        check_password();
    });

    $('#Psw-repeat').mouseleave(function(){
        check_re_password();
    });

    $('#phoneNumber').mouseleave(function(){
        check_phone();
    });

    function check_fname(){
        var name = $('#firstName').val();
        if(name ==''){
            $('#firstName').css('border-color','red');
            $('#firstName_error').css('visibility','visible');
        }else {
            $('#firstName').css('border-color','#777');
            $('#firstName_error').css('visibility','hidden');
           
        }
    }

    function check_lastName(){
        var name = $('#lastName').val();
        if(name ==''){
            $('#lastName').css('border-color','red');
            $('#lastName_error').css('visibility','visible');
        }else {
            $('#lastName').css('border-color','#777');
            $('#lastName_error').css('visibility','hidden');
         
        }
    }

    function check_email(){
        var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var email = $('#email').val();
        if((!pattern.test(email)) || (email =='')){
            $('#email').css('border-color','red');
            $('#email_error').css('visibility','visible');
        }else {
            $('#email').css('border-color','#777');
            $('#email_error').css('visibility','hidden');
            
        }
    }

    
function check_phone(){
    var phone = $('#phoneNumber').val();
        if((phone.length!==10) || (phone='')){
            $('#phoneNumber').css('border-color','red');
            $('#phone_error').css('visibility','visible');
        }
        else {
            $('#phoneNumber').css('border-color','#777')
            $('#phone_error').css('visibility','hidden')
           
        }
    }


function check_password(){
    var pass= $('#Psw').val();
        if(pass.length<8 || (pass='')){
            $('#Psw').css('border-color','red');
            $('#password_error').text('you either enter an empty passowrd or your password is not 8 digits at least');
            $('#password_error').css('visibility','visible');
        }else {
            $('#Psw').css('border-color','#777');
            $('#password_error').css('visibility','hidden');
            
        }
    }


function check_re_password(){
    var pass= $('#Psw').val();
    var repass= $('#Psw-repeat').val();
        if((repass!==pass) || (repass='')){
            $('#Psw-repeat').css('border-color','red');
            $('#re_password_error').css('visibility','visible');
        }else {
            $('#Psw-repeat').css('border-color','#777');
            $('#re_password_error').css('visibility','hidden');
        }
}

});
