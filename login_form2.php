<div class="form-group">
    <label for="email"><?php echo $view->getLabelEmail()?></label>
    <input type="email" class="form-control" id="email" name="Email"
        value="<?php echo $_POST['Email']??''?>" placeholder="<?php echo $view->getHintEmail()?>"
        title="<?php echo $view->getHintEmail()?>"
        required>
</div>
<div class="form-group">
    <label for="password"><?php echo $pass?></label>
    <input type="password" class="form-control" id="password" name="Password"
        placeholder="<?php echo $view->getHintPassword()?>"
        title="<?php echo $view->getHintPassword()?>"
        required
        minlength="8" 
        <?php 
            echo $view->getUrlName2() === 'Login'?<<<HTML
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
