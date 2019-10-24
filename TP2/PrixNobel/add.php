<?php
require "Model.php";
$m = Model::getModel();

$info= $m -> check_data();
if($info){
  $m -> add_nobel_prize($info);
  echo 'un prix nobel a été ajouté';
}
else{
  echo 'erreur saisir';
}


?>
