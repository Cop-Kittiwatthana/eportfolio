<?php
session_start();
if (isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && $_SESSION["u_stat"] == '1') {
  include "connect.php";
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
?>

  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>แก้ไขข้อมูลบันทึกการรจับกุม</title>
    <?php include "abc.php"; ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
    <script src="./js/BsMultiSelect.min.js"></script>
  </head>

  <body>
    <?php
    include "police_menu.php";
    include "head.php";
    ?>
    <br>
    <table width="800" height="400" border="0" align="center">
      <td height="263">
        <form id="form1" name="form1" method="post" enctype="multipart/form-data" action="editarrestrecord.php">
          <br>
          <div id="content-wrapper">
            <div class="container h-100 ">
              <div class="row h-100 justify-content-center align-items-center">
                <!-- DataTables Example -->
                <div class="card col-sb-8">
                  <div class="card-header">
                    แก้ไขข้อมูลบันทึกการรจับกุม
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                        <input name="ar_id" type="hidden" id="ar_id" value="<?php echo "$rs[ar_id]"; ?>" />
                          <td width="138" align="center">สถานที่บันทึก</td>
                          <td width="500"><select class="form-control" required="required" name="ps_id" id="ps_id">
                              <?php
                              $sql1 = "SELECT * FROM station";
                              $result1 = mysql_query($sql1, $conn);
                              while ($rs1 = mysql_fetch_array($result1)) {
                                echo "<option value=\"$rs1[ps_id]\"";
                                if ("$rs[ps_id]" == "$rs1[ps_id]") {
                                  echo 'selected';
                                }
                                echo ">$rs1[ps_name]";
                                echo "</option>\n";
                              }
                              ?>
                            </select></td>
                        </tr>
                        <tr>
                          <td width="138" align="center">วันที่ทำการบันทึก</td>
                          <td width="500">
                            <div class="row">
                              <div class="col-md-7" align="left">
                                <input class="input-group date" required type="date" name="ar_date" id="ar_date" value="<?php echo"$rs[ar_date]"; ?>" onkeypress="isInputDate(event)" /><br>
                                <h6 align="left" class="text-danger"> **กรุณาเพิ่มข้อมูลวันที่ทำการบันทึก </h6>
                              </div>
                              <div class="col-md-5">
                                <input class="input-group date" required type="time" name="ar_time" id="ar_time" value="<?php echo"$rs[ar_time]"; ?>" onkeypress="isInputDate(event)" /><br>
                                <h6 class="text-danger"> **เวลาที่ทำการบันทึก </h6>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td width="138" align="center">วันที่ทำการจับกุม</td>
                          <td width="500">
                            <div class="row">
                              <div class="col-md-7" align="left">
                                <input class="input-group date" required type="date" name="ars_date" id="ars_date" value="<?php echo"$rs[ars_date]"; ?>" onkeypress="isInputDate(event)" /><br>
                                <h6 align="left" class="text-danger"> **กรุณาเพิ่มข้อมูลวันที่ทำการจับกุม </h6>
                              </div>
                              <div class="col-md-5">
                                <input class="input-group date" required type="time" name="ars_time" id="ars_time" value="<?php echo"$rs[ars_time]"; ?>" onkeypress="isInputDate(event)" /><br>
                                <h6 class="text-danger"> **เวลาที่ทำการจับกุม </h6>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td width="138" align="center">สถานที่จับกุม</td>
                          <td width="500">
                            <textarea class="form-control" required="required" name="ar_address" id="ar_address" maxlength="100"><?php echo "$rs[ar_address]"; ?></textarea></td>
                        </tr>
                        <tr>
                          <td width="138" align="center">ตำรวจ</td>
                          <td width="500">
                            <select required="required" name="p_id[]" id="p_id" class="form-control" multiple="multiple" style="display: none;">
                              <?php
                              $sql1 = "SELECT p.p_id,p.p_name,'ture' as status 
                                from police p,arrestrecord ar,arrest_police ap 
                                WHERE ar.ar_id='$ar_id' and ar.ar_id = ap.ar_id and p.p_id = ap.p_id 
                                UNION SELECT p.p_id,p.p_name,'false' as status 
                                from police p,arrestrecord ar,arrest_police 
                                WHERE p.p_id not in (SELECT p.p_id as status 
                                from police p,arrestrecord ar,arrest_police ap 
                                WHERE ar.ar_id='$ar_id' and ar.ar_id = ap.ar_id and p.p_id = ap.p_id)";
                              echo $sql1;
                              $result1 = mysql_query($sql1, $conn);
                              while ($rs1 = mysql_fetch_array($result1)) {
                                echo "<option value=\"$rs1[p_id]\"";
                                if ("$rs1[status]" == "ture") {
                                  echo 'selected';
                                }
                                echo ">$rs1[p_name]";
                                echo "</option>\n";
                              }
                              ?>
                            </select>
                            <h6 class="text-danger"> **เพิ่มชื่อเจ้าหน้าที่ตำรวจที่เกี่ยวข้อง</h6>
                          </td>
                        </tr>
                        <tr>
                          <td width="138" align="center">ผู้ต้องหา</td>
                          <td width="500">
                            <select required="required" name="s_id[]" id="s_id" class="form-control" multiple="multiple" style="display: none;">
                              <?php
                              $sql1 = "SELECT s.s_id,s.s_name,'ture' as status 
                                from suspect s,arrestrecord ar,arrest_suspect asu
                                WHERE ar.ar_id='$ar_id' and ar.ar_id = asu.ar_id and s.s_id = asu.s_id 
                                UNION SELECT s.s_id,s.s_name,'false' as status 
                                from suspect s,arrestrecord ar,arrest_suspect asu
                                WHERE s.s_id not in (SELECT s.s_id as status 
                                from suspect s,arrestrecord ar,arrest_suspect asu
                                WHERE ar.ar_id='$ar_id' and ar.ar_id = asu.ar_id and s.s_id = asu.s_id)";
                              $result1 = mysql_query($sql1, $conn);
                              while ($rs1 = mysql_fetch_array($result1)) {
                                echo "<option value=\"$rs1[s_id]\"";
                                if ("$rs1[status]" == "ture") {
                                  echo 'selected';
                                }
                                echo ">$rs1[s_name]";
                                echo "</option>\n";
                              }
                              ?>
                            </select>
                            <h6 class="text-danger"> **เพิ่มชื่อผู้ต้องหาที่เกี่ยวข้อง</h6>
                          </td>
                        </tr>
                        <tr>
                          <td width="138" align="center">พยาน</td>
                          <td width="500">
                            <select name="w_id[]" id="w_id" class="form-control" multiple="multiple" style="display: none;">
                              <?php
                              $sql1 = "SELECT w.w_id,w.w_name,'ture' as status 
                                from witness1 w,arrestrecord ar,arrest_withess aw 
                                WHERE ar.ar_id='$ar_id' and ar.ar_id = aw.ar_id and w.w_id = aw.w_id 
                                UNION SELECT w.w_id,w.w_name,'false' as status 
                                from witness1 w,arrestrecord ar,arrest_withess aw 
                                WHERE w.w_id not in (SELECT w.w_id as status 
                                from witness1 w,arrestrecord ar,arrest_withess aw 
                                WHERE ar.ar_id='$ar_id' and ar.ar_id = aw.ar_id and w.w_id = aw.w_id )";
                              $result1 = mysql_query($sql1, $conn);
                              while ($rs1 = mysql_fetch_array($result1)) {
                                echo "<option value=\"$rs1[w_id]\"";
                                if ("$rs1[status]" == "ture") {
                                  echo 'selected';
                                }
                                echo ">$rs1[w_name]";
                                echo "</option>\n";
                              }
                              ?>
                            </select>
                            <h6 class="text-danger"> **เพิ่มชื่อพยานที่เกี่ยวข้อง</h6>
                          </td>
                        </tr>
                        <tr>
                          <td width="138" align="center">ข้อหา</td>
                          <td width="500">
                            <select required="required" name="pu_id[]" id="pu_id" class="form-control" multiple="multiple" style="display: none;">
                              <?php
                              $sql1 = "SELECT pu.pu_id,pu.pu_plaint,'ture' as status 
                                from punishment pu,arrestrecord ar,arrest_punis ap 
                                WHERE ar.ar_id='$ar_id' and ar.ar_id = ap.ar_id and ap.pu_id = pu.pu_id
                                UNION
                                SELECT pu.pu_id,pu.pu_plaint,'false' as status  
                                from punishment pu,arrestrecord ar,arrest_punis ap 
                                WHERE pu.pu_id not in (SELECT pu.pu_id
                                from punishment pu,arrestrecord ar,arrest_punis ap 
                                WHERE ar.ar_id='$ar_id' and ar.ar_id = ap.ar_id and ap.pu_id = pu.pu_id)";
                              $result1 = mysql_query($sql1, $conn);
                              while ($rs1 = mysql_fetch_array($result1)) {
                                echo "<option value=\"$rs1[pu_id]\"";
                                if ("$rs1[status]" == "ture") {
                                  echo 'selected';
                                }
                                echo ">$rs1[pu_plaint]";
                                echo "</option>\n";
                              }
                              ?>
                            </select>
                            <h6 class="text-danger"> **เพิ่มข้อหาที่เกี่ยวข้อง</h6>
                          </td>
                        </tr>
                        <tr>
                          <td width="138" align="center">คำให้การ</td>
                          <td width="500">
                            <textarea class="form-control" required="required" name="ar_confes" id="ar_confes" maxlength="100"><?php echo "$rs[ar_confes]"; ?></textarea></td>
                        </tr>
                        <tr>
                          <td width="138" align="center" th>วันที่บันทึกคำให้การ</td>
                          <td>
                            <div class="row">
                              <div class="col-md-7" align="left">
                                <input class="input-group date" type="date" name="ar_dateconfer" id="ar_dateconfer" value="<?php echo"$rs[ar_dateconfer]"; ?>" onkeypress="isInputDate(event)" /><br>
                                <h6 align="left" class="text-danger"> **กรุณาเพิ่มข้อมูลวันที่บันทึกคำให้การ </h6>
                              </div>
                              <div class="col-md-5">
                                <input class="input-group date" required type="time" name="ar_timeconfer" id="ar_timeconfer" value="<?php echo"$rs[ar_timeconfer]"; ?>" onkeypress="isInputDate(event)" /><br>
                                <h6 class="text-danger"> **เวลาบันทึกคำให้การ</h6>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="2" align="center">
                            <input class="btn btn-primary" type="submit" name="btnsave" id="btnsave" value="บันทึก" />
                            <input class="btn btn-danger" type="reset" onclick="window.history.back()" name="btnCancel" id="btnCancel" value="ยกเลิก" />
                          </td>
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
    </table>
    <br>
    <br>
    <br>
    <?php
    include "foot.php";
    ?>
    </table>
    <script type="text/javascript">
      document.getElementById('ar_dateconfer').addEventListener('click', () => {
        console.log('click')
        $("#ar_dateconfer").datepicker({
          beforeShowDay: $.datepicker.noWeekends,
          dateFormat: "yy-mm-dd",
          minDate: new Date('1999/10/25'),
        });
      })
      $("#ar_date").datepicker({
        beforeShowDay: $.datepicker.noWeekends,
        dateFormat: "yy-mm-dd"
      });
      $("#ars_date").datepicker({
        beforeShowDay: $.datepicker.noWeekends,
        dateFormat: "yy-mm-dd"
      });
      $("#ar_dateconfer").datepicker({
        beforeShowDay: $.datepicker.noWeekends,
        dateFormat: "yy-mm-dd",
        minDate: new Date(document.getElementById('ar_date').value),
      });
      $("#p_id").bsMultiSelect();
      $("#s_id").bsMultiSelect();
      $("#w_id").bsMultiSelect();
      $("#pu_id").bsMultiSelect();
    </script>
  </body>

  </html>
<?php
} else {
  echo "<script> alert('Please Login');window.history.go(-1);</script>";
  exit();
}
?>