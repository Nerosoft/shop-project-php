<i class="pointer <?php echo $image?> fa-2x" onclick="openForm2('#selectLanguage<?php echo$index?>')"></i>
<?php
$title = $view->getTitleChangeLanguageMessage();
$button = $view->getButtonChangeLanguageMessage();
$idModel = "selectLanguage".$index;
include('start_model.php');
if($view->getUrlName2() !== 'Branches')
    echo '<input type="hidden"value="'.$myStateStyleLang.'" name="state">';
echo $view->getLabelChangeLanguageMessage().'<spam>-'.$myObject->getName().'</spam>';
include('end_model.php');