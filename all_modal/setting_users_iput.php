<div class="form-group">
    <i class="fa fa-lock fa-2x"></i>
    <label for="Key"><?php echo $view->getLabelKeyPassword()?></label>
    <input type="password" class="form-control" id="Key" name="Key"
    placeholder="<?php echo $view->getHintKeyPassword()?>"
    title="<?php echo $view->getHintKeyPassword()?>"
    value="<?php echo$myObject?->getKey()??''?>"
    minlength="8" 
    required
    oninput="handleInput(this, '<?php echo $view->getRequiredKeyPassword()?>', '<?php echo $view->getInvalidKeyPassword()?>')"
    oninvalid="handleInput(this, '<?php echo $view->getRequiredKeyPassword()?>', '<?php echo $view->getInvalidKeyPassword()?>')">
</div>