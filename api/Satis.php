<?php
require_once 'dbConnect.php';
require_once 'AccidentFunc.php';
$Emp = new Emp;
$year = $_POST['year'];
$i=1;
$months=array("Janvier"=>"", "Fevrier"=>"", "Mars"=>"", "Avril"=>"","May"=>"","Juin"=>"","Juillet"=>"","Aout"=>"", "Septembre"=>"", "Octobre"=>"", "Novembre"=>"", "Decembre"=>"");
if(!empty($year)) {
foreach($months as $x => $value)
{ $result = $Emp->readYear($year,$i);
  $row=$result->fetch();
  $months[$x]=$row[0];
  $i++;
    }
//var_dump($months);
  $json = array();

    $json[] = array(
      'Janvier' => $months['Janvier'],
      'Fevrier' => $months['Fevrier'],
      'Mars' => $months['Mars'],
      'Avril' => $months['Avril'],
      'May' => $months['May'],
      'Juin' => $months['Juin'],
      'Juillet' => $months['Juillet'],
      'Aout' => $months['Aout'],
      'Septembre' => $months['Septembre'],
      'Octobre' => $months['Octobre'],
      'Novembre' => $months['Novembre'],
      'Decembre' => $months['Decembre']
    );

  $jsonstring = json_encode($json);
  echo $jsonstring;
}
?>