<?php
include "connect.php";
$w_id = $_POST['w_id'];
$w_name = $_POST['w_name'];
$w_year = $_POST['w_year'];
$w_org = $_POST['w_org'];
$sql = "UPDATE work SET w_name = '$w_name',w_year = '$w_year',w_org = '$w_org' WHERE w_id = '$w_id'";
mysql_query($sql,$conn)
 or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
 
 mysql_close();
?>
<script language="javascript">
	alert("แก้ไขข้อมูลเรียบร้อยแล้ว");
	window.location = 'showwork.php'
</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>