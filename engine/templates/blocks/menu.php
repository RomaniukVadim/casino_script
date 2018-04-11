<?php
  if (!defined("CASINOENGINE")) {
      exit("Нет доступа!<script>location.href='/';</script>");
  }
  $menu_tpl = file_get_contents(TEMPLATE_DIR . "/blocks/menu.tpl");
  if ($_SESSION['login'] != "") {
      $menu_tpl = str_replace("{link_support}", "<a href=\"/" . $_SESSION['language'] . "/messages\">" . $lang['menu_support'] . "</a>", $menu_tpl);
  } else {
      $menu_tpl = str_replace("{link_support}", "<a href=\"/" . $_SESSION['language'] . "/support\">" . $lang['menu_support'] . "</a>", $menu_tpl);
  }
  $menu_tpl = str_replace("{link_faq}", "<a href=\"/" . $_SESSION['language'] . "/faq\">" . $lang['menu_faq'] . "</a>", $menu_tpl);
  $menu_tpl = str_replace("{link_terms}", "<a href=\"/" . $_SESSION['language'] . "/terms\">" . $lang['menu_terms'] . "</a>", $menu_tpl);
  $menu_tpl = str_replace("{link_games}", "<a href=\"/" . $_SESSION['language'] . "/games\">" . $lang['menu_games'] . "</a>", $menu_tpl);
    
  if ($_SESSION['login'] != "") {
      $menu_tpl = str_replace("{link_in}", "<a href=\"/" . $_SESSION['language'] . "/in\">" . $lang['menu_pay'] . "</a>", $menu_tpl);
  } else {
      $menu_tpl = str_replace("{link_in}", "<span style=\"line-height: 1.75em;\">" . $lang['menu_pay'] . "</span>", $menu_tpl);
  }
  if ($_SESSION['login'] != "") {
      $menu_tpl = str_replace("{link_profile}", "<a href=\"/" . $_SESSION['language'] . "/profile\">" . $lang['menu_profile'] . "</a>", $menu_tpl);
      $menu_tpl = str_replace("{link_partner}", "<ul><li><a href=\"/" . $_SESSION['language'] . "/partner\">" . $lang['menu_partner'] . "</a></li></ul>", $menu_tpl);
  } else {
      $menu_tpl = str_replace("{link_profile}", "<span style=\"line-height: 1.75em;\">" . $lang['menu_profile'] . "</span>", $menu_tpl);
      $menu_tpl = str_replace("{link_partner}", "", $menu_tpl);
  }
  echo $menu_tpl;
  echo "\r\n\r\n";
?>
