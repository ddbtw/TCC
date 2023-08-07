<?php

$servername = "localhost"; //nome do servidor
$username = "root"; //nome d o usuario
//$password = "password"; //senha
$dbname = "tcc";


$conn = mysqli_connect('localhost', 'root', '', 'tcc') ;

if(mysqli_connect_errno()) {
    echo "Erro na conexão com o banco de dados";
    exit();
}

?>