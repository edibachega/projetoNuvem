<?php
$dbhost_mysql     =  'localhost';
$user_mysql       =  'root';
$password_mysql   =  'fagote00';
$db_mysql     =  'estadb';

$conn = mysql_connect($dbhost_mysql,$user_mysql,$password_mysql);
mysql_select_db($db_mysql,$conn);

?>