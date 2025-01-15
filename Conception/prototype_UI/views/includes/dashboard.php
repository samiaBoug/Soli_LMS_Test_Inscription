<?php include_once $_SERVER['DOCUMENT_ROOT'].'/config.php' ; ?>
<!DOCTYPE html>
<html lang="fr">
<?php include_once  $config['views_path'] . '/head.php'; ?>

<body class="sidebar-mini" style="height: auto;">
    <div class="wrapper">
        <!-- Navigation -->
        <?php include_once  $config['views_path'] . '/nav.php'; ?>
        <!-- Barre latérale -->
        <?php include_once  $config['views_path'] . '/aside.php'; ?>

        <div class="content-wrapper pt-4">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                        <h1 class="font-weight-bold ">Tableau de Board</h1>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>163</h3>
                                    <p>Inscrits</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="/views/Responsable/index.php" class="small-box-footer">Plus d'informations <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>100</h3>
                                    <p>QCM</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="/views/Responsable/test.php" class="small-box-footer">Plus d'informations <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6">
                            <!-- Carte pour afficher le seuil ou la moyenne -->
                            <div class="small-box bg-warning" >
                                <div class="inner">
                                    <h3>53%</h3> <!-- Remplacez 50 par le seuil ou la moyenne que vous souhaitez afficher -->
                                    <p>Seuil de Réussite</p> <!-- Ou "Moyenne" si vous souhaitez afficher la moyenne -->
                                </div>
                                <div class="icon">
                                    <i class="ion ion-arrow-up-c"></i> <!-- Icône de seuil ou de moyenne -->
                                </div>
                               
                            </div>
                        </div>

                    </div>

                    <!-- Section des graphiques -->
                    <div class="row mt-4">
                    <div class="col-lg-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Répartition des Inscrits - Web vs Mobile</h3>
                            </div>
                            <div class="card-body">
                                <canvas id="inscriptionChart"></canvas>
                            </div>
                        </div>
                    </div>
                        <!-- Graphique en barres pour la distribution des résultats des inscrits -->
                        <div class="col-lg-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Distribution des Résultats des Inscrits</h3>
                                </div>
                                <div class="card-body">
                                    <canvas id="resultsDistributionChart"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- Graphique des inscrits au-dessus et en-dessous du seuil -->
                        <div class="col-lg-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Inscrits au-dessus et en-dessous du Seuil</h3>
                                </div>
                                <div class="card-body">
                                    <canvas id="thresholdChart"></canvas>
                                </div>
                            </div>
                        </div>

                    </div>

                   

                </div>
            </section>
        </div>
    </div>

    <!-- Importer Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Graphique en barres : Distribution des résultats des inscrits
        const ctx = document.getElementById('resultsDistributionChart').getContext('2d');
        const resultsDistributionChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['0-20%', '21-40%', '41-60%', '61-80%', '81-100%'], // Intervalles de scores
                datasets: [{
                    label: 'Nombre d\'inscrits',
                    data: [5, 15, 30, 40, 10], // Exemple de données : nombre d'inscrits dans chaque intervalle
                    backgroundColor: '#007bff',
                    borderColor: '#0056b3',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Intervalle de Résultats (%)'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Nombre d\'Inscrits'
                        }
                    }
                }
            }
        });

        // Graphique comparant les inscrits au-dessus et en-dessous du seuil
        const ctxThreshold = document.getElementById('thresholdChart').getContext('2d');
        const thresholdChart = new Chart(ctxThreshold, {
            type: 'pie',
            data: {
                labels: ['Au-dessus du seuil', 'En-dessous du seuil'],
                datasets: [{
                    label: 'Inscrits',
                    data: [70, 30], // Exemple de données : inscrits au-dessus et en-dessous du seuil
                    backgroundColor: ['#28a745', '#dc3545'],
                    borderColor: '#ffffff',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true
            }
        });
        const ctxI = document.getElementById('inscriptionChart').getContext('2d');
    const inscriptionChart = new Chart(ctxI, {
        type: 'pie', // Diagramme en secteurs
        data: {
            labels: ['Web', 'Mobile'], // Les formations
            datasets: [{
                label: 'Nombre d\'Inscrits',
                data: [60, 40], // Exemple : 60 inscrits pour Web, 40 pour Mobile
                backgroundColor: ['#007bff', '#28a745'], // Couleurs pour chaque formation
                borderColor: '#ffffff',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top'
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw + ' inscrits';
                        }
                    }
                }
            }
        }
    });
       
    </script>
</body>

</html>
