<?php
// require 'auth/test_session2.php';
include 'interface/InterfaceDataView.php';
class MyFlexTablesView extends ModelJson implements InterfaceDataView{
    function __construct(){
        parent::__construct($_GET['id']??'', function(){
            return isset($this->getObj()[$this->getUrlName2()])?array_reverse($this->getObj()[$this->getUrlName2()]):array();
        });
    }
    function getView(){
        foreach ($this->getMyDataView() as $index => $myObject) {
            echo <<<HTML
                <tr>
                    <td>{$this->getCount()}</td>
                    <td><img id="preview" src="./asset/product/{$this->getId()}/{$index}" class="avatar-product-view"></td>
            HTML;
            foreach ($myObject as $key => $item)
                echo <<<HTML
                <td>{$item}</td>
                HTML;  
            echo <<<HTML
                <td>
                HTML;
            $nameItem = $myObject[array_key_first($myObject)];
            include 'pis_of_page/button_edit.php';
        }
    }
    function getTableHead(){
        return $this->getModelPage()['TableHead'];
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
new MyFlexTablesView();
