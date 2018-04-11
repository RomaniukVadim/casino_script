<?php

if (eregi("grizzly_spin\.asp$", strtolower(__FILE__))===false) {
  print_var("t_alert1", "Fuck you self, my darling!");
  print_var("error", "1");
  die();
}

header("Expires: ".gmdate("D, d M Y H:i:s")."GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

define("_GAME_NAME", "Grizzly");

//include("./common.php");
include_once("../core/engine.php");

trace_str("__FILE__");

if (is_user()) {

    trace_var($_POST, "POST");
    trace_var($_GET, "GET");



    # Проверим сколько монеток кинул человек
    # Если одна монета то второй раз вращать уже нельзя)))
    # А если две, то нужно будет холдить и перевращать барабаны)
    $must_hold=false;
    if (isset($_POST['coins'])) {
      if ($_POST['coins']==1) {
        $must_hold=false;
      } elseif ($_POST['coins']==2) {
        $must_hold=true;
      } else {
        # Если монет брошено странное количество, то это аще залет.
        print_var("error", "5");
        die();
      }
    } else {
      # Если монет не брошено, то это залет.
      print_var("error", "5");
      die();
    }

    if ((!is_bank($game_configs['game_bank'])) OR (!is_bank($game_configs['profit_bank']))) {
      # Если банки не существуют, то это ошибка в БД и играть мы дальше не можем.
      print_var("error", "5");
      die();
    }

    $bet=$_POST['coins']*$game_configs['coinsize'];

    # Расчет делителя, для равномерного распределения банка
    $_SESSION['Grizzly_ratio']=18;


    if (user_balance()<$bet) {
      # Если денег нету, то нахуя нам аще продолжать работать?))))
      print_var("error", "1");
      die();
    }


    # Возможные выигрышные комбинации
    # 0 - Пустота
	# 1 - Автомат
	# 2 - Микрофон
	# 3 - Вывески
	# 4 - Кено
	# 5 - Звезда
	# 6 - Голивуд
	# 7 - Монро вилдкарта
	# icons - символы отраженные на барабанах без учета дикой карты(другие символы там присутствовать не могут)
	# wins - выигрыш в жетонах, номинал жетона устанавливаеться в админке)
	$wildchar=7;  # Номер дикой карты)
    $winmaps=array(
        array(
          'icons' => array(7),  # Монро
          'wins' =>  1000,
        ),
        array(
          'icons' => array(1),  # Автомат
          'wins' =>  10,
        ),
        array(
          'icons' => array(2),  # Микрофон
          'wins' =>  20,
        ),
        array(
          'icons' => array(3),  # Вывески
          'wins' =>  50,
        ),
        array(
          'icons' => array(4),  # Кено
          'wins' =>  75,
        ),
        array(
          'icons' => array(5),  # Звезда
          'wins' =>  100,
        ),
        array(
          'icons' => array(6),  # Голивуд
          'wins' =>  200,
        ),
        array(
          'icons' => array(1,2,3), # синие символы
          'wins' => 4,
        ),
        array(
          'icons' => array(4,5,6), # красные символы
          'wins' => 25,
        ),
    );

    # Набор возможных варриантов работы автомата
    # Хотя, я бы назвал это колодой карт
    # Для возможности переключения режимов игры и уменьшения времени генерации варрианта))))
    # 0 - Пустота
	# 1 - Автомат
	# 2 - Микрофон
	# 3 - Вывески
	# 4 - Кено
	# 5 - Звезда
	# 6 - Голивуд
	# 7 - Монро вилдкарта
	# Режимы:
	# 1 - Полная колода
	# 2 - мелкие выигрыши
	# 3 - Мелкие и средние выигрыши
	# 4 - Средние и крупные выигрыши
	# 5 - Крупные выигрыши
	# 6 - Супер крупные выигрыши
	switch ($game_configs['profile']) {
	  default:
      case 1:
      $avalible=array(0,0,0,1,1,1,2,2,2,3,3,3,4,4,4,5,5,5,6,6,6,7,7,7);
      break;

	  case 2:
      $avalible=array(0,0,0,7,1,1,1,2,2,2,3,3,3,4,4,4,7);
      break;

      case 3:
      $avalible=array(0,0,0,7,1,1,1,2,2,2,3,3,3,4,5,6,1,1,2,3,4,5);
      break;

      case 4:
      $avalible=array(0,0,0,7,7,7,6,6,6,5,5,5,4,4,4,1,2,3,6,7,5);
      break;

      case 5:
      $avalible=array(0,0,0,7,7,6,6,6,5,5,5,4,4,4,5,6,4);
      break;

      case 6:
      $avalible=array(0,0,0,7,7,7,1,2,3,4,0,0,1,2,6,5,4,6,5,4,6,5,4,7,7,7,7,7,7,7,7,7,7,7,7,7);
      break;
   }

    # Текущий баланс банка
    //$bank=bank_balance($game_configs['game_bank']);
	$bank=Game::bankBalance();

    if ($must_hold) {
      for ($i=0; $i<50; $i++) {
        $map=generate_map ($avalible);
        $win=calculate_win ($map);
        if (($win*$game_configs['coinsize']<=$bank/$_SESSION['Grizzly_ratio']) AND (chance($game_configs['win_chance']))) {
          break;
        }
      }
      unset($_SESSION['Grizzly_map']);
      unset($_SESSION['Grizzly_avalible']);
      $_SESSION['Grizzly_map']=$map;
      $_SESSION['Grizzly_avalible']=$avalible;
    } else {
      for ($i=0; $i<50; $i++) {
        $map=generate_map ($avalible);
        $win=calculate_win ($map);
        if (($win*$game_configs['coinsize']<=$bank/$_SESSION['Grizzly_ratio']) AND (chance($game_configs['win_chance']))) {
          break;
        }
      }
    }

    # Выплата выигрыша, запись статистики и тд)))
    if (!$must_hold) {
      $winall=$win*$game_configs['coinsize'];
      if ($winall>0) {
        #Снимаем ставку
        user_pay($bet);
        bank_add($game_configs['game_bank'], $bet);
        #Добавляем выигрыш
        user_add($winall);
        bank_pay($game_configs['game_bank'], $winall);
      } else {
        user_pay($bet);
        $profit=$bet/100;
        $profit=$profit*$game_configs['percent'];
        bank_add($game_configs['game_bank'], $bet-$profit);
        bank_add($game_configs['profit_bank'], $profit);
      }
      write_stat ($bet, $winall);
    }

    trace_var($map, "map");
    trace_var($win, "win");
    # Расположение Символов на экране
	# 1 4 7
	# 2 5 8
	# 3 6 9

    # Первый барабан
	if ($map[0]==0) {
	  print_var("symb1", mt_rand(1, 7));
	  print_var("symb2", "0");
	  print_var("symb3", mt_rand(1, 7));
	} else {
      print_var("symb1", "0");
	  print_var("symb2", $map[0]);
	  print_var("symb3", "0");
	}

	# Второй барабан
	if ($map[1]==0) {
	  print_var("symb4", mt_rand(1, 7));
	  print_var("symb5", "0");
	  print_var("symb6", mt_rand(1, 7));
	} else {
      print_var("symb4", "0");
	  print_var("symb5", $map[1]);
	  print_var("symb6", "0");
	}

	# Третий барабан
	if ($map[2]==0) {
	  print_var("symb7", mt_rand(1, 7));
	  print_var("symb8", "0");
	  print_var("symb9", mt_rand(1, 7));
	} else {
      print_var("symb7", "0");
	  print_var("symb8", $map[2]);
	  print_var("symb9", "0");
	}

	# Кстати, эта флешка требует чтоб все изменённые параметры сбрасывались каждый ход из PHP

    # Если от пользователя требуются ешо действия, то выигрыш сегодня не выводим, выводим завтра)))
    if ($must_hold) {
	  print_var("allow_hold", "1"); # Зато разрешаем перевращать барабан
	  print_var("win1", "0");
	  print_var("totalwin", "0");
    } else {
      print_var("win1", $win);
	  print_var("totalwin", $win);
	  print_var("allow_hold", "0");
    }
    print_var("win2", "0");
	print_var("betamount", "0");
	print_var("credit", user_balance());
	//print_var("data_ok=true";
} else {
  print_var("error", "2");
}

print_var("Transfert_OK", "1");





# Функции игры

# Вычисление выигрыша
function calculate_win ($map) {
     global $wildchar, $winmaps;
  if (is_array($map)) {
    foreach ($winmaps as $win) {
      $first=false;
      $second=false;
      $third=false;
      if ((array_search($map[0], $win['icons'])!==false) OR ($map[0]==$wildchar)) {
        $first=true;
      }
      if ((array_search($map[1], $win['icons'])!==false) OR ($map[1]==$wildchar)) {
        $second=true;
      }
      if ((array_search($map[2], $win['icons'])!==false) OR ($map[2]==$wildchar)) {
        $third=true;
      }

      if (($first) AND (($second) AND ($third))) {
        return $win['wins'];
      }
    }
    return 0.00;
  } else {
    return false;
  }
}



# Генерация варрианта из колоды
function generate_map ($avalible) {
  # Результат
  $result=array(0,0,0);

  # Перетряхивание колоды
  for ($i=mt_rand(0, 8); $i<10; $i++) {
    shuffle($avalible);
  }

  # Вытаскивание динамических символов
  $result[0]=$avalible[mt_rand(0, count($avalible)-1)];
  $result[1]=$avalible[mt_rand(0, count($avalible)-1)];
  $result[2]=$avalible[mt_rand(0, count($avalible)-1)];

  return $result;
}

# Генерация одного символа из колоды
function generate_bar ($avalible) {
  # Результат
  $result=0;

  # Перетряхивание колоды
  for ($i=mt_rand(0, 8); $i<10; $i++) {
    shuffle($avalible);
  }

  # Вытаскивание динамического символа
  $result=$avalible[mt_rand(0, count($avalible)-1)];

  return $result;
}