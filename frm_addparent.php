<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="1176" height="336" border="1" cellpadding="0" cellspacing="0">
  <?php
  include "head.php";
  include "admin_menu.php";
  ?>
  <tr>
    <td><div align="center">
      <p>&nbsp;</p>
      <form id="form1" name="form1" method="post" action="addparent.php">
        <table width="600" border="1" cellspacing="0" cellpadding="0">
          <tr>
            <td height="45" colspan="2" bgcolor="#CC66FF"><div align="center">เพิ่มข้อมูลผู้ปกครอง</div></td>
          </tr>
          <tr>
            <td height="45" bgcolor="#FFFFFF"><div align="center">เลขประจำตัวชาชน</div></td>
            <td height="45" bgcolor="#FFFFFF"><input name="pa_id" type="text" id="pa_id" maxlength="13" /></td>
          </tr>
          <tr>
            <td height="45" bgcolor="#FFFFFF"><div align="center">ชื่อ-นามสกุล</div></td>
            <td height="45" bgcolor="#FFFFFF"><input name="pa_name" type="text" id="pa_name" /></td>
          </tr>
          <tr>
            <td height="44"><div align="center">อาชีพ</div></td>
            <td><input name="pa_occupation" type="text" id="pa_occupation" /></td>
          </tr>
          <tr>
            <td width="149" height="44"><div align="center">เบอร์โทร</div></td>
            <td width="423"><input name="pa_tel" type="text" id="pa_tel" /></td>
          </tr>
          <tr>
            <td height="35" colspan="2" bgcolor="#CC66FF"><div align="center">
              <input type="submit" name="button" id="button" value="บันทึก" />
              <input type="reset" name="button2" id="button2" value="ยกเลิก" />
            </div></td>
          </tr>
        </table>
      </form>
      <p>&nbsp;</p>
    </div></td>
  </tr>
  <?php
  include "foot.php"
  ?>
</table>
</body>
</html>
