<?php
if($view->getUrlName2() === 'Login' || $view->getUrlName2() === 'Register' || $view->getUrlName2() === 'Site')
    echo '<input type="hidden" value="'.$view->getId().'"name="superId">';
else if(count($view->getBranch2()) >= 1 && $view->getUrlName2() === 'SystemLang' && !isset($state)){
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
else if(count($view->getBranch2()) >= 1 && isset($view->getModel2()['MyFlexTables'][$view->getUrlName2()]) && !isset($state) || isset($index) && $index !== null && count($view->getBranch2()) >= 1 && $view->getUrlName2() !== 'Branches' && !isset($state) || isset($index) && $index !== null && count($view->getBranch2()) >= 1 && isset($state) && $state === 'AllNamesLanguage'){
    if(isset($index) && $index !== null && !isset($state))
      include('my_id.php');
    $myCountBranch = 0;
    foreach($view->getBranch2() as $key=>$option){
        if( 
            isset($state) && $state === 'AllNamesLanguage' && isset($view->getFile()[$key][$index])||
            $view->getUrlName2() === 'MyStyle' ||
            $view->getUrlName2() === 'Home' && isset($view->getFile()[$key][$view->getFile()[$key]['Setting']['AllNamesLanguage']][$index])||
            $view->getUrlName2() === 'ChangeLanguage' && isset($view->getFile()[$key][$index])||
            $view->getUrlName2() === 'Users' && isset($view->getFile()[$key]['Users'][$index])||
            $view->getUrlName2() === 'Product' && isset($view->getFile()[$key]['Product'][$index])||
            $index !== null && isset($view->getFile()[$key][$view->getFile()[$key]['Setting']['AllNamesLanguage']]['MyFlexTables'][$view->getUrlName2()]) && isset($view->getFile()[$key][$view->getUrlName2()][$index])||
            $index === null && isset($view->getFile()[$key][$view->getFile()[$key]['Setting']['AllNamesLanguage']]['MyFlexTables'][$view->getUrlName2()])){
            ++$myCountBranch;
            echo <<<HTML
                <div class="col-md-auto">
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" id="choices[]" class="form-check-input branch-check" name="choices[$key]" value="{$key}">
                            <label class="form-check-label" for="choices[]">
                            {$option['Name']}
                            </label>
                        </div>
                    </div>
                </div>
            HTML;
        }
    }
    if($myCountBranch === count($view->getBranch2()))
        include 'AllBranchLanguageInput.php';
}
else if(isset($index) && $index !== null && !isset($state))
    include('my_id.php');
//make create inside all branch or select and custom branch
else if($action !== 'BranchChangePost.php' && count($view->getBranch2()) >= 1 && $view->getUrlName2() !== 'Branches' && !isset($state) || $action !== 'BranchChangePost.php' && count($view->getBranch2()) >= 1 && isset($state) && $state === 'Style')
    include 'AllBranchOptionChose.php';


if($action === 'ChangeLanguagePost.php' || 
  $action === 'ChangeLangPost.php'||
  $action === 'SetupProject.php'||
  $action === 'BranchChangePost.php'||
  $action === 'ChangeLanguageEditPost')
    echo '<input type="hidden" value="'.$view->getUrlName2().'" name="option">';
?>
</div>
<div class="modal-footer">
  <?php
  include 'pis_of_page/button_valid.php';
  ?>
</div>
</form>
</div>
</div>
</div>