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
  <link href="../Style1/css/sb-admin-2.min.css" rel="stylesheet">
  <script src="../Style1/vendor/jquery/jquery.min.js"></script>
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
            <a class="collapse-item" href="LAccident.php">Liste des Accidents</a>
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
            <h6 class="collapse-header">Utilite :</h6>
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
        $Result=$Emp->readAccounts();
         
        ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>
 
         
            <div class="card shadow mb-12">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Statistiques</h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    
                  <div class="row">
                  <div class="col-xl-8 col-lg-7">

<!-- Area Chart -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Nombres des Accident chaque Annee Par Mois</h6>
    <!--<input type="text" name="year" class='form-control'style='width:30%;padding-right:-5%'id="year"> <button id='find' class='btn btn-success'>Rechercher</button>-->
    <div class="input-group">
              <input type="text" name="year" id="year" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-success" id='find'type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
  </div>
  <div class="card-body">
    <div class="chart-area"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
      <canvas id="myAreaChart" style="display: block; width: 373px; height: 320px;" width="373" height="320" class="chartjs-render-monitor"></canvas>
    </div>
    <hr>
    
  </div>
</div>
<!-- ------------------------------------------------------------------------------------------------------------ -->


 <!-- -------------------------------------------------------------------------------------------------------------------------- -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"></h6>
  </div>
  <div class="card-body">
    <div class="chart-area"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
      <canvas id="myAreaChart2" style="display: block; width: 373px; height: 320px;" width="373" height="320" class="chartjs-render-monitor"></canvas>
    </div>
    <hr>
    
  </div>
</div>                  
</div>                  
                    
                     </div>
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
 
  
</body>
<script>
$(document).on('click', '.show-modal', function() {
            $('.modal-title').text('Show Account');
            $('#id_show').html($(this).data('id'));
            $('#Mat_show').text($(this).data('mat'));
            $('#Nom_show').html($(this).data('nom'));
            $('#Pre_show').html($(this).data('pre'));
            $('#Lev_show').html($(this).data('lev'));
            if($(this).data('act')==1)
            {$('#Act_show').html('<a href="#" class="btn btn-success btn-circle"><i class="fas fa-check"></i></a>');}
            else
            {$('#Act_show').html('<a href="#" class="btn btn-danger btn-circle"><i class="fas fa-times-circle"></i></a>');}
            $('#showModal').modal('show');
        });


        $(document).on('click', '.deleteModal', function() {
            $('#del_Nom').html($(this).data('nom'));
            $('#del_Pre').html($(this).data('pre'));
            $('#delphp').attr("data-id",$(this).data('id'));
            $('#showModal').modal('show');
        });
        $(document).on('click', '#delphp', function() {
          location.href = "del.php?id="+$(this).data('id');
        });

        $(document).on('click', '.conact', function() {
            
            $(this).data('id');
            if($(this).data('act')==1)
           { $('#conf').html('voulez vous Desactiver Ce Compte ?');
            $('#Actphp').attr("data-id",$(this).data('id'));
            $('#Actphp').attr("data-act",$(this).data('act'));
            $('#Actphp').html("Desactiver");
          }
            else
            {$('#conf').html('voulez vous Activer Ce Compte ?');
              $('#Actphp').attr("data-id",$(this).data('id'));
            $('#Actphp').attr("data-act",$(this).data('act'));
            $('#Actphp').html("Activer");
            }
            $('#Actphp').attr("href","Act.php?id="+$(this).data('id')+"&Act="+$(this).data('act'));
            $('#showModal').modal('show');
        });
        $(document).on('click', '#Actphp', function() {
          location.href = "Activate.php?id="+$(this).data('id')+"&Act="+$(this).data('act');
        });
        </script>
<!-- Les Information de lemploye Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Header -->
      <div class="modal-header">
        <h4 class="modal-title">Les Information de L'Employé</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- body -->
      <div class="modal-body">
        <table class='table table-borderless'>
        <tr>
          <td>
           Id : 
          </td>
          <td id="id_show">

          </td>
        </tr>
        <tr>
          <td>
            Mat : 
          </td>
          <td id="Mat_show">
          </td>
        </tr>
        <tr>
          <td>
           Nom : 
          </td>
          <td id="Nom_show">
          </td>
        </tr>
        <tr>
          <td >
            Prenom : 
          </td>
          <td id="Pre_show">
          </td>
        </tr>
        <tr>
          <td>
            Active : 
          </td>
          <td id="Act_show">
          </td>
        </tr>
        <tr>
          <td>
            Niveau : 
          </td>
          <td id="Lev_show">
          </td>
        </tr>
        </table>
      </div>

      <!-- footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="confirmact">
  <div class="modal-dialog">
    <div class="modal-content">

      
      <!-- body -->
      <div class="modal-body">
       <p id='conf'></p>
      </div>

      <!-- footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <a  href='' id='Actphp' class="btn btn-success" data-dismiss="modal">
          
        </a>
      </div>

    </div>
  </div>
</div>

<div id="deleteModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">Are you sure you want to delete the following Account?</h3>
                    <br />
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">Nom :</label>
                            <div class="col-sm-10">
                                <p id='del_Nom'></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="nom">Prenom : </label>
                            <div class="col-sm-12">
                                <p id='del_Pre'></p>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <a  href='' role="button" id='delphp' class="btn btn-danger" data-dismiss="modal">
                            Delete
                        </a>
                        <button type="button" data-id=''class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
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
  <script src="../Style1/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/charts/chart-area.js"></script>
 
  <script src="../js/charts/chart-area2.js"></script>

<!-- End -->
</html>
