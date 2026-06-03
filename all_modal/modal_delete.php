<i onclick="openForm('#deleteModel<?php echo$index?>')" class="fa fa-trash fa-2x pointer"></i>
<?php
$title = $view->getScreenModelDelete();
$idModel = "deleteModel".$index;
$button = $view->getbuttonModelDelete();
include('start_model.php');
echo $view->getmessageModelDelete().'<spam>-'.($nameItem??$myObject->getName()).'</spam>';
include 'end_model.php';
?>
