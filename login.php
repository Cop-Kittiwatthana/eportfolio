<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<?php  include "alert.php";
		include "abc.php"; ?>
</head>

<body>
<?php
ob_start();
include "connect.php";

$login = $_POST['login'];
$passwd = $_POST['passwd'];
$user_status = $_POST['user_status'];

if(!empty($login)&&!empty($passwd)){
	if($user_status == '1'){
		$sql="select * from police where (p_username='$login'and p_password='$passwd')";
		$result=mysql_query($sql);
		$total=mysql_num_rows($result);
		if($total){
		session_start(); 
		$_SESSION["valid_uname"]=$login;
		$_SESSION["valid_pwd"]=$passwd;
		$_SESSION["u_stat"]=$user_status;
		mysql_close($conn);
		echo "<script>Swal.fire({
			type: 'success',
			title: 'Welcome',
			showConfirmButton: true,
			timer: 1500
		  }).then(() => { 
			  window.location = 'frm_editme.php'
			});
		 
		  </script>"; 
		exit();
		}
	else{
		echo "<script>Swal.fire({
			type: 'error',
			title: 'Not Found',
			showConfirmButton: true,
			timer: 1500
		  }).then(() => { 
			  window.history.go(-1)
			});
		 
		  </script>";
		exit();	
		}
	}
	else{
	//ส่วนของ Admin
		if($login == "a" && $passwd=="a"){
			session_start();
			$_SESSION["valid_uname"]=$login;
			$_SESSION["valid_pwd"]=$passwd;
			$_SESSION["u_stat"]=$user_status;
			mysql_close($conn);
			echo "<script>Swal.fire({
				type: 'success',
				title: 'Welcome',
				showConfirmButton: true,
				timer: 1500
			  }).then(() => { 
				  window.location = 'showposition.php'
				});
			 
			  </script>"; 
			exit();
		}
		else{
			echo "<script>Swal.fire({
				type: 'error',
				title: 'Not Found',
				showConfirmButton: true,
				timer: 1500
			  }).then(() => { 
				  window.history.go(-1)
				});
			 
			  </script>";
		exit();	
		}
	}
}
else{
	echo "<script>Swal.fire({
		type: 'error',
		title: 'ขออภัย...!!.กรุณากรอกข้อมูลให้ครบ',
		showConfirmButton: true,
		timer: 1500
	  }).then(() => { 
		  window.history.go(-1)
		});
	 
	  </script>";
	exit();
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