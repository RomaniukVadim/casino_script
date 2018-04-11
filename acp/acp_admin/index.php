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

$title = "Панель администратора (wm-scripts.ru) - Центр уведолений и поддержки";
$menu = "config";
$menu_sub = "index.php";
if(isset($_GET['id'])) $id = (int)$_GET['id']; else $id='';
if(isset($_GET['mode'])) $mode = $_GET['mode']; else $mode='';
$pattern = "/^[a-z]{2,20}\$/D";

//Подобие контроллера
if($mode && $id && preg_match($pattern, $mode) && preg_match($pattern, $id)) {
	switch($mode) {

		//Отправка ответа по тикету в ЛС
		case 'reply_send':
			$ticket_message = mysql_escape_string($_POST['reply']);
			if (!$ticket_message) echo "<script>alert(\"Введите сообщение!\");window.history.back();</script>";
			$ticket_answer = mysql_fetch_array(mysql_query("SELECT * FROM `casino_pm` WHERE id='".$id."'"));
			$time = time();
			mysql_query(
				"UPDATE `casino_pm` SET 
					`reply`=`reply`+1,
					`pm_read`='no',
					`pm_read_from`='no'
				WHERE `id`='".$id."'" );
			mysql_query(
				"INSERT INTO `casino_pm` (subj, text, user, user_from, date, pm_read, folder, id_sub) 
				VALUES ('".$ticket_answer['subj']."', '".$ticket_message."', '".$ticket_answer['user']."', '".$ticket_answer['user_from']."', '$time', 'no', 'inbox','".$id."')");
			die("<script>location.href=\"/acp/acp_admin/index.php\";</script>");
		break;

		//Удаление сообщения из ЛС
		case 'delete':
			mysql_query("DELETE FROM `casino_pm` WHERE `id` = '{$id}' LIMIT 1");
			mysql_query("DELETE FROM `casino_pm` WHERE `id_sub` = '{$id}'");
			echo "<script>alert(\"Cообщение успешно удалено!\");location.href=\"/acp/acp_admin/index.php\";</script>";
			die();
		break;

		//Новое сообщение
		case 'new_message_send':

			//Валидация от sql_inject
			$ticket_message = mysql_escape_string($_POST['message']);
			$ticket_username = mysql_escape_string($_POST['login']);
			$ticket_theme = mysql_escape_string($_POST['subj']);
			if (!$ticket_message) die("<script>alert(\"Введите сообщение!\");window.history.back();</script>");
			if (!$ticket_theme) die("<script>alert(\"Введите тему сообщения!\");window.history.back();</script>");
			if (!$ticket_username) die("<script>alert(\"Введите имя пользователя, для кого сообщение!\");window.history.back();</script>");

			//Выборка из БД
			$ticket = mysql_fetch_assoc(mysql_query("SELECT * FROM `clients` WHERE `login`='".$ticket_username."'"));
			if(!$ticket) die("<script>alert(\"Введите существующее имя пользователя!\");window.history.back();</script>");
			$time = time();
			mysql_query(
			"INSERT INTO `casino_pm` (subj, text, user, user_from, date, pm_read, folder, id_sub) 
			VALUES ('".$ticket_theme."', '".$ticket_message."', '".$ticket_username."', 'admin', '$time', 'no', 'outbox','0')");
			die("<script>alert(\"Ваше сообщение успешно отправленно!\");location.href=\"/acp/acp_admin/index.php?mode=outbox\";</script>");
		break;
	}
} else include_once("content/content_index.php");
?>
