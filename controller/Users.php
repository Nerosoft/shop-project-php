<?php
require 'auth/test_session2.php';
require 'class_object/Users.php';
require 'all_trait/InterEmailPass.php';
include 'interface/InterfaceDataView.php';
class MySettingUsers extends ModelJson implements InterfaceDataView{
    use EmailPassword;
    private $ForgetPasswordHeadTable;
    function __construct(){
        parent::__construct('Users', function(){
            $this->initEmailPassword();
            return isset($this->getObj()['Users']) ? array_reverse(Users::fromArray($this->getObj()['Users'])):array();
        }, Users::getKeysObject());
    }
}
$view = new MySettingUsers();
foreach ($view->getMyDataView() as $index => $myObject) {
    echo <<<HTML
        <tr>
            <td>{$view->getCount()}</td>
            <td>{$myObject->getName()}</td>
            <td>***************</td>
            <td>***************</td>
            <td>
        HTML;
    include 'pis_of_page/button_edit.php';
}