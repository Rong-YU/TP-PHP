<?php

class Controller_set extends Controller{
  public function action_default(){
      $this->action_form_add();
  }

  public function action_form_add(){
    $m = Model::getModel();
    $data = [
        "category" => $m->getCategories()
      ];
    $this->render('form_add', $data);
  }

  public function action_add(){
    $m = Model::getModel();
    $info = $this->check_data();
    if($info){
      $m->addNobelPrize($info);
      $data=[
        "title" => "succes",
        "message" => "un prix nobel a été ajouté"
      ];
    }
    else{
      $data=[
        "title" => "erreur",
        "message" => "erreur"
      ];
    }
    $this->render('message', $data);
  }

  public function action_remove(){
    $m = Model::getModel();
    if(isset($_GET['id'])){
      $id =$_GET['id'];
      if($m->isInDataBase($id)){
        $m->removeNobelPrize($_GET['id']);
        $data=[
          "title" => "succes",
          "message" => "un prix nobel a été supprimé"
        ];
      }
      else{
        $data=[
          "title" => "erreur",
          "message" => "id ne correspondait pas à un prix nobel"
        ];
      }
    }
    else{
      $data=[
        "title" => "erreur",
        "message" => "il n’y avait pas de paramètre"
      ];
    }
    $this->render('message', $data);
  }

  public function action_form_update(){
    $m = Model::getModel();
    if(isset($_GET['id'])){
      $id =$_GET['id'];
      if($m->isInDataBase($id)){
        $data=["categories" => $m->getCategories()];
        $info = $m->getNobelPrizeInformations($id);
        foreach($info as $c => $v){
          $data[$c] = $v;
        }
        $this->render('form_update', $data);
      }
      else{
        $data=[
          "title" => "erreur",
          "message" => "id ne correspondait pas à un prix nobel"
        ];
        $this->render('message', $data);
      }
    }
    else{
      $data=[
        "title" => "erreur",
        "message" => "il n’y avait pas de paramètre"
      ];
      $this->render('message', $data);
    }
  }

  public function action_update(){
    $m = Model::getModel();
    if(isset($_POST['id']) and preg_match("#^\d+$#",$_POST['id'])){
      $id =$_POST['id'];
      $info = $this->check_data();
      if($info){
        $info["id"]=$id;
        $m->updateNobelPrize($info);
        $data=[
          "title" => "succes",
          "message" => "un prix nobel a été modifié"
        ];
      }
      else{
        $data=[
          "title" => "erreur",
          "message" => "id ne correspondait pas à un prix nobel"
        ];
      }
    }
    else{
      $data=[
        "title" => "erreur",
        "message" => "il n’y avait pas de paramètre ou erreur saisir d'id"
      ];
    }
    $this->render('message', $data);
  }


  public function check_data(){
      if(!isset($_POST["name"]) or preg_match('#^ +$#',$_POST["name"])){
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
      if(!isset($_POST["birthplace"]) or preg_match('#^ +$#',$_POST["birthplace"])){
        $info["birthplace"] = null;
      }
      else{
        $info["birthplace"] = $_POST["birthplace"];
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

}

 ?>
