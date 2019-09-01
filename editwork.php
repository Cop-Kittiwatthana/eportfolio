<?php
include "connect.php";
$w_id = $_POST['w_id'];
$w_name = $_POST['w_name'];
$w_year = $_POST['w_year'];
$w_org = $_POST['w_org'];
if($w_name && $w_org && $w_year){	
	$sql = "SELECT * FROM work WHERE w_name = '$w_name'";
	$result = mysql_query($sql,$conn);
	$total = mysql_num_rows($result);
	if($total == 0){
	$sql = "UPDATE work SET w_name = '$w_name',w_year = '$w_year',w_org = '$w_org' WHERE w_id = '$w_id'";
	mysql_query($sql,$conn)
	or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
	mysql_close();
	echo "<script language=\"javascript\">";
	echo "alert('แก้ไขข้อมูลเรียบร้อยแล้ว');";
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