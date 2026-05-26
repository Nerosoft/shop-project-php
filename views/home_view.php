
    <?php $view = $view??new MyHome($message, $type);?>
    <div class="start-page container">
        <button class="btn btn-primary" onClick="openForm('#createModel')"><?php echo $view->getButtonModelCreate()?></button>
        <?php
            $title = $view->getScreenModelCreate();
            $button = $view->getButtonModelAdd();
            $action = 'HomeCreatePost.php';
            include('all_modal/modal_custome_table.php');
            echo <<<HTML
                <div class="form-group">
                    <label for="lang_name" class="form-label">{$view->getLabelInputNumber()}</label>
                    <input 
                    title='{$view->getHintInputNumber()}'
                    min="1" 
                    max="8" 
                    required
                    type="number" name="input_number" id="input_number"  placeholder='{$view->getHintInputNumber()}' class="form-control">
                </div>
            HTML;
            include('all_modal/end_model.php');
        ?>
        <table id="example" class="table table-striped" >
        <thead>
            <tr>
                <th><?php echo$view->getTableId()?></th>
                <th><?php echo$view->getTableName()?></th>
                <th><?php echo$view->getTabelEvent()?></th>
            </tr>
        </thead>
        <tbody>
           
                <?php 
                
                    $count = 1;
                    foreach ($view->getMyDataView() as $index => $myObject) {
                        echo <<<HTML
                            <tr>
                                <td>$count</td>
                                <td>{$myObject->getName()}</td>
                                <td>
                        HTML;
                        $action = 'HomeDeletePost.php';
                        include('all_modal/modal_delete.php');
                        $title = $view->getScreenModelEdit();
                        $button = $view->getButtonModelEdit();
                        $action = 'HomeEditPost.php';
                        $idModel = "editModel".$index;
                        // $idForm = "editForm".$index;
                        include('all_modal/modal_custome_table.php');
                        include('all_modal/end_model.php');
                        echo <<<HTML
                                <i class="fa fa-sliders fa-2x pointer" 
                                onclick="displayEditForm('#{$idModel}', '{$myObject->getName()}')"></i>
                                </td>
                            </tr>
                        HTML;
                        ++$count;
                    }
                ?>
            
                        
        </tbody>
        <tfoot>
            <tr>
                <th><?php echo$view->getTableId()?></th>
                <th><?php echo$view->getTableName()?></th>
                <th><?php echo$view->getTabelEvent()?></th>
            </tr>
        </tfoot>
    </table>
    </div>
<script type="text/javascript">
    let setting = [
        { 'searchable': true, className: "text-left" },
        { 'searchable': true, className: "text-left" },
        { 'searchable': false }
    ];
    function displayEditForm(id, name){
        removeClass(id);
        openForm(id);
        $(id).find('#name').val(name);
    }
    $('#input_number').on('input invalid', function() {
        if (this.validity.valueMissing)
            this.setCustomValidity('<?php echo$view->getInputNumberTableIsReq()?>');
        else if (this.value < 1 || this.value > 8)
            this.setCustomValidity('<?php echo$view->getInputNumberTableIsInv()?>');
        else
            this.setCustomValidity('');
    });
</script>