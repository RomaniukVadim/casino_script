<?php


error_reporting(0);
//include ("setup.php");
include("../core/setup.php");


$amarok_tables=array();
$amarok_tables['amarok_banks']="CREATE TABLE IF NOT EXISTS `amarok_banks` (
  `id` int(11) NOT NULL auto_increment,
  `type` enum('game','profit') NOT NULL,
  `title` varchar(50) NOT NULL,
  `balance` double NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `type` (`type`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=cp1251;";

$amarok_tables['amarok_game_configs']="CREATE TABLE IF NOT EXISTS `amarok_game_configs` (
  `game_name` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` enum('char','int','float','bool')  default 'char',
  `value_char` varchar(255) NOT NULL,
  `value_int` int(11) NOT NULL,
  `value_float` double NOT NULL,
  PRIMARY KEY  (`game_name`,`name`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;";


$amarok_tables['amarok_game_statistics']="CREATE TABLE IF NOT EXISTS `amarok_game_statistics` (
  `game_date` datetime NOT NULL,
  `game_name` varchar(20) NOT NULL,
  `game_postfix` varchar(20) NOT NULL,
  `player_login` varchar(20) NOT NULL,
  `player_balance` double NOT NULL,
  `bank_id` int(11) NOT NULL,
  `bank_balance` double default NULL,
  `bet` double NOT NULL,
  `win` double NOT NULL,
  PRIMARY KEY  (`game_date`,`game_name`,`player_login`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;";

$amarok_tables['amarok_game_debug']="CREATE TABLE IF NOT EXISTS `amarok_game_debug` (
  `date` datetime NOT NULL,
  `client_addr` int(11) unsigned NOT NULL,
  `game_name` varchar(20) default NULL,
  `message` text,
  KEY `date` (`date`,`client_addr`),
  KEY `date_2` (`date`,`game_name`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 PACK_KEYS=0;";

$amarok_tables['amarok_game_player_statistics_average']="CREATE TABLE IF NOT EXISTS `amarok_game_player_statistics_average` (
  `game_name` varchar(20) NOT NULL,
  `player_login` varchar(20) NOT NULL,
  `games_count_total` bigint(15) NOT NULL,
  `games_count_win` bigint(15) NOT NULL,
  `games_count_lose` bigint(15) NOT NULL,
  `games_count_lose_out` bigint(15) NOT NULL,
  `games_count_drawn` bigint(15) NOT NULL,
  `bet_min` double NOT NULL,
  `bet_max` double NOT NULL,
  `bet_total` double NOT NULL,
  `win_min` double NOT NULL,
  `win_max` double NOT NULL,
  `win_total` double NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY  (`game_name`,`player_login`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;";

$amarok_tables['amarok_game_statistics_average']="CREATE TABLE IF NOT EXISTS `amarok_game_statistics_average` (
  `game_name` varchar(20) NOT NULL default '',
  `games_count_total` bigint(15) NOT NULL,
  `games_count_win` bigint(15) NOT NULL,
  `games_count_lose` bigint(15) NOT NULL,
  `games_count_lose_out` bigint(15) NOT NULL,
  `games_count_drawn` bigint(15) NOT NULL,
  `players_count_total` bigint(15) NOT NULL,
  `players_count_winners` bigint(15) NOT NULL,
  `players_count_losers` bigint(15) NOT NULL,
  `bet_min` double NOT NULL,
  `bet_max` double NOT NULL,
  `bet_total` double NOT NULL,
  `win_min` double NOT NULL,
  `win_max` double NOT NULL,
  `win_total` double NOT NULL,
  `game_bank_balance_min` double NOT NULL,
  `game_bank_balance_max` double NOT NULL,
  `game_bank_balance_average` double NOT NULL,
  `player_balance_min` double NOT NULL,
  `player_balance_max` double NOT NULL,
  `player_balance_average` double NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY  (`game_name`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;";

$amarok_tables['amarok_player_statistics_average']="CREATE TABLE IF NOT EXISTS `amarok_player_statistics_average` (
  `player_login` varchar(20) NOT NULL,
  `games_count_total` bigint(15) NOT NULL,
  `games_count_win` bigint(15) NOT NULL,
  `games_count_lose` bigint(15) NOT NULL,
  `games_count_lose_out` bigint(15) NOT NULL,
  `games_count_drawn` bigint(15) NOT NULL,
  `bet_min` double NOT NULL,
  `bet_max` double NOT NULL,
  `bet_total` double NOT NULL,
  `win_min` double NOT NULL,
  `win_max` double NOT NULL,
  `win_total` double NOT NULL,
  `balance_min` double NOT NULL,
  `balance_max` double NOT NULL,
  `balance_average` double NOT NULL,
  `cash_input_min` double NOT NULL,
  `cash_input_max` double NOT NULL,
  `cash_input_total` double NOT NULL,
  `cash_input_average` double NOT NULL,
  `cash_output_min` double NOT NULL,
  `cash_output_max` double NOT NULL,
  `cash_output_total` double NOT NULL,
  `cash_output_average` double NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY  (`player_login`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;";



$init_records=array();
$init_records[]="INSERT INTO `amarok_banks` (`id`, `type`, `title`, `balance`) VALUES (1, 'profit', 'Прибыль', 0.00)";
$init_records[]="INSERT INTO `amarok_banks` (`id`, `type`, `title`, `balance`) VALUES (2, 'game', 'Игровой', 0.00)";
$init_records[]="INSERT INTO `amarok_game_configs` (`game_name`, `name`, `type`, `value_char`, `value_int`, `value_float`) VALUES ('Cartoons', 'debug', 'bool', 'false', 0, 0)";
$init_records[]="INSERT INTO `amarok_game_configs` (`game_name`, `name`, `type`, `value_char`, `value_int`, `value_float`) VALUES ('Cartoons', 'coinsize', 'float', '', 0, 0.25)";
$init_records[]="INSERT INTO `amarok_game_configs` (`game_name`, `name`, `type`, `value_char`, `value_int`, `value_float`) VALUES ('Cartoons', 'game_bank', 'int', '', 2, 0)";
$init_records[]="INSERT INTO `amarok_game_configs` (`game_name`, `name`, `type`, `value_char`, `value_int`, `value_float`) VALUES ('Cartoons', 'free_game_bank', 'int', '', 2, 0)";
$init_records[]="INSERT INTO `amarok_game_configs` (`game_name`, `name`, `type`, `value_char`, `value_int`, `value_float`) VALUES ('Cartoons', 'free_percent', 'float', '', 0, 0)";
$init_records[]="INSERT INTO `amarok_game_configs` (`game_name`, `name`, `type`, `value_char`, `value_int`, `value_float`) VALUES ('Cartoons', 'profit_bank', 'int', '', 1, 0)";
$init_records[]="INSERT INTO `amarok_game_configs` (`game_name`, `name`, `type`, `value_char`, `value_int`, `value_float`) VALUES ('Cartoons', 'profit_percent', 'float', '', 0, 50)";
$init_records[]="INSERT INTO `amarok_game_configs` (`game_name`, `name`, `type`, `value_char`, `value_int`, `value_float`) VALUES ('Cartoons', 'testing', 'bool', 'false', 0, 0)";
$init_records[]="INSERT INTO `amarok_game_configs` (`game_name`, `name`, `type`, `value_char`, `value_int`, `value_float`) VALUES ('Cartoons', 'free_game_chance', 'int', '', 9, 0)";
$init_records[]="INSERT INTO `amarok_game_configs` (`game_name`, `name`, `type`, `value_char`, `value_int`, `value_float`) VALUES ('Cartoons', 'win_chance', 'int', '', 9, 0)";
$init_records[]="INSERT INTO `amarok_game_configs` (`game_name`, `name`, `type`, `value_char`, `value_int`, `value_float`) VALUES ('Cartoons', 'onfree_free_game_chance', 'int', '', 12, 0)";
$init_records[]="INSERT INTO `amarok_game_configs` (`game_name`, `name`, `type`, `value_char`, `value_int`, `value_float`) VALUES ('Cartoons', 'onfree_win_chance', 'int', '', 6, 0)";
$init_records[]="INSERT INTO `amarok_game_configs` (`game_name`, `name`, `type`, `value_char`, `value_int`, `value_float`) VALUES ('Cartoons', 'onfree_win_multiplication', 'int', '', 3, 0)";
$init_records[]="INSERT INTO `amarok_game_configs` (`game_name`, `name`, `type`, `value_char`, `value_int`, `value_float`) VALUES ('Cartoons', 'wildchar_win_multiplication', 'int', '', 2, 0)";

# Installation starts here

echo "<h2>Инсталляция</h2><br>";

foreach ($amarok_tables as $table => $sql) {
  $q=mysql_query($sql);
  if (mysql_errno()!=0) {
    echo "<b>Добавление таблицы `".$table."`:&nbsp;&nbsp;[&nbsp;<font color=\"red\">FAIL</font>&nbsp;]</b><br>";
    echo "<b>[".mysql_errno().":".mysql_error()."]</b><br>";
    echo "<pre>";
    echo $sql;
    echo "</pre><br>";
  } else {
    echo "<b>Добавление таблицы `".$table."`:&nbsp;&nbsp;[&nbsp;<font color=\"green\">OK</font>&nbsp;]</b><br>";
  }
}

foreach ($init_records as $sql) {
  $q=mysql_query($sql);
  if (mysql_errno()!=0) {
    echo "<b>Добавление данных:&nbsp;&nbsp;[&nbsp;<font color=\"red\">FAIL</font>&nbsp;]</b><br>";
    echo "<b>[".mysql_errno().":".mysql_error()."]</b><br>";
    echo "<pre>";
    echo $sql;
    echo "</pre><br>";
  } else {
    echo "<b>Добавление данных:&nbsp;&nbsp;[&nbsp;<font color=\"green\">OK</font>&nbsp;]</b><br>";
  }
}

echo "<br><br><b>Завершено.</b>";
