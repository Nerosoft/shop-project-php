<?php
include 'interface/InterfaceDataView.php';
class MyFlexTablesView extends ModelJson implements InterfaceDataView{
    use ErrorFlexTable;
    private $TableHead;
    private $Label;
    private $Hint;
    function __construct(){
        parent::__construct($_GET['id']??'', function(){
            $this->initErrorFlexTable();
            $this->initImageInfo();
            $this->TableHead = $this->getModelPage()['TableHead'];
            $this->Label = $this->getModelPage()['Label'];
            $this->Hint = $this->getModelPage()['Hint'];
            return isset($this->getObj()[$this->getUrlName2()])?array_reverse($this->getObj()[$this->getUrlName2()]):array();
        });
    }
    function getTableHead(){
        return $this->TableHead;
    }
    function getLabel(){
        return $this->Label;
    }
    function getHint(){
        return $this->Hint;
    }
    function makeCreateModal($view, $title, $button, $idModel = 'createModel', $index = null, $myObject = null){
        $action = 'FlexTablesCreatePost?id='.$this->getUrlName2();
        include('all_modal/modal_flex.php');
    }
}
$view = new MyFlexTablesView();
foreach ($view->getMyDataView() as $index => $myObject) {
    echo <<<HTML
        <tr>
            <td>{$view->getCount()}</td>
            <td><img id="preview" src="./asset/product/{$view->getId()}/{$index}" class="avatar-product-view"></td>
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