<?php
require 'page.php';
require 'ErrorProduct.php';
require 'ProductValue.php';
class Product extends Page{
    use ErrorProduct;
    private $NameHeadTable;
    private $LabelName;
    private $HintName;
    private $DescreptionHeadTable;
    private $LabelDescreption;
    private $HintDescreption;
    private $SalaryHeadTable;
    private $LabelSalary;
    private $HintSalary;
    private $CategoryHeadTable;
    private $LabelCategory;
    private $HintCategory;
    private $ImgLabel;
    private $ImgButton;
    private $TableProductImage;
    private $TitleViewImage;
    private $DataView = array();
    function __construct($message = 'LoadMessage', $type = 'success'){
        parent::__construct('Product', $message, $type);
        $this->initErrorProduct($this->getModelPage());
        $this->NameHeadTable = $this->getModelPage()['NameHeadTable'];
        $this->LabelName = $this->getModelPage()['LabelName'];
        $this->HintName = $this->getModelPage()['HintName'];
        $this->DescreptionHeadTable = $this->getModelPage()['DescreptionHeadTable'];
        $this->LabelDescreption = $this->getModelPage()['LabelDescreption'];
        $this->HintDescreption = $this->getModelPage()['HintDescreption'];
        $this->SalaryHeadTable = $this->getModelPage()['SalaryHeadTable'];
        $this->LabelSalary = $this->getModelPage()['LabelSalary'];
        $this->HintSalary = $this->getModelPage()['HintSalary'];
        $this->CategoryHeadTable = $this->getModelPage()['CategoryHeadTable'];
        $this->LabelCategory = $this->getModelPage()['LabelCategory'];
        $this->HintCategory = $this->getModelPage()['HintCategory'];
        $this->ImgLabel = $this->getModelPage()['ImgLabel'];
        $this->ImgButton = $this->getModelPage()['ImgButton'];
        $this->TableProductImage = $this->getModelPage()['TableProductImage'];
        $this->TitleViewImage = $this->getModelPage()['TitleViewImage'];
        $this->DataView = isset($this->getObj()['Product'])?ProductValue::fromArray($this->getObj()['Product']):array();
    }
    function getTitleViewImage(){
        return $this->TitleViewImage;
    }
    function getTableProductImage(){
        return $this->TableProductImage;
    }
    function getImgLabel(){
        return $this->ImgLabel;
    }
    function getImgButton(){
        return $this->ImgButton;
    }
    function getNameHeadTable(){
        return $this->NameHeadTable;
    }
    function getLabelName(){
        return $this->LabelName;
    }
    function getHintName(){
        return $this->HintName;
    }
    function getDescreptionHeadTable(){
        return $this->DescreptionHeadTable;
    }
    function getLabelDescreption(){
        return $this->LabelDescreption;
    }
    function getHintDescreption(){
        return $this->HintDescreption;
    }
    function getSalaryHeadTable(){
        return $this->SalaryHeadTable;
    }
    function getLabelSalary(){
        return $this->LabelSalary;
    }
    function getHintSalary(){
        return $this->HintSalary;
    }
    function getCategoryHeadTable(){
        return $this->CategoryHeadTable;
    }
    function getLabelCategory(){
        return $this->LabelCategory;
    }
    function getHintCategory(){
        return $this->HintCategory;
    }
    function getMyDataView(){
        return $this->DataView;
    }
}