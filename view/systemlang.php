<?php
if(!(isset($_GET['lang']) && isset($_GET['table'])))
    foreach ($this->getMyDataView() as $keyLanguage => $myValue)
        foreach ($myValue as $keyPage => $table)
            foreach ($table as $keyabc => $myValue)
                if(is_array($myValue))
                    foreach ($myValue as $key2 => $myValue)
                    {
                        echo <<<HTML
                            <tr>
                                <td>{$this->getCount()}</td>
                                <td>{$this->getModel2()['AllNamesLanguage'][$keyLanguage]}</td>
                                <td>{$myValue}</td>
                                <td>
                        HTML;
                        
                        $title = $this->getScreenModelEdit();
                        $button = $this->getButtonModelEdit();
                        $idModel = "editModel".$this->getCount();
                        $action = 'SystemLangEditPost.php?lang='.$keyLanguage.'&table='.$keyPage.'&key='.$keyabc.'&array='.$key2;
                        include('all_modal/modal_lang_page.php');
                    }
                else{
                    echo <<<HTML
                        <tr>
                            <td>{$this->getCount()}</td>
                            <td>{$this->getModel2()['AllNamesLanguage'][$keyLanguage]}</td>
                            <td>{$myValue}</td>
                            <td>
                    HTML;
                    
                    $title = $this->getScreenModelEdit();
                    $button = $this->getButtonModelEdit();
                    $idModel = "editModel".$this->getCount();
                    $action = 'SystemLangEditPost.php?lang='.$keyLanguage.'&table='.$keyPage.'&key='.$keyabc;
                    include('all_modal/modal_lang_page.php');
                }    
else
        foreach ($this->getMyDataView() as $keyLanguage => $myValue) {
            if(is_array($myValue))
                foreach ($myValue as $key => $myValue){
                    echo <<<HTML
                        <tr>
                            <td>{$this->getCount()}</td>
                            <td>{$myValue}</td>
                            <td>
                    HTML;
                    
                    $title = $this->getScreenModelEdit();
                    $button = $this->getButtonModelEdit();
                    $idModel = "editModel".$this->getCount();
                    $action = 'SystemLangEditPost.php?lang='.$_GET['lang'].'&table='.$_GET['table'].'&key='.$keyLanguage.'&array='.$key;
                    include('all_modal/modal_lang_page.php');
                }
            else{
                echo <<<HTML
                    <tr>
                        <td>{$this->getCount()}</td>
                        <td>{$myValue}</td>
                        <td>
                HTML;
                $title = $this->getScreenModelEdit();
                $button = $this->getButtonModelEdit();
                $idModel = "editModel".$this->getCount();
                $action = 'SystemLangEditPost.php?lang='.$_GET['lang'].'&table='.$_GET['table'].'&key='.$keyLanguage;
                include('all_modal/modal_lang_page.php');
            }
        }