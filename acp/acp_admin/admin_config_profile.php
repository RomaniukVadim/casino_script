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

$title = "Панель администратора - Изменение данных администратора";
$menu = "config";
$menu_sub = "admin_config_profile.php";

$error = "";
$action = "";
$error = "";

if(isset($_POST['action'])) $action = $_POST['action']; else $action ='';
if ($action == "update")
{
    if ($_SESSION['session_admin'] != $demo )
    {
        $login = filter( $_POST['login'] );
        $pass = filter( $_POST['pass'] );
        $pass2 = filter( $_POST['pass2'] );
        $email = filter( $_POST['email'] );
        if ( $login == "" )
        {
            $error .= "Введите логин\\n";
        }
        if ( $pass == "" )
        {
            $error .= "Введите пароль\\n";
        }
        if ( $pass2 == "" )
        {
            $error .= "Введите пароль2\\n";
        }
        if ( $email == "" )
        {
            $error .= "Введите почтовый адрес\\n";
        }
        if ( $error == "" )
        {
            $pass_md5 = md5( $pass );
            $pass2_md5 = md5( $pass2 );
            @mysql_query( "update casino_admin set\r\n\t\t\tlogin = '{$login}',\r\n\t\t\tpass = '{$pass_md5}',\r\n\t\t\tpass2 = '{$pass2_md5}',\r\n\t\t\temail = '{$email}'\r\n\t\t\t" );
            $config_query = @mysql_fetch_array( @mysql_query( "select * from casino_settings" ) );
            $site = $config_query['siteadress'];
            $email_support = $config_query['emailadmin'];
            $priority = 3;
            $format = "text/html";
            $msg = "";
            $msg .= "Здравствуйте, Администратор.<br>";
            $msg .= "Ваши новые данные для доступа в панель администратора:<br>";
            $msg .= "<br>";
            $msg .= "Логин   : ".$login."<br>";
            $msg .= "Пароль  : ".$pass."<br>";
            $msg .= "Пароль2 : ".$pass2."<br>";
            $msg .= "<br>";
            $msg .= "---------------------<br>";
            $msg .= "С Наилучшими Пожеланиями,<br>";
            $msg .= "Робот Интернет-казино ".$site."<br>";
            mail( $email_support, "Изменение пароля администратора", $msg, "From: {$email_support}\nContent-Type:{$format};charset=windows-1251\nMIME-Version: 1.0\nContent-Transfer-Encoding: 8bit\nX-Priority: {$priority}\nX-Mailer:CasinoEngine mail v1.0" );
            echo "<script>alert(\"Профиль Администратора успешно обновлен!\");</script>";
            echo "<script>history.back();</script>";
        }
        else
        {
            echo "<script>alert(\"Ошибка:".$error."\");</script>";
            echo "<script>history.back();</script>";
        }
    }
    else
    {
        echo "<script>alert(\"Вы не можете редактировать банки в демо режиме!\");</script>";
        echo "<script>history.back();</script>";
    }
}

include_once( "content/content_config_profile.php" );
?>
