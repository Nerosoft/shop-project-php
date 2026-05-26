<i class="fa fa-trash fa-2x pointer" onclick="openForm('#deleteModel<?php echo$index?>')"></i>
<?php
$title = $view->getScreenModelDelete();
$idModel = "deleteModel".$index;
$idForm = "deleteForm".$index;
$button = $view->getbuttonModelDelete();
include('start_model.php');
echo $view->getmessageModelDelete().'<spam>-'.($nameItem??$myObject->getName()).'</spam>';
include 'end_model.php';
?>
