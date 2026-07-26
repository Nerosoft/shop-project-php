<div class="form-group">
    <i class="fa fa-lock fa-2x"></i>
    <label for="Key"><?php echo $this->getLabelKeyPassword()?></label>
    <input type="password" class="form-control" id="Key" name="Key"
    placeholder="<?php echo $this->getHintKeyPassword()?>"
    title="<?php echo $this->getHintKeyPassword()?>"
    value="<?php echo$myObject?->getKey()??''?>"
    minlength="8" 
    required
    oninput="handleInput(this, '<?php echo $this->getRequiredKeyPassword()?>', '<?php echo $this->getInvalidKeyPassword()?>')"
    oninvalid="handleInput(this, '<?php echo $this->getRequiredKeyPassword()?>', '<?php echo $this->getInvalidKeyPassword()?>')">
</div>

