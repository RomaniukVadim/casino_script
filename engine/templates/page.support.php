<?php
  if (!defined("CASINOENGINE")) {
      exit("Нет доступа!<script>location.href='/';</script>");
  }
  if ($_SESSION['login'] == "") {
      include_once(ENGINE_DIR . "forms_process/main_support.php");
  } else {
      echo "<script>location.href=\"/ru/messages\";</script>";
  }
?>