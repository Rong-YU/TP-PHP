<<?php
include("TODOlist.php");
$todo = new TODOlist();
echo $todo->get_html();
$todo->add_to_do("aa");
$todo->add_to_do("bb");
$todo->add_to_do("  ");
$todo->add_to_do("");
$todo->add_to_do("cc");
$todo->add_to_do("dd");
echo $todo->get_html();
$todo->remove_to_do(3);
echo $todo->get_html();


 ?>>
