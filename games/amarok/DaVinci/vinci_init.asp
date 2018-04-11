<?php

define("_GAME_NAME", "DaVinci");

if (eregi("vinci_init\.asp$", strtolower(__FILE__))===false) {
  print_var("t_alert2", "Fuck you self, my darling!");
  print_var("error", "2");
  die();
}

header("Expires: ".gmdate("D, d M Y H:i:s")."GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

define("_MIN_ICON", 1);
define("_MAX_ICON", 12);
define("_WHEEL_SIZE", 50);

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
print_var("t_spin", "SPIN");
print_var("t_betmax", "BET MAX");
print_var("t_autoplay", "AUTO PLAY");
print_var("t_stop", "STOP");
print_var("t_help", "HELP");
print_var("t_exit", "EXIT");
print_var("t_rules", "RULES");
print_var("t_info", "INFO");
print_var("t_bank", "BANK");
print_var("t_numlines", "NUMBER OF LINES");
print_var("t_coinslines", "COINS PER LINE");
print_var("t_totalbet", "TOTAL BET");
print_var("t_credit", "CREDIT");
print_var("t_winpaid", "WINPAID");
print_var("t_gameover1", "GAME");
print_var("t_gameover2", "OVER");
print_var("t_coinvalue", "COIN VALUE");
print_var("t_bet", "BET");
print_var("t_scatterspay", "SCATTERS PAY");
print_var("t_unfinished", "A FREE MODE WAS NOT COMPLETED");
print_var("t_freeplayed", "FREE GAMES PLAYED");
print_var("t_freetoplay", "FREE GAMES LEFT");
print_var("t_payoutsincoins", "PAYOUTS IN COINS");
print_var("t_15freegames", "15 FREE GAMES");
print_var("t_20freegames", "20 FREE GAMES");
print_var("t_25freegames", "25 FREE GAMES");
print_var("t_scatterpays", "Scatter pays anywhere on the screen");

print_var("t_replace", "Mona Lisa substitute other symbols except Scatters");
print_var("t_replace_james", "The symbol James substitutes other symbols except Scatters");
print_var("t_replace_jv", "The symbol Jules Verne substitutes other symbols except Scatters");
print_var("t_replace_heroe", "The symbol SuperHeroe substitute other symbols except Scatters");
print_var("t_replace_cat", "The symbol Cat ABCDEF substitute other symbols except Scatters");
print_var("t_replace_referee", "The symbol Referee substitute other symbols except Scatters");
print_var("t_replace_guns", "The symbol Lasers substitute other symbols except Scatters");
print_var("t_replace_invaders", "The symbol Invaders substitute other symbols except Scatters");
print_var("t_replace_peacock", "The symbol peacock substitute other symbols except Scatters");
print_var("t_replace_king", "The symbol King substitute other symbols except Scatters");
print_var("t_replace_snow", "The symbol SnowFlake substitute other symbols except Scatters");

if ($game_configs['wildchar_win_multiplication']==1) {
	print_var("t_pays2x", "");
	print_var("t_doubled", "");
	print_var("t_doubled_james", "");
	print_var("t_doubled_jv", "");
	print_var("t_doubled_heroe", "");
	print_var("t_doubled_cat", "");
	print_var("t_doubled_referee", "");
	print_var("t_doubled_guns", "");
	print_var("t_doubled_guns", "");
	print_var("t_doubled_peacock", "");
	print_var("t_doubled_king", "");
	print_var("t_doubled_snow", "");
} elseif ($game_configs['wildchar_win_multiplication']==2) {
	print_var("t_pays2x", "PAYS 2x");
	print_var("t_doubled", "Every payout where Mona Lisa substitute a symbol is doubled");
	print_var("t_doubled_james", "Every payout where the symbol James substitutes a symbol is doubled");
	print_var("t_doubled_jv", "Every payout where the symbol Jules Verne substitutes a symbol is doubled");
	print_var("t_doubled_heroe", "Every payout where the symbol SuperHeroe substitute a symbol is doubled");
	print_var("t_doubled_cat", "Every payout where the symbol Cat ABCDEF substitute a symbol is doubled");
	print_var("t_doubled_referee", "Every payout where the symbol Referee substitute a symbol is doubled");
	print_var("t_doubled_guns", "Every payout where the symbol Lasers substitute a symbol is doubled");
	print_var("t_doubled_guns", "Every payout where the symbol Invaders substitute a symbol is doubled");
	print_var("t_doubled_peacock", "Every payout where the symbol peacock substitute a symbol is doubled");
	print_var("t_doubled_king", "Every payout where the symbol King substitute a symbol is doubled");
	print_var("t_doubled_snow", "Every payout where the symbol SnowFlake substitutes a symbol is doubled");
} elseif ($game_configs['wildchar_win_multiplication']==3) {
    print_var("t_pays2x", "PAYS 3x");
	print_var("t_doubled", "Every payout where Mona Lisa substitute a symbol is tripled");
	print_var("t_doubled_james", "Every payout where the symbol James substitutes a symbol is tripled");
	print_var("t_doubled_jv", "Every payout where the symbol Jules Verne substitutes a symbol is tripled");
	print_var("t_doubled_heroe", "Every payout where the symbol SuperHeroe substitute a symbol is tripled");
	print_var("t_doubled_cat", "Every payout where the symbol Cat ABCDEF substitute a symbol is tripled");
	print_var("t_doubled_referee", "Every payout where the symbol Referee substitute a symbol is tripled");
	print_var("t_doubled_guns", "Every payout where the symbol Lasers substitute a symbol is tripled");
	print_var("t_doubled_guns", "Every payout where the symbol Invaders substitute a symbol is tripled");
	print_var("t_doubled_peacock", "Every payout where the symbol peacock substitute a symbol is tripled");
	print_var("t_doubled_king", "Every payout where the symbol King substitute a symbol is tripled");
	print_var("t_doubled_snow", "Every payout where the symbol SnowFlake substitutes a symbol is tripled");
} else {
    print_var("t_pays2x", "PAYS 3x");
	print_var("t_doubled", "Every payout where Mona Lisa substitute a symbol is multiply by ".$game_configs['onfree_win_multiplication']);
	print_var("t_doubled_james", "Every payout where the symbol James substitutes a symbol is multiply by ".$game_configs['onfree_win_multiplication']);
	print_var("t_doubled_jv", "Every payout where the symbol Jules Verne substitutes a symbol is multiply by ".$game_configs['onfree_win_multiplication']);
	print_var("t_doubled_heroe", "Every payout where the symbol SuperHeroe substitute a symbol is multiply by ".$game_configs['onfree_win_multiplication']);
	print_var("t_doubled_cat", "Every payout where the symbol Cat ABCDEF substitute a symbol is multiply by ".$game_configs['onfree_win_multiplication']);
	print_var("t_doubled_referee", "Every payout where the symbol Referee substitute a symbol is multiply by ".$game_configs['onfree_win_multiplication']);
	print_var("t_doubled_guns", "Every payout where the symbol Lasers substitute a symbol is multiply by ".$game_configs['onfree_win_multiplication']);
	print_var("t_doubled_guns", "Every payout where the symbol Invaders substitute a symbol is multiply by ".$game_configs['onfree_win_multiplication']);
	print_var("t_doubled_peacock", "Every payout where the symbol peacock substitute a symbol is multiply by ".$game_configs['onfree_win_multiplication']);
	print_var("t_doubled_king", "Every payout where the symbol King substitute a symbol is multiply by ".$game_configs['onfree_win_multiplication']);
	print_var("t_doubled_snow", "Every payout where the symbol SnowFlake substitutes a symbol is multiply by ".$game_configs['onfree_win_multiplication']);
}


if ($game_configs['onfree_win_multiplication']==1) {
  print_var("t_payoutsx3", "");
} elseif ($game_configs['onfree_win_multiplication']==2) {
  print_var("t_payoutsx3", "In free mode, all payouts are doubled");
} elseif ($game_configs['onfree_win_multiplication']==3) {
  //In free mode, all payouts are tripled
  print_var("t_payoutsx3", "In free mode, all payouts are tripled");
} else {
  print_var("t_payoutsx3", "In free mode, all payouts are multiply by ".$game_configs['onfree_win_multiplication']);
}

print_var("t_alert1", "Crйdit insuffisant, vйrifiez votre compte");
print_var("t_alert2", "Votre session est terminйe, veuillez vous reloguer");
print_var("t_alert3", "Ne jouez que dans une fenкtre");
print_var("t_jackpotwon", "VOUS GAGNEZ LE JACKPOT !");
print_var("t_close", "FERMER");

if (!is_user()) {
  print_var("error", "2");
  die();
}

if ((!is_bank($game_configs['game_bank'])) OR (!is_bank($game_configs['profit_bank']))) {
      // Если банки не существуют, то это ошибка в БД и играть мы дальше не можем.
  print_var("t_alert2", "Internal Error");
  print_var("error", "2");
  die();
}

$_SESSION['DaVinci_wheels']=array();

for ($wheel=1; $wheel<6; $wheel++) {
  $_SESSION['DaVinci_wheels'][$wheel]=array();
  for ($icon=1; $icon<_WHEEL_SIZE+1; $icon++) {
   $_SESSION['DaVinci_wheels'][$wheel][$icon]=mt_rand(_MIN_ICON, _MAX_ICON);
   if ($icon!=1) {
     while ($_SESSION['DaVinci_wheels'][$wheel][$icon]==$_SESSION['DaVinci_wheels'][$wheel][$icon-1]) {
        $_SESSION['DaVinci_wheels'][$wheel][$icon]=mt_rand(_MIN_ICON, _MAX_ICON);
     }
   }
  }
}

print_var("error", "0");

print_var("mode_free", "0");
print_var("nb_gratuit_to_play", "");
print_var("nb_gratuit_played", "");

print_var("credit", user_balance());
print_var("coinsize", $game_configs['coinsize']);

print_var("symb1", mt_rand(_MIN_ICON, _MAX_ICON));
print_var("symb2", mt_rand(_MIN_ICON, _MAX_ICON));
print_var("symb3", mt_rand(_MIN_ICON, _MAX_ICON));
print_var("symb4", mt_rand(_MIN_ICON, _MAX_ICON));
print_var("symb5", mt_rand(_MIN_ICON, _MAX_ICON));
print_var("symb6", mt_rand(_MIN_ICON, _MAX_ICON));
print_var("symb7", mt_rand(_MIN_ICON, _MAX_ICON));
print_var("symb8", mt_rand(_MIN_ICON, _MAX_ICON));
print_var("symb9", mt_rand(_MIN_ICON, _MAX_ICON));
print_var("symb10", mt_rand(_MIN_ICON, _MAX_ICON));
print_var("symb11", mt_rand(_MIN_ICON, _MAX_ICON));
print_var("symb12", mt_rand(_MIN_ICON, _MAX_ICON));
print_var("symb13", mt_rand(_MIN_ICON, _MAX_ICON));
print_var("symb14", mt_rand(_MIN_ICON, _MAX_ICON));
print_var("symb15", mt_rand(_MIN_ICON, _MAX_ICON));





