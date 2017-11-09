<?php

include "include/conexao_mysql.php";

$entrada = $_POST['entrada'];
$carro = $_POST['carro'];
$empresa_id = $_POST['empresa_id'];
$cor = $_POST['cor'];
$placa = $_POST['placa'];

$sql = "insert into movimento (data_entrada, placa, cor, carro_id, empresa_id) values ('$entrada','$placa','$cor','$carro','$empresa_id')";

if (mysql_query($sql) === TRUE) {    
} else {
    echo "Error: " . $sql . "<br>" . mysql_errno();
}


$redirect = "cadastra_movimento.php";
header("location:$redirect");
