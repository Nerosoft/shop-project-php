<?php

if($view->getUrlName2() === 'Product' ||
$index !== $view->getLanguage() && $index !== 'english' && $view->getUrlName2() === 'ChangeLanguage'||
$view->getUrlName2() === 'Home' || 
$view->getId() !== $index && $index !== $view->getFixedId() && $view->getUrlName2() === 'Branches'||
isset($view->getModel2()['MyFlexTables'][$view->getUrlName2()])||
$view->getUrlName2() === 'Users'){
    $action = $view->getUrlName2() === 'ChangeLanguage'?'ChangeLanguageDeletePost':($view->getUrlName2() === 'Home'?'HomeDeletePost.php':($view->getUrlName2() === 'Branches'?'BranchDeletePost.php':('SettingUsersDeletePost?id='.(isset($view->getModel2()['MyFlexTables'][$view->getUrlName2()])?$_GET['id']:$view->getUrlName2()))));
    include('all_modal/modal_delete.php');
}
if($view->getUrlName2() === 'Branches' || $view->getUrlName2() === 'MyStyle' || $view->getUrlName2() === 'ChangeLanguage'){
    $action = $view->getUrlName2() === 'Branches'?'BranchChangePost.php':'ChangeLanguagePost.php';
    include('all_modal/modal_changelanguage_changestyle.php');
}
 if($view->getUrlName2() === 'Branches')
    $view->makeCreateModal($view, $view->getScreenModelEdit(), $view->getButtonModelEdit(), "editModel".$index, $index, $myObject, 'BranchEditPost.php');
 else if($view->getUrlName2() === 'Users' || $view->getUrlName2() === 'Product' || isset($view->getModel2()['MyFlexTables'][$view->getUrlName2()]) )
        $view->makeCreateModal($view, $view->getScreenModelEdit(), $view->getButtonModelEdit(), "editModel".$index, $index, $myObject);
 
 
$valueObj =  htmlspecialchars(is_array($myObject)?json_encode($myObject):$myObject->getObj(), ENT_QUOTES, "UTF-8");
if($view->getUrlName2() === 'Product' || isset($view->getModel2()['MyFlexTables'][$view->getUrlName2()])){
    include('all_modal/ViewImage.php');
    echo <<<HTML
        <i class="fa fa-binoculars fa-2x pointer" onclick="openForm('#imgmodal{$index}')"></i>
        <i onclick="restValue('#editModel{$index}', '$valueObj');$('#editModel{$index}').find('form').find('img').attr('src', './asset/product/{$view->getId()}/{$index}')" class="fa fa-sliders fa-2x pointer"></i>
    HTML;
}
else
    echo <<<HTML
        <i onclick="restValue('#editModel{$index}', '$valueObj')" class="fa fa-sliders fa-2x pointer"></i>
    HTML;
?>
</td></tr>
<?php
++$count;
