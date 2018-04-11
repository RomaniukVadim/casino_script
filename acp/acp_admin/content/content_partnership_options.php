<?php
defined('CASINOENGINE') or die("Доступ запрещен!");
include_once( "templates/admin_top.php" );
include_once( "templates/admin_menu.php" );
echo "\r\n";
?>
<td valign='top'>
<table width="100%">
	<tr>
		<td width="100%">
		
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0><!--begin top row-->
<TBODY>
<TR>
<TD><IMG height=13
src="templates/images/spacer.gif"></TD></TR>
         <TR class=printHidden>
<TD class=bannerline><IMG height=5
src="templates/images/spacer.gif" width=2></TD></TR><!--end top row-->
         <TR><!--begin top banner-->
<TD class=banner height=40><!--add the tab navigation -->
<TABLE class=printHidden style="MARGIN-LEFT: 10px" cellSpacing=0
cellPadding=0 width="100%" border=0>

<TBODY>
<TR><!--section header-->
<TD align=left>
<DIV id=container><SPAN class=pageheader>Настройки партнёрской программы</SPAN><BR><BR>
</DIV></TD></TR></TBODY></TABLE><!--end of tab navigation--></TD></TR><!--end banner -->

<TR><!--begin main content tables --->
           <TD vAlign=top>
<TABLE cellSpacing=0 cellPadding=0 width="100%">
<TBODY>
<TR>
<TD width=10><IMG height=8
src="templates/images/spacer.gif"
width=10></TD>
<TD>               </TD></TR></TBODY></TABLE>
<STYLE type=text/css>.drag {
CURSOR: hand
}
</STYLE>

<DIV id=dHTMLToolTip
style="Z-INDEX: 1000; LEFT: 0px; VISIBILITY: hidden; WIDTH: 10px; POSITION: absolute; TOP: 0px; HEIGHT: 10px"></DIV>
           </TD></TR>
</TR></TBODY></TABLE>

<div align="center">
<form method="post" action="">
<table width="50%">
	<tr>
		<td>
			Состояние партнёрской программы
		</td>
		<td>
			<input type="radio" name="partner_switch" value="on"<?php if($isEnabled == '1') echo ' checked'?>> Включена<br/>
			<input type="radio" name="partner_switch" value="off"<?php if($isEnabled == '0') echo ' checked'?>> Выключена
		</td>		
	</tr>
	<tr>
		<td>
			Прибыль от рефералов (%)
		</td>
		<td>
			<input type="text" name="partner_percentage" value="<?php echo $percentage;?>">			
		</td>		
	</tr>	
	<tr>
		<td colspan="2" style="text-align: center">
			<input type="submit" value="Сохранить" class="lgbutton">			
		</td>		
	</tr>		
</table>
</form>
		
		</td>
	</tr>
</table>
</div>

</td>
<?php
//Футер
include_once( "templates/admin_footer.php" );
?>
