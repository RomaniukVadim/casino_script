<?
//Инициализация
session_start();

//Отправляем неавторизованных на login
if(isset($_SESSION['session_admin'])) $adm_login = $_SESSION['session_admin'];
else die("<script>location.href=\"/index.php\";</script>");
define("CASINOENGINE", "True");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN">
<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1251"><title>Панель администратора Видео-Слот B3W25Lines</title></head> 
   
  <body>
   <style type="text/css">
    .1_input
      {
       background: #EBEBFF;
      }
    .2_input
      { 
       background: #F5FFD4;
      }
    .3_input
      {
       background: #EBEBFF;
      }
    .4_input
      {
       background: #F5FFD4;
      }
    .5_input
      {
       background: #EBEBFF;
      }
    .6_input
      {
       background: #FFF000;
      } 

    .1_checkbox
      {
       bgcolor: #F5FFD4;
       background: #F5FFD4;
       color: #F5FFD4;
      }
    .2_checkbox
      {
       bgcolor: #F5FFD4;
       background: #F5FFD4;
       color: #F5FFD4;
      }
    .3_checkbox
      {
       background: #F5FFD4;
      }
    .4_checkbox
      {
       background: #F5FFD4;
      }
   </style>
    <link href="default.css" rel="stylesheet" type="text/css">
    
	<table align="center">
     <tbody><tr><td>
     <center>
     <h4>
		<font face="Verdana" color="#7C87C2"><h1><span id="theText" style="width:100%; color: #265342"><strong>  <marquee height="30" width="570" loop="20" direction="left" scrollamount="3" .="">Админпанель Видеослот "для 25 линеек"</marquee></strong></span></h1></font>
		<h1><font face="Verdana" color="#7C87C2"></font></h1>
	</h4>
	</center><br> 
      <!-- Выбор слота-->
     <form name="dateselect" action="" method="post" onsubmit="var dir = document.getElementById('slot_selected').value;document.location='/acp/b3w/'+dir+'/'; return false;"> 
     <font face="Verdana" color="blue"><center><b>Выбор Слота</b></center></font><br>
      <center>
       <select name="slot_selected" id="slot_selected">
        <option value="25-lines_Slots" selected="">25 Lines Slot </option>
		
		<option value="Admin_Atlantis">Atlantis </option>
		<option value="Admin_Dartagnan">Dartagnan </option>
		<option value="Admin_Devils">Devils_Bikers </option>
		<option value="Admin_Dracula">Dracula </option>
		<option value="Admin_Gladiator">Gladiators </option>
		<option value="Admin_HappyFarm">HappyFarm </option>
		<option value="Admin_Jungle">Jungle </option>
		<option value="Admin_Jurassic">Jurassic </option>
		<option value="Admin_Lucky_Luke">Lucky_Luke </option>
		<option value="Admin_LunaPark">LunaPark </option>
		<option value="Admin_mafia">Mafia </option>
		<option value="Admin_mont-blanc">Mont-blanc </option>
		<option value="Admin_Navy">Navy </option>
		<option value="Admin_Numbers">Numbers </option>
		<option value="Admin_Small-life">Small-life </option>
		<option value="Admin_Zorro">Zorro </option>
      </select>
     <input type="submit" class="button" value="Показать">
    </center>
   </form>
    <!-- /Выбор слота-->
      
      

       <font face="Verdana" color="magenta"><center><b></b></center></font>       <font face="Verdana" color="blue"><center><b>Настройка параметров банка</b></center></font>
      </td>
      </tr>
       </tbody></table>
	   <form name="setings" action="" method="post">
	   <?php
		//include '../../../setup.php';
                include ("../../../engine/config/config_db.php");

		if ( isset($_REQUEST['save']) ) {
			 mysql_query("UPDATE `games_bank` SET `bank`='".mysql_escape_string($_REQUEST['bank'])."', `winmax`='".mysql_escape_string($_REQUEST['winmax'])."', `proc`='".mysql_escape_string($_REQUEST['proc'])."', `income`='".mysql_escape_string($_REQUEST['income'])."' WHERE `name`='25linb2' LIMIT 1");
		}

		$res = mysql_query("SELECT * FROM `games_bank` WHERE `name`='25linb2' LIMIT 1");
		$game = mysql_fetch_assoc($res);
		?>
	   <table border="0" align="center" bgcolor="#EBEBFF">
        <tbody>
        <!-- настройка банка игры-->
        <tr>
         <td align="right">Банк игры для 25 линеек <input class="1_input" type="text" maxlength="20" size="10" name="bank" value="<?php echo $game['bank'];?>"> Руб.</td>
         <td align="right">Процент выдачи на 1 спин <input class="1_input" maxlength="20" size="10" name="proc" value="<?php echo $game['proc'];?>"> %.&nbsp;&nbsp;</td>
         <td align="right">Забираем с каждого спина <input class="1_input" maxlength="5" size="10" name="income" value="<?php echo $game['income'];?>"> %</td>
        </tr> 
        <tr>
         <td align="right"></td>
         <td align="left"></td>
        </tr> 
        <tr>
          <td align="right">Лимит на 1 спин max. <input class="1_input" maxlength="20" size="10" name="winmax" value="<?php echo $game['winmax'];?>">  Руб.</td>
          <td align="left">Максимальная сумма выигрыша на одну ставку</td>
        </tr>
        </tbody>
		</table>
		
		<table align="center">
         <tbody><tr>
          <td><br>
           <p align="left">
            <font face="Verdana"></font>
            <font face="Verdana"> <input type="submit" name="save" value="Сохранить настройки"></font> 
           </p>
          </td>
        </tr></tbody></table>
        </form>
     <table align="center">
      <tbody><tr>
       <td>
        <form action="/acp/acp_admin/index.php" method="post">
         <p>&nbsp;</p>
          <p align="left">
          <input type="hidden" value="0" name="send">
          <input type="submit" value="Главная  админпанель">
         </p>
        </form> 
       </td>
      
      </tr>
     </tbody></table><br><br>
     <div style="background-image: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: rgb(255, 255, 191); border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; color: rgb(0, 0, 0); margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; font-family: arial, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; height: auto; line-height: normal; text-align: left; width: auto; direction: ltr; z-index: 99995; background-position: initial initial; background-repeat: initial initial; "></div>
 </body>
 </html>