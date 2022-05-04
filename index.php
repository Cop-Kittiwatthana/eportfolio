<?php
include "connect.php";

$sql = "SELECT * FROM drugtype d LEFT JOIN punishment p on d.dt_id = p.dt_id Where d.dt_id=p.dt_id or d.dt_id is null order by pu_id";
$result = mysql_query($sql, $conn);
mysql_close();
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
  include "user_menu.php";
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
                    <h3>---- รายงานข้อมูลบทลงโทษ ----</h3>
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
                              <td width="154" align="center"><?php echo "<a href=\"frm_showdetail.php?pu_id=$rs[pu_id]\">"; ?>รายละเอียดบทลงโทษ<?php echo "</a>"; ?></td>
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
        </form>
      </td>
    </tr>
  </table>
  <?php include "foot.php"; ?>
</body>

</html>