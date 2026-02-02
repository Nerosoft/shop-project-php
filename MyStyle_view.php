</head>
<body>
    <div class="start-page container">
        <table id="example" class="table table-striped">
        <thead>
            <tr>
                <th><?php echo$view->getTableId()?></th>
                <th><?php echo$view->getLanguageValue()?></th>
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
                        $title = $view->getScreenModelEdit();
                        $button = $view->getButtonModelEdit();
                        $idModel = "editModel".$count;
                        $idForm = "editForm".$count;
                        $action = 'MyStyleEditPost.php';
                        $myValue = $myObject->getName();
                        include('modal_lang_page.php');
                        $action = 'ChangeStylePost.php';
                        include('modal_changelanguage_changestyle.php');
                        echo '</td>
                        </tr>';
                        ++$count;
                    }
                ?>
                        
        </tbody>
        <tfoot>
            <tr>
                <th><?php echo$view->getTableId()?></th>
                <th><?php echo$view->getLanguageValue()?></th>
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