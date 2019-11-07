<?php

// Récupérer le nombre de prix nobels dans la base de données pour l'afficher à la place de TO FILL.

require_once "Model.php";

$m = Model::getModel();

$tab = $m->get_last();


require "begin.html";
echo "<table>";
echo '<tr><th>Name</th><th>Category</th><th>Year</th><th class="sansBordure"></th></tr>';
foreach ($tab as $personne) {
  echo "<tr>";
  echo '<td><a href="information.php?id='.$personne["id"].'">'. $personne["name"] . '</a></td>';
  echo "<td>".$personne["category"]."</td>";
  echo "<td>".$personne["year"]."</td>";
  echo '<td class="sansBordure"><a href="remove.php?id='.$personne["id"].'"><img src="Content/img/remove-icon.png"></a></td>';
  echo "</tr>";
}
echo "</table>";


require "end.html"; ?>
