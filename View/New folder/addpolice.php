

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
	$p_name = $_POST['p_name'];
	$p_address = $_POST['p_address'];
	$p_tel = $_POST['p_tel'];
	$p_username = $_POST['p_username'];
	$p_password = $_POST['p_password'];
	$po_id = $_POST['po_id'];
	$ps_id = $_POST['ps_id'];
	
	$fileupload =$_FILES['photo']['tmp_name'];
	$fileupload_name = uniqid().$_FILES['photo']['name'];
	
if($p_name && $p_username){
	$sql = "SELECT * FROM police WHERE p_name = '$p_name' OR p_username = '$p_username'";
	$resule = mysql_query($sql,$conn);
	$total = mysql_fetch_array ($resule);
	if($total==0){
		
	if($fileupload !=""){
		if(!is_dir("./picture")){
				mkdir("./picture");
			}
		copy($fileupload,"./picture/".$fileupload_name);
		$sql ="INSERT INTO police(p_username,p_password,p_name,p_address,p_tel,po_id,ps_id,p_pic)VALUES ('$p_username','$p_password','$p_name','$p_address','$p_tel','$po_id','$ps_id','$fileupload_name')";
	}
	else{
	$sql ="INSERT INTO police (p_username,p_password,p_name,p_address,p_tel,po_id,ps_id)VALUES('$p_username','$p_password','$p_name','$p_address','$p_tel','$po_id','$ps_id')";	
	}
	mysql_query($sql,$conn)
		or die("3. ไม่สามารถประมวลผลคำสั่งได้");
	mysql_close();
	
	echo "<script>Swal.fire({
		type: 'success',
		title: 'บันทึกข้อมูลเรียบร้อยแล้ว',
		showConfirmButton: true,
		timer: 1500
	  }).then(() => { 
		  window.location = 'showpolice.php'
		});
	  </script>";		
}else{
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
}
else{
	$msg = "";
	if(!$p_username) $msg .= " username";
	if(!$p_name) $msg .= " ชื่อ - สกุล";
	echo "<script>Swal.fire({
		type: 'error',
		title: 'กรุณาป้อน{$msg}',
		showConfirmButton: true,
		timer: 1500
	  }).then(() => { 
		window.history.back()
		});
	  </script>";;
}
?>
</body>
</html>