<?php
require "begin.html";
?>

<form action="add.php" method="post">
<p><label>Name: <input type="text" name="name"></label></p>
<p><label>Year: <input type="text" name="year"></label></p>
<p><label>Birth Date: <input type="text" name="birthdate"></label></p>
<p><label>Birth Place: <input type="text" name="birth Place"></label></p>
<p><label>Country: <input type="text" name="county"></label></p>
<?php
require "Model.php";
$m = Model::getModel();

$tab = $m->get_categories();
foreach($tab as $categorie){
  echo '<p><label><input type="radio" name="category" value="'. $categorie["category"] .'">' . $categorie["category"] . '</label></p>';
}

?>

<label>motivation: <textarea name="motivation" cols="70" rows="10"></textarea></label>
<p><input type="submit" value="Add in database"></p>
</form>
<?php
require "end.html";
?>
