<div class="form-group">
    <i class="fa fa-user fa-2x"></i>
    <label for="email"><?php echo $view->getLabelEmail()?></label>
    <input type="email" class="form-control" id="email" name="Email"
        value="<?php echo isset($myObject)?$myObject->getName():(!isset($action) && isset($_POST['Email'])?$_POST['Email']:'')?>" placeholder="<?php echo $view->getHintEmail()?>"
        title="<?php echo $view->getHintEmail()?>"
        required>
</div>
<script>
    $('input[type="email"]').on('input invalid', function() {
        if (this.validity.valueMissing)
            this.setCustomValidity('<?php echo$view->getRequiredEmail()?>');
        else if (this.validity.typeMismatch)
            this.setCustomValidity('<?php echo$view->getInvalidEmail()?>');
        else
            this.setCustomValidity('');
    });
</script>
<div class="form-group">
    <i class="fa fa-lock fa-2x"></i>
    <label for="password"><?php echo $view->getLabelPassword()?></label>
    <input type="password" class="form-control" id="password" name="Password"
        placeholder="<?php echo $view->getHintPassword()?>"
        title="<?php echo $view->getHintPassword()?>"
        value="<?php echo$myObject?->getPassword()??''?>"
        required
        minlength="8" 
        <?php 
            echo $view->getUrlName2() !== 'Register'?<<<HTML
            oninput="handleInput(this, '{$view->getRequiredPassword()}', '{$view->getInvalidPassword()}')"
            oninvalid="handleInput(this, '{$view->getRequiredPassword()}', '{$view->getInvalidPassword()}')"
            HTML:
            <<<HTML
            oninput="handleInputPassConfirmPass(this, '{$view->getRequiredPassword()}', '{$view->getInvalidPassword()}', 'password_confirmation')"
            oninvalid="handleInputPassConfirmPass(this, '{$view->getRequiredPassword()}', '{$view->getInvalidPassword()}', 'password_confirmation')"
            HTML;
        ?>
        >
</div>