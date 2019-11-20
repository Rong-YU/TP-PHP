<?php

class Controller_list extends Controller{
  public function action_default(){
      $this->action_last();
  }

  public function action_last(){
    $m = Model::getModel();
    $data = [
        "tab" => $m->getLast()
      ];
    $this->render('last', $data);
  }

  public function action_informations(){
    $m = Model::getModel();
    if(isset($_GET['id'])){
      if($m->isInDataBase($_GET['id'])){
        $data = [
            "tab" => $m->getNobelPrizeInformations($_GET['id'])
          ];
        $this->render('informations', $data);
      }
    }
    else{
      $this->action_error();
    }
  }

  public function action_pagination(){
    $m = Model::getModel();
    if(isset($_GET['start']) and preg_match('#^\d+$#',$_GET['start'])){
      $start = $_GET['start'];
    }
    else{ $start = 1;}
    
    $offset = $start*25;
    if($list = $m->getNobelPrizesWithLimit($offset-25)){
      $data = [
          "tab" => $list,
          "current" => $start,
          "pages_debut" => intdiv($start, 10) %10 * 10 ,
          "controller" => "list"
        ];
      $this->render('pagination', $data);
    }
    else{
      $this->action_error("la page n'exist pas");
    }
  }
}

 ?>
