<?php
$button = $view->getButtonName();
include 'button_valid.php';
?>
</form>

<button type="button" onclick="openForm('<?php echo'#branch_modal2'?>')" class="btn btn-info"><?php echo $view->getDbKeyLabel()?></button>
<?php 
    $title = $view->getModalTitleProject();
    $button = $view->getModalButtonProject();
    $action = 'SetupProject.php';
    $idModel = "setupprojectmodal";   
    include 'all_modal/show_password.php';
    include 'all_modal/model_branch_inputs.php';
    echo '</div></div>';
    include('all_modal/end_model.php');

    $idModel = 'branch_modal2';
    $style_lang = $view->getDbBranchKeys();
    $error = $view->getActiveBranchProject();
    $title = $view->getBranchProjectTitle();
    $button = $view->getBranchProjectButton();
    $state = 'branch2';
    $data = $view->getDbKeys();
    include 'all_modal/style_lang_form.php';
    ?>

<button onclick="openForm('<?php echo'#setupprojectmodal'?>')" type="button" class="btn btn-danger" ><?php echo $view->getButtonSetupProject()?></button>
<a href="<?php echo ($view->getUrlName2()!=='Login'?'login':'register')?>" class="navbutton btn btn-info mt-2"><?php echo $view->getRegisterLoginPage()?></a>
