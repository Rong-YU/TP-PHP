<?php

// Récupérer le nombre de prix nobels dans la base de données pour l'afficher à la place de TO FILL.

require "Model.php";
require "begin.html";
$m = Model::getModel();

$tab = $m->get_last();
echo "<table>";
echo "<tr><th>Name</th><th>Category</th><th>Year</th></tr>";
foreach ($tab as $personne) {
  echo "<tr>";
  foreach ($personne as $value) {
    echo "<td>".$value."</td>";
  }
  echo "</tr>";
}
echo "</table>";


require "end.html"; ?>
