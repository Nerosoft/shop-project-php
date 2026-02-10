<div class="form-group">
    <label for="lang_name" class="form-label"><?php echo$view->getLabelName()?></label>
    <input 
    minlength="3" 
    required
    oninvalid="handleInput(this ,'<?php echo$view->getNameTableIsReq()?>', '<?php echo$view->getNameTableIsInv()?>')"
    oninput="handleInput(this ,'<?php echo$view->getNameTableIsReq()?>', '<?php echo$view->getNameTableIsInv()?>')"
    type="text" name="name" id="name" value="<?php echo$myObject?->getName()??''?>" placeholder='<?php echo$view->getHintName()?>' class="form-control">
</div>
