<?php
session_start();
if (isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && $_SESSION["u_stat"] == '0') {
  include "connect.php";
  $valid_uname = $_SESSION["valid_uname"];
  $sql1 = "SELECT * FROM police WHERE p_username = '$valid_uname' ";
  $result1 = mysql_query($sql1, $conn);
  $rs1 = mysql_fetch_array($result1);
  ?>
<?php
  $p_id = $_GET['p_id'];
  $sql = "SELECT * FROM police p,position po,station ps  WHERE p.p_id = '$p_id' and p.po_id=po.po_id and p.ps_id=ps.ps_id ";
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
          <form id="form1" name="form1" method="post" action="editteacher.php" enctype="multipart/form-data">
            <br>
            <div id="content-wrapper">
              <div class="container h-100 ">
                <div class="row h-100 justify-content-center align-items-center">
                  <!-- DataTables Example -->
                  <div class="card col-sb-8">
                    <div class="card-header">
                      <div><i class="far fa-edit"></i>
                        ข้อมูลเจ้าหน้าที่ตำรวจ
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" <tr>
                          <tr>
                            <td height="144" colspan="2" align="center">
                              <?php
                              if ("$rs[p_pic]" != "") {
                              ?>
                                <img src="<?php echo "./picture/$rs[p_pic]"; ?>" width="100" height="140" />
                              <?php
                              }
                              ?>
                            </td>
                          </tr>
                          <tr>
                            <td width="138" align="center">Username</td>
                            <td width="338"><?php echo "$rs[p_username]"; ?></td>
                          </tr>
                          <tr>
                            <td width="138" align="center">Password</td>
                            <td width="338"><?php echo "$rs[p_password]"; ?></td>
                          </tr>
                          <tr>
                            <td width="138" align="center">ชื่อ-นามสกุล</td>
                            <td width="338"><?php echo "$rs[p_name]"; ?></td>
                          </tr>
                          <tr>
                            <td width="138" align="center">ที่อยู่</td>
                            <td width="338"><?php echo "$rs[p_address]"; ?></td>
                          </tr>
                          <tr>
                            <td width="138" align="center">เบอร์โทร</td>
                            <td width="338"><?php echo "$rs[p_tel]"; ?></td>
                          </tr>
                          <tr>
                            <td width="138" align="center">ตำแหน่ง</td>
                            <td width="338"><?php echo "$rs[po_name]"; ?></td>
                          </tr>
                          <tr>
                            <td width="138" align="center">สังกัด</td>
                            <td width="338"><?php echo "$rs[ps_name]"; ?></td>
                          </tr>
                          </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <br>
            <div class="card col-sb-8">
              <div class="card-header">
                <div><i class="far fa-edit"></i>
                  [ผลงานบันทึกการจับกุม]
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                      <td align="center">รหัสบันทึกการจับกุม</td>
                      
                      <td align="center">วันที่บันทึก</td>
                      <td align="center">ข้อหา</td>
                    </tr>

                    <?php
                    $sql = "SELECT ar.ar_id,ar.ar_date,pu.pu_plaint
                    FROM police p 
                    LEFT JOIN arrest_police arp ON  p.p_id = arp.p_id 
                    LEFT JOIN arrestrecord ar  ON arp.ar_id = ar.ar_id 
                    LEFT JOIN arrest_punis ap  ON ar.ar_id=ap.ar_id
                    LEFT JOIN punishment pu ON ap.pu_id=pu.pu_id
                    WHERE p.p_id ='$p_id'";
                    $result1 = mysql_query($sql, $conn);
                    while ($rs1 = mysql_fetch_array($result1)) {
                    ?>
                      <tr>
                        &nbsp;
                        <td width="191" align="center"><?php echo "$rs1[ar_id]"; ?></td>

                        <td width="187" align="center"><?php echo "$rs1[ar_date]"; ?>&nbsp;</td>
                        <td width="187" align="center"><?php echo "$rs1[pu_plaint]"; ?>&nbsp;</td>
                      </tr>
                    <?php
                    }
                    ?>
                  </table>
                </div>
              </div>
            </div>
          </form>
    </table>
    <br>
    <?php
    include "foot.php"
    ?>

  </body>

  </html>
  <?php
} else {
  echo "<script> alert('Please Login'); window.location='frm_login.php';
	</script>";
  exit();
}
?>