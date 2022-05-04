
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script
    src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"
    integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk="
    crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
  </head>
  <body>
    <?php
    include "head.php";
    include "people_menu.php";
    ?>

    <tr>
      <h3 class="title-dog text-center bg-primary text-white  p-3" >---------- เพิ่มข้อมูลการฝากบ้าน ---------</h3>
      <br>
      <form id="form1" name="form1" method="post" enctype="multipart/form-data" action="addmydeposit.php">
        <div class="container text-center " style="width: 60%; height: auto;" class="text-center">
          <div id="content-wrapper">
            <div class="container-fluid">
              <!-- DataTables Example -->
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fas fa-briefcase"></i>
                การฝากบ้าน</div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <tr>
                        <th align="center">เลขบัตรประจำตัวประชาชน </th>
                        <td><input class="form-control" required name="pe_id" type="text" id="pe_id" value="<?php echo"$rs[pe_id]"; ?>" readonly />
                          <input name="pe_id" type="hidden" id="pe_id" value="<?php echo"$rs[pe_id]"; ?>" /></td>
                        </tr> 
                        <tr>
                          <th>ชื่อ-นามสกุล</th>
                          <td>
                            <input class="form-control" required name="pe_name" type="text" id="pe_name" value="<?php echo"$rs[pe_name]"; ?>" onkeypress="isInputChar(event)" readonly/></td>
                          </tr>
                          <tr>
                            <th>ที่อยู่</th>
                            <td><textarea readonly class="form-control" required name="pe_address" id="pe_address"></textarea></td>
                          </tr>
                          <tr>
                            <th height="28">พื้นที่อาศัย</th>
                            <td><select disabled readonly class="form-control" required="required" name="a_id" id="a_id">
                              
                            </select></td>
                          </tr>
                          <tr>
                            <th>เบอร์โทร</th>
                            <td><input readonly class="form-control" required name="pe_tel" type="text" id="pe_tel" value="<?php echo"$rs[pe_tel]"; ?>" onkeypress="isInputNumber(event)" /></td>
                          </tr>
                          <tr>
                            <th height="28">รูป</th>
                            <td><input class="form-control" required type="file" name="photo" id="photo" />
                              <br><h6 class="text-danger"> **กรุณาเพิ่มข้อมูลรูปภาพบ้าน </h6></td>
                          </tr>
                          <tr>
                            <th>วันที่ทำการฝากบ้าน</th>
                            <td>
                              <input readonly class="form-control" required type="text" name="d_date" id="d_date"/> <br><h6 class="text-danger"> **กรุณาเพิ่มข้อมูลวันที่ทำการฝากบ้าน </h6></td>
                            </tr>
                            <tr>
                              <th>ฝากบ้านถึงวันที่</th>
                              <td>
                                <input readonly class="form-control" required type="date" name="d_until" id="d_until" onkeypress="isInputDate(event)"/><br><h6 class="text-danger"> **กรุณาเพิ่มข้อมูลฝากบ้านถึงวันที่ </h6></td>
                              </tr>
                              <tr>
                                <td colspan="2" align="center">
                                  <input class="btn btn-success" type="submit" name="btnsave" id="btnsave" value="บันทึก" />
                                  <input class="btn btn-danger" type="reset" onclick="window.history.back()" name="btnCancel" id="btnCancel" value="ยกเลิก" />
                                  <input name="d_id" type="hidden" id="d_id" value="<?php echo"$rs[d_id]"; ?>" /></td>
                                </tr>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>

                    </form></td>
                  </tr>
                </table>
              </div>
            </div>
            <br>
            <br>
            <br>
            <?php
            include "foot.php";
            ?>
          </table>
          <script type="text/javascript">
            document.getElementById('d_until').addEventListener('click',()=>{
              console.log('click')
              $( "#d_until" ).datepicker({
              beforeShowDay: $.datepicker.noWeekends,
              dateFormat: "yy-mm-dd",
              minDate: new Date('1999/10/25'),
            });
            })
            $( "#d_date" ).datepicker({
              beforeShowDay: $.datepicker.noWeekends,
              dateFormat: "yy-mm-dd"
            });
            $( "#d_until" ).datepicker({
              beforeShowDay: $.datepicker.noWeekends,
              dateFormat: "yy-mm-dd",
              minDate: new Date(document.getElementById('d_date').value),
            });
          </script>
        </body>
        </html>