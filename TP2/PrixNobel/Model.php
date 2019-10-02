<?php

class Model{
  private $bd; //Attribut privé contenant l'objet PDO

  //Attribut qui contiendra l'unique instance du modèle
  private static $instance = null;

  private function __construct(){
    try{
      $this->bd =new PDO('pgsql:host=aquabdd;dbname=etudiants', '11800323', '090922062BF');
      $this->bd->query('SET NAMES utf8');
      $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
      // On termine le script en affichant le code de l'erreur et le message
        die('<p> La connexion a échoué. Erreur['.$e->getCode().'] : '
        . $e->getMessage().'</p>');
    }
  }

  public static function getModel(){
    //Si la classe n'a pas encore été instanciée25
    if(is_null(self::$instance))
      self::$instance = new Model();
    //On l'instancie27
    return self::$instance;
    //On retourne l'instance28}
  }

  public function get_last(){
    $r= $this->bd->prepare('Select name, category, year from nobels where id> (select max(id)-25 from nobels) ORDER BY name, year DESC');
    $r->execute();
    $tab = $r->fetchAll(PDO::FETCH_ASSOC);
    return $tab;
  }

  public function get_nb_nobel_prizes(){
    $r= $this->bd->prepare('Select max(id) as n from nobels');
    $r->execute();
    $tab = $r->fetch(PDO::FETCH_ASSOC);
    return $tab['n'];
  }
}
?>
