<?php
if($view->getUrlName2() === 'Login' || $view->getUrlName2() === 'Register' || $view->getUrlName2() === 'Site')
    echo '<input type="hidden" value="'.$view->getId().'"name="superId">';
else if(isset($index) && count($view->getBranch2()) >= 1 && $view->getUrlName2() !== 'Branches' && $view->getUrlName2() !== 'SystemLang'||
 count($view->getBranch2()) >= 1 && isset($view->getModel2()['MyFlexTables'][$view->getUrlName2()]) && $view->getUrlName2() !== 'Branches' && $view->getUrlName2() !== 'SystemLang'){
    if(isset($index))
        include('my_id.php');
    $myCountBranch = 0;
    foreach($view->getBranch2() as $key=>$option){
        if( $view->getUrlName2() === 'MyStyle' ||
            $view->getUrlName2() === 'Home' && isset($view->getFile()[$key][$view->getFile()[$key]['Setting']['Language']][$index])||
            $view->getUrlName2() === 'ChangeLanguage' && isset($view->getFile()[$key][$index])||
            $view->getUrlName2() === 'Users' && isset($view->getFile()[$key]['Users'][$index])||
            $view->getUrlName2() === 'Product' && isset($view->getFile()[$key]['Product'][$index])||
            isset($index) && isset($view->getFile()[$key][$view->getFile()[$key]['Setting']['Language']]['MyFlexTables'][$view->getUrlName2()]) && isset($view->getFile()[$key][$view->getUrlName2()][$index])||
            !isset($index) && isset($view->getFile()[$key][$view->getFile()[$key]['Setting']['Language']]['MyFlexTables'][$view->getUrlName2()])){
            ++$myCountBranch;
            echo <<<HTML
                <div class="col-md-auto">
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" id="choices[]" class="form-check-input" name="choices[$key]" value="{$key}">
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
else if(isset($index) && $view->getUrlName2() !== 'SystemLang')
    include('my_id.php');
//make create inside all branch or select and custom branch
else if(count($view->getBranch2()) >= 1 && $view->getUrlName2() !== 'Branches' && $view->getUrlName2() !== 'SystemLang')
    include 'AllBranchOptionChose.php';

