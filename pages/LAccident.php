<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <?php session_start(); 
   if($_SESSION['Level']!=3)
   {
    header('Location: Login.php');
   }
  ?>
  <title>G.D.A</title>

  <!-- Custom fonts for this template-->
  <link href="../Style1/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <script src="../Style1/vendor/jquery/jquery.min.js"></script>
  <link href="../Style1/css/sb-admin-2.min.css" rel="stylesheet">
  <script src='../app/api3.js'></script>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
        <i class="fas fa-server"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Gestion Des Accidents</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Liste des Operations</span></a>
      </li>

      
      <hr class="sidebar-divider">

      <div class="sidebar-heading">
        Navigation
      </div>


      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Operations</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Operations de Creation :</h6>
            <a class="collapse-item" href="inscrip.php">Creer un Compte</a>
            <a class="collapse-item" href="">Liste des Accidents</a>
            <a class="collapse-item" href="Index.php">Liste des Comptes</a>
            <a class="collapse-item" href="Accident.php">Declarer Un Accident</a>  
          </div>
        </div>
      </li>

  
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Utilite:</h6>
            <a class="collapse-item" href="Statistiques.php">Statistiques</a>
          </div>
        </div>
      </li>

     

      

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['Nom'],' ',$_SESSION['Prenom']; ?></span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <?php
         require '../api/AccidentFunc.php';
        $Emp= new Emp;
        $Result=$Emp->readAccidents();
        
        ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>
 
          <input type="text" name="" id="searchAC" hidden>
            <div class="card shadow mb-12">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Liste Des Accidents</h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    
                  <div class="row">
                    <div class="col-sm-12">
                      <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                    <thead>
                      <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 25%;">Num Fiche</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width:  10%;">Nom</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width:  10%;">Prenom</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width:  20%;">Temps De L'accident</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width:  20%;">Date de L ' accident</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width:  20%;">Evalué</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width:  20%;">Actions</th>
                       </tr>
                    </thead>
                   
                    <tbody>
                      <?php

                       while($row = $Result->fetch())
                     { $Result1=$Emp->readEmp($row['Mat_emp']);
                        $row2=$Result1->fetch();
                       echo ' <tr role="row" class="odd">';
                      echo '<td class="sorting_1">',$row['0'],'</td>';
                      echo '<td>',$row2['Nom'],'</td>';
                      echo '<td>',$row2['Prenom'],'</td>';
                      echo '<td>',$row['Heure_AC'],'</td>';
                      echo '<td>',$row['Dat_AC'],'</td>';
                      if($row['Evalue']==1)
                      {echo '<td style="text-align:center;"><a href="#" class="btn btn-success btn-circle">
                        <i class="fas fa-check"></i>
                      </a></td>';}
                      else
                      {
                        echo '<td style="text-align:center;"><a href="#" class="btn btn-danger btn-circle">
                        <i class="fas fa-times-circle"></i>
                        </a></td>';
                      }
                      
                      echo '<td style="text-align:center;"><div class="Rech" data-id="',$row[0],'"><button data-toggle="modal" data-target="#Rapport1"   style="margin:5;" href="#" class="btn btn-primary btn-circle"><i class="fa fa-info"></i></button>
                      ';
                               
                              
                      echo '</tr>';
                     }
                     
                      ?>
                    </tbody>
                  </table></div></div>
                  </div>
                </div>
              </div>
            </div>
          

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../Style1/vendor/jquery/jquery.min.js"></script>
  <script src="../Style1/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../Style1/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../Style1/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../Style1/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../Style1/vendor/datatables/dataTables.bootstrap4.min.js"></script>


  <!-- Page level custom scripts -->
  <script src="../Style1/js/demo/datatables-demo.js"></script>

</body>
<div id="Rapport1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
  <div class="modal-content">
      
    <div class="modal-body" style="overflow:auto;height:500px;">
      <label for="">Numero du Fiche : </label>
        <p id='Fiche'></p>
      <label for="">Matricule de L'Employee : </label>
        <p id='Mat_emp'></p>
        <label for="">Nom et Prenom : </label>
         <p id='Nom'></p>
        <hr>
      <label for="">Date de L'Accident : </label>
        <p id='Dat_AC'></p>
      <label for="">Accident de Travail ou de Trajet : </label>
        <p id='Accident_Travail'></p>
      <label for="">Tryptique : </label>
        <p id='Tryptique'></p>
      <label for="">Heure de L'Accident : </label>
        <p id='Heure_AC'></p>
      <label for="">Evalue : </label>
        <p id='Evalue'></p>
        <hr>
      <label for="">Nature des Sieges et des Lesions : </label>
        <p id="Nat_sieg"></p>
      <label for="">Date du Repos</label>
      <p>De <p id="de"></p> à <p id='a'></p></p>
    
  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Rapport2" data-dismiss="modal">Suivant</button>
        <button type="button" class="btn btn-danger"  data-dismiss="modal">Fermer</button>
      </div>
    </div>

  </div>
</div>

<!-- Rapport 2 -->
<div id="Rapport2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body" style="overflow:auto;height:500px;">
       <h4>Liste des Lesions</h4>
         <ul id='Lesions'>
         </ul>
        <table class='table'>
        <thead>
        <th colospan='2'><h3 style='text-align:center'>Renseignement</h3></th>
        </thead>
        <tbody>
        <tr><td> Poste : </td><td id='Poste'></td></tr>
        <tr><td> Depuis : </td><td id='Depuis'></td></tr>
        <tr><td> Habituel : </td><td id='Habituel'></td></tr>
        <tr><td> Depuis : </td><td id='depuis2'></td></tr>
        <tr><td> Date de Repos : </td><td id='Date_repos'></td></tr>
        <tr><td> Horaire de Travail : </td><td id='Horaire_Tra'></td></tr>
        <tr><td>Description de L'Accident : </td><td id='Descr'></td></tr>
        </tbody>
   
        </table>
       
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Rapport3" data-dismiss="modal">Suivant</button>
      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#Rapport1" data-dismiss="modal">Precedent</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
      </div>
    </div>

  </div>
</div>
<!-- Rapport 3 -->
<div id="Rapport3" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body">
       <table class='table'>
       <thead>
       <th style='text:align:center;'>
       Remarques de Chef Service du Sécurité
       </th>
       <th style='text:align:center;'>
       Remarques de Chef Service du Victime
       </th>
       </thead>
       <tbody>
       <tr>
       <td id='ChefVic'></td>
       <td id='ChefSec'></td>
       </tr>
       <tr>
       <th colspan='2'>Remarques de La Direction </th>
       </tr>
       <tr>
       <td colspan='2' id='Direction'></td>
       </tr>
       </tbody>
       </table>
       <hr>
       <h3 style='text-align:center;'>Les Causes de L'Accident</h3>
        <ul id='causes'>
        </ul>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#Rapport2" data-dismiss="modal">Precedent</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
      </div>
    </div>

  </div>
</div>

</html>
