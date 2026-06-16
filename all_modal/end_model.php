<?php
include 'AllBranchOption.php';
if(isset($action) && $action === 'ChangeLanguagePost.php' || 
  isset($action) && $action === 'ChangeLangPost.php'||
  isset($action) && $action === 'SetupProject.php'||
  isset($action) && $action === 'ChangeLanguageEditPost')
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