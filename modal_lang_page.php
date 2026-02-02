<!-- Modal -->
<img class="style_icon_menu pointer" onclick="displayForm('#<?php echo $idModel?>', $('#<?php echo $idForm?>').find('#word'), '<?php echo $myValue?>')" src="./asset/lib/icons/wrench-adjustable.svg"/>
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
if($view->getUrlName2()==="MyStyle")
    include('my_id.php');
include('end_model.php');?>