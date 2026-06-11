<?php 
    $view = new MyBranch($message, $type);
    foreach ($view->getMyDataView() as $index => $myObject) {
        $image = $index === $view->getId() ? 'fa fa-toggle-on' : 'fa fa-toggle-off';
        echo <<<HTML
            <tr>
                <td>$count</td>
                <td>{$myObject->getName()}</td>
                <td>{$myObject->getPhone()}</td>
                <td>{$myObject->getGovernments()}</td>
                <td>{$myObject->getCity()}</td>
                <td>{$myObject->getStreet()}</td>
                <td>{$myObject->getBuilding()}</td>
                <td>{$myObject->getAddress()}</td>
                <td>{$myObject->getCountry()}</td>
                <td>{$myObject->getFollowId()}</td>
                <td>
        HTML;
        if($view->getId() !== $index && $index !== $view->getFixedId()){
            $action = 'BranchDeletePost.php';
            include('all_modal/modal_delete.php');
        }
        $action = 'BranchChangePost.php';
        include('all_modal/modal_changelanguage_changestyle.php');
        include 'pis_of_page/button_edit.php';
    }
?>