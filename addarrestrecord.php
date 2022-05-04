<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
    <?php include "abc.php"; ?>
    <?php include "connect.php"; ?>
</head>

<body>
    <?php
    $ps_id = $_POST['ps_id'];
    $ar_date = $_POST['ar_date'];
    $ar_time = $_POST['ar_time'];
    $ars_date = $_POST['ars_date'];
    $ars_time = $_POST['ars_time'];
    $ar_address = $_POST['ar_address'];
    $p_id = $_POST['p_id'];
    $s_id = $_POST['s_id'];
    $w_id = $_POST['w_id'];
    $pu_id = $_POST['pu_id'];
    $ar_confes = $_POST['ar_confes'];
    $ar_dateconfer = $_POST['ar_dateconfer'];
    $ar_timeconfer = $_POST['ar_timeconfer'];

    $sql = "INSERT INTO arrestrecord (ar_date,ar_time,ar_address,ar_confes,ar_dateconfer,ar_timeconfer,ps_id) VALUES('$ar_date','$ar_time','$ar_address','$ar_confes','$ar_dateconfer','$ar_timeconfer','$ps_id')";

    mysql_query($sql, $conn)
        or die("3. ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();
    $result = mysql_query("SELECT MAX(ar_id) as ar_id from arrestrecord",$conn);
    $ar_id = mysql_fetch_array($result);
    foreach ($p_id as $p) {
        $sql = "INSERT INTO arrest_police (ar_id,p_id) VALUES( '$ar_id[ar_id]','$p')";
        mysql_query($sql, $conn)
            or die("3. ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();
    }
        foreach ($w_id as $w) {
        $sql = "INSERT INTO arrest_withess (ar_id,w_id) VALUES('$ar_id[ar_id]' ,'$w')";
        //echo $sql;
    mysql_query($sql, $conn)
        or die("3. ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();
    }
    foreach ($s_id as $s) {
        $sql = "INSERT INTO arrest_suspect (ar_id,s_id,ars_date,ars_time) VALUES('$ar_id[ar_id]','$s','$ars_date','$ars_time')";
    mysql_query($sql, $conn)
       or die("3. ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();
     }
     foreach ($pu_id as $pu) {
    $sql = "INSERT INTO arrest_punis (ar_id,pu_id) VALUES('$ar_id[ar_id]','$pu')";
    mysql_query($sql, $conn)
        or die("3. ไม่สามารถประมวลผลคำสั่งได้") . mysql_error();
    }
    mysql_close();
    echo "<script>Swal.fire({
        type: 'success',
        title: 'บันทึกข้อมูลเรียบร้อยแล้ว',
        showConfirmButton: true,
        timer: 1500
      }).then(() => { 
          window.location = 'showarrestrecord.php'
        });
      </script>";
    ?>
</body>

</html>