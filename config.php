<?php 

// $mysql = new mysqli('localhost', 'id15835881_rchicarelli', '3O#o6{#&P%7x<x=a', 'id15835881_blog');
     $mysql = new mysqli('localhost', 'root', '', 'blog');
$mysql->set_charset('utf8');

if($mysql == FALSE) {
     echo "Erro na conexão"; 
}


?>