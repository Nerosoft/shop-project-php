<?php
// require 'all_trait/ErrorRegister.php';
class MyRegister extends LoginRegister{    
    use ErrorRegister;
    private $LabelConfirmPassword;
    private $HintConfirmPassword;
    function __construct(){
        parent::__construct('Register', 'RegisterPost.php');
        $this->initErrorsRegister();
        $this->LabelConfirmPassword = $this->getModelPage()['LabelConfirmPassword'];
        $this->HintConfirmPassword = $this->getModelPage()['HintConfirmPassword'];
    }
    function getLabelConfirmPassword(){
        return $this->LabelConfirmPassword;
    }
    function getHintConfirmPassword(){
        return $this->HintConfirmPassword;
    }
}
$view = new MyRegister();
echo<<<HTML
    <div class="form-group">
        <i class="fa fa-lock fa-2x"></i>
        <label for="password_confirmation">{$view->getLabelConfirmPassword()}</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
        placeholder="{$view->getHintConfirmPassword()}"
        title="{$view->getHintConfirmPassword()}"
        oninput="handleInputPassConfirmPass(this, '{$view->getRequiredConfirmPassword()}', '{$view->getInvalidConfirmPassword()}', 'password')"
        oninvalid="handleInputPassConfirmPass(this, '{$view->getRequiredConfirmPassword()}', '{$view->getInvalidConfirmPassword()}', 'password')"
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
                $('#'+id)[0].setCustomValidity('{$view->getPasswordDosNotMatch()}');
            }
            else if(event.value !== $('#'+id).val() && $('#'+id).val().length >=8)
                event.setCustomValidity('{$view->getPasswordDosNotMatch()}');
            else if($(event).attr('id') === 'password')
                event.setCustomValidity('');
        }
    </script>
HTML;
include('all_modal/setting_users_iput.php');
include 'pis_of_page/buttons.php';