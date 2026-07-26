<?php
session_start();
require 'controller/ModelJson.php';
if(ModelJson::getFileName() === 'Login' || ModelJson::getFileName() === 'Register')
    require 'auth/test_session.php';
else if(ModelJson::getFileName() === 'Branches' ||
ModelJson::getFileName() === 'ChangeLanguage' ||
ModelJson::getFileName() === 'Home' ||
ModelJson::getFileName() === 'MyFlexTables' ||
ModelJson::getFileName() === 'MyStyle' ||
ModelJson::getFileName() === 'Product' ||
ModelJson::getFileName() === 'SystemLang' ||
ModelJson::getFileName() === 'Users')
require 'auth/test_session2.php';
else if(ModelJson::getFileName() === 'ChangeLangPost' ||
ModelJson::getFileName() === 'LoginForgetPasswordPost' ||
ModelJson::getFileName() === 'LoginPost' ||
ModelJson::getFileName() === 'RegisterPost' ||
ModelJson::getFileName() === 'SetupProject')
require 'auth/test_session3.php';
else if(ModelJson::getFileName() === 'BranchChangePost' ||
ModelJson::getFileName() === 'BranchCreatePost' ||
ModelJson::getFileName() === 'BranchDeletePost' ||
ModelJson::getFileName() === 'BranchEditPost' ||
ModelJson::getFileName() === 'ChangeLanguageCreatePost' ||
ModelJson::getFileName() === 'ChangeLanguageDeletePost' ||
ModelJson::getFileName() === 'ChangeLanguageEditPost' ||
ModelJson::getFileName() === 'ChangeLanguagePost' ||
ModelJson::getFileName() === 'FlexTablesCreatePost' ||
ModelJson::getFileName() === 'HomeCreatePost' ||
ModelJson::getFileName() === 'HomeDeletePost' ||
ModelJson::getFileName() === 'HomeEditPost' ||
ModelJson::getFileName() === 'ProductCreatePost' ||
ModelJson::getFileName() === 'SettingUsersCreatePost' ||
ModelJson::getFileName() === 'SettingUsersDeletePost' ||
ModelJson::getFileName() === 'SystemLangEditPost' )
require 'auth/test_session4.php';