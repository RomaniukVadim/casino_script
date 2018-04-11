<?php
  if (!defined("CASINOENGINE")) {
      exit("Нет доступа!<script>location.href='/';</script>");
  }
  $terms_query = mysql_fetch_array(mysql_query("SELECT sitename FROM casino_settings"));
  if ($terms_query != "") {
      $sitename    = $terms_query['sitename'];
      $siteadress  = $terms_query['siteadress'];
      $emailcasino = $terms_query['emailcasino'];
      $icqadmin    = $terms_query['icqadmin'];
      $terms_tpl   = file_get_contents(TEMPLATE_DIR . "/page_terms.tpl");
      $terms_tpl   = str_replace("{sitename}", $sitename, $terms_tpl);
      $terms_tpl   = str_replace("{siteadress}", $siteadress, $terms_tpl);
      $terms_tpl   = str_replace("{emailcasino}", $emailcasino, $terms_tpl);
      $terms_tpl   = str_replace("{icqadmin}", $icqadmin, $terms_tpl);
      echo $terms_tpl;
  } else {
      echo "<center>Ошибка!</center>";
  }
?>