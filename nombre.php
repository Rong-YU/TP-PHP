
<?php
if(isset($_GET['nombre'])){
  if(preg_match("#^-?\d*\.?\d*$#",$_GET['nombre'])){
    echo "il exist un nombre";
  }
  else {
    echo "il n'exist pas un nombre";
  }
}
if(isset($_GET['test'])){
  if(!preg_match("#^[ ]*$#",$_GET['test'])){
    echo "True";
  }
  else {
    echo "False";
  }
}
?>
