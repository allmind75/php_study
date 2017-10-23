<?php

  include "common.php";

  $num = $_GET[num];
  $query = "DELETE FROM grade WHERE num = $num";
  $result = mysql_query($query);
  if(!$result) exit("SQL Query Error");

  mysql_close($connector);

 ?>
 <script>location.href="sj_list.php"</script>
