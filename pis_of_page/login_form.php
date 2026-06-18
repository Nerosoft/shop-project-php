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
    // if(!empty($view->getDbBranchKeys())){
    //     echo<<<HTML
    //     <div class="form-group">
    //         <label for="dbkeysBranch">{$view->getAllBranch()}</label>
    //         <select
    //         title=""
    //         class="form-select" id="dbkeysBranch" name="dbkeys"  aria-label="Default select example">
    //             <option selected disabled>{$view->getBranchLabel()}</option>
    //     HTML;
    //     foreach($view->getDbBranchKeys() as $key=>$name){
    //         $select = $view->getId() === $key ? 'selected' : '';
    //         echo <<<HTML
    //         <option {$select} value="{$key}">
    //             {$name['Name']}
    //         </option>
    //         HTML;
    //     }
    //     echo '</select></div>';
    // }
    include('all_modal/login_register_input.php');
?>

<script type="text/javascript">
    $('#dbkeys, #dbkeysBranch').on('change', function(){
        window.location.href = '<?php echo $view->getUrlName2();?>'+'?id='+this.value;
    });
</script>