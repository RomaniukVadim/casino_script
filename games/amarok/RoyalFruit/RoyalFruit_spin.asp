<?php


define("_GAME_NAME", "RoyalFruit");

if (eregi("RoyalFruit_spin\.asp$", strtolower(__FILE__))===false) {
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
define("_AVERAGE_WIN", 100);
define("_AVERAGE_BET", 18);

//include("common.php");
include_once("../core/engine.php");


trace_str(__FILE__);
trace_var($_POST, "POST");
trace_var($_GET, "GET");

if (!isset($_SESSION['RoyalFruit_wheels'])) {
  print_var("t_alert2", "Internal Error, my darling.");
  print_var("error", "2");
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
$scatter_free_games=array(
    3 => 15,
    4 => 20,
    5 => 25
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

if ((isset($_SESSION['RoyalFruit_freegames'])) AND (($_SESSION['RoyalFruit_freegames']) AND ($_SESSION['RoyalFruit_freegames_times']>0))) {
  // И да. Я грешен, мне лениво править и накручивать лишние переменные, так что я эмулирую.
  $_POST['nb_lines']=$_SESSION['RoyalFruit_freegames_nb_lines'];
  $_POST['nb_lines']=$_SESSION['RoyalFruit_freegames_nb_lines'];
  $bet_coins=$_POST['nb_coins']*$_POST['nb_lines'];
  $bet=$bet_coins*$game_configs['coinsize'];
} else {
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
  $free_ok=false;

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



  if ((isset($_SESSION['RoyalFruit_freegames'])) AND (($_SESSION['RoyalFruit_freegames']==true) AND ($_SESSION['RoyalFruit_freegames_times']>0))) {
  	//$must_win=chance($game_configs['onfree_win_chance']);
	$must_win=chance(Game::$config['win']);
    $must_free_games=chance($game_configs['onfree_free_game_chance']);
    $full_bank=bank_balance($game_configs['free_game_bank']);
  	//$bank=bank_balance($game_configs['free_game_bank'])/$bank_delitel;
	$bank=Game::bankBalance()/$bank_delitel;
  	$win_coins*=$game_configs['onfree_win_multiplication'];
  } else {
    $must_win=chance($game_configs['win_chance']);
    $must_free_games=chance($game_configs['free_game_chance']);
    $bank=bank_balance($game_configs['game_bank'])/$bank_delitel;
    $full_bank=bank_balance($game_configs['game_bank']);
  }

  $winall=$win_coins*$game_configs['coinsize'];

  //if ($full_bank/(_AMAROK_DELITEL/(_AVERAGE_BET*$game_configs['coinsize']))>(_AVERAGE_BET*$game_configs['coinsize'])*_AVERAGE_WIN) {
      if ((!$must_win) AND (($winall==0) OR (($bet>$winall) AND ($winall<=$bank)))) {
  	    $game_ok=true;
      }

	  if (($must_win) AND (($winall<=$bank) AND ($winall>$bet))) {
	    $game_ok=true;
	  }

	  if (($must_free_games) AND (isset($scatter_free_games[$scatters]))) {
	    $free_ok=true;
	  }

	  if ((!$must_free_games) AND (!isset($scatter_free_games[$scatters]))) {
	    $free_ok=true;
	  }


 // } else {
     if ((!$must_win) AND (($winall==0) OR (($bet>$winall) AND ($winall<$bank/2)))) {
  	    $game_ok=true;
     }
     if ((!$must_free_games) AND (!isset($scatter_free_games[$scatters]))) {
	    $free_ok=true;
	 }
  //}

  if (($game_ok) AND ($free_ok)) {
	  	break;  // как бэ если результат нас не устроил то кружимся дальше - варриантов тонна)
  }
}



if ((isset($_SESSION['RoyalFruit_freegames'])) AND (($_SESSION['RoyalFruit_freegames']) AND ($_SESSION['RoyalFruit_freegames_times']>0))) {
  // Итак, у нас бесплатные игры
  if ($win_coins>0) {
    bank_pay($game_configs['free_game_bank'], $winall);
    user_add($winall);
  }
  write_stat (0, $winall, "bonus");
} else {
	if ($win_coins>=$bet_coins) {
	  user_pay($bet);
	  bank_add($game_configs['game_bank'], $bet);
	} elseif (($win_coins>0) AND ($win_coins<$bet_coins)) {
	  $bet_profit=$bet_coins-$win_coins;
	  user_pay($bet);
	  $profit=$bet_profit/100;
	  $free=$profit*$game_configs['free_percent'];
	  $profit=$profit*$game_configs['profit_percent'];
	  bank_add($game_configs['game_bank'], $bet-$profit-$free);
	  bank_add($game_configs['profit_bank'], $profit);
	  bank_add($game_configs['free_game_bank'], $free);
	} else {
	  user_pay($bet);
	  $profit=$bet/100;
	  $free=$profit*$game_configs['free_percent'];
	  $profit=$profit*$game_configs['profit_percent'];
	  bank_add($game_configs['game_bank'], $bet-$profit-$free);
	  bank_add($game_configs['profit_bank'], $profit);
	  bank_add($game_configs['free_game_bank'], $free);
	}
	if ($winall!=0) {
	    user_add($winall);
	    bank_pay($game_configs['game_bank'], $winall);
	}
	write_stat ($bet, $winall);
}


print_var("error", "0");

for ($i=1;$i<10;$i++) {
  if (isset($lines_wincoins[$i])) {
    print_var("line_win".$i, $lines_wincoins[$i]);
  } else {
    print_var("line_win".$i, "0");
  }
}

for ($i=1; $i<16; $i++) {
  if ((isset($active_wilds[$i])) AND ($active_wilds[$i])) {
    print_var("active_wild".$i, "1");
  } else {
    print_var("active_wild".$i, "0");
  }
}

foreach ($map as $position => $value) {
  $p=$position+1;
  print_var("symb".$p, $value);
}


print_var("betamount", $bet);
print_var("total_win", $winall);
print_var("total_coins_win", $win_coins);
print_var("credit", user_balance());
print_var("coinsize", $game_configs['coinsize']);

print_var("nb_coins", $_POST['nb_coins']);
print_var("nb_lines", $_POST['nb_lines']);

print_var("scatter_win", $scatter_wincoins);



if ((isset($scatter_free_games[$scatters])) AND ((!isset($_SESSION['RoyalFruit_freegames'])) OR ($_SESSION['RoyalFruit_freegames']==false))) {
  trace_str("");
  // Типа мы тока начали
  // Ща я буду зарабатывать все деньги мира, для любимой тигры!
  // Боже, как же меня прет
  $_SESSION['RoyalFruit_freegames']=true;
  $_SESSION['RoyalFruit_freegames_win_total']=0;
  $_SESSION['RoyalFruit_freegames_nb_coins']=$_POST['nb_coins'];
  $_SESSION['RoyalFruit_freegames_nb_lines']=$_POST['nb_lines'];
  $_SESSION['RoyalFruit_freegames_times']=$scatter_free_games[$scatters];
  $_SESSION['RoyalFruit_freegames_times_played']=0;

  print_var("total_win_free", $_SESSION['RoyalFruit_freegames_win_total']);

  print_var("mode_free_begin", "1");
  print_var("mode_free", "1");

  print_var("nb_gratuit_to_play", $_SESSION['RoyalFruit_freegames_times']);
  print_var("nb_gratuit_played", $_SESSION['RoyalFruit_freegames_times_played']);
} elseif ($_SESSION['RoyalFruit_freegames']) {
  // Продолжаем веселье
  if (isset($scatter_free_games[$scatters])) {
    $_SESSION['RoyalFruit_freegames_times']+=$scatter_free_games[$scatters];
  }

  if ($_SESSION['RoyalFruit_freegames_times']>0) {
    $_SESSION['RoyalFruit_freegames_win_total']+=$winall;
    $_SESSION['RoyalFruit_freegames_times']--;
    $_SESSION['RoyalFruit_freegames_times_played']++;

    print_var("total_win_free", $_SESSION['RoyalFruit_freegames_win_total']);

    if ($_SESSION['RoyalFruit_freegames_times']>0) {
      print_var("mode_free_begin", "0");
      print_var("mode_free", "1");
    } else {
      print_var("mode_free_begin", "0");
      print_var("mode_free", "0");
      $_SESSION['RoyalFruit_freegames']=false;
    }

    print_var("nb_gratuit_to_play", $_SESSION['RoyalFruit_freegames_times']);
    print_var("nb_gratuit_played", $_SESSION['RoyalFruit_freegames_times_played']);
  } else {
    $_SESSION['RoyalFruit_freegames']=false;
    print_var("total_win_free", $_SESSION['RoyalFruit_freegames_win_total']);
	print_var("mode_free_begin", "0");
    print_var("mode_free", "0");
    print_var("nb_gratuit_to_play", $_SESSION['RoyalFruit_freegames_times']);
    print_var("nb_gratuit_played", $_SESSION['RoyalFruit_freegames_times_played']);
    $_SESSION['RoyalFruit_freegames_win_total']=0;
    $_SESSION['RoyalFruit_freegames_times']=0;
    $_SESSION['RoyalFruit_freegames_times_played']=0;
    unset($_SESSION['RoyalFruit_freegames_nb_coins'], $_SESSION['RoyalFruit_freegames_nb_lines']);
  }
} else {
  print_var("total_win_free", "0");
  print_var("mode_free_begin", "0");
  print_var("mode_free", "0");
  print_var("nb_gratuit_to_play", "0");
  print_var("nb_gratuit_played", "0");
}

// Функции
function wheel_positions () {
  $result=array(mt_rand(1, _WHEEL_SIZE),mt_rand(1, _WHEEL_SIZE),mt_rand(1, _WHEEL_SIZE),mt_rand(1, _WHEEL_SIZE),mt_rand(1, _WHEEL_SIZE));
  return $result;
}

function render_map ($positions) {
  $result=array();
  foreach ($positions as $wheel => $position) {
    if ($position==1) {
      $result[]=$_SESSION['RoyalFruit_wheels'][$wheel+1][_WHEEL_SIZE];
      $result[]=$_SESSION['RoyalFruit_wheels'][$wheel+1][$position];
      $result[]=$_SESSION['RoyalFruit_wheels'][$wheel+1][$position+1];
    } elseif ($position==_WHEEL_SIZE) {
      $result[]=$_SESSION['RoyalFruit_wheels'][$wheel+1][$position-1];
      $result[]=$_SESSION['RoyalFruit_wheels'][$wheel+1][$position];
      $result[]=$_SESSION['RoyalFruit_wheels'][$wheel+1][1];
    } else {
      $result[]=$_SESSION['RoyalFruit_wheels'][$wheel+1][$position-1];
      $result[]=$_SESSION['RoyalFruit_wheels'][$wheel+1][$position];
      $result[]=$_SESSION['RoyalFruit_wheels'][$wheel+1][$position+1];
    }
  }
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




