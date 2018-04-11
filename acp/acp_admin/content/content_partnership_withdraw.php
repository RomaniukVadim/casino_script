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
<DIV id=container><SPAN class=pageheader>Управление выплатами</SPAN><BR><BR>
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
		

<b>Страницы:</b><br />
<?php
$displayArray = array(1, 2);
$displayArray[] = $pagesNum;
$displayArray[] = $pagesNum - 1;
$displayArray[] = $pageNo;
$displayArray[] = $pageNo - 1;
$displayArray[] = $pageNo - 2;
$displayArray[] = $pageNo + 1;
$displayArray[] = $pageNo + 2;

$lastShown = true;
for($i = 1; $i <= $pagesNum; $i++ ) {
	if($pagesNum > $PAGES_NUM_TO_CUT) {
		if(in_array($i, $displayArray)) {
			$lastShown = true;
			?>
			<a href="admin_partnership_withdraw.php?page=<?php echo $i?>"<?php if($i == $pageNo) echo "style=' font-weight: bold';"?>><?php echo $i?></a>
			<?php 			
		} else {
			if($lastShown == true) {
				echo " ... ";
			}
			$lastShown = false;
			continue;
		}
	} else {
		?>
		<a href="admin_partnership_withdraw.php?page=<?php echo $i?>"<?php if($i == $pageNo) echo "style=' font-weight: bold';"?>><?php echo $i?></a>
		<?php
	}
	?>
	
	<?php 
}
?>
<br /><br />


<?php if($usersListSize > 0): ?>
<table cellSpacing=0 cellPadding=0 width="100%" bgColor=#cccccc border=0>
	<tr>
		<td class="colheader" width="50%">
			Логин
		</td>
		<td class="colheader" width="25%">
			Сумма
		</td>
		<td class="colheader">
			Выплатить
		</td>	
	</tr>
	<?php 
	for($i = 0; $i < $usersListSize; $i++) {
		$user = mysql_fetch_assoc($usersList);
	?>
	<tr>
		<td class="tabledata">
			<?php echo $user['login']?>
		</td>
		<td class="tabledata">
			<?php echo $user['money']?>
		</td>
		<td class="tabledata">
			<form method="post">
				<input type="submit" value="Выплатить" name="payment" class="lgbutton"/>
				<input type="submit" value="Отказать" name="deny" class="lgbutton"/>
				<input type="hidden" name="id" value="<?php echo $user['withdraw_id']?>" />
				<input type="hidden" name="login" value="<?php echo $user['login']?>" />
				<input type="hidden" name="money" value="<?php echo $user['money']?>" />
			</form>
		</td>
	</tr>
	<?php 
	}
	?>	
</table>
<?php else: ?>
Выплат в ожидании не найдено.
<?php endif; ?>		
		</td>
	</tr>
</table>
</td>
<?php
//Футер
include_once( "templates/admin_footer.php" );
?>
