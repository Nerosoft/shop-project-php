<?php
require 'auth/SessionAdmin.php';
require 'post/'.ModelJson::getFileName().'.php';
$view->initActionServer();
// //create
// if(ModelJson::getFileName() === 'ChangeLanguageCreatePost' || 
// ModelJson::getFileName() === 'ProductCreatePost'||
// ModelJson::getFileName() === 'FlexTablesCreatePost'||
// ModelJson::getFileName() === 'HomeCreatePost'||
// ModelJson::getFileName() === 'ChangeLanguageEditPost'||
// ModelJson::getFileName() === 'HomeEditPost'||
// ModelJson::getFileName() === 'BranchEditPost'||
// ModelJson::getFileName() === 'BranchCreatePost')
//     $view->showMessage($view->getModelPage()[isset($_POST['id'])?'MessageModelEdit':'MessageModelCreate']);
// else if(ModelJson::getFileName() === 'SettingUsersDeletePost' || 
// ModelJson::getFileName() === 'HomeDeletePost'||
// ModelJson::getFileName() === 'ChangeLanguageDeletePost'||
// ModelJson::getFileName() === 'BranchDeletePost')
//     $view->showMessage($view->getModelPage()['Delete']);
// else if(ModelJson::getFileName() === 'BranchChangePost'||
//         ModelJson::getFileName() ==='ChangeLangPost' && $_POST['state'] === 'branch' || 
//         ModelJson::getFileName() ==='ChangeLangPost' && $_POST['state'] === 'branch2')
//     $view->showMessage($view->getModelPage()['SuccessfullyChangeBranch']);

// else if(ModelJson::getFileName() ==='ChangeLangPost' && $_POST['state'] === 'AllNamesLanguage' ||
// ModelJson::getFileName() ==='ChangeLanguagePost' && $_POST['state'] === 'AllNamesLanguage')
//     $view->showMessage($view->getModelPage()['MessageStyleLang']);
// else if(ModelJson::getFileName() ==='ChangeLangPost' && $_POST['state'] === 'Style' ||
// ModelJson::getFileName() ==='ChangeLanguagePost' && $_POST['state'] === 'Style')
//     $view->showMessage($view->getModelPage()['MessageStyleLang2']);
// else
$view->showMessage();