<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion Des Accidents</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../app/api2.js"></script>
    <link href="../Style/toastr/build/toastr.css" rel="stylesheet"/>
    <script src="../Style/toastr/toastr.js"></script>
    <script src="../app/Verif2.js"></script>
<?php
require '../api/AccidentFunc.php';
       session_start();
       
      
       if($_SESSION['Level']==1 || $_SESSION['Level']==3)
       {$_SESSION["search"]=$_POST["search"];
       $_SESSION["dateAC"]=$_POST["dateAC"];
       $_SESSION["AC"]=$_POST["AC"];
       $_SESSION["TD"]=$_POST["TD"];
       $_SESSION["HeureAC"]=$_POST["HeureAC"];
       $row3= array("Causes"=>'',"ChefVic"=>'',"ChefSec"=>'',"Direction"=>'',"tete"=>'',"MemS"=>'',"Yeux"=>'',"MemI"=>'',"Mains"=>'',"LocI"=>'',"Tronc"=>'',"LocM"=>'',"Pieds"=>'');
      }
       if($_SESSION['Level']==2)
       {$_SESSION["LesDes"]=$_POST["LesDes"];
       $_SESSION["de"]=$_POST["de"];
       $_SESSION["a"]=$_POST["a"];


       $_SESSION["Poste"]=$_POST["Poste"];
       $_SESSION["Depuis1"]=$_POST["Depuis1"];
       $_SESSION["Habituel"]=$_POST["Habituel"];
       $_SESSION["Depuis2"]=$_POST["Depuis2"];
       $_SESSION["DateRepos"]=$_POST["DateRepos"];
       $_SESSION["Horaire"]=$_POST["Horaire"];
       $_SESSION["DescAC"]=$_POST["DescAC"];
      $Med= new Emp;
      $Result3=$Med->readSecurite(6);
      $row3=$Result3->fetch();
      }
     $Emp= new Emp;
     $Result=$Emp->readFiche();
     $row=$Result->fetch();
     //var_dump($row);
     if($row['Fiche']!=$_SESSION['Fiche'] && $_SESSION['Level']==1 || $_SESSION['Level']==3)
    { $request =$Emp->InsertFiche($_SESSION['Fiche'],$_SESSION['search'],$_SESSION['dateAC'],$_SESSION['AC'],$_SESSION['TD'],$_SESSION["HeureAC"]);
       
    }
     else if($row['Fiche']==$_SESSION['Fiche'] && $_SESSION['Level']==2)
     {
      $request=$Emp->InsertSCMed($_SESSION['Fiche'],$_SESSION["LesDes"],$_SESSION["de"],$_SESSION["a"]);
      $request=$Emp->InsertRen($_SESSION['Fiche'],$_SESSION['Poste'],$_SESSION['Depuis1'],$_SESSION['Habituel'],$_SESSION['Depuis2'],$_SESSION['DateRepos'],$_SESSION['Horaire'],$_SESSION['DescAC']);
     }
     $request = $Emp->readEmp(1);
     $data=$request->fetch();
    ?>
    <script>
     
    
     $(document).ready(function() {
      
      $('#search').val('<?php echo $_SESSION['search']; ?>');
      if($('#niv').val()==2) 
   { $('#ChefVic').val('<?php echo $row3['ChefVic']; ?>');
    $('#ChefSec').val('<?php echo $row3['ChefSec']; ?>');
    $('#Direction').val('<?php echo $row3['Direction']; ?>');
    
    //tete
    x='<?php echo $row3['tete']; ?>';
    if(x=='True')
     {
       $('#tete').attr("checked","true");
    }
   
   //MemS
    if('<?php echo $row3['MemS']; ?>'=='True')
     {
       $('#MemS').attr("checked","true");
    }
    
    //Yeux
    if('<?php echo $row3['Yeux']; ?>'=='True')
     {
       $('#Yeux').attr("checked","true");
    }
   
    //MemI
    if('<?php echo $row3['MemI']; ?>'=='True')
     {
       $('#MemI').attr("checked","true");
    }
    
   //Mains
    if('<?php echo $row3['Mains']; ?>'=='True')
     {
       $('#Mains').attr("checked","true");
    }
    
    //LocI
    if('<?php echo $row3['LocI']; ?>'=='True')
     {
       $('#LocI').attr("checked","true");
    }
   
   //Tronc
    if('<?php echo $row3['Tronc']; ?>'=='True')
     {
       $('#Tronc').attr("checked","true");
    }
   
    //LocM
    if('<?php echo $row3['LocM']; ?>'=='True')
     {
       $('#LocM').attr("checked","true");
    }
    
    //Pieds
    if('<?php echo $row3['Pieds']; ?>'=='True')
     {
       $('#Pieds').attr("checked","true");
    }
    
   
  }

    });
    </script>
    <style>
    #Board{
    border: 2px solid #1C6EA4;
    border-radius: 16px;
    -webkit-box-shadow: 7px 11px 6px 0px rgba(0,0,0,0.62); 
     box-shadow: 7px 11px 6px 0px rgba(0,0,0,0.62);
   }
   </style>
       <script>
       niv=<?php echo $_SESSION['Level'];?> ;
        if(niv==2)
       {x='<?php if($row3['Causes']!='') {echo $row3['Causes'];} else {echo 'empty';}?>' ;
        x=x.split('*');
        }
  
var app = angular.module("Cause", []); 
app.controller("myCtrl", function($scope) {
    $scope.Cause = [];
    $scope.addItem = function () {
        $scope.errortext = "";
        if (!$scope.addMe) {$scope.errortext = "Champ Vide" ;return;}
        if ($scope.Cause.indexOf($scope.addMe) == -1) {
            $scope.Cause.push($scope.addMe);
        } else {
            $scope.errortext = "Ce Cause est Ajouté";
        }
    }
    if(niv==2)
   {$scope.Cause=x;}
   else{
    var ch ='';
    $scope.removeItem = function (x) {
        $scope.errortext = "";    
        $scope.Cause.splice(x, 1);
    }
   
    $('document').ready(function(){
        $('#Submit').click(function(){
           ch = $scope.Cause.join(" * ");
           $('#Test').val(ch);
           
        });
    });
  }
});
</script>
   <script>
            var d = new Date();
            $(document).ready(function() {
                x=d.getFullYear()+"/"+d.getMonth()+"/"+d.getDate()+"  "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
                $('#Time').text(d.getFullYear()+"/"+d.getMonth()+"/"+d.getDate()+"  "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds());
            });
    </script>
    
  </head>
  <body id="body">
  
  <input type="text" class="form-control" value='' id="search" name="search" hidden>
     <form action="Submit.php" id="form_id" onsubmit="OK"  method="POST">
         <div id='Board' style="margin:2%; align:center;">
         <input type="text" value='<?php echo $_SESSION['Level']; ?>' id="niv" hidden>
         <table class='table'>
     <tr>
       <th colspan='2' style="width:  20%;">
          Informations de Securite 
       </th>
       <th id='Time' style='text-align:Right;'>
       </th>
     </tr>
     <tr>
          <th  style="width:  20%;">
           Nom :
          </th>
          <td>
          <?php echo $_SESSION["Nom"]; ?>
          </td>   
     </tr>
     <tr>
          <th>
           Prenom :
          </th>
          <td>
          <?php echo $_SESSION["Prenom"]; ?>
          </td>    
     </tr>
 </table>
 <div class="form-group col-md-8 "style="margin-top:3%;">
                            <label class="control-label col-sm-6" for="MDV">Numero Du Fiche D'Accident : <?php echo $_SESSION["Fiche"]; ?></label>
                            <div class="col-sm-4">
                            
                            </div>
                            
            </div>
              <div class="form-group" style="margin-left:20%;">
                <table class="table">
                    <tr>
                        <th>Nom : </th>
                        <td id="Nom"></td>
                        <th>Prenom :</th>
                        <td id="Prenom"></td>
                        <td>Date D'Embauche</td>
                        <td id='Date_em'></td>
                    </tr>
                    <tr>
                        <th>Age : </th>
                        <td id="Age"></td>
                        <th>Fonction : </th>
                        <td id="Fonc"></td>
                        <th>Adresse :</th>
                        <td id="Adr"></td>
                        <td>Code Securite Sociale :</td>
                   <td id="Code"></td>
                    </tr>
                </table>
                
              </div>
            <div class="form-group" style="margin-left:2%;margin-right:2%; align:center;">
               <table class="table">
               <tr>
               <th style="text-align:center;"><label for=""><h4 style="text-decoration: underline;">SCE SECURITE USINE : </h4></label></th>
                  <table class="table">
                    <tr>
                      
                      <td>
                        <label for="">Polyaccidenté : </label>
                      </td>
                      <td>
                        
                         <td>
                          OUI <input type="radio" name="Poly" id="Poly" value="OUI" >
                         </td>
                         <td>
                         NON <input type="radio" name="Poly" id="Poly1" value="NON">
                         </td>
                        
                      </td>
                    </tr>
                    <tr>
                     <th><label for="">Localisation des Lésions</label></th>
                     <th>Date des Accidents Précedents</th>
                    </tr>
                    <tr>
                    <td><table class="table table-borderless">
                       
                      <tr>
                         <td><label for="">Tete</label> <input type="checkbox" name="tete" id="tete" ></td>
                         <td><label for="">Membranes Superieur</label> <input type="checkbox" name="MemS" id="MemS" ></td>
                       </tr>
                      <tr>
                        <td><label for="">Yeux</label> <input type="checkbox" name="Yeux" id="Yeux" ></td>
                        <td><label for="">Membranes Inferieur</label> <input type="checkbox" name="MemI" id="MemI" ></td>
                       </tr>
                      <tr>
                        <td><label for="">Mains</label> <input type="checkbox" name="Mains" id="Mains"></td>
                        <td><label for="">Loc Interne</label> <input type="checkbox" name="LocI" id="LocI" ></td>
                     </tr>
                      <tr>
                        <td><label for="">Tronc</label> <input type="checkbox" name="Tronc" id="Tronc" ></td> 
                        <td><label for="">Loc Multiple</label> <input type="checkbox" name="LocM" id="LocM"></td>
                      </tr>
                      <tr>
                        <td><label for="">Pieds</label> <input type="checkbox" name="Pieds" id="Pieds" ></td> 
                      </tr>
                      </table>     </td>
                      <td><div id="AcciP"></div> </td>        
                    </tr>
                    <tr>
                     
                    </tr>

                  </table>
               </tr>
               <tr>
               <th style="text-align:center;"><label for=""><h4 style="text-decoration: underline;">SCE SECURITE USINE : </h4></label></th>
               </tr>
               </table>
               <table class='table table-borderless'>
                   <tr>
                       <th colspan="" style='padding:2%;text-align:left;'>
                         <label for=""><h4>Remarques Complementaire Du Chef Service de la Victime : </h4></label>
                       </th>
                   <th colspan="" style='padding:2%;text-align:left;'>
                   <label for=""><h4>Remarques Complementaire Du Chef Service Sécurité : </h4></label>
                   </th>
                   </tr>
                   <tr>
                      <td colspan="" style='padding-left:5%;'rowspan='7'>
                      <textarea name="ChefVic" id="ChefVic" cols="60" rows="10" value='' required></textarea>
                      </td>
                      <td colspan="" style='padding-left:5%;;'rowspan='7'>
                      <textarea name="ChefSec" id="ChefSec" cols="60" rows="10" value='' required></textarea>
                      </td>                
                   </tr>
                   
               </table>
               <table class="table table-borderless">
               <tr>
                     <th style='padding:2%;text-align:left;' colspan="2"><label for="">De la Direction</label></th>
                   </tr>
                   <tr>
                   <td colspan="2"><textarea  name="Direction" id="Direction" cols="120" value=''  rows="5"></textarea></td>
                   </tr>
               </table>
               <table class=""style="text-align:center;width:100%;margin-left:30%; ">
                  <tr>
                    <th class="row">
<div ng-app="Cause" ng-cloak ng-controller="myCtrl" class="w3-card-2 w3-margin" style="max-width:400px;">
  <header class="w3-container w3-light-grey w3-padding-16">
    <h3>Causes de L'Accident</h3>
  </header>
  <ul class="w3-ul" style='overflow: scroll;width: 100%;
  height: 185px;'>
    <li ng-repeat="x in Cause" class="w3-padding-16">{{x}}<span ng-click="removeItem($index)" style="cursor:pointer;" class="w3-right w3-margin-right">×</span></li>
  </ul>
  <div class="w3-container w3-light-grey w3-padding-16">
    <div class="w3-row w3-margin-top">
      <div class="w3-col s9" style="">
        <div style="">
        <select name="" id="causes" ng-model="addMe" class="w3-input w3-border w3-padding" style= >
          <option value="Defaut Protection">Défaut Protection</option>
          <option value="Protection individuelle non prevue">Protection individuelle non prévue</option>
          <option value="Defaut Conception">Defaut Conception</option>
          <option value="Procedure Inexistante">Procédure Inexistante</option>
          <option value="Outil en Mauvais Etat">Outil en Mauvais Etat</option>
          <option value="Procedure Inadequate">Procédure Inadéquate</option>
          <option value="Equipement Defectueux">Equipement Defectueux</option>
          <option value="Procedure mal utilise">Procédure mal utilise</option>
          <option value="Disposition Dangereuse">Disposition Dangereuse</option>
          <option value="Procedure non utilise">Procédure non utilisé</option>
          <option value="Defaut d'eclairage">Défaut d'eclairage</option>
          <option value="Preparation Travail">Préparation Travail</option>
          <option value="Etat des Sols">Etat des Sols</option>
          <option value="Controle Travail">Controle Travail</option>
          <option value="Etat de Proprete Lieux">Etat de Propreté Lieux</option>
          <option value="Explications Succinctes">Explications Succinctes</option>
          <option value="Bruits">Bruits</option>
          <option value="Explications ma comprises">Explications ma comprises</option>
          <option value="Conditions Meteo">Conditions Météo</option>
          <option value="Phenomene externe">Phénoméne externe</option>
          <option value="Distractions">Distractions</option>
          <option value="Etat Physique Victime">Etat Physique Victime</option>
          <option value="Action Sans Permis">Action Sans Permis</option>
          <option value="Incident Voisin">Incident Voisin</option>
          <option value="Securite Neutralises">Sécurité Neutralisés</option>
          <option value="Feu - Fuite avec Feu">Feu - Fuite avec Feu</option>
          <option value="Emploi anormal des Equipements">Emploi anormal des Equipements</option>
          <option value="Explosion">Explosion</option>
          <option value="Emploi anormal des Produits">Emploi anormal des Produits</option>
          <option value="Emploi Vehicule">Emploi Vehicule</option>
          <option value="Position de Travail">Position de Travail</option>
          <option value="Tiers Origine">Tiers Origine</option>
          <option value="Protection individuelle">Protection individuelle</option>
          <option value="Societe">Société</option>

        </select>
        </div>
      </div>
      <div class="w3-col s2">
        <button ng-click="addItem()" type='button' id='AJ'class="w3-btn w3-padding w3-green">Ajouter</button>
      </div>
    </div>
    <input type="text" name="Items" id="Test" hidden>
    <p class="w3-text-red">{{errortext}}</p>
  </div>
</div>
                    </th>
                  </tr>
                   
               </table>
            </div>
            <div style="text-align:center;">
       <button type="Submit" id="Submit" style='margin:2%;' name='Suivant' class="btn btn-success btn-lg">Submit </button>
    </div>
         </div>
     </form>
  </body>
</html>