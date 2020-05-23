$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('.errorName').hide();
$('.errorEmail').hide();
$('.errorCMND').hide();
$('.errorPhone').hide();
$('.errorAddres').hide();
$('.áds').click(function(){
    $.ajax({
        url : 'customer',
        type : 'post',
        data : {
            name : $('.name').val(),
            email : $('.email').val(),
            CMND : $('.CMND').val(),
            phone : $('.phone').val(),
            address : $('.address').val(),
        },
        dataType : 'json',
        success : function(data){
            toastr.success(data, 'Thông báo', {timeOut: 5000});
            location.reload();
        },
        error : function(data){
            var error = $.parseJSON(data.responseText);
            if( typeof error.errors.name != 'undefined' && error.errors.name.length > 0 ){
                $('.errorName').show();
                $('.errorName').html(error.errors.email);
            }
            if( typeof error.errors.email != 'undefined' && error.errors.email.length > 0 ){
                $('.errorEmail').show();
                $('.errorEmail').html(error.errors.email);
            }
            if( typeof error.errors.CMND != 'undefined' && error.errors.CMND.length > 0 ){
                $('.errorCMND').show();
                $('.errorCMND').html(error.errors.email);
            }
            if( typeof error.errors.phone != 'undefined' && error.errors.phone.length > 0 ){
                $('.errorPhone').show();
                $('.errorPhone').html(error.errors.phone);
            }
            if( typeof error.errors.address != 'undefined' && error.errors.address.length > 0 ){
                $('.errorAddress').show();
                $('.errorAddress').html(error.errors.address);
            }
        }
    });
});
$('.booking').click(function(){
    var name = '';
    var email = '';
    var CMND = '';
    var phone = '';
    var checkin_date = $('.checkin_date').val();
    var checkout_date = $('.checkout_date').val();
    var additional_information =  $('.additional_information').val();
    $.ajax({
        url : 'booking',
        data : {
            name  : name,
            email : email,
            CMND : CMND,
            phone : phone,
            checkin_date : checkin_date,
            checkout_date : checkout_date,
            additional_information : additional_information,
        },
        dataType : 'json',
        type : 'post',
        success : function(data){
            toastr.success(data, 'Thông báo', {timeOut: 5000});
            location.href = '/';
        }
    });
});

