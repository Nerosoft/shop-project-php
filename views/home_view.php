<?php 
    $view = new MyHome($message, $type);
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
        include('all_modal/modal_custome_table.php');
        include('all_modal/end_model.php');
        include 'pis_of_page/button_edit.php';
    }
?>                       
<script type="text/javascript">
$(document).ready(function(){    
    $('#input_number').on('input invalid', function() {
        if (this.validity.valueMissing)
            this.setCustomValidity('<?php echo$view->getInputNumberTableIsReq()?>');
        else if (this.value < 1 || this.value > 8)
            this.setCustomValidity('<?php echo$view->getInputNumberTableIsInv()?>');
        else
            this.setCustomValidity('');
    })});
</script>