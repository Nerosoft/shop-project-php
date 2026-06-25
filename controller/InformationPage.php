<?php
require 'class_object/MyLanguage.php';
require 'class_object/BranchClass.php';
class InformationPage extends ModelJson{
    private $Title;
    private $Message;
    private $Type;
    private $styleLangAction;

    private $ChangeLang;
    private $ModelTitle;
    private $ModelButton;
    private $MyLanguage;

    private $ChangeStyle;
    private $ModalTitleStyle;
    private $ModalButtonStyle;
    private $Style;

    private $ActiveBranch;
    private $ChangeTitleBranch;
    private $ChangeButtonBranch;
    function getActiveBranch(){
        return $this->ActiveBranch;
    }
    function getChangeTitleBranch(){
        return $this->ChangeTitleBranch;
    }
    function getChangeButtonBranch(){
        return $this->ChangeButtonBranch;
    }
    function getMyBranch(){
        return Branch::fromArray($this->getBranch(), $this->getModel2()['SelectBranchBox']);
    }
    function getMyLanguage(){
        return $this->MyLanguage;
    }
    function getStyle(){
        return $this->Style;
    }
    function getModalButtonStyle(){
        return $this->ModalButtonStyle;
    }
    function getModalTitleStyle(){
        return $this->ModalTitleStyle;
    }
    function getModelButton(){
        return $this->ModelButton;
    }
    function getModelTitle(){
        return $this->ModelTitle;
    }
    function getChangeLang(){
        return $this->ChangeLang;
    }
    function getChangeStyle(){
        return $this->ChangeStyle;
    }

    function getMessage(){
        return $this->Message;
    }
    function getType(){
        return $this->Type;
    }
    function getActionStyleLang(){
        return $this->styleLangAction;
    }
    function setActionStyleLang($value){
        $this->styleLangAction = $value;
    }
    function __construct($IdPage, $message, $type, $action = 'ChangeLangPost.php'){
        parent::__construct($IdPage);
        if(isset($_GET['id']) && !isset($_SESSION['userId']))
            setcookie('branchId', $_GET['id'], time()+2628000);
        $this->styleLangAction = $action;
        $this->ActiveBranch = $this->getModelPage()['ActiveBranch'];
        $this->ChangeTitleBranch = $this->getModelPage()['ChangeTitleBranch'];
        $this->ChangeButtonBranch = $this->getModelPage()['ChangeButtonBranch'];
        
        $this->ChangeLang = $this->getModelPage()['UsedLanguage'];
        $this->ModelTitle = $this->getModelPage()['ModelTitle'];
        $this->ModelButton = $this->getModelPage()['ModelButton'];
        $this->MyLanguage = MyLanguage::fromArray($this->getModel2()['AllNamesLanguage']);
        
        $this->ChangeStyle = $this->getModelPage()['UsedStyle'];
        $this->ModalTitleStyle = $this->getModelPage()['ModalTitleStyle'];
        $this->ModalButtonStyle = $this->getModelPage()['ModalButtonStyle'];
        $this->Style = MyLanguage::fromArray($this->getModel2()['Style']);

        $this->Message = $this->getModelPage()[$message]??$message;
        $this->Type = $type;
        $this->Title = $this->getModelPage()['Title'];
        echo<<<HTML
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>{$this->getTitle()}</title>
            <link href="./asset/css/style.css" rel="stylesheet">
            <link href="./asset/lib/bootstrap.min.css" rel="stylesheet">
            <script src="./asset/lib/jquery.min.js" type="text/javascript"></script>
            <script src="./asset/lib/bootstrap.bundle.min.js" type="text/javascript"></script>
            <script src="./asset/js/script.js" type="text/javascript"></script>
            <link href="./asset/css/{$this->getStyleFile()}.css" rel="stylesheet">
            <link rel="stylesheet" href="./asset/css/font-awesome.min.css">
        HTML;
    }
    function getTitle(){
        return $this->Title;
    }
    function setTitle($title){
        return $this->Title = $title;
    }
}