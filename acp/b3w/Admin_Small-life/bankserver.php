<?
//include ("../../../setup.php");
define("CASINOENGINE", "True");
include_once ("../../../engine/config/config_db.php");
$game = "Small-life";
$mode = 1000000000 + $lines25_bankset + $lines25_jpotyes;
//настройки банка
//$mode = 0;
// выбираем валюту
if ( $lines25_valuta == "on" )
 {
  $valuta = $lines25_valutaset;
 }
 else 
  {
   $valuta =$lines25_valuta;
  }
// разрешаем юзверу выбирать ставки
if ( $lines25_useron == "Y" )
 {
  $useron = $lines25_useron ;
 }
 else 
  {
   $useron = "N";
  }
  
 if ($send =="1" )
  {
   if ($bank_bankmode == "on")
    {
     mysql_query("UPDATE games_bank SET bank='$lines25_bank' WHERE name='$game'");
    }

   if ($bank_bonusmode == "on")
    {
     mysql_query("UPDATE games_bank SET bonus='$lines25_bonus_bank' WHERE name='$game'");
    }
   if ($bank_bonusmode2 == "on")
    {
     mysql_query("UPDATE games_bank SET bonus2='$lines25_bonus_bank2' WHERE name='$game'");
    }
    
   mysql_query("UPDATE games_bank SET proc='$lines25_proc', winmax='$lines25_winlimit_1', income='$lines25_income', jpotproc='$lines25_jpotproc' WHERE name='$game'");
   mysql_query("UPDATE games_bank SET bonusready='$lines25_bonus_out',bonusproc='$lines25_bonus_proc',bonusmode='$bonusmode', mode='$mode' WHERE name='$game'");
   mysql_query("UPDATE games_bank SET mode2='$lines25_stav|$valuta|$useron|', mode3='$lines25_vol1|$lines25_vol2|$lines25_vol3|$lines25_vol4|$lines25_vol5|$lines25_vol6' WHERE name='$game'");
  
  $bankalert="Настройки сохранены успешно !";

  }
 

    // header("Location: index.php?bankalert=Настройки сохранены успешно !"); 
     header("Location: index.php"); 

//mode2 0.1|EU|N|
//mode3 0.1|0.2|0.3|0.4|0.5|1?>