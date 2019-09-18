<?php
class TODOlist {
    private $to_dos;
    function __construct() {
      $this->to_dos = [];
    }
    function add_to_do($chaine) {
        if (isset($chaine) and !preg_match("#^[ ]*$#",$chaine)){
          $this->to_dos[]=$chaine;
        }
        else{
          echo 'la chaine est vide ou ne contient que des espaces';
        }
    }
    function remove_to_do($i){
      unset($this->to_dos[$i]);
    }

    function is_empty(){
      if(empty($this->to_dos)){
        return true;
      }
      else{
        return false;
      }
    }
    function get_html(){
      if(!$this->is_empty()){
        $html = "<ul>";
        foreach ($this->to_dos as $key => $value) {
          $html .= "<li>" . $value . "</li>";
        }
        $html .= "</ul>";
        return $html;
      }
      else{
        return "<p>Aucune tâche à faire !</p>";
      }
    }

}

?>
