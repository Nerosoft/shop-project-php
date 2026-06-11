<?php 
    $view = new Product($message, $type);
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
        // $action = 'SettingUsersDeletePost?id='.$view->getUrlName2();
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