<?php

if (eregi("chasse_deal\.asp$", strtolower(__FILE__))===false) {
  print_var("t_alert1", "Fuck you self, my darling!");
  print_var("error", "1");
  die();
}

header("Expires: ".gmdate("D, d M Y H:i:s")."GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

define("_GAME_NAME", "TreasureHunt");
define("_MIN_POSITION", 1);
define("_MAX_POSITION", 64);

include("./common.php");

$wins=array(1,2,5,10,15,20,25,50,75,100);
$extra_wins=array(
       5  => 5000,
       8  => 12000,
       10 => 25000
);

trace_str("__FILE__");

if (is_user()) {
  trace_var($_POST, "POST");
  trace_var($_GET, "GET");

  if (user_balance()<$_POST['betamount']) {
    print_var("error", "2");
    die();
  }

  $pirats=array();
  switch ($_POST['betamount']) {
    default:
    case 2:
    for ($i=1; $i<=5; $i++) {
        $pirats[]=$_POST["pos".$i];
    }
    break;

    case 3:
    for ($i=1; $i<=8; $i++) {
        $pirats[]=$_POST["pos".$i];
    }
    break;

    case 5:
    for ($i=1; $i<=13; $i++) {
        $pirats[]=$_POST["pos".$i];
    }
    break;
  }

  $map=array();
  $win=0;
  $extra_win=0;


  while (true) {
    $map=array();
    $win=0;
    $extra_win=0;
    $totalwin=0;

    for ($i=0; $i<10; $i++) {
       $map[my_rand(_MIN_POSITION, _MAX_POSITION)]=$wins[$i];
    }

    $pirats_win=0;
    foreach ($pirats as $pos) {
      if (isset($map[$pos])) {
         $win+=$map[$pos];
         $pirats_win++;
      }
    }

    if (isset($extra_wins[$pirats_win])) {
      $extra_win=$extra_wins[$pirats_win];
    }
    $totalwin=$win+$extra_win;

    if (bank_balance($game_configs['game_bank'])/_AMAROK_DELITEL/$_POST['betamount']>=$totalwin) {
       break;
    }
  }

  user_pay($_POST['betamount']);
  $profit=$bet/100;
  $profit=$profit*$game_configs['percent'];
  bank_add($game_configs['game_bank'], $bet-$profit);
  bank_add($game_configs['profit_bank'], $profit, true);

  if ($totalwin>0) {
    bank_pay($game_configs['game_bank'], $totalwin);
    user_add($totalwin);
  }

  write_stat ($_POST['betamount'], $totalwin);

  print_var("credit", user_balance());
  print_var("nb_coffres", count($map));
  $c=1;
  foreach ($map as $pos => $value) {
    print_var("coffre_value".$c, $value);
    print_var("coffre_pos".$c, $pos);
    $c++;
  }
  print_var("totalwin", $totalwin);

  print_var("error", "0");


} else {
  print_var("error", "2");
}

print_var("transfertok", "1");


