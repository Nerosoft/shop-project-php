
    <?php $view = new MyFlexTablesView($message, $type);?>
    <div class="start-page container">
        <?php
            include 'pis_of_page/button_create.php';
            $title = $view->getScreenModelCreate();
            $button = $view->getButtonModelAdd();
            $action = 'FlexTablesCreatePost?id='.$_GET['id'];
            include('all_modal/modal_flex.php');
        ?>
        <table id="example" class="table table-striped" >
        <thead>
            <tr>
                <th><?php echo$view->getTableId()?></th>
                <th><?php echo $view->getTableProductImage()?></th>
                <?php 
                    foreach($view->getTableHead() as $index=>$name)
                        echo<<<HTML
                            <th>{$name}</th>
                            HTML;
                ?>
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
                        $title = $view->getScreenModelEdit();
                        $button = $view->getButtonModelEdit();
                        $idModel = "editModel".$index;
                        $action = 'FlexTablesCreatePost?id='.$_GET['id'];
                        include('all_modal/modal_flex.php');
                        include 'pis_of_page/button_edit.php';
                    }
                ?>
            
                        
        </tbody>
        <tfoot>
            <tr>
                <th><?php echo$view->getTableId()?></th>
                <th><?php echo $view->getTableProductImage()?></th>
                <?php 
                    foreach($view->getTableHead() as $index=>$name)
                        echo<<<HTML
                            <th>{$name}</th>
                            HTML;
                ?>
                <th><?php echo$view->getTabelEvent()?></th>
            </tr>
        </tfoot>
    </table>
    </div>
<script type="text/javascript">
    let setting = [];
    for (let index = -3; index < <?php echo count($view->getTableHead())?>; index++)
        setting.push({ 'searchable': true, className: "text-left table-avatar" });
</script>