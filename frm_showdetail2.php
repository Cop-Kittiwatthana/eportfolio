<?php
include "connect.php";
$s_id = $_GET['s_id'];
$sql = "SELECT *
FROM suspect s,arrest_suspect asu,arrestrecord ar
WHERE s.s_id ='$s_id' and s.s_id = asu.s_id and asu.ar_id = ar.ar_id";
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
  include "user_menu.php";
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
                    รายงานข้อมูลผู้ต้องหา
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                          <td height="144" colspan="2" align="center">
                            <?php
                                if ("$rs[s_pic]" != "") {
                              ?>
                              <img src="<?php echo "./picture/$rs[s_pic]"; ?>" width="100" height="140" />
                            <?php
                            }
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <td width="143">ชื่อ-นามสกุล</td>
                          <td width="338"><?php echo "$rs[s_name]"; ?>
                            &nbsp;</td>
                        </tr>
                        <tr>
                          <td>ที่อยู่</td>
                          <td><?php echo "$rs[s_address]"; ?></td>
                        </tr>
                        <tr>
                          <td>เบอร์โทร</td>
                          <td><?php echo "$rs[s_tel]"; ?></td>
                        </tr>
                        </thead>
                        <tbody>
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
                ผลงาน
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                      <td align="center">รหัสบันทึกการจับกุม</td>
                      <td align="center">วันที่บันทึก</td>
                      <td align="center">วันที่จับกุม</td>
                      <td align="center">ข้อหา</td>
                    </tr>

                    <?php
                    $sql = "SELECT ar.ar_id,ar.ar_date,asu.ars_date,pu.pu_plaint
                    FROM suspect s 
                    LEFT JOIN arrest_suspect asu ON  s.s_id = asu.s_id 
                    LEFT JOIN arrestrecord ar  ON asu.ar_id = ar.ar_id 
                    LEFT JOIN arrest_punis ap  ON ar.ar_id=ap.ar_id
                    LEFT JOIN punishment pu ON ap.pu_id=pu.pu_id
                    WHERE s.s_id ='$s_id'";
                    $result1 = mysql_query($sql, $conn);
                    while ($rs1 = mysql_fetch_array($result1)) {
                      ?>
                      <tr>
                        &nbsp;
                        <td width="191" align="center"><?php echo "<a href=\"index3.php?ar_id=$rs[ar_id]\">"; ?> <?php echo "$rs[ar_id]"; ?> <?php echo "</a>"; ?></td>
                        <td width="91" align="center"><?php echo "$rs1[ar_date]"; ?>&nbsp;</td>
                        <td width="187" align="center"><?php echo "$rs1[ars_date]"; ?>&nbsp;</td>
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