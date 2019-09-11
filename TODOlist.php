<?php
class Foo {
    private $to_dos;

    function __construct() {
      $this->to_dos = [];
    }
    function aMemberFunc() {
        print 'Inside `aMemberFunc()`';
    }
}

$foo = new Foo;
?>
