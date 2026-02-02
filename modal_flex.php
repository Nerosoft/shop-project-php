<!-- Modal -->
<?php 
include('start_model.php');
if(isset($index))
    include('my_id.php');
foreach($myObject??$view->getHint() as $key=>$value){
    $inputValue = isset($index)?$value:'';
    echo <<<HTML
        <div class="mb-3">
            <label for="name" class="form-label">{$view->getLabel()[$key]}</label>
            <input 
            title="{$view->getHint()[$key]}"
            minlength="3" 
            required
            oninvalid="handleInput(this ,'{$view->getErrorsMessageReq()[$key]}', '{$view->getErrorsMessageInv()[$key]}')"
            oninput="handleInput(this ,'{$view->getErrorsMessageReq()[$key]}', '{$view->getErrorsMessageInv()[$key]}')"
            type="text" id="{$key}" class="form-control" name="{$key}" value="{$inputValue}" placeholder="{$view->getHint()[$key]}">
        </div>
    HTML;
}
?>
<?php 
include('end_model.php');
?>