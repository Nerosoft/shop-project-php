<!-- HERO -->
<section class="hero hero-bg d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-md-10 col-12 d-flex flex-column justify-content-center align-items-center">
                    <div class="hero-text">
                        <?php
                        echo<<<HTML
                        <h1 class="text-white" data-aos="fade-up">{$this->getTitleHome()}</h1>
                        <a href="#project" class="custom-btn btn-bg btn mt-3" data-aos="fade-up" data-aos-delay="100">{$this->getMenu()}</a>
                        <strong class="d-block py-3 pl-5 text-white" data-aos="fade-up" data-aos-delay="200"><i class="fa fa-phone mr-2"></i>{$this->getPhone()}</strong>
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
                            <h2 class="mb-4" data-aos="fade-up">{$this->getTheBest()} <strong>{$this->getDeliveryMarketing()}</strong> {$this->getSirs()}</h2>
                            <p class="mb-0" data-aos="fade-up">{$this->getAboutMe()}</p>
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
                        {$this->getLook()}
                        <strong>{$this->getTrends()}</strong>
                        HTML;
                    ?>
                </h2>
                <div class="owl-carousel owl-theme" id="project-slide">
                        <?php                                   
                            foreach ($this->getMyDataViewProduct() as $index => $myObject)
                                echo<<<HTML
                                    <div class="item project-wrapper" data-aos="fade-up" data-aos-delay="100">
                                        <img src="./asset/product/{$this->getId()}/{$index}" class="img-fluid" alt="project image">
                                        <div class="project-info">
                                            <h3>
                                                <a href="#project">
                                                    <span>{$myObject->getName()}</span>
                                                    <i class="fa fa-angle-right project-icon"></i>
                                                </a>
                                            </h3>
                                            <span>{$myObject->getDescreption()}</span>
                                        </div>
                                    </div>
                                HTML;
                        ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ABOUT -->
<section class="table section-padding" id="product">
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto">
                <h2 class="mb-5 text-center" data-aos="fade-up">
                    <?php
                        echo <<<HTML
                        {$this->getLookTable()}
                        <strong>{$this->getTrendsTable()}</strong>
                        HTML;
                    ?>
                </h2>
            </div>
            <div class="col-lg-12 col-12">
                <?php
                    include 'pis_of_page/table_colume.php';
                    foreach ($this->getMyDataViewProduct() as $index => $myObject) {
                        include 'pis_of_page/product_part.php';
                        echo '</td></tr>';
                        $this->plusCount();
                    }
                    include 'pis_of_page/part_table.php';
                ?>
        </div>
    </div>
</section>
<!-- ABOUT ------------------------------------------------------------>
<?php
foreach ($this->getModel2()['MyFlexTables'] as $keyabc => $value) {
    echo<<<HTML
        <section class="table section-padding" id="{$keyabc}">
        <div class="container">
            <div class="row">
                <div class="col-6 mx-auto">
                    <h2 class="mb-5 text-center" data-aos="fade-up">
                        {$this->getModel2()[$keyabc]['LookTable']}
                        <strong>{$this->getModel2()[$keyabc]['TrendsTable']}</strong>
                    </h2>
                </div>
                <div class="col-lg-12 col-12">
                    <table id="{$keyabc}table" class="table table-striped">
                        <thead>
                            <tr>
                                <th>{$this->getTableId()}</th>
                                <th>{$this->getModel2()[$keyabc]['TableProductImage']}</th>
    HTML;
                    foreach (array_keys($this->getModel2()[$keyabc]['TableHead']) as $index => $key)
                            echo'<th>'.($this->getModel2()[$keyabc]['TableHead'][$key]).'</th>';
                        echo '<th>'.$this->getTabelEvent().'</th>
                                </tr>
                            </thead>
                            <tbody>';
                    foreach ($this->getObj()[$keyabc] as $index => $myObject) {
                        include 'pis_of_page/flextable_part.php';
                        echo '</td></tr>';
                        $this->plusCount();
                    }
                    include 'pis_of_page/part_table.php';
echo'</div></div></section>';
$size = count(array_keys($this->getModel2()[$keyabc]['TableHead']))+1;
$id = $keyabc.'table';
include 'pis_of_page/table_script.php';
}
?>

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
                    <h4 class="my-5 pt-3" data-aos="fade-up" data-aos-delay="100">{$this->getClientTestimonials()}</h4>

                    <div class="quote" data-aos="fade-up" data-aos-delay="200"></div>

                    <h2 class="mb-4" data-aos="fade-up" data-aos-delay="300">{$this->getClientTestimonialsInfo()}</h2>

                    <p data-aos="fade-up" data-aos-delay="400">
                    <strong>{$this->getClientNeroSoft()}</strong>

                    <span class="mx-1">/</span>

                    <small>{$this->getClientPos()}</small>
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
                    <h1 class="text-white" data-aos="fade-up" data-aos-delay="100">{$this->getCreative()} <strong>{$this->getBrands()}</strong> {$this->getOnly()}</h1>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="200">
                    <h4 class="my-4">{$this->getContactInfo()}</h4>

                    <p class="mb-1">
                        <i class="fa fa-phone mr-2 footer-icon"></i> 
                        {$this->getContactInfoPhone()}
                    </p>

                    <p>
                        <a href="#">
                        <i class="fa fa-envelope mr-2 footer-icon"></i>
                        {$this->getContactInfoEmail()}
                        </a>
                    </p>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="300">
                    <h4 class="my-4">{$this->getOurWork()}</h4>

                    <p class="mb-1">
                        <i class="fa fa-home mr-2 footer-icon"></i> 
                        {$this->getOurWorkInfo()}
                    </p>
                    </div>

                    <div class="col-lg-4 mx-lg-auto text-center col-md-8 col-12" data-aos="fade-up" data-aos-delay="400">
                    <p class="copyright-text">{$this->getCopyright()} &copy; {$this->getCompany()}
                    <br>
                    <a rel="nofollow noopener" href="#" target="_blank">{$this->getDesign()}</a></p>
                    </div>

                    <div class="col-lg-4 mx-lg-auto col-md-6 col-12" data-aos="fade-up" data-aos-delay="500">
                    
                        <ul class="footer-link">
                            <li><a href="#">{$this->getStories()}</a></li>
                            <li><a href="#">{$this->getWorkWithUs()}</a></li>
                            <li><a href="#">{$this->getPrivacy()}</a></li>
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
</div>
<!-- SCRIPTS -->
<script src="./asset/js/aos.js"></script>
<script src="./asset/js/owl.carousel.min.js"></script>
<script src="./asset/js/custom.js"></script>