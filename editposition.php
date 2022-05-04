

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<?php include "abc.php"; 
include "head.php";
?>

</head>

<body>	
<?php
include "connect.php";
$po_id = $_POST['po_id'];
$po_name = $_POST['po_name'];
$sql = "UPDATE position SET po_name ='$po_name' WHERE po_id = '$po_id'";
if($po_name){	
	$sql = "SELECT * FROM position WHERE po_name = '$po_name'";
	$result = mysql_query($sql,$conn);
	$total = mysql_num_rows($result);
	if($total == 0){
		$sql = "UPDATE position SET po_name ='$po_name' WHERE po_id = '$po_id'";
		mysql_query($sql,$conn)
			or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
		mysql_close();
		echo "<script>Swal.fire({
			type: 'success',
			title: 'แก้ไขข้อมูลเรียบร้อย',
			showConfirmButton: true,
			timer: 1500
		  }).then(() => { 
			  window.location = 'showposition.php'
			});
		  </script>";
	}else{
		echo "<script>Swal.fire({
			type: 'error',
			title: 'ชื่อตำแหน่งซ้ำ',
			showConfirmButton: true,
			timer: 1500
		  }).then(() => { 
			 window.history.back()
			});
		  </script>";
	}
}else{
	echo "<script language=\"javascript\">";
	echo "alert('กรุณาป้อนชื่อตำแหน่ง');";
	echo "window.history.back();";
	echo "</script>";	
}
?>
</body>
</html>