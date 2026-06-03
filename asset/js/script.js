function validForm2(idModal){
    $(idModal).find('form').addClass('was-validated');
}
function handleInput(event, error1, error2) {
    if (event.validity.valueMissing)
        event.setCustomValidity(error1);
    else if (event.validity.tooShort)
        event.setCustomValidity(error2);
    else
        event.setCustomValidity('');
}


function openForm(id){
    //make rest all branch checkbox
    if($(id).find('form').hasClass('was-validated'))
        $(id).find('form').removeClass('was-validated');
    $(id).modal('show');
}
function closeForm(id){
    $(id).modal('hide');
}
function handleInputPhone(event, error1, error2) {
    if (event.validity.valueMissing)
        event.setCustomValidity(error1);
    else if (event.validity.patternMismatch)
        event.setCustomValidity(error2);
    else
        event.setCustomValidity('');
}
function handleInputSelect(event, error1) {
    if (event.validity.valueMissing)
        event.setCustomValidity(error1);
    else
        event.setCustomValidity('');
}

function changeInputState(codePassword, password){
    codePassword.attr('type', codePassword.attr('type')==='text'?'password':'text');
    password.attr('type', password.attr('type')==='text'?'password':'text');
}
$(document).ready(function(){
$('.edit_create').on('click', function(){
    if($(this).data('value')){
        let obj = $(this).data('value');
        for (const key in obj) {
            let element = $($(this).data('id')).find('form').find('#'+key);
            if(element.is('select')){
                element.find('option').each(function(idx, el){                   
                    if($(this).html() === obj[key])
                        $(this).prop('selected', true);
                });
            }
            else
                element.val(obj[key]);
        }
        if($($(this).data('id')).find('form').find('product-img-view'))
            $($(this).data('id')).find('form').find('img').attr('src', $(this).data('src'));
    }
    openForm($(this).data('id')?$(this).data('id'):'#createModel');
})});