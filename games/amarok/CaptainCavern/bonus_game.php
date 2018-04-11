<?php

header("Expires: ".gmdate("D, d M Y H:i:s")."GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

include("../core/engine.php");

if (!Game::isUser()) {
 printVar("error", "2");
 die();
}

if (!isset($_SESSION['GAME_NAME'])) {
  printVar("error", "2");
  die();
}

if ((!isset($_SESSION['AMAROK_BONUS_GAME'])) OR (!$_SESSION['AMAROK_BONUS_GAME'])) {
  printVar("error", "2");
  die();
}

if ((!isset($_SESSION['AMAROK_BONUS_NB_DICES'])) OR ($_SESSION['AMAROK_BONUS_NB_DICES']<0)) {
  printVar("error", "2");
  die();
}

if ((!isset($_SESSION['AMAROK_BONUS_NB_COINS'])) OR ($_SESSION['AMAROK_BONUS_NB_COINS']<=0)) {
  printVar("error", "2");
  die();
}

if ((!isset($_SESSION['AMAROK_BONUS_NB_LINES'])) OR ($_SESSION['AMAROK_BONUS_NB_LINES']<=0)) {
  printVar("error", "2");
  die();
}

$bonus_map=array();
$bonus_map[0]=0;
$bonus_map[1]=250;
$bonus_map[2]=100;
$bonus_map[3]=10;
$bonus_map[4]=25;
$bonus_map[5]=5;
$bonus_map[6]=50;
$bonus_map[7]=20;
$bonus_map[8]=100;
$bonus_map[9]=35;
$bonus_map[10]=75;
$bonus_map[11]=150;
$bonus_map[12]=0;
$bonus_map[13]=50;
$bonus_map[14]=25;
$bonus_map[15]=5;
$bonus_map[16]=5;
$bonus_map[17]=10;
$bonus_map[18]=5;
$bonus_map[19]=75;
$bonus_map[20]=250;
$bonus_map[21]=50;
$bonus_map[22]=20;
$bonus_map[23]=100;
$bonus_map[24]=75;
$bonus_map[25]=200;
$bonus_map[26]=125;
$bonus_map[27]=250;
$bonus_map[28]=75;
$bonus_map[29]=500;
$bonus_map[30]=2500;

define("_DICE_MIN", 1);
define("_DICE_MAX", 6);

define("_AVERAGE_BONUS_DICE_WIN", 50);


$bank_delitel=$_SESSION['AMAROK_BONUS_NB_COINS']*$_SESSION['AMAROK_BONUS_NB_LINES'];
$bank_delitel=Game::$config['delitel']/$bank_delitel;

$val_dice=0;
$win_dice=0;

while (true) {
  $val_dice=mt_rand(_DICE_MIN, _DICE_MAX);
  $new_pos=$_SESSION['AMAROK_BONUS_NB_POSITION']+$val_dice;
  $win_dice=$bonus_map[$new_pos]*$_SESSION['AMAROK_BONUS_NB_COINS']*$_SESSION['AMAROK_BONUS_NB_LINES'];
  $bank=Game::bankBalance()/$bank_delitel;
  if ($win_dice<$bank) {
    $_SESSION['AMAROK_BONUS_NB_DICES_PLAYED']++;
    if ($_SESSION['AMAROK_BONUS_NB_DICES_PLAYED']<$_SESSION['AMAROK_BONUS_NB_DICES']) {
      # На всякий случай проверим чтоб хватало денег продолжать крутить бонусы.
      if (($_SESSION['AMAROK_BONUS_NB_DICES']-$_SESSION['AMAROK_BONUS_NB_DICES_PLAYED'])*_AVERAGE_BONUS_DICE_WIN<$bank) {
        break;
      }
    } else {
      break;
    }
  }
}

$_SESSION['AMAROK_BONUS_NB_POSITION']=$new_pos;
$_SESSION['AMAROK_BONUS_NB_WIN_COINS']+=$win_dice;

# Запишем результат в БД
Game::userAdd($win_dice);
Game::bankPay($win_dice);
Game::writeStat (0, $win_dice);

if ($_SESSION['AMAROK_BONUS_NB_DICES']<=$_SESSION['AMAROK_BONUS_NB_DICES_PLAYED']) {
  $_SESSION['AMAROK_BONUS_GAME']=false;
}


printVar("double_up_ok", "0");
printVar("error", "0");

# Всего бросков
printVar("nb_dice_to_play", $_SESSION['AMAROK_BONUS_NB_DICES']);
# Сделано бросков
printVar("current_dice_played", $_SESSION['AMAROK_BONUS_NB_DICES_PLAYED']);

# Число на кубике
printVar("val_dice", $val_dice);
# Позиция на карте
printVar("pos_dice", $_SESSION['AMAROK_BONUS_NB_POSITION']);
# Выигрыш в монетах с позиции
printVar("win_dice", $win_dice);

# Всего выиграно денег за бонус
printVar("coins_win_cumul_bonus", $_SESSION['AMAROK_BONUS_NB_WIN_COINS']);  # в монетах
printVar("money_win_cumul_bonus", $_SESSION['AMAROK_BONUS_NB_WIN_COINS']);  # в лавешках

printVar("credit", Game::userBalance());
printVar("coinsize", 1);

printVar("nb_coins", $_SESSION['AMAROK_BONUS_NB_COINS']);
printVar("nb_lines", $_SESSION['AMAROK_BONUS_NB_LINES']);

# Если 1, то играем. Если 0 то конец бонусу.
if ((isset($_SESSION['AMAROK_BONUS_GAME'])) AND ($_SESSION['AMAROK_BONUS_GAME'])) {
  printVar("bonus_game_ok", "1");
} else {
  printVar("bonus_game_ok", "0");
  unset($_SESSION['AMAROK_BONUS_GAME'],
        $_SESSION['AMAROK_BONUS_NB_WIN_COINS'],
        $_SESSION['AMAROK_BONUS_NB_DICES'],
        $_SESSION['AMAROK_BONUS_NB_DICES_PLAYED'],
        $_SESSION['AMAROK_BONUS_NB_POSITION'],
        $_SESSION['AMAROK_BONUS_NB_COINS'],
        $_SESSION['AMAROK_BONUS_NB_LINES']);
}


die();
