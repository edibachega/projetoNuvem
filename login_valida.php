<?php

include "include/conexao_mysql.php";

$login = $_POST['login'];
$senha = $_POST['senha'];


$sql = "select * from usuario where login='" . $login . "' and senha='" . $senha . "'";
$resultados = mysql_query($sql) or die(mysql_error());
$res = mysql_fetch_array($resultados); 

if (@mysql_num_rows($resultados) == 0) {
    echo 0; 
} else {
    echo 1; 
    if (!isset($_SESSION))  
        session_start();  
        
//Abrindo seções
    $_SESSION['usuarioID'] = $res['id'];
    $_SESSION['nomeUsuario'] = $res['nome'];
    $_SESSION['empresaID'] = $res['empresa_id'];
   
    exit;
}
?>