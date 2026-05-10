<?php
    if($view->getUrlName2() === 'Register' && !isset($action))
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
        HTML;
?>
 <div class="form-group">
    <i class="fa fa-lock fa-2x"></i>
    <label for="codePassword"><?php echo $view->getLabelKeyPassword()?></label>
    <input type="password" class="form-control" id="codePassword" name="Key"
    placeholder="<?php echo $view->getHintKeyPassword()?>"
    title="<?php echo $view->getHintKeyPassword()?>"
    value="<?php echo$myObject?->getKey()??''?>"
    minlength="8" 
    required
    oninput="handleInput(this, '<?php echo $view->getRequiredKeyPassword()?>', '<?php echo $view->getInvalidKeyPassword()?>')"
    oninvalid="handleInput(this, '<?php echo $view->getRequiredKeyPassword()?>', '<?php echo $view->getInvalidKeyPassword()?>')">
</div>