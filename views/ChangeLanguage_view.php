
<?php 
    foreach ($view->getMyDataView() as $index => $myObject) {
        $image = $index === $view->getLanguage() || $index === $view->getStyleFile()? 'fa fa-toggle-on' : 'fa fa-toggle-off';
        echo <<<HTML
            <tr>
                <td>$count</td>
                <td>{$myObject->getName()}</td>
                <td>
        HTML;
        $title = $view->getScreenModelEdit();
        $button = $view->getButtonModelEdit();
        $idModel = "editModel".$index;
        $action = 'ChangeLanguageEditPost';
        include('all_modal/modal_change_language.php');
        include('all_modal/end_model.php');
        include 'pis_of_page/button_edit.php';
    }
?>
