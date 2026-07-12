<?php
require 'class_object/ProductValue.php';
include 'interface/InterfaceDataView.php';
class Product extends ModelJson implements InterfaceDataView{
    use ErrorProduct;
    private $LabelName;
    private $HintName;
    private $LabelDescreption;
    private $HintDescreption;
    private $LabelSalary;
    private $HintSalary;
    private $LabelCategory;
    private $HintCategory;
    function __construct(){
        parent::__construct('Product', function(){
            $this->initErrorProduct();
            $this->LabelName = $this->getModelPage()['LabelName'];
            $this->HintName = $this->getModelPage()['HintName'];
            $this->LabelDescreption = $this->getModelPage()['LabelDescreption'];
            $this->HintDescreption = $this->getModelPage()['HintDescreption'];
            $this->LabelSalary = $this->getModelPage()['LabelSalary'];
            $this->HintSalary = $this->getModelPage()['HintSalary'];
            $this->LabelCategory = $this->getModelPage()['LabelCategory'];
            $this->HintCategory = $this->getModelPage()['HintCategory'];
            return isset($this->getObj()['Product'])?ProductValue::fromArray($this->getObj()['Product']):array();
        },ProductValue::getKeysObject());
    }
    function getLabelName(){
        return $this->LabelName;
    }
    function getHintName(){
        return $this->HintName;
    }
    function getLabelDescreption(){
        return $this->LabelDescreption;
    }
    function getHintDescreption(){
        return $this->HintDescreption;
    }
    function getLabelSalary(){
        return $this->LabelSalary;
    }
    function getHintSalary(){
        return $this->HintSalary;
    }
    function getLabelCategory(){
        return $this->LabelCategory;
    }
    function getHintCategory(){
        return $this->HintCategory;
    }
    function makeCreateModal($view, $title, $button, $idModel = 'createModel', $index = null, $myObject = null){
        $action = 'ProductCreatePost.php';
        include('all_modal/ProductModal.php');
    }
}
$view = new Product();
foreach ($view->getMyDataView() as $index => $myObject) {
    echo <<<HTML
        <tr>
            <td>$count</td>
            <td><img id="preview" src="./asset/product/{$view->getId()}/{$index}" class="avatar-product-view"></td>
            <td>{$myObject->getName()}</td>
            <td>{$myObject->getDescreption()}</td>
            <td>{$myObject->getSalary()}</td>
            <td>{$myObject->getCategory()}</td>
            <td>
    HTML;
    include 'pis_of_page/button_edit.php';
}
?>
<script type="text/javascript">
    $(document).ready(function(){    
        $('.mysalary').on('input invalid', function() {
            if (this.validity.valueMissing)
                this.setCustomValidity('<?php echo$view->getRequiredSalary()?>');
            else if (this.value < 1 || this.value >= 1000000)
                this.setCustomValidity('<?php echo$view->getInvalidSalary()?>');
            else
                this.setCustomValidity('');
    })});
</script>