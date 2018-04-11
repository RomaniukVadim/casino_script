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

$title = "Панель администратора - История игр";
$menu = "statistic";
$menu_sub = "admin_statistic_history.php";

$mode = $_GET['mode'];
$list = $_GET['list'];
$id = $_GET['id'];
$mode_filter = preg_match( "/^[0-9]{1}\$/D", $mode );
$list_filter = preg_match( "/^[a-z]{2,20}\$/D", $list );
$id_filter = preg_match( "/^[0-9]{1,10}\$/D", $id );
if ( $mode == "clear" )
{
    @mysql_query( "TRUNCATE TABLE `games_stats`" );
    echo "<script>alert(\"Ировая статистика успешно очищенна!\");</script>";
    echo "<script>location.href=\"/acp/acp_admin/admin_statistic_history.php\";</script>";
}
include_once( "content/content_statistic_history.php" );
?>
