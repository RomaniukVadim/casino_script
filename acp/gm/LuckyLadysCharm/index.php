<?
include ("../../../setup.php");
include ("../../auth.php"); 

$dbgamename="luckyladyfl";
$gamehint="Lucky Lady's Charm";
$dbtablename="g_set_new";

if ($send == "1") {
$send="";
mysql_query("update ".$dbtablename." set g_bank=$g_bank where g_name='".$dbgamename."'");
mysql_query("update ".$dbtablename." set g_proc=$g_proc where g_name='".$dbgamename."'");
echo "<script> alert('Настройки сохранены!'); document.location.href='index.php';</script>";
}

if ($send == "2") {
$send="";
mysql_query("update ".$dbtablename." set g_rezim=$g_rezim where g_name='".$dbgamename."'");
echo "<script> alert('Настройки сохранены!'); document.location.href='index.php';</script>";
}

if ($send == "3") {
$send="";
$g_shanswin=$g_shanswin1."|".$g_shanswin3."|".$g_shanswin5."|".$g_shanswin7."|".$g_shanswin9."|";
$g_shansbon=$g_shansbon1."|".$g_shansbon2."|".$g_shansbon3."|";
mysql_query("update ".$dbtablename." set g_shansbon='$g_shansbon' where g_name='".$dbgamename."'");
mysql_query("update ".$dbtablename." set g_shanswin='$g_shanswin' where g_name='".$dbgamename."'");
mysql_query("update ".$dbtablename." set g_rezerv='$g_shansdouble' where g_name='".$dbgamename."'");
echo "<script> alert('Настройки сохранены!'); document.location.href='index.php';</script>";
}



$row_bon=mysql_fetch_array(mysql_query("select * from ".$dbtablename." where g_name='".$dbgamename."'"));
$g_shansbon=$row_bon['g_shansbon'];
$shs2=explode("|", $g_shansbon);
$g_shansbon1=$shs2[0];
$g_shansbon2=$shs2[1];
$g_shansbon3=$shs2[2];
$g_shanswin=$row_bon['g_shanswin'];
$g_shansdouble=$row_bon['g_rezerv'];
$g_bank=$row_bon['g_bank'];
$g_proc=$row_bon['g_proc'];
$g_rezim=$row_bon['g_rezim'];
$shs=explode("|", $g_shanswin);
$g_shanswin1=$shs[0];
$g_shanswin3=$shs[1];
$g_shanswin5=$shs[2];
$g_shanswin7=$shs[3];
$g_shanswin9=$shs[4];

if ($g_rezim==1){$g_rezim1="CHECKED";$g_rezim2="";$g_rezim3="";$g_rezim4="";$g_rezim5=""; }
if ($g_rezim==2){$g_rezim1="";$g_rezim2="CHECKED";$g_rezim3="";$g_rezim4="";$g_rezim5=""; }
if ($g_rezim==3){$g_rezim1="";$g_rezim2="";$g_rezim3="CHECKED";$g_rezim4="";$g_rezim5=""; }
if ($g_rezim==4){$g_rezim1="";$g_rezim2="";$g_rezim3="";$g_rezim4="CHECKED";$g_rezim5=""; }
if ($g_rezim==5){$g_rezim1="";$g_rezim2="";$g_rezim3="";$g_rezim4="";$g_rezim5="CHECKED"; }
?>

<html>
<head>
<title>Настройка игры <? echo $gamehint; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link href="../../text.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#ffffff" text="#000000">



<center><b>Настройка игры  <? echo $gamehint; ?></b><br><a href=../../index.php> << Вернуться в админку </a><br><br></center>

<table border="0" align="center" cellpadding="5" cellspacing="0" >
<TR><TD>

<table border="0" align="left" cellpadding="2" cellspacing="0" >
<td>
<FORM name="blabla1" action=index.php method=post>
<TR><TD align="center" valign="center"><h4><font color=green>Касса игры</font></h4></td><td>&nbsp;</td></tr>
<TR><TD align="right">В кассе игры </td><td><INPUT maxLength=20 size=10 name=g_bank value="<?echo $g_bank;?>" style="border: 1px solid rgb(0,0,0)"> трогать ваше нерокомендеться!!!</TD></TR>
<TR><TD><b>Процент от ставки в кассу</b></TD><td>&nbsp;</td></TR>
<TR><TD align="right">%</td><td><INPUT maxLength=20 size=10 name=g_proc value="<? echo $g_proc; ?>" style=" border: 1px solid rgb(0,0,0)"> 95 неменьше</TD></TR>
<TR><TD align="right"><INPUT type=hidden value=1 name=send><INPUT type=submit value="Сохранить"></TD><td>&nbsp;</td></TR>
</FORM>
</td>
</table>


<table border="0" align="left" cellpadding="30" cellspacing="0" >
<td>
</td>
</table>





<TR><TD>
<table border="0" align="left" cellpadding="2" cellspacing="0" >
<td>
<FORM name="blabla3" action=index.php method=post>
<TR><TD align="center" valign="center"><h4><font color=green>Частота выпадения</font></h4></td></tr>

<TR><TD align="left">Бонус 1 (10вращений) : </td><td align="right">1 из <INPUT maxLength=20 size=10 name=g_shansbon1 value="<?echo $g_shansbon1;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 - 15 рекомендованно</TD></TR>
<TR><TD align="left">Бонус в бонусе : </td><td>1 из <INPUT maxLength=20 size=10 name=g_shansbon2 value="<?echo $g_shansbon2;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 </TD></TR>
<TR><TD align="left">Бонус 3 (нету): </td><td>1 из <INPUT maxLength=20 size=10 name=g_shansbon3 value="<?echo $g_shansbon3;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 </TD></TR>

<TR><TD align="left">Удвоения:</td><td>1 из <INPUT maxLength=20 size=10 name=g_shansdouble value="<?echo $g_shansdouble;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 - 2рекомендовано</TD></TR>

<TR><TD><b>Выигрыша по линиям:</b></TD><td>&nbsp;</td></TR>
<TR><TD align="left">линий 1 </td><td>1 из <INPUT maxLength=20 size=10 name=g_shanswin1 value="<?echo $g_shanswin1;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 - 7рекомендовано</TD></TR>
<TR><TD align="left">линий 3 </td><td>1 из <INPUT maxLength=20 size=10 name=g_shanswin3 value="<?echo $g_shanswin3;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 - 6рекомендовано</TD></TR>
<TR><TD align="left">линий 5 </td><td>1 из <INPUT maxLength=20 size=10 name=g_shanswin5 value="<?echo $g_shanswin5;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 - 5рекомендовано</TD></TR>
<TR><TD align="left">линий 7 </td><td>1 из <INPUT maxLength=20 size=10 name=g_shanswin7 value="<?echo $g_shanswin7;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 - 4рекомендовано</TD></TR>
<TR><TD align="left">линий 9 </td><td>1 из <INPUT maxLength=20 size=10 name=g_shanswin9 value="<?echo $g_shanswin9;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 - 3рекомендовано</TD></TR>

<TR><TD align="right"><INPUT type=hidden value=3 name=send><INPUT type=submit value="Сохранить"></TD><td>&nbsp;</td></TR>
</FORM>
</td>
</table>










</TR>




</table>
</body></html>



