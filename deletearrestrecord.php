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
	$ar_id = $_GET['ar_id'];
		$del1 = mysql_query("DELETE FROM arrestrecord  WHERE ar_id = '$ar_id' ");
		$del2 = mysql_query("DELETE FROM arrest_police  WHERE ar_id  = '$ar_id' ");
		$del3 = mysql_query("DELETE FROM arrest_punis  WHERE ar_id  = '$ar_id' ");
		$del4 = mysql_query("DELETE FROM arrest_suspect  WHERE ar_id  = '$ar_id' ");
		$del4 = mysql_query("DELETE FROM arrest_withess  WHERE ar_id  = '$ar_id' ");
	mysql_close();
	echo "<script>Swal.fire({
	type: 'success',
	title: 'ลบข้อมูลเรียบร้อย',
	showConfirmButton: true,
	timer: 1500
  }).then(() => { 
	  window.location = 'showarrestrecord.php'
	});
  </script>";
	?>
</body>

</html>