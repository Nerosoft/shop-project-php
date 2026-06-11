<?php 
    $view = new MyFlexTablesView($message, $type);
    foreach ($view->getMyDataView() as $index => $myObject) {
        echo <<<HTML
            <tr>
                <td>$count</td>
                <td><img id="preview" src="./asset/product/{$view->getId()}/{$index}" class="avatar-product-view"></td>
        HTML;
        foreach ($myObject as $key => $item)
            echo <<<HTML
            <td>{$item}</td>
            HTML;  
        echo <<<HTML
            <td>
            HTML;
        include('all_modal/ViewImage.php');
        $nameItem = $myObject[array_key_first($myObject)];
        $action = 'SettingUsersDeletePost?id='.$_GET['id'];
        include('all_modal/modal_delete.php');
        include 'pis_of_page/button_edit.php';
    }
?>
            