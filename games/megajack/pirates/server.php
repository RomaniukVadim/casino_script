<?php
  define("CASINOENGINE", true);
  session_start();
  include_once("../../../engine/core/games/game_secure.php");
  include_once("../../../engine/config/config.php");
  $game_name = "pirates";
  include_once("../../../engine/core/functions_games.php");
  include_once("../../../engine/core/games/jackpots.php");
  $login = $_SESSION['login'];
  $mode  = $_SESSION['mode'];
  $bet   = $_POST['bet'];
  $lines = intval($_POST['lines']);
  $game  = $_POST['game'];
  if ($mode == "wmr") {
      $row          = mysql_fetch_array(mysql_query("select * from clients where login='" . $login . "'"));
      $user_balance = $row['cash'];
  }
  if ($mode == "fun") {
      $row          = mysql_fetch_array(mysql_query("select * from clients where login='" . $login . "'"));
      $user_balance = $row['cashfun'];
  }
  $action = $_POST['action'];
  if ($mode == "wmr") {
      $games = mysql_fetch_array(mysql_query("select * from games where name='pirates'"));
      $id_jp = $games['id_jp'];
      $jp    = mysql_fetch_array(mysql_query("select * from games_jp where id='{$id_jp}'"));
      $jpot  = $jp['jp'];
  }
  if ($mode == "fun") {
      $jpot = 0;
  }
  if ($bet < 0 || 210 < $bet) {
      echo "error|error";
      exit();
  }
  if ($lines < 0 || 21 < $lines) {
      echo "error|error";
      exit();
  }
  if ($user_balance <= 0) {
      echo "error|error";
      exit();
  }
  if ($action == "state") {
      echo "result=ok&state=0&min=1&jack={$jpot}&id={$login}&balance={$user_balance}";
  }
  if ($game == "pirates") {
      include("casinoengine/pirates.php");
  }
?>