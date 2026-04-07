<!-- Modal -->
<?php 
include('start_model.php');
//ignore create language(onlu edit lang and style)
if($action !== 'ChangeLanguageCreatePost.php')
    echo '<input type="hidden" value="'.$view->getUrlName2().'" name="option">';
else{
    echo <<<HTML
        <div class="form-group">
            <label for="selectedLanguage">{$view->getSelectLang()}</label>
            <select
            title=""
            class="form-select" name="selectedLanguage"  aria-label="Default select example">
    HTML;
               foreach($view->getMyDataView() as $key=>$name){
                    $select = $key === $view->getLanguage()? 'selected' : '';
                    echo <<<HTML
                    <option {$select} value="{$key}">
                        {$name->getName()}
                    </option>
                    HTML;
                }
    echo <<<HTML
            </select>
        </div>
    HTML;
}
?>


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

<?php 
if($view->getUrlName2() === 'MyStyle' && count($view->getBranch()) > 1){
    echo '<input type="hidden" value="'.$view->getUrlName2().'" name="option">';
    include('my_id.php');
    $myBranch = $view->getBranch2();
    include 'AllBranchOptionChose.php';
}else
    include 'AllBranchOption.php';

include('end_model.php');?>