<?php
/*
 * Партнёрка
 * 
 */
//Инициализация
session_start();

//Отправляем неавторизованных на login
if(isset($_SESSION['session_admin'])) $adm_login = $_SESSION['session_admin'];
else die("<script>location.href=\"/acp/acp_admin/login.php\";</script>");

define("CASINOENGINE", true);
define("ENGINE_DIR", $_SERVER['DOCUMENT_ROOT']."/engine_acp");

require_once($_SERVER['DOCUMENT_ROOT']."/engine/core/mysql_log.php");
require_once(ENGINE_DIR."/config/config.php");
include_once("content/functions.php");

$title = "Панель администратора - Настройки партнёрской программы";
$menu = "partnership";
$menu_sub = "admin_partnership_options.php";

if(isset($_POST['partner_switch'])) {
	$val = mysql_real_escape_string($_POST['partner_switch']);
	if($val == 'on') $val = '1';
		else $val = '0';
	mysql_query('UPDATE settings SET val=\''.$val.'\' WHERE `key` = \'partner_switch\'');
}
if(isset($_POST['partner_percentage'])) {
	$val = mysql_real_escape_string($_POST['partner_percentage']);
	if((is_numeric($var)) && ((int)$var > 0))
		$var = round($var, 2); 
	mysql_query('UPDATE settings SET val=\''.$val.'\' WHERE `key` = \'partner_percentage\'');
}

//Загрузка параметров партнёрки
$isEnabled = 'no';
$percentage = '10';

$partData = array();
$part_options = mysql_query("SELECT * FROM settings WHERE `key` LIKE 'partner_%';");
$resSize = mysql_num_rows($part_options);
for($i = 0; $i < $resSize; $i++) {
	$opt = mysql_fetch_assoc($part_options);
	$partData[$opt['key']] = $opt['val'];
}
$isEnabled = $partData['partner_switch'];
$percentage = $partData['partner_percentage'];
//Загрузка параметров партнёрки: конец

//Включаем вид
include_once( "content/content_partnership_options.php" );
?>
