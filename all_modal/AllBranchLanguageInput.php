<?php
echo'
    <div class="col-lg-auto pt-2">
        <div class="form-check">
            <input onchange="optionBranch()" name="choices"  class="all_branch2 form-check-input branch-check" type="checkbox">
            <label  class="form-check-label">'
                .($this->getUrlName2() === 'SystemLang' && !isset($state)?$this->getSelectAll():$this->getAllBranches()).
            '</label>
        </div>
    </div>
';