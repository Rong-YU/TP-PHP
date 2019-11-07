<?php
require_once "Model.php";
$m = Model::getModel();

if(isset($_GET["id"]) and preg_match('#^\d+#',$_GET["id"])){
  if($m->is_in_data_base($_GET["id"])){
    $m->remove_nobel_prize($_GET["id"]);
    echo "<p>The nobel prize has been removed.</p>";
  }
  else{
    echo "<p>There is no nobel prize with such id.</p>";
  }
}
else{
  echo "<p>There is no id in the url.</p>";
}

 ?>
