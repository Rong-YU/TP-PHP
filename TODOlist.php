<?php
class Foo {
    private $to_dos;

    function __construct() {
      $this->to_dos = [];
    }
    function add_to_do($chaine) {
        if (empty(trim($chaine))){
          $to_dos[]=$chaine;
        }
        else{
          echo 'la chaine est vide ou ne contient que des espaces';
        }
    }
    function remove_to_do($i){
      unset($to_dos[$i]);
    }
}

$foo = new Foo;
?>
