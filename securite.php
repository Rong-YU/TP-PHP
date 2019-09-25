<?php
session_start();

var_dump($_SESSION['connecte']);
$mdp="caq";
if(!$_SESSION['connecte']){
  if(isset($_POST["mdp"]) and $_POST["mdp"] == $mdp){
    $_SESSION['connecte'] =true;
  }
  else{
    echo "
    <form method='post'>
    <p>mot de passe: <input name='mdp' type='text'> </p>
    <input type='submit' value='Enter'>
    </form>
    ";
    $_SESSION['connecte'] = false;
    exit();
  }
}
if(isset($_GET['deconnexion'])){
  #$_SESSION['connecte'] = false;
  session_destroy();
}
?>
