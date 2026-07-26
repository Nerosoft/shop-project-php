<!-- Modal -->
<?php 
include('start_model.php');?>
<div class="form-group">
    <i class="fa fa-font fa-2x"></i>
    <label for="lang_name" class="form-label"><?php echo$this->getLabelNameLanguage()?></label>
    <input 
    title='<?php echo $this->getHintNewLangName()?>'
    minlength="3" 
    required
    oninvalid="handleInput(this ,'<?php echo $this->getNewLangNameRequired()?>', '<?php echo $this->getNewLangNameInvalid()?>')"
    oninput="handleInput(this ,'<?php echo $this->getNewLangNameRequired()?>', '<?php echo $this->getNewLangNameInvalid()?>')"
    type="text" name="lang_name" id="name" value="<?php echo$myObject?->getName()??''?>" placeholder='<?php echo $this->getHintNewLangName()?>' class="form-control">
</div>




