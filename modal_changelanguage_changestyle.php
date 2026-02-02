<img class="style_icon_menu pointer" src="./asset/lib/icons/<?php echo $image?>" onclick="openForm('#selectLanguage<?php echo$index?>')"/>
<?php
$title = $view->getTitleChangeLanguageMessage();
$button = $view->getButtonChangeLanguageMessage();
$idModel = "selectLanguage".$index;
$idForm = "selectLanguage".$index;
include('start_model.php');
include('my_id.php');
echo $view->getLabelChangeLanguageMessage().'<spam>-'.$myObject->getName().'</spam>';
include('end_model.php');