<?php
  if (!defined("CASINOENGINE")) {
      exit("Нет доступа!<script>location.href='/';</script>");
  }
  $jp_query = mysql_fetch_array(mysql_query("SELECT jp FROM games_jp"));
  if ($jp_query != "") {
      $jp_query       = mysql_fetch_array(mysql_query("SELECT * FROM games_jp ORDER BY 'id' ASC"));
      $jackpot        = $jp_query['jp'];
      $jp             = explode(".", $jp_query['jp']);
      $jp_dotochki    = $jp[0];
      $jp_posletochki = $jp[1];
      $jackpot_tpl    = file_get_contents(TEMPLATE_DIR . "/blocks/jackpot.tpl");
      $jackpot_tpl    = str_replace("{jp}", $jp, $jackpot_tpl);
      $jackpot_tpl    = str_replace("{jp_dotochki}", $jp_dotochki, $jackpot_tpl);
      $jackpot_tpl    = str_replace("{jp_posletochki}", $jp_posletochki, $jackpot_tpl);
      $jackpot_tpl    = str_replace("{language}", $_SESSION['language'], $jackpot_tpl);
      echo $jackpot_tpl;
  } else {
      echo "<center>Ошибка!</center>";
  }
?>