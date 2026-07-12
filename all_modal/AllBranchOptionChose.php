<?php
    include 'AllBranchLanguageInput.php';
    foreach($view->getBranch2() as $key=>$option){
        echo <<<HTML
            <div class="col-md-auto">
                <div class="form-group">
                    <div class="form-check">
                        <input onchange="optionBranch('all_branch2')" type="checkbox" id="choices[]" class="all_branch form-check-input branch-check" name="choices[$key]" value="{$key}">
                        <label class="form-check-label" for="choices[]">
                        {$option['Name']}
                        </label>
                    </div>
                </div>
            </div>
        HTML;
    }