<!-- Modal -->
<?php 
include('start_model.php');?>
<div class="form-group">
    <i class="fa fa-user fa-2x"></i>
    <label for="email"><?php echo$view->getLabelEmail()?></label>
    <input required type="email" name="Email" id="email" 
    title="<?php echo$view->getHintEmail()?>"
    value="<?php echo$myObject?->getName()??''?>" placeholder='<?php echo$view->getHintEmail()?>'
    class="form-control">
</div>
<div class="form-group">
    <i class="fa fa-lock fa-2x"></i>
    <label for="password"><?php echo $action ==='SetupProject.php'?$view->getLabelPassword2():$view->getLabelPassword()?></label>
    <input type="password" class="form-control" id="password" name="Password"
        placeholder="<?php echo $action ==='SetupProject.php'?$view->getHintPassword2():$view->getHintPassword()?>"
        title="<?php echo $action ==='SetupProject.php'?$view->getHintPassword2():$view->getHintPassword()?>"
        value="<?php echo$myObject?->getPassword()??''?>"
        required
        minlength="8" 
        oninput="handleInput(this, '<?php echo $view->getRequiredPassword()?>', '<?php echo $view->getInvalidPassword()?>')"
        oninvalid="handleInput(this, '<?php echo $view->getRequiredPassword()?>', '<?php echo $view->getInvalidPassword()?>')"
        >
</div>
 <div class="form-group">
    <i class="fa fa-lock fa-2x"></i>
    <label for="codePassword"><?php echo $view->getLabelKeyPassword()?></label>
    <input type="password" class="form-control" id="codePassword" name="Key"
    placeholder="<?php echo $view->getHintKeyPassword()?>"
    title="<?php echo $view->getHintKeyPassword()?>"
    value="<?php echo$myObject?->getKey()??''?>"
    minlength="8" 
    required
    oninput="handleInput(this, '<?php echo $view->getRequiredKeyPassword()?>', '<?php echo $view->getInvalidKeyPassword()?>')"
    oninvalid="handleInput(this, '<?php echo $view->getRequiredKeyPassword()?>', '<?php echo $view->getInvalidKeyPassword()?>')">
</div>
<div class="form-check">
    <input onchange="changeInputState($('#<?php echo$idForm??'createForm'?>').find('#codePassword'), $('#<?php echo$idForm??'createForm'?>').find('#password'))"  id="mycheckbox" class="form-check-input" type="checkbox">
    <label  class="form-check-label">
       <?php echo $view->getCheckbooksState()?>
    </label>
</div>
<?php
if($view->getUrlName2() !== 'Users'){
    echo '<input type="hidden" value="'.$view->getId().'"name="superId">';
    if($action ==='SetupProject.php'){
        include 'all_modal/model_branch_inputs.php';
        echo '<input type="hidden" name="setup_project" value="'.$view->getUrlName2().'"></div></div>';
    }
}else
    include 'AllBranchOption.php';
include('end_model.php');
?>
