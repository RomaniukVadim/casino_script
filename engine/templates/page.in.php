<?php
if ( $_SESSION['login'] == "" ) {
	//echo "<script>alert(\"Пожалуйста войдите, чтобы получить доступ к этой страничке!\");</script>";
	//exit("Нет доступа!<script>location.href='/';</script>");
	$_SESSION['needToLogin'] = true;
	echo "<script>location.href=\"/ru/\";</script>";
	exit( );
}

  if (!defined("CASINOENGINE")) {
      exit("Нет доступа!<script>location.href='/';</script>");
  }
  //if ( /*$_SESSION['login'] != ""*/ true ) {
  if ( $_SESSION['login'] != "" ) {
      $page_in_tpl             = file_get_contents(TEMPLATE_DIR . "/page_in.tpl");
      $page_in_tpl             = str_replace("{theme}", "/templates/" . $template . "/" . $_SESSION['language'], $page_in_tpl);
	  //$page_in_tpl             = str_replace("{theme}", "templates/" . $template . "/" . $_SESSION['language'], $page_in_tpl);
      $page_in_tpl             = str_replace("{language}", $_SESSION['language'], $page_in_tpl);
      
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
      $chk = 'in';
      if(isset($_POST['radio_table_select'])) {
      	$chk = ($_POST['radio_table_select'] == 'out') ? 'out' : 'in';
      }
      if($chk == 'out') {
      	//$selectPart = "SELECT `date`, `time`, `notes`, `amount`, `type`";
		$selectPart = "SELECT `date`, `time`, `notes`, `amount`, `type`, `status`";
      	$fromPart = " FROM `pay_withdrawals`";
      	$wherePart =  " WHERE user='" . $_SESSION['login'] . "' ORDER BY id DESC";
      	$limitPart =  " LIMIT ".$limitFrom.",".$ITEMS_PER_PAGE;
      	$page_in_tpl = str_replace("{radio_out}", ' checked', $page_in_tpl);
      } else {
      	//$selectPart = "SELECT `date`, `time`, `notes`, `amount`, `type_money` as `type`";
		$selectPart = "SELECT `date`, `time`, `notes`, `amount`, `type_money` as `type`, `status`";
      	$fromPart = " FROM `pay_deposits`";
      	$wherePart =  " WHERE user='" . $_SESSION['login'] . "' ORDER BY id DESC";
      	$limitPart =  " LIMIT ".$limitFrom.",".$ITEMS_PER_PAGE;
      	$page_in_tpl = str_replace("{radio_in}", ' checked', $page_in_tpl);
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
      $page_in_tpl          = str_replace("{tbl_pager}", $pagerTpl, $page_in_tpl);
      /*
       * КОД ДЛЯ ТАБЛИЦЫ СНИЗУ КОНЕЦ
      */
      
      $settings_query          = @mysql_fetch_array(@mysql_query("select * from casino_settings"));
      $client_query            = @mysql_fetch_array(@mysql_query("SELECT * FROM clients WHERE login='" . $_SESSION['login'] . "' limit 1"));
      $module_webmoney_query   = @mysql_fetch_array(@mysql_query("select * from pay_modules_webmoney"));
      $module_interkassa_query = @mysql_fetch_array(@mysql_query("select * from pay_modules_interkassa"));
      $module_robokassa_query  = @mysql_fetch_array(@mysql_query("select * from pay_modules_robokassa"));
	  $module_freekassa_query  = @mysql_fetch_array(@mysql_query("select * from pay_modules_freekassa"));
      $module_a1pay_query      = @mysql_fetch_array(@mysql_query("select * from pay_modules_a1pay"));
      $module_liqpay_query     = @mysql_fetch_array(@mysql_query("select * from pay_modules_liqpay"));
      $page_in_header          = get_template($page_in_tpl, "[header]", "[/header]");
      $page_in_header          = str_replace("[header]", "", $page_in_header);
      $page_in_header          = str_replace("[/header]", "", $page_in_header);
      $page_in_header          = str_replace("{icqadmin}", $settings_query['icqadmin'], $page_in_header);
      echo $page_in_header;
      if ($module_a1pay_query['status'] == 1) {
          if ($_POST['mode'] == "") {
              $module_a1pay = get_template($page_in_tpl, "[a1pay]", "[/a1pay]");
              $module_a1pay = str_replace("[a1pay]", "", $module_a1pay);
              $module_a1pay = str_replace("[/a1pay]", "", $module_a1pay);
              $module_a1pay = str_replace("{language}", $_SESSION['language'], $module_a1pay);
          }
          if ($_POST['mode'] == "pay_a1pay") {
              $date  = date("d.m.y");
              $time  = date("H:i:s");
              $ip    = $_SERVER['REMOTE_ADDR'];
              $login = $_SESSION['login'];
              $summa = intval($_POST['summa']);
              @mysql_query("INSERT INTO pay_deposits VALUES('', '{$login}', '{$summa}', '{$date}','{$time}', '{$ip}','A1PAY','','0','Пополнение счёта a1pay для Пользователя:{$login} , Сумма:{$summa} Кредитов','')");
              $pay_id                = mysql_insert_id();
              $module_a1pay_proccess = get_template($page_in_tpl, "[a1pay_proccess]", "[/a1pay_proccess]");
              $module_a1pay_proccess = str_replace("[a1pay_proccess]", "", $module_a1pay_proccess);
              $module_a1pay_proccess = str_replace("[/a1pay_proccess]", "", $module_a1pay_proccess);
              $module_a1pay_proccess = str_replace("{a1pay_summa}", $summa, $module_a1pay_proccess);
              $module_a1pay_proccess = str_replace("{a1pay_pay_id}", $pay_id, $module_a1pay_proccess);
              $module_a1pay_proccess = str_replace("{a1pay_login}", $login, $module_a1pay_proccess);
              $module_a1pay_proccess = str_replace("{a1pay_email}", $client_query['email'], $module_a1pay_proccess);
              $module_a1pay          = $module_a1pay_proccess;
              $_POST['mode']         = "";
          }
      } else {
          $module_a1pay = "";
      }
      if ($module_robokassa_query['status'] == 1) {
          if ($_POST['mode'] == "") {
              $module_robokassa = get_template($page_in_tpl, "[robokassa]", "[/robokassa]");
              $module_robokassa = str_replace("[robokassa]", "", $module_robokassa);
              $module_robokassa = str_replace("[/robokassa]", "", $module_robokassa);
              $module_robokassa = str_replace("{language}", $_SESSION['language'], $module_robokassa);
          }
          if ($_POST['mode'] == "pay_robox") {
              $date  = date("d.m.y");
              $time  = date("H:i:s");
              $ip    = $_SERVER['REMOTE_ADDR'];
              $login = $_SESSION['login'];
              $summa = intval($_POST['summa']);
              @mysql_query("INSERT INTO pay_deposits VALUES('', '{$login}', '{$summa}', '{$date}','{$time}', '{$ip}','ROBOX','','0','Пополнение счёта robokassa для Пользователя:{$login} , Сумма:{$summa} Кредитов','')");
              $pay_id    = mysql_insert_id();			  
              $mrh_login = $module_robokassa_query['mrh_login'];
              $mrh_pass1 = $module_robokassa_query['mrh_pass1'];
              $inv_id    = $pay_id;
              $inv_desc  = "Пополение баланса пользователю " . $_SESSION['login'] . ", id платежа " . $inv_id;
              $out_summ  = $summa;
              $shp_item  = $module_robokassa_query['shp_item'];
              $in_curr   = $module_robokassa_query['in_curr'];
              $culture   = $module_robokassa_query['culture'];
              $crc       = md5("{$mrh_login}:{$out_summ}:{$inv_id}:{$mrh_pass1}:Shp_item={$shp_item}");
              $login     = $_SESSION['login'];
              if ($module_robokassa_query['mode_demo'] == 1) {
                  $url = "http://test.robokassa.ru/Index.aspx";
              } else {
                  $url = "https://merchant.roboxchange.com/Index.aspx";
              }
              $module_robokassa_proccess = get_template($page_in_tpl, "[robokassa_proccess]", "[/robokassa_proccess]");
              $module_robokassa_proccess = str_replace("[robokassa_proccess]", "", $module_robokassa_proccess);
              $module_robokassa_proccess = str_replace("[/robokassa_proccess]", "", $module_robokassa_proccess);
              $module_robokassa_proccess = str_replace("{robokssa_url}", $url, $module_robokassa_proccess);
              $module_robokassa_proccess = str_replace("{robokssa_mrh_login}", $mrh_login, $module_robokassa_proccess);
              $module_robokassa_proccess = str_replace("{robokssa_out_summ}", $out_summ, $module_robokassa_proccess);
              $module_robokassa_proccess = str_replace("{robokssa_inv_id}", $inv_id, $module_robokassa_proccess);
              $module_robokassa_proccess = str_replace("{robokssa_inv_desc}", $inv_desc, $module_robokassa_proccess);
              $module_robokassa_proccess = str_replace("{robokssa_crc}", $crc, $module_robokassa_proccess);
              $module_robokassa_proccess = str_replace("{robokssa_shp_item}", $shp_item, $module_robokassa_proccess);
              $module_robokassa_proccess = str_replace("{robokssa_in_curr}", $in_curr, $module_robokassa_proccess);
              $module_robokassa_proccess = str_replace("{robokssa_culture}", $culture, $module_robokassa_proccess);
              $module_robokassa_proccess = str_replace("{robokssa_login}", $login, $module_robokassa_proccess);
              $module_robokassa          = $module_robokassa_proccess;
              $_POST['mode']             = "";
          }
      } else {
          $module_robokassa = "";
      }
	  if ($module_freekassa_query['status'] == 1) {
          if ($_POST['mode'] == "") {
              $module_freekassa = get_template($page_in_tpl, "[freekassa]", "[/freekassa]");
              $module_freekassa = str_replace("[freekassa]", "", $module_freekassa);
              $module_freekassa = str_replace("[/freekassa]", "", $module_freekassa);
              $module_freekassa = str_replace("{language}", $_SESSION['language'], $module_freekassa);
          }          
		  if ($_POST['mode'] == "pay_freekassa") {	  
		  



              $date  = date("d.m.y");
              $time  = date("H:i:s");
              $ip    = $_SERVER['REMOTE_ADDR'];
              $login = $_SESSION['login'];
              $summa = intval($_POST['summa']);
              @mysql_query("INSERT INTO pay_deposits VALUES('', '{$login}', '{$summa}', '{$date}','{$time}', '{$ip}','FREEKASSA','','0','Пополнение счёта payeer для Пользователя:{$login} , Сумма:{$summa} Кредитов','')");
              $pay_id    = mysql_insert_id();
			  
			  $fk_merchant_id = $module_freekassa_query['mrh_login'];//$module_freekassa_query['fk_merchant_id'];
			  $fk_merchant_key = $module_freekassa_query['mrh_pass1'];//$module_freekassa_query['fk_merchant_key'];
			  









  
			  
              $mrh_login = $module_freekassa_query['mrh_login'];
              $mrh_pass1 = $module_freekassa_query['mrh_pass1'];
              $inv_id    = $pay_id;
              $inv_desc  = $_SESSION['login'];
              $out_summ  = $summa;
              $shp_item  = $module_freekassa_query['shp_item'];



	$m_shop = $fk_merchant_id;
$m_orderid =$pay_id;
$m_amount = number_format($summa, 2, '.', '');
$m_curr = 'RUB';
$m_desc = base64_encode($inv_desc);
$m_key = $fk_merchant_key;

$arHash = array(
	$m_shop,
	$m_orderid,
	$m_amount,
	$m_curr,
	$m_desc,
	$m_key
);
$sign = strtoupper(hash('sha256', implode(":", $arHash)));		


$inv_desc=$m_desc;


			  
			  
			  //$hash = md5($fk_merchant_id.":".$_GET['oa'].":".$fk_merchant_key.":".$_GET['l']);			
			  //$hash = md5($fk_merchant_id.":".$out_summ.":".$fk_merchant_key.":".$shp_item);			
			  $hash = md5($fk_merchant_id.":".$out_summ.":".$fk_merchant_key.":".$inv_id);			
			  $fk_hash = $sign;
			
			  
			  
			  
              $in_curr   = $module_freekassa_query['in_curr'];
              $culture   = $module_freekassa_query['culture'];
              $crc       = md5("{$mrh_login}:{$out_summ}:{$inv_id}:{$mrh_pass1}:Shp_item={$shp_item}");
              $login     = $_SESSION['login'];
              if ($module_freekassa_query['mode_demo'] == 1) {
                  //$url = "http://test.robokassa.ru/Index.aspx";
				  $url = "http://www.free-kassa.ru/merchant/cash.php";
              } else {
                  //$url = "https://merchant.roboxchange.com/Index.aspx";
				  $url = "http://www.free-kassa.ru/merchant/cash.php";
              }
              $module_freekassa_proccess = get_template($page_in_tpl, "[freekassa_proccess]", "[/freekassa_proccess]");
              $module_freekassa_proccess = str_replace("[freekassa_proccess]", "", $module_freekassa_proccess);
              $module_freekassa_proccess = str_replace("[/freekassa_proccess]", "", $module_freekassa_proccess);
              $module_freekassa_proccess = str_replace("{freekssa_url}", $url, $module_freekassa_proccess);
			  
			  
			  $module_freekassa_proccess = str_replace("{fk_merchant_id}", $fk_merchant_id, $module_freekassa_proccess);
			  $module_freekassa_proccess = str_replace("{fk_hash}", $fk_hash, $module_freekassa_proccess);
			  
			  $module_freekassa_proccess = str_replace("{fk_outsum_oa}", $out_summ, $module_freekassa_proccess);
			  //$module_freekassa_proccess = str_replace("{fk_shipitem_l}", $shp_item, $module_freekassa_proccess);
			  $module_freekassa_proccess = str_replace("{fk_inv_id}", $inv_id, $module_freekassa_proccess);
			  $module_freekassa_proccess = str_replace("{freekssa_inv_desc}", $inv_desc, $module_freekassa_proccess);
              /*$module_freekassa_proccess = str_replace("{freekssa_mrh_login}", $mrh_login, $module_freekassa_proccess);
              $module_freekassa_proccess = str_replace("{freekssa_out_summ}", $out_summ, $module_freekassa_proccess);
              $module_freekassa_proccess = str_replace("{freekssa_inv_id}", $inv_id, $module_freekassa_proccess);
              $module_freekassa_proccess = str_replace("{freekssa_inv_desc}", $inv_desc, $module_freekassa_proccess);
              $module_freekassa_proccess = str_replace("{freekssa_crc}", $crc, $module_freekassa_proccess);
              $module_freekassa_proccess = str_replace("{freekssa_shp_item}", $shp_item, $module_freekassa_proccess);
              $module_freekassa_proccess = str_replace("{freekssa_in_curr}", $in_curr, $module_freekassa_proccess);
              $module_freekassa_proccess = str_replace("{freekssa_culture}", $culture, $module_freekassa_proccess);
              $module_freekassa_proccess = str_replace("{freekssa_login}", $login, $module_freekassa_proccess);*/
			  
              $module_freekassa          = $module_freekassa_proccess;
              $_POST['mode']             = "";
          }
      } else {
          $module_freekassa = "";
      }	  
      if ($module_interkassa_query['status'] == 1) {
          if ($_POST['mode'] == "") {
              $module_interkassa = get_template($page_in_tpl, "[interkassa]", "[/interkassa]");
              $module_interkassa = str_replace("[interkassa]", "", $module_interkassa);
              $module_interkassa = str_replace("[/interkassa]", "", $module_interkassa);
              $module_interkassa = str_replace("{language}", $_SESSION['language'], $module_interkassa);
          }
          if ($_POST['mode'] == "pay_interkassa") {
              $date  = date("d.m.y");
              $time  = date("H:i:s");
              $ip    = $_SERVER['REMOTE_ADDR'];
              $login = $_SESSION['login'];
              $summa = intval($_POST['summa']);
              @mysql_query("INSERT INTO pay_deposits VALUES('', '{$login}', '{$summa}', '{$date}','{$time}', '{$ip}','INTERKASSA','','0','Пополнение счёта interkassa для Пользователя:{$login} , Сумма:{$summa} Кредитов','')");
              $pay_id                     = mysql_insert_id();
              $module_interkassa_proccess = get_template($page_in_tpl, "[interkassa_proccess]", "[/interkassa_proccess]");
              $module_interkassa_proccess = str_replace("[interkassa_proccess]", "", $module_interkassa_proccess);
              $module_interkassa_proccess = str_replace("[/interkassa_proccess]", "", $module_interkassa_proccess);
              $module_interkassa_proccess = str_replace("{interkassa_shop_id}", $module_interkassa_query['ik_shop_id'], $module_interkassa_proccess);
              $module_interkassa_proccess = str_replace("{interkassa_summa}", $summa, $module_interkassa_proccess);
              $module_interkassa_proccess = str_replace("{interkassa_pay_id}", $pay_id, $module_interkassa_proccess);
              $module_interkassa_proccess = str_replace("{interkassa_login}", $login, $module_interkassa_proccess);
              $module_interkassa          = $module_interkassa_proccess;
              $_POST['mode']              = "";
          }
      } else {
          $module_interkassa = "";
      }
      if ($module_webmoney_query['status'] == 1) {
          if ($_POST['mode'] == "") {
              $module_webmoney = get_template($page_in_tpl, "[webmoney]", "[/webmoney]");
              $module_webmoney = str_replace("[webmoney]", "", $module_webmoney);
              $module_webmoney = str_replace("[/webmoney]", "", $module_webmoney);
              $module_webmoney = str_replace("{language}", $_SESSION['language'], $module_webmoney);
          }
          if ($_POST['mode'] == "pay_webmoney") {
              $date  = date("d.m.y");
              $time  = date("H:i:s");
              $ip    = $_SERVER['REMOTE_ADDR'];
              $login = $_SESSION['login'];
              $summa = intval($_POST['summa']);
              @mysql_query("INSERT INTO pay_deposits VALUES('', '{$login}', '{$summa}', '{$date}','{$time}', '{$ip}','WEBMONEY','','0','Пополнение счёта webmoney для Пользователя:{$login} , Сумма:{$summa} Кредитов','')");
              $pay_id          = mysql_insert_id();
              $module_webmoney = get_template($page_in_tpl, "[webmoney_proccess]", "[/webmoney_proccess]");
              $module_webmoney = str_replace("[webmoney_proccess]", "", $module_webmoney);
              $module_webmoney = str_replace("[/webmoney_proccess]", "", $module_webmoney);
              $module_webmoney = str_replace("{summa}", $summa, $module_webmoney);
              $module_webmoney = str_replace("{language}", $_SESSION['language'], $module_webmoney);
              $module_webmoney = str_replace("{login}", $_SESSION['login'], $module_webmoney);
              $module_webmoney = str_replace("{purse}", $module_webmoney_query['WMR'], $module_webmoney);
              $module_webmoney = str_replace("{payid}", $pay_id, $module_webmoney);
              $module_webmoney = str_replace("{email_md5}", md5($client_query['email']), $module_webmoney);
              $module_webmoney = str_replace("{ip}", $_SERVER['REMOTE_ADDR'], $module_webmoney);
              $_POST['mode']   = "";
          }
      } else {
          $module_webmoney = "";
      }
      $module_statistic     = get_template($page_in_tpl, "[statistic_header]", "[/statistic_header]");
      $module_statistic     = str_replace("[statistic_header]", "", $module_statistic);
      $module_statistic     = str_replace("[/statistic_header]", "", $module_statistic);
      $module_statistic_out = $module_statistic;
      $pay_deposits_query   = @mysql_query($selectPart.$fromPart.$wherePart.$limitPart);
	  
	  
      
      while ($pay_deposits_list = @mysql_fetch_array($pay_deposits_query)) {	  
          $module_statistic_list = get_template($page_in_tpl, "[statistic_list]", "[/statistic_list]");
          $module_statistic_list = str_replace("[statistic_list]", "", $module_statistic_list);
          $module_statistic_list = str_replace("[/statistic_list]", "", $module_statistic_list);
          $module_statistic_list = str_replace("{date}", $pay_deposits_list['date'], $module_statistic_list);
          $module_statistic_list = str_replace("{time}", $pay_deposits_list['time'], $module_statistic_list);
          $module_statistic_list = str_replace("{notes}", $pay_deposits_list['notes'], $module_statistic_list);
          $module_statistic_list = str_replace("{amount}", $pay_deposits_list['amount'], $module_statistic_list);
          $module_statistic_list = str_replace("{type_money}", $pay_deposits_list['type_money'], $module_statistic_list);
          if ($pay_deposits_list['status'] == 0) {
              $status_deposit = "Не оплaчен";
          }
          if ($pay_deposits_list['status'] == 1) {
              $status_deposit = "Оплачено";
          }
          if ($pay_deposits_list['status'] == 2) {
              $status_deposit = "Ошибка";
          }
          if ($pay_deposits_list['status'] == 3) {
              $status_deposit = "Отказ от платежа";
          }
          $module_statistic_list = str_replace("{status}", $status_deposit, $module_statistic_list);
          $module_statistic_out .= $module_statistic_list;
      }
      $module_statistic = get_template($page_in_tpl, "[statistic_footer]", "[/statistic_footer]");
      $module_statistic = str_replace("[statistic_footer]", "", $module_statistic);
      $module_statistic = str_replace("[/statistic_footer]", "", $module_statistic);
      $module_statistic_out .= $module_statistic;
      $page_in_main = get_template($page_in_tpl, "[main]", "[/main]");
      $page_in_main = str_replace("[main]", "", $page_in_main);
      $page_in_main = str_replace("[/main]", "", $page_in_main);
      $page_in_main = str_replace("{robokassa}", $module_robokassa, $page_in_main);
	  $page_in_main = str_replace("{freekassa}", $module_freekassa, $page_in_main);
      $page_in_main = str_replace("{interkassa}", $module_interkassa, $page_in_main);
      $page_in_main = str_replace("{webmoney}", $module_webmoney, $page_in_main);
      $page_in_main = str_replace("{a1pay}", $module_a1pay, $page_in_main);
      $page_in_main = str_replace("{statistic}", $module_statistic_out, $page_in_main);
      echo $page_in_main;
  } else {
      echo "<script>alert(\"Пожалуйста войдите, чтобы получить доступ к этой страничке!\");</script>";
      exit("Нет доступа!<script>location.href='/';</script>");
  }
?>