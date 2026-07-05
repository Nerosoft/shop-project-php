<?php
require 'class_object/ProductValue.php';
class Site extends AdminMenu{
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
    function __construct(){
        parent::__construct(function (){
            return isset($this->getObj()['Product'])?ProductValue::fromArray($this->getObj()['Product']):array();
        }, null, 'AdminDashboard2', isset($_SESSION['userId'])?'ChangeLanguagePost.php':'ChangeLangPost.php');
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
$view = new Site();
?>
<!-- HERO -->
<section class="hero hero-bg d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-md-10 col-12 d-flex flex-column justify-content-center align-items-center">
                    <div class="hero-text">
                        <?php
                        echo<<<HTML
                        <h1 class="text-white" data-aos="fade-up">{$view->getTitleHome()}</h1>
                        <a href="#project" class="custom-btn btn-bg btn mt-3" data-aos="fade-up" data-aos-delay="100">{$view->getMenu()}</a>
                        <strong class="d-block py-3 pl-5 text-white" data-aos="fade-up" data-aos-delay="200"><i class="fa fa-phone mr-2"></i>{$view->getPhone()}</strong>
                        HTML;
                        ?>
                    </div>
            </div>

            <div class="col-lg-6 col-12">
                <div class="hero-image" data-aos="fade-up" data-aos-delay="300">

                <img src="./asset/img/working-girl.png" class="img-fluid" alt="working girl">
                </div>
            </div>

        </div>
    </div>
</section>


<!-- ABOUT -->
<section class="about section-padding pb-0" id="about">
    <div class="container">
        <div class="row">

            <div class="col-lg-7 mx-auto col-md-10 col-12">
                    <div class="about-info">
                        <?php 
                            echo <<<HTML
                            <h2 class="mb-4" data-aos="fade-up">{$view->getTheBest()} <strong>{$view->getDeliveryMarketing()}</strong> {$view->getSirs()}</h2>
                            <p class="mb-0" data-aos="fade-up">{$view->getAboutMe()}</p>
                            HTML;                        
                        ?>
                    </div>

                    <div class="about-image" data-aos="fade-up" data-aos-delay="200">

                    <img src="./asset/img/office.png" class="img-fluid" alt="office">
                </div>
            </div>

        </div>
    </div>
</section>


<!-- PROJECT -->
<section class="project section-padding" id="project">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12 col-12">

                <h2 class="mb-5 text-center" data-aos="fade-up">
                    <?php
                        echo <<<HTML
                        {$view->getLook()}
                        <strong>{$view->getTrends()}</strong>
                        HTML;
                    ?>
                </h2>

                    <div class="owl-carousel owl-theme" id="project-slide">
                            <?php
                                foreach ($view->getMyDataView() as $index => $myObject)
                                    echo<<<HTML
                                        <div class="item project-wrapper" data-aos="fade-up" data-aos-delay="100">
                                            <img src="./asset/product/{$view->getId()}/{$index}" class="img-fluid" alt="project image">

                                            <div class="project-info">
                                                <small>{$myObject->getName()}</small>

                                                <h3>
                                                        <a href="#project">
                                                            <span>{$myObject->getDescreption()}</span>
                                                            <i class="fa fa-angle-right project-icon"></i>
                                                        </a>
                                                </h3>
                                            </div>
                                        </div>
                                    HTML;
                            ?>
                    </div>
            </div>

        </div>
    </div>
</section>

<!-- TESTIMONIAL -->
<section class="testimonial section-padding">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-md-5 col-12">
                <div class="contact-image" data-aos="fade-up">

                    <img src="./asset/img/female-avatar.png" class="img-fluid" alt="website">
                </div>
            </div>

            <div class="col-lg-6 col-md-7 col-12">
                <?php
                echo <<<HTML
                    <h4 class="my-5 pt-3" data-aos="fade-up" data-aos-delay="100">{$view->getClientTestimonials()}</h4>

                    <div class="quote" data-aos="fade-up" data-aos-delay="200"></div>

                    <h2 class="mb-4" data-aos="fade-up" data-aos-delay="300">{$view->getClientTestimonialsInfo()}</h2>

                    <p data-aos="fade-up" data-aos-delay="400">
                    <strong>{$view->getClientNeroSoft()}</strong>

                    <span class="mx-1">/</span>

                    <small>{$view->getClientPos()}</small>
                    </p>
                HTML;
                ?>
            </div>

        </div>
    </div>
</section>


<footer class="site-footer" id="contact">
    <div class="container">
        <div class="row">
            <?php
                echo <<<HTML
                    <div class="col-lg-5 mx-lg-auto col-md-8 col-10">
                    <h1 class="text-white" data-aos="fade-up" data-aos-delay="100">{$view->getCreative()} <strong>{$view->getBrands()}</strong> {$view->getOnly()}</h1>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="200">
                    <h4 class="my-4">{$view->getContactInfo()}</h4>

                    <p class="mb-1">
                        <i class="fa fa-phone mr-2 footer-icon"></i> 
                        {$view->getContactInfoPhone()}
                    </p>

                    <p>
                        <a href="#">
                        <i class="fa fa-envelope mr-2 footer-icon"></i>
                        {$view->getContactInfoEmail()}
                        </a>
                    </p>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="300">
                    <h4 class="my-4">{$view->getOurWork()}</h4>

                    <p class="mb-1">
                        <i class="fa fa-home mr-2 footer-icon"></i> 
                        {$view->getOurWorkInfo()}
                    </p>
                    </div>

                    <div class="col-lg-4 mx-lg-auto text-center col-md-8 col-12" data-aos="fade-up" data-aos-delay="400">
                    <p class="copyright-text">{$view->getCopyright()} &copy; {$view->getCompany()}
                    <br>
                    <a rel="nofollow noopener" href="#" target="_blank">{$view->getDesign()}</a></p>
                    </div>

                    <div class="col-lg-4 mx-lg-auto col-md-6 col-12" data-aos="fade-up" data-aos-delay="500">
                    
                        <ul class="footer-link">
                            <li><a href="#">{$view->getStories()}</a></li>
                            <li><a href="#">{$view->getWorkWithUs()}</a></li>
                            <li><a href="#">{$view->getPrivacy()}</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 mx-lg-auto col-md-6 col-12" data-aos="fade-up" data-aos-delay="600">
                        <ul class="social-icon">
                            <li><a href="#" class="fa fa-instagram"></a></li>
                            <li><a href="https://x.com/minthu" class="fa fa-twitter" target="_blank"></a></li>
                            <li><a href="#" class="fa fa-dribbble"></a></li>
                            <li><a href="#" class="fa fa-behance"></a></li>
                        </ul>
                    </div>
                HTML;
            ?>
        </div>
    </div>
</footer>


<!-- SCRIPTS -->
<script src="./asset/js/aos.js"></script>
<script src="./asset/js/owl.carousel.min.js"></script>
<script src="./asset/js/custom.js"></script>