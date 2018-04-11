<?php
  if (!defined("CASINOENGINE")) {
      exit("Нет доступа!<script>location.href='/';</script>");
  }
  $page_faq_tpl = file_get_contents(TEMPLATE_DIR . "/page_faq.tpl");
  $page_faq_tpl = str_replace("{theme}", "/templates/" . $template . "/" . $_SESSION['language'], $page_faq_tpl);
  $page_faq_tpl = str_replace("{language}", $_SESSION['language'], $page_faq_tpl);
  $page_faq_tpl = str_replace("{forgot}", "/" . $_SESSION['language'] . "/forgot_password", $page_faq_tpl);
  $page_faq_tpl = str_replace("{support}", "/" . $_SESSION['language'] . "/support", $page_faq_tpl);
  echo $page_faq_tpl;
?>