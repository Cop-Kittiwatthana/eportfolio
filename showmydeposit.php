<?php
session_start();
if(isset($_SESSION["valid_uname"])&& isset($_SESSION["valid_pwd"])){
  include "connect.php";
  $valid_uname = $_SESSION["valid_uname"];
  $sql1 = "SELECT * FROM employee WHERE e_username = '$valid_uname'";
  $result1 = mysql_query($sql1,$conn);
  $rs = mysql_fetch_array($result1);
  $sql2 = "SELECT * FROM people WHERE pe_username = '$valid_uname'";
  $result2 = mysql_query($sql2,$conn);
  $rs = mysql_fetch_array($result2);

  $sql = "Select * from deposit as d  Left join people as pe on (d.pe_id = pe.pe_id) Left join area as a on (pe.a_id = a.a_id) where (d.pe_id = '$rs[pe_id]') order by d_id ";
  $result = mysql_query($sql, $conn)
  or die ("3.ไม่สามารถประมวลผลคำสั่งได้").mysql_error;
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </head>

  <body>
   <?php
   include "head.php";
   include "people_menu.php";
   ?>
   <h3 class="title-dog text-center bg-success text-white  p-3" >---------- รายงานข้อมูลการฝากบ้าน ----------</h3>
   <br>
   <p align="center">
    <a href="frm_addmydeposit.php" class="btn btn-warning btn-lg "><i class="fas fa-plus-circle"></i> เพิ่มข้อมูลการฝากบ้าน</a>
  </p>
  <div class="container text-center ">
    <table class="table table-bordered " >
      <tr class="table-light">
        <th align="Left"><i class="fas fa-user-lock"></i>  ชื่อ-นามสกุล <?php echo "$rs[pe_name]";?></th>
      </tr>
    </table>
  </div>
  <tr>
   <div class="container text-center ">
    <table class="table table-bordered shadow-lg p-3 mb-5 bg-white rounded" style=" z-index: 9999;" >
      <thead class="thead-light ">
        <tr class="table-light ">
          <th>รหัสการฝากบ้าน</th>
          <th>รูปบ้าน</th>
          <th>ที่อยู่</th>
          <th>พื้นที่อาศัย</th>
          <th>วันที่ทำการฝากบ้าน</th>
          <th>ฝากบ้านถึงวันที่</th>
          <th>แก้ไข</th>
        </tr>
      </thead> 
      <?php
      while ($rs=mysql_fetch_array($result)){
        ?>
        <tr>
          <td height="33" align="center" width="100"><?php echo "$rs[d_id]";?></td>
          <td height="33" align="center"> <?php
          if("$rs[d_pic]"!=""){
           ?>
           <img src="<?php echo "./picture/$rs[d_pic]";?>"width="200" height="140">
           <?php
         }
         ?>
       </td>
       <td height="33" align="center"><?php echo "$rs[pe_address]";?></td>
       <td height="33" align="center" width="150"><?php echo "$rs[a_name]";?></td>
       <td align="center" width="100"><?php echo date_format(date_create("$rs[d_date]"),"d/m/Y");?></td>
       <td align="center" width="100"><?php echo date_format(date_create("$rs[d_until]"),"d/m/Y");?></td>
       <td align="center"><div align="center">
        <?php echo "<a href=\"frm_editmydeposit.php?d_id=$rs[d_id]\">"; ?><span  class="btn btn-outline-warning  fa fas-plus " ><i class="far fa-edit"></i> แก้ไข <?php echo "</a>"; ?></td>
        </td>
      </tr>
      <?php
    }
    ?>
  </table>
  <p>&nbsp;</p></td>
</tr>
<?php
include "foot.php";
?>
</table>
</body>
</html>
<?php
}
else{
 echo "<script> alert('Please Login'); window.location='frm_login.php';</script>";
 exit();
}
?>