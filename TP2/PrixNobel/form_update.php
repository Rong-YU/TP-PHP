<?php
require "begin.html";
require_once "Model.php";
$m = Model::getModel();
if(isset($_GET["id"]) and preg_match("#^\d+$#",$_GET["id"])){
  $tab = $m->get_nobel_prize_informations($_GET["id"]);
  echo '<form action="update.php" method="post">';
  foreach($tab as $name => $value){
    if($name !== "motivation" ){
      echo '<p><label>'. $name . ': <input type="text" name="'.$name.'" value="'.$value.'"></label></p>';
    }
  }
  echo '<label>motivation: <textarea name="motivation" cols="70" rows="10">'.$tab["motivation"].'</textarea></label>';
  echo '<p><input type="submit" value="Update"></p>
  </form>';
}
else{
  echo "erreur id";
}
require "end.html";
?>
