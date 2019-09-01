<?php
include "connect.php";

$sql = "SELECT * FROM department order by d_id";
$result = mysql_query($sql,$conn)
 or die("3. ไม่สามารถประมวลผลคำสั้งได้").mysql_error();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="1200" height="336" border="1" cellpadding="0" cellspacing="0">
<?php
  include "head.php";
  include "admin_menu.php";
?>
  <tr>
    <td width="1101"><div align="center">
      <form id="form1" name="form1" method="post" action="">
        <table width="872" height="104" border="1" cellpadding="0" cellspacing="0">
          <tr>
            <td colspan="4" align="center"><div align="center">รายงานข้อมูลกลุ่มสาระ</div></td>
            <td width="116" align="center"><div align="center"><?php echo "<a href=\"frm_addept.php?d_id=[d_id]\">"; ?> [เพิมกลุ่มสาระ]<?php echo "</a>";?></div></td>
          </tr>
          <tr>
            <td width="131" align="center">รหัสกลุ่มสาระ</td>
            <td width="199" align="center"><div align="center">ชื่อชั้นเรียน</div></td>
            <td width="237" align="center">&nbsp;</td>
            <td width="177" align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
          </tr>
          <?php
		  while($rs=mysql_fetch_array($result)){
		 ?>
          <tr>
            <td align="center"><?php echo "$rs[d_id]";?></td>
            <td align="center"><?php echo "$rs[d_name]";?></td>
            <td align="center">จัดการหัวหน้ากลุ่มสาระ</td>
            <td align="center"><?php echo "<a href=\"frm_editdept.php?d_id=$rs[d_id]\">"; ?> แก้ไข<?php echo "</a>";?></td>
            <td align="center"><?php echo "<a href=\"deletedept.php?d_id=$rs[d_id]\">"; ?>ลบ<?php echo "</a>"; ?></td>
          </tr>
          <?php
		  }
		  mysql_close();
		  ?>
        </table>
      </form>
    </div></td>
  </tr>
<?php
include "foot.php";
?>
</table>
</body>
</html>

