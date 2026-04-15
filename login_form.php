<?php echo '<input type="hidden" value="'.$view->getId().'"name="superId" id="superId">';?>
<h4><?php echo $view->getTitleForm()?></h4>
<div class="form-group">
    <label for="dbkeys"><?php echo $view->getDbKeyLabel()?></label>
    <select
    title=""
    class="form-select" id="dbkeys" name="dbkeys"  aria-label="Default select example">
        <option selected disabled><?php echo $view->getAppLabel()?></option>
        <?php 
            foreach($view->getDbKeys() as $key=>$name){
                $select = isset($name[$view->getId()])? 'selected' : '';
                echo <<<HTML
                <option {$select} value="{$key}">
                    {$name[$key]['Name']}
                </option>
                HTML;
            }
        ?>
    </select>
</div>
<?php
    if(!empty($view->getDbBranchKeys())){
        echo<<<HTML
        <div class="form-group">
            <label for="dbkeysBranch">{$view->getAllBranch()}</label>
            <select
            title=""
            class="form-select" id="dbkeysBranch" name="dbkeys"  aria-label="Default select example">
                <option selected disabled>{$view->getBranchLabel()}</option>
        HTML;
        foreach($view->getDbBranchKeys() as $key=>$name){
            $select = $view->getId() === $key ? 'selected' : '';
            echo <<<HTML
            <option {$select} value="{$key}">
                {$name['Name']}
            </option>
            HTML;
        }
        echo '</select></div>';
    }
?>
<div class="form-group">
    <label for="email"><?php echo $view->getLabelEmail()?></label>
    <input type="email" class="form-control" id="email" name="Email"
        value="<?php echo $_POST['Email']??''?>" placeholder="<?php echo $view->getHintEmail()?>"
        title="<?php echo $view->getHintEmail()?>"
        required>
</div>
<div class="form-group">
    <label for="password"><?php echo $view->getLabelPassword()?></label>
    <input type="password" class="form-control" id="password" name="Password"
        placeholder="<?php echo $view->getHintPassword()?>"
        title="<?php echo $view->getHintPassword()?>"
        required
        minlength="8" 
        <?php 
            echo $view->getUrlName2() === 'Login'?<<<HTML
            oninput="handleInput(this, '{$view->getRequiredPassword()}', '{$view->getInvalidPassword()}')"
            oninvalid="handleInput(this, '{$view->getRequiredPassword()}', '{$view->getInvalidPassword()}')"
            HTML:
            <<<HTML
            oninput="handleInputPassConfirmPass(this, '{$view->getRequiredPassword()}', '{$view->getInvalidPassword()}', 'password_confirmation')"
            oninvalid="handleInputPassConfirmPass(this, '{$view->getRequiredPassword()}', '{$view->getInvalidPassword()}', 'password_confirmation')"
            HTML;
        ?>
        >
</div>
<?php include 'ValidEmail.php';?>
<script type="text/javascript">
    $('#dbkeys, #dbkeysBranch').on('change', function(){
        window.location.href = '<?php echo $view->getUrlName2();?>'+'?id='+this.value;
    });
</script>