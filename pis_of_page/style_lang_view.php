<?php
foreach ($valueDataView??$this->getMyLanguage() as $index => $myObject) {
    $image = $index === $this->getLanguage() || $index === $this->getStyleFile()? 'fa fa-toggle-on' : 'fa fa-toggle-off';
    echo <<<HTML
        <tr>
            <td>{$this->getCount()}</td>
            <td>{$myObject->getName()}</td>
            <td>
    HTML;
    $title = $this->getScreenModelEdit();
    $button = $this->getButtonModelEdit();
    $idModel = "editModel".$index;
    $action = 'ChangeLanguageEditPost?id='.$this->getUrlName2();
    include('all_modal/modal_change_language.php');
    include('all_modal/end_model.php');
    include 'pis_of_page/button_edit.php';
}