<!-- <?php
session_start();
if (isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && $_SESSION["u_stat"] == '0') {
  include "connect.php";
  $p_id = $_GET['p_id'];
  $sql = "SELECT * FROM police WHERE p_id = '$p_id'";
  $result = mysql_query($sql, $conn)
    or die("3. ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();
  $rs = mysql_fetch_array($result);
  ?> -->
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>แก้ไขข้อมูลพนักงานตำรวจ</title>
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
          <form id="form1" name="form1" method="post" action="editpolice.php" enctype="multipart/form-data">
            <br>
            <div id="content-wrapper">
              <div class="container h-100 ">
                <div class="row h-100 justify-content-center align-items-center">
                  <!-- DataTables Example -->
                  <div class="card col-sb-8">
                    <div class="card-header">
                      <div><i class="far fa-edit"></i>
                        แก้ไขข้อมูลพนักงานตำรวจ
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <tr>
                            <td width="138" align="center">Username</td>
                            <td width="656"><label for="t_name"></label>
                              <input class="form-control" required="required" name="p_username" type="text" id="p_username" value="<?php echo "$rs[p_username]"; ?>" readonly="readonly" /></td>
                          </tr>
                          <tr>
                            <td width="138" align="center">Password</td>
                            <td width="656"><input class="form-control" required="required" name="p_password" type="password" id="p_password" maxlength="30" value="<?php echo "$rs[p_password]"; ?>" onkeypress="isInputUsername(event)" /></td>
                          </tr>
                          <tr>
                            <td width="138" align="center">ชื่อ-นามสกุล</td>
                            <td width="656"><input class="form-control" onkeypress="isInputChar(event)" required="required" type="text" name="p_name" id="p_name" maxlength="50" value="<?php echo "$rs[p_name]"; ?>" /></td>
                          </tr>
                          <tr>
                            <td width="138" align="center">ที่อยู่</td>
                            <td width="656">
                              <textarea class="form-control" required="required" name="p_address" id="p_address" maxlength="100"><?php echo "$rs[p_address]"; ?></textarea></td>
                          </tr>
                          <tr>
                            <td width="138" align="center">เบอร์โทร</td>
                            <td width="656"><input class="form-control" onkeypress="isInputNumber(event)" required="required" type="text" name="p_tel" id="p_tel" maxlength="15" value="<?php echo "$rs[p_tel]"; ?>" /></td>
                          </tr>
                          <tr>
                            <td width="138" align="center">รูป</td>
                            <td>
                              <?php
                                if ("$rs[p_pic]" != "") {
                                  ?>
                                <img src="<?php echo "./picture/$rs[p_pic]"; ?>" width="100" height="130" />
                              <?php
                                }
                                ?>
                              <input type="file" name="photo" id="photo" /></td>
                          </tr>
                          <tr>
                            <td width="138" align="center">ตำแหน่ง</td>
                            <td><select class="form-control" required="required" name="po_id" id="po_id">
                                <?php

                                  $sql1 = "SELECT * FROM position";
                                  $result1 = mysql_query($sql1, $conn);
                                  while ($rs1 = mysql_fetch_array($result1)) {
                                    echo "<option value=\"$rs1[po_id]\"";
                                    if ("$rs[po_id]" == "$rs1[po_id]") {
                                      echo 'selected';
                                    }
                                    echo ">$rs1[po_name]";
                                    echo "</option>\n";
                                  }
                                  ?>
                              </select></td>
                          </tr>
                          <tr>
                            <td width="138" align="center">สังกัดสถานีตำรวจ</td>
                            <td><select class="form-control" required="required" name="ps_id" id="ps_id">
                                <?php

                                  $sql2 = "SELECT * FROM station";
                                  $result2 = mysql_query($sql2, $conn);
                                  while ($rs2 = mysql_fetch_array($result2)) {
                                    echo "<option value=\"$rs2[ps_id]\"";
                                    if ("$rs[ps_id]" == "$rs2[ps_id]") {
                                      echo 'selected';
                                    }
                                    echo ">$rs2[ps_name]";
                                    echo "</option>\n";
                                  }
                                  ?>
                              </select></td>
                          <tr>
                            <td colspan="2" align="center">
                              <input class="btn btn-primary" type="submit" name="btnsave" id="btnsave" value="บันทึก" />
                              <input class="btn btn-danger" type="reset" onclick="window.history.back()" name="btnCancel" id="btnCancel" value="ยกเลิก" />
                              <input name="p_id" type="hidden" id="p_id" value="<?php echo "$rs[p_id]"; ?>" />
                              <input name="p_pic" type="hidden" id="p_pic" value="<?php echo "$rs[p_pic]"; ?>" />
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