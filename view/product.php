<?php
foreach ($this->getMyDataView() as $index => $myObject) {
    echo <<<HTML
        <tr>
            <td>{$this->getCount()}</td>
            <td><img id="preview" src="./asset/product/{$this->getId()}/{$index}" class="avatar-product-view"></td>
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
    $('.mysalary').on('input invalid', function() {
        if (this.validity.valueMissing)
            this.setCustomValidity('<?php echo$this->getRequiredSalary()?>');
        else if (this.value < 1 || this.value >= 1000000)
            this.setCustomValidity('<?php echo$this->getInvalidSalary()?>');
        else
            this.setCustomValidity('');
    });
</script>