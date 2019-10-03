<?php
$Nom=$_POST['Nom'];
$Prenom=$_POST['Prenom'];
$mdp=$_POST['mdp'];
$Matricule=$_POST['Matricule'];
$Niveau=$_POST['Niveau'];
var_dump($Nom);
require_once 'AccidentFunc.php';
$Emp = new Emp;
$Emp->InsertAccount($Nom,$Prenom,$mdp,$Matricule,$Niveau);
header('Location: ../pages/index.php');