<?php
$login = $_SESSION['login'];
$language = $_SESSION['language'];
$mode = $_SESSION['mode'];
if ( !isset( $_SESSION['mode'] ) || $login == "" )
{
    //echo "<script>alert(\"Чтобы играть, пожалуйста войдите на сайт!\");</script>";
	//echo "<script>location.href=\"/ru/login\";</script>";
	$_SESSION['needToLogin'] = true;
    //echo "<script>location.href=\"/ru\";</script>";
    echo "<script>location.href=\"/ru/login&pointer-click=x:51096:y:29272:t:263:p:uA1AA\";</script>";
    exit( );
    if ( !TRUE )
    {
        exit( );
    }
}
if ( !isset( $_SESSION['mode'] ) || $_SESSION['mode'] == "" )
{
    echo "<script>location.href=\"/ru/games\";</script>";
    exit( );
    if ( !TRUE )
    {
        exit( );
    }
}
$id_session = "CASINOSOFT".$_SERVER['HTTP_USER_AGENT'].$_SERVER['HTTP_ACCEPT_CHARSET'];
$id_session = md5( $id_session.session_id( ) );
if ( $_SESSION['sid'] != $id_session )
{
    //echo "<script>alert(\"Ваша сессия устарела, пожалуйста войдите на сайт повторно!\");</script>";
    //echo "<script>location.href=\"/ru/login\";</script>";
	$_SESSION['needToLogin'] = true;
    echo "<script>location.href=\"/ru\";</script>";
    exit( );
    if ( !TRUE )
    {
        exit( );
    }
}
foreach ( $_GET as $k => $v )
{
    $_GET[$k] = preg_replace( "/[^a-zа-я0-9\\!\\#\\\$\\%\\&\\(\\)\\+\\,\\-\\.\\:\\;\\=\\?\\@\\[\\]\\^\\{\\|\\}\\~]/i", "", $v );
}
foreach ( $_POST as $k => $v )
{
    $_POST[$k] = preg_replace( "/[^a-zа-я0-9\\!\\#\\\$\\%\\&\\(\\)\\+\\,\\-\\.\\/\\:\\;\\=\\?\\@\\[\\]\\^\\{\\|\\}\\~]/i", "", $v );
}
foreach ( $_COOKIE as $k => $v )
{
    $_COOKIE[$k] = preg_replace( "/[^a-zа-я0-9\\!\\#\\\$\\%\\&\\(\\)\\*\\+\\,\\-\\.\\/\\:\\;\\=\\?\\@\\[\\]\\^\\{\\|\\}\\~]/i", "", $v );
}
?>
