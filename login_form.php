<?php echo '<input type="hidden" value="'.$view->getId().'"name="superId" id="superId">';?>
<h4><?php echo $view->getTitleForm()?></h4>
<div class="form-group">
    <label for="email"><?php echo $view->getDbKeyLabel()?></label>
    <select
    title=""
    class="form-select" id="dbkeys" name="dbkeys"  aria-label="Default select example">
        <option value="" selected disabled><?php echo $view->getAppLabel()?></option>
        <?php 
            foreach($view->getDbKeys() as $key=>$name){
                $select = $view->getMyIdBranch() === $key ? 'selected' : '';
                echo <<<HTML
                <option {$select} value="{$key}">
                    {$name}
                </option>
                HTML;
            }
        ?>
    </select>
</div>
<div class="form-group">
    <label for="email"><?php echo $view->getAllBranch()?></label>
    <select
    title=""
    class="form-select" id="dbkeysBranch" name="dbkeys"  aria-label="Default select example">
        <option value="" selected disabled><?php echo $view->getBranchLabel()?></option>
        <?php 
            foreach($view->getDbBranchKeys() as $key=>$name){
                $select = $view->getId() === $key ? 'selected' : '';
                echo <<<HTML
                <option {$select} value="{$key}">
                    {$name['Name']}
                </option>
                HTML;
            }
        ?>
    </select>
</div>

<?php
$pass = $view->getLabelPassword();
include('login_form2.php');
include 'ValidEmail.php';?>
<script type="text/javascript">
    $('#dbkeys, #dbkeysBranch').on('change', function(){
        window.location.href = '<?php echo$view->getUrlName2();?>'+'.php?id='+this.value;
    });
</script>