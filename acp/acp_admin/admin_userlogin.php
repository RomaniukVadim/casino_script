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

$username = $_GET['user'];
$_SESSION['login'] = $username;
$session_id = "CASINOSOFT".$_SERVER['HTTP_USER_AGENT'].$_SERVER['HTTP_ACCEPT_CHARSET'];
$session_id  = md5($session_id .session_id());
$_SESSION['sid'] = $session_id ;
header("Location: /");

?>
