
    <?php $view = new MySettingUsers($message, $type);?>
    <div class="start-page container">
        <?php
            include 'pis_of_page/button_create.php';
            $title = $view->getScreenModelCreate();
            $button = $view->getButtonModelAdd();
            $action = 'SettingUsersCreatePost.php';
            include('all_modal/modal_setting_users_table.php');
        ?>
        <table id="example" class="table table-striped" >
        <thead>
            <tr>
                <th><?php echo$view->getTableId()?></th>
                <th><?php echo$view->getNameHeadTable()?></th>
                <th><?php echo$view->getPasswordHeadTable()?></th>
                <th><?php echo$view->getForgetPasswordHeadTable()?></th>
                <th><?php echo$view->getTabelEvent()?></th>
            </tr>
        </thead>
        <tbody>
           
                <?php 
                
                    $count = 1;
                    foreach ($view->getMyDataView() as $index => $myObject) {
                        echo <<<HTML
                            <tr>
                                <td>$count</td>
                                <td>{$myObject->getName()}</td>
                                <td>***************</td>
                                <td>***************</td>
                                <td>
                            HTML;
                            $action = 'SettingUsersDeletePost?id='.$view->getUrlName2();
                            include('all_modal/modal_delete.php');
                            $title = $view->getScreenModelEdit();
                            $button = $view->getButtonModelEdit();
                            $action = 'SettingUsersCreatePost.php';
                            $idModel = "editModel".$index;
                            include('all_modal/modal_setting_users_table.php');
                            include 'pis_of_page/button_edit.php';

                    }
                ?>
            
                        
        </tbody>
        <tfoot>
            <tr>
                <th><?php echo$view->getTableId()?></th>
                <th><?php echo$view->getNameHeadTable()?></th>
                <th><?php echo$view->getPasswordHeadTable()?></th>
                <th><?php echo$view->getForgetPasswordHeadTable()?></th>
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
        { 'searchable': false }
    ];
</script>
