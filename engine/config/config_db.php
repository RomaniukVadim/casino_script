<?php 
// Проверим на доступ
if (!defined('CASINOENGINE')) {
	die("Нет доступа!<script>location.href='/';</script>");
} 

$dbhost = "localhost"; //имя хоста (обычно localhost)
$dbuname = "bduser"; //имя пользователя
$dbpass = "pass"; //пароль
$dbname = "bdname"; //имя базы

$site['coding']    = "cp1251";
$site['loc']       = "cp1251_general_ci";

$full_base = @mysql_pconnect($dbhost, $dbuname, $dbpass) or die("<br><br><center><br><br><b>Не удалось подключится к базе данных, пожалуйста установите корректные данные и обновите страничку.</center></b>");
@mysql_select_db($dbname, $full_base) or die("<br><br><center><br><br><b>Некорректно указано имя рабочей базы, пожалуйста установите корректные данные и обновите страничку.</center></b>");

@mysql_query("SET NAMES '".$site['coding']."'");
@mysql_query("SET CHARACTER SET '".$site['coding']."'");
@mysql_query("SET @@collation_connection = ".$site['loc']."");

?>