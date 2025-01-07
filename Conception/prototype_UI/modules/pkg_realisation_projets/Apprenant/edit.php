<?php include_once $_SERVER['DOCUMENT_ROOT'].'/config.php'; ?>
<!DOCTYPE html>
<html lang="fr">

<!-- Inclure l'en-tête -->
<?php include_once  $config['views_path'] . 'head.php'; ?>


<body class="sidebar-mini" style="height: auto;">

    <div class="wrapper">
        <!-- Navigation -->
        <?php include_once  $config['views_path'] . 'nav.php'; ?>

        <!-- Barre latérale -->
        <?php include_once  $config['views_path'] . 'aside.php'; ?>


        <div class="content-wrapper" style="min-height: 1302.4px;">

            <div class="content-header">
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">Livrables</h3>
                                </div>
                                
                                <div class="card-body p-0">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Livrable</th>
                                                <th>Lien</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><i class="fab fa-github"> GitHub</i></td>
                                                <td><input type="text" name="lien[]" class="form-control"
                                                        value="https://github.com/code"></td>
                                            </tr>
                                            <tr>
                                                <td><i class="fab fa-figma"> Figma</i> <a href="https://example.com/code"></a></td>
                                                <td><input type="text" name="lien[]" class="form-control"
                                                        value="https://figma.com/maquette"></td>
                                            </tr>
                                            <tr>
                                                <td><i class="fab fa-google-drive"> Google Drive</i> <a href="https://example.com/code"></a></td>
                                                <td><input type="text" name="lien[]" class="form-control"
                                                        value="https://drive.google.com/dossier"></td>
                                            </tr>
                                            <tr>
                                                <td>Etat </td>
                                                <td>
                                                    <select class="form-control" id="project">
                                                        <option value="">Tous</option>
                                                        <option value="à faire">à faire</option>
                                                        <option value="en cours">en cours</option>
                                                        <option value="en pause">en pause</option>
                                                        <option value="terminé">terminé</option>
                                                                                                  
                                                    </select>
                                                </td>  
                                            </tr>
                                           
                                        </tbody>
                                      
                                    </table>
                                  
                                </div>
                                <div class="text-right m-5">
                                            <a type="submit" href="index.php" class="btn btn-info">Valider le brief</a>
                                        </div>
                            </div>
                            
                        </div>
                    </div>
                  
            </section>
        </div>
    </div>

 
    <!-- Inclure le pied de page -->
    <?php include_once $config['views_path']. 'footer.php' ?>

    </div>

    <!-- Inclure le script -->
    
</body>

</html>