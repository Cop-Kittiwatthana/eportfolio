<?php
session_start();
if (isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && $_SESSION["u_stat"] == '0') {
  include "connect.php";
  $valid_uname = $_SESSION["valid_uname"];
  $sql1 = "SELECT * FROM police WHERE p_username = '$valid_uname' ";
  $result1 = mysql_query($sql1, $conn);
  $rs1 = mysql_fetch_array($result1);


  $sql = "SELECT * FROM suspect s  ";
  $result = mysql_query($sql, $conn);
  mysql_close();
?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>รายงานข้อมูลผู้ต้องหา</title>
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
        <td height="182">
          <form id="form1" name="form1" method="post" action="">

            <div id="content-wrapper">
              <div class="container-fluid">
                <!-- DataTables Example -->
                <div class="card mb-3">
                  <div class="card-header">
                    <div align="center"><i class="fas fa-book-open"></i>
                      <h3>---- รายงานข้อมูลผู้ต้องหา ----</h3>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <td align="center" width="100">เลขบัตรประจำตัวประชาชน</td>
                              <td align="center" width="100">ชื่อ-สกุล</td>
                              <td align="center" width="100">รายละเอียด</td>
                            </tr>
                          </thead>

                          <tbody>

                            <?php
                            while ($rs = mysql_fetch_array($result)) {
                            ?>
                              <tr>
                                <td align="center" width="100"><?php echo "$rs[s_id]"; ?></td>
                                <td align="center" width="100"><?php echo "$rs[s_name]"; ?></td>
                                <td align="center" width="100"><?php echo "<a href=\"frm_detailsuspect2.php?s_id=$rs[s_id]\">"; ?>รายละเอียด<?php echo "</a>"; ?></td>
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
              </div>
            </div>
          </form>
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
  echo "<script> alert('Please Login'); window.location='frm_login.php';
	</script>";
  exit();
}
?>