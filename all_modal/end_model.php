<?php
if($view->getUrlName2() === 'Login' || $view->getUrlName2() === 'Register' || $view->getUrlName2() === 'Site')
    echo '<input type="hidden" value="'.$view->getId().'"name="superId">';
else if($view->getUrlName2() === 'MyStyle' ||
$view->getUrlName2() === 'ChangeLanguage'||
$view->getUrlName2() === 'Home'||
$view->getUrlName2() === 'Users'||
$view->getUrlName2() === 'Product'||
isset($view->getModel2()['MyFlexTables'][$view->getUrlName2()])
)
  include 'AllBranchOption.php';
if(isset($action) && $action === 'ChangeLanguagePost.php' || 
  isset($action) && $action === 'SetupProject.php'||
  isset($action) && $action === 'ChangeLanguageEditPost')
    echo '<input type="hidden" value="'.$view->getUrlName2().'" name="option">';
?>
</div>
<div class="modal-footer">
  <button type="submit" id="click_button" class="btn btn-primary"
  <?php
  if(!isset($arg)){
    $arg = $idForm??'createForm';
    echo <<<HTML
      onclick="validForm('#{$arg}')"
    HTML;
  }
  echo '>'.$button;
  ?>

</button>
</div>
</form>
</div>
</div>
</div>