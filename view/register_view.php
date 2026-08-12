<?php
echo<<<HTML
    <div class="form-group">
        <i class="fa fa-lock fa-2x"></i>
        <label for="password_confirmation">{$this->getLabelConfirmPassword()}</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
        placeholder="{$this->getHintConfirmPassword()}"
        title="{$this->getHintConfirmPassword()}"
        oninput="handleInputPassConfirmPass(this, '{$this->getRequiredConfirmPassword()}', '{$this->getInvalidConfirmPassword()}', 'password')"
        oninvalid="handleInputPassConfirmPass(this, '{$this->getRequiredConfirmPassword()}', '{$this->getInvalidConfirmPassword()}', 'password')"
        minlength="8" 
        required>
    </div>
    <script>
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
                $('#'+id)[0].setCustomValidity('{$this->getPasswordDosNotMatch()}');
            }
            else if(event.value !== $('#'+id).val() && $('#'+id).val().length >=8)
                event.setCustomValidity('{$this->getPasswordDosNotMatch()}');
            else if($(event).attr('id') === 'password')
                event.setCustomValidity('');
        }
    </script>
HTML;
include('all_modal/setting_users_iput.php');
include 'pis_of_page/login_register.php';