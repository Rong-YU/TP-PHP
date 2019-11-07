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
    $r= $this->bd->prepare('Select id, name, category, year from nobels where id> (select max(id)-25 from nobels) ORDER BY name, year DESC');
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

  public function get_categories(){
    $r= $this->bd->prepare('Select distinct category from nobels');
    $r->execute();
    $tab = $r->fetchAll(PDO::FETCH_ASSOC);
    return $tab;
  }

  public function add_nobel_prize($info){
    $r= $this->bd->prepare('INSERT INTO nobels (year, category, name, birthdate, birthplace, county, motivation)
                            VALUES(:year, :category, :name, :birthdate, :birthplace, :county, :motivation)');
    $r->bindValue(':year', $info['Year']);
    $r->bindValue(':category', $info['Category']);
    $r->bindValue(':name', $info['Name']);
    $r->bindValue(':birthdate', $info['Birthdate']);
    $r->bindValue(':birthplace', $info['BirthPlace']);
    $r->bindValue(':county', $info['County']);
    $r->bindValue(':motivation', $info['Motivation']);
    $r->execute();

  }

  public function check_data(){
      if(!isset($_POST["Name"]) or preg_match('#^ +$#',$_POST["Name"])){
        return false;
      }
      if(!isset($_POST["Category"]) or preg_match('#^ +$#',$_POST["Category"])){
        return false;
      }
      if(!isset($_POST["Year"]) or !preg_match('#^\d+$#',$_POST["Year"])){
        return false;
      }
      //Year, Category, Name, Birthdate, BirthPlace, County et Motivation
      $info = [
        "Name" => $_POST["Name"],
        "Category" => $_POST["Category"],
        "Year" => $_POST["Year"],
      ];
      if(isset($_POST["Birthdate"]) and preg_match('#^\d+$#',$_POST["Birthdate"]) ){
        $info["Birthdate"] = $_POST["Birthdate"];
      }
      else{
        $info["Birthdate"] = null;
      }
      if(!isset($_POST["BirthPlace"]) or preg_match('#^ +$#',$_POST["BirthPlace"])){
        $info["BirthPlace"] = null;
      }
      else{
        $info["Birthdate"] = $_POST["BirthPlace"];
      }
      if(!isset($_POST["County"]) or preg_match('#^ +$#',$_POST["County"])){
        $info["County"] = null;
      }
      else{
        $info["County"] = $_POST["County"];
      }
      if(!isset($_POST["Motivation"]) or preg_match('#^ +$#',$_POST["Motivation"])){
        $info["Motivation"] = null;
      }
      else{
        $info["Motivation"] = $_POST["Motivation"];
      }
      return $info;
  }



  public function is_in_data_base($id){
    $r= $this->bd->prepare('Select * from nobels where id=:id');
    $r->bindValue(':id', $id);
    $r->execute();
    $tab = $r->fetch(PDO::FETCH_ASSOC);
    return !empty($tab);
  }

  public function get_nobel_prize_informations($id){
    if($this->is_in_data_base($id)){
      $r= $this->bd->prepare('Select * from nobels where id=:id');
      $r->bindValue(':id', $id);
      $r->execute();
      $tab = $r->fetch(PDO::FETCH_ASSOC);
      return $tab;
    }
    return false;
  }

  public function remove_nobel_prize($id){
    if($this->is_in_data_base($id)){
      $r= $this->bd->prepare('delete from nobels where id=:id');
      $r->bindValue(':id', $id);
      $r->execute();
    }
  }
}
?>
