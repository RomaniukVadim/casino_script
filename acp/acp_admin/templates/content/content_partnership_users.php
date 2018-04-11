<?php
defined('CASINOENGINE') or die("Доступ запрещен!");
include_once( "templates/admin_top.php" );
include_once( "templates/admin_menu.php" );
echo "\r\n";
?>
<td valign='top'>
<div align="center"  width="100%">
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
<DIV id=container><SPAN class=pageheader>Партнёры</SPAN><BR><BR>
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
			<a href="admin_partnership_users.php?page=<?php echo $i?>"<?php if($i == $pageNo) echo "style=' font-weight: bold';"?>><?php echo $i?></a>
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
		<a href="admin_partnership_users.php?page=<?php echo $i?>"<?php if($i == $pageNo) echo "style=' font-weight: bold';"?>><?php echo $i?></a>
		<?php 
	}
	?>
	
	<?php 
}
?>
<br /><br />

<?php if($usersListSize > 0): ?>
<table cellSpacing=0 cellPadding=0 width="100%" bgColor=#cccccc border=0>
	<tr class="colheader">
		<td>
			Логин
		</td>
		<td>
			Заработано всего
		</td>
		<td>
			Посещений
		</td>
		<td>
			Регистраций
		</td>
		<td>
			Блокировка
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
			<?php echo $user['cash_ref_total']?>
		</td>
		<td class="tabledata">
			<?php echo $user['hits']?>
		</td>
		<td class="tabledata">
			<?php echo $user['registers']?>
		</td>
		<td class="tabledata">
			<form method="post">
				<?php if($user['partner_blocked'] == "0"):?>
					<input type="submit" value="Блокировать" name="ban" class="lgbutton"/>
					<input type="hidden" name="action" value="1" />
					<input type="hidden" name="id" value="<?php echo $user['id']?>" />
				<?php else:?>
					<input type="submit" value="Разблокировать" name="ban" class="lgbutton"/>
					<input type="hidden" name="action" value="0" />
					<input type="hidden" name="id" value="<?php echo $user['id']?>" />
				<?php endif;?>
			</form>
		</td>				
	</tr>
	<?php 
	}
	?>		
</table>
</div>

<?php else: ?>
Список партнёров пуст.
<?php endif; ?>		
		</td>
	</tr>
</table>
</td>
<?php
//Футер
include_once( "templates/admin_footer.php" );
?>
