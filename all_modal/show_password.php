<!-- Modal -->
<?php 
include('start_model.php');
include('login_register_input.php');
include('setting_users_iput.php');
?>
<div class="form-check">
    <input onchange="changeInputState($('#<?php echo$idModel??'createModel'?>').find('#codePassword'), $('#<?php echo$idModel??'createModel'?>').find('#password'))"  id="mycheckbox" class="form-check-input" type="checkbox">
    <label  class="form-check-label">
       <?php echo $view->getCheckbooksState()?>
    </label>
</div>