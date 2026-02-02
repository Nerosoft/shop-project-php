<div class="container">
    <div class="register">
        <form id='register' method='POST' action="LoginPost.php">
            <?php include 'login_form.php'?>
        </form>
        <?php include 'buttons.php'?>
        <!-- Modal -->
        <?php 
        $title = $view->getModalForgetPasswordTitle();
        $button = $view->getModalForgetPasswordButton();
        $action = 'LoginForgetPasswordPost.php';
        $idModel = "forgetpasswordmodal";
        $idForm = "forgetpasswordform";
        include('start_model.php');
        echo '<input type="hidden" value="'.$view->getId().'"name="superId">';?>
        <div class="form-group">
            <label for="email"><?php echo $view->getLabelEmail()?></label>
            <input type="email" class="form-control" id="email" name="Email"
                placeholder="<?php echo $view->getHintEmail()?>"
                title="<?php echo $view->getHintEmail()?>"
                required>
        </div>
        <div class="form-group">
            <label for="codePassword"><?php echo $view->getLabelKeyPassword()?></label>
            <input type="password" class="form-control" id="codePassword" name="Key"
            placeholder="<?php echo $view->getHintKeyPassword()?>"
            title="<?php echo $view->getHintKeyPassword()?>"
            minlength="8" 
            required
            oninput="handleInput(this, '<?php echo $view->getRequiredKeyPassword()?>', '<?php echo $view->getInvalidKeyPassword()?>')"
            oninvalid="handleInput(this, '<?php echo $view->getRequiredKeyPassword()?>', '<?php echo $view->getInvalidKeyPassword()?>')">
        </div>
        <?php include('end_model.php');?>
        <button onclick="openForm('#forgetpasswordmodal')" type="button" class="btn btn-primary" ><?php echo $view->getButtonForgetPassword()?></button>
    </div>
</div>
</body>
</html>