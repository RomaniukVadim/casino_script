<?php
  define("CASINOENGINE", true);
  session_start();
  include_once("../../../engine/config/config.php");
  error_reporting(0);
  $module_robokassa_query = @mysql_fetch_array(@mysql_query("select * from pay_modules_robokassa"));
  $mrh_pass1              = $module_robokassa_query['mrh_pass1'];
  $out_summ               = $_REQUEST['OutSum'];
  $inv_id                 = floatval($_REQUEST['InvId']);
  $shp_item               = $_REQUEST['Shp_item'];
  $crc                    = $_REQUEST['SignatureValue'];
  $crc                    = strtoupper($crc);
  $my_crc                 = strtoupper(md5("{$out_summ}:{$inv_id}:{$mrh_pass1}:Shp_item={$shp_item}"));
  if ($my_crc != $crc) {
      echo "Не правильная подпись!\n";
      exit();
  }
  $pay_query = @mysql_fetch_array(@mysql_query("select * from pay_deposits where id ='" . $inv_id . "'"));
  if ($pay_query != "") {
      echo "<script>alert(\"Платеж успешно зачислен! Номер платежа: " . $inv_id . ". Если по каким то причинам оплата произошла, а кредиты на счет не поступили! Незамедлительно свяжитесь с администрацией сайта, c помощью системы сообщений.\");</script>";
      echo "<script>location.href=\"/ru/in\";</script>";
      exit();
  } else {
      exit();
  }
?>