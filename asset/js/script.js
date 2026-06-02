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