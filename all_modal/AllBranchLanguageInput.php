<?php
echo'
    <div class="col-lg-auto pt-2">
        <div class="form-check">
            <input name="Branches"  class="form-check-input branch-check" type="checkbox">
            <label  class="form-check-label">'
                .$view->getAllBranches().
            '</label>
        </div>
    </div>
';