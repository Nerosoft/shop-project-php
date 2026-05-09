<?php echo '<input type="hidden" value="'.$this->getId().'"name="superId" id="superId">';?>
<h4><?php echo $this->getTitleForm()?></h4>
<div class="form-group">
    <label for="dbkeys"><?php echo $this->getDbKeyLabel()?></label>
    <select
    title=""
    class="form-select" id="dbkeys" name="dbkeys"  aria-label="Default select example">
        <option selected disabled><?php echo $this->getAppLabel()?></option>
        <?php 
            foreach($this->getDbKeys() as $key=>$name){
                $select = isset($name[$this->getId()])? 'selected' : '';
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
    if(!empty($this->getDbBranchKeys())){
        echo<<<HTML
        <div class="form-group">
            <label for="dbkeysBranch">{$this->getAllBranch()}</label>
            <select
            title=""
            class="form-select" id="dbkeysBranch" name="dbkeys"  aria-label="Default select example">
                <option selected disabled>{$this->getBranchLabel()}</option>
        HTML;
        foreach($this->getDbBranchKeys() as $key=>$name){
            $select = $this->getId() === $key ? 'selected' : '';
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
    <label for="email"><?php echo $this->getLabelEmail()?></label>
    <input type="email" class="form-control" id="email" name="Email"
        value="<?php echo $_POST['Email']??''?>" placeholder="<?php echo $this->getHintEmail()?>"
        title="<?php echo $this->getHintEmail()?>"
        required>
</div>
<div class="form-group">
    <label for="password"><?php echo $this->getLabelPassword2()?></label>
    <input type="password" class="form-control" id="password" name="Password"
        placeholder="<?php echo $this->getHintPassword2()?>"
        title="<?php echo $this->getHintPassword2()?>"
        required
        minlength="8" 
        <?php 
            echo $this->getUrlName2() === 'Login'?<<<HTML
            oninput="handleInput(this, '{$this->getRequiredPassword()}', '{$this->getInvalidPassword()}')"
            oninvalid="handleInput(this, '{$this->getRequiredPassword()}', '{$this->getInvalidPassword()}')"
            HTML:
            <<<HTML
            oninput="handleInputPassConfirmPass(this, '{$this->getRequiredPassword()}', '{$this->getInvalidPassword()}', 'password_confirmation')"
            oninvalid="handleInputPassConfirmPass(this, '{$this->getRequiredPassword()}', '{$this->getInvalidPassword()}', 'password_confirmation')"
            HTML;
        ?>
        >
</div>
<script type="text/javascript">
    $('#dbkeys, #dbkeysBranch').on('change', function(){
        window.location.href = '<?php echo $this->getUrlName2();?>'+'?id='+this.value;
    });
</script>