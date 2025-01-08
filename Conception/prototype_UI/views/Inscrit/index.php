<?php include_once $_SERVER['DOCUMENT_ROOT'].'/config.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<?php include_once  $config['views_path'] . '/head.php'; ?>

<body class="sidebar-mini">
<div id="wrapper" class="clearfix">
    <header id="header" class="bg-transparent" data-sticky-class="not-dark" data-responsive-class="not-dark">
        <div id="header-wrap">
            <div class="container">
                <div class="header-row d-flex align-items-center justify-content-between">
                    <img src="/public/images/logo_ofppt.png" alt="OFPPT" style="width:80px; margin-right: 10px;">
                    <div id="logo">
                        <a href="/" class="standard-logo" data-dark-logo="/public/images/solicode.png">
                            <img src="/public/images/solicode.png" alt="SoliCode">
                        </a>
                    </div>

                    <div id="primary-menu-trigger">
                        <svg class="svg-trigger" viewBox="0 0 100 100">
                            <path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path>
                            <path d="m 30,50 h 40"></path>
                            <path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path>
                        </svg>
                    </div>
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="/#wrapper">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">SoliCode</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">Formation</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">Activités</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-warning btn-rounded" href="/views/inscrit/test.php">Inscription</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/#section-contact">Contact</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <section id="slider" class="slider-element swiper-wrapper">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="container text-center">
                        <div class="slider-caption">
                            <h2>Inscription 2024-2025</h2>
                            <p>Vous avez entre 18 et 35 ans? Vous êtes motivé, passionné par les technologies digitales? Inscrivez-vous maintenant!</p>
                            <a href="/views/inscrit/test.php" target="_blank" class="btn btn-lg btn-warning btn-rounded">Je m'inscris!</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-arrow-left"><i class="icon-angle-left"></i></div>
            <div class="slider-arrow-right"><i class="icon-angle-right"></i></div>
        </div>
    </section>

    <section id="section-chiffre" class="section bg-transparent py-5">
        <div class="container text-center">
            <div class="fancy-title mb-4">
                <h2>SOLICODE EN CHIFFRES</h2>
            </div>
            <div class="row">
                <div class="col-6 col-lg-3 mb-4">
                    <i class="icon-users display-4"></i>
                    <div class="counter" style="color: #3945ba"><span data-from="1" data-to="12" data-refresh-interval="50" data-speed="1000">12</span></div>
                    <h5>Staff</h5>
                </div>
                <div class="col-6 col-lg-3 mb-4">
                    <i class="icon-keyboard display-4"></i>
                    <div class="counter" style="color: #3945ba"><span data-from="1" data-to="120" data-refresh-interval="50" data-speed="1000">120</span></div>
                    <h5>Places pédagogiques</h5>
                </div>
                <div class="col-6 col-lg-3 mb-4">
                    <i class="icon-graduation-cap display-4"></i>
                    <div class="counter" style="color: #3945ba"><span data-from="1" data-to="43" data-refresh-interval="50" data-speed="1000">43</span></div>
                    <h5>Lauréats</h5>
                </div>
                <div class="col-6 col-lg-3 mb-4">
                    <i class="icon-award display-4"></i>
                    <div class="counter" style="color: #3945ba"><span data-from="1" data-to="2" data-refresh-interval="50" data-speed="1000">2</span></div>
                    <h5>Filières</h5>
                </div>
            </div>
        </div>
    </section>

    <section id="section-contact" class="section py-5">
        <div class="container">
            <div class="fancy-title mb-4">
                <h2>Contact</h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3238.1819013774953!2d-5.827722685510491!3d35.74633358017912!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd0b87c216892bc7%3A0x48bdf85995e9c186!2sSolicode%20Tanger!5e0!3m2!1sfr!2sma!4v1621944120029!5m2!1sfr!2sma" style="border:0; width: 100%; height: 300px;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="col-md-6">
                    <p>Le Maroc de demain est numérique et SOLICODE est la formation privilégiée pour vous préparer aux futurs challenges. Devenez développeurs dès à présent en rejoignant une formation de qualité, délivrée par <a href="https://www.ofppt.ma/">www.ofppt.ma</a></p>
                    <div class="row">
                        <div class="col-md-6">
                            <address>
                                <strong>Adresse:</strong><br>
                                Bni Waryaghel 90000 Tanger, Maroc
                            </address>
                            <strong>Email:</strong> info@solicode.co
                        </div>
                        <div class="col-md-6">
                            <strong>Portable:</strong> (212) 0634 39 05 05<br>
                            <strong>Fixe:</strong> (212) 0539 30 88 85
                        </div>
                    </div>
                </div>
            </div>
            <a href="mailto:info@solicode.co" class="btn btn-lg btn-block btn-warning btn-rounded">Contactez-nous</a>
        </div>
    </section>

    <footer id="footer" class="bg-dark text-white py-4">
        <div class="container text-center">
            <img id="footer-logo" src="/images/logo/logo-solicode.svg" alt="Image" class="mb-3">
            <p>&copy; 2025 All Rights Reserved by SoliCode</p>
        </div>
    </footer>
</div>

</body>
</html>
