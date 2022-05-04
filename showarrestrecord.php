<?php
session_start();
if (isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && $_SESSION["u_stat"] == '1') {
  include "connect.php";
  $valid_uname = $_SESSION["valid_uname"];
  $sql1 = "SELECT * FROM police WHERE p_username = '$valid_uname' ";
  $result1 = mysql_query($sql1, $conn);
  $rs1 = mysql_fetch_array($result1);
  ?>
  <?php
    $sql = "SELECT DISTINCT ar.ar_id,ar_date,ars_date FROM arrestrecord ar, arrest_police ap,police p ,
    arrest_punis au,punishment pu,arrest_suspect ass,
    suspect s, arrest_withess aw,witness1 w 
    WHERE ar.ar_id= ap.ar_id and ap.p_id= p.p_id and ar.ar_id = au.ar_id and 
    au.pu_id= pu.pu_id and ar.ar_id = ass.ar_id and ass.s_id = s.s_id and 
    ar.ar_id = aw.ar_id and aw.w_id = w.w_id or ar.ar_id is null ORDER BY ar_id";
    $result = mysql_query($sql, $conn)
      or die("3. ไม่สามารถประมวลผลคำสั้งได้") . mysql_error();
    ?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>รายงานข้อมูลบันทึกการจับกุม</title>
    <?php include "abc.php"; ?>
  </head>

  <body>
    <?php
      include "police_menu.php";
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
                      <h3>---- รายงานข้อมูลบันทึกการจับกุม ----</h3>
                      <a href="frm_addarrestrecord.php"><span class="btn btn-sm btn-primary fa fas-plus float-right "><i class="fas fa-plus"> เพิ่มข้อมูล </i></a>
                    </div>
                  </div>

                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <td align="center">รหัสบันทึกการจับกุม</td>
                            <td align="center">วันที่บันทึก</td>
                            <td align="center">วันที่จับกุม</td>
                            <td align="center">แก้ไข</td>
                            <td align="center">ลบ</td>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            while ($rs = mysql_fetch_array($result)) {
                              ?>
                            <tr>
                              <td width="172" align="center"><?php echo "$rs[ar_id]"; ?></td>
                              &nbsp;
                              <td width="258" align="center"><?php echo "<a href=\"frm_showdetail3.php?ar_id=$rs[ar_id]\">"; ?> <?php echo "$rs[ar_date]"; ?> <?php echo "</a>"; ?></td>
                              <td width="233" align="center"><?php echo "$rs[ars_date]"; ?></td>
                              <td width="107">
                                <div align="center">
                                  <?php echo "<a href=\"frm_editarrestrecord.php?ar_id=$rs[ar_id]\">" ?><button type="button" class="btn btn-warning btn-sm fa fa-edit text-white"></button></a>
                              <td width="93">
                                <div align="center">
                                  <button onclick='_delete("<?php echo "$rs[ar_id]"; ?>")' type="button" class="btn btn-danger btn-sm fas fa-trash-alt text-white"></button>
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
      function _delete(ar_id) {
        Swal.fire({
          title: 'คุณต้องการจะลบใช่หรือไม่?',
          text: "คุณต้องการลบ "+ar_id,
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'ใช่',
          cancelButtonText: 'ไม่'
        }).then((result) => {
          if (result.value) {
            window.location.href = "deletearrestrecord.php?ar_id=" + ar_id
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