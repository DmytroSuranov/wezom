$(document).ready(function(){
    $('li.auth_li .menu-open').click(function(e){
        e.preventDefault();
        $(this).parent().find('ul.dropdown-menu').toggle();
    });
    $('#sendMessage').click(function(e) {
        e.preventDefault();
        $('.contact_errors').hide();
        $('.contact_errors').html('');
        var errors = [];
        var fio_reg = /[A-Za-zА-Яа-я]+\s+['A-Za-zА-Яа-я]+\s+['A-Za-zА-Яа-я]+/g;
        var phone_reg = /\+[3][8]\([0-9]{3}\)[0-9]{3}-[0-9]{2}-[0-9]{2}/gm;
        var email_reg = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
        if(!fio_reg.test($('#fio').val())){
            errors.push('Проверьте правильность ввода поля "ФИО"');
        }
        if(!phone_reg.test($('#phone').val())){
            errors.push('Проверьте формат номера телефона. Нужный формат : +38(xxx)-xxx-xx-xx');
        }
        if(!email_reg.test($('#email').val())){
            errors.push('Проверьте правильность ввода поля "Email"');
        }
        if($('#msg').val().length <= 10){
            errors.push('Длина поля "Сообщения" должна быть больше чем 10 символов');
        }
        if($('#g-recaptcha-response').val() == ''){
            errors.push('Проблема с Captcha');
        }
        if(errors.length > 0){
            for(var i = 0; i < errors.length; i++) {
                $('.contact_errors').append('<p>'+ errors[i] +'</p>');
            }
            $('.contact_errors').show();
        }else{
            $('#message_form').submit();
        }
    });
});