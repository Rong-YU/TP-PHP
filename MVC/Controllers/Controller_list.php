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
}

 ?>
