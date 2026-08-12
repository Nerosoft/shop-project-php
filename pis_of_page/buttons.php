
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

    foreach ($this->getFile() as $key => $obj)
        if(isset($obj['Branches'])){
            $data[$key] = new Branch($obj['Branches'][$key]['Name']);
            if(isset($obj['Branches'][$this->getId()]))
                $style_lang = $key;
        }
    $idModel = 'branch_modal2';
    $error = $this->getActiveBranchProject();
    $title = $this->getBranchProjectTitle();
    $button = $this->getBranchProjectButton();
    $state = 'branch2';
    $action = 'ChangeLangPost?id='.$this->getUrlName2();
    include 'all_modal/style_lang_form.php';
    ?>