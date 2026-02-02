</head>
<body>
    <div class="start-page container">
        <button class="btn btn-primary" onClick="openForm('#createModel')"><?php echo $view->getButtonModelCreate()?></button>
        <?php
            $title = $view->getScreenModelCreate();
            $button = $view->getButtonModelAdd();
            $action = 'FlexTablesCreatePost?id='.$_GET['id'];
            include('modal_flex.php');
        ?>
        <table id="example" class="table table-striped" >
        <thead>
            <tr>
                <th><?php echo$view->getTableId()?></th>
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
                        HTML;
                        foreach ($myObject as $key => $item)
                            echo <<<HTML
                            <td>{$item}</td>
                            HTML;  
                        echo <<<HTML
                            <td>
                            HTML;
                        $nameItem = $myObject[array_key_first($myObject)];
                        $action = 'FlexTablesDeletePost?id='.$_GET['id'];
                        include('modal_delete.php');
                        $title = $view->getScreenModelEdit();
                        $button = $view->getButtonModelEdit();
                        $idModel = "editModel".$index;
                        $idForm = "editForm".$index;
                        $action = 'FlexTablesEditPost?id='.$_GET['id'];
                        include('modal_flex.php');
                        echo <<<HTML
                                    <img class="style_icon_menu pointer"
                                    src="./asset/lib/icons/wrench-adjustable.svg"
                                    onclick="displayEditForm('#{$idModel}', '{$index}') "/>
                                </td>
                            </tr>
                        HTML;
                        ++$count;
                    }
                ?>
            
                        
        </tbody>
        <tfoot>
            <tr>
                <th><?php echo$view->getTableId()?></th>
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
    let setting = [{ 'searchable': true, className: "text-left" }];
    for (let index = 0; index < <?php echo count($view->getTableHead())?>; index++)
        setting.push({ 'searchable': true, className: "text-left" });
    setting.push({ 'searchable': false, className: "text-left" });
    function displayEditForm(id, keyObj){
        removeClass(id);
        openForm(id);
        let myObj = <?php echo json_encode($view->getMyDataView())?>;
        for (const key in myObj[keyObj]) 
            $(id).find('#'+key).val(myObj[keyObj][key]);
    }
</script>
<?php include 'end_html.php'?>