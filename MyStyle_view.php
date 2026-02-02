</head>
<body>
    <div class="start-page container">
        <table id="example" class="table table-striped">
        <thead>
            <tr>
                <th><?php echo$view->getTableId()?></th>
                <th><?php echo$view->getNameLangaue()?></th>
                <th><?php echo$view->getTabelEvent()?></th>
            </tr>
        </thead>
        <tbody>
           <?php
                    $count = 1;
                    foreach ($view->getMyDataView() as $index => $myObject) {
                        $image = $index === $view->getStyleFile() ? 'lightbulb-fill.svg' : 'lightbulb.svg';
                        echo <<<HTML
                            <tr>
                                <td>$count</td>
                                <td>{$myObject->getName()}</td>
                                <td>
                                
                        HTML;
                        $action = 'ChangeStylePost.php';
                        include('modal_changelanguage_changestyle.php');
                        $title = $view->getScreenModelEdit();
                        $button = $view->getButtonModelEdit();
                        $idModel = "editModel".$index;
                        $idForm = "editForm".$index;
                        $action = 'MyStyleEditPost';
                        include('modal_change_language.php');

                     
                        echo <<<HTML
                                    <img class="style_icon_menu pointer"
                                    src="./asset/lib/icons/wrench-adjustable.svg"
                                    onclick="displayEditForm('#{$idModel}', '{$myObject->getName()}')"/>
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
                <th><?php echo$view->getNameLangaue()?></th>
                <th><?php echo$view->getTabelEvent()?></th>
            </tr>
        </tfoot>
    </table>
    </div>
<script type="text/javascript">
    let setting = [
        { 'searchable': true, className: "text-left" },
        { 'searchable': true, className: "text-left" },
        { 'searchable': false }
    ];
</script>
<?php 
include 'javascript_language_style.php';
include 'end_html.php';?>