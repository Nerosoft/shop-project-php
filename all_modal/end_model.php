<?php
include 'AllBranchOption.php';
if(isset($action) && $action === 'ChangeLanguagePost.php' || 
  isset($action) && $action === 'SetupProject.php'||
  isset($action) && $action === 'ChangeLanguageEditPost')
    echo '<input type="hidden" value="'.$view->getUrlName2().'" name="option">';
?>
</div>
<div class="modal-footer">
  <button type="submit" id="click_button" onclick="validForm('#<?php echo$idForm??'createForm'?>')" class="btn btn-primary"><?php echo$button?></button>
</div>
</form>
</div>
</div>
</div>