<?php

  define("CASINOENGINE", true);
  session_start();
  include_once("engine/config/config.php");
  include_once( "modules/partner/partner.php");


  $module_freekassa_query = mysql_fetch_array(mysql_query("select * from pay_modules_freekassa"));
  
  $module_payment_fk_secret_key = $module_freekassa_query['mrh_pass1'];


if (isset($_POST["m_operation_id"]) && isset($_POST["m_sign"]))
{

$module_freekassa_query = @mysql_fetch_array(@mysql_query("select * from pay_modules_freekassa"));
  
  $module_payment_fk_secret_key = $module_freekassa_query['mrh_pass1'];
	$m_key = $module_payment_fk_secret_key;
	$arHash = array($_POST['m_operation_id'],
			$_POST['m_operation_ps'],
			$_POST['m_operation_date'],
			$_POST['m_operation_pay_date'],
			$_POST['m_shop'],
			$_POST['m_orderid'],
			$_POST['m_amount'],
			$_POST['m_curr'],
			$_POST['m_desc'],
			$_POST['m_status'],
			$m_key);
	$sign_hash = strtoupper(hash('sha256', implode(":", $arHash)));

	if ($_POST["m_sign"] == $sign_hash && $_POST['m_status'] == "success")
	{


$referer = $_SERVER['REMOTE_ADDR'];
if(!isset($referer))$referer="admin";
$pay_query = @mysql_fetch_array(@mysql_query("select * from pay_deposits where id ='" . $_POST['m_orderid'] . "'"));
if($pay_query['status']=='1'){
echo $_POST['m_orderid']."|error";
}else{
      @mysql_query("update pay_deposits set status = '1', referer = '" . $referer . "' where id ='" . $_POST['m_orderid'] . "'");
	@mysql_query("update clients set cash=cash+'" . $_POST['m_amount'] . "' where login='" . base64_decode($_POST['m_desc']) . "'");
      @mysql_query("update clients set cashin=cashin+'" . $_POST['m_amount'] . ".00' where login='" . base64_decode($_POST['m_desc']) . "'");
     
      payToReferer(base64_decode($_POST['m_desc']), $_POST['m_amount']);
      
      $config_query  = @mysql_fetch_array(@mysql_query("select * from casino_settings"));
      $site          = $config_query['siteadress'];
      $email_support = $config_query['emailcasino'];
      $priority      = 3;
      $format        = "text/html";
      $msg           = "";
      $msg .= "Здравствуйте, Администратор,<br>";
      $msg .= "Пользователь:" . base64_decode($_POST['m_desc']) . "<br><br>";
      $msg .= "Пополнил игровой счёт на: " . $_POST['m_amount'] . " Кредитов<br>";
      $msg .= "---------------------<br>";
      $msg .= "С Наилучшими Пожеланиями,<br>";
      $msg .= "Робот Интернет-казино " . $site . "<br>";
      @mail($email_support, "Пополнение счёта на сумму: " . $_POST['m_amount'] . " Кредитов", $msg, "From: {$email_support}\nContent-Type:{$format};charset=windows-1251\nMIME-Version: 1.0\nContent-Transfer-Encoding: 8bit\nX-Priority: {$priority}\nX-Mailer:CasinoEngine mail v1.0");
      $config_query = @mysql_fetch_array(@mysql_query("select * from casino_settings"));
      $site         = $config_query['siteadress'];
      $user_query   = @mysql_fetch_array(@mysql_query("select * from clients where login='" . base64_decode($_POST['m_desc']) . "'"));
      $priority     = 3;
      $format       = "text/html";
      $msg          = "";
      $msg .= "Здравствуйте, " . $user_query['login'] . ",<br>";
      $msg .= "<br>";
      $msg .= "Вы Пополнил игровой счёт на: " . $_POST['m_amount'] . " Кредитов<br>";
      $msg .= "---------------------<br>";
      $msg .= "С Наилучшими Пожеланиями,<br>";
      $msg .= "Робот Интернет-казино " . $site . "<br>";
	  
	
	  
	  
      @mail($user_query['email'], "Пополнение счёта на сумму: " . $_POST['m_amount'] . " Кредитов", $msg, "From: {$email_support}\nContent-Type:{$format};charset=windows-1251\nMIME-Version: 1.0\nContent-Transfer-Encoding: 8bit\nX-Priority: {$priority}\nX-Mailer:CasinoEngine mail v1.0");


		echo $_POST['m_orderid']."|success";
		exit;
}
	}
	echo $_POST['m_orderid']."|error";

}
?>