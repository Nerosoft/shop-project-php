<!-- Modal -->
<?php 
include('start_model.php');?>
<div class="form-group">
    <i class="fa fa-table fa-2x"></i>
    <label for="lang_name" class="form-label"><?php echo$this->getLabelName()?></label>
    <input 
    title="<?php echo$this->getHintName()?>"
    minlength="3" 
    required
    oninvalid="handleInput(this ,'<?php echo$this->getNameTableIsReq()?>', '<?php echo$this->getNameTableIsInv()?>')"
    oninput="handleInput(this ,'<?php echo$this->getNameTableIsReq()?>', '<?php echo$this->getNameTableIsInv()?>')"
    type="text" name="name" id="name" value="<?php echo$myObject?->getName()??''?>" placeholder='<?php echo$this->getHintName()?>' class="form-control">
</div>