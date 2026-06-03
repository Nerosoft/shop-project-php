 </form>

<button form='register' type='submit' class="btn btn-primary" onclick="validForm2('#loginRegister')"><?php echo $view->getButtonName()?></button>
<button type="button" data-id="#createModel" class="btn btn-success edit_create"><?php echo $view->getChangeLanguageButton()?></button>
<button type="button" data-id="#style_modal" class="btn btn-info edit_create"><?php echo $view->getChangeStyleButton()?></button>
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

<button data-id="#setupprojectmodal" type="button" class="btn btn-danger edit_create" ><?php echo $view->getButtonSetupProject()?></button>
<a href="<?php echo ($view->getUrlName2()!=='Login'?'login':'register').'?id='.$view->getId();?>" class="navbutton btn btn-info mt-2"><?php echo $view->getRegisterLoginPage()?></a>
