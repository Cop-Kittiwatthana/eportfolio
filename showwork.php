<?php
include "connect.php";

$sql = "SELECT * FROM work";
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
    <td width="1196"><div align="center">
      <form id="form1" name="form1" method="post" action="">
        <table width="982" height="104" border="1" cellpadding="0" cellspacing="0">
          <tr>
            <td colspan="6" align="center"><div align="center">รายงานข้อมูลผลงาน</div></td>
            <td width="103" align="center"><div align="center">[เพิมผลงาน]</div></td>
          </tr>
          <tr>
            <td width="118" align="center">รหัสผลงาน</td>
            <td width="189" align="center"><div align="center">ชื่อผลงาน</div></td>
            <td width="92" align="center">ปี</td>
            <td width="110" align="center">หน่วยงาน</td>
            <td width="233" align="center">&nbsp;</td>
            <td width="121" align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
          </tr>
          <?php
		  while($rs=mysql_fetch_array($result)){
		 ?>
          <tr>
            <td align="center"><?php echo "$rs[w_id]";?></td>
            <td align="center"><?php echo "$rs[w_name]";?></td>
            <td align="center"><?php echo "$rs[w_year]";?></td>
            <td align="center"><?php echo "$rs[w_org]";?></td>
            <td align="center">จัดการข้อมูลผลงาน</td>
            <td align="center"><?php echo "<a href=\"frm_editwork.php?w_id=$rs[w_id]\">"; ?> แก้ไข<?php echo "</a>";?></td>
            <td align="center"><?php echo "<a href=\"deletework.php?w_id=$rs[w_id]\">"; ?>ลบ<?php echo "</a>"; ?></td>
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