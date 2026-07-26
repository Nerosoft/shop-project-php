<?php
if($_SERVER["REQUEST_METHOD"] !== "GET"){
    header('Location:site');
    exit;
}
require 'class_object/ProductValue.php';
class Site extends ModelJson{
    function __construct(){
        parent::__construct('Site', function (){
            return isset($this->getObj()['Product'])?ProductValue::fromArray($this->getObj()['Product']):array();
        }); 
    }
    function getView(){
        include 'view/site.php';
    }
    function getStories(){
        return $this->getModelPage()['Stories'];
    }
    function getWorkWithUs(){
        return $this->getModelPage()['WorkWithUs'];
    }
    function getPrivacy(){
        return $this->getModelPage()['Privacy'];
    }
    function getContactInfo(){
        return $this->getModelPage()['ContactInfo'];
    }
    function getContactInfoPhone(){
        return $this->getModelPage()['ContactInfoPhone'];
    }
    function getContactInfoEmail(){
        return $this->getModelPage()['ContactInfoEmail'];
    }
    function getOurWork(){
        return $this->getModelPage()['OurWork'];
    }
    function getOurWorkInfo(){
        return $this->getModelPage()['OurWorkInfo'];
    }
    function getCopyright(){
        return $this->getModelPage()['Copyright'];
    }
    function getCompany(){
        return $this->getModelPage()['Company'];
    }
    function getDesign(){
        return $this->getModelPage()['Design'];
    }
    function getbrands(){
        return $this->getModelPage()['brands'];
    }
    function getCreative(){
        return $this->getModelPage()['Creative'];
    }
    function getOnly(){
        return $this->getModelPage()['Only'];
    }
    function getClientTestimonials(){
        return $this->getModelPage()['ClientTestimonials'];
    }
    function getClientTestimonialsInfo(){
        return $this->getModelPage()['ClientTestimonialsInfo'];
    }
    function getClientNeroSoft(){
        return $this->getModelPage()['ClientNeroSoft'];
    }
    function getClientPos(){
        return $this->getModelPage()['ClientPos'];
    }
    function getTrends(){
        return $this->getModelPage()['Trends'];
    }
    function getLook(){
        return $this->getModelPage()['Look'];
    }
    function getAboutMe(){
        return $this->getModelPage()['AboutMe'];
    }
    function getTheBest(){
        return $this->getModelPage()['TheBest'];
    }
    function getDeliveryMarketing(){
        return $this->getModelPage()['DeliveryMarketing'];
    }
    function getSirs(){
        return  $this->getModelPage()['Sirs'];
    }
    function getPhone(){
        return $this->getModelPage()['Phone'];
    }
    function getMenu(){
        return $this->getModelPage()['Menu'];
    }
    function getTitleHome(){
        return $this->getModelPage()['TitleHome'];
    }
    function getNavTitle(){
        return $this->NavTitle;
    }
    function getAbout(){
        return $this->getModelPage()['About'];
    }
    function getProduct(){
        return $this->getModelPage()['NavTitle'];
    }
    function getContact(){
        return $this->getModelPage()['Contact'];
    }
    function getLoginButton(){
        return $this->getModelPage()['LoginButton'];
    }
    function getHomeButton(){
        return $this->getModelPage()['HomeButton'];
    }
    function getRegisterButton(){
        return $this->getModelPage()['RegisterButton'];
    }
}
new Site();