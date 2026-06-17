<!-- Modal -->
<i onclick="restValue('#<?php echo $idModel?>', '<?php echo $myValue?>')" class="fa fa-sliders fa-2x pointer"></i>
<?php include('start_model.php');?>
<div class="input-group input-group">
    <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-lg"><?php echo $view->getText()?></span>
    </div>
    <input
    title="<?php echo $view->getWordHint()?>"
    placeholder="<?php echo $view->getWordHint()?>"
    minlength="3" 
    required
    oninvalid="handleInput(this ,'<?php echo $view->getTextRequired()?>', '<?php echo $view->getTextLenght()?>')"
    oninput="handleInput(this ,'<?php echo $view->getTextRequired()?>', '<?php echo $view->getTextLenght()?>')"
    type="text" name="word" id="word" value="<?php echo $myValue?>" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
</div>
<?php 
include('end_model.php');
echo '</td></tr>';
$count++;