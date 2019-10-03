
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src='../app/api4.js'></script>
<?php
 session_start();
 require_once '../api/AccidentFunc.php';

 if($_SESSION['Level']==1 || $_SESSION['Level']==3)
{$tete="False";
$MemS="False";
$MemI="False";
$Yeux="False";
$Mains="False";
$Tronc="False";
$LocI="False";
$LocM="False";
$Pieds="False";
$Poly="False";

 $_SESSION["Poly"]=$_POST["Poly"];
if(!empty($_POST['Tete']))
 {
    $tete='True';
 }
 if(!empty($_POST['Poly']))
 {
    $tete='True';
 }
 if(!empty($_POST['MemS']))
 {
    $MemS='True'; 
 }
 if(!empty($_POST['MemI']))
 {
    $MemI='True'; 
 }
 if(!empty($_POST['Yeux']))
 {
    $Yeux='True'; 
 }
 if(!empty($_POST['Mains']))
 {
    $Mains='True';
 }
 if(!empty($_POST['LocI']))
 {
    $LocI='True'; 
 }
 if(!empty($_POST['Tronc']))
 {
    $Tronc='True';  
 }
 if(!empty($_POST['LocM']))
 {
    $LocM='True'; 
 }
 if(!empty($_POST['Pieds']))
 {
    $Pieds='True';
 }
 $_SESSION["tete"]=$tete;
 $_SESSION["MemS"]=$MemS;
 $_SESSION["MemI"]=$MemI;
 $_SESSION["Yeux"]=$Yeux;
 $_SESSION["Mains"]=$Mains;
 $_SESSION["Tronc"]=$Tronc;
 $_SESSION["LocI"]=$LocI;
 $_SESSION["LocM"]=$LocM;
 $_SESSION["Pieds"]=$Pieds;

 $_SESSION["ChefVic"]=$_POST["ChefVic"];
 $_SESSION["ChefSec"]=$_POST["ChefSec"];
 $_SESSION["Direction"]=$_POST["Direction"];
 $_SESSION["Items"]=$_POST['Items'];

 $Emp = new Emp;
 $Result3=$Emp->readFiche();
 $row=$Result3->fetch();
 //var_dump($row['Fiche']);
 if($row['Fiche']==$_SESSION['Fiche'] && $_SESSION['Level']==1 || $_SESSION['Level']==3)
 {
  $result=$Emp->InsertLesions($_SESSION['Fiche'],$tete,$MemS,$MemI,$Yeux,$Mains,$Tronc,$LocI,$LocM,$Pieds,$Poly);
  $result2=$Emp->InsertUsineSCE($_SESSION['Fiche'],$_SESSION["ChefVic"],$_SESSION["ChefSec"],$_SESSION["Direction"],$_SESSION["Items"]);
 }
}
else if( $_SESSION['Level']==2)
{
   $Emp = new Emp;
   $Result3=$Emp->Evaluer($_SESSION['Fiche']);
  
}
 
?>
<script>
$(document).ready(function() {
 $('#Deconnexion').click(function(){
  
  window.location.replace('Login.php');
     
   
 });
});
</script>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>G.D.A</title>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</head>
<body>
<input type="text" name="" id="searchAC" hidden>

<div class='Rech1'></div>

<?php
if($_SESSION['Level']==1 || $_SESSION['Level']==3)
{echo "  <script>
   const { value: Option } =  Swal.fire({
      title: 'Selectionner une Option',
      input: 'select',
      inputOptions: {
         Imprimer: 'Imprimer',
        Deconnexion: 'Deconnexion',
        Fiche: 'Reviser Le Fiche'
        
      },
      inputPlaceholder: 'Selectionner une Option',
      showCancelButton: true,
      inputValidator: (value) => {
        return new Promise((resolve) => {
          if (value == 'Deconnexion') {
             if(",$_SESSION['Level'],"==3)
              {window.location.replace('Index.php');}
             else
             {window.location.replace('ServiceS.php');}
          } else if (value == 'Fiche')
          {
          
            $('.Rech1').attr('data-id','",$_SESSION['Fiche'],"' );
            $('#Rapport1').modal('show');
             resolve();
            

          }
        })
      }
    })
</script> ";}
else if($_SESSION['Level']==2)
{echo "  <script>
Swal.fire({
type: 'success',
title: 'Rapport est Evalué Avec Succeé',
showConfirmButton: true,
confirmButtonColor: '#3085d6',
confirmButtonText: 'Retour',
timer: 150000
}).then((result) => {
if (result.value) {
   x= ",$_SESSION['Level'],";
    if( x == 2)
     {window.location.replace('ServiceM.php');}
       else
     {window.location.replace('Login.php');}
       
}
});
</script> ";}
?> 

</body>

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
      <label id="Date_em"></label>
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
       <h4>Polyaccidenté ? : </h4>
         <p id="Poly"></p>
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
        <button type="button" class="btn btn-danger" data-dismiss="modal" id='Deconnexion'>Deconnexion</button>
      </div>
    </div>

  </div>
</div>
<!-- -->

</html>
