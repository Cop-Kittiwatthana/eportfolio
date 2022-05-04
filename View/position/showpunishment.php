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
    $sql = "SELECT * FROM drugtype d LEFT JOIN punishment p on d.dt_id = p.pu_id Where d.dt_id=p.dt_id or d.dt_id is null order by pu_id";
    $result = mysql_query($sql, $conn)
      or die("3. ไม่สามารถประมวลผลคำสั้งได้") . mysql_error();
    ?>

  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>รายงานข้อมูลบทลงโทษ</title>
    <?php include "abc.php"; ?>
  </head>

  <body>
    <?php
      include "admin_menu.php";
      ?>
<table width="1200" height="336" border="0" align="center">
      <tr>
        <?php
          include "head.php";
          ?>
        <td height="263">
          <form id="form1" name="form1" method="post" action="">
            <br>
            <div id="content-wrapper">
              <div class="container">
                <!-- DataTables Example -->
                <div class="card mb-0">
                  <div class="card-header">

                    <div align="center"><i class="fas fa-book-open"></i>
                      รายงานข้อมูลบทลงโทษ
                      <?php echo "$rs1[p_name]"; ?><a href="frm_addpunishment.php"><span class="btn btn-sm btn-primary fa fas-plus float-right "><i class="fas fa-plus"> เพิ่มข้อมูลบทลงโทษ</i></a>
                      <?php echo "$rs1[p_name]"; ?> <a href="showtype.php"><span class="btn btn-sm btn-info fa fas-plus float-right "><i class="fas fa-pen-square"> จัดการข้อมูลประเภทยาเสพติด </i></a>
                    </div>
                  </div>

                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <td align="center">รหัสบทลงโทษ</td>
                            <td align="center">ประเภทยาเสติด</td>
                            <td align="center">ข้อหา</td>
                            <td align="center">รายละเอียดบทลงโทษ</td>
                            <td align="center">แก้ไข</td>
                            <td align="center">ลบ</td>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            while ($rs = mysql_fetch_array($result)) {
                              ?>
                            <tr>
                              <td width="154" align="center"><?php echo "$rs[pu_id]"; ?></td>&nbsp;
                              <td width="154" align="center"><?php echo "$rs[dt_name]"; ?>
                              <td width="154" align="center"><?php echo "$rs[pu_plaint]"; ?>
                              <td width="154" align="center"><?php echo "$rs[pu_detail]"; ?></td>
                              <td width="107">
                                <div align="center">
                                  <?php echo "<a href=\"frm_editpunishment.php?pu_id=$rs[pu_id]\">" ?><button type="button" class="btn btn-warning btn-sm fa fa-edit text-white"></button></a>
                              <td width="93">
                                <div align="center">
                                  <?php echo "<a href=\"frm_deletepunishment.php?pu_id=$rs[pu_id]\">"; ?><button type="button" class="btn btn-danger btn-sm fas fa-trash-alt text-white"></button><?php echo "</a>"; ?></div>
                              </td>
                            </tr>
                          <?php
                            }
                            ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
          </form>
        </td>
      </tr>
    </table>
    </div>
    </div>
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