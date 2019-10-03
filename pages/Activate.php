<?php 

require '../api/AccidentFunc.php';
        $Emp= new Emp;
        if($_GET['Act']==1)
        $Result=$Emp->DesactivateAC($_GET['id']);
        else
        $Result=$Emp->ActivateAC($_GET['id']);
        header('Location: index.php');  
