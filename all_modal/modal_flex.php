<!-- Modal -->
<?php 
include('start_model.php');
include('pis_of_page/image_table_product.php');
foreach($myObject??$this->getHint() as $key=>$value){
    $inputValue = isset($index) && $index !== null?$value:'';
    echo <<<HTML
        <div class="mb-3">
            <i class="fa fa-font fa-2x"></i>
            <label for="name" class="form-label">{$this->getLabel()[$key]}</label>
            <input 
            title="{$this->getHint()[$key]}"
            minlength="3" 
            required
            oninvalid="handleInput(this ,'{$this->getErrorsMessageReq()[$key]}', '{$this->getErrorsMessageInv()[$key]}')"
            oninput="handleInput(this ,'{$this->getErrorsMessageReq()[$key]}', '{$this->getErrorsMessageInv()[$key]}')"
            type="text" id="{$key}" class="form-control" name="{$key}" value="{$inputValue}" placeholder="{$this->getHint()[$key]}">
        </div>
    HTML;
}
?>
<?php 
include('end_model.php');
?>