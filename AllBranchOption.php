<?php
//make test key inside all blanch
if(isset($index) && count($view->getFileByFixedId()['Branches']) > 1){
    include('my_id.php');
    $myCountBranch = 1;
    foreach($view->getFileByFixedId()['Branches'] as $key=>$option)
        if($key !== $view->getId() && $view->getUrlName2() === 'Home' && isset($view->getFile()[$key][$view->getFile()[$key]['Setting']['Language']][$index])||
           $key !== $view->getId() && $view->getUrlName2() === 'ChangeLanguage' && isset($view->getFile()[$key][$index])||
           $key !== $view->getId() && $view->getUrlName2() === 'Users' && isset($view->getFile()[$key]['Users'][$index])||
           $key !== $view->getId() && $view->getUrlName2() === 'Product' && isset($view->getFile()[$key]['Product'][$index])||
           $key !== $view->getId() && $view->getUrlName2() === 'MyStyle'){
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
    if($myCountBranch === count($view->getFileByFixedId()['Branches']))
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
