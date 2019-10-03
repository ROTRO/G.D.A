<?php

require_once 'dbConnect.php';
require_once 'AccidentFunc.php';
$Emp = new Emp;

$ch1='';
$year = $_POST['year'];
if(!empty($year)) {
$result = $Emp->readCauses($year);

while($row=$result->fetch())
{
$ch1.=$row[0].' * ';
}
  $json = array();

    $json[] = array(
      'Causes' => $ch1
      
    );
    
  $jsonstring = json_encode($json);

  echo $jsonstring;
  }
?>