
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
	$p_id = $_POST['p_id'];
	$p_name = $_POST['p_name'];
	$p_address = $_POST['p_address'];
	$p_tel = $_POST['p_tel'];
	$p_username = $_POST['p_username'];
	$p_password = $_POST['p_password'];
	$po_id = $_POST['po_id'];
	$ps_id = $_POST['ps_id'];
	$p_pic = $_POST['p_pic'];
	
	$fileupload =$_FILES['photo']['tmp_name'];
	$fileupload_name = uniqid().'_'.$_FILES['photo']['name'];
	
	
	if((empty($p_name))||(empty($p_address))||(empty($p_tel))){
		$msg = "";
		if(!$p_name) $msg = $msg." ชื่อ-สกุล";
		if(!$p_address) $msg = $msg." ที่อยู่";
		if(!$p_tel) $msg = $msg." เบอร์โทรศัพท์";
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
		$sql = "SELECT * FROM police WHERE (p_name='".$p_name."') and p_id != $p_id  ";
		$result = mysql_query($sql,$conn)or die(mysql_error());
		//$total = mysql_num_rows($result);
		if(mysql_num_rows($result)!= 0){
			echo "<script>Swal.fire({
				type: 'error',
				title: 'ชื่อตำรวจซ้ำ',
				showConfirmButton: true,
				timer: 1500
			  }).then(() => { 
				 window.history.back()
				});
			  </script>";
		}
		
		else{
		if($fileupload !=""){
			if($p_pic!=""){
				unlink("./picture/$p_pic");
			}
			copy($fileupload,"./picture/".$fileupload_name);
			$sql1 = "UPDATE police SET p_password ='$p_password',p_name ='$p_name',p_address ='$p_address',p_tel ='$p_tel',po_id ='$po_id',ps_id ='$ps_id',p_pic ='$fileupload_name' WHERE p_id = '$p_id'";
			}
			else{
				$sql1 = "UPDATE police SET p_password ='$p_password',p_name ='$p_name',p_address ='$p_address',p_tel ='$p_tel',po_id ='$po_id',ps_id ='$ps_id' WHERE p_id = '$p_id'";
			}
		mysql_query($sql1,$conn)
	or die("3.ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
	echo "<script>Swal.fire({
		type: 'success',
		title: 'แก้ไขข้อมูลเรียบร้อย',
		showConfirmButton: true,
		timer: 1500
	  }).then(() => { 
		  window.location = 'showpolice.php'
		});
	  </script>";
	}
	}
	mysql_close();

?>
</body>
</html>