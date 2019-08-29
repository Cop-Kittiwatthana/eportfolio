<?php
include "connect.php";
$d_name = $_POST['d_name'];
if($d_name){
	$sql="SELECT*FROM department WHERE d_name='$d_name'";
	$result=mysql_query($sql,$conn);
	$total=mysql_num_rows($result);
	if($total==0){
	$sql = "INSERT INTO department(d_name)VALUES('$d_name')";
	mysql_query($sql,$conn)
	or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
	mysql_close();

	echo"<script language=\"javascript\">";
	echo"alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
	//echo"window.location ='showdept.php';";
	echo "window.history.back();";
	echo"</script>";
	}
	else{
	echo"<script language=\"javascript\">";
	echo"alert('ชื่อกลุ่มสาระซ้ำ');";
	echo"window.history.back();";
	echo"</script>";
	
	}
}
else{
	echo"<script language=\"javascript\">";
	echo"alert('กรุณาป้อนชื่อกลุ่มสาระ');";
	echo"window.history.back();";
	echo"</script>";
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