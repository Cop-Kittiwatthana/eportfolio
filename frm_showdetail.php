<?php
include "connect.php";
$pu_id = $_GET['pu_id'];
$sql = "SELECT dt.dt_name,pu.pu_plaint,pu.pu_detail 
FROM drugtype dt,punishment pu 
WHERE pu.pu_id ='$pu_id' and dt.dt_id = pu.dt_id";
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
                      รายงานข้อมูลบทลงโทษ
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <tr>
                            <td width="143">ประเภท</td>
                            <td width="338"><?php echo "$rs[dt_name]"; ?></td>
                          </tr>
                          <tr>
                            <td width="143">ข้อหา</td>
                            <td width="338"><?php echo "$rs[pu_plaint]"; ?></td>
                          </tr>
                          <tr>
                            <td width="143">โทษ</td>
                            <td width="338"><?php echo "$rs[pu_detail]"; ?></td>
                          </tr>
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