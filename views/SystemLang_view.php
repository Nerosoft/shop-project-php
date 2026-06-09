
<?php 
    $view = new MySystemlang($message, $type);
    if(!(isset($_GET['lang']) && isset($_GET['table'])))
        foreach ($view->getMyDataView() as $keyLanguage => $myValue)
            foreach ($myValue as $keyPage => $table)
                foreach ($table as $key => $myValue)
                    if(is_array($myValue))
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
                            $action = 'SystemLangEditPost.php?lang='.$keyLanguage.'&table='.$keyPage.'&key='.$key.'&array='.$key2;
                            include('all_modal/modal_lang_page.php');
                        }
                    else{
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
                        $action = 'SystemLangEditPost.php?lang='.$keyLanguage.'&table='.$keyPage.'&key='.$key;
                        include('all_modal/modal_lang_page.php');
                    }    
    else
        foreach ($view->getMyDataView() as $keyLanguage => $myValue) {
            if(is_array($myValue))
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
                    $action = 'SystemLangEditPost.php?lang='.$_GET['lang'].'&table='.$_GET['table'].'&key='.$keyLanguage.'&array='.$key;
                    include('all_modal/modal_lang_page.php');
                }
            else{
                echo <<<HTML
                    <tr>
                        <td>{$count}</td>
                        <td>{$myValue}</td>
                        <td>
                HTML;
                $title = $view->getScreenModelEdit();
                $button = $view->getButtonModelEdit();
                $idModel = "editModel".$count;
                $action = 'SystemLangEditPost.php?lang='.$_GET['lang'].'&table='.$_GET['table'].'&key='.$keyLanguage;
                include('all_modal/modal_lang_page.php');
            }
        }
?>
<script type="text/javascript">
    function displayForm(id, inputValue, value){
        openForm2(id);
        inputValue.val(value);
    }
</script>
