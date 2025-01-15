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
                            <li class="nav-item"><a class="nav-link" href="">Accueil</a></li>
                            <li class="nav-item"><a class="nav-link" href="">SoliCode</a></li>
                            <li class="nav-item"><a class="nav-link" href="">Formation</a></li>
                            <li class="nav-item"><a class="nav-link" href="">Activités</a></li>
                            <li class="nav-item"><a class="nav-link" href="">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-12">
                <div class="card shadow">
                    <div class="card-header text-center bg-primary text-white">
                        <h3>Formulaire d'inscription</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <!-- Nom complet -->
                            <div class="mb-3">
                                <label for="fullName" class="form-label">Nom complet</label>
                                <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Votre nom complet" required>
                            </div>
                            <!-- Adresse email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Adresse email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Votre email" required>
                            </div>
                            <!-- Téléphone -->
                            <div class="mb-3">
                                <label for="phone" class="form-label">Numéro de téléphone</label>
                                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Votre numéro de téléphone" required>
                            </div>
                             <!-- Date de naissance -->
                             <div class="mb-3">
                                <label for="" class="form-label">Date de naissance</label>
                                <input type="date" class="form-control" required>
                            </div>
                            <!-- Formation choisie -->
                            <div class="mb-3">
                                <label for="formation" class="form-label">Formation souhaitée</label>
                                <select class="form-select" id="formation" name="formation" required>
                                    <option value="" disabled selected>Choisir une formation</option>
                                    <option value="web">Développement Web</option>
                                    <option value="mobile">Développement Mobile</option>
                                </select>
                            </div>
                            <!-- Mot de passe -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Créer un mot de passe" required>
                            </div>
                            <!-- Bouton d'inscription -->
                            <div class="d-grid">
                                <a type="submit" class="btn btn-primary" href="test.php">S'inscrire</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <footer id="footer" class="bg-dark text-white py-4 my-4">
        <div class="container text-center">
            <p>&copy; 2025 All Rights Reserved by SoliCode</p>
        </div>
    </footer>
</div>

</body>
</html>
