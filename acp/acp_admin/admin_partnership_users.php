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

$title = "Панель администратора - Список партнёров";
$menu = "partnership";
$menu_sub = "admin_partnership_users.php";

if(isset($_POST['ban']) && isset($_POST['id']) && isset($_POST['action'])) {
	$id = mysql_real_escape_string($_POST['id']);
	$action = mysql_real_escape_string($_POST['action']);
	mysql_query('UPDATE clients SET partner_blocked=\''.$action.'\' WHERE id='.$id);
}

//Загрузка списка партнёров
$pageNo = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 50;
$query = "SELECT id, cash_ref_total, hits, registers, login, partner_blocked FROM clients ORDER BY login LIMIT ".($limit*($pageNo-1)).",".($limit).";";
$usersList = mysql_query($query);
$usersListSize = mysql_num_rows($usersList);

//Строка со страницами
$query = "SELECT Count(*) FROM clients";
$num0 = mysql_fetch_row(mysql_query($query));
$pagesCount = $num0[0];
$pagesNum = ceil($pagesCount / $limit);

$PAGES_NUM_TO_CUT = 20;

//Включаем вид
include_once("content/content_partnership_users.php");
?>
