<div class="container">
    <div class="register">
        <form id='register' method='POST' action="LoginPost.php">
            <?php include 'login_form.php'?>
        </form>
        <?php include 'buttons.php'?>
        <button onclick="openForm('#forgetpasswordmodal')" type="button" class="btn btn-success" ><?php echo $view->getButtonForgetPassword()?></button>
        <?php 
        $title = $view->getModalForgetPasswordTitle();
        $button = $view->getModalForgetPasswordButton();
        $action = 'LoginForgetPasswordPost.php';
        $idModel = "forgetpasswordmodal";
        $idForm = "forgetpasswordform";
        $labelPassword = $view->getNewPassword();
        $hintPassword = $view->getNewHintPassword();
        include('start_model.php');
        echo '<input type="hidden" value="'.$view->getId().'"name="superId">';
        include('Modal_setting_users_body.php');?>
    </div>
</div>
</body>
</html>