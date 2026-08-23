<i onclick="openForm2('#deleteModel<?php echo$index?>')" class="fa fa-trash fa-2x pointer"></i>
<?php
$title = $this->getScreenModelDelete();
$idModel = "deleteModel".$index;
$button = $this->getbuttonModelDelete();
include('start_model.php');
echo $this->getmessageModelDelete().'<spam>-'.(ModelJson::getFileName() === 'MyFlexTables'?$myObject[array_key_first($myObject)]:$myObject->getName()).'</spam>';
include 'end_model.php';
?>
