<?php
 $servidor = "localhost";
 $banco = "dbprojeto";
 $usuario = "root";
 $senha = "12345678";
 $porta = "3305";
 $cmd = new PDO("mysql:host=$servidor;dbname=$banco",$usuario,$senha);
?>