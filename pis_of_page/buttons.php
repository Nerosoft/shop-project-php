<?php
$button = $this->getButtonName();
include 'button_valid.php';
echo '</form>';
if($this->getUrlName2() === 'Login'){
echo <<<HTML
<button onclick="openForm('#forgetpasswordmodal')" type="button" class="btn btn-success" >{$this->getButtonForgetPassword()}</button>
HTML;
$this->makeCreateModalForgetPass($this->getModalForgetPasswordTitle(), $this->getModalForgetPasswordButton(), "forgetpasswordmodal", null, null, 'LoginForgetPasswordPost.php');
}
?>
<button type="button" onclick="openForm('<?php echo'#branch_modal2'?>')" class="btn btn-info"><?php echo $this->getDbKeyLabel()?></button>
<button onclick="openForm('<?php echo'#setupprojectmodal'?>')" type="button" class="btn btn-danger" ><?php echo $this->getButtonSetupProject()?></button>
<a href="<?php echo ($this->getUrlName2()!=='Login'?'login':'register')?>" class="navbutton btn btn-info mt-2"><?php echo $this->getRegisterLoginPage()?></a>
</div>
</div>
<?php 
    $title = $this->getModalTitleProject();
    $button = $this->getModalButtonProject();
    $action = 'SetupProject?id='.$this->getUrlName2();
    $idModel = "setupprojectmodal";   
    include 'all_modal/show_password.php';
    include 'all_modal/model_branch_inputs.php';
    echo '</div></div>';
    include('all_modal/end_model.php');

    $idModel = 'branch_modal2';
    $style_lang = $this->getDbBranchKeys();
    $error = $this->getActiveBranchProject();
    $title = $this->getBranchProjectTitle();
    $button = $this->getBranchProjectButton();
    $state = 'branch2';
    $data = $this->getDbKeys();
    include 'all_modal/style_lang_form.php';
    ?>