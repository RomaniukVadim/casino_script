<?php
defined('CASINOENGINE') or die("Доступ запрещен!");
include_once( "templates/admin_top.php" );
include_once( "templates/admin_menu.php" );
echo "\r\n";

//Список пользователей
if ($mode == "list") {
    if(isset($_GET['user'])) $search_user = filter($_GET['user']); else $search_user = '';
    echo "\r\n     <TD vAlign=top>\r\n       <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" border=0><!--begin top row-->\r\n         <TBODY>\r\n         <TR>\r\n           <TD><IMG height=13\r\n             src=\"templates/images/spacer.gif\"></TD></TR>\r\n         <TR class=printHidden>\r\n           <TD class=bannerline><IMG height=5\r\n             src=\"templates/images/spacer.gif\" width=2></TD></TR><!--end top row-->\r\n         <TR><!--be";
    echo "gin top banner-->\r\n           <TD class=banner height=40><!--add the tab navigation -->\r\n             <TABLE class=printHidden style=\"MARGIN-LEFT: 10px\" cellSpacing=0\r\n             cellPadding=0 width=\"100%\" border=0>\r\n               <TBODY>\r\n               <TR><!--section header-->\r\n                 <TD align=left>\r\n                   <DIV id=container>";
    echo "<S";
    echo "PAN class=pageheader style=\"float:left;\">Пользователи &nbsp;› Список пользователей</SPAN><br>\r\n\t\t\t";
    echo "<S";
    echo "PAN class=subhead style=\"float:right;\"><br>\r\n\t\t\t</SPAN>\r\n                   <BR>\r\n                   <UL id=nav>\r\n                     <LI><A class=selected href=\"#\">Пользователи</A></LI>\r\n\r\n             </UL></DIV></TD></TR></TBODY></TABLE><!--end of tab navigation--></TD></TR><!--end banner -->\r\n         <TR><!--begin main content tables --->\r\n           <TD vAlign=top>\r\n            <form autocomplete=\"off\" style=\"pa";
    echo "dding-top:7px;\" action=\"admin_userlist.php\">\r\n\t\t\t<label><font color=\"black\">&nbsp;Поиск по пользователям:</font></label>\r\n\t\t\t<input name=\"mode\" type=\"hidden\" value=\"list\">\r\n\t\t\t<input type=\"text\" size=\"20\" id=\"searchuser\" name=\"user\" onKeyPress=\"submitMe()\"/>\r\n\t\t\t<input type=\"submit\" value=\"Искать\" />\r\n\t\t\t</form>\r\n             <TABLE cellSpacing=0 cellPadding=0 width=\"100%\">\r\n               <TBODY>\r\n        ";
    echo "       <TR>\r\n                 <TD width=10><IMG height=8\r\n                   src=\"templates/images/spacer.gif\"\r\n                 width=10></TD>\r\n                 <TD>               </TD></TR></TBODY></TABLE>\r\n             ";
    echo "<S";
    echo "TYLE type=text/css>.drag {\r\n \tCURSOR: hand\r\n }\r\n </STYLE>\r\n             <DIV id=dHTMLToolTip\r\n             style=\"Z-INDEX: 1000; LEFT: 0px; VISIBILITY: hidden; WIDTH: 10px; POSITION: absolute; TOP: 0px; HEIGHT: 10px\"></DIV>\r\n           </TD></TR>\r\n             <TD class=tableheader>\r\n             \t<a href=\"admin_userlist.php?mode=list\" class=\"style3\">Пользователи (Все)</a> -\r\n             \t<a href=\"admin_u";
    echo "serlist.php?mode=list&list=1\" class=\"style3\">Поль. с положительным балансом</a> -\r\n                <a href=\"admin_userlist.php?mode=list&list=2\" class=\"style3\">Поль. с нулевым балансом</a> -\r\n                <a href=\"admin_userlist.php?mode=list&list=3\" class=\"style3\">Активированные</a> -\r\n                <a href=\"admin_userlist.php?mode=list&list=4\" class=\"style3\">Заблокированные</a>\r\n              </TD>";
    echo "\r\n           </TR></TBODY></TABLE>\r\n                   <TABLE cellSpacing=0 cellPadding=0 width=\"100%\"\r\n                   bgColor=#cccccc border=0>\r\n                     <TBODY>\r\n                     <TR>\r\n                       <TD>\r\n                         <TABLE cellSpacing=1 cellPadding=3 width=\"100%\"\r\n border=0>\r\n                           <TBODY>\r\n                           <TR class=colheader>\r\n   ";
    echo "                          <TD width=\"5%\"><div align=\"center\">Логин</div></TD>\r\n                             <TD width=\"12%\"><div align=\"center\">Дата регистрации</div></TD>\r\n                             <TD width=\"10%\"><div align=\"center\">Статус</div></TD>\r\n                             <TD width=\"13%\"><div align=\"center\">Баланс(WMR) <br>(внёс/снял)</div></TD>\r\n                             <TD width=\"5%\"><div align=\"c";
    echo "enter\">Баланс(FUN)</div></TD>\r\n                             <TD width=\"55%\">Управление</TD>\r\n                           </TR>\r\n ";
	if ($search_user) $db_order = " where login='".$search_user."'";
    
    //Устанавливаем опции показа
    $r = mysql_fetch_assoc(mysql_query("select COUNT(*) AS client_num from `clients`"));
    $row_num = $r['client_num'];
    if(isset($_GET['page'])) $start = (int)$_GET['page'] - 1; else $start = 0;
    $per_page = 50;
    if($row_num>$per_page) $page_num = ceil($row_num/$per_page); else $page_num=0;
    if($page_num) {
		$browse_menu = '<div style="text-align:center">';
		for($i=1;$i<$page_num+1;$i++) {
			$browse_menu .= '<a href="admin_userlist.php?&mode=list&page='.$i.'">'.$i.'</a> ';
		}
		$browse_menu .= '</div>';
	} else $browse_menu = '';

	//Отображаем список
	$startPos = $start * $per_page;
    $sql = mysql_query("select * from clients".$db_order." ORDER BY id ASC LIMIT {$startPos},{$per_page}");
    while ($lst_user = mysql_fetch_array($sql)) {
        if($lst_user['status'] == "0") $userstatus = "<font color='red'>Заблокирован</font>";
        if($lst_user['status'] == "1") $userstatus = "<font color='green'>Активен</font>";
        if($lst_user['status'] == "2") $userstatus = "<font color='grey'>Не активен</font>";
        if($lst_user['status'] == "3") $userstatus = "Self-Suspended";
        echo "\r\n                           <TR>\r\n\r\n                             <TD class=tabledata vAlign=top><div align=center>{$lst_user['login']}</div></TD>\r\n                             <TD class=tabledata vAlign=top><div align=center>{$lst_user['date']}</div></TD>\r\n                             <TD class=tabledata vAlign=top><div align=center>{$userstatus}</div></TD>\r\n                             <TD class=tabledata vAlign=top><div align=center><a href='admin_userlist.php?mode=balance&id={$lst_user['id']}'>{$lst_user['cash']}</a> ({$lst_user['cashin']}/{$lst_user['cashout']})</div></TD>\r\n                             <TD class=tabledata vAlign=top><div align=center><a href='admin_userlist.php?mode=balance&id={$lst_user['id']}'>{$lst_user['cashfun']}</a></div></TD>\r\n                             <TD class=tabledata vAlign=top>\r\n\t\t\t\t\t\t\t <div align=center>\r\n\t\t\t\t\t\t\t \t<A href=admin_userlist.php?mode=viewuser&id={$lst_user['id']}>Смотреть/Редактировать</A> -\r\n\t\t\t\t\t\t\t \t<a href=admin_userlist.php?mode=block&id={$lst_user['id']}>Заблокировать/Активировать</a> -\r\n\t\t\t\t\t\t\t \t<a href=index.php?sub=new&user={$lst_user['login']}>Сообщение ПМ</a> -\r\n\t\t\t\t\t\t\t \t<a href=admin_mass_email.php?mode=senduser&login={$lst_user['login']}>Сообщение EMAIL</a>\r\n\t\t\t\t\t\t\t \t<a href=admin_userlist.php?mode=delete&id={$lst_user['id']}>[X]</a>\r\n\t\t\t\t\t\t\t</div>\r\n\t\t\t\t\t\t\t</TD>\r\n                           </TR>\r\n \t\t\t\t\t\t  ";
    }
    echo "                       </TBODY></TABLE></TD></TR></TBODY></TABLE>\r\n                       <div style=\"text-align:center;\">";
    echo $browse_menu;
    echo "</div><br>\r\n\t\t\t\t\t \t</TD></TR><!-- closes 3 tables -->\r\n               <TR>\r\n                 <TD colSpan=2 height=10><IMG\r\n                   src=\"templates/images/spacer.gif\"\r\n                 width=1 height=\"1\"></TD>\r\n               </TR>\r\n\r\n";
}

//Просмотр пользователя
if ($mode == "viewuser") {
    $cur_user = mysql_fetch_array(mysql_query("
    	SELECT `clients`.*, 
    	(SELECT COUNT(*) FROM `games_stats` WHERE `login` = `games_stats`.`login`) AS played_games,
    	(SELECT COUNT(*) FROM `pay_deposits` WHERE `login` = `pay_deposits`.`user`) AS deposit_num,
    	(SELECT COUNT(*) FROM `pay_withdrawals` WHERE `login` = `pay_withdrawals`.`user`) AS withdrawal_num
    	FROM `clients` WHERE `id`='{$id}'"));
    if($cur_user['status'] == "0") $userstatus = "<font color='red'>Заблокирован</font>";
    if($cur_user['status'] == "1") $userstatus = "<font color='green'>Активен</font>";
    if($cur_user['status'] == "2") $userstatus = "<font color='grey'>Не активен</font>";
    if($cur_user['status'] == "3") $userstatus = "Self-Suspended";
    echo "\r\n\r\n     <TD vAlign=top>\r\n       <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" border=0><!--begin top row-->\r\n         <TBODY>\r\n         <TR>\r\n           <TD><IMG height=13\r\n             src=\"templates/images/spacer.gif\"></TD></TR>\r\n         <TR class=printHidden>\r\n           <TD class=bannerline><IMG height=5\r\n             src=\"templates/images/spacer.gif\" width=2></TD></TR><!--end top row-->\r\n         <TR><!--";
    echo "begin top banner-->\r\n           <TD class=banner height=40><!--add the tab navigation -->\r\n             <TABLE class=printHidden style=\"MARGIN-LEFT: 10px\" cellSpacing=0\r\n             cellPadding=0 width=\"100%\" border=0>\r\n               <TBODY>\r\n               <TR><!--section header-->\r\n                 <TD align=left>\r\n                   <DIV id=container>";
    echo "<S";
    echo "PAN class=pageheader>Пользователи  &nbsp;";
    echo "<S";
    echo "PAN class=subhead>› Просмотр данных пользователя</SPAN></SPAN><BR><BR>\r\n                   <UL id=nav>\r\n                     <LI><A href=\"admin_userlist.php?&mode=list\">Все пользователи</A>\r\n             </LI></UL></DIV></TD></TR></TBODY></TABLE><!--end of tab navigation--></TD></TR><!--end banner -->\r\n         <TR><!--begin main content tables --->\r\n           <TD vAlign=top>\r\n             <TABLE cellSpacing=0 cellPadd";
    echo "ing=0 width=\"100%\">\r\n               <TBODY>\r\n               <TR>\r\n                 <TD width=10><IMG height=8\r\n                   src=\"templates/images/spacer.gif\"\r\n                 width=10></TD>\r\n                 <TD>               </TD></TR></TBODY></TABLE>\r\n             ";
    echo "<S";
    echo "TYLE type=text/css>.drag {\r\n \tCURSOR: hand\r\n }\r\n </STYLE>\r\n             <DIV id=dHTMLToolTip\r\n             style=\"Z-INDEX: 1000; LEFT: 0px; VISIBILITY: hidden; WIDTH: 10px; POSITION: absolute; TOP: 0px; HEIGHT: 10px\"></DIV>\r\n           </TD></TR><FORM name=editst action=\"engine.php?form=generalsettings\" method=post>\r\n               <TD class=tableheader>ПРОСМОТР ДАННЫХ ПОЛЬЗОВАТЕЛЯ : ";
    echo $cur_user['login'];
    echo " -\r\n               \t\t<a href=\"admin_userlist.php?mode=block&id=";
    echo $id;
    echo "\" class=\"style1\">ЗАБЛОКИРОВАТЬ/АКТИВИРОВАТЬ</a> -\r\n                    <a href=\"index.php?sub=new&user=";
    echo $cur_user['login'];
    echo "\" class=\"style1\">ВЫСЛАТЬ СООБЩЕНИЕ</a> -\r\n                    <a href=\"admin_userlogin.php?user=";
    echo $cur_user['login'];
    echo "\" class=\"style1\">ВОЙТИ КАК ПОЛЬЗОВАТЕЛЬ</a>\r\n               </TD>\r\n         <TR>\r\n           <TD height=\"241\" vAlign=top><TABLE class=editTable cellSpacing=0 cellPadding=5\r\n                         border=0>\r\n                           <TBODY>\r\n                          <TR>\r\n                             <TD class=colheader colSpan=4>ДОПОЛНИТЕЛЬНЫЕ ОПЦИИ</TD>\r\n                           </TR>\r\n             ";
    echo "              <TR>\r\n                             <TD class=tabledata><div align=\"center\"><a href=\"admin_pay_deposit.php?mode=login&id=";
    echo $id;
    echo "\">ПРОСМОТР ДЕПОЗИТОВ (";
    echo $cur_user['deposit_num'];
    echo ")</a></div></TD>\r\n                             <TD class=tabledata colSpan=3><div align=\"center\"><a href=\"admin_userlist.php?mode=balance&id=";
    echo $id;
    echo "\">ДОБАВИТЬ/УДАЛИТЬ СРЕДСТВА</a></div></TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata noWrap><div align=\"center\"><a href=\"admin_pay_withdrawals.php?mode=login&id=";
    echo $id;
    echo "\">ПРОСМОТР ВЫПЛАТ (";
    echo $cur_user['withdrawal_num'];
    echo ")</a> </div></TD>\r\n                             <TD class=tabledata colSpan=3><div align=\"center\"><a href=\"admin_statistic_history.php?mode=login&id=";
    echo $id;
    echo "\">ПРОСМОТР ИСТОРИИ ИГР (";
    echo $cur_user['played_games'];
    echo ")</a> </div></TD>\r\n                           </TR>\r\n \t\t\t\t\t\t  <TR>\r\n                             <TD class=colheader colSpan=4>СТАТИСТИКА ПОЛЬЗОВАТЕЛЯ</TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata><div align=\"center\">ВНЕСЕНО СРЕДСТВ: ";
    echo "<s";
    echo "trong>";
    echo $cur_user['cashin'];
    echo " WMR</strong> </div></TD>\r\n                             <TD class=tabledata colSpan=3><div align=\"center\">ВЫПЛАЧЕНО СРЕДСТВ: ";
    echo "<s";
    echo "trong>";
    echo $cur_user['cashout'];
    echo " WMR</strong> </div></TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata noWrap><div align=\"center\">ВСЕГО СЫГРАНО ИГР (WMR/FUN): ";
    echo "<s";
    echo "trong>";
    echo "</strong></div></TD>\r\n                             <td colSpan=3 class=tabledata><div align=\"center\">";
    echo $cur_user['played_games'];
    echo "</div></td>\r\n                           </TR>\r\n\r\n                           <TR>\r\n                             <TD class=colheader colSpan=4>Детали пользователя - <a href=\"admin_userlist.php?mode=edituser&id=";
    echo $id;
    echo "\">РЕДАКТИРОВАТЬ ДЕТАЛИ</a> </TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD width=\"44%\" class=tabledata>";
    echo "<s";
    echo "trong>ID:</strong></TD>\r\n                             <TD colSpan=3 class=tabledata>";
    echo "<s";
    echo "trong>";
    echo $cur_user['id'];
    echo "</strong></TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>";
    echo "<s";
    echo "trong>Логин:</strong></TD>\r\n                             <TD colSpan=3 class=tabledata>";
    echo "<s";
    echo "trong>";
    echo $cur_user['login'];
    echo "</strong></TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>Пароль(хэш):</TD>\r\n                             <TD class=tabledata colSpan=3>";
    echo $cur_user['pass'];
    echo "</TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>";
    echo "<s";
    echo "trong>Баланс(WMR):</strong></TD>\r\n                             <TD colSpan=3 class=tabledata>";
    echo "<s";
    echo "trong>";
    echo $cur_user['cash'];
    echo "</strong></TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>";
    echo "<s";
    echo "trong>Баланс(FUN):</strong></TD>\r\n                             <TD colSpan=3 class=tabledata>";
    echo "<s";
    echo "trong>";
    echo $cur_user['cashfun'];
    echo "</strong></TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>";
    echo "<s";
    echo "trong>E-Mail Адресс: </strong></TD>\r\n                             <TD colSpan=3 class=tabledata>";
    echo "<s";
    echo "trong>";
    echo $cur_user['email'];
    echo "</strong></TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>";
    echo "<s";
    echo "trong>Статус:</strong></TD>\r\n                             <TD colSpan=3 class=tabledata>";
    echo "<s";
    echo "trong>";
    echo $userstatus;
    echo "</strong>\r\n                             ";
    echo "<s";
    echo "pan class=\"style2\"></span></TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>IP (регистрации): </TD>\r\n                             <TD class=tabledata colSpan=3>";
    echo $cur_user['ip_reg'];
    echo "</TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>Последний IP входа: </TD>\r\n                             <TD class=tabledata colSpan=3>";
    echo $cur_user['ip_last'];
    echo "</TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=colheader colSpan=4><p>АДМИНИСТРАТОР / ОПЕРАТОР ЗАМЕТКИ -\r\n                             \t<a href=\"admin_userlist.php?mode=editnotesadmin&id=";
    echo $id;
    echo "\">РЕДАКТИРОВАТЬ ЗАМЕТКИ АДМИНИСТРАТОРА</a>\r\n                                <a href=\"admin_userlist.php?mode=editnotesoper&id=";
    echo $id;
    echo "\">РЕДАКТИРОВАТЬ ЗАМЕТКИ ОПЕРАТОРА</a> </p>\r\n                              </TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>ЗАМЕТКИ АДМИНИСТРАТОРА:</TD>\r\n                             <TD class=tabledata colSpan=3><p>\r\n                               <textarea name=\"textarea\" cols=\"60\" rows=\"7\">";
    if (!$cur_user['admin_notes']) echo "Нет заметок";
    else echo $cur_user['admin_notes'];
    echo "</textarea>\r\n                             </p\r\n                             </TD>\r\n                           </TR>\r\n\r\n                           <TR><A name=language></A>\r\n                             <TD class=tabledata>ЗАМЕТКИ ОПЕРАТОРА: </TD>\r\n                             <TD class=tabledata colSpan=3>\r\n                                <textarea name=\"textarea\" cols=\"40\" rows=\"7\">";
    if(!$cur_user['operator_notes']) echo "Нет заметок";
    else echo $cur_user['operator_notes'];
    echo "</textarea>\r\n                             </TD></TR>\r\n\r\n                           <TR>\r\n                             <TD colSpan=4>\r\n                             </TD>\r\n                           </TBODY></TABLE><br />\r\n           </TD>\r\n         </TR></TBODY></TABLE></TD><!--end line divider---><!--spacer cell to keep it off the right edge-->\r\n     <TD><IMG src=\"templates/images/spacer.gif\"\r\n   width=10></TD></T";
    echo "R><!--end main content--><!--boilerplate-->\r\n   <TR>\r\n     <TD background=templates/images/bkgd_hz_dot.gif\r\n       colSpan=3><IMG height=1\r\n       src=\"templates/images/spacer.gif\" width=1></TD></TR>\r\n";
}

//Редактирование профиля пользователя
if ( $mode == "edituser") {
    $cur_user = mysql_fetch_assoc(mysql_query( "select * from clients where id='{$id}'"));
    echo "\r\n\r\n     <TD vAlign=top>\r\n       <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" border=0><!--begin top row-->\r\n         <TBODY>\r\n         <TR>\r\n           <TD><IMG height=13\r\n             src=\"templates/images/spacer.gif\"></TD></TR>\r\n         <TR class=printHidden>\r\n           <TD class=bannerline><IMG height=5\r\n             src=\"templates/images/spacer.gif\" width=2></TD></TR><!--end top row-->\r\n         <TR><!--";
    echo "begin top banner-->\r\n           <TD class=banner height=40><!--add the tab navigation -->\r\n             <TABLE class=printHidden style=\"MARGIN-LEFT: 10px\" cellSpacing=0\r\n             cellPadding=0 width=\"100%\" border=0>\r\n               <TBODY>\r\n               <TR><!--section header-->\r\n                 <TD align=left>\r\n                   <DIV id=container>";
    echo "<S";
    echo "PAN class=pageheader>Пользователи  &nbsp;";
    echo "<S";
    echo "PAN class=subhead>› Редактирование</SPAN></SPAN><BR><BR>\r\n                   <UL id=nav>\r\n                     <LI><A href=\"admin_userlist.php?&mode=list\">Все пользователи</A>\r\n             </LI></UL></DIV></TD></TR></TBODY></TABLE><!--end of tab navigation--></TD></TR><!--end banner -->\r\n         <TR><!--begin main content tables --->\r\n           <TD vAlign=top>\r\n             <TABLE cellSpacing=0 cellPadding=0 width=\"1";
    echo "00%\">\r\n               <TBODY>\r\n               <TR>\r\n                 <TD width=10><IMG height=8\r\n                   src=\"templates/images/spacer.gif\"\r\n                 width=10></TD>\r\n                 <TD>               </TD></TR></TBODY></TABLE>\r\n             ";
    echo "<S";
    echo "TYLE type=text/css>.drag {\r\n \tCURSOR: hand\r\n }\r\n </STYLE>\r\n             <DIV id=dHTMLToolTip\r\n             style=\"Z-INDEX: 1000; LEFT: 0px; VISIBILITY: hidden; WIDTH: 10px; POSITION: absolute; TOP: 0px; HEIGHT: 10px\"></DIV>\r\n           </TD></TR>\r\n               <TD class=tableheader>РЕДАКТИРОВАНИЕ ПОЛЬЗОВАТЕЛЯ : ";
    echo $cur_user['login'];
    echo " -\r\n                    <a href=\"index.php?sub=new&user=";
    echo $cur_user['login'];
    echo "\" class=\"style1\">ВЫСЛАТЬ СООБЩЕНИЕ</a> -\r\n                    <a href=\"admin_userlogin.php?user=";
    echo $cur_user['login'];
    echo "\" class=\"style1\">ВОЙТИ КАК ПОЛЬЗОВАТЕЛЬ</a>\r\n               </TD>\r\n         <TR>\r\n           <TD height=\"241\" vAlign=top>\r\n           \t\t\t\t   <form method=\"post\" action=\"admin_userlist.php?mode=edituser&id=";
    echo $id;
    echo "\">\r\n           \t\t\t\t   <TABLE class=editTable cellSpacing=0 cellPadding=5 border=0>\r\n                           <TBODY>\r\n                           <TR>\r\n                             <TD class=colheader colSpan=4>Детали пользователя - <a href=\"admin_userlist.php?mode=viewuser&id=";
    echo $id;
    echo "\">ВЕРНУТСЬЯ НАЗАД</a> </TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD width=\"44%\" class=tabledata>";
    echo "<s";
    echo "trong>ID:</strong></TD>\r\n                             <TD colSpan=3 class=tabledata>";
    echo "<s";
    echo "trong>";
    echo $cur_user['id'];
    echo "</strong></TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>";
    echo "<s";
    echo "trong>Логин:</strong></TD>\r\n                             <TD colSpan=3 class=tabledata>";
    echo "<s";
    echo "trong><input name=\"login\" type=\"text\" value=\"";
    echo $cur_user['login'];
    echo "\" /></strong></TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>Пароль:</TD>\r\n                             <TD class=tabledata colSpan=3>";
    echo $cur_user['pass'];
    echo "</TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>";
    echo "<s";
    echo "trong>Баланс(WMR):</strong></TD>\r\n                             <TD colSpan=3 class=tabledata>";
    echo "<s";
    echo "trong>";
    echo $cur_user['cash'];
    echo "</strong></TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>";
    echo "<s";
    echo "trong>Баланс(FUN):</strong></TD>\r\n                             <TD colSpan=3 class=tabledata>";
    echo "<s";
    echo "trong>";
    echo $cur_user['cashfun'];
    echo "</strong></TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>";
    echo "<s";
    echo "trong>E-Mail Адресс: </strong></TD>\r\n                             <TD colSpan=3 class=tabledata>";
    echo "<s";
    echo "trong><input name=\"email\" type=\"text\" value=\"";
    echo $cur_user['email'];
    echo "\" /></strong></TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>";
    echo "<s";
    echo "trong>Статус:</strong></TD>\r\n                             <TD colSpan=3 class=tabledata>";
    echo "<s";
    echo "trong>";
    echo $cur_user['status'];
    echo "</strong>\r\n                             ";
    echo "<s";
    echo "pan class=\"style2\">(0=заблокирован, 1=активный, 2=неактивный, 3=self-suspended) </span></TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>IP (регистрации): </TD>\r\n                             <TD class=tabledata colSpan=3>";
    echo $cur_user['ip_reg'];
    echo "</TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>Последний IP входа: </TD>\r\n                             <TD class=tabledata colSpan=3>";
    echo $cur_user['ip_last'];
    echo "</TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD><input type=\"submit\" class=lgbutton value=\"Сохранить\" /></TD>\r\n                             <TD><font color=red>";
    echo $error;
    echo "</font></TD>\r\n                           </TR>\r\n                           </TBODY></TABLE>\r\n                           </form>\r\n           </TD>\r\n         </TR></TBODY></TABLE></TD><!--end line divider---><!--spacer cell to keep it off the right edge-->\r\n     <TD><IMG src=\"templates/images/spacer.gif\"\r\n   width=10></TD></TR><!--end main content--><!--boilerplate-->\r\n   <TR>\r\n     <TD background=templates/images/bkgd_";
    echo "hz_dot.gif\r\n       colSpan=3><IMG height=1\r\n       src=\"templates/images/spacer.gif\" width=1></TD></TR>\r\n";
}

//Редактирование заметок оператора
if ($mode == "editnotesadmin") {
    $cur_user = mysql_fetch_assoc(mysql_query("SELECT `login`, `admin_notes` FROM `clients` WHERE `id`='{$id}'"));
	echo "\r\n     <TD vAlign=top>\r\n       <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" border=0><!--begin top row-->\r\n         <TBODY>\r\n         <TR>\r\n           <TD><IMG height=13\r\n             src=\"templates/images/spacer.gif\"></TD></TR>\r\n         <TR class=printHidden>\r\n           <TD class=bannerline><IMG height=5\r\n             src=\"templates/images/spacer.gif\" width=2></TD></TR><!--end top row-->\r\n         <TR><!--be";
    echo "gin top banner-->\r\n           <TD class=banner height=40><!--add the tab navigation -->\r\n             <TABLE class=printHidden style=\"MARGIN-LEFT: 10px\" cellSpacing=0\r\n             cellPadding=0 width=\"100%\" border=0>\r\n               <TBODY>\r\n               <TR><!--section header-->\r\n                 <TD align=left>\r\n                   <DIV id=container>";
    echo "<S";
    echo "PAN class=pageheader>Пользователи  &nbsp;";
    echo "<S";
    echo "PAN class=subhead>› Заметки Администратора</SPAN></SPAN><BR><BR>\r\n                   <UL id=nav>\r\n\t\t\t\t\t<LI><A href=\"admin_userlist.php?&mode=list\">Все пользователи</A>\r\n             </LI></UL></DIV></TD></TR></TBODY></TABLE><!--end of tab navigation--></TD></TR><!--end banner -->\r\n         <TR><!--begin main content tables --->\r\n           <TD vAlign=top>\r\n             <TABLE cellSpacing=0 cellPadding=0 width=\"100%\">\r\n ";
    echo "              <TBODY>\r\n               <TR>\r\n                 <TD width=10><IMG height=8\r\n                   src=\"templates/images/spacer.gif\"\r\n                 width=10></TD>\r\n                 <TD>               </TD></TR></TBODY></TABLE>\r\n             ";
    echo "<S";
    echo "TYLE type=text/css>.drag {\r\n \tCURSOR: hand\r\n }\r\n </STYLE>\r\n             <DIV id=dHTMLToolTip\r\n             style=\"Z-INDEX: 1000; LEFT: 0px; VISIBILITY: hidden; WIDTH: 10px; POSITION: absolute; TOP: 0px; HEIGHT: 10px\"></DIV>\r\n           </TD></TR>\r\n               <TD class=tableheader>ЗАМЕТКИ АДМИНИСТРАТОРА ДЛЯ ПОЛЬЗОВАТЕЛЯ : ";
    echo $cur_user['login'];
    echo "               </TD>\r\n         <TR>\r\n           <TD height=\"241\" vAlign=top>\r\n           \t\t\t\t<form method=\"post\" action=\"admin_userlist.php?mode=editnotesadmin&id=";
    echo $id;
    echo "\">\r\n\t\t\t\t\t\t<TABLE class=editTable cellSpacing=0 cellPadding=5 border=0>\r\n\t\t\t\t\t\t<TBODY>\r\n                        <TR>\r\n                             <TD class=colheader colSpan=4>Детали пользователя - <a href=\"admin_userlist.php?mode=viewuser&id=";
    echo $id;
    echo "\">ВЕРНУТСЬЯ НАЗАД</a> </TD>\r\n                        </TR>\r\n \t\t\t\t\t\t<TR>\r\n\t\t\t\t\t\t\t<TD width=\"50%\" class=tabledata>Заметка:</TD>\r\n\t\t\t\t\t\t\t<TD class=tabledata colSpan=2><textarea name=\"content\" cols=\"100\" rows=\"10\" id=\"content\">";
    echo $cur_user['admin_notes'];
    echo "</textarea></TD>\r\n\t\t\t\t\t\t</TR>\r\n                        <TR>\r\n\t                         <TD><input class=lgbutton type=\"submit\" value=\"Сохранить\" /></TD>\r\n                             <TD><font color=red>";
    echo "</font></TD>\r\n                        </TR>\r\n                        </TBODY></TABLE>\r\n                        </form>\r\n           </TD>\r\n         </TR></TBODY></TABLE></TD><!--end line divider---><!--spacer cell to keep it off the right edge-->\r\n     <TD><IMG src=\"templates/images/spacer.gif\"\r\n   width=10></TD></TR><!--end main content--><!--boilerplate-->\r\n   <TR>\r\n     <TD background=templates/images/bkgd_hz_dot.gi";
    echo "f\r\n       colSpan=3><IMG height=1\r\n       src=\"templates/images/spacer.gif\" width=1></TD></TR>\r\n\r\n";
}

//Редактирование заметок оператора
if ( $mode == "editnotesoper") {
    $cur_user = mysql_fetch_assoc(mysql_query("SELECT `login`, `operator_notes` FROM `clients` WHERE `id`='{$id}'"));
    echo "\r\n     <TD vAlign=top>\r\n       <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" border=0><!--begin top row-->\r\n         <TBODY>\r\n         <TR>\r\n           <TD><IMG height=13\r\n             src=\"templates/images/spacer.gif\"></TD></TR>\r\n         <TR class=printHidden>\r\n           <TD class=bannerline><IMG height=5\r\n             src=\"templates/images/spacer.gif\" width=2></TD></TR><!--end top row-->\r\n         <TR><!--be";
    echo "gin top banner-->\r\n           <TD class=banner height=40><!--add the tab navigation -->\r\n             <TABLE class=printHidden style=\"MARGIN-LEFT: 10px\" cellSpacing=0\r\n             cellPadding=0 width=\"100%\" border=0>\r\n               <TBODY>\r\n               <TR><!--section header-->\r\n                 <TD align=left>\r\n                   <DIV id=container>";
    echo "<S";
    echo "PAN class=pageheader>Пользователи  &nbsp;";
    echo "<S";
    echo "PAN class=subhead>› Заметки </SPAN></SPAN><BR>\r\n                   <UL id=nav>\r\n                     <LI><A class=selected\r\n                     href=\"admin_userlist.php?&mode=list\">View User </A>\r\n                     <LI><A class=helptab\r\n                     onclick=\"MM_showHideLayers('information','','show')\"\r\n                     href=\"javascript:void(0);\">?</A>\r\n             </LI></UL></DIV></TD></TR></TBOD";
    echo "Y></TABLE><!--end of tab navigation--></TD></TR><!--end banner -->\r\n         <TR><!--begin main content tables --->\r\n           <TD vAlign=top>\r\n             <TABLE cellSpacing=0 cellPadding=0 width=\"100%\">\r\n               <TBODY>\r\n               <TR>\r\n                 <TD width=10><IMG height=8\r\n                   src=\"templates/images/spacer.gif\"\r\n                 width=10></TD>\r\n                 <TD>         ";
    echo "      </TD></TR></TBODY></TABLE>\r\n             ";
    echo "<S";
    echo "TYLE type=text/css>.drag {\r\n \tCURSOR: hand\r\n }\r\n </STYLE>\r\n             <DIV id=dHTMLToolTip\r\n             style=\"Z-INDEX: 1000; LEFT: 0px; VISIBILITY: hidden; WIDTH: 10px; POSITION: absolute; TOP: 0px; HEIGHT: 10px\"></DIV>\r\n           </TD></TR>\r\n               <TD class=tableheader>ЗАМЕТКИ ОПЕРАТОРА ДЛЯ ПОЛЬЗОВАТЕЛЯ : ";
    echo $cur_user['login'];
    echo "               </TD>\r\n         <TR>\r\n           <TD height=\"241\" vAlign=top>\r\n           \t\t\t\t<form method=\"post\" action=\"admin_userlist.php?mode=editnotesoper&id=";
    echo $id;
    echo "\">\r\n\t\t\t\t\t\t<TABLE class=editTable cellSpacing=0 cellPadding=5 border=0>\r\n\t\t\t\t\t\t<TBODY>\r\n                        <TR>\r\n                             <TD class=colheader colSpan=4>Детали пользователя - <a href=\"admin_userlist.php?mode=viewuser&id=";
    echo $id;
    echo "\">ВЕРНУТСЬЯ НАЗАД</a> </TD>\r\n                        </TR>\r\n \t\t\t\t\t\t<TR>\r\n\t\t\t\t\t\t\t<TD width=\"50%\" class=tabledata>Заметка:</TD>\r\n\t\t\t\t\t\t\t<TD class=tabledata colSpan=2><textarea name=\"content\" cols=\"100\" rows=\"10\" id=\"content\">";
    echo $cur_user['operator_notes'];
    echo "</textarea></TD>\r\n\t\t\t\t\t\t</TR>\r\n                        <TR>\r\n\t                         <TD><input class=lgbutton type=\"submit\" value=\"Сохранить\" /></TD>\r\n                             <TD><font color=red>";
    echo "</font></TD>\r\n                        </TR>\r\n                        </TBODY></TABLE>\r\n                        </form>\r\n           </TD>\r\n         </TR></TBODY></TABLE></TD><!--end line divider---><!--spacer cell to keep it off the right edge-->\r\n     <TD><IMG src=\"templates/images/spacer.gif\"\r\n   width=10></TD></TR><!--end main content--><!--boilerplate-->\r\n   <TR>\r\n     <TD background=templates/images/bkgd_hz_dot.gi";
    echo "f\r\n       colSpan=3><IMG height=1\r\n       src=\"templates/images/spacer.gif\" width=1></TD></TR>\r\n\r\n\r\n";
}

//Редактирование баланса
if ($mode == "balance") {
    $cur_user = mysql_fetch_array(mysql_query( "select * from clients where id='{$id}'"));
    echo "\r\n     <TD vAlign=top>\r\n       <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" border=0><!--begin top row-->\r\n         <TBODY>\r\n         <TR>\r\n           <TD><IMG height=13\r\n             src=\"templates/images/spacer.gif\"></TD></TR>\r\n         <TR class=printHidden>\r\n           <TD class=bannerline><IMG height=5\r\n             src=\"templates/images/spacer.gif\" width=2></TD></TR><!--end top row-->\r\n         <TR><!--be";
    echo "gin top banner-->\r\n           <TD class=banner height=40><!--add the tab navigation -->\r\n             <TABLE class=printHidden style=\"MARGIN-LEFT: 10px\" cellSpacing=0\r\n             cellPadding=0 width=\"100%\" border=0>\r\n               <TBODY>\r\n               <TR><!--section header-->\r\n                 <TD align=left>\r\n                   <DIV id=container>";
    echo "<S";
    echo "PAN class=pageheader>Пользователь &nbsp;";
    echo "<S";
    echo "PAN class=subhead>› Изменение баланса пользователю</SPAN></SPAN><BR><BR>\r\n                   <UL id=nav>\r\n                   <UL id=nav>\r\n\t\t\t\t\t<LI><A href=\"admin_userlist.php?&mode=list\">Все пользователи</A>\r\n             </LI>\r\n             </LI></UL></DIV></TD></TR></TBODY></TABLE><!--end of tab navigation--></TD></TR><!--end banner -->\r\n         <TR><!--begin main content tables --->\r\n           <TD vAlign=top>\r\n     ";
    echo "        <TABLE cellSpacing=0 cellPadding=0 width=\"100%\">\r\n               <TBODY>\r\n               <TR>\r\n                 <TD width=10><IMG height=8\r\n                   src=\"templates/images/spacer.gif\"\r\n                 width=10></TD>\r\n                 <TD>               </TD></TR></TBODY></TABLE>\r\n             ";
    echo "<S";
    echo "TYLE type=text/css>.drag {\r\n \tCURSOR: hand\r\n }\r\n </STYLE>\r\n             <DIV id=dHTMLToolTip\r\n             style=\"Z-INDEX: 1000; LEFT: 0px; VISIBILITY: hidden; WIDTH: 10px; POSITION: absolute; TOP: 0px; HEIGHT: 10px\"></DIV>\r\n           </TD></TR>\r\n               <TD class=tableheader>ИЗМЕНЕНИЕ БАЛАНСА ПОЛЬЗОВАТЕЛЮ: ";
    echo $cur_user['login'];
    echo " -\r\n           \t\t\t<a href=\"index.php?sub=new&user=";
    echo $cur_user['login'];
    echo "\" class=\"style1\">ВЫСЛАТЬ СООБЩЕНИЕ</a> -\r\n                    <a href=\"admin_userlogin.php?user=";
    echo $cur_user['login'];
    echo "\" class=\"style1\">ВОЙТИ КАК ПОЛЬЗОВАТЕЛЬ</a>\r\n               </TD>\r\n         <TR>\r\n           <TD height=\"241\" vAlign=top>\r\n           \t\t\t\t   <form method=\"post\" action=\"admin_userlist.php?mode=balance&id=";
    echo $id;
    echo "\">\r\n           \t\t\t\t   <TABLE class=editTable cellSpacing=0 cellPadding=5 border=0>\r\n                           <TBODY>\r\n                           <TR>\r\n                             <TD class=colheader colSpan=4>Детали пользователя - <a href=\"admin_userlist.php?&mode=list\">ВЕРНУТСЬЯ НАЗАД</a> </TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD width=\"44";
    echo "%\" class=tabledata>";
    echo "<s";
    echo "trong>ID:</strong></TD>\r\n                             <TD colSpan=3 class=tabledata>";
    echo "<s";
    echo "trong>";
    echo $cur_user['id'];
    echo "</strong></TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>";
    echo "<s";
    echo "trong>Логин:</strong></TD>\r\n                             <TD colSpan=3 class=tabledata>";
    echo "<s";
    echo "trong>";
    echo $cur_user['login'];
    echo "</strong></TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>";
    echo "<s";
    echo "trong>Баланс(WMR):</strong></TD>\r\n                             <TD colSpan=3 class=tabledata><input name=\"WMR\" type=\"text\" size=\"9\" value=\"";
    echo $cur_user['cash'];
    echo "\" /> ";
    echo "<s";
    echo "trong>WMR</strong></TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>";
    echo "<s";
    echo "trong>Баланс(FUN):</strong></TD>\r\n                             <TD colSpan=3 class=tabledata><input name=\"FUN\" type=\"text\" size=\"9\" value=\"";
    echo $cur_user['cashfun'];
    echo "\" /> ";
    echo "<s";
    echo "trong>FUN</strong></TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD><input type=\"submit\" class=lgbutton value=\"Сохранить\" /></TD>\r\n                             <TD><font color=red>";
    echo $error;
    echo "</font></TD>\r\n                           </TR>\r\n                           </TBODY></TABLE>\r\n                           </form>\r\n           </TD>\r\n         </TR></TBODY></TABLE></TD><!--end line divider---><!--spacer cell to keep it off the right edge-->\r\n     <TD><IMG src=\"templates/images/spacer.gif\"\r\n   width=10></TD></TR><!--end main content--><!--boilerplate-->\r\n   <TR>\r\n     <TD background=templates/images/bkgd_";
    echo "hz_dot.gif\r\n       colSpan=3><IMG height=1\r\n       src=\"templates/images/spacer.gif\" width=1></TD></TR>\r\n\r\n";
}

//Футер
include_once( "templates/admin_footer.php" );
?>
