$(document).on('click','.button-container button',function(){
    var cause = $(this).attr('data-index');
    $('.flip-card-inner').css('transform','rotateY(180deg)');
    $('.flip-card-front').css('display','none');
    $('.flip-card-back').css('display','block');
    $('.flip-card-back h2').html(cause);
    if(cause === 'Support for Equipment')
    {
        $('#equipmentDonate').css('display','flex');
        $('#smileDonate').css('display','none');
        $('buildingDonate').css('display','none');
    }else if(cause ==='Spread Smile')
    {
        $('#equipmentDonate').css('display','none');
        $('#smileDonate').css('display','flex');
        $('buildingDonate').css('display','none');
    }else
    {
        $('#equipmentDonate').css('display','none');
        $('#smileDonate').css('display','none');
        $('#buildingDonate').css('display','flex');
    }
});


$(document).on('click','.equipment-list i',function(){
    $('.flip-card-inner').css('transform','rotateY(0deg)');
    $('.flip-card-back').css('display','none');
    $('.flip-card-front').css('display','flex');
    $('#equipmentDonate').css('display','none');
    $('#smileDonate').css('display','none');
    $('#buildingDonate').css('display','none');
    $('#donationForm')[0].reset();
    $('.eqipment-list-container input').attr('checked',false);
});

$(document).on('change','.eqipment-list-container input',function(){
    var total = 0;
    $('.eqipment-list-container input:checked').each(function(){
        total += isNaN(parseInt($(this).val())) ? 0 : parseInt($(this).val()); 
    });

    $('#amount').val(total);
});


// diagnosis page

$(document).on('click','.department-menu li a',function(){
    var heading = $(this).attr('data-heading');
    $('#serviceHeading').html(heading);
    $('html, body').animate({
        scrollTop: eval($("#serviceHeading").offset().top - 90)
    },1000)
});