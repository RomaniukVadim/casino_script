<?php
  session_start();
  echo "<script>alert(\"Спосибо! Статус текущего платежа смотрите в таблице Платежи:\");</script>";
  echo "<script>location.href=\"/ru/in\";</script>";
  exit();
?>