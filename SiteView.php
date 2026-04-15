<!-- MENU BAR -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="web.php">
            <i class="fa fa-line-chart"></i>
            <?php echo $view->getNavTitle()?>
        </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <?php
                    echo<<<HTML
                        <li class="nav-item">
                        <a href="#about" class="nav-link smoothScroll">{$view->getAbout()}</a>
                        </li>
                        <li class="nav-item">
                            <a href="#project" class="nav-link smoothScroll">{$view->getProduct()}</a>
                        </li>
                        <li class="nav-item">
                            <a href="#contact" class="nav-link smoothScroll">{$view->getContact()}</a>
                        </li>
                        <li onclick="openForm('#createModel')" class="nav-item">
                            <a class="nav-link pointer smoothScroll">{$view->getBranchesLanguage()}</a>
                        </li>
                        <li onclick="openForm('#style_modal')" class="nav-item">
                            <a class="nav-link pointer smoothScroll">{$view->getBranchesStyle()}</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown">
                                {$view->getBranchesCompany()}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                    HTML;
                                foreach ($view->getBranch3() as $keyItem=>$myBranch){
                                    $href = ($_SERVER["REQUEST_METHOD"] === "POST"?'/shop/web':'').'?id='.$keyItem;
                                    $myActive = $view->getId() === $keyItem ? 'my_active':'';
                                    echo <<<HTML
                                        <li>
                                        <a class="dropdown-item {$myActive}" href="{$href}">
                                            {$myBranch['Name']}
                                        </a>
                                        </li>
                                    HTML;
                                }
                ?>
                            </ul>
                        </li>

            </ul>
        </div>
    </div>
</nav>



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

                <img src="./asset/img/site/working-girl.png" class="img-fluid" alt="working girl">
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

                    <img src="./asset/img/site/office.png" class="img-fluid" alt="office">
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
                                foreach ($view->getDataView() as $index => $myObject)
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

                    <img src="./asset/img/site/female-avatar.png" class="img-fluid" alt="website">
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

                    <!-- <div class="col-lg-4 mx-lg-auto col-md-6 col-12" data-aos="fade-up" data-aos-delay="500">
                    
                        <ul class="footer-link">
                            <li><a href="#">Stories</a></li>
                            <li><a href="#">Work with us</a></li>
                            <li><a href="#">Privacy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 mx-lg-auto col-md-6 col-12" data-aos="fade-up" data-aos-delay="600">
                        <ul class="social-icon">
                            <li><a href="#" class="fa fa-instagram"></a></li>
                            <li><a href="https://x.com/minthu" class="fa fa-twitter" target="_blank"></a></li>
                            <li><a href="#" class="fa fa-dribbble"></a></li>
                            <li><a href="#" class="fa fa-behance"></a></li>
                        </ul>
                    </div> -->
                HTML;
            ?>
        </div>
    </div>
</footer>


<!-- SCRIPTS -->
<script src="./asset/js/site/aos.js"></script>
<script src="./asset/js/site/owl.carousel.min.js"></script>
<script src="./asset/js/site/smoothscroll.js"></script>
<script src="./asset/js/site/custom.js"></script>
</body>
</html>