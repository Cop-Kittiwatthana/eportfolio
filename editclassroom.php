<?php
include "connect.php";
$c_id = $_POST['c_id'];
$c_name = $_POST['c_name'];
if($c_name){	
	$sql = "SELECT * FROM classroom WHERE c_name = '$c_name'";
	$result = mysql_query($sql,$conn);
	$total = mysql_num_rows($result);
	if($total == 0){
		$sql = "UPDATE classroom SET c_name ='$c_name' WHERE c_id = '$c_id'";
		mysql_query($sql,$conn)
			or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
		mysql_close();
		echo "<script language=\"javascript\">";
		echo "alert('แก้ไขข้อมูลเรียบร้อยแล้ว');";
		echo "window.location = 'showclassroom.php'";
		//echo "window.history.back();";
		echo "</script>";
	}else{
		echo "<script language=\"javascript\">";
		echo "alert('ชื่อชั้นเรียนซ้ำ');";
		echo "window.history.back();";
		echo "</script>";
	}
}else{
	echo "<script language=\"javascript\">";
	echo "alert('กรุณาป้อนชื่อชั้นเรียน');";
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