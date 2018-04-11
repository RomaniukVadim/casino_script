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

$title = "Панель администратора - Главные настройки";
$menu = "config";
$menu_sub = "admin_config.php";
$error = "";

//Получение параметров
include_once("content/functions.php");
if(isset($_POST['siteadress'])) $site_address = $_POST['siteadress']; else $site_address = '';
if(isset($_POST['partnerproc'])) $partnerproc = $_POST['partnerproc']; else $partnerproc = '';
if(isset($_POST['partnerprocdomain'])) $partnerproc_domain = $_POST['partnerprocdomain']; else $partnerproc_domain = '';
if(isset($_POST['languagesite'])) $site_lang = $_POST['languagesite']; else $site_lang = '';
if(isset($_POST['languageadmin'])) $adm_lang = $_POST['languageadmin']; else $adm_lang = '';
if(isset($_POST['bonusreg'])) $reg_bonus = $_POST['bonusreg']; else $reg_bonus = '';
if(isset($_POST['bonustuday'])) $daily_bonus = $_POST['bonustuday']; else $daily_bonus = '';
if(isset($_POST['emailcasino'])) $casino_mail = $_POST['emailcasino']; else $casino_mail = '';
if(isset($_POST['emailadmin'])) $adm_mail = $_POST['emailadmin']; else $adm_mail = '';
if(isset($_POST['icqadmin'])) $adm_icq = $_POST['icqadmin']; else $adm_icq = '';
if(isset($_POST['notesin'])) $in_notes = $_POST['notesin']; else $in_notes = '';
if(isset($_POST['notesout'])) $out_notes = $_POST['notesout']; else $out_notes = '';
if(isset($_POST['notesres'])) $res_notes = $_POST['notesres']; else $res_notes = '';
if(isset($_POST['sitename'])) $sitename = mysql_real_escape_string($_POST['sitename']); else $sitename = '';
if(isset($_POST['keywords'])) $keywords = mysql_real_escape_string($_POST['keywords']); else $keywords = '';
if(isset($_POST['description'])) $description = mysql_real_escape_string($_POST['description']); else $description = '';
if(isset($_POST['fun_reg'])) $fun_reg = floatval($_POST['fun_reg']);  else $fun_reg = '';
if(isset($_POST['fun_day'])) $fun_day = floatval($_POST['fun_day']); else $fun_day = '';


//Проверка правильности передачи скрытых полей
if(
	$partnerproc=='' or !preg_match( "/^[0-9]{1,3}\$/D", $partnerproc) or
	$partnerproc_domain=='' or !preg_match( "/^[0-9]{1,3}\$/D", $partnerproc_domain) or
	$site_lang=='' or !preg_match( "/^[0-9]{1}\$/D", $site_lang) or
	$adm_lang=='' or !preg_match( "/^[0-9]{1}\$/D", $adm_lang) or
	$reg_bonus=='' or !preg_match( "/^[0-9.]{1,10}\$/D", $reg_bonus) or
	$daily_bonus=='' or !preg_match( "/^[0-9.]{1,10}\$/D", $daily_bonus)
) $error .= 'Несоответствие системных данных';

//Валидация данных
if (!in_array($in_notes, array("", "yes", "no"))) $error .= "Не корректное уведомление при пополнении<br>";
if (!in_array($out_notes, array("", "yes", "no"))) $error .= "Не корректное уведомление при выводе<br>";
if (!in_array($res_notes, array("", "yes", "no"))) $error .= "Не корректное  уведомление при регистрации<br>";;
if (!$site_address or !preg_match("/^([\\.A-z0-9_\\-]+)\\.([A-z]{1,4})\$/", $site_address)) $error .= "Не введён или некорректный адрес сайта<br>";
if (!$casino_mail or !preg_match("/^[A-Za-z0-9_@.-]{6,50}\$/D", $casino_mail)) $error .= "Не введён или некорректный email казино<br>";
if (!$adm_mail or !preg_match( "/^[A-Za-z0-9_@.-]{6,50}\$/D", $adm_mail)) $error .= "Не введён или некорректный email админа<br>";
if (!$adm_icq or !preg_match("/^[0-9]{3,10}\$/D", $adm_icq)) $error .= "Не введён или некорректный icq админа<br>";


if (!$error) {
    if (!$in_notes) $in_notes = "no";
    if (!$out_notes) $out_notes = "no";
    if (!$res_notes) $res_notes = "no";
    if ($_SESSION['session_admin'] != $demo) {
        mysql_query("update casino_settings set\r\n\t\tsiteadress='{$site_address}',\r\n\t\tsitename='{$sitename}',\r\n\t\tkeywords='{$keywords}',\r\n\t\tdescription='{$description}',\r\n\t\tpartnerproc='{$partnerproc}',\r\n\t\tpartnerprocdomain='{$partnerproc_domain}',\r\n\t\tlanguagesite='{$site_lang}',\r\n\t\tlanguageadmin='{$adm_lang}',\r\n\t\tbonusreg='{$reg_bonus}',\r\n\t\tbonustuday='{$daily_bonus}',\r\n\t\temailcasino='{$casino_mail}',\r\n\t\temailadmin='{$adm_mail}',\r\n\t\ticqadmin='{$adm_icq}',\r\n\t\tnotesin='{$in_notes}',\r\n\t\tnotesout='{$out_notes}',\r\n\t\tnotesres='{$res_notes}',\r\n\t\tfun_reg='{$fun_reg}',\r\n\t\tfun_day='{$fun_day}'\r\n\t\t");
        die("<script>alert(\"Данные успешно обновлены!\");location.href=\"admin_config.php\";</script>");
    } else die("<script>alert(\"Вы не можете редактировать данные в демо режиме!\");location.href=\"admin_config.php\";</script>");
}

if ($site_address == "" && $partnerproc == "" && $partnerproc_domain == "" && $site_lang == "" && $adm_lang == "" && $reg_bonus == "" && $daily_bonus == "" && $casino_mail == "" && $adm_mail == "" && $adm_icq == "" && $in_notes == "" && $out_notes == "" && $res_notes == "") $error = "";

//Добавляем форму
include_once("content/content_config.php");
?>
