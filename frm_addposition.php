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
      <form id="form1" name="form1" method="post" action="addposition.php">
        <table width="600" border="1" cellspacing="0" cellpadding="0">
          <tr>
            <td height="45" colspan="2" bgcolor="#FF99FF"><div align="center">เพิ่มตำแหน่ง</div></td>
          </tr>
          <tr>
            <td width="129" height="44"><div align="center">ชื่อตำแหน่ง</div></td>
            <td width="432"><input type="text" name="po_name" id="po_name" /></td>
          </tr>
          <tr>
            <td height="35" colspan="2" bgcolor="#FF99FF"><div align="center">
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