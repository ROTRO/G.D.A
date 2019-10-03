<?php
require_once 'dbConnect.php';
require_once 'AccidentFunc.php';
$Emp = new Emp;
$search = $_POST['search'];
if(!empty($search)) {
  $result = $Emp->RechAcc($search);
  $row = $result->fetch();
  $result2= $Emp->readEmp($row['Mat_emp']);
  $row2 = $result2->fetch();

  $json = array();
    $json[] = array(
      'Fiche' => $row[0],
      'Poly' => $row['Polyaccidente'],
      'Mat_emp' => $row['Mat_emp'],
      'Dat_AC' => $row['Dat_AC'],
      'Nom' => $row2[1],
      'Prenom' => $row2[2],
      'Accident_Travail' => $row['Accident_Travail'],
      'Tryptique' => $row['Tryptique'],
      'Heure_AC' => $row['Heure_AC'],
      'id' => $row['id'],
      'Evalue' => $row['Evalue'],
      'Nat_sieg' => $row['Nat_sieg'],
      'de' => $row['de'],
      'a' => $row['a'],
      'tete' => $row['tete'],
      'MemS' => $row['MemS'],
      'MemI' => $row['MemI'],
      'Yeux' => $row['Yeux'],
      'Mains' => $row['Mains'],
      'Tronc' => $row['Tronc'],
      'LocI' => $row['LocI'],
      'LocM' => $row['LocM'],
      'Pieds' => $row['Pieds'],
      'Date_em' => $row2['Dat_em'],
      'Poste' => $row['Poste'],
      'Depuis' => $row['Depuis'],
      'Habituel' => $row['Habituel'],
      'depuis2' => $row['depuis2'],
      'Date_repos' => $row['Date_repos'],
      'Horaire_Tra' => $row['Horaire_Tra'],
      'Descr' => $row['Descr'],
      'ChefVic' => $row['ChefVic'],
      'ChefSec' => $row['ChefSec'],
      'Direction' => $row['Direction'],
      'Causes' => $row['Causes']
    );
  
  $jsonstring = json_encode($json);
  echo $jsonstring;
}
?>