<?php
    //db connection
    include "common.php";

    //form에 입력받은 값 변수에 저장
    $name  = $_POST[name];
    $kor   = $_POST[kor];
    $eng   = $_POST[eng];
    $math  = $_POST[math];
    $total = $_POST[total];
    $avg   = $_POST[avg];

    //query 생성
    $query = "INSERT INTO grade(name, kor, eng, math, total, avg) VALUES";
    $query.= "('$name', $kor, $eng, $math, $total, $avg)";

    //query 실행
    $result = mysql_query($query);
    if(!$result) exit("SQL Query Error");

    mysql_close($connector);

 ?>
<script>location.href="sj_list.php"</script>
