<?php

$config=array();
$config['bets']=array('0' => 0.25, '1' => 0.50, '2' => 1.00, '3' => 5.00);
$config['wins']=array();
$config['wins'][3]=array(0=>0, 1=>0, 2=>5, 3=>18);
$config['wins'][4]=array(0=>0, 1=>0, 2=>2, 3=>9, 4=>40);
$config['wins'][5]=array(0=>0, 1=>0, 2=>1, 3=>4, 4=>22, 5=>100);
$config['wins'][6]=array(0=>0, 1=>0, 2=>1, 3=>2, 4=>8, 5=>40, 6=>200);
$config['wins'][7]=array(0=>0, 1=>0, 2=>0, 3=>1, 4=>5, 5=>40, 6=>120, 7=>2500);
$config['wins'][8]=array(0=>0, 1=>0, 2=>0, 3=>1, 4=>2, 5=>12, 6=>120, 7=>300, 8=>2500);
$config['wins'][9]=array(0=>0, 1=>0, 2=>0, 3=>1, 4=>2, 5=>4, 6=>40, 7=>150, 8=>500, 9=>2500);
$config['wins'][10]=array(0=>0, 1=>0, 2=>0, 3=>0, 4=>1, 5=>4, 6=>24, 7=>150, 8=>400, 9=>2500, 10=>10000);


function is_in_array ($a, $v) {
  $rezult=false;
  foreach ($a as $value) {
    if ($value==$v) {
       $rezult=true;
       break;
    }
  }

  return $rezult;
}

//¬озвращает максимальное значение из множества элементов распиханых в один "пр€мой" массив
function array_max ($a, $return_key=false) {
  $mv=null;
  $mk=null;
  foreach ($a as $k => $value) {
    if ($mv==null) {
      $mv=$value;
      $mk=$k;
    } elseif ($value>$mv) {
      $mv=$value;
      $mk=$k;
    }
  }

  if ($return_key) {
    return $mk;
  } else {
    return $mv;
  }
}

//¬озвращает минимальное значение из множества элементов распиханых в один "пр€мой" массив
function array_min ($a, $return_key=false) {
  $mv=null;
  $mk=null;
  foreach ($a as $k => $value) {
    if ($mv==null) {
      $mv=$value;
      $mk=$k;
    } elseif ($value<$mv) {
      $mv=$value;
      $mk=$k;
    }
  }

  if ($return_key) {
    return $mk;
  } else {
    return $mv;
  }
}

function array_mathfind ($a, $from, $to=null, $offset=0, $from_end=false) {
  if ($from_and) {
    $a=array_reverse($a, true);
  }

  foreach ($a as $k => $value) {
    if ($offset==0) {
      if ((is_int($value)) OR (is_float($value))) {
        if (($from<=$value) AND (($to>=$value) OR ($to===null))) {
          return $k;
        }
      }
    } else {
      $offset--;
    }
  }
  return false;
}

function array_myshuffle($a) {
  $b=range(0, count($a)-1);
  shuffle($b);
  $rezult=array();
  foreach ($b as $id) {
    $rezult[$id]=$a[$id];
  }
  return $rezult;
}

function generate_randmap() {
  $rezult=array();
  for ($i=0; $i<20; $i++) {
  	 mt_srand();
  	 $a=mt_rand(1, 40);
  	 while(is_in_array ($rezult, $a)) {
  	 	mt_srand();
  	 	$a=mt_rand(1, 40);
  	 }
  	 $rezult[]=$a;
  	 //$rezult[]=mt_rand(1, 40);
  }
  return $rezult;
}

function summ_map ($map, $numbers) {     global $config;
  $c=count($numbers);
  $i=0;
  foreach ($numbers as $number) {  	if (is_in_array ($map, $number)) {  		$i++;
  	}
  }
  if (isset($config['wins'][$c][$i])) {  	return $config['wins'][$c][$i];
  } else {  	return null;
  }
}

define("_GAME_NAME", "LottoKeno");


include("common.php");

if (!is_user()) {
  header("Location: /");
  die();
}

trace_str(__FILE__);
trace_var($_POST, "POST");
trace_var($_GET, "GET");

switch ($_POST['ACTION']) {
   case "ENTER":
   print_var("RESULT", "OK");
   print_var("BALANCE", user_balance());
   break;

   case "EXIT":
   //echo "&RESULT=OK&BALANCE=".cash_balance($l);
   break;

   case "MAKEBET":
   $allbet=$config['bets'][$_POST['BET']];
   $numbers=explode("|", $_POST['NUMBERS']);
   if ($allbet<=0) {   	 print_var("RESULT", "BAD_BET");
   	 die();
   }
   if ($allbet>user_balance()) {
     print_var("RESULT", "LOW_BALANCE");   	 die();
   }
   if (count($numbers)<3) {
     print_var("RESULT", "NUMBERS_ISNOTSET");
     die();   }

   while (true) {
     $map=generate_randmap();
     $win=summ_map ($map, $numbers);
     if (($win!==null) AND ($win*$allbet<bank_balance ($game_configs['game_bank']))) {     	break;
     }
   }
   $allwin=$win*$allbet;

   if ($allwin==0) {
     $profit=$allbet/100;
     $profit=$profit*$game_configs['profit_percent'];
     user_pay($allbet);
     bank_add($game_configs['profit_bank'], $profit, true);
     bank_add($game_configs['game_bank'], $allbet-$profit);
   } else {
     user_pay($allbet);
     bank_add($game_configs['game_bank'], $allbet);
     bank_pay($game_configs['game_bank'], $allwin);
     user_add($allwin);
   }

   write_stat ($allbet, $allwin);

   if ($allwin>0) {
     print_var("RESULT", "OK");
     print_var("BALANCE", user_balance());
     print_var("PAYOUT", $allwin);
     print_var("NUMBERS", implode("|", $map));
   } else {
   	 print_var("RESULT", "OK");
     print_var("BALANCE", user_balance());
     print_var("PAYOUT", "0");
     print_var("NUMBERS", implode("|", $map));
   }
   break;

   case "MOVE":
   print_var("RESULT", "NOT_IMPL_MOVE");
   print_var("BALANCE", user_balance());
   break;
}



?>