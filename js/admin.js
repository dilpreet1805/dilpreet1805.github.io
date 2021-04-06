$(document).on('click','#signUpLink',function(){
    $('#signUpForm').css('display','block');
    $('#loginForm').css('display','none');
});

$(document).on('click','#loginLink',function(){
    $('#signUpForm').css('display','none');
    $('#loginForm').css('display','block');
});

$(document).on('click','#forgotPasswordLink',function(){
    $('#forgotPassword').css('display','block');
    $('#loginForm').css('display','none');
});

$(document).on('click','#cancelLink',function(){
    $('#forgotPassword').css('display','none');
    $("#forgotPassword").trigger('reset');
    $('#loginForm').css('display','block');
});