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
$menu_sub = "admin_partnership_withdraw.php";

if(isset($_POST['id']) && isset($_POST['login']) && isset($_POST['money'])) {	
	$id = mysql_real_escape_string($_POST['id']);
	$login = mysql_real_escape_string($_POST['login']);
	$money = mysql_real_escape_string($_POST['money']);
	if(isset($_POST['payment'])) {
		mysql_query('UPDATE partner_withdraw SET ispaid=1 WHERE partner_withdraw_id='.$id);
		mysql_query("UPDATE clients SET cash_pending = cash_pending - $money, cash_ref_withdrawn = cash_ref_withdrawn + $money, cash = cash + $money WHERE login = '$login'");
	} else if(isset($_POST['deny'])){
		mysql_query('DELETE FROM partner_withdraw WHERE partner_withdraw_id='.$id);
		mysql_query("UPDATE clients SET cash_pending = cash_pending - $money, cash_ref = cash_ref + $money WHERE login = '$login'");
	}
}

//Загрузка списка выплат
$pageNo = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 50;
$query = "SELECT a.partner_withdraw_id AS withdraw_id, a.money, b.login FROM partner_withdraw AS a ";
$query .= "INNER JOIN clients AS b ON a.user_id = b.id ";
$query .= "WHERE a.ispaid = 0 LIMIT ".($limit*($pageNo-1)).",".($limit).";";

$usersList = mysql_query($query);
$usersListSize = mysql_num_rows($usersList);

//Строка со страницами

$query = "SELECT Count(*) FROM partner_withdraw";
$num0 = mysql_fetch_row(mysql_query($query));
$pagesCount = $num0[0];
$pagesNum = ceil($pagesCount / $limit);

$PAGES_NUM_TO_CUT = 20;
//Включаем вид
include_once( "content/content_partnership_withdraw.php" );
?>
