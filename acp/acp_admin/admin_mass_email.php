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

$title = "Панель администратора - Рассылка E-Mail";
$menu = "module";
$menu_sub = "admin_mass_email.php";

$режим = $_GET['mode'];
$id = $_GET['id'];
$режим_фильтер = preg_match( "/^[a-z]{2,20}\$/D", $режим );
$id_фильтер = preg_match( "/^[0-9]{1,5}\$/D", $id );
$error = "";
$рассылка_логин = $_POST['login'];
$рассылка_емэил = $_POST['email'];
$send_mode = $_POST['gr11'];
$рассылка_тема = $_POST['subject'];
$рассылка_сообщение = $_POST['message'];
$рассылка_логин_фильтер = preg_match( "/^[a-zA-Z0-9]{2,20}\$/D", $рассылка_логин );
$рассылка_емэил_фильтер = preg_match( "/^([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9_-])+(\\.[a-zA-Z0-9]+[a-zA-Z0-9_-]*)+\$/D", $рассылка_емэил );
if ( $send_mode == "mass_user" || $send_mode == "mass_all" )
{
    $send_mode_set = true;
}
else
{
    $send_mode_set = false;
    $error .= "Выберите режим рассылки!<br>";
}
if ( $рассылка_тема == "" )
{
    $error .= "Не введёна тема<br>";
}
if ( $рассылка_сообщение == "" )
{
    $error .= "Не введёно сообщение<br>";
}
if ( $send_mode == "mass_user" && $рассылка_логин == "" && $рассылка_емэил == "" )
{
    $error .= "Не выбранн пользователь для отсылки или не указан email для отсылки!<br>";
}
if ( $режим == "send" && $error == "" && $send_mode_set == true )
{
    if ( $send_mode == "mass_user" && $рассылка_логин != "" && ( $рассылка_логин_фильтер = true ) && $рассылка_емэил == "" && $рассылка_тема != "" && $рассылка_сообщение != "" )
    {
        $клиенты_запрос = mysql_fetch_array( mysql_query( "SELECT * FROM clients WHERE login='".$рассылка_логин."'" ) );
        if ( $клиенты_запрос != "" || $клиенты_запрос != "0" )
        {
            $email_клиента = $клиенты_запрос['email'];
        }
        else
        {
            echo "<script>alert(\"Клиент с именем: ".$рассылка_логин." ненайден!\");</script>";
            echo "<script>location.href=\"/acp/acp_admin/admin_mass_email.php\";</script>";
            exit( );
            if ( !TRUE )
            {
                exit( );
            }
        }
        $установки_запрос = mysql_fetch_array( mysql_query( "SELECT * FROM casino_settings" ) );
        $casino_email = $установки_запрос['emailcasino'];
        $priority = 3;
        $format = "text/html";
        $msg = $рассылка_сообщение;
        mail( $email_клиента, $рассылка_тема, $msg, "From: {$casino_email}\nContent-Type:{$format};charset=windows-1251\nMIME-Version: 1.0\nContent-Transfer-Encoding: 8bit\nX-Priority: {$priority}\nX-Mailer:Casino mail v2" );
        echo "<script>alert(\"Сообщение для пользователя: ".$рассылка_логин." успешно отправленно!\");</script>";
        echo "<script>location.href=\"/acp/acp_admin/admin_mass_email.php\";</script>";
        exit( );
        if ( !TRUE )
        {
            exit( );
        }
    }
    if ( $send_mode == "mass_user" && $рассылка_логин == "" && $рассылка_емэил != "" && $рассылка_емэил_фильтер == true && $рассылка_тема != "" && $рассылка_сообщение != "" )
    {
        $установки_запрос = mysql_fetch_array( mysql_query( "SELECT * FROM casino_settings" ) );
        $casino_email = $установки_запрос['emailcasino'];
        $priority = 3;
        $format = "text/html";
        $msg = $рассылка_сообщение;
        mail( $рассылка_емэил, $рассылка_тема, $msg, "From: {$casino_email}\nContent-Type:{$format};charset=windows-1251\nMIME-Version: 1.0\nContent-Transfer-Encoding: 8bit\nX-Priority: {$priority}\nX-Mailer:Casino mail v2" );
        echo "<script>alert(\"Сообщение на почтовый адресс: ".$рассылка_емэил." успешно отправленно\");</script>";
        echo "<script>location.href=\"/acp/acp_admin/admin_mass_email.php\";</script>";
        exit( );
        if ( !TRUE )
        {
            exit( );
        }
    }
    if ( $send_mode == "mass_all" && $рассылка_тема != "" && $рассылка_сообщение != "" )
    {
        $клиенты_запрос = mysql_query( "select * from clients ORDER BY email ASC" );
        while ($client = mysql_fetch_array($клиенты_запрос))
        {
            $установки_запрос = mysql_fetch_array( mysql_query( "SELECT * FROM casino_settings" ) );
            $casino_email = $установки_запрос['emailcasino'];
            $priority = 3;
            $format = "text/html";
            $msg = $рассылка_сообщение;
            mail($client['email'], $рассылка_тема, $msg, "From: {$casino_email}\nContent-Type:{$format};charset=windows-1251\nMIME-Version: 1.0\nContent-Transfer-Encoding: 8bit\nX-Priority: {$priority}\nX-Mailer:Casino mail v2" );
        }
        echo "<script>alert(\"Сообщение отправленно всем пользователям успешно!\");</script>";
        echo "<script>location.href=\"/acp/acp_admin/admin_mass_email.php?mode=send\";</script>";
        exit( );
        if ( !TRUE )
        {
            exit( );
        }
    }
}
if ( $режим == "senduser" && $error == "" && $send_mode_set == true && $send_mode == "mass_user" && $рассылка_логин != "" && ( $рассылка_логин_фильтер = true ) && $рассылка_емэил == "" && $рассылка_тема != "" && $рассылка_сообщение != "" )
{
    $клиенты_запрос = mysql_fetch_array( mysql_query( "SELECT * FROM clients WHERE login='".$рассылка_логин."'" ) );
    if ( $клиенты_запрос != "" || $клиенты_запрос != "0" )
    {
        $email_клиента = $клиенты_запрос['email'];
    }
    else
    {
        echo "<script>alert(\"Клиент с именем: ".$рассылка_логин." ненайден!\");</script>";
        echo "<script>location.href=\"/acp/acp_admin/admin_mass_email.php?mode=senduser&login=".$рассылка_логин."\";</script>";
        exit( );
        if ( !TRUE )
        {
            exit( );
        }
    }
    $установки_запрос = mysql_fetch_array( mysql_query( "SELECT * FROM casino_settings" ) );
    $casino_email = $установки_запрос['emailcasino'];
    $priority = 3;
    $format = "text/html";
    $msg = $рассылка_сообщение;
    mail( $email_клиента, $рассылка_тема, $msg, "From: {$casino_email}\nContent-Type:{$format};charset=windows-1251\nMIME-Version: 1.0\nContent-Transfer-Encoding: 8bit\nX-Priority: {$priority}\nX-Mailer:Casino mail v2" );
    echo "<script>alert(\"Сообщение для пользователя: ".$рассылка_логин." успешно отправленно!\");</script>";
    echo "<script>location.href=\"/acp/acp_admin/admin_mass_email.php?mode=senduser&login=".$рассылка_логин."\";</script>";
    exit( );
    if ( !TRUE )
    {
        exit( );
    }
}
if ( $рассылка_логин == "" && $рассылка_емэил == "" && $send_mode == "" && $рассылка_тема == "" && $рассылка_сообщение == "" )
{
    $error = "";
}
include_once( "content/content_mass_email.php" );
?>
