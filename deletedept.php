<?php
include "connect.php";
$d_id = $_GET['d_id'];
$sql = "DELETE FROM department WHERE d_id = '$d_id'";
mysql_query($sql,$conn)
	or die("3. ไม่สามารถประมวลผลคำสั้งได้").mysql_error();
mysql_close();
?>
<script language="javascript">
	alert("ลบข้อมูลเรีบยร้อยแล้ว");
	window.location = 'showdept.php'
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