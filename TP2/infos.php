<?php

try{
  $bd =new PDO('pgsql:host=aquabdd;dbname=etudiants', '11800323', '090922062BF');
} catch(PDOException $e) {
  // On termine le script en affichant le code de l'erreur et le message
    die('<p> La connexion a échoué. Erreur['.$e->getCode().'] : '
    . $e->getMessage().'</p>');
}

if(isset($_GET["id"]) and preg_match("#^\d+$#",$_GET["id"])){
  $r= $bd->prepare('Select * from nobels where id=:id');
  $r->bindValue(":id",$_GET["id"]);
  $r->execute();
  $tab = $r->fetch(PDO::FETCH_ASSOC);
  if($tab){
      echo "<ul>";
      foreach ($tab as $key => $value) {
        echo "<li>" . $key . ": ". $value . ".</li>";
      }
      echo "</ul>";
  }
  else{
    echo "<p>Identifiant invalide.</p>";
  }
}
else{
  echo "<p>Aucun identifiant</p>";
}

?>
