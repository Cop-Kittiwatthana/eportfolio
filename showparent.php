<?php
include "connect.php";
$sql = "SELECT * FROM parent ORDER BY pa_id";
$result = mysql_query($sql,$conn)
	or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
mysql_close();
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
    <td width="1196"><div align="center">
      <form id="form1" name="form1" method="post" action="">
        <table width="1023" height="104" border="1" cellpadding="0" cellspacing="0">
          <tr>
            <td colspan="6" align="center"><div align="center">รายงานข้อมูลผู้ปกครอง</div></td>
            <td width="121" align="center"><div align="center"><?php echo "<a href=\"frm_addparent.php?pa_id=[pa_id]\">"; ?> [เพิมผู้ปกครอง]<?php echo "</a>";?></div></td>
          </tr>
          <tr>
            <td width="139" align="center">รหัสบัตรประชาชน</td>
            <td width="188" align="center"><div align="center">ชื่อ-นามสกุล</div></td>
            <td width="129" align="center">อาชีพ</td>
            <td width="122" align="center">เบอร์โทร</td>
            <td width="202" align="center">&nbsp;</td>
            <td width="106" align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
          </tr>
          <?php
		  while($rs=mysql_fetch_array($result)){
		 ?>
          <tr>
            <td align="center"><?php echo "$rs[pa_id]";?></td>
            <td align="center"><?php echo "$rs[pa_name]";?></td>
            <td align="center"><?php echo "$rs[pa_occupation]";?></td>
            <td align="center"><?php echo "$rs[pa_tel]";?></td>
            <td align="center">จัดการข้อมูลผู้ปกครอง</td>
            <td align="center"><?php echo "<a href=\"frm_editparent.php?pa_id=$rs[pa_id]\">"; ?> แก้ไข<?php echo "</a>";?></td>
            <td align="center"><?php echo "<a href=\"deleteparent.php?pa_id=$rs[pa_id]\">"; ?>ลบ<?php echo "</a>"; ?></td>
          </tr>
          <?php
		  }
		  //mysql_close();
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