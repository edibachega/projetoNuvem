<?php

include "include/conexao_mysql.php";

$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$carro_id = $_POST['carro_id'];

$sql = "update carro set marca = '$marca', modelo = '$modelo' where id = $carro_id";

if (mysql_query($sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . mysql_errno();
}

header('Location: cadastra_carro.php');   
