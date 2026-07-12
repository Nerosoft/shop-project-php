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
function openForm2(id){
    openForm(id);
    $(id).find('.branch-check, .show-pass').each(function(){
        if($(this).hasClass('show-pass') && $(this).prop('checked'))
            changeInputState(id, 'password');
        $(this).prop('checked', false);
    });
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

function changeInputState(id, type){
    $(id).find('#key').attr('type', type);
    $(id).find('#password').attr('type', type);
}
function restValue(myId, obj){
    openForm2(myId);
    if(typeof obj === 'string')
        $(myId).find('#word').val(obj);
    else
        for (const key in obj) {
            let element = $(myId).find('form').find('#'+key);
            if(element.is('select')){
                element.find('option').each(function(){                   
                    if($(this).html() === obj[key])
                        $(this).prop('selected', true);
                });
            }
            else
                element.val(obj[key]);
        }
}
function resetBranch(el){
    $('#createModel').find('#myOption').empty();
    let array = $(el).find('option:selected').data('value');
    for (const key in array) {
         $('#createModel').find('#myOption').append(`<div class="col-lg-auto pt-2">
                <div class="form-check">
                    <input name="${key}"  class="form-check-input" value="${key}" type="checkbox">
                    <label  class="form-check-label">
                        ${array[key]}
                    </label>
                </div>
            </div>`);
    }
      
    
}


function optionBranch(key = 'all_branch'){
    $('.'+key).prop('checked', false);
}