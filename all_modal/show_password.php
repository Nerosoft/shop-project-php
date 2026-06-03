<!-- Modal -->
<?php 
include('start_model.php');
include('login_register_input.php');
include('setting_users_iput.php');
?>
<div class="form-check">
    <input onchange="changeInputState('#<?php echo$idModel??'createModel'?>', $(this).prop('checked')?'text':'password')"  id="mycheckbox" class="form-check-input show-pass" type="checkbox">
    <label  class="form-check-label">
       <?php echo $view->getCheckbooksState()?>
    </label>
</div>