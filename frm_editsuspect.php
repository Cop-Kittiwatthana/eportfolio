<?php
session_start();
if (isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && $_SESSION["u_stat"] == '1') {
  include "connect.php";
  $s_id = $_GET['s_id'];
  $sql = "SELECT * FROM suspect WHERE s_id = '$s_id'";
  $result = mysql_query($sql, $conn)
    or die("3. ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();
  $rs = mysql_fetch_array($result);
  ?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>แก้ไขข้อมูลผู้ต้องหา</title>
    <?php include "abc.php"; ?>
  </head>

  <body>
    <?php
      include "admin_menu.php";
      ?>
    <table width="800" height="400" border="0" align="center">
      <tr>
        <?php
          include "head.php";
          ?>
        <td height="263">
          <form id="form1" name="form1" method="post" action="editsuspect.php" enctype="multipart/form-data">
            <br>
            <div id="content-wrapper">
              <div class="container h-100 ">
                <div class="row h-100 justify-content-center align-items-center">
                  <!-- DataTables Example -->
                  <div class="card col-sb-8">
                    <div class="card-header">
                      <div><i class="far fa-edit"></i>
                      แก้ไขข้อมูลผู้ต้องหา
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          
                        <tr>
                            <td width="138" align="center">รหัสผู้ต้องหา</td>
                            <td width="656"><input class="form-control" onkeypress="isInputNumber(event)" required="required" type="text" name="s_id" id="s_id" value="<?php echo "$rs[s_id]"; ?>" readonly="readonly"/></td>
                      </tr>
                      <tr>
                            <td width="138" align="center">ชื่อ-นามสกุล</td>
                            <td width="656"><input class="form-control" onkeypress="isInputChar(event)" required="required" type="text" name="s_name" id="s_name" maxlength="50" value="<?php echo "$rs[s_name]"; ?>"/></td>
                      </tr>
                     <tr>
                          <td width="138" align="center">ที่อยู่</td>
                          <td width="656">
                            <textarea class="form-control" required="required" name="s_address" id="s_address"  maxlength="100" ><?php echo "$rs[s_address]"; ?></textarea></td>
                        </tr>
                        <tr>
                            <td width="138" align="center">เบอร์โทร</td>
                            <td width="656"><input class="form-control" onkeypress="isInputNumber(event)" required="required" type="text" name="s_tel" id="s_tel" maxlength="15" value="<?php echo "$rs[s_tel]"; ?>"/></td>
                      </tr>
                        <tr>
                          <td width="138" align="center">รูป</td>
                          <td>
                          <?php
                                if ("$rs[s_pic]" != "") {
                                  ?>
                                <img src="<?php echo "./picture/$rs[s_pic]"; ?>" width="100" height="130" />
                              <?php
                                }
                                ?>  
                          <input type="file" name="photo" id="photo" /></td>
                        </tr>
                          <tr>
                            <td colspan="2" align="center">
                              <input class="btn btn-primary" type="submit" name="btnsave" id="btnsave" value="บันทึก" />
                              <input class="btn btn-danger" type="reset" onclick="window.history.back()" name="btnCancel" id="btnCancel" value="ยกเลิก" />
                              <input name="s_id" type="hidden" id="s_id" value="<?php echo "$rs[s_id]"; ?>" />
                              <input name="s_pic" type="hidden" id="s_pic" value="<?php echo "$rs[s_pic]"; ?>" />
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
    </table>
    <p>&nbsp;</p>
    </div>
    </td>
    </tr>
    <?php
      include "foot.php"
      ?>
    </table>
  </body>

  </html>
<?php
} else {
  echo "<script> alert('Please Login');window.history.go(-1);</script>";
  exit();
}
?>