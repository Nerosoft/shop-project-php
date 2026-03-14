<!-- Modal -->
<?php 
include('start_model.php');
include('Modal_setting_users_body.php');
if(isset($index))
    include('my_id.php');
else if(count($view->getFileByFixedId()['Branches']) > 1)
        include 'AllBranchOption.php';
include('end_model.php');
?>
