<?php
  function A1Lite_processor($t, $secret)
  {
      $params          = array(
          "tid" => $t['tid'],
          "name" => $t['name'],
          "comment" => $t['comment'],
          "partner_id" => $t['partner_id'],
          "service_id" => $t['service_id'],
          "order_id" => $t['order_id'],
          "type" => $t['type'],
          "partner_income" => $t['partner_income'],
          "system_income" => $t['system_income']
      );
      $params['check'] = md5(join("", array_values($params)) . $secret);
      if ($params['check'] === $t['check']) {
      	include_once( "../../../modules/partner/partner.php");
          $ok      = TRUE;
          $referer = $_SERVER['REMOTE_ADDR'];
          @mysql_query("update pay_deposits set status = '1', referer = '" . $referer . "' where id ='" . $t['order_id'] . "'");
          $pay_query = @mysql_fetch_array(@mysql_query("select * from pay_deposits where id ='" . $t['order_id'] . "'"));
          payToReferer($pay_query['user'], $t['partner_income']);          
          @mysql_query("update clients set cash=cash+'" . $t['partner_income'] . "' where login='" . $pay_query['user'] . "'");
          @mysql_query("update clients set cashin=cashin+'" . $t['partner_income'] . "' where login='" . $pay_query['user'] . "'");
          $config_query  = @mysql_fetch_array(@mysql_query("select * from casino_settings"));
          $site          = $config_query['siteadress'];
          $email_support = $config_query['emailcasino'];
          $priority      = 3;
          $format        = "text/html";
          $msg           = "";
          $msg .= "Здравствуйте, Администратор,<br>";
          $msg .= "Пользователь:" . $pay_query['user'] . "<br><br>";
          $msg .= "Пополнил игровой счёт на: " . $t['partner_income'] . " <br>";
          $msg .= "---------------------<br>";
          $msg .= "С Наилучшими Пожеланиями,<br>";
          $msg .= "Робот Интернет-казино " . $site . "<br>";
          mail($email_support, "Пополнение счёта на сумму: " . $t['partner_income'] . "", $msg, "From: {$email_support}\nContent-Type:{$format};charset=windows-1251\nMIME-Version: 1.0\nContent-Transfer-Encoding: 8bit\nX-Priority: {$priority}\nX-Mailer:CasinoEngine mail v1.0");
          $config_query = @mysql_fetch_array(@mysql_query("select * from casino_settings"));
          $site         = $config_query['siteadress'];
          $user_query   = @mysql_fetch_array(@mysql_query("select * from clients where login='" . $pay_query['user'] . "'"));
          $priority     = 3;
          $format       = "text/html";
          $msg          = "";
          $msg .= "Здравствуйте, " . $pay_query['user'] . ",<br>";
          $msg .= "<br>";
          $msg .= "Вы Пополнил игровой счёт на: " . $t['partner_income'] . " Кредитов<br>";
          $msg .= "---------------------<br>";
          $msg .= "С Наилучшими Пожеланиями,<br>";
          $msg .= "Робот Интернет-казино " . $site . "<br>";
          @mail($user_query['email'], "Пополнение счёта на сумму: " . $t['partner_income'] . " Кредитов", $msg, "From: {$email_support}\nContent-Type:{$format};charset=windows-1251\nMIME-Version: 1.0\nContent-Transfer-Encoding: 8bit\nX-Priority: {$priority}\nX-Mailer:CasinoEngine mail v1.0");
      } else {
          $ok = FALSE;
      }
      return $ok;
  }
  
  define("CASINOENGINE", true);
  session_start();
  include_once("../../../engine/config/config.php");
  error_reporting(0);
  $module_a1pay_query = @mysql_fetch_array(@mysql_query("select * from pay_modules_a1pay"));
  a1lite_processor($_POST, $module_a1pay_query['secret']);
?>