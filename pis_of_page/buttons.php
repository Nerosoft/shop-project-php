 </form>

<button form='register' type='submit' class="btn btn-primary" onclick="validForm('#register')"><?php echo $view->getButtonName()?></button>
<button type="button" onclick="openForm('#createModel')" class="btn btn-success"><?php echo $view->getChangeLanguageButton()?></button>
<button type="button" onclick="openForm('#style_modal')" class="btn btn-info"><?php echo $view->getChangeStyleButton()?></button>
<?php 
    $title = $view->getModalTitleProject();
    $button = $view->getModalButtonProject();
    $action = 'SetupProject.php';
    $idModel = "setupprojectmodal";
    // $idForm = "setupprojectform";
   
    include 'all_modal/show_password.php';
    include 'all_modal/model_branch_inputs.php';
    echo '</div></div>';
    include('all_modal/end_model.php');
    ?>

<button onclick="openForm('#setupprojectmodal')" type="button" class="btn btn-danger" ><?php echo $view->getButtonSetupProject()?></button>
<a href="<?php echo ($view->getUrlName2()!=='Login'?'login':'register').'?id='.$view->getId();?>" class="navbutton btn btn-info mt-2"><?php echo $view->getRegisterLoginPage()?></a>
