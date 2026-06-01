<?php
include 'auth/SessionAdmin.php';
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_GET['id'])){
ModelJson::initView($_GET['id'] !== 'Users' && $_GET['id'] !== 'Product' ?'MyFlexTablesView':$_GET['id'], isset($_POST['id'])?'MessageModelEdit':'MessageModelCreate', 'success', function(){
class SettingUsersDeletePost extends ValidationId{
    function __construct(){
        parent::__construct($_GET['id'], function($myFile, $key){
            if($_GET['id'] !== 'Users')
                //delete image for product
                array_map('unlink', glob('asset/product/'.$key.'/'.$this->keyId.'.*'));
            return $this->deleteItem($myFile);
        }, 'Delete');
        $this->saveModel($this->deleteItem($this->getObj()));
        if($_GET['id'] !== 'Users')
            array_map('unlink', glob('asset/product/'.$this->getId().'/'.$this->keyId.'.*'));
        
    }
}
new SettingUsersDeletePost();
});
}else
    header('LOCATION:index');