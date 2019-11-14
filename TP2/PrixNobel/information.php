<?php
require "begin.html";
require_once "Model.php";
$m = Model::getModel();
if(isset($_GET["id"]) and preg_match('#^\d+#',$_GET["id"])){
  if($tab = $m->get_nobel_prize_informations($_GET["id"])){
    echo "<ul>";
    foreach($tab as $c => $v){
      echo '<li>'. $c . ': '. $v . '</li>';
    }
    echo "</ul>";
  }
  else{
    echo '<p>il n’existe aucun prix nobel ayant cet identifiant dans la base de données.</p>';
  }

}
require "end.html";
 ?>
