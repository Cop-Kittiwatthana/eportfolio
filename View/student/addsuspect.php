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
	$s_id = $_POST['s_id'];
	$s_name = $_POST['s_name'];
	$std_address = $_POST['s_address'];
	$s_tel = $_POST['s_tel'];
	$s_pic = $_POST['s_pic'];

	$fileupload = $_FILES['photo']['tmp_name'];
	$fileupload_name = uniqid() . $_FILES['photo']['name'];

	if ($s_id && $s_name && $s_address && $s_tel) {
		$sql = "SELECT * FROM suspect WHERE s_name = '$s_name' and s_id = '$s_id'";
		$resule = mysql_query($sql, $conn);
		$total = mysql_fetch_array($resule);

		if ($total == 0) {
			if ($fileupload != "") {
				if (!is_dir("./picture")) {
					mkdir("./picture");
				}
				copy($fileupload, "./picture/" . $fileupload_name);
				$sql = "INSERT INTO suspect(s_id,s_name,s_address,s_tel,s_pic)VALUES ('$s_id','$s_name','$s_address','$s_tel','$fileupload_name')";
			} else {
				$sql = "INSERT INTO suspect (s_id,s_name,s_address,s_tel)VALUES('$s_id','$s_name','$s_address','$s_tel')";
			}
			mysql_query($sql, $conn)
				or die("3. ไม่สามารถประมวลผลคำสั่งได้");
			mysql_close();

			echo "<script>Swal.fire({
				type: 'success',
				title: 'บันทึกข้อมูลเรียบร้อยแล้ว',
				showConfirmButton: true,
				timer: 1500
			  }).then(() => { 
				  window.location = 'showsuspect.php'
				});
			  </script>";
		} else {
			echo "<script>Swal.fire({
				type: 'error',
				title: 'ป้อนข้อมูลซ้ำ',
				showConfirmButton: true,
				timer: 1500
			  }).then(() => { 
				 window.history.back()
				});
			  </script>";
		}
	} else {
		$msg = "";
		if(strlen($s_id)!=13) $msg = $msg." รหัสผู้ต้องหา";
		if (!$std_name) $msg .= " ชื่อ - สกุล";
		if (!$std_address) $msg .= " ที่อยู่";
		if (!$std_tel) $msg .= " เบอร์โทร";
		echo "<script>Swal.fire({
			type: 'error',
			title: 'กรุณาป้อน{$msg}',
			showConfirmButton: true,
			timer: 1500
		  }).then(() => { 
			window.history.back()
			});
		  </script>";
	}
	?>
</body>

</html>