<?php #::[ сохранение настроек слота]::#
/*#############################################||
||------------------ 3d Nyx -------------------||
|| автор  "timur & K media"Developer@gamatic.ru||
|| R#1304031215v4.63                           ||
||---------------------------------------------||
||#############################################*/
 $mess = "При сохранении произошла ошибка " ;
 $bank_bankmode     = '' ;
 $bank_bonusmode    = '' ;
 $bank_bonusmode2   = '' ;
 $bank_bonus_spin   = '' ;
 ${$slot."_useron"} = '' ;
 ${$slot."_vol1"} = 0 ;
 ${$slot."_vol2"} = 0 ;
 ${$slot."_vol3"} = 0 ;
 ${$slot."_lastcourse_bon"} = 0 ;
 ${$slot."_lastcourse_win"} = 0 ;
 ${$slot."_lin_limit"} = 0 ;
 ${$slot."_jpotyes"}   = 0 ;
 ${$slot."_bankset"}   = 0 ;
 ${$slot."_bonus_sh_zero"} = 0 ;
 ${$slot."_limitwin_up"}   = 0 ;
 ${$slot."_box_dow"}       = 0 ;
 ${$slot."_box_up"}        = 0 ;
 ${$slot."_box_number"}    = 0 ;
 ${$slot."_superkey_dow"}  = 0 ;
 ${$slot."_superkey_up"}   = 0 ;
 
 for ( Reset ( $_POST ) ; ( $k = key ( $_POST ) ) ; Next ( $_POST ) ) ${$k} = $_POST[$k] ; // скан POST'а
 $game = $_SESSION['games']    ;
 $mode = 1000000000 + ${$slot."_bankset"} + ${$slot."_jpotyes"} + ${$slot."_lin_limit"} + ${$slot."_lastcourse_win"} + ${$slot."_lastcourse_bon"} +"0000000020" ;
 
 //exit ( '${$slot."_lin_limit"}='. ${$slot."_lin_limit"} )  ;
 if ( ${$slot."_valuta"} == "on" ) $valuta = ${$slot."_valutaset"};// выбираем валюту
 else $valuta =${$slot."_valuta"};
 
 if ( ${$slot."_useron"} == "Y" ) $useron = ${$slot."_useron"} ;  // разрешаем юзверу выбирать ставки
 else $useron = "N";
  
 
 
$mode2_0  = (int)(${$slot."_bonus_curset"})    ;// счетчик спинов

$mode3_0  = (int)(${$slot."_bonus_figure"})    ;//Спинов до бонус игры
$mode3_1  = (int)(${$slot."_bonus_creditmax"}) ;//Мax.Сумма бонуса в монетах
$mode3_2  = (int)(${$slot."_bonus_number"})    ;//кол-во бонусов в бонус игре
if ( ( $game <> "Fruitcocktail" ) and ( $mode3_2 < 0 or $mode3_2 > 5 ) ) $mode3_2 = 5 ;
$mode3_3  = '' ;//(int)($__) ;
$mode3_4  = (int)(${$slot."_bonus_limits"})    ;//бонус сверх установленого лимита
if ( ${$slot."_valuta"} == "on" ) $mode3_5 = ${$slot."_valutaset"} ;
else  $mode3_5 = ${$slot."_valuta"}   ;
//$mode3_6  = ${$slot."_stav"}     ;//
$mode3_6  = (int)(${$slot."_limitwin"} )        ;// Кол-во спинов до выигрыша больше ставки рандомно - нижний пердел
$mode3_7  = (int)(${$slot."_limitmonet_bonus"}) ;// мин.Кол-во монет для запуска бонус-игры
$mode3_8  = (int)(${$slot."_scale"}) ;// Маштабирование слота
$mode3_9  = ${$slot."_useron"} ;// выбор произвольной мин. ставки да = 1 нет = 0 

$mode3_10  = ${$slot."_vol1"} ;//
$mode3_11  = ${$slot."_vol2"} ;//
$mode3_12  = ${$slot."_vol3"} ;//
$mode3_13  = '' ;
$mode3_14  = ${$slot."_bonus_sh_zero"} ;//Шанс проигрыша в бонусе 
$mode3_15  = (int)(${$slot."_limitwin_up"}) ;// Кол-во спинов до выигрыша больше ставки рандомно - верхний пердел
$mode3_16  = (int)(${$slot."_stake_1"}) ; // Определяем шаг ставок #1
$mode3_17  = (int)(${$slot."_stake_2"}) ; // Определяем шаг ставок #2 
$mode3_18  = (int)(${$slot."_stake_3"}) ; // Определяем шаг ставок #3
$mode3_19  = (int)(${$slot."_stake_4"}) ; // Определяем шаг ставок #4
$mode3_20  = (int)(${$slot."_stake_5"}) ; // Определяем шаг ставок #5
 
 ////////////////////////////
 
 if ( (${$slot."_bonus_proc"} + ${$slot."_income"} + ${$slot."_jpotproc"} ) > 99 ) // если не верно выставлен процент не даем сохранить
  {
   $mess = "Процент выставлен более 99 ! сохранить не возможно !" ;
   $options = "error" ;
  }
 if ( $mode3_16 > $mode3_17 ) 
  {
   $mess = "Настройки выставлены не верно ( Cпины до бонус игры от и до) сохранить не возможно!" ;
   $options = "error" ;
  }
  
 if ($options =="apply" )
  {
   if ( $bank_bankmode   == "on" ) $triger  =      MY_BANK_SUMM."='"  .${$slot."_bank"}."'"        ; else $triger  =      MY_BANK_SUMM  ."=".MY_BANK_SUMM   ."+'0'" ;     
   if ( $bank_bonusmode  == "on" ) $triger .= ", ".MY_BANK_BONUS."='" .${$slot."_bonus_bank"}."'"  ; else $triger .= ", ".MY_BANK_BONUS ."=".MY_BANK_BONUS  ."+'0'" ;
   if ( $bank_bonusmode2 == "on" ) $triger .= ", ".MY_BANK_BONUS2."='".${$slot."_bonus_bank2"}."'" ; else $triger .= ", ".MY_BANK_BONUS2."=".MY_BANK_BONUS2 ."+'0'" ; 
   if ( $bank_bonus_spin == "on" ) $triger .= ", ".MY_BANK_MODE2."='" .$mode2_0."'"                ; else $triger .= ", ".MY_BANK_MODE2 ."=".MY_BANK_MODE2  ."+'0'" ; 
   $triger .= ", ".MY_BANK_PROC    ."='".${$slot."_proc"}."', ".MY_BANK_MAX."='".${$slot."_winlimit_1"}."', ".MY_BANK_IN."='".${$slot."_income"}."', ".MY_BANK_JPPROC."='".${$slot."_jpotproc"}."'" ;
   $triger .= ", ".MY_BANK_BONREADY."='".${$slot."_bonus_out"}."', ".MY_BANK_BONPROC."='".${$slot."_bonus_proc"}."', ".MY_BANK_BONMODE."='".$bonusmode."', ".MY_BANK_MODE."='".$mode."' " ;
   $c = 0 ;
   $turn = '' ;
   while ( $c < 21 ) $turn .= ${"mode3_".$c++}."|" ;
   $triger .= ", ".MY_BANK_MODE3."='".$turn."'" ;
   if ( mysql_query ( "UPDATE ".MY_TABLE_BANK." SET ".$triger." WHERE name='".$game."'" ) ) $mess = "Настройки успешно сохранены !" ;
  }
 echo "<script language=\"JavaScript\"> alert('".$mess."') </script>" ;
    //header("Location: index.php"); 
?>