
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
	$s_address = $_POST['s_address'];
	$s_tel = $_POST['s_tel'];
	$s_pic = $_POST['s_pic'];
	
	$fileupload =$_FILES['photo']['tmp_name'];
	$fileupload_name = uniqid().'_'.$_FILES['photo']['name'];
	
	if((empty($s_name))||(empty($s_address))||(empty($s_tel))){
		$msg = "";
		if(!$s_name) $msg = $msg." ชื่อ-สกุล";
		if(!$s_address) $msg = $msg." ที่อยู่";
		if(!$s_tel) $msg = $msg." เบอร์โทรศัพท์";
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
	
	else{
		$sql = "SELECT * FROM suspect WHERE (s_name='".$s_name."') and s_id != $s_id  ";
		$result = mysql_query($sql,$conn)or die(mysql_error());
		//$total = mysql_num_rows($result);
		if(mysql_num_rows($result)!= 0){
			echo "<script>Swal.fire({
				type: 'error',
				title: 'ชื่อผู้ต้องหาซ้ำ',
				showConfirmButton: true,
				timer: 1500
			  }).then(() => { 
				 window.history.back()
				});
			  </script>";
		}
		
		else{
		if($fileupload !=""){
			if($std_pic!=""){
				unlink("./picture/$std_pic");
			}
			copy($fileupload,"./picture/".$fileupload_name);
			$sql1 = "UPDATE suspect SET s_id ='$s_id',s_name ='$s_name',s_address ='$s_address',s_tel ='$s_tel',s_pic ='$fileupload_name' WHERE s_id = '$s_id'";
			}
		else{
				$sql1 = "UPDATE suspect SET s_id ='$s_id',s_name ='$s_name',s_address ='$s_address',s_tel ='$s_tel', WHERE s_id = '$s_id'";
			}
		mysql_query($sql1,$conn)
	or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
	echo "<script>Swal.fire({
		type: 'success',
		title: 'แก้ไขข้อมูลเรียบร้อย',
		showConfirmButton: true,
		timer: 1500
	  }).then(() => { 
		  window.location = 'showsuspect.php'
		});
	  </script>";
	}
	}
	mysql_close();
?>
</body>
</html>