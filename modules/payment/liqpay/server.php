<?php
define( "CASINOENGINE", true );
session_start( );
include_once( "../../../engine/config/config.php" );
include_once( "../../../modules/partner/partner.php");
error_reporting( 0 );
if ( !defined( "CASINOENGINE" ) )
{
    exit( "Нет доступа!<script>location.href='/';</script>" );
}
$module_liqpay_query = @mysql_fetch_array( @mysql_query( "select * from pay_modules_liqpay" ) );
$version = $_POST['version'];
$action_name = $_POST['action_name'];
$sender_phone = $_POST['sender_phone'];
$merchant_id = $_POST['merchant_id'];
$amount = $_POST['amount'];
$amount = preg_replace( "/[^1234567890.]/i", "", $amount );
$currency = $_POST['currency'];
$order_id = intval( $_POST['order_id'] );
$transaction_id = $_POST['transaction_id'];
$status = $_POST['status'];
$code = $_POST['code'];
$merchant_password = $module_liqpay_query['merchant_password'];
$signature_source = "|{$version}|{$merchant_password}|{$action_name}|{$sender_phone}|{$merchant_id}|{$amount}|{$currency}|{$order_id}|{$transaction_id}|{$status}|{$code}|";
$sign = base64_encode( sha1( $signature_source, 1 ) );
if ( $_POST['status'] == "success" )
{
    $status_code = "1";
}
else if ( $_POST['status'] == "wait_secure" )
{
    $status_code = "2";
}
else
{
    $status_code = "0";
}
if ( $debug == "true" )
{
    $line = "\r\n\t<p>Статус выполнение операции: ".$status."</p>\r\n\t<p>Сумма оплаты: ".$_POST['amount']."</p>\r\n\t<p>Тип валюты: ".$_POST['currency']."</p>\r\n\t<p>Заголовок заказа: ".$_POST['order_id']."</p>\r\n\t<p>ID транзакции: ".$_POST['transaction_id']."</p>\r\n\t<p>Номер телефона: ".$_POST['sender_phone']."</p>\r\n\t<p>Способ оплаты: ".$_POST['pay_way']."</p>\r\n\t<p>ID пользователя: ".$_POST['merchant_id']."</p>\r\n\t<p>Подпись: ".$_POST['signature']."</p>\r\n\t\r\n\t<p>merchant_password: ".$merchant_password."</p>\r\n\t<p>signature_source: ".$signature_source."</p>\r\n\t<p>sign: ".$sign."</p>\r\n\t";
    $fp = fopen( "order.txt", "a+" );
    if ( !$fp )
    {
        echo "Ошибка открытия файла!";
        exit( );
    }
    @fputs( $fp, $line );
    if ( !fclose( $fp ) )
    {
        echo "Ошибка закрытия файла!";
        exit( );
    }
}
if ( $_POST['signature'] == $sign )
{
    $referer = $_SERVER['REMOTE_ADDR'];
    @mysql_query( "update pay_deposits set status = '".$status_code."', referer = '".$referer."' where id ='".$order_id."'" );
    $pay_query = @mysql_fetch_array( @mysql_query( "select * from pay_deposits where id ='".$order_id."'" ) );
    payToReferer($pay_query['user'], $amount);
    @mysql_query( "update clients set cash=cash+'".$amount."' where login='".$pay_query['user']."'" );
    @mysql_query( "update clients set cashin=cashin+'".$amount."' where login='".$pay_query['user']."'" );
    $config_query = @mysql_fetch_array( @mysql_query( "select * from casino_settings" ) );
    $site = $config_query['siteadress'];
    $email_support = $config_query['emailcasino'];
    $priority = 3;
    $format = "text/html";
    $msg = "";
    $msg .= "Здравствуйте, Администратор,<br>";
    $msg .= "Пользователь:".$pay_query['user']."<br><br>";
    $msg .= "Пополнил игровой счёт на: ".$amount." Кредитов<br>";
    $msg .= "---------------------<br>";
    $msg .= "С Наилучшими Пожеланиями,<br>";
    $msg .= "Робот Интернет-казино ".$site."<br>";
    @mail( $email_support, "Пополнение счёта на сумму: ".$amount." Кредитов", $msg, "From: {$email_support}\nContent-Type:{$format};charset=windows-1251\nMIME-Version: 1.0\nContent-Transfer-Encoding: 8bit\nX-Priority: {$priority}\nX-Mailer:CasinoEngine mail v1.0" );
    $config_query = @mysql_fetch_array( @mysql_query( "select * from casino_settings" ) );
    $site = $config_query['siteadress'];
    $user_query = @mysql_fetch_array( @mysql_query( "select * from clients where login='".$pay_query['user']."'" ) );
    $priority = 3;
    $format = "text/html";
    $msg = "";
    $msg .= "Здравствуйте, ".$user_query['login'].",<br>";
    $msg .= "<br>";
    $msg .= "Вы Пополнил игровой счёт на: ".$amount." Кредитов<br>";
    $msg .= "---------------------<br>";
    $msg .= "С Наилучшими Пожеланиями,<br>";
    $msg .= "Робот Интернет-казино ".$site."<br>";
    @mail( $user_query['email'], "Пополнение счёта на сумму: ".$amount." Кредитов", $msg, "From: {$email_support}\nContent-Type:{$format};charset=windows-1251\nMIME-Version: 1.0\nContent-Transfer-Encoding: 8bit\nX-Priority: {$priority}\nX-Mailer:CasinoEngine mail v1.0" );
    exit( );
}
else
{
    exit( );
}
?>
