<?php
  if (!defined("CASINOENGINE")) {
      exit("Нет доступа!<script>location.href='/';</script>");
  }
  $page_bonus_tpl = file_get_contents(TEMPLATE_DIR . "/page_bonus.tpl");
  $page_bonus_tpl = str_replace("{theme}", "/templates/" . $template . "/" . $_SESSION['language'], $page_bonus_tpl);
  $page_bonus_tpl = str_replace("{language}", $_SESSION['language'], $page_bonus_tpl);
  echo $page_bonus_tpl;
?>