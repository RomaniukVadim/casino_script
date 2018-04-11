<?php
  if (!defined("CASINOENGINE")) {
      exit("Нет доступа!<script>location.href='/';</script>");
  }
  $footer_nomain_tpl = file_get_contents(TEMPLATE_DIR . "/footer_nomain.tpl");
  $footer_nomain_tpl = str_replace("{link_support}", "<a href=\"/" . $_SESSION['language'] . "/support\">" . $lang['main_support'] . "</a>", $footer_nomain_tpl);
  $footer_nomain_tpl = str_replace("{link_faq}", "<a href=\"/" . $_SESSION['language'] . "/faq\">" . $lang['menu_faq'] . "</a>", $footer_nomain_tpl);
  $footer_nomain_tpl = str_replace("{link_terms}", "<a href=\"/" . $_SESSION['language'] . "/terms\">" . $lang['main_terms'] . "</a>", $footer_nomain_tpl);
  $footer_nomain_tpl = str_replace("{link_games}", "<a href=\"/" . $_SESSION['language'] . "/games\">" . $lang['menu_games'] . "</a>", $footer_nomain_tpl);
  if ($_SESSION['login'] != "") {
      $footer_nomain_tpl = str_replace("{link_in}", "<a href=\"/" . $_SESSION['language'] . "/in\">" . $lang['menu_pay'] . "</a>", $footer_nomain_tpl);
  } else {
      $footer_nomain_tpl = str_replace("{link_in}", "<span style=\"line-height: 1.75em;\">" . $lang['menu_pay'] . "</span>", $footer_nomain_tpl);
  }
  if ($_SESSION['login'] != "") {
      $footer_nomain_tpl = str_replace("{link_profile}", "<a href=\"/" . $_SESSION['language'] . "/support\">" . $lang['menu_profile'] . "</a>", $footer_nomain_tpl);
  } else {
      $footer_nomain_tpl = str_replace("{link_profile}", "<span style=\"line-height: 1.75em;\">" . $lang['menu_profile'] . "</span>", $footer_nomain_tpl);
  }
  $settings_query     = mysql_fetch_array(mysql_query("select * from casino_settings"));
  $setting_siteadress = $settings_query['siteadress'];
  $footer_nomain_tpl  = str_replace("{siteadress}", $setting_siteadress, $footer_nomain_tpl);
  $footer_nomain_tpl  = str_replace("{theme}", "/templates/" . $template . "/" . $_SESSION['language'], $footer_nomain_tpl);
  $footer_nomain_tpl  = str_replace("{language}", $_SESSION['language'], $footer_nomain_tpl);
  eval("?>" . $footer_nomain_tpl . "<?");
?>