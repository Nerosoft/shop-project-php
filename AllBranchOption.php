<?php
echo <<<HTML
    <div class="col-lg-auto pt-2">
        <div class="form-check">
            <input name="Branches"  class="form-check-input" value="all" type="checkbox">
            <label  class="form-check-label">
                All branches
            </label>
        </div>
    </div>
HTML;
foreach($view->getFileByFixedId()['Branches'] as $key=>$option){
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