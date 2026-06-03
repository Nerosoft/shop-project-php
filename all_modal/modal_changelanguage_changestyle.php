<i class="pointer <?php echo $image?> fa-2x edit_create" data-id="#selectLanguage<?php echo$index?>"></i>
<?php
$title = $view->getTitleChangeLanguageMessage();
$button = $view->getButtonChangeLanguageMessage();
$idModel = "selectLanguage".$index;
include('start_model.php');
echo $view->getLabelChangeLanguageMessage().'<spam>-'.$myObject->getName().'</spam>';
include('end_model.php');