<div class="form-group">
    <label for="email"><?php echo$view->getLabelEmail()?></label>
    <input required type="email" name="Email" id="email" 
    title="<?php echo $view->getHintEmail()?>"
    value="<?php echo$myObject?->getName()??''?>" placeholder='<?php echo$view->getHintEmail()?>'
    class="form-control">
</div>
<div class="form-group">
    <label for="password"><?php echo $view->getLabelPassword('NewPassword')?></label>
    <input type="password" class="form-control" id="password" name="Password"
        placeholder="<?php echo $view->getHintPassword('NewHintPassword')?>"
        title="<?php echo $view->getHintPassword('NewHintPassword')?>"
        value="<?php echo$myObject?->getPassword()??''?>"
        required
        minlength="8" 
        oninput="handleInput(this, '<?php echo $view->getRequiredPassword()?>', '<?php echo $view->getInvalidPassword()?>')"
        oninvalid="handleInput(this, '<?php echo $view->getRequiredPassword()?>', '<?php echo $view->getInvalidPassword()?>')"
        >
</div>
 <div class="form-group">
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