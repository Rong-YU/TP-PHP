<?php

class Controller_home extends Controller{
  public function action_default(){
      $m = Model::getModel();
      $data = $m->getNbNobelPrizes();
      render('home', $data);
  }
}

 ?>
