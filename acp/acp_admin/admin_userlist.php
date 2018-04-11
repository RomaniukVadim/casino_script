<?php
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

$title = "Панель администратора - Список пользователй";
$menu = "user";
$menu_sub = "admin_userlist.php";

if(isset($_GET['mode'])) $mode = $_GET['mode']; else $mode = '';
if(isset($_GET['list'])) $list = $_GET['list']; else $list = '';
if(isset($_GET['id'])) $id = intval($_GET['id']); else $id = '';

//Контроллер
switch($mode) {

	//Верхнее меню
	case 'list':
		if ($list and preg_match( "/^[0-9]{1}\$/D", $list)) {
			switch($list) {
				case "1": $db_order = " WHERE login<>'guestlogin' and cash>0"; break;
				case "2": $db_order = " WHERE login<>'guestlogin' and cash<=0"; break;
				case "3": $db_order = " WHERE login<>'guestlogin' and status=1"; break;
				case "4": $db_order = " WHERE login<>'guestlogin' and status=0"; break;
			}
		} else $db_order = " WHERE login<>'guestlogin'";
	break;
	
	//Блокировка пользователя
	case 'block':
	    $res = mysql_fetch_array(mysql_query("select * from clients where id='{$id}'"));
		$stat = $res['status'];
		if ($stat == "1") mysql_query( "update clients set status='0' where id='{$id}'" );
		if ($stat == "0") mysql_query( "update clients set status='1' where id='{$id}'" );
		header( "Location: ".$_SERVER['HTTP_REFERER']);
	break;
	
	//Редактирование пользователя
	case 'edituser':
		$error ='';
		if(isset($_POST['login'])) $form_login = $_POST['login']; else $form_login ='';
		if(isset($_POST['email'])) $form_email = $_POST['email']; else $form_email ='';
		if($form_login and preg_match( "/^[A-Za-z0-9]{2,20}\$/D", $form_login)) {
			if($form_email and preg_match( "/^([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9_-])+(\\.[a-zA-Z0-9]+[a-zA-Z0-9_-]*)+\$/D", $form_email))
			mysql_query( "update clients set login='{$form_login}', email='{$form_email}' where id='{$id}'");
			else $error = "email не корректен";
		} else $error = "Логин не корректен";
		if($form_login == "" && $form_email == "") $error = "";
	break;
	
	//Редактирование заметок администратора
	case 'editnotesadmin':
		if(isset($_POST['content'])) {
			$note = mysql_real_escape_string($_POST['content']);
			mysql_query("UPDATE `clients` SET `admin_notes`='{$note}' where id='{$id}'");
			header( "Location: ".$_SERVER['HTTP_REFERER']);
			die();
		}
	break;
	
	//Редактирование заметок оператора
	case 'editnotesoper':
		if(isset($_POST['content'])) {
			$note = mysql_real_escape_string($_POST['content']);
			mysql_query("UPDATE `clients` SET `operator_notes`='{$note}' where id='{$id}'");
			header( "Location: ".$_SERVER['HTTP_REFERER']);
			die();
		}
	break;
	
	//Редактирование баланса
	case 'balance':
		$error='';
	    if(isset($_POST['WMR'])) $form_WMR = $_POST['WMR']; else $form_WMR = '';
		if(isset($_POST['FUN'])) $form_FUN = $_POST['FUN']; else $form_FUN = '';
				
		if (!$form_WMR) $error .= "Не введён WMR<br>";
		elseif (!preg_match("/^[0-9.]{1,9}\$/D", $form_WMR)) $error .= "Не корректный WMR<br>";
		
		if (!$form_FUN) $error .= "Не введён FUN<br>";
		elseif (!preg_match("/^[0-9.]{1,9}\$/D", $form_FUN)) $error .= "Не корректный FUN<br>";
		
		if ($form_WMR < 0) $error .= "WMR не может быть минусовым<br>";
		if ($form_FUN < 0 ) $error .= "FUN не может быть минусовым<br>";

		if($error == "") {
			$cur_user = mysql_fetch_assoc(mysql_query("select `login` from clients where id='{$id}'"));
		    mysql_query("update clients set\r\n\t\tcash = '{$form_WMR}',\r\n\t\tcashfun = '{$form_FUN}'\r\n\t\twhere login='{$cur_user['login']}'\r\n\t\t" );
		    echo "<script>alert(\"Данные баланса обновлены!\");</script>";
		}
		if($form_WMR == "" && $form_FUN == "") $error = "";
	break;
	
	//Удаление пользователя
	case 'delete':
	$cur_user = mysql_fetch_assoc(mysql_query("select `login` from clients where id='{$id}'"));
		if ($_SESSION['session_admin'] != $demo ) {
		    mysql_query("delete from clients where id='".$id."'");
		    mysql_query("delete from pay_deposits where user='".$cur_user['login']."'");
		    mysql_query("delete from pay_withdrawals where user='".$cur_user['login']."'");
			mysql_query("delete from games_stats where login='".$cur_user['login']."'");
		    die("<script>alert(\"Пользователь: ".$cur_user['login']." успешно удалён!\");location.href=\"/acp/acp_admin/admin_userlist.php?&mode=list\";</script>");
		} else die("<script>alert(\"Вы не можете удалять данные в демо режиме!\");history.back();</script>");
	break;
}

//Включаем вид
include_once( "content/content_userlist.php" );
?>
