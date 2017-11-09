<?php

include "include/conexao_mysql.php";

$id = $_GET['id'];

mysql_query("delete from carro where id = '$id'");


$redirect = "cadastra_carro.php";
header("location:$redirect");
?>