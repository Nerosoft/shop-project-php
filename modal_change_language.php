<!-- Modal -->
<?php 
include('start_model.php');?>


<div class="form-group">
    <label for="lang_name" class="form-label"><?php echo$view->getLabelNameLanguage()?></label>
    <input 
    title='<?php echo $view->getHintNewLangName()?>'
    minlength="3" 
    required
    oninvalid="handleInput(this ,'<?php echo $view->getNewLangNameRequired()?>', '<?php echo $view->getNewLangNameInvalid()?>')"
    oninput="handleInput(this ,'<?php echo $view->getNewLangNameRequired()?>', '<?php echo $view->getNewLangNameInvalid()?>')"
    type="text" name="lang_name" id="lang_name" value="<?php echo$myObject?->getName()??''?>" placeholder='<?php echo $view->getHintNewLangName()?>' class="form-control">
</div>

<?php include 'AllBranchOption.php';?>