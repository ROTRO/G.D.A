<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="../Style/toastr/build/toastr.css" rel="stylesheet"/>
    <script src="../Style/toastr/toastr.js"></script>
    <script src="../app/api.js"></script>
    <script src="../app/Verif.js"></script>
   
        <script>
            var d = new Date();
            $(document).ready(function() {
                x=d.getFullYear()+"/"+d.getMonth()+"/"+d.getDate()+"  "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
                $('#Time').text(d.getFullYear()+"/"+d.getMonth()+"/"+d.getDate()+"  "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds());
            });
    </script>
   <style>
   .Res td{
      padding-bottom:0%;
   }
   #Board
   {
    border: 2px solid #1C6EA4;
    border-radius: 16px;
    -webkit-box-shadow: 7px 11px 6px 0px rgba(0,0,0,0.62); 
     box-shadow: 7px 11px 6px 0px rgba(0,0,0,0.62);
   }
   </style>
        <title>Gestion Des Accidents</title>
</head>
<body>
   <?php
     session_start();
     require '../api/AccidentFunc.php';
     $Emp= new Emp;
     $request = $Emp->readEmp(1);
     $data=$request->fetch();
     $evalue='';
     if($_SESSION['Level']==2)

     {if(empty($_GET['Evalue']))
      {$evalue=$_GET['Evalue'];
       $_SESSION['Fiche']=$_GET['Fiche'];
       $_SESSION['Evalue']=$_GET['Evalue'];
       $res=$Emp->readAccidentSc($_GET['Fiche']);
       $row=$res->fetch();
       $_SESSION['search']=$row['Mat_emp'];
    }
     }
    
    ?>
<?php
   if( $_SESSION['Level']==2 &&  $_SESSION['Evalue']==0)
    {echo "<script>
      $(document).ready(function() {
            if($('#niv').val()==2 && $('#eva').val()==0)
              {
                $('#dateAC').val('",$row['Dat_AC' ],"');
                $('#HeureAC').val('",$row['Heure_AC' ],"');
                $('#search').val('",$row['Mat_emp' ],"');
               
                if($('#AC').val()=='Accident_de_Travail')
                  {
                    $('#AC').attr('checked','true');
                  }
                  else{
                    $('#AC1').attr('checked','true');
                  }
                  if($('#TD').val()=='OUI')
                  {
                    $('#TD').attr('checked','true');
                  }
                  else{
                    $('#TD1').attr('checked','true');
                  }
                
              }
      });
    </script>";
  }
?>
     <input id='niv' value='<?php echo $_SESSION['Level']; ?>' hidden>
     <input id='eva' value='<?php echo $evalue; ?>' hidden>
<form action="Accident2.php" id="form_id"   method="POST" >
 <div id='Board' style="margin:2%; align:center;">
  <table class='table'>
     <tr>
       <th colspan='2' style="width:  20%;">
          Informations de Securite
       </th>
       <th id='Time' style='text-align:Right;'>
       </th>
     </tr>
     <tr>
          <td  style="width:  20%;">
           Nom :
          </td>
          <td>
          <?php echo $_SESSION["Nom"]; ?>
          </td>   
     </tr>
     <tr>
          <td>
           Prenom :
          </td>
          <td>
          <?php echo $_SESSION["Prenom"]; ?>
          </td>    
     </tr>
 </table>
            <div class="form-group col-md-8 "style="margin-top:3%;">
                            <label class="control-label col-sm-3" for="MDV">Numero Du Fiche D'Accident :</label>
                            <div class="col-sm-2">
                            <?php echo $_SESSION["Fiche"]; ?>
                            </div>
                            
            </div>
    <div class="form-group col-md-8 "style="margin-top:3%;">
                            <label class="control-label col-sm-3" for="MDV">Matricule du Victim :</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="search" name="search">
                            </div>
                            
     </div>
     
     <div class="form-group" style="margin-left:20%;">
           <table class="table">
               <tr>
                   <td>Nom : </td>
                   <td id="Nom"></td>
                   <td>Prenom :</td>
                   <td id="Prenom"></td>
                   <td>Date D'Embauche</td>
                        <td id='Date_em'></td>
               </tr>
               <tr>
                   <td>Age : </td>
                   <td id="Age"></td>
                   <td>Fonction : </td>
                   <td id="Fonc"></td>
                   <td>Adresse :</td>
                   <td id="Adr"></td>
                   <td>Code Securite Sociale :</td>
                   <td id="Code"></td>
               </tr>
           </table>
       </div>
    <div class="form-group" style="margin-left:2%;margin-right:2%; align:center;">
       <table class="table">
       <tr>
           <td>
             <div class="col-md-8">
             <label for="date-picker-example">Date  de L'accident</label>
             </div>
           </td>
           <td>
              <div class="">
              <label for="date-picker-example">mettre Croix dans la case ad-hoc</label>
              </div>
           </td>
       </tr>
       <tr>
       <td>
       <div class="col-md-5">
              <input type="date" id="dateAC" name="dateAC" value="2000-01-24" class="form-control datepicker">
       </div> 
       </td>
       <td>
          <div>
             <table>
                  <tr>
                     <td>
                      <input type="radio" id="AC" name="AC" value="Accident_de_Travail" > Accident de Travail 
                     </td>
                     <td>
                       <input type="radio" id="AC1" name="AC" value="de_Trajet" > de Trajet
                     </td>
                  </tr>
                  <tr>
                     <td>
                       Tryptique délivré 
                     </td>
                     <td>
                     <input type="radio" id="TD" name="TD" value="OUI" >  OUI 
                     </td>
                     <td>
                     <input type="radio" id="TD1" name="TD" value="NON" > NON
                     </td>
                  </tr>
                  
             </table>
          </div>
       </td>
       </tr>
       <tr>
                   <td>
                   <label for="date-picker-example">Heure de L'accident</label>
                   </td>
                   <td>
                   </td>
                   </tr>
                   <tr>
                   <td class="">
                   <div class="col-md-5">
                       <input type="time" id="HeureAC" value='10:10'name="HeureAC" class="form-control">  
                    </div>
                    </td>
                   </tr>
                   <tr>
                       <td colspan="2"style='text-align:center;' class='col-sm-5'>
                           <label class=""><h3>Service Medical</h3></label>
                       </td>
                   </tr>
                   <tr>
                       <td>
                          <label > Nature et Siege des lésions : </label>
                       </td>
                       <th>
                           <label for="">Arret Probable </label>
                       </th>
                   </tr>
                   <tr>
                   
                       <td>
                       <div class="col-md-6">
                       <input type="text" id="LesDes" name="LesDes"class="form-control ">  
                       </div>
                       </td>

                       <td>
                       de <input type="date" id="de" name="de" class="form-control">  à <input type="date"  id="a" name="a" class="form-control datepicker"> 
                       </td>
                   </tr>
                   <tr  >
                       <td class='col-sm-5'colspan="2"style='text-align:center;'>
                       <label class=""><h3>Renseignements Complementaires</h3></label>
                       </td>
                   </tr>
                   <tr>
                       <td>
                           <table>
                               <tr class="Res">
                                   
                                   <td style='padding-left:5%;text-align:center;'><label for="">Description Succincte de L'Accident</label></td>
                                   
                                </tr>
                                <tr  class="Res">

                                   <td>
                                       <label for="">Poste lors de L'Accident : </label>
                                   </td>
                                  
                                   <td>
                                   <input type="text" id="Poste" name="Poste" class="form-control "> 
                                   </td>
                                   <td style='padding-left:5%;padding-top:-15%;'rowspan='7'>
                                   <textarea name="DescAC" id="DescAC" cols="50" rows="10"></textarea>
                                   </td>
                                </tr>
                                <tr class="Res">
                                   <td>
                                      <label> depuis : </label>
                                   </td>
                                   
                                   <td>
                                   <input type="date" id="Depuis1" name="Depuis1"class="form-control " >  
                                   </td>
                               </tr>
                                   <tr class="Res">
                                   <td><label for="">Habituel : </label></td>
                                   
                                   <td>
                                   <input type="text" name="Habituel" id='Habituel'name="Habituel"class="form-control " required> 
                                   </td>
                               </tr>
                                   <tr class="Res">
                                   <td>
                                      <label> depuis : </label>
                                   </td>
                                   
                                   <td>
                                   <input type="date" id="Depuis2" name="Depuis2"class="form-control " >  
                                   </td>
                               </tr>
                                   <tr class="Res">
                                   <td>
                                      <label for=""> Date du Dernier Repos : </label>
                                   </td>
                                  
                                   <td>
                                   <input type="date" id="DateRepos" name="DateRepos" class="form-control "> 
                                   </td>
                                </tr>
                                   <tr class="Res">
                                   <td>
                                       <label for="">Horaire de Travail : </label>
                                   </td>
                                   <td>
                                   <div class="form-group">
                                      <select class="form-control" name="Horaire" id="Horaire">
                                        <option>3 X 8</option>
                                        <option>2 X 8</option>
                                        <option>Postes Nuit</option>
                                        <option>Matin</option>
                                        <option>Soir</option>
                                        <option>Journalier</option>
                                      </select>
                                    </div>
                                   </td>
                               </tr>
                           </table>
                       </td>
                   </tr>
             
            
       </table>
       </div>
       <div style="text-align:center;">
       <button type="button" id="Submit" style='margin:2%;' name='Suivant' class="btn btn-success btn-lg">Suivant</button>
    </div>
    </div>
    
   
    </form>
</body>
</html>