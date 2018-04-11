<?php
  if (!defined("CASINOENGINE")) {
      exit("Нет доступа!<script>location.href='/';</script>");
  }
  $main = str_replace("{THEME}", "/templates/" . $template, $main);
  $main = str_replace("{LANG}", $_SESSION['language'], $main);
?>