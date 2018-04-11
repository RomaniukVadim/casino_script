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

$title = "Панель администратора - Новости";
$menu = "article";
$menu_sub = "admin_news.php";
$error = "";

if(isset($_GET['mode'])) $режим = $_GET['mode']; else $режим = '';
$режим_фильтер = preg_match( "/^[a-z]{2,20}\$/D", $режим );
if(isset($_GET['id'])) $id = $_GET['id']; else $id = '';
$id_фильтер = preg_match( "/^[0-9]{1,5}\$/D", $id );
if ( $режим == "delete" && $id != "" && $id_фильтер == true )
{
    if ( $_SESSION['session_admin'] != $demo )
    {
        @mysql_query( "DELETE FROM casino_news WHERE id = '{$id}' LIMIT 1" );
        echo "<script>alert(\"Новость успешно удалёна!\");</script>";
        echo "<script>location.href=\"/acp/acp_admin/admin_news.php\";</script>";
    }
    else
    {
        echo "<script>alert(\"Вы не можете удалять данные в демо режиме!\");</script>";
        echo "<script>history.back();</script>";
    }
}
if ( $режим == "addnews" && $режим_фильтер == true )
{
    $форма_title = $_POST['title'];
    $форма_date = $_POST['date'];
    //$форма_news_short = @mysql_real_escape_string( $_POST['news_short'] );
    $форма_news_short = $_POST['news_short'] ;
    //$форма_news_full = @mysql_real_escape_string( $_POST['news_full'] );
    $форма_news_full =  $_POST['news_full'];
    $keywords = @mysql_real_escape_string( $_POST['keywords'] );
    $descr = @mysql_real_escape_string( $_POST['descr'] );
    $форма_date_фильтер = preg_match( "/^[0-9-]{10}\$/D", $форма_date );
    $форма_title_фильтер = preg_match( "/^[\n\r\\?!,.А-Яа-яA-Za-z0-9 ]{2,999}\$/D", $форма_title );
    if ( $форма_date == "" )
    {
        $error .= "Не введёна дата<br>";
    }
    else if ( $форма_date_фильтер == false )
    {
        $error .= "Не корректна дата<br>";
    }
    if ( $форма_title == "" )
    {
        $error .= "Не введёно название новости<br>";
    }
    else if ( $форма_title_фильтер == false )
    {
        $error .= "Не корректно название новости<br>";
    }
    if ( $форма_news_short == "" )
    {
        $error .= "Не введена кароткая новость<br>";
    }
    if ( $форма_news_full == "" )
    {
        $error .= "Не введена полная новость<br>";
    }
    if ( $error == "" )
    {
        @mysql_query( "INSERT INTO casino_news\r\n\t(`id`, `date` ,`title`, `short_story`, `full_story`,`keywords`, `descr`) VALUES\r\n\t(NULL,'".$форма_date."','".$форма_title."', '".$форма_news_short."', '".$форма_news_full."','".$keywords."','".$descr."')" );
        echo "<script>alert(\"Новость успешна добавленна!\");</script>";
        echo "<script>location.href=\"/acp/acp_admin/admin_news.php\";</script>";
        exit( );
        if ( !TRUE )
        {
            exit( );
        }
    }
    if ( $форма_date == "" && $форма_title == "" && $форма_news_short == "" && $форма_news_full == "" )
    {
        $error = "";
    }
}
if ( $режим == "edit" && $режим_фильтер == true && $id != "" && $id_фильтер == true )
{
    $форма_title = $_POST['title'];
    $форма_date = $_POST['date'];
    //$форма_news_short = @mysql_real_escape_string( $_POST['news_short'] );
    //$форма_news_full = @mysql_real_escape_string( $_POST['news_full'] );
    $форма_news_short = $_POST['news_short'] ;
    $форма_news_full =  $_POST['news_full'];
    $keywords = @mysql_real_escape_string( $_POST['keywords'] );
    $descr = @mysql_real_escape_string( $_POST['descr'] );
    $форма_date_фильтер = preg_match( "/^[0-9-]{10}\$/D", $форма_date );
    $форма_title_фильтер = preg_match( "/^[\n\r\\?!,.А-Яа-яA-Za-z0-9 ]{2,999}\$/D", $форма_title );
    if ( $форма_date == "" )
    {
        $error .= "Не введёна дата<br>";
    }
    else if ( $форма_date_фильтер == false )
    {
        $error .= "Не корректна дата<br>";
    }
    if ( $форма_title == "" )
    {
        $error .= "Не введёно название новости<br>";
    }
    else if ( $форма_title_фильтер == false )
    {
        $error .= "Не корректно название новости<br>";
    }
    if ( $форма_news_short == "" )
    {
        $error .= "Не введена кароткая новость<br>";
    }
    if ( $форма_news_full == "" )
    {
        $error .= "Не введена полная новость<br>";
    }
    if ( $error == "" )
    {
        if ( $_SESSION['session_admin'] != $demo )
        {
            @mysql_query( "update casino_news set\r\n\t\t\t\tdate = '{$форма_date}',\r\n\t\t\t\ttitle = '{$форма_title}',\r\n\t\t\t\tshort_story = '{$форма_news_short}',\r\n\t\t\t\tfull_story = '{$форма_news_full}',\r\n\t\t\t\tkeywords = '{$keywords}',\r\n\t\t\t\tdescr = '{$descr}'\r\n\t\t\t\twhere id='{$id}'\r\n\t\t\t\t" );
            echo "<script>alert(\"Новость успешно отредактированна!\");</script>";
            echo "<script>location.href=\"/acp/acp_admin/admin_news.php\";</script>";
            exit( );
            if ( !TRUE )
            {
                exit( );
            }
        }
        else
        {
            echo "<script>alert(\"Вы не можете удалять данные в демо режиме!\");</script>";
            echo "<script>history.back();</script>";
        }
    }
    if ( $форма_date == "" && $форма_title == "" && $форма_news_short == "" && $форма_news_full == "" )
    {
        $error = "";
    }
}
include_once( "content/content_news.php" );
?>
