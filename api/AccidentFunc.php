<?php
require_once 'dbConnect.php';
class Emp {
    private $cnct;
    public function __construct()
    {
        $db = new Database;
        $connect = $db->connectDB();
        $this->cnct = $connect;
    }
    private function execReq($sql)
    {
        $stmt = $this->cnct->prepare($sql);
        return $stmt;
    }

    public function readAcc($mat)
    {
      try {
          $sql = 'SELECT * FROM `Account` WHERE Matricule = :mat ';
          $result = $this->execReq($sql);
          $result-> bindparam(":mat",$mat);
          $result->execute();
          return $result;
      } catch (PDOException $exception) {
          echo $exception->getMessage();
      }
    }

    public function RechAcc($Fiche)
    {
      try {
          $sql = 'SELECT * FROM `sce_securite` sce LEFT JOIN accident a ON sce.Fiche = a.Fiche LEFT JOIN ac_service_md ac ON ac.Fiche = a.Fiche LEFT JOIN loc_lesions loc ON loc.Fiche = a.Fiche LEFT JOIN renseignement r ON r.Fiche = a.Fiche WHERE a.Fiche = :Fiche ';
          $result = $this->execReq($sql);
          $result-> bindparam(":Fiche",$Fiche);
          $result->execute();
          return $result;
      } catch (PDOException $exception) {
          echo $exception->getMessage();
      }
    }

    public function readEmp($mat)
  {
    try {
        $sql = 'SELECT * FROM `employe` WHERE Matricule = :mat ';
        $result = $this->execReq($sql);
        $result-> bindparam(":mat",$mat);
        $result->execute();
        return $result;
    } catch (PDOException $exception) {
        echo $exception->getMessage();
    }
  }
  public function readFiche()
  {
    try {
        $sql = 'SELECT * FROM `Accident` ORDER BY id DESC LIMIT 1';
        $result = $this->execReq($sql);
        $result->execute();
        return $result;
    } catch (PDOException $exception) {
        echo $exception->getMessage();
    }
  }

  public function readAccounts()
  {
    try {
        $sql = 'SELECT `id`,`Matricule`,`Nom`,`Prenom`,`Level`,`Active` FROM `Account` ';
        $result = $this->execReq($sql);
        $result->execute();
        return $result;
    } catch (PDOException $exception) {
        echo $exception->getMessage();
    }
  }

  
  public function readAccidents()
  {
    try {
        $sql = 'SELECT * FROM  `accident` ac LEFT JOIN ac_service_md a  ON ac.Fiche = a.Fiche LEFT JOIN renseignement r on r.Fiche = a.Fiche';
        $result = $this->execReq($sql);
        $result->execute();
        return $result;
    } catch (PDOException $exception) {
        echo $exception->getMessage();
    }
  }
  public function InsertFiche($Fiche,$Mat_emp,$Dat_AC,$Accident_Travail,$Tryptique,$Heure_AC)
  {
    try {
        $sql = "INSERT INTO `Accident` (`Fiche`, `Mat_emp`, `Dat_AC`, `Accident_Travail`, `Tryptique`, `Heure_AC`) VALUES (:Fiche,:Mat_emp,:Dat_AC,:Accident_Travail,:Tryptique,:Heure_AC)";
        $result = $this->execReq($sql);
        $result-> bindparam(":Fiche",$Fiche);
        $result-> bindparam(":Mat_emp",$Mat_emp);
        $result-> bindparam(":Dat_AC",$Dat_AC);
        $result-> bindparam(":Accident_Travail",$Accident_Travail);
        $result-> bindparam(":Tryptique",$Tryptique);
        $result-> bindparam(":Heure_AC",$Heure_AC);
        $result->execute();
        return $result;
    } catch (PDOException $exception) {
        echo $exception->getMessage();
    }
  }
   
  public function deleteEmp($id)
  {  try{
      $sql='DELETE FROM `account` WHERE id = :id';
      $result = $this->execReq($sql);
      $result->bindparam(':id',$id);
      $result->execute();
      return $result;}
      catch (PDOException $exception){
        echo $exception->getMessage();  
      }
  }

  public function ActivateAC($id)
  {  try{
      $sql='UPDATE `account` SET `Active`= 1 WHERE id=:id';
      $result = $this->execReq($sql);
      $result->bindparam(':id',$id);
      $result->execute();
      return $result;}
      catch (PDOException $exception){
        echo $exception->getMessage();  
      }
  }

  
  public function DesactivateAC($id)
  {  try{
      $sql='UPDATE `account` SET `Active`= 0 WHERE id=:id';
      $result = $this->execReq($sql);
      $result->bindparam(':id',$id);
      $result->execute();
      return $result;}
      catch (PDOException $exception){
        echo $exception->getMessage();  
      }
  }

  public function InsertSCMed($Fiche,$Nat,$de,$a)
  {
    try {
        $sql = "INSERT INTO `ac_service_md` (`Fiche`, `Nat_sieg`, `de`, `a`) VALUES (:Fiche,:Nat,:de,:a)";
        $result = $this->execReq($sql);
        $result-> bindparam(":Fiche",$Fiche);
        $result-> bindparam(":Nat",$Nat);
        $result-> bindparam(":de",$de);
        $result-> bindparam(":a",$a);
        $result->execute();
        return $result;
    } catch (PDOException $exception) {
        echo $exception->getMessage();
    }
  }

 public function InsertRen($Fiche,$Poste,$Depuis1,$Habituel,$Depuis2,$DateRepos,$Horaire,$DescAC)
  {
    try {
        $sql = "INSERT INTO `renseignement` (`Fiche`, `Poste`, `Depuis`,`Habituel`,`Depuis2`,`Date_repos`,`Horaire_Tra`,`Descr`) VALUES (:Fiche,:Poste,:Depuis1,:Habituel,:Depuis2,:DateRepos,:Horaire,:DescAC)";
        $result = $this->execReq($sql);
        $result-> bindparam(":Fiche",$Fiche);
        $result-> bindparam(":Poste",$Poste);
        $result-> bindparam(":Depuis1",$Depuis1);
        $result-> bindparam(":Habituel",$Habituel);
        $result-> bindparam(":Depuis2",$Depuis2);
        $result-> bindparam(":DateRepos",$DateRepos);
        $result-> bindparam(":Horaire",$Horaire);
        $result-> bindparam(":DescAC",$DescAC);
        $result->execute();
        return $result;
    } catch (PDOException $exception) {
        echo $exception->getMessage();
    }
  }

  public function readAllEmp()
  {
    try {
        $sql = 'SELECT * FROM `employe` ';
        $result = $this->execReq($sql);
        $result->execute();
        return $result;
    } catch (PDOException $exception) {
        echo $exception->getMessage();
    }
  }
  
  public function CheckAccount($mat,$mdp)
  {
    try {
        $sql = 'SELECT * FROM `Account` Where Matricule = :mat AND MDP = :mdp ';
        $result = $this->execReq($sql);
        $result-> bindparam(":mat",$mat);
        $result-> bindparam(":mdp",$mdp);
        $result->execute();
        return $result;
    } catch (PDOException $exception) {
        echo $exception->getMessage();
    }  
  }

  public function readSecurite($Fiche)
  {
    try {
        $sql = 'SELECT * FROM `loc_lesions` l,`sce_securite` s WHERE s.Fiche = l.Fiche AND l.Fiche = :Fiche ';
        $result = $this->execReq($sql);
        $result-> bindparam(":Fiche",$Fiche);
        $result->execute();
        return $result;
    } catch (PDOException $exception) {
        echo $exception->getMessage();
    }  
  }
  public function readAccidentSc($Fiche)
  {
    try {
        $sql = 'SELECT * FROM 	ac_service_md	,renseignement,accident  WHERE Accident.Fiche = :Fiche ';
        $result = $this->execReq($sql);
        $result-> bindparam(":Fiche",$Fiche);
        $result->execute();
        return $result;
    } catch (PDOException $exception) {
        echo $exception->getMessage();
    }  
  }

  public function InsertAccount($Nom,$Prenom,$mdp,$Matricule,$Niveau)
  {
    try {
        $sql = "INSERT INTO `account` (`Matricule`, `MDP`, `Nom`, `Prenom`,`Level`) VALUES (:Matricule,:mdp,:Nom,:Prenom,:Niveau)";
        $result = $this->execReq($sql);
        $result-> bindparam(":Nom",$Nom);
        $result-> bindparam(":Prenom",$Prenom);
        $result-> bindparam(":mdp",$mdp);
        $result-> bindparam(":Matricule",$Matricule);
        $result-> bindparam(":Niveau",$Niveau);
        $result->execute();
        return $result;
    } catch (PDOException $exception) {
        echo $exception->getMessage();
    }
  }
  public function InsertUsineSCE($Fiche,$ChefVic,$ChefSec,$Direction,$Items)
  {
    try {
        $sql = "INSERT INTO `SCE_securite`(`Fiche`, `ChefVic`, `ChefSec`, `Direction`, `Causes`) VALUES (:Fiche,:ChefVic,:ChefSec,:Direction,:Items)";
        $result = $this->execReq($sql);
        $result-> bindparam(":Fiche",$Fiche);
        $result-> bindparam(":ChefVic",$ChefVic);
        $result-> bindparam(":ChefSec",$ChefSec);
        $result-> bindparam(":Direction",$Direction);
        $result-> bindparam(":Items",$Items);
        $result->execute();
        return $result;
    } catch (PDOException $exception) {
        echo $exception->getMessage();
    }
  }
  public function Login($Mat)
  {
    try {
        $sql = "INSERT INTO `Logs`(`Matricule`) VALUES (:Mat)";
        $result = $this->execReq($sql);
        $result-> bindparam(":Mat",$Mat);
        $result->execute();
        return $result;
    } catch (PDOException $exception) {
        echo $exception->getMessage();
    }
  }

  public function Logout($Mat)
  {
    try {
        $sql = "INSERT INTO `Logs`(`Matricule`,`Operation`) VALUES (:Mat,'Logout')";
        $result = $this->execReq($sql);
        $result-> bindparam(":Mat",$Mat);
        $result->execute();
        return $result;
    } catch (PDOException $exception) {
        echo $exception->getMessage();
    }
  }
  
  public function InsertLesions($Fiche,$tete,$MemS,$MemI,$Yeux,$Mains,$Tronc,$LocI,$LocM,$Pieds,$Poly)
  {
    try {
        $sql = "INSERT INTO `Loc_Lesions`(`tete`, `MemS`, `MemI`, `Yeux`, `Mains`, `Tronc`, `LocI`, `LocM`, `Fiche`, `Pieds`,`Polyaccidente`) VALUES (:tete,:MemS,:MemI,:Yeux,:Mains,:Tronc,:LocI,:LocM,:Fiche,:Pieds,:Poly)";
        $result = $this->execReq($sql);
        $result-> bindparam(":Fiche",$Fiche);
        $result-> bindparam(":tete",$tete);
        $result-> bindparam(":MemS",$MemS);
        $result-> bindparam(":MemI",$MemI);
        $result-> bindparam(":Yeux",$Yeux);
        $result-> bindparam(":Mains",$Mains);
        $result-> bindparam(":Tronc",$Tronc);
        $result-> bindparam(":LocI",$LocI);
        $result-> bindparam(":LocM",$LocM);
        $result-> bindparam(":Pieds",$Pieds);
        $result-> bindparam(":Poly",$Poly);
        $result->execute();
        return $result;
    } catch (PDOException $exception) {
        echo $exception->getMessage();
    }
  }

  public function Evaluer($Fiche)
  {
    try {
        $sql = "UPDATE `accident` SET `Evalue`=1 WHERE Fiche = :Fiche";
        $result = $this->execReq($sql);
        $result-> bindparam(":Fiche",$Fiche);
        $result->execute();
        return $result;
    } catch (PDOException $exception) {
        echo $exception->getMessage();
    }
  }

 /* Satistiques */
 public function readYear($Year,$Month)
  {
    try {
        $sql = 'SELECT count(Fiche) FROM `accident` WHERE MONTH(Dat_AC) = :M AND YEAR(Dat_AC) = :Y';
        $result = $this->execReq($sql);
        $result-> bindparam(":Y",$Year);
        $result-> bindparam(":M",$Month);
        $result->execute();
        return $result;
    } catch (PDOException $exception) {
        echo $exception->getMessage();
    }  
  }

  public function readCauses($Year)
  {
    try {
        $sql = 'SELECT `Causes` FROM `sce_securite` sce JOIN accident a ON sce.Fiche = a.Fiche WHERE YEAR(Dat_AC) = :Y ';
        $result = $this->execReq($sql);
        $result-> bindparam(":Y",$Year);
        $result->execute();
        return $result;
    } catch (PDOException $exception) {
        echo $exception->getMessage();
    }  
  }

}