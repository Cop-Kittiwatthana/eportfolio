<?php
session_start();
if (isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && $_SESSION["u_stat"] == '0') {
  include "connect.php";
  $std_id = $_GET['std_id'];
  $sql = "SELECT s.std_id,s.std_name,s.std_address,s.std_tel,s.std_pic,pa.pa_name,c.c_name 
  FROM student s,parent pa,classroom c 
  WHERE s.std_id = '$std_id' and s.pa_id = pa.pa_id and s.c_id = c.c_id";
  $result = mysql_query($sql, $conn)
    or die("3. ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();
  $rs = mysql_fetch_array($result);
  ?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ลบข้อมูลนักเรียน</title>
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
          <form id="form1" name="form1" method="post" action="deletestudent.php" enctype="multipart/form-data">
            <br>
            <div id="content-wrapper">
              <div class="container h-100 ">
                <div class="row h-100 justify-content-center align-items-center">
                  <!-- DataTables Example -->
                  <div class="card col-sb-8">
                    <div class="card-header">
                      <div><i class="far fa-edit"></i>
                        แก้ไขกลุ่มสาระ
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <tr>
                            <td width="143">ชื่อ-นามสกุล</td>
                            <td width="338"><label for="std_name"></label>
                              <input class="form-control" required="required" name="std_name" type="text" id="std_name" value="<?php echo "$rs[std_name]"; ?>" readonly="readonly" /></td>
                          </tr>
                          <tr>
                            <td>ที่อยู่</td>
                            <td><label for="std_address"></label>
                              <textarea class="form-control" required="required" name="std_address" readonly="readonly" id="std_address"><?php echo "$rs[std_address]"; ?></textarea></td>
                          </tr>
                          <tr>
                            <td>เบอร์โทร</td>
                            <td><input class="form-control" required="required" name="std_tel" type="text" id="std_tel" value="<?php echo "$rs[std_tel]"; ?>" readonly="readonly" /></td>
                          </tr>
                          <tr>
                            <td height="28">รูป</td>
                            <td><?php

                                  if ("$rs[std_pic]" != "") {
                                    ?>
                                <img src="<?php echo "./picture/$rs[std_pic]"; ?>" width="100" height="130" />
                              <?php
                                }
                                ?></td>
                          </tr>
                          <tr>
                            <td>ผู้ปกครอง</td>
                            <td><input class="form-control" required="required" name="pa_id" type="text" id="pa_id" value="<?php echo "$rs[pa_name]"; ?>" readonly="readonly" /></td>
                          </tr>
                          <tr>
                            <td>ชั้นเรียน</td>
                            <td><input class="form-control" required="required" name="c_id" type="text" id="c_id" value="<?php echo "$rs[c_name]"; ?>" readonly="readonly" /></td>
                          </tr>
                          <tr>
                            <td colspan="2" align="center">
                              <input class="btn btn-info" type="submit" name="btnsave" id="btnsave" value="ลบ" />
                              <input class="btn btn-danger" type="reset" onclick="window.history.back()" name="btnCancel" id="btnCancel" value="ยกเลิก" />
                              <input name="std_id" type="hidden" id="std_id" value="<?php echo "$rs[std_id]"; ?>" />
                              <input name="std_pic" type="hidden" id="std_pic" value="<?php echo "$rs[std_pic]"; ?>" />
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