<?php


if (eregi("grizzly_init\.asp$", strtolower(__FILE__))===false) {
  print_var("t_alert1", "Fuck you self, my darling!");
  print_var("error", "1");
  die();
}

header("Expires: ".gmdate("D, d M Y H:i:s")."GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

define("_GAME_NAME", "Grizzly");


//include("common.php");
include_once("../core/engine.php");

//trace_str("__FILE__");

print_var("t_betone", "BET 1");
print_var("t_bettwo", "BET 2");
print_var("t_play", "SPIN");
print_var("t_replay", "SPIN AND RESPIN");
print_var("t_hold", "HOLD");
print_var("t_respin", "RESPIN");
print_var("t_connect", "CONNECTING");
print_var("t_same", "SAME");
print_var("t_bet", "BET");
print_var("t_payouts", "PAYOUTS");
print_var("t_gamerecords", "GAME RECORDS");
print_var("t_help", "HELP");
print_var("t_exit", "EXIT");
print_var("t_rules", "RULES");
print_var("t_info", "INFO");
print_var("t_bank", "BANK");
print_var("t_substitute", "Substitute other symbols on payline");
print_var("t_coins", "COINS");
print_var("t_gameover1", "GAME");
print_var("t_gameover2", "OVER");
print_var("t_credit", "CREDIT");
print_var("t_coinvalue", "COIN VALUE");
print_var("t_winpaid", "WINPAID");
print_var("t_alert1", "Not enough credits, please check your account");
print_var("t_alert2", "Your session has expired, please log-in");
print_var("t_alert3", "Please only play in one window");
print_var("t_alert4", "Wrong game ID or configuration");
print_var("t_alert5", "Invalid game");
print_var("t_alert6", "A game was not completed");
print_var("t_close", "CLOSE");
print_var("currency", "\$");
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

if ((!is_bank($game_configs['game_bank'])) OR (!is_bank($game_configs['profit_bank']))) {
      // Если банки не существуют, то это ошибка в БД и играть мы дальше не можем.
      print_var("error", "4");
      die();
}

if (is_user()) {
	print_var("allow_hold", "0");
	print_var("symb1", "0");
	print_var("symb2", "6");
	print_var("symb3", "0");
	print_var("symb4", "4");
	print_var("symb5", "0");
	print_var("symb6", "6");
	print_var("symb7", "4");
	print_var("symb8", "0");
	print_var("symb9", "7");
	print_var("win1", "0");
	print_var("betamount", "0");
	print_var("credit", user_balance());
	print_var("coinsize", $game_configs['coinsize']);
} else {
  print_var("error", "2");
}
