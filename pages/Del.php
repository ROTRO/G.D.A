<?php 

require '../api/AccidentFunc.php';
        $Emp= new Emp;
        $Result=$Emp->deleteEmp($_GET['id']);
        
