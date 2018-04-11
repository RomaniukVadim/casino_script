<?php
define("AMAROK_GAME_NAME", "CaptainCavern");

header("Expires: ".gmdate("D, d M Y H:i:s")."GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");


define("_MIN_ICON", 1);
define("_MAX_ICON", 12);

define("_DOUBLE_BET_2_BLACK", 2);
define("_DOUBLE_BET_2_RED", 1);

define("_DOUBLE_BET_4_HEART", 3);
define("_DOUBLE_BET_4_CROSS", 1);
define("_DOUBLE_BET_4_BOX",   2);
define("_DOUBLE_BET_4_SPADE", 4);

define("_CARD_ID_MIN", 2);
define("_CARD_ID_MAX", 53);

include("../core/engine.php");

if (!Game::isUser()) {
 printVar("error", "2");
 die();
}

if (!isset($_SESSION['ALLOW_DOUBLE'])) {
  printVar("t_alert1", "Internal Server Error");
  printVar("error", "1");
  die();
}
if (!isset($_SESSION['GAME_NAME'])) {
  printVar("t_alert1", "Internal Server Error");
  printVar("error", "1");
  die();
}
if ((!isset($_SESSION['DOUBLE_GAME_WIN'])) OR ($_SESSION['DOUBLE_GAME_WIN']<=0)) {
  printVar("t_alert1", "Internal Server Error");
  printVar("error", "1");
  die();
}

$bank_delitel=Game::$config['delitel']/$_SESSION['DOUBLE_GAME_WIN'];

$cards=array(
	array(
		'id' => 2,
		'type' => 1,
		'color' => 2
    ),
    array(
		'id' => 3,
		'type' => 1,
		'color' => 2
    ),
    array(
		'id' => 4,
		'type' => 1,
		'color' => 2
    ),
    array(
		'id' => 5,
		'type' => 1,
		'color' => 2
    ),
    array(
		'id' => 6,
		'type' => 1,
		'color' => 2
    ),
    array(
		'id' => 7,
		'type' => 1,
		'color' => 2
    ),
    array(
		'id' => 8,
		'type' => 1,
		'color' => 2
    ),
    array(
		'id' => 9,
		'type' => 1,
		'color' => 2
    ),
    array(
		'id' => 10,
		'type' => 1,
		'color' => 2
    ),
    array(
		'id' => 11,
		'type' => 1,
		'color' => 2
    ),
    array(
		'id' => 12,
		'type' => 1,
		'color' => 2
    ),
    array(
		'id' => 13,
		'type' => 1,
		'color' => 2
    ),
    array(
		'id' => 14,
		'type' => 1,
		'color' => 2
    ),
    array(
		'id' => 15,
		'type' => 2,
		'color' => 1
    ),
    array(
		'id' => 16,
		'type' => 2,
		'color' => 1
    ),
    array(
		'id' => 17,
		'type' => 2,
		'color' => 1
    ),
    array(
		'id' => 18,
		'type' => 2,
		'color' => 1
    ),
    array(
		'id' => 19,
		'type' => 2,
		'color' => 1
    ),
    array(
		'id' => 20,
		'type' => 2,
		'color' => 1
    ),
    array(
		'id' => 21,
		'type' => 2,
		'color' => 1
    ),
    array(
		'id' => 22,
		'type' => 2,
		'color' => 1
    ),
    array(
		'id' => 23,
		'type' => 2,
		'color' => 1
    ),
    array(
		'id' => 24,
		'type' => 2,
		'color' => 1
    ),
    array(
		'id' => 25,
		'type' => 2,
		'color' => 1
    ),
    array(
		'id' => 26,
		'type' => 2,
		'color' => 1
    ),
    array(
		'id' => 27,
		'type' => 2,
		'color' => 1
    ),
    array(
		'id' => 28,
		'type' => 3,
		'color' => 1
    ),
    array(
		'id' => 28,
		'type' => 3,
		'color' => 1
    ),
    array(
		'id' => 29,
		'type' => 3,
		'color' => 1
    ),
    array(
		'id' => 30,
		'type' => 3,
		'color' => 1
    ),
    array(
		'id' => 31,
		'type' => 3,
		'color' => 1
    ),
    array(
		'id' => 32,
		'type' => 3,
		'color' => 1
    ),
    array(
		'id' => 33,
		'type' => 3,
		'color' => 1
    ),
    array(
		'id' => 34,
		'type' => 3,
		'color' => 1
    ),
    array(
		'id' => 35,
		'type' => 3,
		'color' => 1
    ),
    array(
		'id' => 36,
		'type' => 3,
		'color' => 1
    ),
    array(
		'id' => 37,
		'type' => 3,
		'color' => 1
    ),
    array(
		'id' => 38,
		'type' => 3,
		'color' => 1
    ),
    array(
		'id' => 39,
		'type' => 3,
		'color' => 1
    ),
    array(
		'id' => 40,
		'type' => 3,
		'color' => 1
    ),
    array(
		'id' => 41,
		'type' => 4,
		'color' => 2
    ),
    array(
		'id' => 42,
		'type' => 4,
		'color' => 2
    ),
    array(
		'id' => 43,
		'type' => 4,
		'color' => 2
    ),
    array(
		'id' => 44,
		'type' => 4,
		'color' => 2
    ),
    array(
		'id' => 45,
		'type' => 4,
		'color' => 2
    ),
    array(
		'id' => 46,
		'type' => 4,
		'color' => 2
    ),
    array(
		'id' => 47,
		'type' => 4,
		'color' => 2
    ),
    array(
		'id' => 48,
		'type' => 4,
		'color' => 2
    ),
    array(
		'id' => 49,
		'type' => 4,
		'color' => 2
    ),
    array(
		'id' => 50,
		'type' => 4,
		'color' => 2
    ),
    array(
		'id' => 51,
		'type' => 4,
		'color' => 2
    ),
    array(
		'id' => 52,
		'type' => 4,
		'color' => 2
    ),
    array(
		'id' => 53,
		'type' => 4,
		'color' => 2
    ),
);

if ((isset($_POST['bet_2'])) AND (($_POST['bet_2']=="1") OR ($_POST['bet_2']=="2"))) {
  $win=0;
  $card=null;
  while (true) {
    $bank=Game::bankBalance()/$bank_delitel;
    $card=mt_rand(0, count($cards));
    if ($cards[$card]['color']==$_POST['bet_2']) {
      $win=$_SESSION['DOUBLE_GAME_WIN']*2;
    } else {
      $win=0;
    }
    if (($win<=$bank) AND (chance(Game::$config['ddouble']))) {
      break;
    } else {
      $win=0;
    }
  }

  Game::writeStat($_SESSION['DOUBLE_GAME_WIN'], $win);

  if ($win==0) {
    unset($_SESSION['ALLOW_DOUBLE']);
    printVar("error", "0");
	printVar("old_credit", Game::userBalance());
    Game::userPay($_SESSION['DOUBLE_GAME_WIN']);
    Game::bankAdd($_SESSION['DOUBLE_GAME_WIN']);
	printVar("credit", Game::userBalance());
	printVar("du_win_money", "0");
	printVar("card_res", $cards[$card]['id']);
	printVar("double_up_ok", "0");
	printVar("bonus_game_ok", "0");
  } else {
    $_SESSION['ALLOW_DOUBLE']=true;
    printVar("error", "0");
	printVar("old_credit", Game::userBalance());
	Game::userPay($_SESSION['DOUBLE_GAME_WIN']);
    Game::bankAdd($_SESSION['DOUBLE_GAME_WIN']);
    Game::userAdd($win);
    Game::bankPay($win);
	printVar("credit", Game::userBalance());
	$_SESSION['DOUBLE_GAME_WIN']=$win;
	printVar("du_win_money", $win);
	printVar("card_res", $cards[$card]['id']);
	printVar("double_up_ok", "1");
	printVar("bonus_game_ok", "0");
  }

} elseif ((isset($_POST['bet_4'])) AND ((($_POST['bet_4']=="1") OR ($_POST['bet_4']=="2")) OR (($_POST['bet_4']=="3") OR ($_POST['bet_4']=="4")))) {
  $win=0;
  $card=null;
  while (true) {
    $bank=Game::bankBalance()/$bank_delitel;
    $card=mt_rand(0, count($cards));
    if ($cards[$card]['type']==$_POST['bet_4']) {
      $win=$_SESSION['DOUBLE_GAME_WIN']*4;
    } else {
      $win=0;
    }
    if (($win<=$bank) AND (chance(Game::$config['ddouble']))) {
      break;
    } else {
      $win=0;
    }
  }

  Game::writeStat($_SESSION['DOUBLE_GAME_WIN'], $win);

  if ($win==0) {
    unset($_SESSION['ALLOW_DOUBLE']);
    printVar("error", "0");
	printVar("old_credit", Game::userBalance());
    Game::userPay($_SESSION['DOUBLE_GAME_WIN']);
    Game::bankAdd($_SESSION['DOUBLE_GAME_WIN']);
	printVar("credit", Game::userBalance());
	printVar("du_win_money", "0");
	printVar("card_res", $cards[$card]['id']);
	printVar("double_up_ok", "0");
	printVar("bonus_game_ok", "0");
  } else {
    $_SESSION['ALLOW_DOUBLE']=true;
    printVar("error", "0");
	printVar("old_credit", Game::userBalance());
	Game::userPay($_SESSION['DOUBLE_GAME_WIN']);
    Game::bankAdd($_SESSION['DOUBLE_GAME_WIN']);
    Game::userAdd($win);
    Game::bankPay($win);
	printVar("credit", Game::userBalance());
	$_SESSION['DOUBLE_GAME_WIN']=$win;
	printVar("du_win_money", $win);
	printVar("card_res", $cards[$card]['id']);
	printVar("double_up_ok", "1");
	printVar("bonus_game_ok", "0");
  }
} else {
  printVar("t_alert1", "Internal Server Error");
  printVar("error", "1");
}

die();

?>
