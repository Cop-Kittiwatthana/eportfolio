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
  $ar_id = $_GET['ar_id'];
  $sql = "SELECT * FROM arrestrecord ar, arrest_police ap,police p ,
  arrest_punis au,punishment pu,arrest_suspect ass,
  suspect s, arrest_withess aw,witness1 w,station ps
  WHERE ar.ar_id = '$ar_id'and ar.ar_id= ap.ar_id and ap.p_id= p.p_id and ar.ar_id = au.ar_id and 
  au.pu_id= pu.pu_id and ar.ar_id = ass.ar_id and ass.s_id = s.s_id and 
  ar.ar_id = aw.ar_id and aw.w_id = w.w_id and ar.ps_id = ps.ps_id";
  $result = mysql_query($sql, $conn)
    or die("3. ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();
  $rs = mysql_fetch_array($result);



  mysql_close();
  ?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>รายละเอียด</title>
    <?php include "abc.php"; ?>
  </head>

  <body>
    <?php
    include "police_menu.php";
    include "head.php";
    ?>
    <table width="1300" height="400" border="0" align="center">
      <tr>
        <td>
          <form id="form1" name="form1" method="post" action="editteacher.php" enctype="multipart/form-data">
            <br>
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-7">
                  <div class="row">
                    <div class="col-md-12">

                      <div class="card">
                        <div class="card-header">
                          รายงานข้อมูลบันทึกการจับกุม
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <tr>
                                <td align="center" width="50">รหัสบันทึกการจับกุม</td>
                                <td width="150"><?php echo "$rs[ar_id]"; ?></td>
                              </tr>
                              <tr>
                                <td align="center" width="50">สถานที่บันทึก</td>
                                <td width="150"><?php echo "$rs[ps_name]"; ?></td>
                              </tr>
                              <tr>
                                <td align="center" width="50">วันเวลาที่บันทึก</td>
                                <td width="150"><?php echo "$rs[ar_date]"; ?> <?php echo "$rs[ar_time]"; ?></td>
                              </tr>
                              <tr>
                                <td align="center" width="50">วันเวลาที่จับกุม</td>
                                <td width="150"><?php echo  "$rs[ars_date]"; ?> <?php echo "$rs[ars_time]"; ?></td>
                              </tr>
                              <tr>
                                <td align="center" width="50">สถานที่จับกุม</td>
                                <td width="150"><?php echo "$rs[ar_address]"; ?></td>
                              </tr>
                              <tr>
                                <td align="center" width="50">คำให้การ</td>
                                <td width="150"><?php echo "$rs[ar_confes]"; ?></td>
                              </tr>
                              <tr>
                                <td align="center" width="50">คำให้การ</td>
                                <td width="150"><?php echo "$rs[ar_dateconfer]"; ?><?php echo "$rs[ar_timeconfer]"; ?></td>
                              </tr>
                            </table>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="card">
                            <div class="card-header">
                              ข้อหาที่เกียวข้อง
                            </div>
                            <div class="card-body">
                              <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                  <tr>
                                    <td align="center">ประเภทยาเสพติด</td>
                                    <td align="center">ข้อหา</td>
                                    <td align="center">บทลงโทษ</td>
                                  </tr>
                                  <?php
                                  $sql = "SELECT dt.dt_name,pu.pu_plaint,pu.pu_detail 
                                FROM drugtype dt,punishment pu ,arrestrecord ar ,arrest_punis ap
                                WHERE ar.ar_id ='$ar_id' and dt.dt_id = pu.dt_id and ar.ar_id = ap.ar_id and pu.pu_id = ap.pu_id";
                                  $result1 = mysql_query($sql, $conn);
                                  while ($rs1 = mysql_fetch_array($result1)) {
                                  ?>
                                    <tr>
                                      <td width="130" align="center"><?php echo "$rs1[dt_name]"; ?>&nbsp;</td>
                                      <td width="130" align="center"><?php echo "$rs1[pu_plaint]"; ?>&nbsp;</td>
                                      <td width="130" align="center"><?php echo "$rs1[pu_detail]"; ?>&nbsp;</td>
                                    </tr>
                                  <?php
                                  }
                                  ?>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card">
                        <div class="card-header">
                          ตำรวจที่เกียวข้อง
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <tr>
                                <td align="center">ลำดับที่</td>
                                <td align="center">ชื่อ-สกุล</td>
                              </tr>
                              <?php
                              $sql = "SELECT p.p_id,p.p_name
                            FROM police p
                            LEFT JOIN arrest_police ap ON  p.p_id = ap.p_id 
                            LEFT JOIN arrestrecord ar  ON ap.ar_id = ar.ar_id 
                            WHERE ar.ar_id ='$ar_id'";
                              $result1 = mysql_query($sql, $conn);
                              $i = 1;
                              while ($rs1 = mysql_fetch_array($result1)) {
                              ?>
                                <tr>
                                  <td width="20" align="center"><?= $i; ?>&nbsp;</td>
                                  <td width="258" align="center"><?php echo "<a href=\"frm_detailpolice2.php?p_id=$rs1[p_id]\">"; ?> <?php echo "$rs1[p_name]"; ?> <?php echo "</a>"; ?></td>
                                </tr>
                              <?php
                                $i++;
                              }
                              ?>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card">
                        <div class="card-header">
                          ผู้ต้องหาที่เกียวข้อง
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <tr>
                                <td align="center">ลำดับที่</td>
                                <td align="center">ชื่อ-สกุล</td>
                              </tr>
                              <?php
                              $sql = "SELECT s.s_id,s.s_name
                            FROM suspect s
                            LEFT JOIN arrest_suspect ass ON  s.s_id = ass.s_id 
                            LEFT JOIN arrestrecord ar  ON ass.ar_id = ar.ar_id 
                            WHERE ar.ar_id ='$ar_id'";
                              $result1 = mysql_query($sql, $conn);
                              $i = 1;
                              while ($rs1 = mysql_fetch_array($result1)) {
                              ?>
                                <tr>
                                  <td width="20" align="center"><?= $i; ?>&nbsp;</td>
                                  <td width="258" align="center"><?php echo "<a href=\"frm_detailsuspect.php?s_id=$rs1[s_id]\">"; ?> <?php echo "$rs1[s_name]"; ?> <?php echo "</a>"; ?></td>
                                </tr>
                              <?php
                                $i++;
                              }
                              ?>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-12">

                      <div class="row">
                        <div class="col-md-12">
                          <div class="card">
                            <div class="card-header">
                              พยานที่เกียวข้อง
                            </div>
                            <div class="card-body">
                              <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                  <tr>
                                    <td align="center">ลำดับที่</td>
                                    <td align="center">ชื่อ-สกุล</td>
                                  </tr>
                                  <?php
                                  $sql = "SELECT w.w_id,w.w_name
                                FROM witness1 w
                                LEFT JOIN arrest_withess aw ON  w.w_id = aw.w_id 
                                LEFT JOIN arrestrecord ar  ON aw.ar_id = ar.ar_id 
                                WHERE ar.ar_id ='$ar_id'";
                                  $result1 = mysql_query($sql, $conn);
                                  $i = 1;
                                  while ($rs1 = mysql_fetch_array($result1)) {
                                  ?>
                                    <tr>
                                      <td width="20" align="center"><?= $i; ?>&nbsp;</td>
                                      <td width="258" align="center"><?php echo "<a href=\"frm_detailwitness.php?w_id=$rs1[w_id]\">"; ?> <?php echo "$rs1[w_name]"; ?> <?php echo "</a>"; ?></td>
                                    </tr>
                                  <?php
                                    $i++;
                                  }
                                  ?>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
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
  echo "<script> alert('Please Login'); window.location='frm_login.php';
	</script>";
  exit();
}
?>