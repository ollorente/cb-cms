<?php

  $server = 'localhost:8888';
  $user = 'root';
  $pass = 'root';
  $db = 'plataforma';
  mysql_connect( $server,$user,$pass,$db );
  mysql_select_db($db);

?>
