<div class="container">
    <div class="register">
        <form id='register' method='POST' action="RegisterPost.php">
            <?php include 'login_form.php'?>
            <div class="form-group">
                <label for="password_confirmation"><?php echo $view->getLabelConfirmPassword()?></label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                placeholder="<?php echo $view->getHintConfirmPassword()?>"
                title="<?php echo $view->getHintConfirmPassword()?>"
                oninput="handleInputPassConfirmPass(this, '<?php echo $view->getRequiredConfirmPassword()?>', '<?php echo $view->getInvalidConfirmPassword()?>', 'password')"
                oninvalid="handleInputPassConfirmPass(this, '<?php echo $view->getRequiredConfirmPassword()?>', '<?php echo $view->getInvalidConfirmPassword()?>', 'password')"
                minlength="8" 
                required>
            </div>
            <?php include('input_key_password.php');?>
        </form>
        <?php include 'buttons.php'?>
    </div>

</div>
<script type="text/javascript">
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
</script>
</body>
</html>