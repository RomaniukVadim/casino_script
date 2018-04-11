<?
//include ("../../../setup.php");
define("CASINOENGINE", "True");
include_once ("../../../engine/config/config_db.php");
$game = "luke";
$mode = 1000000000 + $luke_bankset + $luke_jpotyes;
//настройки банка
//Ковбой
//$mode = 0;
// выбираем валюту
if ( $luke_valuta == "on" )
 {
  $valuta = $luke_valutaset;
 }
 else 
  {
   $valuta =$luke_valuta;
  }
// разрешаем юзверу выбирать ставки
if ( $luke_useron == "Y" )
 {
  $useron = $luke_useron ;
 }
 else 
  {
   $useron = "N";
  }
  
 if ($send =="1" )
  {
   if ($bank_bankmode == "on")
    {
     mysql_query("UPDATE games_bank SET bank='$luke_bank' WHERE name='$game'");
    }

   if ($bank_bonusmode == "on")
    {
     mysql_query("UPDATE games_bank SET bonus='$luke_bonus_bank' WHERE name='$game'");
    }
   if ($bank_bonusmode2 == "on")
    {
     mysql_query("UPDATE games_bank SET bonus2='$luke_bonus_bank2' WHERE name='$game'");
    }
    
   mysql_query("UPDATE games_bank SET proc='$luke_proc', winmax='$luke_winlimit_1', income='$luke_income', jpotproc='$luke_jpotproc' WHERE name='$game'");
   mysql_query("UPDATE games_bank SET bonusready='$luke_bonus_out',bonusproc='$luke_bonus_proc',bonusmode='$bonusmode', mode='$mode' WHERE name='$game'");
   mysql_query("UPDATE games_bank SET mode2='$luke_stav|$valuta|$useron|', mode3='$luke_vol1|$luke_vol2|$luke_vol3|$luke_vol4|$luke_vol5|$luke_vol6' WHERE name='$game'");
  
  $bankalert="Настройки сохранены успешно !";

  }
 

     header("Location: index.php"); 

?>