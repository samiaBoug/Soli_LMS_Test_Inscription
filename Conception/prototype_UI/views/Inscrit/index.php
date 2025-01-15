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


    <footer id="footer" class="bg-dark text-white py-4">
        <div class="container text-center">
            <img id="footer-logo" src="/images/logo/logo-solicode.svg" alt="Image" class="mb-3">
            <p>&copy; 2025 All Rights Reserved by SoliCode</p>
        </div>
    </footer>
</div>

</body>
</html>
