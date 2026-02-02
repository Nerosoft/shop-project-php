<!-- Modal -->
<?php 
include('start_model.php');
if(isset($index))
    include('my_id.php');
?>


<div class="form-group">
    <label for="lang_name" class="form-label"><?php echo$view->getLabelNameLanguage()?></label>
    <input 
    minlength="3" 
    required
    oninvalid="handleInput(this ,'<?php echo $view->getNewLangNameRequired()?>', '<?php echo $view->getNewLangNameInvalid()?>')"
    oninput="handleInput(this ,'<?php echo $view->getNewLangNameRequired()?>', '<?php echo $view->getNewLangNameInvalid()?>')"
    type="text" name="lang_name" id="lang_name" value="<?php echo$myObject?->getName()??''?>" placeholder='<?php echo $view->getHintNewLangName()?>' class="form-control">
</div>

<?php 
include('end_model.php');
?>