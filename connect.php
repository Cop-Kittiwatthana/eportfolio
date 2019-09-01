<?php
$server = "localhost";
$user = "root";
$password = "";
$dbname = "db_eportfolio";
//$tb_name = "classroom";
$conn = mysql_connect($server,$user,$password);
if(!$conn)
	die("1. ไม่สามารถติดต่อกับ mysql ได้");
mysql_select_db($dbname,$conn)
	or die("2. ไม่สามารถเรียกใช้งานฐานข้อมูลได้");
mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");
?>