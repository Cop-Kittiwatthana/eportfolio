<?php
// $server = "localhost";//localhost
// $user = "root"; //root@localhost
// $password = "";//""
// $dbname = "project1";//db_eportfolio
// $conn = mysqli_connect($server,$user,$password);
// if(!$conn)
// 	die("1. ไม่สามารถติดต่อกับ mysql ได้");
// mysqli_select_db($dbname,$conn)
// 	or die("2. ไม่สามารถเรียกใช้งานฐานข้อมูลได้");
// mysqli_query("SET character_set_results=utf8");
// mysqli_query("SET character_set_client=utf8");
// mysqli_query("SET character_set_connection=utf8");


$server = "localhost";//localhost
$user = "root"; //root@localhost
$password = "";//""
$dbname = "project1";//db_eportfolio
$conn = mysqli_connect($server,$user,$password);
if (!$conn) {
    error_log("Failed to connect to MySQL: " . mysqli_error($connection));
    die("1. ไม่สามารถติดต่อกับ mysql ได้");
}
// 2. Select a database to use 
$db_select = mysqli_select_db($connection, $conn);
if (!$db_select) {
    error_log("Database selection failed: " . mysqli_error($connection));
	die("2. ไม่สามารถเรียกใช้งานฐานข้อมูลได้");
	mysqli_set_charset($conn,'utf8');
}

?>