<?php
  if (!defined("CASINOENGINE")) {
      exit("Нет доступа!<script>location.href='/';</script>");
  }
  $page_jackpot_tpl = file_get_contents(TEMPLATE_DIR . "/page_jackpot.tpl");
  $jp               = mysql_fetch_array(mysql_query("SELECT * FROM games_jp WHERE id='1'"));
  $jp_up            = sprintf("%01.0f", $jp['jp_up']);
  $jp_down          = sprintf("%01.0f", $jp['jp_down']);
  $page_jackpot_tpl = str_replace("{jp_up}", $jp_up, $page_jackpot_tpl);
  $page_jackpot_tpl = str_replace("{jp_down}", $jp_down, $page_jackpot_tpl);
  $page_jackpot_tpl = str_replace("{theme}", "/templates/" . $template . "/" . $_SESSION['language'], $page_jackpot_tpl);
  $page_jackpot_tpl = str_replace("{language}", $_SESSION['language'], $page_jackpot_tpl);
  echo $page_jackpot_tpl;
?>