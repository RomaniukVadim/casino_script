<?php


define("_GAME_NAME", "SergentPepper");

if (eregi("sergent-pepper_spin\.asp$", strtolower(__FILE__))===false) {
  print_var("t_alert2", "Fuck you self, my darling!");
  print_var("error", "2");
  die();
}

header("Expires: ".gmdate("D, d M Y H:i:s")."GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

define("_MIN_ICON", 1);
define("_MAX_ICON", 12);

define("_AVERAGE_WIN", 100);
define("_AVERAGE_BET", 18);
define("_AVERAGE_BONUS_DICE_WIN", 50);

//include("common.php");
include_once("../core/engine.php");


trace_str(__FILE__);
trace_var($_POST, "POST");
trace_var($_GET, "GET");

if (!isset($_SESSION['SergentPepper_wheels'])) {
  print_var("t_alert1", "Internal Error, my darling.");
  print_var("error", "1");
  die();
}

$lines_config=array(
    array(1,4,7,10,13),
    array(0,3,6,9,12),
    array(2,5,8,11,14),
    array(0,4,8,10,12),
    array(2,4,6,10,14),
    array(0,3,7,9,12),
    array(2,5,7,11,14),
    array(1,3,6,9,13),
    array(1,5,8,11,13)
);

$wildchar=1;
$on_line_wins_config=array(
    1 => array(
      2 => 15,
      3 => 100,
      4 => 500,
      5 => 2500
    ),
    2 => array(
      2 => 2,
      3 => 20,
      4 => 100,
      5 => 800
    ),
    3 => array(
      2 => 2,
      3 => 20,
      4 => 100,
      5 => 400
    ),
    4 => array(
      3 => 15,
      4 => 50,
      5 => 100
    ),
    5 => array(
      3 => 15,
      4 => 50,
      5 => 100
    ),
    6 => array(
      3 => 10,
      4 => 25,
      5 => 100
    ),
    7 => array(
      3 => 5,
      4 => 20,
      5 => 100
    ),
    8 => array(
      3 => 5,
      4 => 20,
      5 => 100
    ),
    9 => array(
      3 => 5,
      4 => 20,
      5 => 100
    ),
    10 => array(
      2 => 2,
      3 => 5,
      4 => 20,
      5 => 100
    ),
    11 => array(
      2 => 2,
      3 => 5,
      4 => 20,
      5 => 100
    ),

);

$scatter_char=12;
$scatter_dices=array(
    3 => 3,
    4 => 4,
    5 => 5
);
$scatter_wins=array(
       2 => 2,
       3 => 5,
       4 => 10,
       5 => 100
);

if (!is_user()) {
  print_var("error", "2");
  die();
}

if ((!isset($_POST['nb_lines'])) OR (($_POST['nb_lines']<1) OR ($_POST['nb_lines']>9))) {
  print_var("error", "1");
  die();
}
if ((!isset($_POST['nb_coins'])) OR (($_POST['nb_coins']<1) OR ($_POST['nb_coins']>10))) {
  print_var("error", "1");
  die();
}

$bet_coins=$_POST['nb_coins']*$_POST['nb_lines'];
$bet=$bet_coins*$game_configs['coinsize'];
if (user_balance()<$bet) {
  print_var("error", "1");
  die();
}

$bank_delitel=_AMAROK_DELITEL/$bet;
trace_str("DELITEL: ".$bank_delitel);

$wheels=array();
$lines_wincoins=array();
$lines_symbwin=array();
$active_wilds=array();
$scatter_wincoins=0;
$win_coins=0;
$winall=0;

while (true) {
  $wheels=wheel_positions();
  $map=render_map ($wheels);
  $lines_wincoins=array();
  $lines_symbwin=array();
  $active_wilds=array();
  $scatter_wincoins=0;
  $win_coins=0;
  $winall=0;

  $game_ok=false;
  $bonus_ok=false;

  // считаем выигрыши по линиям
  for ($i=1; $i<$_POST['nb_lines']+1; $i++) {
      $line=render_line($map, $i);
      $lines_symbwin[$i]="ppppp";

      $c=0;
	  $char=0;
	  $wilds=0;
	  $doubled=false;
	  $in_combo=true;
	  foreach ($line as $current) {
	    if ($c==0) {
	      $char=$current;
	      $c++;
	      if ($current==$wildchar) {
	        $wilds++;
	      }
	    } elseif ($in_combo) {

		    if ($char==$wildchar) {
		      if ($current==$wildchar) {
		        $wilds++;
		        $c++;
		      } else {
		        $char=$current;
		        $c++;
		        $doubled=true;
		      }
		    } elseif ($char==$current) {
		      $c++;
		    } elseif ($current==$wildchar) {
		      $c++;
		      $doubled=true;
		    } else {
		      $in_combo=false;
		    }
	    }

	  }

	  if ($wilds>0) {
	    if ($on_line_wins_config[$wildchar][$wilds]) {
	      $wild=$on_line_wins_config[$wildchar][$wilds];
	    } else {
	      $wild=0;
	    }

	    if (isset($on_line_wins_config[$char][$c])) {
	      $char=$on_line_wins_config[$char][$c]*$game_configs['wildchar_win_multiplication'];  // потому что присутствие вилда удваевает выигрыш с линии

	    } else {
	      $char=0;
	    }

	    if ($wild>$char) {
	      $lines_wincoins[$i]=$_POST['nb_coins']*$wild;
	      $lines_symbwin[$i]="";
	      for ($x=1; $x<6; $x++) {
            if ($x<=$wilds) {
              $lines_symbwin[$i].="x";
              if ($line[$x-1]==$wildchar) {
                $map_pos=$lines_config[$i-1][$x-1];
                $active_wilds[$map_pos+1]=true;
              }
            } else {
              $lines_symbwin[$i].="p";
            }
	      }
	    } elseif ($char>$wild) {
	      $lines_wincoins[$i]=$_POST['nb_coins']*$char;
	      $lines_symbwin[$i]="";
	      for ($x=1; $x<6; $x++) {
            if ($x<=$c) {
              $lines_symbwin[$i].="x";
              if ($line[$x-1]==$wildchar) {
                $map_pos=$lines_config[$i-1][$x-1];
                $active_wilds[$map_pos+1]=true;
              }
            } else {
              $lines_symbwin[$i].="p";
            }
	      }
	    } elseif ($char==$wild) {
	      $lines_wincoins[$i]=$_POST['nb_coins']*$char;
	      $lines_symbwin[$i]="";
	      for ($x=1; $x<6; $x++) {
            if ($x<=$c) {
              $lines_symbwin[$i].="x";
              if ($line[$x-1]==$wildchar) {
                $map_pos=$lines_config[$i-1][$x-1];
                $active_wilds[$map_pos+1]=true;
              }
            } else {
              $lines_symbwin[$i].="p";
            }
	      }
	    } else {
	      $lines_wincoins[$i]=0;
	      $lines_symbwin[$i]="ppppp";
	    }
	  } else {
	    if (isset($on_line_wins_config[$char][$c])) {
	      if ($doubled) {
	        $lines_wincoins[$i]=$_POST['nb_coins']*$on_line_wins_config[$char][$c]*$game_configs['wildchar_win_multiplication'];
	      } else {
	        $lines_wincoins[$i]=$_POST['nb_coins']*$on_line_wins_config[$char][$c];
	      }
	      $lines_symbwin[$i]="";
	      for ($x=1; $x<6; $x++) {
            if ($x<=$c) {
              $lines_symbwin[$i].="x";
              if ($line[$x-1]==$wildchar) {
                $map_pos=$lines_config[$i-1][$x-1];
                $active_wilds[$map_pos+1]=true;
              }
            } else {
              $lines_symbwin[$i].="p";
            }
	      }
	    } else {
          $lines_wincoins[$i]=0;
          $lines_symbwin[$i]="ppppp";
	    }
	  }
  }

  // считаем скатеры
  $scatters=0;
  foreach ($map as $char) {
    if ($char==$scatter_char) {
      $scatters++;
    }
  }
  if ($scatters>5) {
    $scatters=5;
  }
  if (isset($scatter_wins[$scatters])) {
    $scatter_wincoins=$scatter_wins[$scatters]*$bet_coins;
  }



  $win_coins=$scatter_wincoins;
  foreach ($lines_wincoins as $line_wincoins) {
    $win_coins+=$line_wincoins;
  }

  // Считаем надо оно нам или нет



  //$must_win=chance($game_configs['win_chance']);
  $must_win=chance(Game::$config['win']);
  $must_bonus=chance($game_configs['bonus_chance']);
  //$bank=bank_balance($game_configs['game_bank'])/$bank_delitel;
  $bank=Game::bankBalance();
  $full_bank=bank_balance($game_configs['free_game_bank']);


  $winall=$win_coins*$game_configs['coinsize'];

  //if ($full_bank/(_AMAROK_DELITEL/(_AVERAGE_BET*$game_configs['coinsize']))>(_AVERAGE_BET*$game_configs['coinsize'])*_AVERAGE_WIN) {
	  if ((!$must_win) AND (($winall==0) OR (($bet>$winall) AND ($winall<=$bank)))) {
  	    $game_ok=true;
      }

	  if (($must_win) AND (($winall<=$bank) AND ($winall>$bet))) {
	    $game_ok=true;
	  }

	  if (($must_bonus) AND (isset($scatter_dices[$scatters]))) {
	    $possible_bonus_win=_AVERAGE_BONUS_DICE_WIN*$scatter_dices[$scatters];
	    $possible_bonus_win*=$_POST['nb_coins']*$_POST['nb_lines'];
	    $possible_bonus_win*=$game_configs['coinsize'];
	    $bonus_bank=bank_balance($game_configs['bonus_bank'])/$bank_delitel;
	    if ($possible_bonus_win<=$bonus_bank) {
	      $bonus_ok=true;
	    }
	  }

	  if ((!$must_bonus) AND (!isset($scatter_dices[$scatters]))) {
	    $bonus_ok=true;
	  }
  //} else {
      if ((!$must_bonus) AND (!isset($scatter_dices[$scatters]))) {
	    $bonus_ok=true;
	  }

      if ((!$must_win) AND (($winall==0) OR (($bet>$winall) AND ($winall<=$bank/2)))) {
  	    $game_ok=true;
      }
//  }

  if (($game_ok) AND ($bonus_ok)) {
  	break;  // как бэ если результат нас не устроил то кружимся дальше - варриантов тонна)
  }
}


if ($win_coins>=$bet_coins) {
  user_pay($bet);
  bank_add($game_configs['game_bank'], $bet);
} elseif (($win_coins>0) AND ($win_coins<$bet_coins)) {
  $bet_profit=$bet_coins-$win_coins;
  user_pay($bet);
  $profit=$bet_profit/100;
  $bonus=$profit*$game_configs['bonus_percent'];
  $profit=$profit*$game_configs['profit_percent'];
  bank_add($game_configs['game_bank'], $bet-$profit-$bonus);
  bank_add($game_configs['profit_bank'], $profit);
  bank_add($game_configs['bonus_bank'], $bonus);
} else {
  user_pay($bet);
  $profit=$bet/100;
  $bonus=$profit*$game_configs['bonus_percent'];
  $profit=$profit*$game_configs['profit_percent'];
  bank_add($game_configs['game_bank'], $bet-$profit-$bonus);
  bank_add($game_configs['profit_bank'], $profit);
  bank_add($game_configs['bonus_bank'], $bonus);
}
if ($winall!=0) {
    user_add($winall);
    bank_pay($game_configs['game_bank'], $winall);
}
write_stat ($bet, $winall);



print_var("error", "0");
print_var("betamount", $bet);
print_var("money_win_total", $winall);
print_var("nb_coins_win_total", $win_coins);
print_var("credit", user_balance());
print_var("coinsize", $game_configs['coinsize']);
print_var("nb_coins", $_POST['nb_coins']);
print_var("nb_lines", $_POST['nb_lines']);
print_var("scatter_win", $scatter_wincoins);

for ($i=1;$i<10;$i++) {
  if (isset($lines_wincoins[$i])) {
    print_var("line_".$i."_wincoins", $lines_wincoins[$i]);
  } else {
    print_var("line_".$i."_wincoins", "0");
  }
}
print_var("wheel1Pos", $wheels[0]);
print_var("wheel2Pos", $wheels[1]);
print_var("wheel3Pos", $wheels[2]);
print_var("wheel4Pos", $wheels[3]);
print_var("wheel5Pos", $wheels[4]);

$wilds_on_screen=false;
for ($i=1; $i<16; $i++) {
  if ((isset($active_wilds[$i])) AND ($active_wilds[$i])) {
    print_var("active_wild".$i, "1");
    $wilds_on_screen=true;
  } else {
    print_var("active_wild".$i, "0");
    $wilds_on_screen=false;
  }
}
for ($i=1;$i>10;$i++) {
  if (isset($lines_symbwin[$i])) {
    print_var("line_9_nbsymbwin", $lines_symbwin[$i]);
  } else {
    print_var("line_9_nbsymbwin", "ppppp");
  }
}

if (isset($scatter_dices[$scatters])) {
  print_var("bonus_game_ok", "1");
  print_var("nb_dice_to_play", $scatter_dices[$scatters]);

  $_SESSION['AMAROK_BONUS_GAME']=true;
  $_SESSION['AMAROK_BONUS_NB_WIN_COINS']=0;
  $_SESSION['AMAROK_BONUS_NB_DICES']=$scatter_dices[$scatters];
  $_SESSION['AMAROK_BONUS_NB_DICES_PLAYED']=0;
  $_SESSION['AMAROK_BONUS_NB_POSITION']=0;
  $_SESSION['AMAROK_BONUS_NB_COINS']=$_POST['nb_coins'];
  $_SESSION['AMAROK_BONUS_NB_LINES']=$_POST['nb_lines'];
} else {
  print_var("bonus_game_ok", "0");
  print_var("nb_dice_to_play", "0");

  // На всякий случай
  unset($_SESSION['AMAROK_BONUS_GAME'],
        $_SESSION['AMAROK_BONUS_NB_WIN_COINS'],
        $_SESSION['AMAROK_BONUS_NB_DICES'],
        $_SESSION['AMAROK_BONUS_NB_DICES_PLAYED'],
        $_SESSION['AMAROK_BONUS_NB_POSITION'],
        $_SESSION['AMAROK_BONUS_NB_COINS'],
        $_SESSION['AMAROK_BONUS_NB_LINES']);
}

if (($winall>0) AND ((!$wilds_on_screen) AND ((!isset($_SESSION['AMAROK_BONUS_GAME'])) OR (!$_SESSION['AMAROK_BONUS_GAME'])))) {
  $_SESSION['ALLOW_DOUBLE']=true;
  $_SESSION['DOUBLE_GAME_WIN']=$winall;
  print_var("double_up_ok", "1");
} else {
  unset($_SESSION['ALLOW_DOUBLE']);
  print_var("double_up_ok", "0");
}



// Функции
function wheel_positions () {
  $result=array(
  	  mt_rand(1, $_SESSION['SergentPepper_wheel_1_size']),  // Первый барабан
  	  mt_rand(1, $_SESSION['SergentPepper_wheel_2_size']),
  	  mt_rand(1, $_SESSION['SergentPepper_wheel_3_size']),
  	  mt_rand(1, $_SESSION['SergentPepper_wheel_4_size']),
  	  mt_rand(1, $_SESSION['SergentPepper_wheel_5_size'])   // Пятый барабан
  );
  trace_var($result, "POSITIONS");
  return $result;
}

function render_map ($positions) {
  $result=array();
  foreach ($positions as $wheel => $position) {
    $real_wheel=$wheel+1;
    if ($position==1) {
      $result[]=$_SESSION['SergentPepper_wheels'][$real_wheel][$_SESSION["SergentPepper_wheel_".$real_wheel."_size"]];
      $result[]=$_SESSION['SergentPepper_wheels'][$real_wheel][$position];
      $result[]=$_SESSION['SergentPepper_wheels'][$real_wheel][$position+1];
    } elseif ($position==$_SESSION["SergentPepper_wheel_".$real_wheel."_size"]) {
      $result[]=$_SESSION['SergentPepper_wheels'][$real_wheel][$position-1];
      $result[]=$_SESSION['SergentPepper_wheels'][$real_wheel][$position];
      $result[]=$_SESSION['SergentPepper_wheels'][$real_wheel][1];
    } else {
      $result[]=$_SESSION['SergentPepper_wheels'][$real_wheel][$position-1];
      $result[]=$_SESSION['SergentPepper_wheels'][$real_wheel][$position];
      $result[]=$_SESSION['SergentPepper_wheels'][$real_wheel][$position+1];
    }
  }

  trace_var($result, "MAP");
  return $result;
}

function render_line ($map, $line) {
     global $lines_config;
  $result=array();
  foreach ($lines_config[$line-1] as $index) {
    $result[]=$map[$index];
  }
  return $result;
}




