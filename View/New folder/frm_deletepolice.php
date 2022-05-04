<?php
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && $_SESSION["u_stat"] == '0'){
include "connect.php";
	$t_id = $_GET['t_id'];
	$sql = "SELECT t.t_id,t.t_name,t.t_address,t.t_tel,t.t_pic,t.t_username,t.t_password,po.po_name,d.d_name 
FROM teacher t,department d,position po 
WHERE t.t_id = '$t_id' and t.po_id = po.po_id and t.d_id = d.d_id ";
	$result = mysql_query($sql,$conn)
	 	 or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
	$rs = mysql_fetch_array($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ลบข้อมูลอาจารย์</title>
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
          <form id="form1" name="form1" method="post" action="deleteteacher.php">
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
                            <td width="338"><label for="t_name"></label>
                              <input class="form-control" required="required" name="t_name" type="text" id="t_name" value="<?php echo "$rs[t_name]"; ?>" readonly="readonly" /></td>
                          </tr>
                          <tr>
                            <td>ที่อยู่</td>
                            <td><label for="t_address"></label>
                              <textarea class="form-control" required="required" name="t_address" readonly="readonly" id="t_address"><?php echo "$rs[t_address]"; ?></textarea></td>
                          </tr>
                          <tr>
                            <td>เบอร์โทร</td>
                            <td><input class="form-control" required="required" name="t_tel" type="text" id="t_tel" value="<?php echo "$rs[t_tel]"; ?>" readonly="readonly" /></td>
                          </tr>
                          <tr>
                            <td>Username</td>
                            <td><input class="form-control" required="required" name="t_username" type="text" id="t_username" value="<?php echo "$rs[t_username]"; ?>" readonly="readonly" /></td>
                          </tr>
                          <tr>
                            <td>Password</td>
                            <td><input class="form-control" required="required" name="t_password" type="text" id="t_password" value="<?php echo "$rs[t_password]"; ?>" readonly="readonly" /></td>
                          </tr>
                          <tr>
                            <td height="28">รูป</td>
                            <td><?php

                                  if ("$rs[t_pic]" != "") {
                                    ?>
                                <img src="<?php echo "./picture/$rs[t_pic]"; ?>" width="100" height="130" />
                              <?php
                                }
                                ?></td>
                          </tr>
                          <tr>
                            <td>ตำแหน่ง</td>
                            <td><input class="form-control" required="required" name="po_name" type="text" id="po_name" value="<?php echo "$rs[po_name]"; ?>" readonly="readonly" /></td>
                          </tr>
                          <tr>
                            <td>กลุุ่มสาระ</td>
                            <td><input class="form-control" required="required" name="d_name" type="text" id="d_name" value="<?php echo "$rs[d_name]"; ?>" readonly="readonly" /></td>
                          </tr>
                          <tr>
                            <td colspan="2" align="center">
                              <input class="btn btn-info" type="submit" name="btnsave" id="btnsave" value="ลบ" />
                              <input class="btn btn-danger" type="reset" onclick="window.history.back()" name="btnCancel" id="btnCancel" value="ยกเลิก" />
                              <input name="t_id" type="hidden" id="t_id" value="<?php echo "$rs[t_id]"; ?>" />
                              <input name="t_pic" type="hidden" id="t_pic" value="<?php echo "$rs[t_pic]"; ?>" />
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