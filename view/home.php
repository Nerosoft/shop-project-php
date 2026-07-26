<?php
foreach ($this->getMyDataView() as $index => $myObject) {
    echo <<<HTML
        <tr>
            <td>{$this->getCount()}</td>
            <td>{$myObject->getName()}</td>
            <td>
    HTML;
    $title = $this->getScreenModelEdit();
    $button = $this->getButtonModelEdit();
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
            this.setCustomValidity('<?php echo$this->getInputNumberTableIsReq()?>');
        else if (this.value < 1 || this.value > 8)
            this.setCustomValidity('<?php echo$this->getInputNumberTableIsInv()?>');
        else
            this.setCustomValidity('');
    })});
</script>