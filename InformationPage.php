<?php
require 'ModelJson.php';
require 'MyLanguage.php';
class InformationPage extends ModelJson{
    private $Title;
    function __construct($IdPage, $message, $type){
        parent::__construct($IdPage);
        $this->Title = $this->getModelPage()['Title'];
        include 'start_html.php';
        if($IdPage === 'Site' || $IdPage === 'Login' || $IdPage === 'Register'){
            echo $IdPage === 'Site'? 
                '<link rel="stylesheet" href="./asset/css/site/font-awesome.min.css">
                <link rel="stylesheet" href="./asset/css/site/aos.css">
                <link rel="stylesheet" href="./asset/css/site/owl.carousel.min.css">
                <!-- MAIN CSS -->
                <link rel="stylesheet" href="./asset/css/site/templatemo-digital-trend.css">' : 
                '<link href="./asset/css/login_register.css" rel="stylesheet">';
            $this->initErrorActiveStyleLang();
            if($IdPage === 'Login')
                $this->InitCheckbooksState($this->getModelPage());
        }else{
            if($IdPage === 'Users')
                $this->InitCheckbooksState($this->getModelPage());
            else if($IdPage === 'ChangeLanguage' || $IdPage === 'MyStyle' || $IdPage === 'Branches'){
                if($IdPage === 'ChangeLanguage' || $IdPage === 'MyStyle')
                    $this->InitInfoChangeLangStyle($this->getModelPage(), array_reverse(MyLanguage::fromArray($this->getModel2()[$IdPage === 'ChangeLanguage'?'AllNamesLanguage':'Style'])), $this->getModel2()['AllNamesLanguage']);
                $this->initChangeStyleLangBranch($this->getModelPage());
            }
            echo '<link href="./asset/lib/dataTables.bootstrap5.css" rel="stylesheet">
            <script src="./asset/lib/dataTables.js" type="text/javascript"></script>
            <script src="./asset/lib/dataTables.bootstrap5.js" type="text/javascript"></script>';
        }

        echo '</head><body>';
        $this->showToast($this->getModelPage()[$message]??$message, $type);
    }
    function getTitle(){
        return $this->Title;
    }
    function setTitle($title){
        return $this->Title = $title;
    }
}