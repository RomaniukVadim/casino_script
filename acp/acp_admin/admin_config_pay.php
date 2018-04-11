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

$title = "Панель администратора - Платежные настройки";
$menu = "config";
$menu_sub = "admin_config_pay.php";
$error = "";

if(isset($_GET['mode'])) $mode = $_GET['mode']; else $mode = '';

switch($mode) {
	
	//Редактирование
	//WebMoney
	case 'edit_webmoney':
	
		//Валидация
		if(isset($_POST['skey'])) $wm_skey = $_POST['skey']; else $wm_skey = '';
		if(isset($_POST['WMR'])) $wm_WMR = $_POST['WMR']; else $wm_WMR = '';
		if(isset($_POST['WMZ'])) $wm_WMZ = $_POST['WMZ']; else $wm_WMZ = '';
		if(isset($_POST['WME'])) $wm_WME = $_POST['WME']; else $wm_WME = '';
		if(isset($_POST['WMU'])) $wm_WMU = $_POST['WMU']; else $wm_WMU = '';
		
		if(!$wm_skey)$error .= "Не введёно Secret Key<br>";
		elseif(!preg_match("/^[a-zA-Zа-яА-Я0-9_]{2,50}\$/D", $wm_skey))$error .= "Не корректно Secret Key<br>";

		if(!$wm_WMR)$error .= "Не введёно WMR<br>";
		elseif(!preg_match("/^R[0-9]{12}\$/D", $wm_WMR))$error .= "Не корректно WMR<br>";

		if(!$wm_WMZ)$error .= "Не введёно WMZ<br>";
		elseif(!preg_match("/^Z[0-9]{12}\$/D", $wm_WMZ))$error .= "Не корректно WMZ<br>";

		if(!$wm_WME) $error .= "Не введёно WME<br>";
		elseif(!preg_match("/^E[0-9]{12}\$/D", $wm_WME))$error .= "Не корректно WME<br>";
		
		if(!$wm_WMU)$error .= "Не введёно WMU<br>";
		elseif(!preg_match("/^U[0-9]{12}\$/D", $wm_WMU))$error .= "Не корректно WMU<br>";
		
		//Сохранение
		if (!$error) {
		    if ($_SESSION['session_admin'] != $demo) {
		        mysql_query( "update pay_modules_webmoney set\r\n\t\tskey = '{$wm_skey}',\r\n\t\tWMR = '{$wm_WMR}',\r\n\t\tWMZ = '{$wm_WMZ}',\r\n\t\tWME = '{$wm_WME}',\r\n\t\tWMU = '{$wm_WMU}'\r\n\t\t" );
		        echo "<script>alert(\"Данные настроек WebMoney обновлены!\")</script>";
		    }
		    else die("<script>alert(\"Вы не можете редактировать настройки WebMoney в демо режиме!\");history.back();</script>");
		}
		if ($wm_skey == "" && $wm_WMR == "" && $wm_WMZ == "" && $wm_WME == "" && $wm_WMU == "") $error = "";
	break;
	
	//Interkassa
	case 'edit_interkassa':
	
		//Валидация
	    if(isset($_POST['ik_shop_id'])) $form_ik_shop_id = $_POST['ik_shop_id']; else $form_ik_shop_id = '';
		if(isset($_POST['ik_key'])) $form_ik_key = $_POST['ik_key']; else $form_ik_key = '';

		if(!$form_ik_shop_id) $error .= "Не введёно Идентификатор магазина<br>";
		elseif (!preg_match("/^[A-Z0-9-]{1,50}\$/D", $form_ik_shop_id)) $error .= "Не корректный Идентификатор магазина<br>";

		if(!$form_ik_key) $error .= "Не введёно Секретный ключ<br>";
		elseif (!preg_match("/^[A-Za-z0-9]{1,50}\$/D", $form_ik_key)) $error .= "Не корректный Секретный ключ<br>";
		
		//Сохранение
		if(!$error) {
		    if ($_SESSION['session_admin'] != $demo) {
		        mysql_query( "update pay_modules_interkassa set\r\n\t\tik_shop_id = '{$form_ik_shop_id}',\r\n\t\tik_key = '{$form_ik_key}'\r\n\t\t" );
		        echo "<script>alert(\"Данные настроек InterKassa обновлены!\");</script>";
		    } else die("<script>alert(\"Вы не можете редактировать настройки InterKassa в демо режиме!\");history.back();</script>");
		}
		if ($form_ik_shop_id == "" && $form_ik_key == "") $error = "";
	break;
	
	
		//liqpay
	case 'edit_liqpay':
	
		//Валидация
	    if(isset($_POST['merchant_id'])) $form_merchant_id = $_POST['merchant_id']; else $form_merchant_id = '';
		if(isset($_POST['merchant_password'])) $form_merchant_password = $_POST['merchant_password']; else $form_merchant_password = '';

		if(!$form_merchant_id) $error .= "Не введёно Идентификатор магазина<br>";
		elseif (!preg_match("/^[A-Z0-9-]{1,50}\$/D", $form_merchant_id)) $error .= "Не корректный Идентификатор магазина<br>";

		if(!$form_merchant_password) $error .= "Не введёно Секретный ключ<br>";
		elseif (!preg_match("/^[A-Za-z0-9]{1,50}\$/D", $form_merchant_password)) $error .= "Не корректный Секретный ключ<br>";
		
		//Сохранение
		if(!$error) {
		    if ($_SESSION['session_admin'] != $demo) {
		        mysql_query( "update pay_modules_liqpay set\r\n\t\tmerchant_id = '{$form_merchant_id}',\r\n\t\tmerchant_password = '{$form_merchant_password}'\r\n\t\t" );
		        echo "<script>alert(\"Данные настроек liqpay обновлены!\");</script>";
		    } else die("<script>alert(\"Вы не можете редактировать настройки liqpay в демо режиме!\");history.back();</script>");
		}
		if ($form_merchant_id == "" && $form_merchant_password == "") $error = "";
	break;
	
	
	
	//Robokassa
	case 'edit_robokassa':
	
		//Валидация
		if(isset($_POST['mrh_login'])) $form_mrh_login = $_POST['mrh_login']; else $form_mrh_login = '';
		if(isset($_POST['mrh_pass1'])) $form_mrh_pass1 = $_POST['mrh_pass1']; else $form_mrh_pass1 = '';
		if(isset($_POST['mrh_pass2'])) $form_mrh_pass2 = $_POST['mrh_pass2']; else $form_mrh_pass2 = '';

		if(!$form_mrh_login) $error .= "Не введён Логин<br>";
		elseif (!preg_match("/^[A-Za-z0-9-]{1,50}\$/D", $form_mrh_login)) $error .= "Не корректный Логин<br>";
		
		if(!$form_mrh_pass1) $error .= "Не введён Пароль 1<br>";
		elseif (!preg_match("/^[A-Za-z0-9-]{1,50}\$/D", $form_mrh_pass1)) $error .= "Не корректный Пароль 1<br>";

		if(!$form_mrh_pass2) $error .= "Не введён Пароль 2<br>";
		elseif (!preg_match("/^[A-Za-z0-9-]{1,50}\$/D", $form_mrh_pass2)) $error .= "Не корректный Пароль 2<br>";
		
		//Сохранение
		if (!$error) {
		    if ($_SESSION['session_admin'] != $demo) {
		        mysql_query( "update pay_modules_robokassa set\r\n\t\tmrh_login = '{$form_mrh_login}',\r\n\t\tmrh_pass1 = '{$form_mrh_pass1}',\r\n\t\tmrh_pass2 = '{$form_mrh_pass2}'\r\n\t\t" );
		        echo "<script>alert(\"Данные настроек RoboKassa обновлены!\");</script>";
		    } else echo "<script>alert(\"Вы не можете редактировать настройки RoboKassa в демо режиме!\");history.back();</script>";
		}
		if ($form_mrh_login == "" && $form_mrh_pass1 == "" && $form_mrh_pass2 == "") $error = "";
	break;
	
	//free-kassa.ru	
	case 'edit_freekassa':
	
		//Валидация
		if(isset($_POST['mrh_login'])) $form_mrh_login = $_POST['mrh_login']; else $form_mrh_login = '';
		if(isset($_POST['mrh_pass1'])) $form_mrh_pass1 = $_POST['mrh_pass1']; else $form_mrh_pass1 = '';
		if(isset($_POST['mrh_pass2'])) $form_mrh_pass2 = $_POST['mrh_pass2']; else $form_mrh_pass2 = '';

		if(!$form_mrh_login) $error .= "Не введён Логин<br>";
		elseif (!preg_match("/^[A-Za-z0-9-]{1,50}\$/D", $form_mrh_login)) $error .= "Не корректный Логин<br>";
		
		if(!$form_mrh_pass1) $error .= "Не введён Пароль 1<br>";
		elseif (!preg_match("/^[A-Za-z0-9-]{1,50}\$/D", $form_mrh_pass1)) $error .= "Не корректный Пароль 1<br>";

		if(!$form_mrh_pass2) $error .= "Не введён Пароль 2<br>";
		elseif (!preg_match("/^[A-Za-z0-9-]{1,50}\$/D", $form_mrh_pass2)) $error .= "Не корректный Пароль 2<br>";
		
		//Сохранение
		if (!$error) {
		    if ($_SESSION['session_admin'] != $demo) {
		        mysql_query( "update pay_modules_freekassa set\r\n\t\tmrh_login = '{$form_mrh_login}',\r\n\t\tmrh_pass1 = '{$form_mrh_pass1}',\r\n\t\tmrh_pass2 = '{$form_mrh_pass2}'\r\n\t\t" );
		        echo "<script>alert(\"Данные настроек Payeer обновлены!\");</script>";
		    } else echo "<script>alert(\"Вы не можете редактировать настройки Payeer в демо режиме!\");history.back();</script>";
		}
		if ($form_mrh_login == "" && $form_mrh_pass1 == "" && $form_mrh_pass2 == "") $error = "";
	break;
	
	
	
	//a1Pay
	case 'edit_a1pay':
	
		//Валидация
		if(isset($_POST['secret'])) $form_secret = $_POST['secret']; else $form_secret = '';

		if (!$form_secret) $error .= "Не введён Ключ<br>";
		elseif (!preg_match("/^[A-Za-z0-9-]{1,50}\$/D", $form_secret)) $error .= "Не корректный Ключ<br>";
		
		//Сохранение
		if (!$error) {
		    if ($_SESSION['session_admin'] != $demo) {
		        mysql_query( "update pay_modules_a1pay set\r\n\t\tsecret = '{$form_secret}'\r\n\t\t" );
		        echo "<script>alert(\"Данные настроек A1Pay обновлены!\");</script>";
		    } else die("<script>alert(\"Вы не можете редактировать настройки A1Pay в демо режиме!\");history.back();</script>");
		}
		if ($form_secret == "") $error = "";
	break;
	
	//Блокировка
	case 'block_webmoney': 
		$res = mysql_fetch_assoc(mysql_query("select * from pay_modules_webmoney"));
		$stat = $res['status'];
		if($stat == "1") mysql_query("update pay_modules_webmoney set status=0");
		elseif($stat == "0") mysql_query("update pay_modules_webmoney set status=1");
		header("Location: ".$_SERVER['HTTP_REFERER']);
	break;
	
	case 'block_interkassa':
		$res = mysql_fetch_assoc(mysql_query("select * from pay_modules_interkassa"));
		$stat = $res['status'];
		if($stat == "1") mysql_query("update pay_modules_interkassa set status=0");
		elseif($stat == "0") mysql_query("update pay_modules_interkassa set status=1");
		header("Location: ".$_SERVER['HTTP_REFERER']);
	break;
	
	
	case 'block_liqpay':
		$res = mysql_fetch_assoc(mysql_query("select * from pay_modules_liqpay"));
		$stat = $res['status'];
		if($stat == "1") mysql_query("update pay_modules_liqpay set status=0");
		elseif($stat == "0") mysql_query("update pay_modules_liqpay set status=1");
		header("Location: ".$_SERVER['HTTP_REFERER']);
	break;
	
	
	case 'block_robokassa':
		$res = mysql_fetch_assoc(mysql_query("select * from pay_modules_robokassa"));
		$stat = $res['status'];
		if($stat == "1") mysql_query("update pay_modules_robokassa set status=0");
		elseif($stat == "0") mysql_query("update pay_modules_robokassa set status=1");
		header("Location: ".$_SERVER['HTTP_REFERER']);
	break;
	
	case 'block_freekassa':
		$res = mysql_fetch_assoc(mysql_query("select * from pay_modules_freekassa"));
		$stat = $res['status'];
		if($stat == "1") mysql_query("update pay_modules_freekassa set status=0");
		elseif($stat == "0") mysql_query("update pay_modules_freekassa set status=1");
		header("Location: ".$_SERVER['HTTP_REFERER']);
	break;
	
	case 'block_a1pay':
		$res = mysql_fetch_assoc(mysql_query("select * from pay_modules_a1pay"));
		$stat = $res['status'];
		if($stat == "1") mysql_query("update pay_modules_a1pay set status=0");
		elseif($stat == "0") mysql_query("update pay_modules_a1pay set status=1");
		header("Location: ".$_SERVER['HTTP_REFERER']);
	break;
}

//Добавляем вид
include_once( "content/content_config_pay.php" );
?>
