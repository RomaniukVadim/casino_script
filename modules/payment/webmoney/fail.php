<?php
  session_start();
  echo "<script>alert(\"Платеж не завершен или произошла ошибка!\");</script>";
  echo "<script>location.href=\"/ru/in\";</script>";
  exit();
?>