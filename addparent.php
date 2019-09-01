<?php
$server = "localhost";
$user = "root";
$password = "";
$dbname = "db_eportfolio";
$conn = mysql_connect($server,$user,$password);

if(!$conn)
	die("1.ไม่สามารถติดต่อกับ MySQL ได้");
mysql_select_db($dbname,$conn)
	or die("2.ไม่สามารถเลือกใช้ฐานข้อมูลได้");
mysql_query("SET character_set_ersults=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");

$pa_id = $_POST['pa_id'];
$pa_name = $_POST['pa_name'];
$pa_occupation = $_POST['pa_occupation'];
$pa_tel = $_POST['pa_tel'];
 
if(strlen($pa_id) == 13 && $pa_name  && $pa_occupation && $pa_tel){
	$sql="SELECT* FROM parent WHERE pa_id = '$pa_id'";
	$result= mysql_query($sql, $conn);
	$total = mysql_num_rows($result);
	if($total == 0){
		$sql = "INSERT INTO parent (pa_id, pa_name, pa_occupation, pa_tel) VALUES ('$pa_id', '$pa_name', '$pa_occupation', '$pa_tel')";
		mysql_query($sql, $conn)
		or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
		mysql_close();
	
	echo"<script language=\"javascript\">";
	echo"alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
	echo "window.location = 'showparent.php'";
	//echo "window.history.back();";
	echo"</script>";
	
}
else{
	echo"<script language=\"javascript\">";
	echo"alert('เลขบัตรประจำตัวซ้ำ');";
	echo"window.history.back();";
	echo"</script>";
	
	}
}
else{
	$msg = "";
	if(strlen($pa_id)!=13) $msg = $msg." รหัสบัตรประชาชน";
	if(!$pa_name) $msg = $msg." ชื่อ";
	if(!$pa_occupation) $msg = $msg." อาชีพ";	
	if(!$pa_tel) $msg = $msg." เบอร์โทร";
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