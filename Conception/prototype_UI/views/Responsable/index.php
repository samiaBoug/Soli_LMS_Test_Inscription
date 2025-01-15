<?php include_once $_SERVER['DOCUMENT_ROOT'].'/config.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<?php include_once  $config['views_path'] . '/head.php'; ?>

<body class="sidebar-mini" style="height: auto;">

    <div class="wrapper">
        <!-- Navigation -->
        <?php include_once  $config['views_path'] . '/nav.php'; ?>

        <!-- Barre latérale -->
        <?php include_once  $config['views_path'] . '/aside.php'; ?>

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <h1 class="text-primary">Les Inscrits</h1>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Contenu principal -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- Boîte par défaut -->
                            <div class="card shadow-lg">
                                <div class="card-header">
                                    <h3 class="card-title">Tableau des Inscrits</h3>
                                </div>

                                <div class="card-body">
                                    <!-- Recherche -->
                                    <div class="col-md-4 mt-4">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Nom ...">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tableau -->
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead class="">
                                            <tr>
                                                <th>Nom</th>
                                                <th>Prénom</th>
                                                <th>Date de Naissance</th>
                                                <th>Niveau Scolaire</th>
                                                <th>Email</th>
                                                <th>Téléphone</th>
                                                <th>Résultat</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>John</td>
                                                <td>Doe</td>
                                                <td>2000-01-01</td>
                                                <td>Bac</td>
                                                <td>johndoe@gmail.com</td>
                                                <td>06 06 06 06 06</td>
                                                <td>70%</td>
                                                <td class="text-center">
                                                    <a href="show.php" class="btn btn-info btn-sm mb-1">
                                                        <i class="far fa-eye"></i>
                                                    </a>
                                                    <a href="edit.php" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Footer de la carte -->
                            <div class="card-footer">
                                <div class="d-flex justify-content-between align-items-center p-2">
                                    <div class="d-flex align-items-center mb-2">
                                        <button type="button" class="btn btn-secondary btn-sm">
                                            <i class="fas fa-download"></i> IMPORTER
                                        </button>
                                        <button type="button" class="btn btn-secondary btn-sm mt-0 mx-2">
                                            <i class="fas fa-upload"></i> EXPORTER
                                        </button>
                                    </div>
                                    <div class="mr-5">
                                        <ul class="pagination m-0 float-right ">
                                            <li class="page-item "><a class="page-link text-primary" href="#">«</a></li>
                                            <li class="page-item "><a class="page-link active text-primary" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link text-primary" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link text-primary" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link text-primary" href="#">»</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <?php include $config['views_path']. '/footer.php'; ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

</body>

<!-- get script -->
</html>
