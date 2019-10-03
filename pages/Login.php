<html>
 <head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="../Style/login.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="../Style/toastr/build/toastr.css" rel="stylesheet"/>
<script src="../Style/toastr/toastr.js"></script>
<title>Gestion Des Accidents</title>
</head>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
  
    <div class="fadeIn first">
    
    </div>
   <?php 
   require_once '../api/AccidentFunc.php';
   session_start();
   $Emp = new Emp;
   if(!empty($_SESSION["mat"]))
   { $Result=$Emp->Logout($_SESSION["mat"]);
    session_destroy();
  }

   if (isset($_SESSION['blah']) && !empty($_SESSION['blah']))
   {
  
    }
   
   ?>
    
    <form action="Check.php" method="POST" onsubmit="OK">
      <input type="text" id="Matricule" class="fadeIn second" name="Matricule" placeholder="Matricule" required>
      <input type="password" id="mdp" class="fadeIn third form-control" name="mdp" placeholder="Mot De Passe" required>
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>
  </div>
</div>
</body>
</html>