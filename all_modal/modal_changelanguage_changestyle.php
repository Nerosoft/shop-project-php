<i class="pointer <?php echo $image?> fa-2x" onclick="openForm('#selectLanguage<?php echo$index?>')"></i>
<?php
$title = $view->getTitleChangeLanguageMessage();
$button = $view->getButtonChangeLanguageMessage();
$idModel = "selectLanguage".$index;
$idForm = "selectLanguage".$index;
include('start_model.php');
echo $view->getLabelChangeLanguageMessage().'<spam>-'.$myObject->getName().'</spam>';

if($view->getUrlName2() === 'Branches' && isset($index))
    //set id for branch
    include('my_id.php');

include('end_model.php');