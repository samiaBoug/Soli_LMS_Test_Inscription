@extends('admin.layouts.index')

@section('content')
<div class="min-h-screen bg-gray-100 p-6 ">
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-6">Tableau de Bord</h1>
        <button id="refreshStats" class="bg-blue-500 text-white p-2 rounded mt-4 mb-6 hover:bg-blue-600 focus:outline-none transition-colors duration-300">
            <i class="fas fa-sync-alt mr-2"></i> Actualiser les Statistiques
        </button>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            <div class="bg-blue-500 text-white p-6 rounded-lg shadow-md">
                <h3 class="text-2xl font-semibold" id="usersCount"></h3>
                <p>Inscrits</p>
                <a href="/views/Responsable/index.php" class="block mt-4 text-sm">Plus d'informations →</a>
            </div>
            
            <div class="bg-green-600 text-white p-6 rounded-lg shadow-md">
                <h3 class="text-2xl font-semibold" id="inscritWebCount"></h3>
                <p>Inscrits Web</p>
            </div>
            <div class="bg-green-700 text-white p-6 rounded-lg shadow-md">
                <h3 class="text-2xl font-semibold" id="inscritMobileCount"></h3>
                <p>Inscrits Mobile</p>
            </div>
            <div class="bg-green-500 text-white p-6 rounded-lg shadow-md">
                <h3 class="text-2xl font-semibold" id="qcmCount"></h3>
                <p>QCM</p>
                <a href="/views/Responsable/test.php" class="block mt-4 text-sm">Plus d'informations →</a>
            </div>
            <div class="bg-yellow-500 text-white p-6 rounded-lg shadow-md">
                <h3 class="text-2xl font-semibold" id="seuilValue"></h3>
                <p>Seuil de Réussite</p>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold mb-4">Répartition des Inscrits - Web vs Mobile</h3>
                <canvas id="inscriptionChart"></canvas>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold mb-4">Distribution des Résultats des Inscrits</h3>
                <canvas id="resultsDistributionChart"></canvas>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold mb-4">Inscrits au-dessus et en-dessous du Seuil</h3>
                <canvas id="thresholdChart"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        // Données passées depuis l'API
        let fetchData = () => {
            $.ajax({
                type: "GET",
                url: "/api/statistics",
                success: function(response) {
                    // Déstructuration de la réponse
                    const { 
                        users, 
                        qcm, 
                        inscritWeb, 
                        inscritMobile, 
                        countResult, 
                        sumResult, 
                        seuil, 
                        resultsDistribution 
                    } = response;

                    // Affichage des données dans le DOM
                    $('#usersCount').text(users);
                    $('#inscritWebCount').text(inscritWeb);
                    $('#inscritMobileCount').text(inscritMobile);
                    $('#qcmCount').text(qcm);
                    $('#seuilValue').text(seuil + '%');
                    
                    // Chart Inscription Web vs Mobile
                    new Chart($("#inscriptionChart"), {
                        type: 'doughnut',
                        data: {
                            labels: ["Web", "Mobile"],
                            datasets: [{
                                data: [inscritWeb, inscritMobile],
                                backgroundColor: ["#4CAF50", "#FF9800"]
                            }]
                        }
                    });

                    // Chart Distribution des Résultats
                    new Chart($("#resultsDistributionChart"), {
                        type: 'bar',
                        data: {
                            labels: ['0-20%', '21-40%', '41-60%', '61-80%', '81-100%'],
                            datasets: [{
                                label: 'Nombre d\'inscrits',
                                data: [
                                    resultsDistribution.interval_0_20,
                                    resultsDistribution.interval_21_40,
                                    resultsDistribution.interval_41_60,
                                    resultsDistribution.interval_61_80,
                                    resultsDistribution.interval_81_100
                                ],
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

                    // Chart Inscrits au-dessus et en-dessous du seuil
                    new Chart($("#thresholdChart"), {
                        type: 'pie',
                        data: {
                            labels: ["Au-dessus du Seuil", "En-dessous du Seuil"],
                            datasets: [{
                                data: [countResult - seuil, seuil],
                                backgroundColor: ["#8BC34A", "#F44336"]
                            }]
                        }
                    });
                }
            });
        };


        fetchData(); // Appel de la fonction pour récupérer et afficher les données
        $('#refreshStats').click(function() {
            // Rafraîchir les données en appelant la fonction fetchData
            fetchData();
        });
    });
</script>
@endsection
