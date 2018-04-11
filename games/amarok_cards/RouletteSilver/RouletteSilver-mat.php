<?

define("_GAME_NAME", "RouletteSilver");

include("common.php");

if (!is_user()) {
  header("Location: /");
  die();
}

trace_str(__FILE__);
trace_var($_POST, "POST");
trace_var($_GET, "GET");

$map=array(
    0=>array(0,106),
	1=>array(1,37,61,94,106,107,130,146,149,157,160,161),
	2=>array(2,37,38,62,94,106,107,108,130,147,149,158,159,161),
	3=>array(3,38,63,94,106,108,130,148,149,157,160,161),
	4=>array(4,39,61,64,95,107,109,130,131,146,149,158,159,161),
	5=>array(5,39,40,62,65,95,107,108,109,110,130,131,147,149,157,160,161),
	6=>array(6,40,63,95,108,110,130,131,135,148,149,158,159,161),
	7=>array(7,41,64,67,96,109,111,131,132,146,149,157,160,161),
	8=>array(8,41,42,65,68,96,109,110,111,112,131,132,147,149,158,159,161),
	9=>array(9,42,66,69,96,110,112,131,132,148,149,157,160,161),
	10=>array(10,43,67,70,97,111,113,132,133,146,149,158,159,161),
	11=>array(11,43,44,68,71,97,111,112,113,114,132,133,147,149,158,160,161),
	12=>array(12,44,69,72,97,112,114,132,133,148,149,157,159,161),
	13=>array(13,45,70,73,98,113,115,133,134,146,150,158,160,161),
	14=>array(14,45,46,71,74,98,113,114,115,116,133,134,147,150,157,159,161),
	15=>array(15,46,72,75,98,114,116,133,134,148,150,158,160,161),
	16=>array(16,47,73,76,99,115,117,134,146,150,157,159,161),
	17=>array(17,47,48,74,77,99,115,116,117,118,134,135,147,150,158,160,161),
	18=>array(18,48,75,78,99,116,118,134,135,148,150,157,159,161),
	19=>array(19,49,76,79,100,117,119,135,136,146,150,157,160,162),
	20=>array(20,49,50,77,80,100,117,118,119,120,135,136,147,150,158,159,162),
	21=>array(21,50,78,81,100,118,120,135,136,148,150,157,160,162),
	22=>array(22,51,79,82,119,121,136,137,146,150,158,159,162),
	23=>array(23,51,52,80,83,101,119,120,121,122,136,137,147,150,157,160,162),
	24=>array(24,52,81,84,101,120,122,136,137,148,150,158,159,162),
	25=>array(25,53,82,85,102,121,123,137,138,146,151,157,160,162),
	26=>array(26,53,54,83,86,102,121,122,123,124,137,138,147,151,158,159,162),
	27=>array(27,54,84,87,102,122,124,137,138,148,151,157,160,162),
	28=>array(28,55,85,88,103,123,125,138,139,146,151,158,159,162),
	29=>array(29,55,56,86,89,103,123,124,125,126,138,139,147,151,158,160,162),
	30=>array(30,56,87,90,103,124,126,138,148,151,157,159,162),
	31=>array(31,57,88,91,104,125,127,139,140,146,151,158,160,162),
	32=>array(32,57,58,89,92,104,125,126,127,128,139,140,147,151,157,159,162),
	33=>array(33,58,90,93,104,126,128,139,140,148,151,158,160,162),
	34=>array(34,59,91,105,127,140,146,151,157,159,162),
	35=>array(35,59,60,92,105,127,128,140,147,151,158,160,162),
	36=>array(36,60,93,105,128,140,148,151,157,159,162)
);

switch ($_POST["ACTION"]) {
  case "ENTER":
  print_var("RESULT", "OK");
  print_var("BALANCE", user_balance());
  break;

  case "MAKEBET":
  $allbet=0;
  $bet_data=explode("|", $_POST['BET']);
  for ($cell=0; $cell<=162; $cell++) {
    if ($bet_data[$cell]>0) {
       $allbet+=$bet_data[$cell];
    }
  }
  if ($allbet<=0) {
   print_var("RESULT", "BAD_BET");
   die();
  }
  if ($allbet>user_balance()) {
   print_var("RESULT", "LOW_BALANCE");
   die();
  }

  $number=0;
  $allwin=0;
  while (true) {
    $number=generate_number();
    $allwin=0;

    foreach ($map[$number] as $cell) {
      if ($bet_data[$cell]>0) {
        if (($cell>=0) AND ($cell<=36)) { $allwin+=$bet_data[$cell]*36; }
        if (($cell>=37) AND ($cell<=93)) { $allwin+=$bet_data[$cell]*18; }
        if (($cell>=94) AND ($cell<=105)) { $allwin+=$bet_data[$cell]*12; }
        if (($cell>=106) AND ($cell<=128)) { $allwin+=$bet_data[$cell]*9; }
        if (($cell>=130) AND ($cell<=140)) { $allwin+=$bet_data[$cell]*7; }
        if (($cell>=146) AND ($cell<=151)) { $allwin+=$bet_data[$cell]*4; }
        if (($cell>=157) AND ($cell<=162)) { $allwin+=$bet_data[$cell]*3; }
      }
    }

    if (bank_balance($game_configs['game_bank'])/_AMAROK_DELITEL/$allbet>=$allwin) {
       break;
    }
  }

  $profit=$allbet/100;
  $profit*=$game_configs['profit_percent'];
  user_pay($allbet);
  bank_add($game_configs['game_bank'], $allbet-$profit);
  bank_add($game_configs['profit_bank'], $profit, true);

  if ($allwin>0) {
    user_add($allwin);
    bank_pay($game_configs['game_bank'], $allwin);
  }

  write_stat($allbet, $allwin);

  print_var("id", "5001"); // ?????!
  print_var("JACKPOT", "0.00");
  print_var("PAYOUT", $allwin);
  print_var("NUMBER", $number);
  print_var("RESULT", "OK");
  print_var("BALANCE", user_balance());
  break;
}

function generate_number () {
  mt_srand ((double) microtime()*time());
  return mt_rand(0,36);
}


