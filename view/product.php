<?php
foreach ($this->getMyDataViewProduct() as $index => $myObject) {
    include 'pis_of_page/product_part.php';
    include 'pis_of_page/button_edit.php';
}
?>
<script type="text/javascript">
    $('.mysalary').on('input invalid', function() {
        if (this.validity.valueMissing)
            this.setCustomValidity('<?php echo$this->getRequiredSalary()?>');
        else if (this.value < 1 || this.value >= 1000000)
            this.setCustomValidity('<?php echo$this->getInvalidSalary()?>');
        else
            this.setCustomValidity('');
    });
</script>