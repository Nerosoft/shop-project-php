<button form='register' type='submit' class="btn btn-primary" onclick="validForm('#register')"><?php echo $view->getButtonName()?></button>
<button type="button" onclick="openForm('#createModel')" class="btn btn-success"><?php echo $view->getChangeLanguageButton()?></button>
<button type="button" onclick="openForm('#style_modal')" class="btn btn-info"><?php echo $view->getChangeStyleButton()?></button>
<?php 
    $title = $view->getModalTitleProject();
    $button = $view->getModalButtonProject();
    $action = 'SetupProject.php';
    $idModel = "setupprojectmodal";
    $idForm = "setupprojectform";
    include('start_model.php');
    echo '<input type="hidden" value="'.$view->getId().'"name="superId">
    <input type="hidden" name="setup_project" value="'.$view->getUrlName2().'">';
    include 'modal_custome_table_input_name.php';?>
    <?php include('end_model.php');?>
<button onclick="openForm('#setupprojectmodal')" type="button" class="btn btn-danger" ><?php echo $view->getButtonSetupProject()?></button>