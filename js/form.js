$(document).on('submit','#signUpForm',function(event){
    event.preventDefault();
    var formData = new FormData($(this)[0]);
    $('#signupSubmit').attr('disabled',true);
    $.ajax({
        url:'../forms/signup.php',
        method:'POST',
        data:formData,
        success:function(response)
        {
            if(response === 'Success')
            {
                alert('User Registered Successfully');
                $("#signUpForm").trigger('reset');
                $('#signupSubmit').attr('disabled',false);
                window.location.href = '../admin/login.php';
                
            }else
            {
                alert('Username already exists');
                $('#signupSubmit').attr('disabled',false);
            }
        },
        cache: false,
        contentType: false,
        processData: false
    });
});


$(document).on('submit','#loginForm',function(event){
    event.preventDefault();
    var formData = new FormData($(this)[0]);
    var username = $('#username').val();
    $('#loginSubmit').attr('disabled',true);
    $.ajax({
        url:'../forms/login.php',
        method:'POST',
        data:formData,
        success:function(response)
        {
            if(response === 'Show OTP')
            {
                $('#otpUsername').val(username);
                $('#loginForm').css('display','none');
                $('#confirmOtp').css('display','block');
            }else if(response === 'Credentials entered does not match')
            {
                alert(response);
                $('#loginSubmit').attr('disabled',false);
            }else if(response==='REDIRECT')
            {
                window.location.href = '../admin';
            }else
            {
                alert(response);
                $('#loginSubmit').attr('disabled',false);
            }
        },
        cache: false,
        contentType: false,
        processData: false
    });
});


$(document).on('submit','#confirmOtp',function(event){
    event.preventDefault();
    var formData = new FormData($(this)[0]);
    $('#otpSubmit').attr('disabled',true);
    $.ajax({
        url:'../forms/confirm_otp.php',
        method:'POST',
        data:formData,
        success:function(response)
        {
            if(response==='Success')
            {
                window.location.href = '../admin';
            }else
            {
                alert(response);
                $('#otpSubmit').attr('disabled',false);
            }
        },
        cache: false,
        contentType: false,
        processData: false
    });
});

$(document).on('submit','#forgotPassword',function(event){
    event.preventDefault();
    var username = $('#forgotusername').val();
    var formData = new FormData($(this)[0]); 
    $('#forgotPasswordSubmit').attr('disabled',true);
    $.ajax({
        url:'../forms/forgot_password.php',
        method:'POST',
        data:formData,
        success:function(response)
        {
            if(response==='Success')
            {
                alert('Please contact admin for security code');
                $('#changeusername').val(username);
                $('#forgotPassword').css('display','none');
                $('#changePassword').css('display','block');
                
            }else
            {
                alert(response);
                $('#forgotPasswordSubmit').attr('disabled',false);
            }
        },
        cache: false,
        contentType: false,
        processData: false
    });
});

$(document).on('submit','#changePassword',function(event){
    event.preventDefault();
    var formData = new FormData($(this)[0]);
    $('#changePasswordSubmit').attr('disabled',true);
    $.ajax({
        url:'../forms/change_password.php',
        method:'POST',
        data:formData,
        success:function(response)
        {
            if(response==='Success')
            {
                alert('Password changed successfully');
                window.location.href="../admin";
                
            }else
            {
                alert(response);
                $('#changePasswordSubmit').attr('disabled',false);
            }
        },
        cache: false,
        contentType: false,
        processData: false
    });
});


$(document).on('click','#resendOTPLink',function(){
    var username = $('#changeusername').val();
    $.ajax({
        url:'../forms/resend_forgot_password_otp.php',
        method:'POST',
        data:{username:username},
        success:function(response)
        {
            if(response==='Success')
            {
                alert('Code sent successfully, pleae contact admin');
            }
        }
    });
});

$(document).on('click','#resendLink',function(){
    var username = $('#otpUsername').val();
    $.ajax({
        url:'../forms/resend_login_otp.php',
        method:'POST',
        data:{username:username},
        success:function(response)
        {
            if(response==='Success')
            {
                alert('Code sent successfully, pleae contact admin');
            }
        }
    });
});