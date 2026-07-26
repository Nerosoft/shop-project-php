<div class="form-group">
    <i class="fa fa-user fa-2x"></i>
    <label for="email"><?php echo $this->getLabelEmail()?></label>
    <input type="email" class="form-control" id="email" name="Email"
        value="<?php echo isset($myObject)?$myObject->getName():(!isset($action) && isset($_POST['Email'])?$_POST['Email']:'')?>" placeholder="<?php echo $this->getHintEmail()?>"
        title="<?php echo $this->getHintEmail()?>"
        required>
</div>
<script>
    $('input[type="email"]').on('input invalid', function() {
        if (this.validity.valueMissing)
            this.setCustomValidity('<?php echo$this->getRequiredEmail()?>');
        else if (this.validity.typeMismatch)
            this.setCustomValidity('<?php echo$this->getInvalidEmail()?>');
        else
            this.setCustomValidity('');
    });
</script>
<div class="form-group">
    <i class="fa fa-lock fa-2x"></i>
    <label for="password"><?php echo $this->getLabelPassword()?></label>
    <input type="password" class="form-control" id="password" name="Password"
        placeholder="<?php echo $this->getHintPassword()?>"
        title="<?php echo $this->getHintPassword()?>"
        value="<?php echo$myObject?->getPassword()??''?>"
        required
        minlength="8" 
        <?php 
            echo $this->getUrlName2() !== 'Register'?<<<HTML
            oninput="handleInput(this, '{$this->getRequiredPassword()}', '{$this->getInvalidPassword()}')"
            oninvalid="handleInput(this, '{$this->getRequiredPassword()}', '{$this->getInvalidPassword()}')"
            HTML:
            <<<HTML
            oninput="handleInputPassConfirmPass(this, '{$this->getRequiredPassword()}', '{$this->getInvalidPassword()}', 'password_confirmation')"
            oninvalid="handleInputPassConfirmPass(this, '{$this->getRequiredPassword()}', '{$this->getInvalidPassword()}', 'password_confirmation')"
            HTML;
        ?>
        >
</div>