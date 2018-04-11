<?php
//Инициализация
session_start();

//Отправляем неавторизованных на login
if(isset($_SESSION['session_admin'])) $adm_login = $_SESSION['session_admin'];
else die();

define("CASINOENGINE", true);
define("ENGINE_DIR", $_SERVER['DOCUMENT_ROOT']."/engine_acp");

require_once($_SERVER['DOCUMENT_ROOT']."/engine/core/mysql_log.php");
require_once(ENGINE_DIR."/config/config.php");
include_once("content/functions.php");

$q = strtolower($_GET['q']);
if (!$q)
{
    return;
}
$result = @mysql_query( "SELECT login FROM clients" );
while ( $row = @mysql_fetch_assoc( $result ) )
{
    $logins[] = $row['login'];
}
mysql_free_result( $result );
if ( isset( $_GET['q'] ) && $_GET['q'] != "" )
{
    $results = array();
    foreach ( $logins as $login )
    {
        if ( strpos( strtolower( $login ), $q ) !== false )
        {
            echo "{$login}|name\n";
        }
    }
}
?>
