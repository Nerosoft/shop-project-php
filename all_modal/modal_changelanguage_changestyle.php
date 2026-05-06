<i class="pointer <?php echo $image?> fa-2x" onclick="openForm('#selectLanguage<?php echo$index?>')"></i>
<?php
$title = $view->getTitleChangeLanguageMessage();
$button = $view->getButtonChangeLanguageMessage();
$idModel = "selectLanguage".$index;
$idForm = "selectLanguage".$index;
include('start_model.php');
echo $view->getLabelChangeLanguageMessage().'<spam>-'.$myObject->getName().'</spam>';

//ignore branch change only(style and lang)
if($view->getUrlName2() !== 'Branches'){
    echo '<input type="hidden" value="'.$view->getUrlName2().'" name="option">';
    include 'all_modal/AllBranchOption.php';
}else
    //set id for branch
    include('all_modal/my_id.php');

include('end_model.php');