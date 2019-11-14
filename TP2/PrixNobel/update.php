<?php
require "Model.php";
$m = Model::getModel();

$info= $m -> check_data();
if($info){
  $m -> update_nobel_prize($info);
  echo 'un prix nobel a été modifié';
}
else{
  echo 'erreur saisir';
}


?>
