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
        $nameItem = $myObject[array_key_first($myObject)];
        // $action = 'SettingUsersDeletePost?id='.$_GET['id'];
        include 'pis_of_page/button_edit.php';
    }
?>
            