</head>
<body>
    <div class="start-page container">
        <table id="example" class="table table-striped" >
        <thead>
            <tr>
                <th><?php echo$view->getTableId()?></th>
                <?php if(!(isset($_GET['lang']) && isset($_GET['table'])))echo'<th>'.$view->getLanguageName().'</th>'?>
                <th><?php echo$view->getLanguageValue()?></th>
                <th><?php echo$view->getTabelEvent()?></th>
            </tr>
        </thead>
        <tbody>
           
                <?php 
                
                    $count = 1;
                    foreach ($view->getMyDataView() as $keyLanguage => $myValue) {
                        if(!(isset($_GET['lang']) && isset($_GET['table'])) && is_array($myValue)){
                            foreach ($myValue as $keyPage => $table) {
                                foreach ($table as $key => $myValue)
                                {
                                    if(is_array($myValue)){
                                        foreach ($myValue as $key2 => $myValue)
                                        {
                                            echo <<<HTML
                                                <tr>
                                                    <td>{$count}</td>
                                                    <td>{$view->getModel2()['AllNamesLanguage'][$keyLanguage]}</td>
                                                    <td>{$myValue}</td>
                                                    <td>
                                            HTML;
                                            
                                            $title = $view->getScreenModelEdit();
                                            $button = $view->getButtonModelEdit();
                                            $idModel = "editModel".$count;
                                            $idForm = "editForm".$count;
                                            $action = 'SystemLangEditPost.php?lang='.$keyLanguage.'&table='.$keyPage.'&key='.$key.'&array='.$key2;
                                            include('modal_lang_page.php');
                                            echo '</td></tr>';
                                            $count++;
                                        }
                                    }else{
                                        echo <<<HTML
                                            <tr>
                                                <td>{$count}</td>
                                                <td>{$view->getModel2()['AllNamesLanguage'][$keyLanguage]}</td>
                                                <td>{$myValue}</td>
                                                <td>
                                        HTML;
                                        
                                        $title = $view->getScreenModelEdit();
                                        $button = $view->getButtonModelEdit();
                                        $idModel = "editModel".$count;
                                        $idForm = "editForm".$count;
                                        $action = 'SystemLangEditPost.php?lang='.$keyLanguage.'&table='.$keyPage.'&key='.$key;
                                        include('modal_lang_page.php');
                                        echo '</td></tr>';
                                        $count++;
                                    }
                                }

                            }
                        }else if(is_array($myValue)){

                            foreach ($myValue as $key => $myValue){
                                echo <<<HTML
                                    <tr>
                                        <td>{$count}</td>
                                        <td>{$myValue}</td>
                                        <td>
                                HTML;
                                
                                $title = $view->getScreenModelEdit();
                                $button = $view->getButtonModelEdit();
                                $idModel = "editModel".$count;
                                $idForm = "editForm".$count;
                                $action = 'SystemLangEditPost.php?lang='.$_GET['lang'].'&table='.$_GET['table'].'&key='.$keyLanguage.'&array='.$key;
                                include('modal_lang_page.php');
                                echo '</td></tr>';
                                $count++;
                            }


                        }else{
                            echo <<<HTML
                                <tr>
                                    <td>{$count}</td>
                                    <td>{$myValue}</td>
                                    <td>
                            HTML;
                            $title = $view->getScreenModelEdit();
                            $button = $view->getButtonModelEdit();
                            $idModel = "editModel".$count;
                            $idForm = "editForm".$count;
                            $action = 'SystemLangEditPost.php?lang='.$_GET['lang'].'&table='.$_GET['table'].'&key='.$keyLanguage;
                            include('modal_lang_page.php');
                            echo '</td></tr>';
                            $count++;
                        }
                    }
                ?>
            
                        
        </tbody>
        <tfoot>
            <tr>
                <th><?php echo$view->getTableId()?></th>
                <?php if(!(isset($_GET['lang']) && isset($_GET['table'])))echo'<th>'.$view->getLanguageName().'</th>'?>
                <th><?php echo$view->getLanguageValue()?></th>
                <th><?php echo$view->getTabelEvent()?></th>
            </tr>
        </tfoot>
    </table>
    </div>
<script type="text/javascript">
    let setting = [
        { 'searchable': true, className: "text-left" },
        <?php if(!(isset($_GET['lang']) && isset($_GET['table'])))echo'{ "searchable": true, className: "text-left" },'?>
        { 'searchable': true, className: "text-left" },
        { 'searchable': false }
    ];
    function displayForm(id, inputValue, value){
        removeClass(id);
        openForm(id);
        inputValue.val(value);
    }
</script>

<?php 
include 'end_html.php';?>