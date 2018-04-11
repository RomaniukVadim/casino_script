<?php
if ( $_SESSION['login'] == "" ) {
	$_SESSION['needToLogin'] = true;
    echo "<script>location.href=\"/ru/\";</script>";
    exit( );
}

  if (!defined("CASINOENGINE")) {
      exit("Нет доступа!<script>location.href='/';</script>");
  }
  $validationMsg = '';
  $approveMsg = '';
  
  $needToShowStatTab = false;
  if(isset($_POST['withdraw_summ']) && isset($_POST['user'])) {
  	$summ = mysql_real_escape_string($_POST['withdraw_summ']);
  	$user = mysql_real_escape_string($_POST['user']);
  	if(!is_numeric($summ)) {
  		$validationMsg = 'Вы должны указать число! Для отделения дробной части используйте точку.';
  	} else {
  		if($summ < 100.00) {
  			$validationMsg = 'Допустимая сумма для вывода - не менее 100 рублей.';
  		}	
  	}
  	
  	if($validationMsg == '') { //ошибок не возникло
  		//проверим, есть ли у игрока столько средств
  		$query = "SELECT id, cash_ref FROM clients WHERE login='$user';";  		
  		$res0 = mysql_query($query);
  		if(mysql_num_rows($res0) == 1) {
  			$result = mysql_fetch_assoc($res0);
  			$cash = $result['cash_ref'];  			
  			if($cash < $summ) {
  				$validationMsg = 'У Вас недостаточно средств для этой операции.';
  			} else {
  				$uid = $result['id'];
  				mysql_query("INSERT INTO partner_withdraw(user_id, money, `date`) VALUES('$uid', $summ, CURRENT_DATE)");
  				
	  			$query = "UPDATE clients SET cash_pending = (cash_pending + $summ), cash_ref = (cash_ref - $summ) WHERE login='$user'";
	  			mysql_query($query);
	  			$approveMsg = 'Выплата была успешно заказана.';
  			}
  		} else {
  			$validationMsg = "Пользователь с таким логином не найден.";
  		}
  	}
    $needToShowStatTab = true;
  }
  
  $page_partner_tpl = file_get_contents(TEMPLATE_DIR . "/page_partner.tpl");  
  
  $page_partner_tpl = str_replace("{base_url}", $_SERVER["HTTP_HOST"], $page_partner_tpl);
  $page_partner_tpl = str_replace("{login}", $_SESSION["login"], $page_partner_tpl);
  $page_partner_tpl = str_replace("{theme}", "/templates/" . $template . "/" . $_SESSION['language'], $page_partner_tpl);
  
  //11.1.2011 by megainformatic.ru
  $page_partner_tpl_top20 = file_get_contents(TEMPLATE_DIR . "/top20.tpl");
  $page_partner_tpl = str_replace("{top20}", $page_partner_tpl_top20, $page_partner_tpl);
  //end of 11.1.2011 by megainformatic.ru
  
  
$monthsFrom = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
$monthsTo = array('Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь');
$sql = "SELECT CONCAT( MONTHNAME( a.date ) , ' ', YEAR( a.date ) ) AS time, Count( * ) AS referals "
	."FROM clients as a "
	."INNER JOIN clients as b "
	."ON a.referer = b.id "
	."WHERE b.login='".$_SESSION['login']."' "
	."AND a.date > DATE_SUB(CURRENT_DATE, INTERVAL 1 YEAR)"
	."GROUP BY YEAR( a.date ) , MONTH( a.date ) "
	."ORDER BY a.date DESC "
	."LIMIT 12;";
$refStat0 = mysql_query($sql);
$refCount = mysql_num_rows($refStat0);
if($refCount > 0) {
	$tplStat = '<table width="30%">';
	for($i = 0; $i < $refCount; $i++) {
		$ref = mysql_fetch_assoc($refStat0);
		$tplStat .= '<tr>';
		$tplStat .= '<td width="50%">';
		$tplStat .= str_replace($monthsFrom, $monthsTo, $ref['time']);
		$tplStat .= '</td>';
		$tplStat .= '<td style="text-align: right">';
		$tplStat .= $ref['referals'];
		$tplStat .= '</td>';	
		$tplStat .= '</tr>';
	}
} else {
	$tplStat = "Не найдено рефералов за последний год.";
}
$tplStat .= '</table>';
  
  
  $query = "SELECT cash_ref, cash_ref_total, cash_ref_withdrawn, cash_pending, hits, registers FROM clients WHERE login='".$_SESSION["login"]."';";
  $stats0 = mysql_query($query);
  $stats = mysql_fetch_assoc($stats0);
  $page_partner_tpl = str_replace("{part_total}", $stats['cash_ref_total'], $page_partner_tpl);
  $page_partner_tpl = str_replace("{part_balance}", $stats['cash_ref'], $page_partner_tpl);
  $page_partner_tpl = str_replace("{part_pending}", $stats['cash_pending'], $page_partner_tpl);
  $page_partner_tpl = str_replace("{part_withdrawn}", $stats['cash_ref_withdrawn'], $page_partner_tpl);
  $page_partner_tpl = str_replace("{part_hits}", $stats['hits'], $page_partner_tpl);
  $page_partner_tpl = str_replace("{part_refs}", $stats['registers'], $page_partner_tpl);
  $page_partner_tpl = str_replace("{validation}", $validationMsg, $page_partner_tpl);
  $page_partner_tpl = str_replace("{approve}", $approveMsg, $page_partner_tpl);
  
  $page_partner_tpl = str_replace("{refstats}", $tplStat, $page_partner_tpl);
  if ($needToShowStatTab) {
	  $page_partner_tpl .= '<script type="text/javascript">';
	  $page_partner_tpl .= '$(document).ready(function(){';  
	  $page_partner_tpl .= '$("#czpp_stat").click();';
	  $page_partner_tpl .= '});';
	  $page_partner_tpl .= '</script>';
  }
  echo $page_partner_tpl;
?>