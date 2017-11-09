<?php

include "include/conexao_mysql.php";

$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$empresa_id = $_POST['empresa_id'];

$sql = "insert into carro (marca, modelo, empresa_id) values ('$marca','$modelo','$empresa_id')";

if (mysql_query($sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . mysql_errno();
}

header('Location: cadastra_carro.php');   
