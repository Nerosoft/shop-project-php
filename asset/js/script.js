function validForm(form){
    $(form).addClass('was-validated');
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
    $(id).modal('show');
}
function closeForm(id){
    $(id).modal('hide');
}
function removeClass(idModal){
    $(idModal).find('form').removeClass('was-validated');
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


function handleInputPassConfirmPass(event, req, inv, id){
    if (event.validity.valueMissing)
        event.setCustomValidity(req);
    else if (event.validity.tooShort)
        event.setCustomValidity(inv);
    else if(event.value === $('#'+id).val()){
        event.setCustomValidity('');
        $('#'+id)[0].setCustomValidity('');
    }
    else if($(event).attr('id') === 'password' && event.value !== $('#'+id).val() && $('#'+id).val().length >=8){
        event.setCustomValidity('');
        $('#'+id)[0].setCustomValidity('<?php echo $view->getPasswordDosNotMatch()?>');
    }
    else if(event.value !== $('#'+id).val() && $('#'+id).val().length >=8)
        event.setCustomValidity('<?php echo $view->getPasswordDosNotMatch()?>');
    else if($(event).attr('id') === 'password')
        event.setCustomValidity('');
}