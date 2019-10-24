<?php
require "begin.html";
?>

<form action="add.php" method="post">
<p><label>Name: <input type="text" name="Name"></label></p>
<p><label>Year: <input type="text" name="Year"></label></p>
<p><label>Birth Date: <input type="text" name="Birthdate"></label></p>
<p><label>Birth Place: <input type="text" name="Birth Place"></label></p>
<p><label>Country: <input type="text" name="County"></label></p>
<?php
require "Model.php";
$m = Model::getModel();

$tab = $m->get_categories();
foreach($tab as $categorie){
  echo '<p><label><input type="radio" name="Category" value="'. $categorie["category"] .'">' . $categorie["category"] . '</label></p>';
}

?>

<textarea name="Motivation" cols="70" rows="10"></textarea>
<p><input type="submit" value="Add in database"></p>
</form>
<?php
require "end.html";
?>
