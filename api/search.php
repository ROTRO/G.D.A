<?php
require_once 'dbConnect.php';
require_once 'AccidentFunc.php';
$Emp = new Emp;
$search = $_POST['search'];
if(!empty($search)) {
  $result = $Emp->readEmp($search);
  $json = array();
  while($row = $result->fetch()) {
    $json[] = array(
      'Nom' => $row['Nom'],
      'Prenom' => $row['Prenom'],
      'Age' => $row['Age'],
      'Fonction' => $row['Fonction'],
      'Adresse' => $row['Adresse'],
      'Date_em' => $row['Dat_em'],
      'Code' =>$row['Code_Social']
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
}
?>