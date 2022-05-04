
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
$std_id = $_POST['std_id'];
$sql = "DELETE FROM student WHERE std_id = '$std_id'";
mysql_query($sql,$conn)
	or die("3. ไม่สามารถประมวลผลคำสั้งได้").mysql_error();
mysql_close();
echo "<script>Swal.fire({
	title: คุณต้องการลบ?',
	text: 'คุณต้องการลบ!',
	icon: 'warning',
	showCancelButton: true,
	confirmButtonColor: '#3085d6',
	cancelButtonColor: '#d33',
	confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
	if (result.value) {
	  Swal.fire(
		'Deleted!',
		'Your file has been deleted.',
		'success'
	  )
	}
  })
  </script>";
?>
</body>
</html>