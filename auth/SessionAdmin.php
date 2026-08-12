<?php
session_start();
include 'interface/InterfaceDataView.php';
require 'controller/ModelJson.php';
if(ModelJson::getFileName() === 'Product' || ModelJson::getFileName() === 'Site'){
    require 'class_object/ProductValue.php';
    if(ModelJson::getFileName() === 'Product')
        include 'interface/CreateModal.php';
}else if(ModelJson::getFileName() === 'Branches' || ModelJson::getFileName() === 'ChangeLanguage' || ModelJson::getFileName() === 'Home')
    include 'interface/CreateModalBranch.php';
else if(ModelJson::getFileName() === 'MyFlexTables'|| ModelJson::getFileName() === 'Users')
    include 'interface/CreateModal.php';