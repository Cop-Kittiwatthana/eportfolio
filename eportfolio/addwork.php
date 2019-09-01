<?php
$server = "localhost";
$user = "root";
$password = "";
$dbname = "db_eportfolio";
$conn = mysql_connect($server,$user,$password);
if(!$conn)
	die("1. ไม่สามารถติดต่อกับ mysql ได้");
mysql_select_db($dbname,$conn)
	or die("2. ไม่สามารถเรียกใช้งานฐานข้อมูลได้");
mysql_query("SET character_set_result=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");

$w_name = $_POST["w_name"];
$w_year = $_POST["w_year"];
$w_org = $_POST["w_org"];

if($w_name && $w_org && $w_year){	
	$sql = "SELECT * FROM work WHERE w_name = '$w_name'";
	$result = mysql_query($sql,$conn);
	$total = mysql_num_rows($result);
	if($total == 0){
		$sql = "INSERT INTO work (w_name,w_year,w_org) VALUES('$w_name','$w_year','$w_org')";
		mysql_query($sql,$conn)
		or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
		mysql_close();
	echo "<script language=\"javascript\">";
	echo "alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
	echo "window.location = 'showwork.php'";
	//echo "window.history.back();";
	echo "</script>";
}
else{
	echo "<script language=\"javascript\">";
	echo "alert('ชื่อผลงานซ้ำ');";
	echo "window.history.back();";
	echo "</script>";
	}
}
else{
	$msg = "";
	if(!$w_name) $msg = $msg." ชื่อผลงาน";
	if(!$w_year) $msg = $msg." ปี";
	if(!$w_org) $msg = $msg." หน่วยงาน";
	echo "<script language=\"javascript\">";
	echo "alert('กรุณาป้อน{$msg}');";
	echo "window.history.back();";
	echo "</script>";	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>