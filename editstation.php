<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Untitled Document</title>
	<?php include "abc.php"; ?>
</head>

<body>
	<?php
	include "connect.php";
	$ps_id = $_POST['ps_id'];
	$ps_name = $_POST['ps_name'];
	$ps_address = $_POST['ps_address'];
	if ((empty($ps_name)) || (empty($ps_address))) {
		$msg = "";
		if (!$ps_name) $msg = $msg . " ชื่อสถานีตำรวจ";
		if (!$ps_address) $msg = $msg . " สถานที่ตั้ง";
		echo "<script>Swal.fire({
		type: 'error',
		title: 'กรุณาป้อน{$msg}',
		showConfirmButton: true,
		timer: 1500
	  }).then(() => { 
		 window.history.back()
		});
	  </script>";
	} else {
		$sql = "SELECT * FROM station WHERE ( ps_name='".$ps_name."')and ps_id != $ps_id  ";
		//$sql = "SELECT * FROM station WHERE ps_id = '$ps_id'";
		$result = mysql_query($sql, $conn) or die(mysql_error());
		if (mysql_num_rows($result) != 0) {
			echo "<script>Swal.fire({
		type: 'error',
		title: 'ชื่อสถานีตำรวจซ้ำ',
		showConfirmButton: true,
		timer: 1500
	  }).then(() => { 
		 window.history.back()
		});
	  </script>";
		} else {
			$sql1 = "UPDATE station SET ps_name ='$ps_name',ps_address ='$ps_address' WHERE ps_id = '$ps_id'";
			$result1 = mysql_query($sql1)
				or die("3.ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();
			echo "<script>Swal.fire({
			type: 'success',
			title: 'แก้ไขข้อมูลเรียบร้อย',
			showConfirmButton: true,
			timer: 1500
		  }).then(() => { 
			  window.location = 'showstation.php'
			});
		  </script>";
		}
	}
	mysql_close();
	?>
</body>

</html>