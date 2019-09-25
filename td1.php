<?php
require_once("TODOlist.php"); // avant session_start car on stocke un objet TODOList dans la session
session_start();
if(!isset($_SESSION["list"])){
  $_SESSION["list"]= new TODOlist();
  if(isset($_COOKIE['list'])){
    $_SESSION["list"]->set_representation($_COOKIE['list']);
  }
}
if(isset($_GET["task"])){
  $_SESSION["list"]->add_to_do($_GET["task"]);
  header('Location: td1.php');
}
if(isset($_GET["rm"])){
  $_SESSION["list"]->remove_to_do($_GET["rm"]);
  header('Location: td1.php');
}

if(isset($_GET["save"])){
  setcookie('list',$_SESSION["list"]->get_representation(),
            time()+3600,null,null,false,true);
  header('Location: td1.php');
}
if(isset($_GET["rem"]) and $_GET["rem"]==1){
  unset($_SESSION["list"]);
  header('Location: td1.php');
}

if(isset($_SESSION["list"])){
  echo $_SESSION["list"]->get_html();
}

?>
<form action="td1.php">
<p>task: <input name='task' type='text'> </p>
<input type='submit' value='Add'>
</form>
<a href='td1.php?save=1'>Save</a>
<a href='td1.php?rem=1'>Remove</a>
