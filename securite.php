<?php
session_start();
$_SESSION['connecte'] =false;
$mdp="caq";
while(!$_SESSION['connecte']){
  if(isset($_GET["mdp"]) and $_GET["mdp"] == $mdp){
    $_SESSION['connecte'] =true;
  }
  else{
    echo "
    <form>
    <p>mot de passe: <input name='mdp' type='text'> </p>
    <input type='submit' value='Enter'>
    </form>
    ";
  }
}
exit;


 ?>
