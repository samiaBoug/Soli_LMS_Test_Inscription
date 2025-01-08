<?php 
include_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
$current_route = $_SERVER['REQUEST_URI']; 
$role = $_SESSION['role'];
?>

<aside class="main-sidebar sidebar-dark-info elevation-4 position-fixed">

  <!-- Logo de la marque -->
  <div  class="brand-link">
    <img src="../../public/images/logo.png" class="brand-image img-circle elevation-3" alt="Image de groupe">
    <span class="brand-text font-weight-light text-center h6">Solicode LMS</span>
  </a>

  <!-- Barre latérale -->
  <div class="sidebar">
    <!-- Menu latéral -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
      <li class="nav-item">
            <a href="/views/includes/dashboard.php"
              class="nav-link <?php echo (strpos($current_route, 'home') !== false) ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Accueil
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/views/Responsable/test.php"
              class="nav-link">
              <i class="fas fa-cogs"></i>
              <p>
                Tests Manager
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/views/Responsable/index.php"
              class="nav-link">
              <i class="fas fa-cogs"></i>
              <p>
                Inscrits Manager
              </p>
            </a>
          </li>
          


<?php

?>
        
      

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>