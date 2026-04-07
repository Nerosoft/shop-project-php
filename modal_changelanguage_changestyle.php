<img class="style_icon_menu pointer" src="./asset/lib/icons/<?php echo $image?>" onclick="openForm('#selectLanguage<?php echo$index?>')"/>
<?php
$title = $view->getTitleChangeLanguageMessage();
$button = $view->getButtonChangeLanguageMessage();
$idModel = "selectLanguage".$index;
$idForm = "selectLanguage".$index;
include('start_model.php');
echo $view->getLabelChangeLanguageMessage().'<spam>-'.$myObject->getName().'</spam>';
//ignore branch change only(style and lang)
if($view->getUrlName2() === 'MyStyle' && count($view->getBranch()) > 1){
    echo '<input type="hidden" value="'.$view->getUrlName2().'" name="option">';
    include('my_id.php');
    $myBranch = $view->getBranch2();
    include 'AllBranchOptionChose.php';
}
else if($view->getUrlName2() === 'ChangeLanguage'){
    echo '<input type="hidden" value="'.$view->getUrlName2().'" name="option">';
    include 'AllBranchOption.php';
}else
    include('my_id.php');
include('end_model.php');