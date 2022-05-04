<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        include "connect.php";
        $sql = "SELECT * from police";
        $result_select = mysql_query($sql,$conn);
        while($row = mysql_fetch_array($result_select))
            $rows[] = $row;
        foreach ($rows as $p) {
            echo "$p[p_id]";
        }

        // if(find_id($police,"999")){
        //     echo "fond";
        // }
        


        
        // foreach ($police as $p) {
        //     if($id == "$police[p_id]"){
        //         return true
        //     } 
        //     else return false
        // }
    ?>
</body>
</html>