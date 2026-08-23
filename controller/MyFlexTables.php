<?php
// require 'auth/test_session2.php';
class MyFlexTablesView extends ModelJson{
    function __construct(){
        parent::__construct($_GET['id']??'');
    }
    function getMyDataView(){
        return isset($this->getObj()[$this->getUrlName2()])?array_reverse($this->getObj()[$this->getUrlName2()]):array();
    }
    function getView(){
        foreach ($this->getMyDataView() as $index => $myObject) {
            include 'pis_of_page/flextable_part.php';
            include 'pis_of_page/button_edit.php';
        }
    }
    function getLabel(){
        return $this->getModelPage()['Label'];
    }
    function getHint(){
        return $this->getModelPage()['Hint'];
    }
    function makeCreateModal($title, $button, $idModel = 'createModel', $index = null, $myObject = null){
        $action = 'FlexTablesCreatePost?id='.$this->getUrlName2();
        include('all_modal/modal_flex.php');
    }
}
$view = new MyFlexTablesView();
