<?php
  function sitename()
  {
      $setting_query = mysql_fetch_array(@mysql_query("SELECT * FROM casino_settings"));
      return $setting_query['siteadress'];
  }
  
  function link_support()
  {
      if (!$_SESSION['login']) {
          $return = "<a href=\"/" . $_SESSION['language'] . "/support\">службой поддержки</a>";
      } else {
          $return = "<a href=\"/" . $_SESSION['language'] . "/message\">службой поддержки</a>";
      }
      return $return;
  }
  
  function link_support_footer()
  {
      if (!$_SESSION['login']) {
          $return = "<a href=\"/" . $_SESSION['language'] . "/support\">Служба поддержки</a>";
      } else {
          $return = "<a href=\"/" . $_SESSION['language'] . "/message\">Служба поддержки</a>";
      }
      return $return;
  }
  
  if (!defined("CASINOENGINE")) {
      exit("Нет доступа!<script>location.href='/';</script>");
  }
?>