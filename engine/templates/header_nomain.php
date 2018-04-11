<?php
  if (!defined("CASINOENGINE")) {
      exit("Нет доступа!<script>location.href='/';</script>");
  }
  $header_nomain_tpl = file_get_contents(TEMPLATE_DIR . "/header_nomain.tpl");
  $clients_query     = mysql_fetch_array(mysql_query("select * from clients where login='" . $_SESSION['login'] . "'"));
  $header_nomain_tpl = str_replace("{cash_wmr}", $clients_query['cash'], $header_nomain_tpl);
  $header_nomain_tpl = str_replace("{cash_fun}", $clients_query['cashfun'], $header_nomain_tpl);
  $header_nomain_tpl = str_replace("{theme}", "templates/" . $template . "/" . $_SESSION['language'], $header_nomain_tpl);
  $header_nomain_tpl = str_replace("{language}", $_SESSION['language'], $header_nomain_tpl);
  $header_nomain_tpl = str_replace("{login}", $_SESSION['login'], $header_nomain_tpl);
  eval("?>" . $header_nomain_tpl . "<?");
?>