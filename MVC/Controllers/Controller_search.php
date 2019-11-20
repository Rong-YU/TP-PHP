<?php

class Controller_search extends Controller{
  public function action_default(){
      $this->action_form();
  }

  public function action_form(){
    $m = Model::getModel();
    $categories = $m->getCategories();
    $data=["categories"=>$categories];
    $this->render('form_search',$data);
  }

  public function action_pagination(){
    $filters=[];
    if(isset($_POST['name']) and !preg_match('#^ +$#',$_POST["name"])){
      $filters['name']=$_POST['name'];
    }
    if(isset($_POST['year']) and preg_match('#^\d+$#',$_POST["year"])){
      $filters['year']=$_POST['year'];
    }
    if(isset($_POST['signYear'])){
      $filters['Sign']=$_POST['signYear'];
    }
    if(isset($_POST['categories'])){
      $filters['categories']=$_POST['categories'];
    }
    $m = Model::getModel();
    var_dump($filters);
    if(isset($_GET['start']) and preg_match('#^\d+$#',$_GET['start'])){
      $start = $_GET['start'];
    }
    else{ $start = 1;}
    $offset = $start*25-25;
    var_dump($offset);
    if($list = $m->findNobelPrizes($filters,$offset)){
      $data = [
          "tab" => $list,
          "current" => $start,
          "pages_debut" => intdiv($start, 10) %10 * 10,
          "controller" => "search"
        ];
      $this->render('pagination', $data);
    }
    else{
      $this->action_error("la page n'exist pas");
    }

  }
}
?>
