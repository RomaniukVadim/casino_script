<?php

define("_GAME_NAME", "JacksOrBetter");

include("common.php");

if (!is_user()) {
  header("Location: /");
  die();
}

trace_str(__FILE__);
trace_var($_POST, "POST");
trace_var($_GET, "GET");

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

//Возвращает максимальное значение из множества элементов распиханых в один "прямой" массив
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

//Возвращает минимальное значение из множества элементов распиханых в один "прямой" массив
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

function array_randelem($arr) {
  $a=array();
  $i=0;
  foreach ($arr as $v) {
    $a[$i]=$v;
    $i++;
  }
  return $a[mt_rand(0, count($a)-1)];
}


$config=array();
$config['bets']=array('0' => 0.05, '1' => 0.25, '2' => 1.00, '3' => 5.00);

//Комбинации карт
$config['combos']=array();
$config['combos']['royal_flush']=array('payout_type' => 8, 'payout' => 250);
$config['combos']['straight_flush']=array('payout_type' => 7, 'payout' => 50);
$config['combos']['four_of_kind']=array('payout_type' => 6, 'payout' => 20);
$config['combos']['full_house']=array('payout_type' => 5, 'payout' => 7);
$config['combos']['flush']=array('payout_type' => 4, 'payout' => 5);
$config['combos']['straight']=array('payout_type' => 3, 'payout' => 4);
$config['combos']['three_of_kind']=array('payout_type' => 2, 'payout' => 3);
$config['combos']['two_pairs']=array('payout_type' => 1, 'payout' => 2);
$config['combos']['jacks_or_better']=array('payout_type' => 0, 'payout' => 1);

$config['cardsmap']=array();

//Червы
$config['cardsmap'][0]=array('type' => "heart", 'color' => "red", 'weight' => 1);
$config['cardsmap'][1]=array('type' => "heart", 'color' => "red", 'weight' => 2);
$config['cardsmap'][2]=array('type' => "heart", 'color' => "red", 'weight' => 3);
$config['cardsmap'][3]=array('type' => "heart", 'color' => "red", 'weight' => 4);
$config['cardsmap'][4]=array('type' => "heart", 'color' => "red", 'weight' => 5);
$config['cardsmap'][5]=array('type' => "heart", 'color' => "red", 'weight' => 6);
$config['cardsmap'][6]=array('type' => "heart", 'color' => "red", 'weight' => 7);
$config['cardsmap'][7]=array('type' => "heart", 'color' => "red", 'weight' => 8);
$config['cardsmap'][8]=array('type' => "heart", 'color' => "red", 'weight' => 9);
$config['cardsmap'][9]=array('type' => "heart", 'color' => "red", 'weight' => 10);
$config['cardsmap'][10]=array('type' => "heart", 'color' => "red", 'weight' => 11);
$config['cardsmap'][11]=array('type' => "heart", 'color' => "red", 'weight' => 12);
$config['cardsmap'][12]=array('type' => "heart", 'color' => "red", 'weight' => 13);

//Буби
$config['cardsmap'][13]=array('type' => "box", 'color' => "red", 'weight' => 1);
$config['cardsmap'][14]=array('type' => "box", 'color' => "red", 'weight' => 2);
$config['cardsmap'][15]=array('type' => "box", 'color' => "red", 'weight' => 3);
$config['cardsmap'][16]=array('type' => "box", 'color' => "red", 'weight' => 4);
$config['cardsmap'][17]=array('type' => "box", 'color' => "red", 'weight' => 5);
$config['cardsmap'][18]=array('type' => "box", 'color' => "red", 'weight' => 6);
$config['cardsmap'][19]=array('type' => "box", 'color' => "red", 'weight' => 7);
$config['cardsmap'][20]=array('type' => "box", 'color' => "red", 'weight' => 8);
$config['cardsmap'][21]=array('type' => "box", 'color' => "red", 'weight' => 9);
$config['cardsmap'][22]=array('type' => "box", 'color' => "red", 'weight' => 10);
$config['cardsmap'][23]=array('type' => "box", 'color' => "red", 'weight' => 11);
$config['cardsmap'][24]=array('type' => "box", 'color' => "red", 'weight' => 12);
$config['cardsmap'][25]=array('type' => "box", 'color' => "red", 'weight' => 13);

//Крести
$config['cardsmap'][26]=array('type' => "cross", 'color' => "black", 'weight' => 1);
$config['cardsmap'][27]=array('type' => "cross", 'color' => "black", 'weight' => 2);
$config['cardsmap'][28]=array('type' => "cross", 'color' => "black", 'weight' => 3);
$config['cardsmap'][29]=array('type' => "cross", 'color' => "black", 'weight' => 4);
$config['cardsmap'][30]=array('type' => "cross", 'color' => "black", 'weight' => 5);
$config['cardsmap'][31]=array('type' => "cross", 'color' => "black", 'weight' => 6);
$config['cardsmap'][32]=array('type' => "cross", 'color' => "black", 'weight' => 7);
$config['cardsmap'][33]=array('type' => "cross", 'color' => "black", 'weight' => 8);
$config['cardsmap'][34]=array('type' => "cross", 'color' => "black", 'weight' => 9);
$config['cardsmap'][35]=array('type' => "cross", 'color' => "black", 'weight' => 10);
$config['cardsmap'][36]=array('type' => "cross", 'color' => "black", 'weight' => 11);
$config['cardsmap'][37]=array('type' => "cross", 'color' => "black", 'weight' => 12);
$config['cardsmap'][38]=array('type' => "cross", 'color' => "black", 'weight' => 13);

//Пики
$config['cardsmap'][39]=array('type' => "bheart", 'color' => "black", 'weight' => 1);
$config['cardsmap'][40]=array('type' => "bheart", 'color' => "black", 'weight' => 2);
$config['cardsmap'][41]=array('type' => "bheart", 'color' => "black", 'weight' => 3);
$config['cardsmap'][42]=array('type' => "bheart", 'color' => "black", 'weight' => 4);
$config['cardsmap'][43]=array('type' => "bheart", 'color' => "black", 'weight' => 5);
$config['cardsmap'][44]=array('type' => "bheart", 'color' => "black", 'weight' => 6);
$config['cardsmap'][45]=array('type' => "bheart", 'color' => "black", 'weight' => 7);
$config['cardsmap'][46]=array('type' => "bheart", 'color' => "black", 'weight' => 8);
$config['cardsmap'][47]=array('type' => "bheart", 'color' => "black", 'weight' => 9);
$config['cardsmap'][48]=array('type' => "bheart", 'color' => "black", 'weight' => 10);
$config['cardsmap'][49]=array('type' => "bheart", 'color' => "black", 'weight' => 11);
$config['cardsmap'][50]=array('type' => "bheart", 'color' => "black", 'weight' => 12);
$config['cardsmap'][51]=array('type' => "bheart", 'color' => "black", 'weight' => 13);

//Джокер
//$config['cardsmap'][53]=array('type' => "joker", 'color' => false, 'weight' => 14);


function make_map () {
     global $config;
  $result=array();
  $i=0;
  foreach ($config['cardsmap'] as $k => $v) {
    $result[$i]=$k;
    $i++;
  }
  return $result;
}

function new_card ($t=true) {
     global $_SESSION;
  mt_srand();
  $id=mt_rand(0, count($_SESSION['JacksOrBetter_cardsmap'])-1);
  $result=$_SESSION['JacksOrBetter_cardsmap'][$id];
  if ($t) {
   unset($_SESSION['JacksOrBetter_cardsmap'][$id]);
   $cm=array();
   $i=0;
   foreach ($_SESSION['JacksOrBetter_cardsmap'] as $v) {
    $cm[$i]=$v;
    $i++;
   }
   $_SESSION['JacksOrBetter_cardsmap']=$cm;
  }
  return $result;
}

//Фции определения комбинации.

//Роял флеш
function is_royal_flash($cards) {
     global $config;
  $type="";
  $prev=false;

  foreach ($cards as $k => $v) {
    if ($prev===false) {
      switch ($config['cardsmap'][$v]['weight']) {
         case 1:   //Туз
         case 10:  //Десятка
         case 13:  //Король
         case 12:  //Дама
         case 11:  //Валет
         $type=$config['cardsmap'][$v]['type'];
         $prev=true;
         break;

         default:
         return false;
         break;
      }
    } elseif ($config['cardsmap'][$v]['type']==$type) {
      switch ($config['cardsmap'][$v]['weight']) {
         case 1:
         case 10:
         case 13:
         case 12:
         case 11:
         $type=$config['cardsmap'][$v]['type'];
         $prev=true;
         break;

         default:
         return false;
         break;
      }
    } else {
      return false;
    }
  }
  return true;
}

//Джокер роял флеш
function is_joker_royal_flash($cards) {
     global $config;
  $type="";
  $prev=false;

  foreach ($cards as $k => $v) {
    if ($prev===false) {
      switch ($config['cardsmap'][$v]['weight']) {
         case 1:   //Туз
         case 10:  //Десятка
         case 13:  //Король
         case 12:  //Дама
         case 11:  //Валет
         case 14:  //Джокер
         $type=$config['cardsmap'][$v]['type'];
         $prev=true;
         break;

         default:
         return false;
         break;
      }
    } elseif ($config['cardsmap'][$v]['type']==$type) {
      switch ($config['cardsmap'][$v]['weight']) {
         case 1:
         case 10:
         case 13:
         case 12:
         case 11:
         case 14:
         $type=$config['cardsmap'][$v]['type'];
         $prev=true;
         break;

         default:
         return false;
         break;
      }
    } else {
      return false;
    }
  }
  return true;
}

//Пятёрка
function is_five_of_a_kind($cards) {
     global $config;
  $groups=cards_group_count($cards);
  foreach ($groups as $count) {
     if (($count==4) AND ($groups[14]==1)) {
       return true;
     }
  }
  return false;
}


//Стрит флеш.
function is_straight_flush ($cards) {
     global $config;
  $cards=cards_natsort($cards);
  $prev=false;
  $type="";
  $joker=false;
  foreach ($cards as $card) {
    if ($prev===false) {
      $prev=$config['cardsmap'][$card]['weight'];
      $type=$config['cardsmap'][$card]['type'];

    } else {
      if (($type==$config['cardsmap'][$card]['type']) AND ($prev+1==$config['cardsmap'][$card]['weight'])) {
        $prev=$config['cardsmap'][$card]['weight'];
      } elseif ($config['cardsmap'][$card]['weight']==14) {
        $joker=true;
      } else {
        return false;
      }
    }
  }

  return true;
}

//Флеш
function is_flush ($cards) {
     global $config;
  $groups=cards_group_count($cards, "type");
  foreach ($groups as $count) {
     if (($count==4) AND ($groups['joker']==1)) {
       return true;
     } elseif ($count==5) {
       return true;
     }
  }
  return false;
}

//Стрит
function is_straight ($cards) {
     global $config;
  $cards=cards_natsort($cards);
  $prev=false;
  $joker=false;
  foreach ($cards as $card) {
    if ($prev===false) {
     if ($config['cardsmap'][$card]['weight']!=14) {
      $prev=$config['cardsmap'][$card]['weight'];
     }
    } else {
      if ($prev+1==$config['cardsmap'][$card]['weight']) {
        $prev=$config['cardsmap'][$card]['weight'];
      } elseif ($config['cardsmap'][$card]['weight']==14) {
        $joker=true;
      } else {
        return false;
      }
    }
  }

  return true;
}

//Каре
function is_four_of_kind ($cards) {
     global $config;
  $groups=cards_group_count($cards);
  foreach ($groups as $count) {
     if (($count==3) AND ($groups[14]==1)) {
       return true;
     } elseif ($count==4) {
       return true;
     }
  }
  return false;
}

//фул хаус
function is_full_house ($cards) {
     global $config;
  $group=cards_group_count($cards, "weight");
  if (count($group)==2) {
    return true;
  } elseif (count($group)==3) {
    if (isset($group[14])) {
      return true;
    } else {
      return false;
    }
  } else {
    return false;
  }
}

//Тройка
function is_three_of_kind ($cards) {
     global $config;

  $groups=cards_group_count($cards);
  foreach ($groups as $count) {
     if (($count==2) AND ($groups[14]==1)) {
       return true;
     } elseif ($count==3) {
       return true;
     }
  }
  return false;
}

//Две пары - а надо пара выше валета!!!!!!!!!!!!!!!!!
function is_two_pairs ($cards) {
     global $config;
  $group=cards_group_count($cards, "weight");
  $pairs=0;

  foreach ($group as $count) {
     if ($count==2) {
       $pairs++;
     }
  }

  if ($pairs==2) {
    return true;
  } else {
    return false;
  }
}

//Короли или выше
function is_kings_or_better ($cards) {
     global $config;
  $cards=cards_natsort($cards);
  $king=0;
  $one=0;
  $joker=false;
  foreach ($cards as $card) {
    switch ($config['cardsmap'][$card]['weight']) {
      case 13:
      $king++;
      break;

      case 1:
      $one++;
      break;

      case 14:
      if ($king<2) {
       $king++;
      }
      if ($one<2) {
       $one++;
      }
      $joker=true;
      break;
    }
  }

  if (($king==2) OR ($one==2)) {
    return true;
  } else {
    return false;
  }
}

function fucks_or_better($cards, $what_min=11, $one_is_upper=true) {
     global $config;
  $group=cards_group_count($cards, "weight");
  $pairs=0;

  foreach ($group as $what => $count) {
     if ((($what>=$what_min) OR (($what==1) AND ($one_is_upper))) AND ($count==2)) {
        return true;
     }
  }

  return false;
}

function cards_natsort ($cards, $param="weight") {
     global $config;
  $index=array();
  $result=array();
  foreach ($cards as $card)  {
    $index[$card]=$config['cardsmap'][$card][$param];
  }
  natsort($index);
  foreach ($index as $k => $v) {
    $result[]=$k;
  }
  return $result;
}

function cards_group_count($cards, $param="weight") {
     global $config;
  $cards=cards_natsort($cards, $param);
  $rezult=array();

  foreach ($cards as $card) {
    if (isset($result[$config['cardsmap'][$card][$param]])) {
      $result[$config['cardsmap'][$card][$param]]++;
    } else {
      $result[$config['cardsmap'][$card][$param]]=1;
    }
  }

  return $result;
}

function check_cards ($cards) {
     global $config;
  if (is_royal_flash($cards)) {
    return "royal_flush";
  } elseif (is_straight_flush ($cards)) {
    return "straight_flush";
  } elseif (is_four_of_kind($cards)) {
    return "four_of_kind";
  } elseif (is_full_house($cards)) {
    return "full_house";
  } elseif (is_flush($cards)) {
    return "flush";
  } elseif (is_straight($cards)) {
    return "straight";
  } elseif (is_three_of_kind($cards)) {
    return "three_of_kind";
  } elseif (is_two_pairs($cards)) {
    return "two_pairs";
  } elseif (fucks_or_better($cards, 11, true)) {
    return "jacks_or_better";
  } else {
    return false;
  }

}




switch ($_POST['ACTION']) {
  case "ENTER":
  print_var("RESULT", "OK");
  print_var("BALANCE", user_balance());
  $_SESSION['JacksOrBetter_game_lasttime']=time();
  unset($_SESSION['JacksOrBetter_cards']);
  break;

  case "EXIT":
  unset($_SESSION['JacksOrBetter_game_lasttime']);
  unset($_SESSION['JacksOrBetter_cards']);
  unset($_SESSION['JacksOrBetter_cardsmap']);
  break;

  case "MAKEBET":
  list($betid, $betcount)=explode(" ", $_POST['BET']);
  $bet=$config['bets'][$betid];
  $allbet=$bet*$betcount;
  $_SESSION['jp_betcount']=$betcount;
  $_SESSION['jp_bet']=$bet;
  $_SESSION['jp_betid']=$betid;

  if ($allbet<=0) {
   	 print_var("RESULT", "BAD_BET");
   	 die();
  }
  if ($allbet>=user_balance()) {
     print_var("RESULT", "LOW_BALANCE");
   	 die();
  }

  $profit=$allbet/100;
  $profit=$profit*$game_configs['profit_percent'];
  user_pay($allbet);
  bank_add($game_configs['profit_bank'], $profit, true);
  bank_add($game_configs['game_bank'], $allbet-$profit);

  $_SESSION['JacksOrBetter_cardsmap']=make_map();
  $_SESSION['JacksOrBetter_cards']=array(new_card(), new_card(), new_card(), new_card(), new_card());
  $_SESSION['JacksOrBetter_game_lasttime']=time(); //И обновим счётчик времени.

  print_var("RESULT", "OK");
  print_var("BALANCE", user_balance());
  print_var("CARDS", implode("|", $_SESSION['JacksOrBetter_cards']));

  break;

  case "KEEPCARDS":
  $allbet=$_SESSION['jp_betcount']*$_SESSION['jp_bet'];
  $holdcards=explode("|", $_POST['CARDSKEPT']);
  $possible_result=false;
  $combo=false;
  $winall=0;
  $map=$_SESSION['JacksOrBetter_cardsmap'];
  while (!$possible_result) {
   $_SESSION['JacksOrBetter_cardsmap']=$map;
   $winall=0;
   if ($holdcards[0]==0) {
     print_var("NEWCARD0", "1");
     $_SESSION['JacksOrBetter_cards'][0]=new_card();
   }
   if ($holdcards[1]==0) {
     print_var("NEWCARD1", "1");
     $_SESSION['JacksOrBetter_cards'][1]=new_card();
   }
   if ($holdcards[2]==0) {
     print_var("NEWCARD2", "1");
     $_SESSION['JacksOrBetter_cards'][2]=new_card();
   }
   if ($holdcards[3]==0) {
     print_var("NEWCARD3", "1");
     $_SESSION['JacksOrBetter_cards'][3]=new_card();
   }
   if ($holdcards[4]==0) {
     print_var("NEWCARD4", "1");
     $_SESSION['JacksOrBetter_cards'][4]=new_card();
   }
   $combo=check_cards($cards);
   if ($combo!==false) {
     $winall=$config['combos'][$combo]['payout']*$_SESSION['jp_betcount']*$_SESSION['jp_bet'];
     if (bank_balance($game_configs['game_bank'])/_AMAROK_DELITEL/$allbet>=$winall) {
       $possible_result=true;
     }
   } else {
     $possible_result=true;
   }
  }

  write_stat ($allbet, $winall);

  $_SESSION['JacksOrBetter_game_lasttime']=time(); //И обновим счётчик времени.
  if ($combo!==false) {
    //Платим по счетам
    bank_pay($game_configs['game_bank'], $winall);
    user_add($winall);
    $payout=$config['combos'][$combo]['payout']*$_SESSION['jp_betcount'];
    print_var("RESULT", "OK");
    print_var("BALANCE", user_balance());
    print_var("CARDS", implode("|", $_SESSION['JacksOrBetter_cards']));
    print_var("PAYOUT", $payout);
    print_var("PAYOUTTYPE", $config['combos'][$combo]['payout_type']);
  } else {
    print_var("RESULT", "OK");
    print_var("BALANCE", user_balance());
    print_var("CARDS", implode("|", $_SESSION['JacksOrBetter_cards']));
  }

  break;

  case "MOVE":
  print_var("RESULT", "NOT_IMPL_MOVE");
  print_var("BALANCE", user_balance());
  break;
}



?>