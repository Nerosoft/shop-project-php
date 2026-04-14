<?php
require 'InformationPage.php';
require 'DeleteInfoName.php';
require 'ProductValue.php';
class Site extends InformationPage{
    private $DataView;
    private $About;
    private $Product;
    private $Contact;
    private $BranchesLanguage;
    private $BranchesStyle;
    private $NavTitle;
    private $BranchesCompany;
    private $TitleHome;
    private $Menu;
    private $Phone;
    private $TheBest;
    private $DeliveryMarketing;
    private $Sirs;
    private $AboutMe;
    private $Look;
    private $Trends;
    private $ClientTestimonials;
    private $ClientTestimonialsInfo;
    private $ClientNeroSoft;
    private $ClientPos;
    private $brands;
    private $Creative;
    private $Only;
    private $ContactInfo;
    private $ContactInfoPhone;
    private $ContactInfoEmail;
    private $OurWork;
    private $OurWorkInfo;
    private $Copyright;
    private $Company;
    private $Design;
    function __construct($message = 'LoadMessage', $type = 'success'){
        parent::__construct('Site');
        $this->DataView = isset($this->getObj()['Product'])?ProductValue::fromArray($this->getObj()['Product']):array();
        echo<<<HTML
        <link rel="stylesheet" href="./asset/css/site/font-awesome.min.css">
        <link rel="stylesheet" href="./asset/css/site/aos.css">
        <link rel="stylesheet" href="./asset/css/site/owl.carousel.min.css">
        <link rel="stylesheet" href="./asset/css/site/owl.theme.default.min.css">
        <!-- MAIN CSS -->
        <link rel="stylesheet" href="./asset/css/site/templatemo-digital-trend.css">
        </head>
        <body>
        HTML;
        $this->showToast($this->getModelPage()[$message]??$message, $type);
        $this->initEvent('createModel', 'createForm', $this->getLanguage(), $this->getModelPage()['ErrorActiveLang'], $this->getModelPage()['TitleModalLang'], $this->getModelPage()['ButtonActiveLang'], 'lang', MyLanguage::fromArray($this->getModel2()['AllNamesLanguage']));
        $this->initEvent('style_modal', 'style_form', $this->getStyleFile(), $this->getModelPage()['ErrorActiveStyle'], $this->getModelPage()['TitleModalStyle'], $this->getModelPage()['ButtonActiveStyle'], 'style', MyLanguage::fromArray($this->getModel2()['Style']));
        $this->initScriptStyleLang();
        $this->About = $this->getModelPage()['About'];
        $this->Product = $this->getModelPage()['Product'];
        $this->Contact = $this->getModelPage()['Contact'];
        $this->BranchesLanguage = $this->getModelPage()['BranchesLanguage'];
        $this->BranchesStyle = $this->getModelPage()['BranchesStyle'];
        $this->NavTitle = $this->getModelPage()['NavTitle'];
        $this->BranchesCompany = $this->getModelPage()['BranchesCompany'];
        $this->TitleHome = $this->getModelPage()['TitleHome'];
        $this->Menu = $this->getModelPage()['Menu'];
        $this->Phone = $this->getModelPage()['Phone'];
        $this->TheBest = $this->getModelPage()['TheBest'];
        $this->DeliveryMarketing = $this->getModelPage()['DeliveryMarketing'];
        $this->Sirs = $this->getModelPage()['Sirs'];
        $this->AboutMe = $this->getModelPage()['AboutMe'];
        $this->Look = $this->getModelPage()['Look'];
        $this->Trends = $this->getModelPage()['Trends'];
        $this->ClientTestimonials = $this->getModelPage()['ClientTestimonials'];
        $this->ClientTestimonialsInfo = $this->getModelPage()['ClientTestimonialsInfo'];
        $this->ClientNeroSoft = $this->getModelPage()['ClientNeroSoft'];
        $this->ClientPos = $this->getModelPage()['ClientPos'];
        $this->brands = $this->getModelPage()['brands'];
        $this->Creative = $this->getModelPage()['Creative'];
        $this->Only = $this->getModelPage()['Only'];
        $this->ContactInfo = $this->getModelPage()['ContactInfo'];
        $this->ContactInfoPhone = $this->getModelPage()['ContactInfoPhone'];
        $this->ContactInfoEmail = $this->getModelPage()['ContactInfoEmail'];
        $this->OurWork = $this->getModelPage()['OurWork'];
        $this->OurWorkInfo = $this->getModelPage()['OurWorkInfo'];
        $this->Copyright = $this->getModelPage()['Copyright'];
        $this->Company = $this->getModelPage()['Copyright'];
        $this->Design = $this->getModelPage()['Design'];
    }
    function getContactInfo(){
        return $this->ContactInfo;
    }
    function getContactInfoPhone(){
        return $this->ContactInfoPhone;
    }
    function getContactInfoEmail(){
        return $this->ContactInfoEmail;
    }
    function getOurWork(){
        return $this->OurWork;
    }
    function getOurWorkInfo(){
        return $this->OurWorkInfo;
    }
    function getCopyright(){
        return $this->Copyright;
    }
    function getCompany(){
        return $this->Company;
    }
    function getDesign(){
        return $this->Design;
    }
    function getbrands(){
        return $this->brands;
    }
    function getCreative(){
        return $this->Creative;
    }
    function getOnly(){
        return $this->Only;
    }
    function getClientTestimonials(){
        return $this->ClientTestimonials;
    }
    function getClientTestimonialsInfo(){
        return $this->ClientTestimonialsInfo;
    }
    function getClientNeroSoft(){
        return $this->ClientNeroSoft;
    }
    function getClientPos(){
        return $this->ClientPos;
    }
    function getTrends(){
        return $this->Trends;
    }
    function getLook(){
        return $this->Look;
    }
    function getAboutMe(){
        return $this->AboutMe;
    }
    function getTheBest(){
        return $this->TheBest;
    }
    function getDeliveryMarketing(){
        return $this->DeliveryMarketing;
    }
    function getSirs(){
        return $this->Sirs;
    }
    function getPhone(){
        return $this->Phone;
    }
    function getMenu(){
        return $this->Menu;
    }
    function getTitleHome(){
        return $this->TitleHome;
    }
    function getBranchesCompany(){
        return $this->BranchesCompany;
    }
    function getNavTitle(){
        return $this->NavTitle;
    }
    function getAbout(){
        return $this->About;
    }
    function getProduct(){
        return $this->Product;
    }
    function getContact(){
        return $this->Contact;
    }
    function getBranchesLanguage(){
        return $this->BranchesLanguage;
    }
    function getBranchesStyle(){
        return $this->BranchesStyle;
    }
    static function initMySite($message, $type){
        $view = new Site($message, $type);
        include 'SiteView.php';
        exit;
    }
    function getDataView(){
        return $this->DataView;
    }
}