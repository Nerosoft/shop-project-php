<!-- Modal -->
<?php include('start_model.php');?>
<div class="input-group input-group">
    <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-lg"><?php echo $this->getText()?></span>
    </div>
    <input
    title="<?php echo $this->getWordHint()?>"
    placeholder="<?php echo $this->getWordHint()?>"
    minlength="3" 
    required
    oninvalid="handleInput(this ,'<?php echo $this->getTextRequired()?>', '<?php echo $this->getTextLenght()?>')"
    oninput="handleInput(this ,'<?php echo $this->getTextRequired()?>', '<?php echo $this->getTextLenght()?>')"
    type="text" name="word" id="word" value="<?php echo $myValue?>" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
</div>
<?php 
include('end_model.php');
include 'pis_of_page/button_edit.php';