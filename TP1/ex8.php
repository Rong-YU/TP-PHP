<?php
$mdp="caq";
if(isset($_GET["mdp"]) and $_GET["mdp"] == $mdp){
  echo "<p>sdqiojdosq</p>";
}
else{
  echo "
  <form>
  <p>mot de passe: <input name='mdp' type='text'> </p>
  <input type='submit' value='Enter'>
  </form>
  ";
}
?>
