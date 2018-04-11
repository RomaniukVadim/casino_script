<?php
  $_SESSION['sid']   = 0;
  $_SESSION['login'] = 0;
  $_SESSION['mode']  = 0;
  session_destroy();
  echo "<s";
  echo "cript>location.href=\"/\";</script>\r\n";
?>