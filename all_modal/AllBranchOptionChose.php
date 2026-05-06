<?php
    include 'AllBranchLanguageInput.php';
    foreach($myBranch as $key=>$option){
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