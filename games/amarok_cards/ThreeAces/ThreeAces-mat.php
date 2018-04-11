<?

define("_GAME_NAME", "ThreeAces");

include("common.php");

/*if (!is_user()) {
  header("Location: /");
  die();
}*/

trace_str(__FILE__);
trace_var($_POST, "POST");
trace_var($_GET, "GET");

switch ($_GET['mon']) {
  default:
  case 0:
  print_var("login", $_SESSION['login']);
  print_var("cash", user_balance());
  break;

  case 1:
  $bet=$_POST['bet'];
  if ($bet=="" && $bet<>0.2 && $bet<>1 && $bet<>5 && $bet<>10 && $bet<>50){ $bet=0.20;}
  if (user_balance()<$bet) {
    print_var("login", $_SESSION['login']);
    print_var("cash", user_balance());
    die();
  }

  $map=array(0,0,0);
  $win=0;
  $must_win=chance($game_configs['win_chance']);
  while (true) {
    $map=array(0,0,0);
    $win=0;

    srand ((double) microtime()*1000000);
    $mind=rand(1,6);
    if ($mind==1){ $map=array(2,3,1);}
    if ($mind==2){ $map=array(3,2,1);}
    if ($mind==3){ $map=array(2,1,3);}
    if ($mind==4){ $map=array(3,1,2);}
    if ($mind==5){ $map=array(1,2,3);}
    if ($mind==6){ $map=array(1,3,2);}

    if ($map[intval($_POST['karta'])-1]==1) {
      $win=$bet*2;
    }



    if (($must_win) AND ($win>0)) {
      if (bank_balance($game_configs['game_bank'])/_AMAROK_DELITEL/$bet>=$win) {
        break;
      } else {
        $must_win=chance($game_configs['win_chance']);
      }
    }

    if ((!$must_win) AND ($win==0)) {
      break;
    }
  }

  if ($win>0) {
    user_pay($bet);
    bank_add($game_configs['game_bank'], $bet);
    user_add($win);
    bank_pay($game_configs['game_bank'], $win);
  } else {
    $profit=$bet/100;
    $profit=$profit*$game_configs['profit_percent'];
    var_dump(user_pay($bet));
    bank_add($game_configs['game_bank'], $bet-$profit);
    bank_add($game_configs['profit_bank'], $profit, true);
  }
  write_stat ($bet, $win);

  print_var("login", $_SESSION['login']);
  print_var("cash", user_balance());
  print_var("kart1", $map[0]);
  print_var("kart2", $map[1]);
  print_var("kart3", $map[2]);
  print_var("win", $win);
  break;
}


die();

