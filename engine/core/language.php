<?php
  if (!defined("CASINOENGINE")) {
      exit("Нет доступа!<script>location.href='/';</script>");
  }
  $language        = strtolower($_GET['lang']);
  $language_filter = preg_match("/^[a-z]{2}\$/", $language);
  if (file_exists(ENGINE_DIR . "language/" . $language . "/site.php") && $language_filter == true) {
      include_once(ENGINE_DIR . "language/" . $language . "/site.php");
      $_SESSION['language'] = "ru";
  } else {
      $language = $language_default;
      include_once(ENGINE_DIR . "language/" . $language . "/site.php");
      $_SESSION['language'] = "ru";
  }
  echo "\r\n";
?>