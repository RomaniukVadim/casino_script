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

$title = "Панель администратора - Настройки игр";
$menu = "games";
$menu_sub = "admin_config_games.php";


$режим = $_GET['mode'];
$id = $_GET['id'];
$режим_фильтер = preg_match( "/^[a-z]{2,20}\$/D", $режим );
$id_фильтер = preg_match( "/^[0-9]{1,5}\$/D", $id );
if ( $режим == "edit" && $id != "" && $id_фильтер == true )
{
    $check_id = @mysql_fetch_array( @mysql_query( "select * from games where id='".$id."'" ) );
    if ( $check_id == "" || $check_id == 0 )
    {
        echo "<script>location.href=\"/acp/acp_admin/admin_config_games.php\";</script>";
        exit( );
        exit( );
    }
}
if ( $режим == "edit_save" )
{
    $id = intval( $_POST['id'] );
    $check_id = @mysql_fetch_array( @mysql_query( "select * from games where id='".$id."'" ) );
    if ( $check_id == "" || $check_id == 0 )
    {
        echo "<script>location.href=\"/acp/acp_admin/admin_config_games.php\";</script>";
        exit( );
        exit( );
    }
    $main_bank = intval( $_POST['main_bank'] );
    $main_fun_bank = intval( $_POST['main_fun_bank'] );
    $main_jp_bank = intval( $_POST['main_jp_bank'] );
    $risk_bonus_0 = intval( $_POST['risk_bonus_0'] );
    $risk_bonus_1 = intval( $_POST['risk_bonus_1'] );
    $risk_bonus_2 = intval( $_POST['risk_bonus_2'] );
    $risk_win_1 = intval( $_POST['risk_win_1'] );
    $risk_win_3 = intval( $_POST['risk_win_3'] );
    $risk_win_5 = intval( $_POST['risk_win_5'] );
    $risk_win_7 = intval( $_POST['risk_win_7'] );
    $risk_win_9 = intval( $_POST['risk_win_9'] );
    $risk_double = intval( $_POST['risk_ddouble'] );
    if ( $risk_bonus_1 == 0 )
    {
        $risk_bonus_1 = "";
    }
    if ( $risk_bonus_2 == 0 )
    {
        $risk_bonus_2 = "";
    }
    if ( $_SESSION['session_admin'] != $demo )
    {
        @mysql_query( "update games set\r\n\t\tid_bank = '".$main_bank."',\r\n\t\tid_funbank = '".$main_fun_bank."',\r\n\t\tid_jp = '".$main_jp_bank."',\r\n\t\tbonus = '".$risk_bonus_0."|".$risk_bonus_1."|".$risk_bonus_2."',\r\n\t\twin = '".$risk_win_1."|".$risk_win_3."|".$risk_win_5."|".$risk_win_7."|".$risk_win_9."',\r\n\t\tddouble = '".$risk_double."'\r\n\t\twhere id='".$id."'\r\n\t\t" );
        echo "<script>alert(\"Данные успешно обновлены!\");</script>";
        echo "<script>location.href=\"/acp/acp_admin/admin_config_games.php?mode=edit&id=".$id."\";</script>";
    }
    else
    {
        echo "<script>alert(\"Вы не можете редактировать данные в демо режиме!\");</script>";
        echo "<script>history.back();</script>";
    }
}
if ( $режим == "edit_extended_save" )
{
    $id = intval( $_POST['id'] );
    $check_id = @mysql_fetch_array( @mysql_query( "select * from games where id='".$id."'" ) );
    if ( $check_id == "" || $check_id == 0 )
    {
        echo "<script>location.href=\"/acp/acp_admin/admin_config_games.php\";</script>";
        exit( );
        exit( );
    }
    $main_bank = intval( $_POST['main_bank'] );
    $main_fun_bank = intval( $_POST['main_fun_bank'] );
    $main_jp_bank = intval( $_POST['main_jp_bank'] );
    $risk_game1_1 = intval( $_POST['risk_game1_1'] );
    $risk_game1_2 = intval( $_POST['risk_game1_2'] );
    $risk_game1_3 = intval( $_POST['risk_game1_3'] );
    $risk_game1_4 = intval( $_POST['risk_game1_4'] );
    $risk_game1_5 = intval( $_POST['risk_game1_5'] );
    $risk_game2_1 = intval( $_POST['risk_game2_1'] );
    $risk_game2_2 = intval( $_POST['risk_game2_2'] );
    $risk_game2_3 = intval( $_POST['risk_game2_3'] );
    $risk_game2_4 = intval( $_POST['risk_game2_4'] );
    $risk_game2_5 = intval( $_POST['risk_game2_5'] );
    if ( $_SESSION['session_admin'] != $demo )
    {
        @mysql_query( "update games set\r\n\t\tid_bank = '".$main_bank."',\r\n\t\tid_funbank = '".$main_fun_bank."',\r\n\t\tid_jp = '".$main_jp_bank."'\r\n\t\twhere id='".$id."'\r\n\t\t" );
        @mysql_query( "update games_poker set\r\n\t\tvp_shanswin1 = '".$risk_game1_1."|".$risk_game1_2."|".$risk_game1_3."|".$risk_game1_4."|".$risk_game1_5."',\r\n\t\tvp_shanswin2 = '".$risk_game2_1."|".$risk_game2_2."|".$risk_game2_3."|".$risk_game2_4."|".$risk_game2_5."'\r\n\t\twhere id='".$id."'\r\n\t\t" );
        echo "<script>alert(\"Данные успешно обновлены!".$risk_double."\");</script>";
        echo "<script>location.href=\"/acp/acp_admin/admin_config_games.php?mode=edit_extended&id=".$id."\";</script>";
    }
    else
    {
        echo "<script>alert(\"Вы не можете редактировать данные в демо режиме!\");</script>";
        echo "<script>history.back();</script>";
    }
}
include_once( "content/content_config_games.php" );
?>
