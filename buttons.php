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
    include 'model_branch_inputs.php';?>
        <div class="col-lg-auto pt-2">
            <label class="branch-label" for="email"><?php echo$view->getLabelEmail()?></label>
            <div class="input-group">
                <div class="input-group-prepend">
                <img class="style_icon_menu" src="./asset/lib/icons/calendar-heart-fill.svg"/>
                </div>
                <input required type="email" name="Email" id="email" 
                title="<?php echo $view->getHintEmail()?>"
                placeholder='<?php echo$view->getHintEmail()?>'
                class="form-control">
            </div>
        </div>
        <div class="col-lg-auto pt-2">
            <label class="branch-label" for="password"><?php echo$view->getLabelPassword()?></label>
            <div class="input-group">
                <div class="input-group-prepend">
                <img class="style_icon_menu" src="./asset/lib/icons/p-circle-fill.svg"/>
                </div>
                <input type="password" class="form-control" id="password" name="Password"
                placeholder="<?php echo $view->getHintPassword()?>"
                title="<?php echo $view->getHintPassword()?>"
                required
                minlength="8" 
                oninput="handleInput(this, '<?php echo $view->getRequiredPassword()?>', '<?php echo $view->getInvalidPassword()?>')"
                oninvalid="handleInput(this, '<?php echo $view->getRequiredPassword()?>', '<?php echo $view->getInvalidPassword()?>')"
                >
            </div>
        </div>
        <div class="col-lg-auto pt-2">
            <label class="branch-label" for="codePassword"><?php echo $view->getLabelKeyPassword()?></label>
            <div class="input-group">
                <div class="input-group-prepend">
                <img class="style_icon_menu" src="./asset/lib/icons/nvme-fill.svg"/>
                </div>
                <input type="password" class="form-control" id="codePassword" name="Key"
                placeholder="<?php echo $view->getHintKeyPassword()?>"
                title="<?php echo $view->getHintKeyPassword()?>"
                minlength="8" 
                required
                oninput="handleInput(this, '<?php echo $view->getRequiredKeyPassword()?>', '<?php echo $view->getInvalidKeyPassword()?>')"
                oninvalid="handleInput(this, '<?php echo $view->getRequiredKeyPassword()?>', '<?php echo $view->getInvalidKeyPassword()?>')">
            </div>
        </div>
    </div>
</div>
    <?php include('end_model.php');?>
<button onclick="openForm('#setupprojectmodal')" type="button" class="btn btn-danger" ><?php echo $view->getButtonSetupProject()?></button>
<a href="<?php echo ($view->getUrlName2()!=='Login'?'login':'register').'?id='.$view->getId();?>" class="navbutton btn btn-info mt-2"><?php echo $view->getRegisterLoginPage()?></a>
