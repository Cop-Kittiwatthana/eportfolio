<?php
session_start();
if (isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && $_SESSION["u_stat"] == '0') {
  ?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>เพิ่มข้อมูลตำรวจ</title>
    <?php include "abc.php"; ?>
  </head>

  <body>
    <?php
      include "admin_menu.php";
      ?>
    <table width="800" height="400" border="0" align="center">
      <?php
        include "head.php";
        ?>
      <td height="263">
        <form id="form1" name="form1" method="post" action="addwitness.php" enctype="multipart/form-data">
          <br>
          <div id="content-wrapper">
            <div class="container h-100 ">
              <div class="row h-100 justify-content-center align-items-center">
                <!-- DataTables Example -->
                <div class="card col-sb-8">
                  <div class="card-header">
                    <div><i class="far fa-edit"></i>
                    เพิ่มข้อมูลตำรวจ
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <tr>
                            <td width="138" align="center">Username</td>
                            <td width="656"><input class="form-control" onkeypress="isInputNumber(event)" required="required" type="text" name="w_id" id="w_id" maxlength="13" /></td>
                      </tr>
                      <tr>
                            <td width="138" align="center">Password</td>
                            <td width="656"><input class="form-control" onkeypress="isInputNumber(event)" required="required" type="text" name="w_id" id="w_id" maxlength="13" /></td>
                      </tr>
                      <tr>
                            <td width="138" align="center">ชื่อ-นามสกุล</td>
                            <td width="656"><input class="form-control" onkeypress="isInputChar(event)" required="required" type="text" name="w_name" id="w_name" maxlength="50" /></td>
                      </tr>
                     <tr>
                          <td width="138" align="center">ที่อยู่</td>
                          <td width="656">
                            <textarea class="form-control" required="required" name="w_address" id="w_address" maxlength="100"></textarea></td>
                        </tr>
                        <tr>
                            <td width="138" align="center">เบอร์โทร</td>
                            <td width="656"><input class="form-control" onkeypress="isInputNumber(event)" required="required" type="text" name="w_tel" id="w_tel" maxlength="15" /></td>
                      </tr>
                        <tr>
                          <td height="28">รูป</td>
                          <td><input type="file" name="photo" id="photo" /></td>
                        </tr>
                        
                        <tr>
                          <td colspan="2" align="center">
                            <input class="btn btn-primary" type="submit" name="btnsave" id="btnsave" value="บันทึก" />
                            <input class="btn btn-danger" type="reset" onclick="window.history.back()" name="btnCancel" id="btnCancel" value="ยกเลิก" />
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </form>
      </td>
    </table>
    <br>
    <?php
      include "foot.php"
      ?>
  </body>

  </html>
<?php
} else {
  echo "<script> alert('Please Login');window.history.go(-1);</script>";
  exit();
}
?>