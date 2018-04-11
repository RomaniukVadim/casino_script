<?php
function getip() {
	if (getenv("HTTP_CLIENT_IP")) $ip = getenv("HTTP_CLIENT_IP");
	else if (getenv("HTTP_X_FORWARDED_FOR")) $ip = getenv("HTTP_X_FORWARDED_FOR");
	else $ip = getenv("REMOTE_ADDR");
	return $ip;
}


defined("CASINOENGINE") or die("Нет доступа!<script>location.href='/';</script>");

  if($_SESSION['jp_win']='') $_SESSION['jp_win'] = false;
  $ip = getip();
  $jp = mysql_fetch_assoc(mysql_query("
  	SELECT `games`.*,
  	`games_jp`.`jp` AS `jp_jackpot`,
  	`games_jp`.`action` AS `jp_action`,
  	`games_jp`.`jp_down` AS `jp_down_limit`,
  	`games_jp`.`jp_up` AS `jp_upper_limit`
  	FROM `games`
  	LEFT JOIN `games_jp` ON `games_jp`.`id`=`games`.`id_jp`
  	WHERE `games`.`name`='".$game_name."'"));

  if($jp['jp_action'] < $jp['jp_jackpot']) {
      $login = $_SESSION['login'];
      $date  = date("d.m.Y H:i:s");
      mysql_query("update games_jp set jp=jp-{$jp['jp_action']} where id='{$jp['id_jp']}'");
      mysql_query("update clients set cash=cash+{$jp['jp_action']} where login='{$login}'");
      mysql_query("INSERT INTO games_stats_jp VALUES(NULL,'{$date}','{$jp['jp_action']}','{$login}','{$ip}', '{$_SESSION['sid']}','{$game_name}')");
      $jackpot_action = rand($jp['jp_down'], $jp['jp_up']);
      mysql_query("update games_jp set action='{$jackpot_action}', jp='0' where id='{$jp['id_jp']}'");
      $_SESSION['jp_win'] = true;
      $date               = date("d.m.y");
      $time               = date("H:i:s");
      $ip                 = $_SERVER['REMOTE_ADDR'];
      $login              = filter($_SESSION['login']);
      $summa              = $jp['jp_action'];
      mysql_query("INSERT INTO pay_deposits VALUES('', '{$login}', '{$summa}', '{$date}','{$time}', '{$ip}','JACKPOT','','0','Поздравляем вы выиграли Джекпот, сумма зачисленна вам на счёт! В размере: {$summa} Кредитов','')");
  }
?>
