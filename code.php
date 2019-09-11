<?php $title='aa';require('debut_code_html.php'); ?>
<h1> Mes premiers pas en PHP </h1>
<?php $tps=2; echo '<p> Je débute depuis ' .$tps.' heures... </p>
<p> Mais cela a l\'air intéressant ! </p>
<h2> Vive le PHP </h2>
<p> Les pages vont pouvoir être dynamiques! </p>
'; ?>
<p> Encore quelques paragraphes </p>
echo '<p> Avant dernier paragraphe </p>';
<p> Voilà, c'est terminé! </p>
<?php require('fin_code_html.php'); ?>


<h1>Exercice 3 : Initiation aux tableaux</h1>
<?php

$mois = [
    "janvier",
    "février",
    "mars",
    "avril",
    "mai",
    "juin",
    "juillet",
    "août",
    "septembre",
    "octobre",
    "novembre",
    "décembre"
];
echo '<ol>';
foreach($mois as $val){
echo"<li>$val</li>";
}
echo '</ol>';
//clés: 0, 1, 2, 3, 4...11

$mois2 = [
   "janvier"   => 31,
   "février"   => 28,
   "mars"      => 31,
   "avril"     => 30,
   "mai"       => 31,
   "juin"      => 30,
   "juillet"   => 31,
   "août"      => 31,
   "septembre" => 30,
   "octobre"   => 31,
   "novembre"  => 30,
   "décembre"  => 31
];

echo '<ol>';
foreach($mois2 as $cle => $val){
echo"<li>$cle : $val jours</li>";
}
echo '</ol>';
//clés: 0, 1, 2, 3, 4...11

?>

<h1>Exercice 4 : Tableau à deux dimensions </h1>
<?php
$personnes = [
  'mdupond' => ['Prénom' => 'Martin', 'Nom' => 'Dupond', 'Age' => 25, 'Ville' => 'Paris'       ],
  'jm'      => ['Prénom' => 'Jean'  , 'Nom' => 'Martin', 'Age' => 20, 'Ville' => 'Villetaneuse'],
  'toto'    => ['Prénom' => 'Tom'   , 'Nom' => 'Tonge' , 'Age' => 18, 'Ville' => 'Epinay'      ],
  'arn'     => ['Prénom' => 'Arnaud', 'Nom' => 'Dupond', 'Age' => 33, 'Ville' => 'Paris'       ],
  'email'   => ['Prénom' => 'Emilie', 'Nom' => 'Ailta' , 'Age' => 46, 'Ville' => 'Villetaneuse'],
  'dask'    => ['Prénom' => 'Damien', 'Nom' => 'Askier', 'Age' => 7 , 'Ville' => 'Villetaneuse']
];

$scores = [
  ['Joueur' => 'Camille'  , 'score' => 156 ],
  ['Joueur' => 'Guillaume', 'score' => 254 ],
  ['Joueur' => 'Julien'   , 'score' => 192 ],
  ['Joueur' => 'Nabila'   , 'score' => 317 ],
  ['Joueur' => 'Lorianne' , 'score' => 235 ],
  ['Joueur' => 'Tom'      , 'score' => 83  ],
  ['Joueur' => 'Michael'  , 'score' => 325 ],
  ['Joueur' => 'Eddy'     , 'score' => 299 ]
];
//clés: mdupond, jm, toto, arn, email, dask
//les valeurs sont des tableaux
//la valeur associée à toto est ['Prénom' => 'Tom'   , 'Nom' => 'Tonge' , 'Age' => 18, 'Ville' => 'Epinay'      ]
//Faire un foreach imbriqué pour accéder à la valeur 33 dans le tableau À la valeur 'Epinay'

function table($t){
  echo '<table>';
  $firstkey = array_keys($t)[0];

	echo '<tr>';
  foreach($t[$firstkey] as $cle => $val){
  	echo "<th>$cle </th>";
  }
	echo'</tr>';
  foreach($t as $val){
	echo '<tr>';
  	foreach($val as $v){
  		echo "<td>$v </td>";
  		}
	echo'</tr>';
	}
  echo'</table>';
}
table($personnes);
table($scores);
?>

<h1>Exercice 5 : Tableau à deux dimensions </h1>
<?php

$tabMagazines = [
  'le monde'              => ['frequence' => 'quotidien', 'type' => 'actualité', 'prix' => 220],
  'le point'              => ['frequence' => 'hebdo'    , 'type' => 'actualité', 'prix' => 80 ],
  'causette'              => ['frequence' => 'mensuel'  , 'type' => 'féministe', 'prix' => 180],
  'politis'               => ['frequence' => 'hebdo'    , 'type' => 'opinion'  , 'prix' => 100],
  'le monde diplomatique' => ['frequence' => 'mensuel'  , 'type' => 'analyse'  , 'prix' => 60 ]
];

$tabMagazinesAbonne = ['le monde', 'le monde diplomatique'];
$keys= array_keys($tabMagazines);
sort($keys);
echo implode(", ",$keys);

echo "<ul>";
foreach($tabMagazines as $c => $v){
  echo "<li>$c (". implode(", ",$v).")</li>";
}
echo "</ul>";

$prix=0;
foreach($tabMagazinesAbonne as $v)
  $prix+= $tabMagazines[$v]["prix"];
echo "le prix total de son abonnement : ". $prix;
?>
