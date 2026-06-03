<?php
$button = $view->getButtonName();
include 'button_valid.php';
?>
</form>

<button type="button" onclick="openForm('<?php echo'#lang_modal'?>')" class="btn btn-success"><?php echo $view->getChangeLanguageButton()?></button>
<button type="button" onclick="openForm('<?php echo'#style_modal'?>')" class="btn btn-info"><?php echo $view->getChangeStyleButton()?></button>
<?php 
    $title = $view->getModalTitleProject();
    $button = $view->getModalButtonProject();
    $action = 'SetupProject.php';
    $idModel = "setupprojectmodal";   
    include 'all_modal/show_password.php';
    include 'all_modal/model_branch_inputs.php';
    echo '</div></div>';
    include('all_modal/end_model.php');
    ?>

<button onclick="openForm('<?php echo'#setupprojectmodal'?>')" type="button" class="btn btn-danger" ><?php echo $view->getButtonSetupProject()?></button>
<a href="<?php echo ($view->getUrlName2()!=='Login'?'login':'register').'?id='.$view->getId();?>" class="navbutton btn btn-info mt-2"><?php echo $view->getRegisterLoginPage()?></a>
