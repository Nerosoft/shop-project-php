<?php 
    $view = new MySettingUsers($message, $type);
    foreach ($view->getMyDataView() as $index => $myObject) {
        echo <<<HTML
            <tr>
                <td>$count</td>
                <td>{$myObject->getName()}</td>
                <td>***************</td>
                <td>***************</td>
                <td>
            HTML;
            // $action = 'SettingUsersDeletePost?id='.$view->getUrlName2();
            include 'pis_of_page/button_edit.php';

    }
?>