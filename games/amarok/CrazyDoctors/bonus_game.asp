<?php

if (!eregi("bonus_game\.asp$", __FILE__)) {
  print_var("t_alert1", "Fuck you self, my darling!");
  print_var("error", "1");
  die();
}

header("Expires: ".gmdate("D, d M Y H:i:s")."GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

//include("common.php");
include_once("../core/engine.php");

if (!is_user()) {
 print_var("error", "2");
 die();
}

if (!isset($_SESSION['GAME_NAME'])) {
  print_var("error", "2");
  die();
}

if ((!isset($_SESSION['AMAROK_BONUS_GAME'])) OR (!$_SESSION['AMAROK_BONUS_GAME'])) {
  print_var("error", "2");
  die();
}

if ((!isset($_SESSION['AMAROK_BONUS_NB_DICES'])) OR ($_SESSION['AMAROK_BONUS_NB_DICES']<0)) {
  print_var("error", "2");
  die();
}

if ((!isset($_SESSION['AMAROK_BONUS_NB_COINS'])) OR ($_SESSION['AMAROK_BONUS_NB_COINS']<=0)) {
  print_var("error", "2");
  die();
}

if ((!isset($_SESSION['AMAROK_BONUS_NB_LINES'])) OR ($_SESSION['AMAROK_BONUS_NB_LINES']<=0)) {
  print_var("error", "2");
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



trace_str(__FILE__);
trace_var($_POST, "POST");
trace_var($_GET, "GET");

$bank_delitel=$_SESSION['AMAROK_BONUS_NB_COINS']*$_SESSION['AMAROK_BONUS_NB_LINES']*$game_configs['coinsize'];
$bank_delitel=_AMAROK_DELITEL/$bank_delitel;
trace_str("DELITEL: ".$bank_delitel);

$val_dice=0;
$win_dice=0;

while (true) {
  $val_dice=mt_rand(_DICE_MIN, _DICE_MAX);
  $new_pos=$_SESSION['AMAROK_BONUS_NB_POSITION']+$val_dice;
  $win_dice=$bonus_map[$new_pos]*$_SESSION['AMAROK_BONUS_NB_COINS']*$_SESSION['AMAROK_BONUS_NB_LINES'];
  $bank=bank_balance($game_configs['bonus_bank'])/$bank_delitel;
  if ($win_dice*$game_configs['coinsize']<$bank) {
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
user_add($win_dice*$game_configs['coinsize']);
bank_pay($game_configs['bonus_bank'], $win_dice*$game_configs['coinsize']);
write_stat (0, $win_dice*$game_configs['coinsize'], "bonus", $game_configs['bonus_bank']);

if ($_SESSION['AMAROK_BONUS_NB_DICES']<=$_SESSION['AMAROK_BONUS_NB_DICES_PLAYED']) {
  $_SESSION['AMAROK_BONUS_GAME']=false;
}


print_var("double_up_ok", "0");
print_var("error", "0");

# Всего бросков
print_var("nb_dice_to_play", $_SESSION['AMAROK_BONUS_NB_DICES']);
# Сделано бросков
print_var("current_dice_played", $_SESSION['AMAROK_BONUS_NB_DICES_PLAYED']);

# Число на кубике
print_var("val_dice", $val_dice);
# Позиция на карте
print_var("pos_dice", $_SESSION['AMAROK_BONUS_NB_POSITION']);
# Выигрыш в монетах с позиции
print_var("win_dice", $win_dice);

# Всего выиграно денег за бонус
print_var("coins_win_cumul_bonus", $_SESSION['AMAROK_BONUS_NB_WIN_COINS']);  # в монетах
print_var("money_win_cumul_bonus", $_SESSION['AMAROK_BONUS_NB_WIN_COINS']*$game_configs['coinsize']);  # в лавешках

print_var("credit", user_balance());
print_var("coinsize", $game_configs['coinsize']);

print_var("nb_coins", $_SESSION['AMAROK_BONUS_NB_COINS']);
print_var("nb_lines", $_SESSION['AMAROK_BONUS_NB_LINES']);

# Если 1, то играем. Если 0 то конец бонусу.
if ((isset($_SESSION['AMAROK_BONUS_GAME'])) AND ($_SESSION['AMAROK_BONUS_GAME'])) {
  print_var("bonus_game_ok", "1");
} else {
  print_var("bonus_game_ok", "0");
  unset($_SESSION['AMAROK_BONUS_GAME'],
        $_SESSION['AMAROK_BONUS_NB_WIN_COINS'],
        $_SESSION['AMAROK_BONUS_NB_DICES'],
        $_SESSION['AMAROK_BONUS_NB_DICES_PLAYED'],
        $_SESSION['AMAROK_BONUS_NB_POSITION'],
        $_SESSION['AMAROK_BONUS_NB_COINS'],
        $_SESSION['AMAROK_BONUS_NB_LINES']);
}


die();