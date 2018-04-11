<?
header("HTTP/1.1 303 Main Page Redirect");
header("Location: http://$_SERVER[HTTP_HOST]/ru/games");
?>
<?php
  echo "<s";
  echo "cript>location.href=\"/ru/games\";</script>";
?>