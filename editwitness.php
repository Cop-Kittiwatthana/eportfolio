
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
	$w_id = $_POST['w_id'];
	$w_name = $_POST['w_name'];
	$w_address = $_POST['w_address'];
	$w_tel = $_POST['w_tel'];
	$w_pic = $_POST['w_pic'];
	
	$fileupload =$_FILES['photo']['tmp_name'];
	$fileupload_name = uniqid().'_'.$_FILES['photo']['name'];
	
	if((empty($w_name))||(empty($w_address))||(empty($w_tel))){
		$msg = "";
		if(!$w_name) $msg = $msg." ชื่อ-สกุล";
		if(!$w_address) $msg = $msg." ที่อยู่";
		if(!$w_tel) $msg = $msg." เบอร์โทรศัพท์";
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
		$sql = "SELECT * FROM witness1 WHERE (w_name='".$w_name."') and w_id != $w_id  ";
		$result = mysql_query($sql,$conn)or die(mysql_error());
		//$total = mysql_num_rows($result);
		if(mysql_num_rows($result)!= 0){
			echo "<script>Swal.fire({
				type: 'error',
				title: 'ชื่อพยานซ้ำ',
				showConfirmButton: true,
				timer: 1500
			  }).then(() => { 
				 window.history.back()
				});
			  </script>";
		}
		else{
			if($fileupload !=""){
				if($w_pic!=""){
					unlink("./picture/$w_pic");
				}
				copy($fileupload,"./picture/".$fileupload_name);
					$sql1 = "UPDATE witness1 SET w_name ='$w_name',w_address ='$w_address',w_tel ='$w_tel',w_pic ='$fileupload_name' WHERE w_id = '$w_id'";
				}
			else{
				$sql1 = "UPDATE witness1 SET w_name ='$w_name',w_address ='$w_address',w_tel ='$w_tel' WHERE w_id = '$w_id'";
			}
		mysql_query($sql1,$conn)
	or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
	echo "<script>Swal.fire({
		type: 'success',
		title: 'แก้ไขข้อมูลเรียบร้อย',
		showConfirmButton: true,
		timer: 1500
	  }).then(() => { 
		  window.location = 'showwitness.php'
		});
	  </script>";
	}
	}
	mysql_close();
?>
</body>
</html>