<?php

if (eregi("grizzly_spin2\.asp$", strtolower(__FILE__))===false) {
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

trace_var($_POST, "POST");
trace_var($_GET, "GET");

if ((!is_bank($game_configs['game_bank'])) OR (!is_bank($game_configs['profit_bank']))) {
      # Если банки не существуют, то это ошибка в БД и играть мы дальше не можем.
      print_var("error", "5");
      die();
}

if (is_user()) {

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

  # Захолденость барабанов передаеться так:
  # POST[hold1] - первый
  # POST[hold2] - второй
  # POST[hold3] - третий
  # Если 1, то остановлен.

  if ((isset($_SESSION['Grizzly_map'])) AND (is_array($_SESSION['Grizzly_map']))) {
    if ((isset($_POST['hold1'])) AND ((isset($_POST['hold2'])) AND (isset($_POST['hold3'])))) {

       for ($i=0; $i<100; $i++) {
        # Текущий баланс банка
        //$bank=bank_balance($game_configs['game_bank']);
		$bank=Game::bankBalance();

	    # Генерация первого барабана
        if ($_POST['hold1']==0) {
          $_SESSION['Grizzly_map'][0]=generate_bar ($_SESSION['Grizzly_avalible']);
        }

        # Генерация второго барабана
        if ($_POST['hold2']==0) {
          $_SESSION['Grizzly_map'][1]=generate_bar ($_SESSION['Grizzly_avalible']);
        }

        # Генерация третьего барабана
        if ($_POST['hold3']==0) {
          $_SESSION['Grizzly_map'][2]=generate_bar ($_SESSION['Grizzly_avalible']);
        }

        # Расчет выигрыша
        $win=calculate_win ($_SESSION['Grizzly_map']);
        $winall=$win*$game_configs['coinsize'];

        if (($winall<=$bank/$_SESSION['Grizzly_ratio']) AND (chance($game_configs['win_chance']))) {
          break;
        }
      }

      $bet=2*$game_configs['coinsize'];
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

      trace_var($_SESSION['Grizzly_map'], "map");
      trace_var($win, "win");
	  # Расположение Символов на экране
	  # 1 4 7
	  # 2 5 8
	  # 3 6 9

	  # Первый барабан
	  if ($_SESSION['Grizzly_map'][0]==0) {
		  print_var("symb1", mt_rand(1, 7));
		  print_var("symb2", "0");
		  print_var("symb3", mt_rand(1, 7));
	  } else {
	      print_var("symb1", "0");
		  print_var("symb2", $_SESSION['Grizzly_map'][0]);
		  print_var("symb3", "0");
	  }

	  # Второй барабан
	  if ($_SESSION['Grizzly_map'][1]==0) {
		  print_var("symb1", mt_rand(1, 7));
		  print_var("symb2", "0");
		  print_var("symb3", mt_rand(1, 7));
	  } else {
	      print_var("symb1", "0");
		  print_var("symb2", $_SESSION['Grizzly_map'][1]);
		  print_var("symb3", "0");
	  }

	  # Третий барабан
	  if ($_SESSION['Grizzly_map'][2]==0) {
		  print_var("symb1", mt_rand(1, 7));
		  print_var("symb2", "0");
		  print_var("symb3", mt_rand(1, 7));
	  } else {
	      print_var("symb1", "0");
		  print_var("symb2", $_SESSION['Grizzly_map'][2]);
		  print_var("symb3", "0");
	  }

	  # Вывод выигрыша
	  print_var("win2", $win);
	  print_var("totalwin", $win);
	  print_var("allow_hold", "0");
	  print_var("data_ok", "true");
	  print_var("credit", user_balance());

    } else {
      print_var("error", "5");
    }
  } else {
    print_var("error", "5");
  }
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
