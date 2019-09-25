<?php
require_once("TODOlist.php"); // avant session_start car on stocke un objet TODOList dans la session
session_start();

if(!isset($_SESSION["list"])){
  $_SESSION["list"]= new TODOlist();
}
if(isset($_GET["task"])){
  $_SESSION["list"]->add_to_do($_GET["task"]);
}
if(isset($_GET["rm"])){
  $_SESSION["list"]->remove_to_do($_GET["rm"]);
}
echo $_SESSION["list"]->get_html();
?>
<form action="td1.php">
<p>task: <input name='task' type='text'> </p>
<input type='submit' value='Ajouter'>
</form>
