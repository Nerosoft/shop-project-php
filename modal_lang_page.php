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
if(count($view->getModel2()['AllNamesLanguage'])>1){
    include 'AllBranchLanguageInput.php';
    foreach($view->getModel2()['AllNamesLanguage'] as $key=>$option)
        if(isset($_GET['lang']) && $_GET['lang'] !== $key)
            echo <<<HTML
                <div class="col-md-auto">
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" id="choices[]" class="form-check-input" name="choices[$key]" value="{$key}">
                            <label class="form-check-label" for="choices[]">
                            {$option}
                            </label>
                        </div>
                    </div>
                </div>
            HTML;
}
include('end_model.php');?>