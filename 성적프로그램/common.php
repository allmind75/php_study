<?php
  $connector = mysql_connect("localhost", "allmind75", "sjdhksk1214");   //mysql connection_aborted
  if(!$connector) exit("DB Connection Fail");                             //exit 후 다음 코드는 실행 안함

  $db_selector = mysql_select_db("allmind75", $connector);
  if(!$db_selector) exit("DB selection Error");

  mysql_query("set names utf8");      //utf 8 설정

  mysql_query("set session character_set_connection=utf8;");

  mysql_query("set session character_set_results=utf8;");

  mysql_query("set session character_set_client=utf8;");


 ?>
