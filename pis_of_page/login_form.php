<?php echo '<input type="hidden" value="'.$view->getId().'"name="superId" id="superId">';?>
<h4><?php echo $view->getTitleForm()?></h4>
<h4>
    <?php include 'pis_of_page/button_langstylebranch.php';?>
    <a href="./site" class="navbar-brand fa fa-truck fa-2x pointer"></a>
</h4>
<?php include('all_modal/login_register_input.php');?>