<?php
require_once '../api/AccidentFunc.php';
$mat = $_POST['Matricule']; 
$mdp = $_POST['mdp']; 
$Emp = new Emp;
$Result=$Emp->CheckAccount($mat,$mdp);
var_dump($Result->rowCount());
if($Result->rowCount() > 0)
 {session_start();
  $Result=$Emp->readFiche();
 
    if($Result->rowCount()==0)
    {$_SESSION["Fiche"]=1;}
    else
    {
        $row=$Result->fetch();
        $_SESSION["Fiche"]=$row['id']+1;
    }
   $Res= $Emp->Login($mat);
  
    $Result=$Emp->readAcc($mat);
    $row2=$Result->fetch();
 
    $_SESSION['Nom']=$row2['Nom'];
    $_SESSION['Prenom']=$row2['Prenom'];
    $_SESSION['Level']=$row2['Level'];
   
    if($row2['Level']==1 && $row2['Active']==1)
    {
    header('Location: ServiceS.php');
    }
    else  if($row2['Level']==2 && $row2['Active']==1) 
    {
        header('Location: ServiceM.php');
    }
    else  if($row2['Level']==3 && $row2['Active']==1)
    {
        header('Location: Index.php');
    }
    else
    {
        header('Location: Login.php');
        
    }
    $_SESSION["mat"]=$mat;
    $_SESSION["mdp"]=$mdp;
    }
 else
 header('Location: Login.php');

