<?php

    include "common.php";

    $num   = $_POST[num];
    $name  = $_POST[name];
    $kor   = $_POST[kor];
    $eng   = $_POST[eng];
    $math  = $_POST[math];
    $total = $_POST[total];
    $avg   = $_POST[avg];

    $query = "UPDATE grade SET name='$name', kor=$kor, eng=$eng, math=$math, total=$total, avg=$avg WHERE num=$num";
    $result = mysql_query($query);
    if(!$result) exit("SQL Query Error");

    mysql_close($connector);


 ?>
 <script>location.href="sj_list.php"</script>
