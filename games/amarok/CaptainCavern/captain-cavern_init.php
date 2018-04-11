<?php

define("AMAROK_GAME_NAME", "CaptainCavern");

header("Expires: ".gmdate("D, d M Y H:i:s")."GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

define("_MIN_ICON", 1);
define("_MAX_ICON", 12);

include_once("../core/engine.php");

printVar("currency", "Ru");
printVar("lng", "EN");
printVar("cas_log", "YC");
printVar("pop_use", "0");
printVar("pop_1disp", "30");
printVar("pop_nextdisp", "60");
printVar("pop_url", "");
printVar("pop_var1", "Do you want to play in real mode ?");
printVar("pop_var2", "Yes");
printVar("pop_var3", "No");
printVar("pop_var4", "");
printVar("pop_var", "");
printVar("rules", $rules_url);
printVar("help", $help_url);
printVar("bank", $bank_url);
printVar("casino", $gamelist_url);
printVar("t_payouts", "PAYOUTS");
printVar("t_select", "SELECT LINES");
printVar("t_betlines", "BET PER LINE");
printVar("t_spin", "SPIN ");
printVar("t_betmax", "BET MAX.");
printVar("t_double", "DOUBLE");
printVar("t_collect", "COLLECT");
printVar("t_play", "PLAY");
printVar("t_cancel", "CANCEL");
printVar("t_back", "BACK TO GAME");
printVar("t_help", "HELP");
printVar("t_exit", "EXIT");
printVar("t_rules", "RULES");
printVar("t_info", "INFO");
printVar("t_bank", "BANK");
printVar("t_numlines", "NUMBER OF LINES");
printVar("t_coinslines", "COINS PER LINE");
printVar("t_totalbet", "TOTAL BET");
printVar("t_credit", "CREDIT");
printVar("t_winpaid", "TOTAL WIN");
printVar("t_bonuswin", "BONUS WIN");
printVar("t_gameover1", "GAME");
printVar("t_gameover2", "OVER");
printVar("t_coinvalue", "COIN VALUE");
printVar("t_bet", "BET");
printVar("t_scatterspay", "SCATTERS PAY");
printVar("t_unfinished", "A FREE MODE WAS NOT COMPLETED");
printVar("t_payoutsincoins", "PAYOUTS IN COINS");
printVar("t_pays2x", "PAYS 2x");
printVar("t_pays", "PAYS");
printVar("t_choosecolor", "Select a color");
printVar("t_choosesymbol", "Select a symbol");
printVar("t_paylines", "PAYLINES");
printVar("t_characters", "CHARACTERS");
printVar("t_items", "OBJETS");
printVar("t_symbols1", "SYMBOLS 1");
printVar("t_symbols2", "SYMBOLS 2");
printVar("t_specials", "SPECIALS");
printVar("t_bonusgame", "BONUS GAME");
printVar("t_bonuspays", "Bonus pays : number of lines x number of coins x station's payout");
printVar("t_doubleup", "DOUBLE UP");
printVar("t_previous", "PREVIOUS");
printVar("t_next", "NEXT");
printVar("t_3dices", " >3 DICES");
printVar("t_4dices", " >4 DICES");
printVar("t_5dices", " >5 DICES");
printVar("t_any3", "anywhere on the screen gives 3 dices throws");
printVar("t_any4", "anywhere on the screen gives 4 dices throws");
printVar("t_any5", "anywhere on the screen gives 5 dices throws");
printVar("t_rulesdouble", "Any winnings (Except bonus winnings) with a value of less than three times the wagers can be doubled or quadrupled.");
printVar("t_rulesbonus", "After each dice throw, your pawn moves to the station corresponding to the result of the dice throw. You win the the number of coins given for this station, multiplied by the number of lines played and multiplied by the number of coins.");
printVar("t_click", "Click here to go back to the game");
printVar("t_eachline", "On each line, you can bet from 1 to 10 coins");
printVar("t_replace_pint", "Substitutes other symbols except Scatters. Every payout where it substitutes a symbol is doubled");
printVar("t_close", "CLOSE");


if(!Game::isBank()) {
  printVar("t_alert1", "Internal Error");
  printVar("error", "1");
  die();
}

printVar("t_alert1", "Not enough credits, please check your account");
printVar("t_alert2", "Your session has expired, please log-in");
printVar("t_alert3", "Please only play in one window");

if(!Game::isUser()) {
  printVar("error", "2");
  print_r($_SESSION);
  die();
}

printVar("error", "0");
printVar("bonus", "0");
printVar("rebuild", "0");
printVar("credit", Game::userBalance());
printVar("coinsize", '1');

$_SESSION['CaptainCavern_wheels']=array();

for ($wheel=1; $wheel<6; $wheel++) {
	$_SESSION['CaptainCavern_wheels'][$wheel]=array();
	$_SESSION["CaptainCavern_wheel_".$wheel."_size"]=mt_rand(30, 50);
	printVar("wheel".$wheel."size", $_SESSION["CaptainCavern_wheel_".$wheel."_size"]);
	printVar("wheel".$wheel."Pos", mt_rand(1, $_SESSION["CaptainCavern_wheel_".$wheel."_size"]));
	for ($icon=1; $icon < $_SESSION["CaptainCavern_wheel_".$wheel."_size"]+1; $icon++) {
		$_SESSION['CaptainCavern_wheels'][$wheel][$icon]=mt_rand(_MIN_ICON, _MAX_ICON);
		if ($icon!=1) {
			while ($_SESSION['CaptainCavern_wheels'][$wheel][$icon]==$_SESSION['CaptainCavern_wheels'][$wheel][$icon-1]) {
				$_SESSION['CaptainCavern_wheels'][$wheel][$icon]=mt_rand(_MIN_ICON, _MAX_ICON);
			}
		}
		printVar("wheel".$wheel."_".$icon, $_SESSION['CaptainCavern_wheels'][$wheel][$icon]);
	}
}


die();
