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
    <input type="hidden" name="setup_project" value="'.$view->getUrlName2().'">'?>
    <div class="form-group">
        <label for="name"><?php echo $view->getNameLabel()?></label>
        <input type="text" class="form-control" name="name"
            placeholder="<?php echo $view->getNameHint()?>"
            title="<?php echo $view->getNameHint()?>"
            oninvalid="handleInput(this ,'<?php echo$view->getNameTableIsReq()?>', '<?php echo$view->getNameTableIsInv()?>')"
            oninput="handleInput(this ,'<?php echo$view->getNameTableIsReq()?>', '<?php echo$view->getNameTableIsInv()?>')"
            minlength="3"
            required>
    </div>
    <?php include('end_model.php');?>
<button onclick="openForm('#setupprojectmodal')" type="button" class="btn btn-danger" ><?php echo $view->getButtonSetupProject()?></button>