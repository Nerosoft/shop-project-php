<?php
// require 'InformationPage.php';
require 'class_object/ProductValue.php';
class Site extends LoginRegister{
    private $DataView;
    private $About;
    private $Product;
    private $Contact;
    private $NavTitle;
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
    private $Stories;
    private $WorkWithUs;
    private $Privacy;
    private $LoginButton;
    private $HomeButton;
    private $RegisterButton;
    function __construct($message, $type){
        parent::__construct($message, $type, 'Site');
        $this->DataView = isset($this->getObj()['Product'])?ProductValue::fromArray($this->getObj()['Product']):array();
        $this->About = $this->getModelPage()['About'];
        $this->Product = $this->getModelPage()['Product'];
        $this->Contact = $this->getModelPage()['Contact'];
        $this->NavTitle = $this->getModelPage()['NavTitle'];
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
        $this->Stories = $this->getModelPage()['Stories'];
        $this->WorkWithUs = $this->getModelPage()['WorkWithUs'];
        $this->Privacy = $this->getModelPage()['Privacy'];
        $this->LoginButton = $this->getModelPage()['LoginButton'];
        $this->HomeButton = $this->getModelPage()['HomeButton'];
        $this->RegisterButton = $this->getModelPage()['RegisterButton'];
    }
    function getStories(){
        return $this->Stories;
    }
    function getWorkWithUs(){
        return $this->WorkWithUs;
    }
    function getPrivacy(){
        return $this->Privacy;
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
    function getDataView(){
        return $this->DataView;
    }
    function getLoginButton(){
        return $this->LoginButton;
    }
    function getHomeButton(){
        return $this->HomeButton;
    }
    function getRegisterButton(){
        return $this->RegisterButton;
    }
}