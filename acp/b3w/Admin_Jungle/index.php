<?// include ("header.php");
$game = "Jungle"    ; // название игры
$gamestat = "Jungle"; // название в стате
$gamewid = "Jungle" ;
$adm = "lines25";

//Инициализация
session_start();

//Отправляем неавторизованных на login
if(isset($_SESSION['session_admin'])) $adm_login = $_SESSION['session_admin'];
else die("<script>location.href=\"/index.php\";</script>");

define("CASINOENGINE", "True");

include ("../../../setup.php");
include ("../../../engine/config/config_db.php");
include ("../../auth.php"); 
include ("mode.php"); 
$resultg=mysql_query("select * from games_bank where name='ttuz'");
$rog=mysql_fetch_array($resultg);

$resulta=mysql_query("select * from games_bank where name='$game'");
$rom=mysql_fetch_array($resulta);

$resulta=mysql_query("select * from games_bank where name='25linb2'");
$ron=mysql_fetch_array($resulta);
$stav_array = explode("|" , $rom ["mode3"]);
$valu_array = explode("|" , $rom ["mode2"]);

// var syle
$bgctable_1="#EBEBFF";
$bgctable_2="#F5FFD4";
$bgctable_3="#EBEBFF";
$bgctable_4="#F5FFD4";
$bgcinput_1="#EBEBFF";
$bgcinput_2="#F5FFD4";
$bgcinput_3="#EBEBFF";
$bgcinput_4="#F5FFD4";
$bgcinput_5="#EBEBFF";
$bgcinput_6="#FFF000";

// определяем браузер
if (eregi("MSIE", $_SERVER['HTTP_USER_AGENT'])) $string="Internet Explorer";
 else if (eregi("Firefox", $_SERVER['HTTP_USER_AGENT'])) $string="Firefox" ;
 else if (eregi("Opera", $_SERVER['HTTP_USER_AGENT'])) $string="Opera"     ;


 if ( $string == "Internet Explorer" )
 {
  $bru = "script_s.php";
 }
 else
 {
  $bru = "script_a.php";
 }
//======================
// ставки
if ( $valu_array[0] == $stav_array[0])
 {
  $stav1 = "checked" ;
 }
if ( $valu_array[0] == $stav_array[1])
 {
  $stav2 = "checked" ;
 }
if ( $valu_array[0] == $stav_array[2])
 {
  $stav3 = "checked" ;
 }
if ( $valu_array[0] == $stav_array[3])
 {
  $stav4 = "checked" ;
 }
if ( $valu_array[0] == $stav_array[4])
 {
  $stav5 = "checked" ;
 }
if ( $valu_array[0] == $stav_array[5])
 {
  $stav6 = "checked" ;
 }
if ( $valu_array[0] == $stav_array[6])
 {
  $stav7 = "checked" ;
 }
if ( $valu_array[0] == $stav_array[7])
 {
  $stav8 = "checked" ;
 }
if ( $valu_array[2] == "Y")
 {
  $setuseron = "checked" ;
 }
 
// валюта
 $valutypx = "checked" ;// если выбор определен пользовательский

if ($valu_array[1] == "Ru")
 {
   $valutypr ="checked";
   $valutypx = ""      ;
 }
if ($valu_array[1] == "$")//$
 {
   $valutypd ="checked";
   $valutypx = ""      ;
 }
   
if ($valu_array[1] == "€")//€
 {
   $valutype ="checked";
   $valutypx = ""      ;
 }

if ($valu_array[1] == "UA")
 {
   $valutypg ="checked";
   $valutypx = ""      ;
 }
if ($valu_array[1] == "BZ")
 {
   $valutypz ="checked";
   $valutypx = ""      ;
 }
if ($valu_array[1] == "KZ")
 {
   $valutypt ="checked";
   $valutypx = ""      ;
 }
if ($valu_array[1] == "LV")
 {
   $valutypl ="checked";
   $valutypx = ""      ;
 }
if ($valu_array[1] == "FU")
 {
   $valutypf ="checked";
   $valutypx = ""      ;
 }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2//EN">
  
<html>
 <head></head> 
 <title>Панель администратора Видео-Слот <?echo $gamestat ?></title>  
  <body>
   <style type="text/css">
    .1_input {
     background: <? echo $bgcinput_1 ?>;
     }
    .2_input {
     background: <? echo $bgcinput_2 ?>;
     }
    .3_input {
     background: <? echo $bgcinput_3 ?>;
     }
    .4_input {
     background: <? echo $bgcinput_4 ?>;
     }
    .5_input {
     background: <? echo $bgcinput_5 ?>;
     }
    .6_input {
     background: <? echo $bgcinput_6 ?>;
     } 

    .1_checkbox {
     bgcolor: <? echo $bgcinput_4 ?>;
     background: <? echo $bgcinput_4 ?>;
     color: <? echo $bgcinput_4 ?>;
     }
    .2_checkbox {
     bgcolor: <? echo $bgcinput_4 ?>;
     background: <? echo $bgcinput_4 ?>;
     color: <? echo $bgcinput_4 ?>;
     }
    .3_checkbox {
     background: <? echo $bgcinput_4 ?>;
     }
    .4_checkbox {
     background: <? echo $bgcinput_4 ?>;
     }
   </style>
    <link href="default.css" rel="stylesheet" type="text/css">
    <table align="center" >
     <TR>
      <TD>
       <h4><font face="Verdana" color="#7C87C2" ><center><? include ("$bru")?></center></font></h4><br> 
        <FORM name="setings" action=bankserver.php method=post>
        <font face="Verdana" color="blue" ><center><B>Настройка параметров банка</B></center></font>
      </TD>
     </TR>
       <table border="0" align="center" bgcolor=<? echo $bgctable_1 ?> >
        <TR>
         <TD align="right" >Общий Банк
          <INPUT class="1_input" type="text" maxLength=20 size=10 name=games_bank value="<? echo $rog[1] ?>" > Руб.</TD>
         <TD align="right" >Банк 25 линейных слотов
          <INPUT class="1_input" maxLength=20 size=10 name=bank value="<? echo $ron['bank'] ?>" > Руб.</TD>
         <TD align="left">&nbsp;&nbsp; Эти параметры изменить нельзя</TD>
        </TR> 
        
        <!-- настройка банка игры lines25b2-->
        <TR>
         <TD align="right" >Банк игры <? echo $gamewid ; ?>
          <INPUT class="1_input" type="text" maxLength=20 size=10 name=<?echo "$adm";?>_bank value="<? echo $rom['bank'] ?>" > Руб.</TD>
         <TD align="right" >Процент выдачи на 1 спин
          <INPUT class="1_input" maxLength=20 size=10 name=<?echo "$adm";?>_proc value="<? echo $rom['proc'] ?>" > %.&nbsp;&nbsp;</TD>
         <TD align="right">Забираем с каждого спина
          <INPUT class="1_input" maxLength=5 size=10 name=<?echo "$adm";?>_income value="<? echo $rom['income'] ?>" > %</TD>
        </TR> 
        <TR >
         <TD align="right" >Изменить Банк игры <? echo $gamewid ; ?>
          <INPUT class="1_input" type="checkbox" maxLength=20 size=10 name=bank_bankmode value="on" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </TD>
         <TD align="left"  >если да то ставим галочку</TD>
        </TR> 
        <TR>
          <TD align="right" >Лимит на 1 спин max.
           <INPUT class="1_input" maxLength=20 size=10 name=<?echo "$adm";?>_winlimit_1 value="<? echo $rom['winmax'] ?>" >  Руб.</TD>
          <TD align="left"  >Максимальная сумма выигрыша на одну ставку</TD>
        </TR>
        </option> 
           <!-- настройка Бонуса игры-->
        <TR>
         <TD align="right" >Банк Бонуса
          <INPUT class="1_input" maxLength=20 size=10 name=<?echo "$adm";?>_bonus_bank value="<? echo $rom['bonus'] ?>"     >  Руб.</TD>
         <TD align="right" >Сума готовности выдачи бонуса
          <INPUT class="1_input" maxLength=10 size=10 name=<?echo "$adm";?>_bonus_out value="<? echo $rom['bonusready'] ?>" > руб.</TD>
         <TD align="right">Забираем с каждого спина
          <INPUT class="1_input" maxLength=5 size=10 name=<?echo "$adm";?>_bonus_proc value="<? echo $rom['bonusproc'] ?>"  > % </TD>
        </TR>
        <TR>
         <TD align="right" ><font face="Verdana" >Изменить Банк Бонуса
          <INPUT class="1_input" type="checkbox" maxLength=20 size=10 name=bank_bonusmode value="on" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </font></TD>
         <TD align="left" >если да то ставим галочку</TD>
        </TR>
       </table>
        <!-- настройка параметров игры-->
       <font face="Verdana" color="blue" ><center><B>Выбор банка с которым взаимодействует слот</B></center></font>
       <table border="0" align="center" bgcolor=<? echo $bgctable_2 ?> >
        <TR>
         <TD align="right" ><font face="Verdana">Слот работает с общим банком казино</font>
          <INPUT class="2_checkbox" type="radio" name="<?echo "$adm";?>_bankset"  value="0000000001" <? echo $mode0001; ?>>&nbsp;</TD>
         <TD  align="left" ><font face="Verdana">Слот работает с общим банком для 25 линейных слотов</font>
          <INPUT class="2_checkbox" type="radio" name="<?echo "$adm";?>_bankset"  value="0000000002" <? echo $mode0002; ?>>&nbsp;</TD>
         <TD align=right ><font face="Verdana" >Слот работает с отдельным банком  </font>
          <INPUT class="2_checkbox" type="radio" name="<?echo "$adm";?>_bankset" value="0000000004" <? echo $mode0004; ?>>&nbsp;</TD>
        </TR>
       </table>
        <!-- настройка Валюты -->
       <font face="Verdana" color="blue" ><center><B>Настройка отображаемой валюты и стоимости ставок</B></center></font>
       <table border="0" align="center" bgcolor=<? echo $bgctable_3 ?> >
        <TR>
         <TD align="right"> Выбор валюты</TD>
         <TD>&nbsp;&nbsp;&quot;Ru&quot; 
          <INPUT class="3_input" type="radio" name=<?echo "$adm";?>_valuta value="Ru" <? echo $valutypr ; ?> >¤ </TD>
         <TD>&nbsp;&nbsp;&quot;$&quot;
          <INPUT class="3_input" type="radio" name=<?echo "$adm";?>_valuta value="$"  <? echo $valutypd ; ?> >¤ </TD>
         <TD>&nbsp;&nbsp;&quot;€&quot;
          <INPUT class="3_input" type="radio" name=<?echo "$adm";?>_valuta value="€"  <? echo $valutype ; ?> >¤ </TD>
         <TD>&nbsp;&nbsp;&quot;UA&quot;
          <INPUT class="3_input" type="radio" name=<?echo "$adm";?>_valuta value="UA" <? echo $valutypg; ?> >¤ </TD>
         <TD>&nbsp;&nbsp;&quot;BZ&quot;
          <INPUT class="3_input" type="radio" name=<?echo "$adm";?>_valuta value="BZ" <? echo $valutypz; ?> >¤ </TD>
         <TD>&nbsp;&nbsp;&quot;KZ&quot;
          <INPUT class="3_input" type="radio" name=<?echo "$adm";?>_valuta value="KZ" <? echo $valutypt; ?> >¤ </TD>
         <TD>&nbsp;&nbsp;&quot;LV&quot;
          <INPUT class="3_input" type="radio" name=<?echo "$adm";?>_valuta value="LV" <? echo $valutypl; ?> >¤ </TD>
         <TD>&nbsp;&nbsp;&quot;Fun&quot;
          <INPUT class="3_input" type="radio" name=<?echo "$adm";?>_valuta value="FU" <? echo $valutypf; ?> >¤ </TD>
        </TR>
        <TR>
         <TD align="right"> валюта отображаемая в слоте</TD>
         <TD colspan=4 align="left" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <INPUT class="3_input" maxLength=2 size=2 name=<?echo "$adm";?>_valutaset value="<? echo $valu_array[1] ?>" >.
            определить тип самостоятельно
          <INPUT class="3_input" type="radio" maxLength=2 size=2 name=<?echo "$adm"; ?>_valuta <? echo $valutypx ?>    ></TD>
         <TD colspan=4 align="left" >
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Активировать выбор ставки  пользователями
          <INPUT class="6_input" type="checkbox" maxLength=2 size=2 name=<?echo "$adm";?>_useron value="Y"<? echo $setuseron ?> >. </TD>
        </TR>
        <TR>
         <TD align="right">Определяем величины ставок</TD>
         <TD>&nbsp;&nbsp;#1
          <INPUT class="3_input" maxLength=4 size=4 name=<?echo "$adm";?>_vol1 value="<? echo $stav_array[0] ?>" >. </TD>
        <TD>&nbsp;&nbsp;#2
         <INPUT class="3_input" maxLength=3 size=4 name=<?echo "$adm";?>_vol2 value="<? echo $stav_array[1] ?>" >. </TD>
        <TD>&nbsp;&nbsp;#3
         <INPUT class="3_input" maxLength=3 size=4 name=<?echo "$adm";?>_vol3 value="<? echo $stav_array[2] ?>" >. </TD>
        <TD>&nbsp;&nbsp;#4
         <INPUT class="3_input" maxLength=3 size=4 name=<?echo "$adm";?>_vol4 value="<? echo $stav_array[3] ?>" >. </TD>
        <TD>&nbsp;&nbsp;#5
         <INPUT class="3_input" maxLength=3 size=4 name=<?echo "$adm";?>_vol5 value="<? echo $stav_array[4] ?>" >. </TD>
        <TD>&nbsp;&nbsp;#6
         <INPUT class="3_input" maxLength=3 size=4 name=<?echo "$adm";?>_vol6 value="<? echo $stav_array[5] ?>" >. </TD>
        <!--  <TD>&nbsp;&nbsp;#7
         <INPUT class="3_input" maxLength=3 size=4 name=<?echo "$adm";?>_vol7 value="<? echo $stav_array[6] ?>" >. </TD>
        <TD>&nbsp;&nbsp;#8
         <INPUT class="3_input" maxLength=3 size=4 name=<?echo "$adm";?>_vol8 value="<? echo $stav_array[7] ?>" >. </TD> -->
        </TR>
        <TR>
         <TD align="right">Минимальная ставка в выбраной валюте</TD>
         <TD>&nbsp;&nbsp;#1&nbsp;
          <INPUT class="3_input" type="radio" name=<?echo "$adm";?>_stav value="<? echo $stav_array[0] ?>" <? echo $stav1 ?> >¤ </TD>
         <TD>&nbsp;&nbsp;#2&nbsp;
          <INPUT class="3_input" type="radio" name=<?echo "$adm";?>_stav value="<? echo $stav_array[1] ?>" <? echo $stav2 ?> >¤ </TD>
         <TD>&nbsp;&nbsp;#3&nbsp;
          <INPUT class="3_input" type="radio" name=<?echo "$adm";?>_stav value="<? echo $stav_array[2] ?>" <? echo $stav3 ?> >¤ </TD>
         <TD>&nbsp;&nbsp;#4&nbsp;
          <INPUT class="3_input" type="radio" name=<?echo "$adm";?>_stav value="<? echo $stav_array[3] ?>" <? echo $stav4 ?> >¤ </TD>
         <TD>&nbsp;&nbsp;#5&nbsp;
          <INPUT class="3_input" type="radio" name=<?echo "$adm";?>_stav value="<? echo $stav_array[4] ?>" <? echo $stav5 ?> >¤ </TD>
         <TD>&nbsp;&nbsp;#6&nbsp;
          <INPUT class="3_input" type="radio" name=<?echo "$adm";?>_stav value="<? echo $stav_array[5] ?>" <? echo $stav6 ?> >¤ </TD>
         <!--   <TD>&nbsp;&nbsp;#7&nbsp;
          <INPUT class="3_input" type="radio" name=<?echo "$adm";?>_stav value="<? echo $stav_array[6] ?>" <? echo $stav7 ?> >¤ </TD>
         <TD>&nbsp;&nbsp;#8&nbsp;
          <INPUT class="3_input" type="radio" name=<?echo "$adm";?>_stav value="<? echo $stav_array[7] ?>" <? echo $stav8 ?> >¤ </TD> -->
        </TR>
       </table>
         <!-- модул "ДжекПот -->   
       <font face="Verdana" color="blue"><center><B>Настройки взаимодействия с модулем "ДжекПот"</B><center></font><BR>
       <TABLE border="0" align="center" bgcolor=<? echo $bgctable_2 ?> >
        <TR>
         <TD>Текущий банк "ДжекПота"
          <INPUT class="2_input" maxLength=20 size=10 name=bank_jpot value="<? echo $rog['jackpot'] ?>" >  Руб.</TD>
         <TD>&nbsp;&nbsp; Забираем с каждого спина в банк "ДжекПота"
          <INPUT class="2_input" maxLength=20 size=10 name=<?echo "$adm";?>_jpotproc value="<? echo $rom['jpotproc'] ?>" >%. </TD>
         <TD><LI>Слот участвует в "ДжекПоте"</LI>
          <INPUT class="2_input" type=checkbox maxLength=20 size=10 name=<?echo "$adm";?>_jpotyes value="0000000010"<? echo $mode0010 ?> >  </TD>
        </TR>
         <!-- кнопка--> 
        <table align="center" >
         <TR>
          <TD><BR>
           <p align="left">
            <font face="Verdana"><INPUT type=hidden value="1" name=send></font>
            <font face="Verdana"> <INPUT type=submit value="Сохранить настройки"></font> 
           </p>
          </TD>
         <!-- <TD ><? echo $bankalert ?></TD> -->
        </table>
        </TR>
      </FORM> 
    </table>
     <!-- Статистика -->
<?php
 // 25 линейка
  $dropdate_y = substr($dropdate_y, 2, 3);
  $dropdate=$dropdate_d.".".$dropdate_m.".".$dropdate_y;
  if ($dropdate == "..")
   { 
     $dropdate = date("d.m.y");
   }
  list($betall) = mysql_fetch_row(mysql_query("SELECT SUM(stav) FROM games_stats WHERE game='$gamestat-spin'or game='$gamestat-Bonus1' or game='$gamestat-Bonus2'"))                                                               ;
   
  list($winall) = mysql_fetch_row(mysql_query("SELECT SUM(win) FROM games_stats WHERE game='$gamestat-spin'or game='$gamestat-Bonus1'or game='$gamestat-Bonus2' "))                                                                ;
  
  list($winbon) = mysql_fetch_row(mysql_query("SELECT SUM(win) FROM games_stats WHERE game='$gamestat-Bonus1'or game='$gamestat-Bonus2' "))                                                                                        ;
  
  $colbet = mysql_num_rows(mysql_query("SELECT * FROM games_stats WHERE game='$gamestat-spin' or  game='$gamestat-Bonus1' or game='$gamestat-Bonus2' "))                                                                           ;
     
  list($betall2) = mysql_fetch_row(mysql_query("SELECT SUM(stav) FROM games_stats WHERE game='$gamestat-spin' && data='$dropdate'or game='$gamestat-Bonus1' && data='$dropdate' && game='$gamestat-Bonus2' && data='$dropdate' ")) ;

  list($winall2) = mysql_fetch_row(mysql_query("SELECT SUM(win) FROM games_stats WHERE game='$gamestat-spin' && data='$dropdate' or game='$gamestat-Bonus1' && data='$dropdate' && game='$gamestat-Bonus2' && data='$dropdate' ")) ;

  list($winbon2) = mysql_fetch_row(mysql_query("SELECT SUM(win) FROM games_stats WHERE game='$gamestat-Bonus1'  && data='$dropdate' or game='$gamestat-Bonus2'  && data='$dropdate' "))                                            ;
  
  $colbet2 = mysql_num_rows(mysql_query("SELECT * FROM games_stats WHERE game='$gamestat-spin' && data='$dropdate' or game='$gamestat-Bonus1' && data='$dropdate' or game='$gamestat-Bonus2' && data='$dropdate' "))               ;
  
  $dohod   = $betall-$winall             ;
  $dohod2  = $betall2-$winall2           ;
  $betall  = sprintf ("%01.2f", $betall ); 
  $winall  = sprintf ("%01.2f", $winall );
  $winbon  = sprintf ("%01.2f", $winbon );
  $dohod   = sprintf ("%01.2f", $dohod  );
  $betall2 = sprintf ("%01.2f", $betall2); 
  $winall2 = sprintf ("%01.2f", $winall2);
  $winbon2 = sprintf ("%01.2f", $winbon2);
  $dohod2  = sprintf ("%01.2f", $dohod2 );
?>

    <FONT face="Verdana" color="blue"><CENTER><B>Общая Статистика по Видеослоту</B></CENTER></FONT><BR>
     <TABLE border="1" align="center" bgcolor=<? echo $bgctable_3?> cellspacing=0 cellpadding=3 >
      <TR>
       <TD class=text1><B>Сыграно игр</B></TD>
       <TD class=text1><B>Сделано ставок</B></TD>
       <TD class=text1><B>Выигрышей всего</B></TD>
       <TD class=text1><B>Из них получено бонусом</B></TD>
       <TD class=text1><B>Оборот Прибыли по слоту</B></TD>
       <TD class=text1><B>Фактически доход Казино</B></TD>
      </TR>
       
<?       
     echo "
     <TR><TD class=text1>$colbet</TD><TD class=text1>$betall</TD><TD class=text1>$winall</TD><TD class=text1>$winbon</TD><TD class=text1>$dohod</TD><TD class=text1>$rom[incash]</TD></TR>
     ";
?>      
     </TABLE>
      <!-- Статистика по дате-->
      <FORM name="dateselect" action=index.php method=post> 
       <FONT face="Verdana" color="blue"><CENTER><B>Выборка статистики по дате</B></CENTER></FONT><BR>
        <CENTER>
<?        
         DateDropDown($dropdate); 
?>        
         <INPUT type='submit' class='button' value='смотреть' >
        </CENTER>
       <TABLE border="1" align="center" bgcolor=<? echo $bgctable_2 ?> cellspacing=0 cellpadding=3 >
        <TR>
         <TD class=text1><B>Сыграно игр</B></TD>
         <TD class=text1><B>Сделано ставок</B></TD>
         <TD class=text1><B>Выигрышей всего</B></TD>
         <TD class=text1><B>Из них получено бонусом</B></TD>
         <TD class=text1><B>Оборот Прибыли по слоту</B></TD>
         <TD class=text1><B>Фактически доход Казино</B></TD>
        </TR>
<?         
        echo "
         <TR><TD class=text1>$colbet2</TD><TD class=text1>$betall2</TD><TD class=text1>$winall2</TD><TD class=text1>$winbon2</TD><TD class=text1>$dohod2</TD><TD class=text1>- - -</TD></TR>
        ";
?>       
       </TABLE>
      </FORM> 
<?
function DateDropDown($def)
 {     
   $deff=explode(".", $def);
   echo "<select name=dropdate_d >\n";
   for ($i_d = 1; $i_d <= 31; $i_d++)
    {
      $i_d = sprintf ("%02d", $i_d);
     if ($i_d == $deff[0])
      {
       $selected="SELECTED";
      }
     else
      {
       $selected="";
      }
     echo "<OPTION value=\"$i_d\" $selected>$i_d</OPTION>\n";
    }
   echo "</SELECT>.";
   echo "<SELECT name=dropdate_m >\n";
   for ($i_m = 1; $i_m <= 12; $i_m++)
    {
      $i_m = sprintf ("%02d", $i_m);
      if ($i_m == $deff[1])
       {
        $selected="SELECTED";
       }
      else
       {
        $selected="";
       }
     echo "<OPTION value=\"$i_m\" $selected>$i_m</OPTION>\n";
    }
   echo "</SELECT>.";
   echo "<SELECT name=dropdate_y >\n";
   for ($i_y = 2009; $i_y <= 2020; $i_y++)
    {
     if ($i_y == "20".$deff[2])
      {
       $selected="SELECTED";
      }
     else
      {
        $selected="";
      }
     echo "<OPTION value=\"$i_y\" $selected>$i_y</OPTION>\n";
    }    
   echo "</SELECT>\n";
  }    
?>  
     </TABLE>
      
      <!-- кнопка--> 
       
     <TABLE align="center">
      <TR>
       <TD>
        <FORM action=../../acp_admin/index.php method=post>
         <p>&nbsp;</p>
          <p align="left">
          <INPUT type=hidden value=0 name=send>
          <INPUT type=submit value="Главная  админпанель">
         </p>
        </FORM> 
       </TD>
       <TD>
        <FORM action=../25-lines_Slots/index.php method=post>
         <p>&nbsp;</p>
          <p align="left">
          <INPUT type=hidden value=0 name=send>
          <INPUT type=submit value="Админпанель 25 линейки">
        </p>
        </FORM>
       </TD>
      </TR>
     </table><BR><BR>
      
   </table>
  </body>
 </html>