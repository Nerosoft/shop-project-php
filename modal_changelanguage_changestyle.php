<img class="style_icon_menu pointer" src="./asset/lib/icons/<?php echo $image?>" onclick="openForm('#selectLanguage<?php echo$index?>')"/>
<?php
$title = $view->getTitleChangeLanguageMessage();
$button = $view->getButtonChangeLanguageMessage();
$idModel = "selectLanguage".$index;
$idForm = "selectLanguage".$index;
include('start_model.php');
//ignore branch change only(style and lang)
if($action !== 'BranchChangePost.php')
    echo '<input type="hidden" value="'.$view->getUrlName2().'" name="option">';
echo $view->getLabelChangeLanguageMessage().'<spam>-'.$myObject->getName().'</spam>';
include 'AllBranchOption.php';
include('end_model.php');