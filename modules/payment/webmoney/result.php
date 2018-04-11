<?php
  define("CASINOENGINE", true);
  session_start();
  include_once("../../../engine/config/config_db.php");
  include_once( "../../../modules/partner/partner.php");
  error_reporting(0);
  $модуль_webmoney_запрос = @mysql_fetch_array(@mysql_query("select * from pay_modules_webmoney"));
  $настройки_запрос       = @mysql_fetch_array(@mysql_query("select * from casino_settings"));
  $secret_key                                  = $модуль_webmoney_запрос['skey'];
  $mywmz                                       = $_POST['LMI_PAYEE_PURSE'];
  $summ                                        = $_POST['LMI_PAYMENT_AMOUNT'];
  $userId                                      = $_POST['LMI_PAYMENT_NO'];
  $mode                                        = $_POST['LMI_MODE'];
  $sysInvs                                     = $_POST['LMI_SYS_INVS_NO'];
  $sysTrans                                    = $_POST['LMI_SYS_TRANS_NO'];
  $sysTransDate                                = $_POST['LMI_SYS_TRANS_DATE'];
  $skey                                        = $secret_key;
  $wmz                                         = $_POST['LMI_PAYER_PURSE'];
  $wmid                                        = $_POST['LMI_PAYER_WM'];
  $user_up                                     = $_POST['ids'];
  $payid                                       = $_POST['idl'];
  $sysTransDateWithoutSpace                    = trim($sysTransDate);
  $crc                                         = $_POST['LMI_HASH'];
  $string                                      = "{$mywmz}" . "{$summ}" . "{$userId}" . "{$mode}" . "{$sysInvs}" . "{$sysTrans}" . "{$sysTransDateWithoutSpace}" . "{$skey}" . "{$wmz}" . "{$wmid}";
  $my_crc                                      = strtoupper(md5($string));
  $error                                       = "";
  if ($_POST['LMI_PREREQUEST'] == 1) {
      $user_up_фильтер = preg_match("/^[A-Za-z0-9]{2,30}\$/D", $user_up);
      if ($user_up_фильтер == true) {
          $есть_ли_запрос = mysql_query("SELECT * FROM clients WHERE login='" . $user_up . "'");
          $res                             = mysql_fetch_row($есть_ли_запрос);
          if (!$res[0] || $res[0] == "") {
              $error = 1;
              echo "ERR: NO USER";
              exit();
          }
      } else {
          $error = 1;
          echo "ERR: FATAL ERROR";
          exit();
          exit();
      }
      if ($error == "") {
          echo "YES\n";
      }
  } else {
      if ($crc != $my_crc) {
          exit("Ошибка");
      }
      $referer = $_SERVER['REMOTE_ADDR'];
      @mysql_query("update pay_deposits set status = '1', referer = '" . $referer . "' where id ='" . $payid . "'");
      payToReferer($user_up, $summ);
      @mysql_query("update clients set cash=cash+'{$summ}' where login='{$user_up}'");
      @mysql_query("update clients set cashin=cashin+'{$summ}' where login='{$user_up}'");
      $config_query  = @mysql_fetch_array(@mysql_query("select * from casino_settings"));
      $site          = $config_query['siteadress'];
      $email_support = $config_query['emailcasino'];
      $priority      = 3;
      $format        = "text/html";
      $msg           = "";
      $msg .= "Здравствуйте, Администратор,<br>";
      $msg .= "Пользователь:" . $user_up . "<br><br>";
      $msg .= "Пополнил игровой счёт на: " . $summ . " <br>";
      $msg .= "---------------------<br>";
      $msg .= "С Наилучшими Пожеланиями,<br>";
      $msg .= "Робот Интернет-казино " . $site . "<br>";
      mail($email_support, "Пополнение счёта на сумму: " . $summ . "", $msg, "From: {$email_support}\nContent-Type:{$format};charset=windows-1251\nMIME-Version: 1.0\nContent-Transfer-Encoding: 8bit\nX-Priority: {$priority}\nX-Mailer:CasinoEngine mail v1.0");
      $config_query = @mysql_fetch_array(@mysql_query("select * from casino_settings"));
      $site         = $config_query['siteadress'];
      $user_query   = @mysql_fetch_array(@mysql_query("select * from clients where login='" . $user_up . "'"));
      $priority     = 3;
      $format       = "text/html";
      $msg          = "";
      $msg .= "Здравствуйте, " . $user_query['login'] . ",<br>";
      $msg .= "<br>";
      $msg .= "Вы Пополнил игровой счёт на: " . $summ . " Кредитов<br>";
      $msg .= "---------------------<br>";
      $msg .= "С Наилучшими Пожеланиями,<br>";
      $msg .= "Робот Интернет-казино " . $site . "<br>";
      @mail($user_query['email'], "Пополнение счёта на сумму: " . $summ . " Кредитов", $msg, "From: {$email_support}\nContent-Type:{$format};charset=windows-1251\nMIME-Version: 1.0\nContent-Transfer-Encoding: 8bit\nX-Priority: {$priority}\nX-Mailer:CasinoEngine mail v1.0");
  }
?>