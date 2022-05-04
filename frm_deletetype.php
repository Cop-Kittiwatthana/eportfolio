<?php 
session_start();
if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && $_SESSION["u_stat"] == '0'){
include "connect.php";
	$dt_id = $_GET['dt_id'];
	$sql = "SELECT * FROM drugtype WHERE dt_id = '$dt_id'";
	$result = mysql_query($sql,$conn)
	 	 or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
	$rs = mysql_fetch_array($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ลบข้อมูลประเภทยาเสพติด</title>
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
          <form id="form1" name="form1" method="post" action="deletetype.php">
            <br>
            <div id="content-wrapper">
              <div class="container h-100 ">
                <div class="row h-100 justify-content-center align-items-center">
                  <!-- DataTables Example -->
                  <div class="card col-sb-8">
                  <div class="card-header">
                      <div><i class="far fa-edit"></i>
                      ลบข้อมูลประเภทยาเสพติด
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <td width="138" align="center">ชื่อสถานีตำรวจ</td>
                            <td width="656"><input class="form-control" required="required" name="dt_name" type="text" id="dt_name" value="<?php echo "$rs[dt_name]"; ?>" readonly="readonly" />
                              <input name="dt_id" type="hidden" id="dt_id" value="<?php echo "$rs[dt_id]"; ?>" /></td>
                          </tr>
                          <tr>
                            <td colspan="2" align="center">
                              <input class="btn btn-info" type="submit" name="btnsave" id="btnsave" value="ลบ" />
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