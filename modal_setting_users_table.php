<!-- Modal -->
<?php 
include('start_model.php');
if(isset($index))
    include('my_id.php');
?>
<div class="form-group">
    <label for="email" class="form-label"><?php echo$view->getLabelName()?></label>
    <input required type="email" name="Email" id="email" 
    value="<?php echo$myObject?->getName()??''?>" placeholder='<?php echo$view->getHintName()?>'
    class="form-control">
</div>
<div class="form-group">
    <label for="password"><?php echo $view->getLabelPassword()?></label>
    <input type="text" class="form-control" id="password" name="Password"
        placeholder="<?php echo $view->getHintPassword()?>"
        title="<?php echo $view->getHintPassword()?>"
        value="<?php echo$myObject?->getPassword()??''?>"
        required
        minlength="8" 
        oninput="handleInput(this, '<?php echo $view->getRequiredPassword()?>', '<?php echo $view->getInvalidPassword()?>')"
        oninvalid="handleInput(this, '<?php echo $view->getRequiredPassword()?>', '<?php echo $view->getInvalidPassword()?>')"
        >
</div>
 <div class="form-group">
    <label for="codePassword"><?php echo $view->getLabelForgetPassword()?></label>
    <input type="text" class="form-control" id="codePassword" name="Key"
    placeholder="<?php echo $view->getHintForgetPassword()?>"
    title="<?php echo $view->getHintForgetPassword()?>"
    value="<?php echo$myObject?->getKey()??''?>"
    minlength="8" 
    required
    oninput="handleInput(this, '<?php echo $view->getRequiredKeyPassword()?>', '<?php echo $view->getInvalidKeyPassword()?>')"
    oninvalid="handleInput(this, '<?php echo $view->getRequiredKeyPassword()?>', '<?php echo $view->getInvalidKeyPassword()?>')">
</div>
<?php include('end_model.php');?>