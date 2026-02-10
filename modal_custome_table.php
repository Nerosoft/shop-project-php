<!-- Modal -->
<?php 
include('start_model.php');
if(isset($index))
    include('my_id.php');
include 'modal_custome_table_input_name.php';
if(!isset($index))
    echo <<<HTML
        <div class="form-group">
            <label for="lang_name" class="form-label">{$view->getLabelInputNumber()}</label>
            <input 
            min="1" 
            max="8" 
            required
            type="number" name="input_number" id="input_number"  placeholder='{$view->getHintInputNumber()}' class="form-control">
        </div>
    HTML;
include('end_model.php');
?>