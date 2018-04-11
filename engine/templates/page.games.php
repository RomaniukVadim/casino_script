<?php
  if (!defined("CASINOENGINE")) {
      exit("Нет доступа!<script>location.href='/';</script>");
  }
  $page_games_tpl = file_get_contents(TEMPLATE_DIR . "/page_games.tpl");
  $page_games_tpl = str_replace("{theme}", "/templates/" . $template . "/" . $_SESSION['language'], $page_games_tpl);
  $page_games_tpl = str_replace("{language}", $_SESSION['language'], $page_games_tpl);
  echo $page_games_tpl;
?>