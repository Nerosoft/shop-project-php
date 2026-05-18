<?php
if($view->getUrlName2() === 'Login' || $view->getUrlName2() === 'Register')
    echo '<input type="hidden" value="'.$view->getId().'"name="superId">';
else if($view->getUrlName2() === 'MyStyle' ||
$view->getUrlName2() === 'ChangeLanguage'||
$view->getUrlName2() === 'Home'||
$view->getUrlName2() === 'Users'||
$view->getUrlName2() === 'Product'||
isset($view->getModel2()['MyFlexTables'][$view->getUrlName2()])
){
  if(isset($action) && $action === 'ChangeLanguagePost.php' || 
  isset($action) && $action === 'ChangeLanguageEditPost')
    echo '<input type="hidden" value="'.$view->getUrlName2().'" name="option">';
  include 'AllBranchOption.php';
}
?>
</div>
<div class="modal-footer">
  <button type="submit" id="click_button" class="btn btn-primary" onclick="validForm('#<?php echo$idForm??'createForm'?>')"><?php echo$button?></button>
</div>
</form>
</div>
</div>
</div>