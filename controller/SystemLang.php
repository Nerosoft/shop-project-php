<?php
require 'auth/test_session2.php';
// require 'all_trait/ErrorSystemlang.php';
include 'interface/InterfaceDataView.php';
class MySystemlang extends ModelJson implements InterfaceDataView{
    use ErrorSystemlang;
    private $WordHint;
    private $Text;
    private $DataView;
    private $LanguageSelectAll;
    function getSelectAll(){
        return $this->LanguageSelectAll;
    }
    function __construct(){
        parent::__construct('SystemLang', function(){
            $this->initErrorSystemlang();
            $this->LanguageSelectAll = $this->getModelPage()['LanguageSelectAll'];
            $this->Text = $this->getModelPage()['Text'];
            $this->WordHint = $this->getModelPage()['WordHint'];
            if(isset($_GET['lang']) && isset($_GET['table']))
                return $this->getObj()[$_GET['lang']][$_GET['table']];
            else{
                $tableData = array();
                foreach ($this->getModel2()['AllNamesLanguage'] as $key=>$value)
                    $tableData[$key] = $this->getObj()[$key];
                return $tableData;
            }
            // else
            //     return array();
        }, !(isset($_GET['lang']) && isset($_GET['table']))?array('LanguageName', 'LanguageValue'):array('LanguageValue'));
    }
    function getText(){
        return $this->Text;
    }
    function getWordHint(){
        return $this->WordHint;
    }
}
$view = new MySystemlang();
if(!(isset($_GET['lang']) && isset($_GET['table'])))
    foreach ($view->getMyDataView() as $keyLanguage => $myValue)
        foreach ($myValue as $keyPage => $table)
            foreach ($table as $keyabc => $myValue)
                if(is_array($myValue))
                    foreach ($myValue as $key2 => $myValue)
                    {
                        echo <<<HTML
                            <tr>
                                <td>{$view->getCount()}</td>
                                <td>{$view->getModel2()['AllNamesLanguage'][$keyLanguage]}</td>
                                <td>{$myValue}</td>
                                <td>
                        HTML;
                        
                        $title = $view->getScreenModelEdit();
                        $button = $view->getButtonModelEdit();
                        $idModel = "editModel".$view->getCount();
                        $action = 'SystemLangEditPost.php?lang='.$keyLanguage.'&table='.$keyPage.'&key='.$keyabc.'&array='.$key2;
                        include('all_modal/modal_lang_page.php');
                    }
                else{
                    echo <<<HTML
                        <tr>
                            <td>{$view->getCount()}</td>
                            <td>{$view->getModel2()['AllNamesLanguage'][$keyLanguage]}</td>
                            <td>{$myValue}</td>
                            <td>
                    HTML;
                    
                    $title = $view->getScreenModelEdit();
                    $button = $view->getButtonModelEdit();
                    $idModel = "editModel".$view->getCount();
                    $action = 'SystemLangEditPost.php?lang='.$keyLanguage.'&table='.$keyPage.'&key='.$keyabc;
                    include('all_modal/modal_lang_page.php');
                }    
else
        foreach ($view->getMyDataView() as $keyLanguage => $myValue) {
            if(is_array($myValue))
                foreach ($myValue as $key => $myValue){
                    echo <<<HTML
                        <tr>
                            <td>{$view->getCount()}</td>
                            <td>{$myValue}</td>
                            <td>
                    HTML;
                    
                    $title = $view->getScreenModelEdit();
                    $button = $view->getButtonModelEdit();
                    $idModel = "editModel".$view->getCount();
                    $action = 'SystemLangEditPost.php?lang='.$_GET['lang'].'&table='.$_GET['table'].'&key='.$keyLanguage.'&array='.$key;
                    include('all_modal/modal_lang_page.php');
                }
            else{
                echo <<<HTML
                    <tr>
                        <td>{$view->getCount()}</td>
                        <td>{$myValue}</td>
                        <td>
                HTML;
                $title = $view->getScreenModelEdit();
                $button = $view->getButtonModelEdit();
                $idModel = "editModel".$view->getCount();
                $action = 'SystemLangEditPost.php?lang='.$_GET['lang'].'&table='.$_GET['table'].'&key='.$keyLanguage;
                include('all_modal/modal_lang_page.php');
            }
        }
?>