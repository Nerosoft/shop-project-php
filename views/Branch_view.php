
    <?php $view = new MyBranch($message, $type);?>
    <div class="start-page container">
        <?php
           
            include 'pis_of_page/button_create.php';
            $title = $view->getScreenModelCreate();
            $button = $view->getButtonModelAdd();
            $action = 'BranchCreatePost.php';
            include('all_modal/model_branch.php');
            
        ?>
        <table id="example" class="table table-striped" >
        <thead>
            <tr>
                <th><?php echo$view->getTableId()?></th>
                <th><?php echo$view->getBranchName()?></th>
                <th><?php echo$view->getBranchPhone()?></th>
                <th><?php echo$view->getBranchGovernments()?></th>
                <th><?php echo$view->getBranchCity()?></th>
                <th><?php echo$view->getBranchStreet()?></th>
                <th><?php echo$view->getBranchBuilding()?></th>
                <th><?php echo$view->getBranchAddress()?></th>
                <th><?php echo$view->getBranchCountry()?></th>
                <th><?php echo$view->getBranchFollow()?></th>
                <th><?php echo$view->getTabelEvent()?></th>
            </tr>
        </thead>
        <tbody>
           
                <?php 
                
                    $count = 1;
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
                        $title = $view->getScreenModelEdit();
                        $button = $view->getButtonModelEdit();
                        $idModel = "editModel".$index;
                        $action = 'BranchEditPost.php';
                        include('all_modal/model_branch.php');
                        include 'pis_of_page/button_edit.php';
                    }
                ?>
            
                        
        </tbody>
        <tfoot>
            <tr>
                <th><?php echo$view->getTableId()?></th>
                <th><?php echo$view->getBranchName()?></th>
                <th><?php echo$view->getBranchPhone()?></th>
                <th><?php echo$view->getBranchGovernments()?></th>
                <th><?php echo$view->getBranchCity()?></th>
                <th><?php echo$view->getBranchStreet()?></th>
                <th><?php echo$view->getBranchBuilding()?></th>
                <th><?php echo$view->getBranchAddress()?></th>
                <th><?php echo$view->getBranchCountry()?></th>
                <th><?php echo$view->getBranchFollow()?></th>
                <th><?php echo$view->getTabelEvent()?></th>
            </tr>
        </tfoot>
    </table>
    </div>
<script type="text/javascript">
    let setting = [
        { 'searchable': true, className: "text-left" },
        { 'searchable': true, className: "text-left" },
        { 'searchable': true, className: "text-left" },
        { 'searchable': true, className: "text-left" },
        { 'searchable': true, className: "text-left" },
        { 'searchable': true, className: "text-left" },
        { 'searchable': true, className: "text-left" },
        { 'searchable': true, className: "text-left" },
        { 'searchable': true, className: "text-left" },
        { 'searchable': true, className: "text-left" },
        { 'searchable': false }
    ];
</script>