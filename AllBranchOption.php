<?php
//make test key inside all blanch
if(isset($index) && count($view->getFileByFixedId()['Branches']) > 1 || isset($view->getModel2()['MyFlexTables'][$view->getUrlName2()])){
    if(isset($index))
        include('my_id.php');
    $myCountBranch = 0;
    $myBranch = $view->getBranch();
    unset($myBranch[$view->getId()]);
    foreach($myBranch as $key=>$option){
        if( $view->getUrlName2() === 'Home' && isset($view->getFile()[$key][$view->getFile()[$key]['Setting']['Language']][$index])||
            $view->getUrlName2() === 'ChangeLanguage' && isset($view->getFile()[$key][$index])||
            $view->getUrlName2() === 'Users' && isset($view->getFile()[$key]['Users'][$index])||
            $view->getUrlName2() === 'Product' && isset($view->getFile()[$key]['Product'][$index])||
            $view->getUrlName2() === 'MyStyle'||
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
    if($myCountBranch === count($myBranch))
        include 'AllBranchLanguageInput.php';
}else if(isset($index))//make check index for edit
    include('my_id.php');
//make create inside all branch or select and custom branch
else if(count($view->getFileByFixedId()['Branches']) > 1){
    include 'AllBranchLanguageInput.php';
    foreach($view->getFileByFixedId()['Branches'] as $key=>$option){
        if($key !== $view->getId())
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
