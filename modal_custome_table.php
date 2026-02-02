<!-- Modal -->
<?php 
include('start_model.php');
if(isset($index))
    include('my_id.php');
?>
<div class="form-group">
    <label for="lang_name" class="form-label"><?php echo$view->getLabelName()?></label>
    <input 
    minlength="3" 
    required
    oninvalid="handleInput(this ,'<?php echo$view->getNameTableIsReq()?>', '<?php echo$view->getNameTableIsInv()?>')"
    oninput="handleInput(this ,'<?php echo$view->getNameTableIsReq()?>', '<?php echo$view->getNameTableIsInv()?>')"
    type="text" name="name" id="name" value="<?php echo$myObject?->getName()??''?>" placeholder='<?php echo$view->getHintName()?>' class="form-control">
</div>
<?php 
if(!isset($index))
    echo <<<HTML
        <div class="form-group">
            <label for="lang_name" class="form-label">{$view->getLabelInputNumber()}</label>
            <input 
            min="1" 
            max="8" 
            required
            type="number" name="input_number" id="input_number"  placeholder='{$view->getHintInputNumber()}' class="form-control">
        </div>
    HTML;
include('end_model.php');
?>