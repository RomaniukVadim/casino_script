<?php

define("_GAME_NAME", "Tokyo");

if (eregi("tokyo_init\.asp$", strtolower(__FILE__))===false) {
  print_var("t_alert1", "Fuck you self, my darling!");
  print_var("error", "1");
  die();
}

header("Expires: ".gmdate("D, d M Y H:i:s")."GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

define("_MIN_ICON", 1);
define("_MAX_ICON", 12);

//include("common.php");
include_once("../core/engine.php");

trace_str(__FILE__);
trace_var($_POST, "POST");
trace_var($_GET, "GET");

print_var("currency", "Ru");
print_var("lng", "EN");
print_var("cas_log", "YC");
print_var("pop_use", "0");
print_var("pop_1disp", "30");
print_var("pop_nextdisp", "60");
print_var("pop_url", "");
print_var("pop_var1", "Do you want to play in real mode ?");
print_var("pop_var2", "Yes");
print_var("pop_var3", "No");
print_var("pop_var4", "");
print_var("pop_var", "");
print_var("rules", $rules_url);
print_var("help", $help_url);
print_var("bank", $bank_url);
print_var("casino", $gamelist_url);
print_var("t_payouts", "PAYOUTS");
print_var("t_select", "SELECT LINES");
print_var("t_betlines", "BET PER LINE");
print_var("t_spin", "SPIN ");
print_var("t_betmax", "BET MAX.");
print_var("t_double", "DOUBLE");
print_var("t_collect", "COLLECT");
print_var("t_play", "PLAY");
print_var("t_cancel", "CANCEL");
print_var("t_back", "BACK TO GAME");
print_var("t_help", "HELP");
print_var("t_exit", "EXIT");
print_var("t_rules", "RULES");
print_var("t_info", "INFO");
print_var("t_bank", "BANK");
print_var("t_numlines", "NUMBER OF LINES");
print_var("t_coinslines", "COINS PER LINE");
print_var("t_totalbet", "TOTAL BET");
print_var("t_credit", "CREDIT");
print_var("t_winpaid", "TOTAL WIN");
print_var("t_bonuswin", "BONUS WIN");
print_var("t_gameover1", "GAME");
print_var("t_gameover2", "OVER");
print_var("t_coinvalue", "COIN VALUE");
print_var("t_bet", "BET");
print_var("t_scatterspay", "SCATTERS PAY");
print_var("t_unfinished", "A FREE MODE WAS NOT COMPLETED");
print_var("t_payoutsincoins", "PAYOUTS IN COINS");
print_var("t_pays2x", "PAYS 2x");
print_var("t_pays", "PAYS");
print_var("t_choosecolor", "Select a color");
print_var("t_choosesymbol", "Select a symbol");
print_var("t_paylines", "PAYLINES");
print_var("t_characters", "CHARACTERS");
print_var("t_items", "OBJETS");
print_var("t_symbols1", "SYMBOLS 1");
print_var("t_symbols2", "SYMBOLS 2");
print_var("t_specials", "SPECIALS");
print_var("t_bonusgame", "BONUS GAME");
print_var("t_bonuspays", "Bonus pays : number of lines x number of coins x station's payout");
print_var("t_doubleup", "DOUBLE UP");
print_var("t_previous", "PREVIOUS");
print_var("t_next", "NEXT");
print_var("t_3dices", " >3 DICES");
print_var("t_4dices", " >4 DICES");
print_var("t_5dices", " >5 DICES");
print_var("t_any3", "anywhere on the screen gives 3 dices throws");
print_var("t_any4", "anywhere on the screen gives 4 dices throws");
print_var("t_any5", "anywhere on the screen gives 5 dices throws");
print_var("t_rulesdouble", "Any winnings (Except bonus winnings) with a value of less than three times the wagers can be doubled or quadrupled.");
print_var("t_rulesbonus", "After each dice throw, your pawn moves to the station corresponding to the result of the dice throw. You win the the number of coins given for this station, multiplied by the number of lines played and multiplied by the number of coins.");
print_var("t_click", "Click here to go back to the game");
print_var("t_eachline", "On each line, you can bet from 1 to 10 coins");
print_var("t_replace_pint", "Substitutes other symbols except Scatters. Every payout where it substitutes a symbol is doubled");
print_var("t_close", "CLOSE");

if ((!is_bank($game_configs['game_bank'])) OR (!is_bank($game_configs['profit_bank']))) {
      // Если банки не существуют, то это ошибка в БД и играть мы дальше не можем.
  print_var("t_alert1", "Internal Error");
  print_var("error", "1");
  die();
}

print_var("t_alert1", "Not enough credits, please check your account");
print_var("t_alert2", "Your session has expired, please log-in");
print_var("t_alert3", "Please only play in one window");

if (!is_user()) {
  print_var("error", "2");
  die();
}

print_var("error", "0");
print_var("bonus", "0");
print_var("rebuild", "0");
print_var("credit", user_balance());
print_var("coinsize", $game_configs['coinsize']);

$_SESSION['Tokyo_wheels']=array();


for ($wheel=1; $wheel<6; $wheel++) {
  $_SESSION['Tokyo_wheels'][$wheel]=array();
  $_SESSION["Tokyo_wheel_".$wheel."_size"]=mt_rand($game_configs['wheel_size_min'], $game_configs['wheel_size_max']);
  print_var("wheel".$wheel."size", $_SESSION["Tokyo_wheel_".$wheel."_size"]);
  print_var("wheel".$wheel."Pos", mt_rand(1, $_SESSION["Tokyo_wheel_".$wheel."_size"]));
  for ($icon=1; $icon<$_SESSION["Tokyo_wheel_".$wheel."_size"]+1; $icon++) {
   $_SESSION['Tokyo_wheels'][$wheel][$icon]=mt_rand(_MIN_ICON, _MAX_ICON);
   if ($icon!=1) {
     while ($_SESSION['Tokyo_wheels'][$wheel][$icon]==$_SESSION['Tokyo_wheels'][$wheel][$icon-1]) {
        $_SESSION['Tokyo_wheels'][$wheel][$icon]=mt_rand(_MIN_ICON, _MAX_ICON);
     }
   }
   print_var("wheel".$wheel."_".$icon, $_SESSION['Tokyo_wheels'][$wheel][$icon]);
  }
}


die();