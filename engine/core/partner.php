<?php
  if (!defined("CASINOENGINE")) {
      exit("Нет доступа!<script>location.href='/';</script>");
  }
  $pid = intval($_GET['clid']);
  if ($pid != "") {
      setcookie("pid", $pid, time() + 60 * 60 * 24 * 30 * 12);
  }
?>