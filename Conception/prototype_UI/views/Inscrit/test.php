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

    <section class="section py-5 bg-light">
        <div class="container">
            <h1 class="text-center mb-4"></h1>
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <!-- Formulaire du QCM -->
                    <form id="qcmForm" action="" method="POST">
                        <!-- Timer -->
                        <div class="mb-3 text-right">
                            <span class="timer" id="timer" style="font-size: 18px; color: #007bff;">Temps restant : 10:00</span>
                        </div>

                        <!-- Question 1 -->
                        <div class="card mb-3">
                            <div class="card-header bg-primary text-white">
                                <h5 class="card-title">Question 1</h5>
                            </div>
                            <div class="card-body">
                                <p>Parmi les langages suivants, lequel est principalement utilisé pour le développement front-end web ?</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="question1" value="a" id="q1a">
                                    <label class="form-check-label" for="q1a">Python</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="question1" value="b" id="q1b">
                                    <label class="form-check-label" for="q1b">Java</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="question1" value="c" id="q1c">
                                    <label class="form-check-label" for="q1c">JavaScript</label>
                                </div>
                            </div>
                        </div>

                        <!-- Question 2 -->
                        <div class="card mb-3">
                            <div class="card-header bg-primary text-white">
                                <h5 class="card-title">Question 2</h5>
                            </div>
                            <div class="card-body">
                                <p>Quel est le rôle principal de HTML dans le développement web ?</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="question2" value="a" id="q2a">
                                    <label class="form-check-label" for="q2a">Styliser les pages web</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="question2" value="b" id="q2b">
                                    <label class="form-check-label" for="q2b">Structurer le contenu de la page web</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="question2" value="c" id="q2c">
                                    <label class="form-check-label" for="q2c">Ajouter des fonctionnalités interactives</label>
                                </div>
                            </div>
                        </div>

                        <!-- Question 3 -->
                        <div class="card mb-3">
                            <div class="card-header bg-primary text-white">
                                <h5 class="card-title">Question 3</h5>
                            </div>
                            <div class="card-body">
                                <p>Quelle est la différence entre une balise `<div>` et une balise `<span>` en HTML ?</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="question3" value="a" id="q3a">
                                    <label class="form-check-label" for="q3a">La balise `<div>` est en ligne, alors que la balise `<span>` est un bloc.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="question3" value="b" id="q3b">
                                    <label class="form-check-label" for="q3b">La balise `<div>` est un bloc, alors que la balise `<span>` est en ligne.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="question3" value="c" id="q3c">
                                    <label class="form-check-label" for="q3c">Les deux balises ont le même comportement.</label>
                                </div>
                            </div>
                        </div>

                        <!-- Soumission -->
                        <div class="row mt-4">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-success btn-lg">Soumettre les réponses</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer id="footer" class="bg-dark text-white py-4">
        <div class="container text-center">
            <img id="footer-logo" src="/public/images/solicode.png" alt="SoliCode" class="mb-3" style="width: 120px;">
            <p>&copy; 2025 All Rights Reserved by SoliCode</p>
        </div>
    </footer>
</div>

<script>
    // Durée du QCM en secondes (exemple : 10 minutes)
    const duration = 10 * 60;
    let timeRemaining = duration;

    function startTimer() {
        const timerDisplay = document.getElementById('timer');
        const interval = setInterval(() => {
            const minutes = Math.floor(timeRemaining / 60);
            const seconds = timeRemaining % 60;
            timerDisplay.textContent = `Temps restant : ${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
            timeRemaining--;
            if (timeRemaining < 0) {
                clearInterval(interval);
                document.getElementById('qcmForm').submit();
            }
        }, 1000);
    }

    // Démarrer le minuteur au chargement de la page
    window.onload = startTimer;
</script>

</body>
</html>
