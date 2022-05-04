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
    $sql = "SELECT * FROM police p, station ps where p.ps_id = ps.ps_id order by p_id";
    $result = mysql_query($sql, $conn)
      or die("3. ไม่สามารถประมวลผลคำสั้งได้") . mysql_error();
    ?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>รายงานข้อมูลตำรวจ</title>
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
                <div class="card mb-3">
                  <div class="card-header">
                  <div align="center"><i class="fas fa-book-open"></i>
                    <h3>---- รายงานข้อมูลตำรวจ ----</h3>
                    <a href="frm_addpolice.php"><span class="btn btn-sm btn-primary fa fas-plus float-right "><i class="fas fa-plus"> เพิ่มข้อมูล </i></a>
                    </div>
                  </div>

                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <td align="center">รหัสตำรวจ</td>
                            <td align="center">ชื่อ-สกุล</td>
                            <td align="center">สังกัด</td>
                            <td align="center">แก้ไข</td>
                            <td align="center">ลบ</td>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            while ($rs = mysql_fetch_array($result)) {
                              ?>
                            <tr>
                              <td width="172" align="center"><?php echo "$rs[p_id]"; ?></td>
                              &nbsp;
                              <td width="258" align="center"><?php echo "<a href=\"frm_detailpolice.php?p_id=$rs[p_id]\">"; ?> <?php echo "$rs[p_name]"; ?> <?php echo "</a>"; ?></td>
                              <td width="233" align="center"><?php echo "$rs[ps_name]"; ?></td>
                              <td width="107">
                                <div align="center">
                                  <?php echo "<a href=\"frm_editpolice.php?p_id=$rs[p_id]\">" ?><button type="button" class="btn btn-warning btn-sm fa fa-edit text-white"></button></a>
                              <td width="93">
                                <div align="center">
                                  <button onclick='_delete("<?php echo "$rs[p_id]"; ?>","<?php echo "$rs[p_name]"; ?>")' type="button" class="btn btn-danger btn-sm fas fa-trash-alt text-white"></button><?php echo "</a>"; ?></div>
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
    <script>
      function _delete(p_id,p_name) {
        Swal.fire({
          title: 'คุณต้องการจะลบใช่หรือไม่?',
          text: "คุณต้องการลบ "+p_name,
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'ใช่',
          cancelButtonText: 'ไม่'
        }).then((result) => {
          if (result.value) {
            window.location.href = "deletepolice.php?p_id=" + p_id
          }
        })
      }
    </script>
  </body>

  </html>
<?php
} else {
  echo "<script> alert('Please Login'); window.location='frm_login.php';
	</script>";
  exit();
}
?>