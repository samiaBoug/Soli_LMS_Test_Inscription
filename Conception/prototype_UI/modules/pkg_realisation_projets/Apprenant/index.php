<?php include_once $_SERVER['DOCUMENT_ROOT'].'/config.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<?php include_once  $config['views_path'] . 'head.php'; ?>


<body class="sidebar-mini" style="height: auto;">

    <div class="wrapper">
        <!-- Navigation -->
        <?php include_once  $config['views_path'] . 'nav.php'; ?>

        <!-- Barre latérale -->
        <?php include_once  $config['views_path'] . 'aside.php'; ?>


        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Mes projets</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Contenu principal -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- Boîte par défaut -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Tableau des projets</h3>
                                   
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label for="skill">Etat de réalisation :</label>
                                            <select class="form-control" id="project">
                                                <option value="">Tous</option>
                                                <option value="à faire">à faire</option>
                                                <option value="en cours">en cours</option>
                                                <option value="en pause">en pause</option>
                                                <option value="terminé">terminé</option>    
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="skill">Etat de validation :</label>
                                            <select class="form-control" id="project">
                                                <option value="">Tous</option>
                                                <option value="en attente">en attente</option>
                                                <option value="en révision">en révision</option>
                                                <option value="validé">validé</option>
                                                <option value="non validé">non validé</option>
                                                    
                                            </select>
                                        </div>
                                        <div class="col-md-4 mt-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="nom brief projet...">
                                                <div class="input-group-append">
                                                    <button class="btn btn-default" type="button">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>

                                </div>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Brief projet</th>   
                                            <th>Date debut</th> 
                                            <th>Date de fin</th>            
                                            <th>Etat de réalisation</th>
                                            <th>Etat de validation</th>
                                            <th>Remarques de formateur</th>
                                            <th>Actions</th>
                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Lab-Markdown</td>
                                            <td>2021-12-01</td>
                                            <td>2021-12-8</td>
                                            <td class="etat">
                                                <span class="badge badge-info">En cours</span>
                                            </td>
                                            <td class="etat">
                                                <span class="badge badge-secondary">En attente</span>
                                            </td>
                                           
                                            <td></td>
                                            <td class="text-center">
                                                <a href="show.php" class='btn btn-default btn-sm mb-1'>
                                                    <i class="far fa-eye"> Brief projet</i>
                                                </a>
                                                <a href="edit.php" class="btn btn-default btn-sm" >
                                                <i class="far fa-folder"> Livrables</i>
                                                </a>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <div class="d-flex justify-content-between align-items-center p-2">
                                    <div class="d-flex align-items-center mb-2">
                                        <button type="button" class="btn btn-default btn-sm">
                                            <i class="fas fa-download"></i> IMPORT
                                        </button>
                                        <button type="button" class="btn btn-default btn-sm mt-0 mx-2">
                                            <i class="fas fa-upload"></i> EXPORT
                                        </button>
                                    </div>
                                    <div class="mr-5">
                                        <ul class="pagination m-0 float-right">
                                            <li class="page-item"><a class="page-link text-secondary" href="#">«</a></li>
                                            <li class="page-item"><a class="page-link active text-secondary" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link text-secondary" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link text-secondary" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link text-secondary" href="#">»</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-footer-->
                             <?php  include $config['views_path']. 'footer.php' ?>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
        </div>
        </section>
        <!-- /.content -->
    </div>

    </div>
</body>

<!-- get script -->


</html>