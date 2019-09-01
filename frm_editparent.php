<?php
include "connect.php";
$pa_id = $_GET['pa_id'];
$sql = "SELECT * FROM parent WHERE pa_id = '$pa_id'";
$result = mysql_query($sql,$conn)
	or die("ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
mysql_close(); 
$rs = mysql_fetch_array($result);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="1219" height="237" border="1" cellpadding="0" cellspacing="0">
  <?php
  include "head.php";
  include "admin_menu.php";
  ?>
  <tr>
    <td><div align="center">
      <form id="form1" name="form1" method="post" action="editparent.php">
        <table width="645" border="1" cellspacing="0" cellpadding="0">
          <tr>
            <td colspan="2"><div align="center">แก้ไขกลุ่มสาระ</div></td>
          </tr>
          <tr>
            <td width="140"><div align="center">รหัสบัตรประชาชน</div></td>
            <td width="499"><input name="pa_id" type="text" id="pa_id" value="<?php echo "$rs[pa_id]"; ?>" maxlength="13" readonly="readonly" />
              <input name="pa_id" type="hidden" id="pa_id" value="<?php echo "$rs[pa_id]"; ?>" /></td>
          </tr>
          <tr>
            <td><div align="center">ชื่อ-นามสกุล</div></td>
            <td><input name="pa_name" type="text" id="pa_name" value="<?php echo "$rs[pa_name]"; ?>" /></td>
          </tr>
          <tr>
            <td><div align="center">อาชีพ</div></td>
            <td><input name="pa_occupation" type="text" id="pa_occupation" value="<?php echo "$rs[pa_occupation]"; ?>" /></td>
          </tr>
          <tr>
            <td><div align="center">เบอร์โทร</div></td>
            <td><input name="pa_tel" type="text" id="pa_tel" value="<?php echo "$rs[pa_tel]"; ?>" /></td>
          </tr>
          <tr>
            <td colspan="2"><div align="center">
              <input type="submit" name="button" id="button" value="บันทึก" />
              <input type="button" onclick = "window.history.back()" name="button2" id="button2" value="ยกเลิก" />
            </div></td>
          </tr>
        </table>
      </form>
    </div></td>
  </tr>
  <?php
  include "foot.php"
  ?>
</table>
</body>
</html>