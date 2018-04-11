<?php
//»нициализаци€
session_start();

//ќтправл€ем неавторизованных на login
if(isset($_SESSION['session_admin'])) $adm_login = $_SESSION['session_admin'];
else die("<script>location.href=\"/acp/acp_admin/login.php\";</script>");

define("CASINOENGINE", true);
define("ENGINE_DIR", $_SERVER['DOCUMENT_ROOT']."/engine_acp");

require_once($_SERVER['DOCUMENT_ROOT']."/engine/core/mysql_log.php");
require_once( ENGINE_DIR."/config/config.php" );
include_once("content/functions.php");

$title = "ѕанель администратора - –ассылка ѕћ";
$menu = "module";
$menu_sub = "admin_mass_pm.php";
include_once( "content/functions.php" );
$режим = $_GET['mode'];
$id = $_GET['id'];
$режим_фильтер = preg_match( "/^[a-z]{2,20}\$/D", $режим );
$id_фильтер = preg_match( "/^[0-9]{1,5}\$/D", $id );
$рассылка_логин = $_POST['login'];
$send_mode = $_POST['gr11'];
$рассылка_тема = @mysql_escape_string( $_POST['subject'] );
$рассылка_сообщение = @mysql_escape_string( $_POST['message'] );
$рассылка_сообщение = preg_replace("/(\r\n)/", "<br/>", $рассылка_сообщение);
$рассылка_логин_фильтер = preg_match( "/^[a-zA-Z0-9]{2,20}\$/D", $рассылка_логин );
if ( $send_mode == "pm_user" || $send_mode == "pm_all" )
{
    $send_mode_set = true;
}
else
{
    $send_mode_set = false;
    $error .= "¬ыберите режим рассылки!<br>";
}
if ( $рассылка_тема == "" )
{
    $error .= "Ќе введЄна тема<br>";
}
if ( $рассылка_сообщение == "" )
{
    $error .= "Ќе введЄно сообщение<br>";
}
if ( $send_mode == "mass_user" && $рассылка_логин == "" )
{
    $error .= "Ќе выбранн пользователь дл€ рассылки!<br>";
}
if ( $режим == "send" && $error == "" )
{
    if ( $send_mode == "pm_user" && $рассылка_логин != "" && ( $рассылка_логин_фильтер = true ) && $рассылка_тема != "" && $рассылка_сообщение != "" )
    {
        $клиенты_запрос = @mysql_fetch_array( @mysql_query( "SELECT * FROM clients WHERE login='".$рассылка_логин."'" ) );
        if ( $клиенты_запрос != "" || $клиенты_запрос != "0" )
        {
            $time = time( );
            mysql_query( "INSERT INTO casino_pm (subj, text, user, user_from, date, pm_read, folder) values ('{$рассылка_тема}', '{$рассылка_сообщение}', '{$рассылка_логин}', 'admin', '{$time}', 'no', 'inbox')" );
            mysql_query( "UPDATE clients set pm_all=pm_all+1, pm_unread=pm_unread+1  where login='".$рассылка_логин."'" );
            echo "<script>alert(\"Ћичное сообщение дл€ клиента: ".$рассылка_логин." успешно отправленно!\");</script>";
            echo "<script>location.href=\"/acp/acp_admin/admin_mass_pm.php\";</script>";
            exit( );
            if ( !TRUE )
            {
                exit( );
            }
        }
        else
        {
            echo "<script>alert(\" лиент с именем: ".$рассылка_логин." ненайден!\");</script>";
            echo "<script>location.href=\"/acp/acp_admin/admin_mass_pm.php\";</script>";
            exit( );
            if ( !TRUE )
            {
                exit( );
            }
        }
    }
    if ( $send_mode == "pm_all" && $рассылка_тема != "" && $рассылка_сообщение != "" )
    {
        $клиенты_запрос = @mysql_query( "select * from clients" );
        while ( $клиенты_email_запрос = @mysql_fetch_array( $клиенты_запрос ) )
        {
            if ( !@mysql_query( "insert into casino_tickets (priority,dt,subject,userid,message,newforuser,newforadmin) values('2',NOW(),'".@addslashes( $рассылка_тема )."','".$клиенты_email_запрос['id']."','".@addslashes( $рассылка_сообщение )."','1','0')" ) )
            {
                exit( mysql_error( ) );
            }
        }
        echo "<script>alert(\"Ћичные сообщени€ дл€ клиентов успешно отправленны!\");</script>";
        echo "<script>location.href=\"/acp/acp_admin/admin_mass_pm.php\";</script>";
        exit( );
        if ( !TRUE )
        {
            exit( );
        }
    }
}
if ( $рассылка_логин == "" && $send_mode == "" && $рассылка_тема == "" && $рассылка_сообщение == "" )
{
    $error = "";
}
include_once( "content/content_mass_pm.php" );
?>
