<?php
  if (!defined("CASINOENGINE")) {
      exit("Нет доступа!<script>location.href='/';</script>");
  }
  $index_tpl = file_get_contents(TEMPLATE_DIR . "/index.tpl");
  $index_tpl = str_replace("{theme}", "/templates/" . $template . "/" . $_SESSION['language'], $index_tpl);
  $index_tpl = str_replace("{language}", $_SESSION['language'], $index_tpl);
  eval("?>" . $index_tpl . "<?");
?>