<!--
EX1
categories
clé primaire : categories
nobels
clé primaire : id
clé etrangere : category

Select max(id) from nobels
839 prix nobels

select name from nobels where year = 1903 and category='physics'
;
 Antoine Henri Becquerel
 Marie Curie, née Sklodowska
 Pierre Curie

-->

<?php

try{
  $bd =new PDO('pgsql:host=aquabdd;dbname=etudiants', '11800323', '090922062BF');
} catch(PDOException $e) {
  // On termine le script en affichant le code de l'erreur et le message
    die('<p> La connexion a échoué. Erreur['.$e->getCode().'] : '
    . $e->getMessage().'</p>');
}

$r= $bd-> prepare("Select max(id) from nobels");
$r->execute();
echo implode(", ",$r->fetch(PDO::FETCH_ASSOC));
?>
