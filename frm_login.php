<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Untitled Document</title>
  <?php include "abc.php";
  include "alert.php";
  ?>

</head>

<body>
  <?php include "user_menu.php"; ?>
  <table width="800" height="400" border="0" align="center">
    <tr>
      <?php
      include "head.php";
      ?>
      <br>
      <br>
      <br>
      <td height="182" align="center">
      <form id="form1" name="form1" method="post" action="login.php">
      <td align="center">
        <div class="container">
          <div class="card card-login mx-auto mt-2">
            <div class="card-header">
              <i class="fas fa-sign-in-alt"></i>Login</div>
            <div class="card-body">

              <table width="600" height="0" border="0" align="center" cellpadding="0" cellspacing="0">
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" onkeypress="isInputUsername(event)" id="login" name="login" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
                    <label for="login">ชื่อล็อกอิน</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="password" name="passwd" id="passwd" onkeypress="isInputUsername(event)" class="form-control" placeholder="Password" required="required">
                    <label for="passwd">รหัสผ่าน</label>
                  </div>
                </div>
                <tr>
                  <td width="180" align="center">สถานะ</td>
                  <td width="700">
                    <p>
                      <input name="user_status" type="radio" id="radio" value="1" checked="checked" />
                      พนักงาน
                    </p>
                    <input type="radio" name="user_status" id="radio2" value="0" />
                    ผู้ดูแลระบบ</p>
                  </td>
                </tr>
              </table>
              <p>
                <input class="btn btn-primary" type="submit" name="btnsave" id="btnsave" value="บันทึก" />
                <input class="btn btn-danger" type="reset" onclick="window.history.back()" name="btnCancel" id="btnCancel" value="ยกเลิก" />
              </p>
              </form>
      </td>

  </table>
  <br>
  <br>
  <?php include "foot.php"; ?>
</body>

</html>