<?php
  if (!defined("CASINOENGINE")) {
      exit("Нет доступа!<script>location.href='/';</script>");
  }
  $session                 = session_id();
  $time                    = time();
  $time_check              = $time - 600;
  $tbl_name                = "casino_online";
  $resource_online_session = mysql_query("SELECT count(*) FROM {$tbl_name} WHERE session='{$session}'");
  $count                   = intval(mysql_result($resource_online_session, 0, 0));
  if ($count == "0") {
      @mysql_query("INSERT INTO {$tbl_name}(session, time)VALUES('{$session}', '{$time}')");
  } else {
      @mysql_query("UPDATE {$tbl_name} SET time='{$time}' WHERE session = '{$session}'");
  }
  $resource_online    = mysql_query("SELECT count(*) FROM {$tbl_name}");
  $count_user_online  = intval(mysql_result($resource_online, 0, 0));
  $_SESSION['online'] = $count_user_online;
  @mysql_query("DELETE FROM {$tbl_name} WHERE time<{$time_check}");
?>