<?php
session_start();
if (isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"])) {
  include "connect.php";
  $valid_uname = $_SESSION["valid_uname"];
  $sql1 = "SELECT * FROM police WHERE p_username = '$valid_uname'";
  $result1 = mysql_query($sql1, $conn);
  $rs = mysql_fetch_array($result1);
  ?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>แก้ไขข้อมูลส่วนตัว</title>
    <?php include "abc.php"; ?>
  </head>

  
  <body>
    <?php
    include "head.php";
    include "teacher_menu.php"; 
      ?>
    <table width="682" height="373" border="0" align="center" >
      <tr>
      <td height="263">
        <form id="form1" name="form1" method="post" action="editme.php" enctype="multipart/form-data">
          <br>
          <div id="content-wrapper">
            <div class="container h-100 ">
              <div class="row h-100 justify-content-center align-items-center">
                <!-- DataTables Example -->
                <div class="card col-sb-8">
                <div class="card-header">
                
                    <div><i class="fas fa-chalkboard-teacher"></i>
                      แก้ไขข้อมูลส่วนตัว [<?php echo "$rs[p_name]"; ?>]
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >

                        <input name="p_id" type="hidden" id="p_id" value="<?php echo "$rs[p_id]"; ?>" />
                        <input name="p_pic" type="hidden" id="p_pic" value="<?php echo "$rs[p_pic]"; ?>" />
                        <tr>
                          <td width="100">Username</td>
                          <td width="200"><label for="p_name"></label>
                            <input name="p_username" class="form-control" required="required" type="text" id="p_username" maxlength="30" value="<?php echo "$rs[p_username]"; ?>" readonly="readonly" /></td>
                        </tr>
                        <tr>
                          <th>Password</th>
                          <td><label for="p_address"></label>
                            <input name="p_password" class="form-control" required="required" type="password" id="p_password" maxlength="30" value="<?php echo "$rs[p_password]"; ?>" onkeypress="isInputUsername(event)" /></td>
                        </tr>
                        <tr>
                          <th>ชื่อ-นามสกุล</th>
                          <td><input name="p_name" class="form-control" required="required" type="text" id="p_name" maxlength="50" value="<?php echo "$rs[p_name]"; ?>" onkeypress="isInputChar(event)" /></td>
                        </tr>
                        <tr>
                          <th>ที่อยู่</th>
                          <td><textarea name="p_address" class="form-control" required="required" id="p_address" maxlength="100"><?php echo "$rs[t_address]"; ?></textarea></td>
                        </tr>
                        <tr>
                          <th>เบอร์โทร</th>
                          <td><input name="p_tel" class="form-control" required="required" type="text" id="p_tel" maxlength="15" value="<?php echo "$rs[t_tel]"; ?>" onkeypress="isInputNumber(event)" /></td>
                        </tr>
                        <tr>
                          <th height="28">ตำแหน่ง</th>
                          <td><select class="form-control" required="required" name="po_id" id="po_id">
                              <?php

                                $sql2 = "SELECT * FROM position";
                                $result2 = mysql_query($sql2, $conn);
                                while ($rs2 = mysql_fetch_array($result2)) {
                                  echo "<option value=\"$rs2[po_id]\"";
                                  if ("$rs[po_id]" == "$rs2[po_id]") {
                                    echo 'selected';
                                  }
                                  echo ">$rs2[po_name]";
                                  echo "</option>\n";
                                }
                                ?>
                            </select></td>
                        </tr>
                        <tr>
                          <th height="28">สังกัดที่สถานีตำรวจ</th>
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
                        </tr>
                        <tr>
                          <th height="28">รูป</th>
                          <td>
                            <?php
                              if ("$rs[p_pic]" != "") {
                                ?>
                              <img src="<?php echo "./picture/$rs[p_pic]"; ?>" width="100" height="130" />
                            <?php
                              }
                              ?>
                            <input type="file" name="photo" id="photo"/></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="center">
                            <input class="btn btn-primary" type="submit" name="btnsave" id="btnsave" value="บันทึก" />
                            <input class="btn btn-danger" type="reset" onclick="window.location ='frm_editme.php'" name="btnCancel" id="btnCancel" value="ยกเลิก" />
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
      </tr>
     
    </table> 
    <br>
    <?php include "foot.php"; ?>
  </body>

  </html>
<?php
} else {
  echo "<script> alert('Please Login'); window.location='frm_login.php';
	</script>";
  exit();
}
?>