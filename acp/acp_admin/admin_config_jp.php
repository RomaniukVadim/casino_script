<?php
//Инициализация
session_start();

//Отправляем неавторизованных на login
if(isset($_SESSION['session_admin'])) $adm_login = $_SESSION['session_admin'];
else die("<script>location.href=\"/acp/acp_admin/login.php\";</script>");

define("CASINOENGINE", true);
define("ENGINE_DIR", $_SERVER['DOCUMENT_ROOT']."/engine_acp");

require_once($_SERVER['DOCUMENT_ROOT']."/engine/core/mysql_log.php");
require_once( ENGINE_DIR."/config/config.php" );
include_once("content/functions.php");

$title = "Панель администратора - Настройки джекпотов";
$menu = "config";
$menu_sub = "admin_config_jp.php";

if(isset($_GET['mode'])) $mode = $_GET['mode']; else $mode = '';
if(isset($_GET['id'])) $id = intval($_GET['id']); else $id = '';
//$вывод_фильтер = preg_match( "/^[0-9]{1}\$/D", $вывод );
//$id_фильтер = preg_match( "/^[0-9]{1,5}\$/D", $id );

$error='';
switch($mode) {

	//Редактирование
	case 'edit':
		if ($id) {
			//Валидация
		    if(isset($_POST['name'])) $jp_name = $_POST['name']; else $jp_name = '';
			if(isset($_POST['bank'])) $jp_sum = $_POST['bank']; else $jp_sum = '';
			if(isset($_POST['proc'])) $jp_percent = $_POST['proc']; else $jp_percent = '';
			if(isset($_POST['action'])) $jp_action_sum = $_POST['action']; else $jp_action_sum = '';
			if(isset($_POST['jp_up'])) $jp_upper_limit = $_POST['jp_up']; else $jp_upper_limit = '';
			if(isset($_POST['jp_down'])) $jp_lower_limit = $_POST['jp_down']; else $jp_lower_limit = '';
			
			if(!$jp_name) $error .= "Не введёно название джекпота<br>";
			elseif(!preg_match("/^[-_a-zA-Zа-яА-Я0-9 ]{1,50}\$/D", $jp_name)) $error .= "Не корректно название джекпота<br>";
			
			if(!$jp_sum) $error .= "Не введёно текущее значание джекпота<br>";
			elseif(!preg_match("/^[0-9.]{1,20}\$/D", $jp_sum)) $error .= "Не корректно текущее значание джекпота<br>";
			
			if (!$jp_percent) $error .= "Не введён процент джекпота<br>";
			elseif(!preg_match("/^[0-9]{1,3}\$/D", $jp_percent)) $error .= "Не корректный процент джекпота<br>";
			
			if (100 < $jp_percent) $error .= "Процент не может быть больше 100%<br>";
			
			if (!$jp_action_sum) $error .= "Не введёна сумма срабатывания<br>";
			elseif(!preg_match("/^[0-9.]{1,20}\$/D", $jp_action_sum))$error .= "Не корректная сумма срабатывания<br>";
			
			if (!$jp_upper_limit)$error .= "Не введён верхний предел джекпота<br>";
			elseif(!preg_match("/^[0-9.]{1,20}\$/D", $jp_upper_limit)) $error .= "Не корректный верхний предел джекпота<br>";
			
			if (!$jp_lower_limit)$error .= "Не введён нижний предел джекпота<br>";
			elseif(!preg_match("/^[0-9.]{1,20}\$/D", $jp_lower_limit))$error .= "Не корректный нижний предел джекпота<br>";
			
			//Сохранение данных
			if (!$error) {
				if ($_SESSION['session_admin'] != $demo) {
				    mysql_query( "update games_jp set\r\n\t\tname = '{$jp_name}',\r\n\t\tjp = '{$jp_sum}',\r\n\t\tproc = '{$jp_percent}',\r\n\t\taction = '{$jp_action_sum}',\r\n\t\tjp_up = '{$jp_upper_limit}',\r\n\t\tjp_down = '{$jp_lower_limit}'\r\n\t\twhere id = '{$id}'\r\n\t\t" );
				    echo "<script>alert(\"Джекпот ".$jp_name." успешно обновлен!\");</script>";
				}
				else echo "<script>alert(\"Вы не можете редактировать джекпот в демо режиме!\");history.back();</script>";
	
			}
			if ($jp_name == "" && $jp_sum == "" && $jp_percent == "" && $jp_action_sum == "" && $jp_upper_limit == "" && $jp_lower_limit == "" ) $error = "";
		}
	break;
	case 'add':
			//Валидация
		    if(isset($_POST['name'])) $jp_name = $_POST['name']; else $jp_name = '';
			if(isset($_POST['bank'])) $jp_sum = $_POST['bank']; else $jp_sum = '';
			if(isset($_POST['proc'])) $jp_percent = $_POST['proc']; else $jp_percent = '';
			if(isset($_POST['action'])) $jp_action_sum = $_POST['action']; else $jp_action_sum = '';
			if(isset($_POST['jp_up'])) $jp_upper_limit = $_POST['jp_up']; else $jp_upper_limit = '';
			if(isset($_POST['jp_down'])) $jp_lower_limit = $_POST['jp_down']; else $jp_lower_limit = '';
			
			if(!$jp_name) $error .= "Не введёно название джекпота<br>";
			elseif(!preg_match("/^[-_a-zA-Zа-яА-Я0-9 ]{1,50}\$/D", $jp_name)) $error .= "Не корректно название джекпота<br>";
			
			if(!$jp_sum) $error .= "Не введёно текущее значание джекпота<br>";
			elseif(!preg_match("/^[0-9.]{1,20}\$/D", $jp_sum)) $error .= "Не корректно текущее значание джекпота<br>";
			
			if (!$jp_percent) $error .= "Не введён процент джекпота<br>";
			elseif(!preg_match("/^[0-9]{1,3}\$/D", $jp_percent)) $error .= "Не корректный процент джекпота<br>";
			
			if (100 < $jp_percent) $error .= "Процент не может быть больше 100%<br>";
			
			if (!$jp_action_sum) $error .= "Не введёна сумма срабатывания<br>";
			elseif(!preg_match("/^[0-9.]{1,20}\$/D", $jp_action_sum))$error .= "Не корректная сумма срабатывания<br>";
			
			if (!$jp_upper_limit)$error .= "Не введён верхний предел джекпота<br>";
			elseif(!preg_match("/^[0-9.]{1,20}\$/D", $jp_upper_limit)) $error .= "Не корректный верхний предел джекпота<br>";
			
			if (!$jp_lower_limit)$error .= "Не введён нижний предел джекпота<br>";
			elseif(!preg_match("/^[0-9.]{1,20}\$/D", $jp_lower_limit))$error .= "Не корректный нижний предел джекпота<br>";
			
			//Сохранение данных
			if (!$error) {
				mysql_query( "INSERT INTO games_jp\r\n\t\t(`id`, `name` ,`jp`, `proc`, `action`, `jp_up`, `jp_down`) VALUES\r\n\t\t(NULL,'".$jp_name."','".$jp_sum."', '".$jp_percent."', '".$jp_action_sum."', '".$jp_upper_limit."', '".$jp_lower_limit."')" );
				die("<script>alert(\"Джекпот ".$jp_name." успешно добавлен!\");location.href=\"/acp/acp_admin/admin_config_jp.php\";</script>");
			}
			if ($jp_name == "" && $jp_sum == "" && $jp_percent == "" && $jp_action_sum == "" && $jp_upper_limit == "" && $jp_lower_limit == "" ) $error = "";

	break;
	case 'delete':
		if ($id == 1) die("<script>alert(\"Джекпот с id:".$id." нельзя удалить!\");location.href=\"/acp/acp_admin/admin_config_jp.php\";</script>");
		if ( $_SESSION['session_admin'] != $demo ) {
		    mysql_query( "DELETE FROM games_jp WHERE id = '{$id}' LIMIT 1" );
		    die("<script>alert(\"Джекпот с id:".$id." успешно удалён!\");location.href=\"/acp/acp_admin/admin_config_jp.php\";</script>");
		}
		else die("<script>alert(\"Вы не можете удалить джекпот в демо режиме!\");<script>history.back();</script>");
	break;
}

//Добаляем вид
include_once( "content/content_config_jp.php" );
?>
