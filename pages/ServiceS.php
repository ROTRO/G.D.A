<!DOCTYPE html>
<html lang="en">
<head>
<?php
require_once '../api/AccidentFunc.php';
$Emp = new Emp;
$Result=$Emp->readAccidents();
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="../Style1/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../Style1/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="../Style1/vendor/jquery/jquery.min.js"></script>
  <script src="../Style1/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src='../app/api3.js'></script>
  <?php session_start() ;
    if($_SESSION['Level']!=1)
     {header('Location: Login.php');}
  ?>
    <title>G.D.A</title>
</head>
<body>  
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
  <i class="fa fa-bars"></i>
</button>

<!-- Topbar Search -->
<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
  <div class="input-group">
     <a href="Accident.php" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Declarer Un Accident</span>
                  </a>
    </div>
  </div>
</form>

<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

  <!-- Nav Item - Search Dropdown (Visible Only XS) -->
  <li class="nav-item dropdown no-arrow d-sm-none">
    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-search fa-fw"></i>
    </a>
    <!-- Dropdown - Messages -->
    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
      <form class="form-inline mr-auto w-100 navbar-search">
        <div class="input-group">
          <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search fa-sm"></i>
            </button>
          </div>
        </div>
      </form>
    </div>
  </li>

  <!-- Nav Item - Alerts -->
  
  

  <div class="topbar-divider d-none d-sm-block"></div>

  <!-- Nav Item - User Information -->
  <li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['Nom'],'  ',$_SESSION['Prenom']; ?></span>
      <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
    </a>
    <!-- Dropdown - User Information -->
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
      <a class="dropdown-item" href="Accident.php">
        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
        Declarer Un Accident
      </a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        Logout
      </a>
    </div>
  </li>

</ul>

</nav>
<div class='w3-display-middle' style='margin:5%;overflow:scroll;width:700px;height:450px;'>
    <table class='table w3-border w3-bordered' style='text-align:center;'>
      <tr>
        <th Style='Width:23%;text-align:center;'>
         Numero Fiche
        </th>
        <th Style='Width:15%;text-align:center;'>
         Nom
        </th >
        <th Style='Width:15%;text-align:center;'>
        Prenom
        </th>
        <th Style='Width:20%;text-align:center;'>
         Evalue
        </th>
        <th Style='Width:27%;text-align:center;'>
        Actions
        </th>
        <tbody>
        <?php 
          while($row = $Result->fetch())
          {
             $Result1=$Emp->readEmp($row['Mat_emp']);
             $row2=$Result1->fetch();
             echo ' <tr role="row" class="odd">';
             echo '<td class="sorting_1">',$row[0],'</td>';
             echo '<td>',$row2['Nom'],'</td>';
             echo '<td>',$row2['Prenom'],'</td>';
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
                      
                      
                     echo '</td>';
             echo '</tr>';}
        ?>
        </tbody>
      
    </table>

    </div>
    <input type="text" name="" id="searchAC" hidden>
</body>
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

<!-- Rapport 1 -->
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