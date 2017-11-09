<?php

include "include/conexao_mysql.php";

$id = $_GET['id'];
$now = date("H:i:s d/m/Y");

$sql = "update movimento set data_saida = '$now' where id = $id";

if (mysql_query($sql) === TRUE) {    
} else {
    echo "Error: " . $sql . "<br>" . mysql_errno();
}

$redirect = "cadastra_movimento.php";
header("location:$redirect");
