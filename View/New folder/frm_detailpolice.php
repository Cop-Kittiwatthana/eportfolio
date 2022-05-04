<?php
session_start();
if (isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && $_SESSION["u_stat"] == '0') {
  include "connect.php";
  $t_id = $_GET['t_id'];
  $sql = "SELECT t.t_name,t.t_address,t.t_tel,t.t_username,t.t_password,po.po_name,d.d_name,t.t_pic FROM teacher t,position po,department d  WHERE t.t_id = '$t_id' and t.d_id = d.d_id and t.po_id = po.po_id";
  $result = mysql_query($sql, $conn)
    or die("3. ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();
  $rs = mysql_fetch_array($result);
  ?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
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
          <form id="form1" name="form1" method="post" action="editteacher.php" enctype="multipart/form-data" >
            <br>
            <div id="content-wrapper">
              <div class="container h-100 ">
                <div class="row h-100 justify-content-center align-items-center">
                  <!-- DataTables Example -->
                  <div class="card col-sb-8">
                  <div class="card-header">
                      <div><i class="far fa-edit"></i>
                      แก้ไขข้อมูลอาจารย์
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        
                            <tr>
                              <td height="144" colspan="2" align="center">
                                <?php
                                    if ("$rs[t_pic]" != "") {
                                   ?>
                                  <img src="<?php echo "./picture/$rs[t_pic]"; ?>" width="100" height="140" />
                                <?php
                                  }
                                  ?>
                              </td>
                            </tr>
                            <tr>
                              <td width="143">Username</td>
                              <td width="338"><?php echo "$rs[t_username]"; ?></td>
                            </tr>
                            <tr>
                              <td>Password</td>
                              <td><?php echo "$rs[t_password]"; ?></td>
                            </tr>
                            <tr>
                              <td>ชื่อ-นามสกุล</td>
                              <td><?php echo "$rs[t_name]"; ?></td>
                            </tr>
                            <tr>
                              <td>ที่อยู่</td>
                              <td><?php echo "$rs[t_address]"; ?></td>
                            </tr>
                            <tr>
                              <td>เบอร์โทร</td>
                              <td><?php echo "$rs[t_tel]"; ?></td>
                            </tr>
                            <tr>
                              <td>ตำแหน่ง</td>
                              <td><?php echo "$rs[po_name]"; ?></td>
                            </tr>
                            <tr>
                              <td>กลุุ่มสาระ</td>
                              <td><?php echo "$rs[d_name]"; ?></td>
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