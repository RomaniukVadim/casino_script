<?php
defined('CASINOENGINE') or die("Доступ запрещен!");
include_once( "templates/admin_top.php" );
include_once( "templates/admin_menu.php" );
if ( $mode == "" ) {
    $res = mysql_fetch_assoc(mysql_query("select COUNT(*) AS `row_num` from games_stats ORDER BY id ASC"));
	$row_num = $res['row_num'];
	
    echo "     <TD vAlign=top>\r\n       <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" border=0><!--begin top row-->\r\n         <TBODY>\r\n         <TR>\r\n           <TD><IMG height=13\r\n             src=\"templates/images/spacer.gif\"></TD></TR>\r\n         <TR class=printHidden>\r\n           <TD class=bannerline><IMG height=5\r\n             src=\"templates/images/spacer.gif\" width=2></TD></TR><!--end top row-->\r\n         <TR><!--begi";
    echo "n top banner-->\r\n           <TD class=banner height=40><!--add the tab navigation -->\r\n             <TABLE class=printHidden style=\"MARGIN-LEFT: 10px\" cellSpacing=0\r\n             cellPadding=0 width=\"100%\" border=0>\r\n               <TBODY>\r\n               <TR><!--section header-->\r\n                 <TD align=left>\r\n                   <DIV id=container>";
    echo "<S";
    echo "PAN class=pageheader>Статистика и аналитика &nbsp;";
    echo "<S";
    echo "PAN class=subhead>> Игровая статистика</SPAN></SPAN><BR><BR>\r\n                   <UL id=nav>\r\n                     <DIV><A class=selected href=\"admin_statistic_history.php\">Все игры</A></DIV>\r\n             \t\t<DIV style=\"float:right;\"><A href=\"admin_statistic_history.php?mode=clear\">Очистить стат.</A></DIV>\r\n             </UL></DIV></TD></TR></TBODY></TABLE><!--end of tab navigation--></TD></TR><!--end banner -->\r\n         <T";
    echo "R><!--begin main content tables --->\r\n           <TD vAlign=top>\r\n             <TABLE cellSpacing=0 cellPadding=0 width=\"100%\">\r\n               <TBODY>\r\n               <TR>\r\n                 <TD width=10><IMG height=8\r\n                   src=\"templates/images/spacer.gif\"\r\n                 width=10></TD>\r\n                 <TD>               </TD></TR></TBODY></TABLE>\r\n             ";
    echo "<S";
    echo "TYLE type=text/css>.drag {\r\n \tCURSOR: hand\r\n }\r\n </STYLE>\r\n             <DIV id=dHTMLToolTip\r\n             style=\"Z-INDEX: 1000; LEFT: 0px; VISIBILITY: hidden; WIDTH: 10px; POSITION: absolute; TOP: 0px; HEIGHT: 10px\"></DIV>\r\n           </TD></TR>\r\n             <TD class=tableheader>\r\n             \tВсего было сыграно: ";
    echo $row_num;
    echo " -\r\n             \tИз них на реальные деньги(";
    echo mysql_num_rows(mysql_query( "SELECT * FROM games_stats where mode='real'"));
    echo ") -\r\n             \tна виртуальные деньги(";
    echo mysql_num_rows(mysql_query( "SELECT * FROM games_stats where mode='fun'"));
    echo ")\r\n              </TD>\r\n           </TR></TBODY></TABLE>\r\n                   <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" bgColor=#cccccc border=0>\r\n                     <TBODY>\r\n                     <TR>\r\n                       <TD>\r\n                         <TABLE cellSpacing=1 cellPadding=3 width=\"100%\" border=0>\r\n                           <TBODY>\r\n                           <TR class=colheader>\r\n    ";
    echo "                         <TD width=\"5%\"><div align=\"center\">Дата</div></TD>\r\n                             <TD width=\"5%\"><div align=\"center\">Время</div></TD>\r\n                             <TD width=\"10%\"><div align=\"center\">Пользователь</div></TD>\r\n                             <TD width=\"10%\"><div align=\"center\">Игра</div></TD>\r\n                             <TD width=\"5%\"><div align=\"center\">Ставка</div></TD>\r\n      ";
    echo "                       <TD width=\"5%\"><div align=\"center\">Выйгрышь</div></TD>\r\n\t\t\t\t\t\t\t <TD width=\"12%\"><div align=\"center\">Банк</div></TD>\r\n\t\t\t\t\t\t\t <TD width=\"12%\"><div align=\"center\">Баланс пользователя</div></TD>\r\n\t\t\t\t\t\t\t <TD width=\"5%\"><div align=\"center\">Тип</div></TD>\r\n                           </TR>\r\n ";

    //Устанавливаем опции показа
    if(isset($_GET['page'])) $start = (int)$_GET['page'] - 1; else $start = 0;
    $per_page = 50;
    if($row_num>$per_page) $page_num = ceil($row_num/$per_page); else $page_num=0;
    if($page_num) {
		$browse_menu = '<div style="text-align:center">';
		for($i=1;$i<$page_num+1;$i++) {
			$browse_menu .= '<a href="admin_statistic_history.php?&page='.$i.'">'.$i.'</a> ';
		}
		$browse_menu .= '</div>';
	} else $browse_menu = '';
	    
    $статистика_игр_запрос = @mysql_query( "select * from games_stats ORDER BY id ASC LIMIT {$start},{$per_page}" );
    $i = 0;
    $_SESSION['bet'] = 0;
    $_SESSION['win'] = 0;
    while ( $статистика_игр = @mysql_fetch_array( $статистика_игр_запрос ) )
    {
        if ( $i == 0 )
        {
            $_SESSION['next_bank'] = $статистика_игр['bank'];
            $_SESSION['next_cash'] = $статистика_игр['cash'];
            ++$i;
        }
        $id = $статистика_игр['id'];
        $data = $статистика_игр['data'];
        $time = $статистика_игр['time'];
        $login = $статистика_игр['login'];
        $cash = $статистика_игр['cash'];
        $bank = $статистика_игр['bank'];
        $bet = $статистика_игр['bet'];
        $win = $статистика_игр['win'];
        $game = $статистика_игр['game'];
        $mode = $статистика_игр['mode'];
        $id_newnext_query = @mysql_fetch_array( @mysql_query( "select * from games_stats where login = '".$login."' and id > ".$id." ORDER BY time ASC" ) );
        $next_win_query = @mysql_fetch_array( @mysql_query( "select * from games_stats where id = '".$id_newnext_query['id']."' and login = '".$login."'" ) );
        $next_win = $next_win_query['win'];
        echo "\r\n                           <TR>\r\n                             <TD class=tabledata vAlign=top><div align=center>".$data."</div></TD>\r\n                             <TD class=tabledata vAlign=top><div align=center>".$time."</div></TD>\r\n                             <TD class=tabledata vAlign=top><div align=center>".$login."</div></TD>\r\n                             <TD class=tabledata vAlign=top><div align=center>".$game."</div></TD>\r\n\t\t\t\t\t\t\t <TD class=tabledata vAlign=top><div align=center>".$bet."</div></TD>\r\n\t\t\t\t\t\t\t <TD class=tabledata vAlign=top><div align=center>".$win."</div></TD>\r\n\t\t\t\t\t\t\t <TD class=tabledata vAlign=top><div align=center>";
        echo $betall;
        echo "{$bank}";
        $_SESSION['next_bank'] = $bank + $bet - $win;
        echo "</div></TD>\r\n\t\t\t\t\t\t\t <TD class=tabledata vAlign=top><div align=center>";
        echo "{$cash}";
        $_SESSION['next_cash'] = $cash + $win - $bet;
        echo "</div></TD>\r\n\t\t\t\t\t\t\t <TD class=tabledata vAlign=top><div align=center>".$mode."</div></TD>\r\n \t\t\t\t\t\t  ";
        $_SESSION['bet'] = $_SESSION['bet'] + $bet;
        $_SESSION['win'] = $_SESSION['win'] + $win;
    }
    
    $sql = mysql_query("
    	SELECT SUM(bet) AS fun_bet, SUM(win) AS fun_win, 
    	(SELECT SUM(bet) FROM games_stats WHERE mode = 'real') AS real_bet,
    	(SELECT SUM(win) FROM games_stats WHERE mode = 'real') AS real_win
    	FROM games_stats 
    	WHERE mode = 'fun'");
    $res = mysql_fetch_assoc($sql);
    if(!$res['real_bet']) $res['real_bet'] = '0.00';
    if(!$res['real_win']) $res['real_win'] = '0.00';
    
    $bank_game_up = mysql_query( "SELECT SUM(bank_game_up) FROM games_stats1 WHERE mode = 'real'" );
    echo "                       </TBODY></TABLE></TD></TR></TBODY></TABLE>\r\n                       <div style=\"text-align:center;\">";
    echo $browse_menu;
    echo "</div><br>\r\n                       <div style=\"text-align:left;\">\r\n";
    echo "FUN(потрачено/выиграно): ".$res['fun_bet'];
    echo " / ".$res['fun_win'];
    echo "<br>REAL(потрачено/выиграно): ".$res['real_bet'];
    echo " / ".$res['real_win'];
    echo "\t\t\t\t\t\t</div>\r\n                       </TD></TR><!-- closes 3 tables -->\r\n               <TR>\r\n                 <TD colSpan=2 height=10><IMG\r\n                   src=\"templates/images/spacer.gif\"\r\n                 width=1 height=\"1\"></TD>\r\n               </TR>\r\n";
}
echo "\r\n";
if ( $mode == "login" && $id != "" && $id_filter == true )
{
    $user_query = mysql_fetch_array( mysql_query( "SELECT * FROM clients WHERE id='".$id."'" ) );
    $user_name = $user_query['login'];
    echo "     <TD vAlign=top>\r\n       <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" border=0><!--begin top row-->\r\n         <TBODY>\r\n         <TR>\r\n           <TD><IMG height=13\r\n             src=\"templates/images/spacer.gif\"></TD></TR>\r\n         <TR class=printHidden>\r\n           <TD class=bannerline><IMG height=5\r\n             src=\"templates/images/spacer.gif\" width=2></TD></TR><!--end top row-->\r\n         <TR><!--begi";
    echo "n top banner-->\r\n           <TD class=banner height=40><!--add the tab navigation -->\r\n             <TABLE class=printHidden style=\"MARGIN-LEFT: 10px\" cellSpacing=0\r\n             cellPadding=0 width=\"100%\" border=0>\r\n               <TBODY>\r\n               <TR><!--section header-->\r\n                 <TD align=left>\r\n                   <DIV id=container>";
    echo "<S";
    echo "PAN class=pageheader>Статистика и аналитика &nbsp;";
    echo "<S";
    echo "PAN class=subhead>> Игровая статистика</SPAN></SPAN><BR><BR>\r\n                   <UL id=nav>\r\n                     <DIV><A href=\"admin_statistic_history.php\">Все игры</A></DIV>\r\n                     <DIV><A class=selected href=\"admin_statistic_history.php\">Все ";
    echo $user_name;
    echo " (";
    echo mysql_num_rows( @mysql_query( "SELECT * FROM games_stats WHERE login='".$user_name."'" ) );
    echo ")</A></DIV>\r\n                     </UL></DIV></TD></TR></TBODY></TABLE><!--end of tab navigation--></TD></TR><!--end banner -->\r\n         <TR><!--begin main content tables --->\r\n           <TD vAlign=top>\r\n             <TABLE cellSpacing=0 cellPadding=0 width=\"100%\">\r\n               <TBODY>\r\n               <TR>\r\n                 <TD width=10><IMG height=8\r\n                   src=\"templates/images/spacer.gif\"\r\n        ";
    echo "         width=10></TD>\r\n                 <TD>               </TD></TR></TBODY></TABLE>\r\n             ";
    echo "<S";
    echo "TYLE type=text/css>.drag {\r\n \tCURSOR: hand\r\n }\r\n </STYLE>\r\n             <DIV id=dHTMLToolTip\r\n             style=\"Z-INDEX: 1000; LEFT: 0px; VISIBILITY: hidden; WIDTH: 10px; POSITION: absolute; TOP: 0px; HEIGHT: 10px\"></DIV>\r\n           </TD></TR>\r\n             <TD class=tableheader>\r\n             \tВсего было сыграно: ";
    echo mysql_num_rows( mysql_query( "SELECT * FROM games_stats" ) );
    echo " -\r\n             \tИз них на реальные деньги(";
    echo mysql_num_rows( mysql_query( "SELECT * FROM games_stats where mode='real'" ) );
    echo ") -\r\n             \tна виртуальные деньги(";
    echo mysql_num_rows( mysql_query( "SELECT * FROM games_stats where mode='fun'" ) );
    echo ")\r\n              </TD>\r\n           </TR></TBODY></TABLE>\r\n                   <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" bgColor=#cccccc border=0>\r\n                     <TBODY>\r\n                     <TR>\r\n                       <TD>\r\n                         <TABLE cellSpacing=1 cellPadding=3 width=\"100%\" border=0>\r\n                           <TBODY>\r\n                           <TR class=colheader>\r\n    ";
    echo "                         <TD width=\"5%\"><div align=\"center\">Дата</div></TD>\r\n                             <TD width=\"5%\"><div align=\"center\">Время</div></TD>\r\n                             <TD width=\"10%\"><div align=\"center\">Пользователь</div></TD>\r\n                             <TD width=\"10%\"><div align=\"center\">Игра</div></TD>\r\n                             <TD width=\"10%\"><div align=\"center\">Ставка</div></TD>\r\n     ";
    echo "                        <TD width=\"5%\"><div align=\"center\">[+] (Пользователь)</div></TD>\r\n\t\t\t\t\t\t\t <TD width=\"10%\"><div align=\"center\">Банк</div></TD>\r\n\t\t\t\t\t\t\t <TD width=\"10%\"><div align=\"center\">Баланс пользователя</div></TD>\r\n\t\t\t\t\t\t\t <TD width=\"5%\"><div align=\"center\">Тип</div></TD>\r\n                           </TR>\r\n ";
    $user_name = mysql_fetch_array( mysql_query( "SELECT * FROM clients WHERE id='".$id."'" ) );
    $статистика_игр_запрос = @mysql_query( "select * from games_stats WHERE login='".$user_name['login']."' ORDER BY id ASC" );
    while ( $статистика_игр = @mysql_fetch_array( $статистика_игр_запрос ) )
    {
        echo "\r\n                           <TR>\r\n                             <TD class=tabledata vAlign=top><div align=center>{$статистика_игр['1']}</div></TD>\r\n                             <TD class=tabledata vAlign=top><div align=center>{$статистика_игр['2']}</div></TD>\r\n                             <TD class=tabledata width=\"10%\" vAlign=top><div align=center>{$статистика_игр['3']}</div></TD>\r\n                             <TD class=tabledata vAlign=top><div align=left>{$статистика_игр['8']}</div></TD>\r\n\t\t\t\t\t\t\t <TD class=tabledata vAlign=top><div align=center>{$статистика_игр['6']}</div></TD>\r\n\t\t\t\t\t\t\t <TD class=tabledata vAlign=top><div align=center>{$статистика_игр['7']}</div></TD>\r\n\t\t\t\t\t\t\t <TD class=tabledata vAlign=top><div align=center>{$статистика_игр['5']}</div></TD>\r\n\t\t\t\t\t\t\t <TD class=tabledata vAlign=top><div align=center>{$статистика_игр['4']}</div></TD>\r\n\t\t\t\t\t\t\t <TD class=tabledata vAlign=top><div align=center>{$статистика_игр['9']}</div></TD>\r\n\r\n \t\t\t\t\t\t  ";
    }
    echo "                       </TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR><!-- closes 3 tables -->\r\n               <TR>\r\n                 <TD colSpan=2 height=10><IMG\r\n                   src=\"templates/images/spacer.gif\"\r\n                 width=1 height=\"1\"></TD>\r\n               </TR>\r\n\r\n";
}
include_once( "templates/admin_footer.php" );
echo "\r\n";
?>
