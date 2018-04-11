<?php

if (eregi("chasse_init\.asp$", strtolower(__FILE__))===false) {
  print_var("t_alert1", "Fuck you self, my darling!");
  print_var("error", "1");
  die();
}

header("Expires: ".gmdate("D, d M Y H:i:s")."GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

define("_GAME_NAME", "TreasureHunt");

include("common.php");


trace_str("__FILE__");

print_var("transfertok", "1");

print_var("nbT", "10");
print_var("nbCP", "3");
print_var("credit", "1000");
print_var("valT_1", "1");
print_var("valT_2", "2");
print_var("valT_3", "5");
print_var("valT_4", "10");
print_var("valT_5", "15");
print_var("valT_6", "20");
print_var("valT_7", "25");
print_var("valT_8", "50");
print_var("valT_9", "75");
print_var("valT_10", "100");
print_var("nbP_1", "5");
print_var("betP_1", "2");
print_var("nbP_2", "8");
print_var("betP_2", "3");
print_var("nbP_3", "13");
print_var("betP_3", "5");
print_var("t_treasures", "TREASURES");
print_var("t_message", " treasures are hidden on the island. Build your own team of pirates and visit the island ...");
print_var("t_island", "THE TREASURE ISLAND");
print_var("t_credit", "CREDIT");
print_var("t_bet", "BET");
print_var("t_congrat", "CONGRATULATIONS ! YOU WIN");
print_var("t_newgame", "NEW GAME");
print_var("t_samebet", "SAME BET");
print_var("t_dig", "DIG");
print_var("t_place", "PLACE YOUR PIRATES");
print_var("t_animations", "ANIMATIONS");
print_var("t_help", "HELP");
print_var("t_exit", "EXIT");
print_var("t_rules", "RULES");
print_var("t_info", "INFO");
print_var("t_bank", "BANK");
print_var("t_alert1", "Not enough credit, please check your account");
print_var("t_alert2", "Your session has expired, please log-in");
print_var("t_alert3", "Only play in one window");
print_var("t_close", "CLOSE");
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

if ((!is_bank($game_configs['game_bank'])) OR (!is_bank($game_configs['profit_bank']))) {
      # Если банки не существуют, то это ошибка в БД и играть мы дальше не можем.
      print_var("error", "4");
      die();
}

if (is_user()) {
	print_var("credit", user_balance());
} else {
  print_var("error", "2");
}


?>