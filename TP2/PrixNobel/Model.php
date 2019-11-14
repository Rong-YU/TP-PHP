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
      var_dump($_POST);
      if(!isset($_POST["name"]) or preg_match('#^ +$#',$_POST["name"])){
        echo 'zz';
        return false;
      }
      if(!isset($_POST["category"]) or preg_match('#^ +$#',$_POST["category"])){
        return false;
      }
      if(!isset($_POST["year"]) or !preg_match('#^\d+$#',$_POST["year"])){
        return false;
      }
      //Year, Category, Name, Birthdate, BirthPlace, County et Motivation
      $info = [
        "name" => $_POST["name"],
        "category" => $_POST["category"],
        "year" => $_POST["year"],
      ];
      if(isset($_POST["birthdate"]) and preg_match('#^\d+$#',$_POST["birthdate"]) ){
        $info["birthdate"] = $_POST["birthdate"];
      }
      else{
        $info["birthdate"] = null;
      }
      if(!isset($_POST["birthPlace"]) or preg_match('#^ +$#',$_POST["birthPlace"])){
        $info["birthPlace"] = null;
      }
      else{
        $info["birthdate"] = $_POST["birthPlace"];
      }
      if(!isset($_POST["county"]) or preg_match('#^ +$#',$_POST["county"])){
        $info["county"] = null;
      }
      else{
        $info["county"] = $_POST["county"];
      }
      if(!isset($_POST["motivation"]) or preg_match('#^ +$#',$_POST["motivation"])){
        $info["motivation"] = null;
      }
      else{
        $info["motivation"] = $_POST["motivation"];
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

  public function update_nobel_prize($info){
    $r= $this->bd->prepare('update nobels set year=:year, category=:category, name=:name, birthdate=:birthdate, birthplace=:birthplace, county=:county, motivation=:motivation
                            where id=:id');
    $r->bindValue(':year', $info['year']);
    $r->bindValue(':category', $info['category']);
    $r->bindValue(':name', $info['name']);
    $r->bindValue(':birthdate', $info['birthdate']);
    $r->bindValue(':birthplace', $info['birthPlace']);
    $r->bindValue(':county', $info['county']);
    $r->bindValue(':motivation', $info['motivation']);
    $r->bindValue(':id', $_POST['id']);
    $r->execute();

  }
}
?>
