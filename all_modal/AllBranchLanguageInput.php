<?php
echo'
    <div class="col-lg-auto pt-2">
        <div class="form-check">
            <input onchange="optionBranch()" name="choices"  class="all_branch2 form-check-input branch-check" type="checkbox">
            <label  class="form-check-label">'
                .($view->getUrlName2() === 'SystemLang' && !isset($state)?$view->getSelectAll():$view->getAllBranches()).
            '</label>
        </div>
    </div>
';