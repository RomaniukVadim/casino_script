<?php
  if (!defined("CASINOENGINE")) {
      exit("Нет доступа!<script>location.href='/';</script>");
  }
  if ($_SESSION['login'] != "") {
      $action        = intval($_POST['action']);
      $clients_query = @mysql_fetch_array(@mysql_query("SELECT * FROM clients WHERE login='" . $_SESSION['login'] . "' limit 1"));
      $tariffs_query = @mysql_fetch_array(@mysql_query("SELECT * FROM pay_tariff"));
      $tariff_wmz    = $clients_query['cash'] / $tariffs_query['USD'];
      $tariff_wmz    = sprintf("%01.2f", $tariff_wmz);
      $tariff_wmzpr  = $tariff_wmz - $tariff_wmz / 100 * 0.8;
      $tariff_wmzpr  = sprintf("%01.2f", $tariff_wmzpr);
      $tariff_wme    = $clients_query['cash'] / $tariffs_query['EUR'];
      $tariff_wme    = sprintf("%01.2f", $tariff_wme);
      $tariff_wmepr  = sprintf("%01.2f", $tariff_wme - $tariff_wme / 100 * 0.8);
      $tariff_wmu    = $clients_query['cash'] / $tariffs_query['UAH'];
      $tariff_wmu    = sprintf("%01.2f", $tariff_wmu);
      $tariff_wmupr  = sprintf("%01.2f", $tariff_wmu - $tariff_wmu / 100 * 0.8);
      
      $minWmz = 1.00;
      $minWme = 1.00;
      $minWmr = 10.00;
      $minWmu = 10.00;
      
      
      if ($action == "") {
          $page_out_tpl          = file_get_contents(TEMPLATE_DIR . "/page_out.tpl");
          $page_out_tpl          = str_replace("{theme}", "/templates/" . $template . "/" . $_SESSION['language'], $page_out_tpl);
          $page_out_tpl          = str_replace("{language}", $_SESSION['language'], $page_out_tpl);
          
          /*
           * КОД ДЛЯ ТАБЛИЦЫ СНИЗУ НАЧАЛО
           */
          //Ниже будет выведение страничной навигации
          $selectPart = '';
          $fromPart = ''; 
		  $wherePart = '';
          $limitPart = '';		  
          $ITEMS_PER_PAGE = 20;
          $limitFrom = 0;          
          
          if(isset($_POST['pageno'])) {
          	if(is_numeric($_POST['pageno'])) {
          		$currentPage = mysql_real_escape_string($_POST['pageno']);
          		$limitFrom = $currentPage * $ITEMS_PER_PAGE;
          	}
          }          
          
          /* Выбираем тот запрос для таблицы, по которому мы хотим получить нужные данные
          Заодно поставим в нужном месте галочку
          Radiobutton с выбором таблицы - установка точек */
          $chk = 'out';
          if(isset($_POST['radio_table_select'])) {
          	$chk = ($_POST['radio_table_select'] == 'in') ? 'in' : 'out';
          }          
          if($chk == 'out') {
          	//$selectPart = "SELECT date, time, notes, amount, type";
			$selectPart = "SELECT date, time, notes, amount, type, status";
          	$fromPart = " FROM pay_withdrawals";
          	$wherePart =  " WHERE user='" . $_SESSION['login'] . "' ORDER BY id DESC";
          	$limitPart =  " LIMIT ".$limitFrom.",".$ITEMS_PER_PAGE;
          	$page_out_tpl = str_replace("{radio_out}", ' checked', $page_out_tpl);
          } else {
          	//$selectPart = "SELECT date, time, notes, amount, type_money as type";
			$selectPart = "SELECT date, time, notes, amount, type_money as type, status";
          	$fromPart = " FROM pay_deposits";
          	$wherePart =  " WHERE user='" . $_SESSION['login'] . "' ORDER BY id DESC";
          	$limitPart =  " LIMIT ".$limitFrom.",".$ITEMS_PER_PAGE;
          	$page_out_tpl = str_replace("{radio_in}", ' checked', $page_out_tpl);
          }     
          
          //Подсчёт числа страниц
          $query = "SELECT Count(*) ".$fromPart.$wherePart;          
          $num0 = mysql_fetch_row(mysql_query($query));
          $pagesCount = $num0[0];
          $pagesNum = ceil($pagesCount / $ITEMS_PER_PAGE);
          
          //Шаблон для навигации по страницам
          $pagerTpl = '';
          for($i = 0; $i < $pagesNum; $i++) {          	
          	$currentPgTpl = (string)($i+1);
          	$pagerTpl .= ' <a href=\'#\' onclick=\'navigateToPage('.$i.')\'>'.$currentPgTpl.'</a>';
          }          
          $page_out_tpl          = str_replace("{tbl_pager}", $pagerTpl, $page_out_tpl);
          /*
          * КОД ДЛЯ ТАБЛИЦЫ СНИЗУ КОНЕЦ
          */          
          
          $module_webmoney_out   = get_template($page_out_tpl, "[webmoney]", "[/webmoney]");
          $module_webmoney_out   = str_replace("[webmoney]", "", $module_webmoney_out);
          $module_webmoney_out   = str_replace("[/webmoney]", "", $module_webmoney_out);
          $module_webmoney_out   = str_replace("{cash}", $clients_query['cash'], $module_webmoney_out);
          $module_webmoney_out   = str_replace("{cash_wmpr}", $clients_query['cash'] / 100 * 0.8, $module_webmoney_out);
          $module_webmoney_out   = str_replace("{tariff_wmz}", $tariff_wmz, $module_webmoney_out);
          $module_webmoney_out   = str_replace("{tariff_onewmz}", $tariffs_query['USD'], $module_webmoney_out);
          $module_webmoney_out   = str_replace("{tariff_wmzpr}", $tariff_wmzpr, $module_webmoney_out);
          $module_webmoney_out   = str_replace("{tariff_wme}", $tariff_wme, $module_webmoney_out);
          $module_webmoney_out   = str_replace("{tariff_wmepr}", $tariff_wmepr, $module_webmoney_out);
          $module_webmoney_out   = str_replace("{tariff_onewme}", $tariffs_query['EUR'], $module_webmoney_out);
          $module_webmoney_out   = str_replace("{tariff_wmu}", $tariff_wmu, $module_webmoney_out);
          $module_webmoney_out   = str_replace("{tariff_wmupr}", $tariff_wmupr, $module_webmoney_out);
          $module_webmoney_out   = str_replace("{tariff_onewmu}", $tariffs_query['UAH'], $module_webmoney_out);
          $module_statistic      = get_template($page_out_tpl, "[statistic_header]", "[/statistic_header]");
          $module_statistic      = str_replace("[statistic_header]", "", $module_statistic);
          $module_statistic      = str_replace("[/statistic_header]", "", $module_statistic);
          $module_statistic_out  = $module_statistic;
          
       
          $pay_withdrawals_query = @mysql_query($selectPart.$fromPart.$wherePart.$limitPart);
          while ($pay_withdrawals_list = @mysql_fetch_array($pay_withdrawals_query)) {		  
              $module_statistic_list = get_template($page_out_tpl, "[statistic_list]", "[/statistic_list]");
              $module_statistic_list = str_replace("[statistic_list]", "", $module_statistic_list);
              $module_statistic_list = str_replace("[/statistic_list]", "", $module_statistic_list);
              $module_statistic_list = str_replace("{date}", $pay_withdrawals_list['date'], $module_statistic_list);
              $module_statistic_list = str_replace("{time}", $pay_withdrawals_list['time'], $module_statistic_list);
              $module_statistic_list = str_replace("{notes}", $pay_withdrawals_list['notes'], $module_statistic_list);
              $module_statistic_list = str_replace("{amount}", $pay_withdrawals_list['amount'], $module_statistic_list);
              $module_statistic_list = str_replace("{type}", $pay_withdrawals_list['type'], $module_statistic_list);
              if ($pay_withdrawals_list['status'] == 0) {
                  $status_withdrawals = "В обработке";
              }
              if ($pay_withdrawals_list['status'] == 1) {
                  $status_withdrawals = "Оплачено";
              }
              if ($pay_withdrawals_list['status'] == 2) {
                  $status_withdrawals = "Заблокировано";
              }
              $module_statistic_list = str_replace("{status}", $status_withdrawals, $module_statistic_list);
              $module_statistic_out .= $module_statistic_list;
          }
          $module_statistic = get_template($page_out_tpl, "[statistic_footer]", "[/statistic_footer]");
          $module_statistic = str_replace("[statistic_footer]", "", $module_statistic);
          $module_statistic = str_replace("[/statistic_footer]", "", $module_statistic);
          $module_statistic_out .= $module_statistic;
          $page_out_main = get_template($page_out_tpl, "[main]", "[/main]");
          $page_out_main = str_replace("[main]", "", $page_out_main);
          $page_out_main = str_replace("[/main]", "", $page_out_main);
          $page_out_main = str_replace("{webmoney}", $module_webmoney_out, $page_out_main);
          $page_out_main = str_replace("{statistic}", $module_statistic_out, $page_out_main);
          
          
          echo $page_out_main;
      }
      if ($action == "1") {
          $вывод_тип             = $_POST['type'];
          $вывод_сумма          = $_POST['summa'];
          $вывод_кошелёк         = $_POST['purse'];
          $вывод_кошелёк_фильтер = preg_match("/^(R|Z|E|U)[0-9]{12}\$/D", $вывод_кошелёк);
          $вывод_сумма_фильтер 	 = preg_match("/^[0-9.]{1,10}\$/D", $вывод_сумма);
          $вывод_тип_фильтер     = preg_match("/^(WMR)\$/", $вывод_тип);
          if ($вывод_кошелёк == "") {
              $error .= "Не введён номер кошелька!\\n";
          } else if ($вывод_кошелёк_фильтер == false) {
              $error .= "Не корректен номер кошелька, введите 12ти символьный номер!\\n";
          }
          if ($вывод_сумма == "") {
              $error .= "Не введёна сумма вывода!\\n";
          } else if ($вывод_сумма_фильтер == false) {
              $error .= "Не корректна сумма вывода!\\n";
          }
          if ($вывод_тип == "") {
              $error .= "Не введён типа кошелька!\\n";
          } else if ($вывод_тип_фильтер == false) {
              $error .= "Не корректен тип кошелька!\\n";
          }
          if ($вывод_тип == "WMR" && $clients_query['cash'] < $вывод_сумма) {
              $error .= "Сумма вывода WMR не может быть больше баланса!\\n";
          }
          if ($вывод_тип == "WMZ" && $tariff_wmz < $вывод_сумма) {
              $error .= "Сумма вывода WMZ не может быть больше баланса!\\n";
          }
          if ($вывод_тип == "WME" && $tariff_wme < $вывод_сумма) {
              $error .= "Сумма вывода WME не может быть больше баланса!\\n";
          }
          if ($вывод_тип == "WMU" && $tariff_wmu < $вывод_сумма) {
              $error .= "Сумма вывода WMU не может быть больше баланса!\\n";
          }
          
          if ($вывод_тип == "WMR" && $вывод_сумма < $minWmr) {
          	$error .= "Вы не можете вывести меньше, чем ".$minWmr." WMR.\\n";
          }
          if ($вывод_тип == "WMZ" && $вывод_сумма< $minWmz) {
          	$error .= "Вы не можете вывести меньше, чем ".$minWmz." WMZ.\\n";
          }
          if ($вывод_тип == "WME" && $вывод_сумма< $minWme) {
          	$error .= "Вы не можете вывести меньше, чем ".$minWme." WME.\\n";
          }
          if ($вывод_тип == "WMU" && $вывод_сумма< $minWmu) {
          	$error .= "Вы не можете вывести меньше, чем ".$minWmu." WMU.\\n";
          }
                    
          if ($error == "") {
          	
              $date = date("Y-m-d");
              $time = date("H:i:s");
              @mysql_query("update clients set cash=cash-{$вывод_сумма} where login='" . $_SESSION['login'] . "'");
              @mysql_query("INSERT INTO pay_withdrawals\r\n\t\t\t\t(`id` ,`user`, `amount`, `date`, `time`, `type`, `type_purse`, `status`, `notes`, `details`) VALUES\r\n\t\t\t\t(NULL,'" . $_SESSION['login'] . "','" . $вывод_сумма . "', '" . $date . "', '" . $time . "', '" . $вывод_тип . "','" . $вывод_кошелёк . "' , '0', 'Заказ на вывод WebMoney:" . $вывод_тип . "', '')");
              $outid         = mysql_insert_id();
              $config_query  = @mysql_fetch_array(@mysql_query("select * from casino_settings"));
              $site          = $config_query['siteadress'];
              $email_support = $config_query['emailcasino'];
              $priority      = 3;
              $format        = "text/html";
              $msg .= "Здравствуйте, Администратор,<br>";
              $msg .= "Пользователь:" . $_SESSION['login'] . "<br><br>";
              $msg .= "Запросил на вывод сумму: " . $вывод_сумма . " " . $вывод_тип . "<br>";
              $msg .= "На кошелёк: " . $вывод_кошелёк . "<br>";
              $msg .= "Чтобы оплатить пользователю, пожалуйста перейдите по <a href=\"http://" . $site . "/acp/acp_admin/admin_pay_withdrawals.php?mode=transaction&id=" . $outid . "\">ссылке</a><br>";
              $msg .= "---------------------<br>";
              $msg .= "С Наилучшими Пожеланиями,<br>";
              $msg .= "Робот Интернет-казино " . $site . "<br>";
              mail($email_support, "Запрос на вывод средств: " . $вывод_сумма . ":" . $вывод_тип . " ", $msg, "From: {$email_support}\nContent-Type:{$format};charset=windows-1251\nMIME-Version: 1.0\nContent-Transfer-Encoding: 8bit\nX-Priority: {$priority}\nX-Mailer:CasinoEngine mail v1.0");
               
              echo "<script>alert(\"Запрос на вывод пршел успешно! Ожидайте обработки вашего запроса, согласно правилам!\");</script>";
              echo "<script>location.href=\"/" . $_SESSION['language'] . "/out\";</script>";
             
          } else {
              echo "<script>alert(\"Ошибка: " . $error . "\");</script>";
              echo "<script>history.back();</script>";
          }
      }
  } else {
	$_SESSION['needToLogin'] = true;
    echo "<script>location.href=\"/ru/\";</script>";
    exit( );
  }
?>