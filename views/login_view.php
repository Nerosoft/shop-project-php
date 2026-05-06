<div class="container">
    <div class="register">
        <form id='register' method='POST' action="LoginPost.php">
            <?php include 'pis_of_page/login_form.php'?>
        </form>
        <?php include 'pis_of_page/buttons.php'?>
        <button onclick="openForm('#forgetpasswordmodal')" type="button" class="btn btn-success" ><?php echo $view->getButtonForgetPassword()?></button>
        <?php 
        $title = $view->getModalForgetPasswordTitle();
        $button = $view->getModalForgetPasswordButton();
        $action = 'LoginForgetPasswordPost.php';
        $idModel = "forgetpasswordmodal";
        $idForm = "forgetpasswordform";
        include('all_modal/start_model.php');
        echo '<input type="hidden" value="'.$view->getId().'"name="superId">';
        include('all_modal/Modal_setting_users_body.php');
        include('all_modal/end_model.php');?>
    </div>
</div>
<?php include 'pis_of_page/end_html.php'?>