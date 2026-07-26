<?php
// require 'auth/test_session2.php';
require 'class_object/Users.php';
include 'interface/InterfaceDataView.php';
class MySettingUsers extends ModelJson implements InterfaceDataView{
    function __construct(){
        parent::__construct('Users', function(){
            return isset($this->getObj()['Users']) ? array_reverse(Users::fromArray($this->getObj()['Users'])):array();
        }, Users::getKeysObject());
    }
    function getView(){
        foreach ($this->getMyDataView() as $index => $myObject) {
            echo <<<HTML
                <tr>
                    <td>{$this->getCount()}</td>
                    <td>{$myObject->getName()}</td>
                    <td>***************</td>
                    <td>***************</td>
                    <td>
                HTML;
            include 'pis_of_page/button_edit.php';
        }
    }
    function makeCreateModal($title, $button, $idModel = 'createModel', $index = null, $myObject = null, $action = 'SettingUsersCreatePost.php'){
        $this->makeCreateModalForgetPass($title, $button, $idModel, $index, $myObject, $action);
    }
}
new MySettingUsers();
