<?php
defined('CASINOENGINE') or die("Доступ запрещен!");
include_once( "templates/admin_top.php" );
include_once( "templates/admin_menu.php" );
echo "\r\n";
if ( $режим == "" )
{
    echo "\r\n     <TD vAlign=top>\r\n       <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" border=0><!--begin top row-->\r\n         <TBODY>\r\n         <TR>\r\n           <TD><IMG height=13\r\n             src=\"templates/images/spacer.gif\"></TD></TR>\r\n         <TR class=printHidden>\r\n           <TD class=bannerline><IMG height=5\r\n             src=\"templates/images/spacer.gif\" width=2></TD></TR><!--end top row-->\r\n         <TR><!--be";
    echo "gin top banner-->\r\n           <TD class=banner height=40><!--add the tab navigation -->\r\n             <TABLE class=printHidden style=\"MARGIN-LEFT: 10px\" cellSpacing=0\r\n             cellPadding=0 width=\"100%\" border=0>\r\n               <TBODY>\r\n               <TR><!--section header-->\r\n                 <TD align=left>\r\n                   <DIV id=container>";
    echo "<S";
    echo "PAN class=pageheader>Финансы > ";
    echo "<S";
    echo "PAN class=subhead>Внесли </SPAN></SPAN><BR><BR>\r\n                   <UL id=nav>\r\n                     <DIV><A href=\"admin_pay_deposit.php?mode=pending\">В ожидании (";
    echo mysql_num_rows( @mysql_query( "SELECT * FROM pay_deposits WHERE status='2'" ) );
    echo ")</A>\r\n\t\t\t\t\t <DIV><A href=\"admin_pay_deposit.php?mode=complied\">Оплаченно (";
    echo mysql_num_rows( @mysql_query( "SELECT * FROM pay_deposits WHERE status='1'" ) );
    echo ")</A>\r\n\t\t\t\t\t <DIV><A href=\"admin_pay_deposit.php?mode=decline\">Отклонённые (";
    echo mysql_num_rows( @mysql_query( "SELECT * FROM pay_deposits WHERE status='3'" ) );
    echo ")</A>\r\n\t\t\t\t\t <DIV><A href=\"admin_pay_deposit.php?mode=error\">Незавершенные (";
    echo mysql_num_rows( @mysql_query( "SELECT * FROM pay_deposits WHERE status='0'" ) );
    echo ")</A>\r\n\t\t\t\t\t <DIV><A class=selected href=\"admin_pay_deposit.php\">Все (";
    echo mysql_num_rows( @mysql_query( "SELECT * FROM pay_deposits" ) );
    echo ")</A>\r\n \t\t\t\t  </UL></DIV></TD></TR></TBODY></TABLE><!--end of tab navigation--></TD></TR><!--end banner -->\r\n         <TR><!--begin main content tables --->\r\n           <TD vAlign=top>\r\n             <TABLE cellSpacing=0 cellPadding=0 width=\"100%\">\r\n               <TBODY>\r\n               <TR>\r\n                 <TD width=10><IMG height=8\r\n                   src=\"templates/images/spacer.gif\"\r\n                 width=10>";
    echo "</TD>\r\n                 <TD>               </TD></TR></TBODY></TABLE>\r\n             ";
    echo "<S";
    echo "TYLE type=text/css>.drag {\r\n \tCURSOR: hand\r\n }\r\n </STYLE>\r\n             <DIV id=dHTMLToolTip\r\n             style=\"Z-INDEX: 1000; LEFT: 0px; VISIBILITY: hidden; WIDTH: 10px; POSITION: absolute; TOP: 0px; HEIGHT: 10px\"></DIV>\r\n           </TD></TR><FORM name=editst action=\"engine.php?form=generalsettings\" method=post>\r\n             <TD class=tableheader>ОПЛАЧЕННЫЕ ДЕПОЗИТЫ ПОЛЬЗОВАТЕЛЕЙ</TD>\r\n         <TR>\r\n";
    echo "           <TD height=\"241\" vAlign=top>\r\n                   <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" bgColor=#cccccc border=0>\r\n                     <TBODY>\r\n                     <TR>\r\n                       <TD>\r\n           \t\t\t\t\t<TABLE cellSpacing=1 cellPadding=3 width=\"100%\" border=0>\r\n                           <TBODY>\r\n                           <TR class=colheader>\r\n\r\n                         ";
    echo "    <TD width=\"5%\"><div align=\"center\">Пользователь</div></TD>\r\n                             <TD width=\"10%\"><div align=\"center\">Тип</div></TD>\r\n                             <TD width=\"5%\"><div align=\"center\">Сумма</div></TD>\r\n                             <TD width=\"5%\"><div align=\"center\">Дата</div></TD>\r\n                             <TD width=\"5%\"><div align=\"center\">Время</div></TD>\r\n                             <T";
    echo "D width=\"10%\"><div align=\"center\">Статус</div></TD>\r\n                             <TD width=\"10%\"><div align=\"center\">IP</div></TD>\r\n                             <TD width=\"35%\"><div align=\"center\">Управление</div></TD>\r\n                           </TR>\r\n";
    $депозиты_база_запрос = @mysql_query( "select * from pay_deposits ORDER BY id DESC" );
    while ( $игры_база_лист = @mysql_fetch_array( $депозиты_база_запрос ) )
    {
        echo "                             <tr>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center><a href=\"admin_userlist.php?mode=viewuser&id=";
        $id_пользователь_запрос = @mysql_fetch_array( @mysql_query( "SELECT * FROM clients WHERE login='".$игры_база_лист[1]."'" ) );
        echo $id_пользователь_запрос['id'];
        echo "\">";
        echo $игры_база_лист[1];
        echo "</a></div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>\r\n                           ";
        echo $игры_база_лист[6];
        echo $игры_база_лист[7];
        echo "                           </div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>";
        echo $игры_база_лист[2];
        echo "</div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>";
        echo $игры_база_лист[3];
        echo "</div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>";
        echo $игры_база_лист[4];
        echo "</div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>\r\n                           ";
        if ( $игры_база_лист[8] == "0" )
        {
            echo "Не завершен";
        }
        if ( $игры_база_лист[8] == "1" )
        {
            echo "<font color=green>Оплачен</font>";
        }
        if ( $игры_база_лист[8] == "2" )
        {
            echo "<font color=orange>В обработке</font>";
        }
        if ( $игры_база_лист[8] == "3" )
        {
            echo "<font color=red>Заблокирован</font>";
        }
        echo "                           </div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>";
        echo $игры_база_лист[5];
        echo "</div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>\r\n                           \t\tПометить как - <a href=\"admin_pay_deposit.php?mode=status_pending&id=";
        echo $игры_база_лист[0];
        echo "\">Ожидающий</a> - <a href=\"admin_pay_deposit.php?mode=status_decline&id=";
        echo $игры_база_лист[0];
        echo "\">Отклоненный</a> - <a href=\"admin_pay_deposit.php?mode=delete&id=";
        echo $игры_база_лист[0];
        echo "\">Удалить</a>\r\n                           </div></td>\r\n                           </tr>\r\n";
    }
    echo "\r\n\r\n                           </TBODY>\r\n                           </TABLE>\r\n                \t\t</TD>\r\n                </TR>\r\n                </TBODY>\r\n           </TABLE>\r\n         </TD>\r\n         </TR></TBODY></TABLE></TD>\r\n     <TD><IMG src=\"templates/images/spacer.gif\" width=10></TD></TR>\r\n\r\n\r\n";
}
echo "\r\n";
if ( $режим == "pending" )
{
    echo "\r\n     <TD vAlign=top>\r\n       <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" border=0><!--begin top row-->\r\n         <TBODY>\r\n         <TR>\r\n           <TD><IMG height=13\r\n             src=\"templates/images/spacer.gif\"></TD></TR>\r\n         <TR class=printHidden>\r\n           <TD class=bannerline><IMG height=5\r\n             src=\"templates/images/spacer.gif\" width=2></TD></TR><!--end top row-->\r\n         <TR><!--be";
    echo "gin top banner-->\r\n           <TD class=banner height=40><!--add the tab navigation -->\r\n             <TABLE class=printHidden style=\"MARGIN-LEFT: 10px\" cellSpacing=0\r\n             cellPadding=0 width=\"100%\" border=0>\r\n               <TBODY>\r\n               <TR><!--section header-->\r\n                 <TD align=left>\r\n                   <DIV id=container>";
    echo "<S";
    echo "PAN class=pageheader>Финансы > ";
    echo "<S";
    echo "PAN class=subhead>Внесли </SPAN></SPAN><BR><BR>\r\n                   <UL id=nav>\r\n                     <DIV><A class=selected href=\"admin_pay_deposit.php?mode=pending\">В ожидании (";
    echo mysql_num_rows( @mysql_query( "SELECT * FROM pay_deposits WHERE status='2'" ) );
    echo ")</A>\r\n\t\t\t\t\t <DIV><A href=\"admin_pay_deposit.php?mode=complied\">Оплаченно (";
    echo mysql_num_rows( @mysql_query( "SELECT * FROM pay_deposits WHERE status='1'" ) );
    echo ")</A>\r\n\t\t\t\t\t <DIV><A href=\"admin_pay_deposit.php?mode=decline\">Отклонённые (";
    echo mysql_num_rows( @mysql_query( "SELECT * FROM pay_deposits WHERE status='3'" ) );
    echo ")</A>\r\n\t\t\t\t\t <DIV><A href=\"admin_pay_deposit.php?mode=error\">Незавершенные (";
    echo mysql_num_rows( @mysql_query( "SELECT * FROM pay_deposits WHERE status='0'" ) );
    echo ")</A>\r\n\t\t\t\t\t <DIV><A href=\"admin_pay_deposit.php\">Все (";
    echo mysql_num_rows( mysql_query( "SELECT * FROM pay_deposits" ) );
    echo ")</A>\r\n \t\t\t\t  </UL></DIV></TD></TR></TBODY></TABLE><!--end of tab navigation--></TD></TR><!--end banner -->\r\n         <TR><!--begin main content tables --->\r\n           <TD vAlign=top>\r\n             <TABLE cellSpacing=0 cellPadding=0 width=\"100%\">\r\n               <TBODY>\r\n               <TR>\r\n                 <TD width=10><IMG height=8\r\n                   src=\"templates/images/spacer.gif\"\r\n                 width=10>";
    echo "</TD>\r\n                 <TD>               </TD></TR></TBODY></TABLE>\r\n             ";
    echo "<S";
    echo "TYLE type=text/css>.drag {\r\n \tCURSOR: hand\r\n }\r\n </STYLE>\r\n             <DIV id=dHTMLToolTip\r\n             style=\"Z-INDEX: 1000; LEFT: 0px; VISIBILITY: hidden; WIDTH: 10px; POSITION: absolute; TOP: 0px; HEIGHT: 10px\"></DIV>\r\n           </TD></TR><FORM name=editst action=\"engine.php?form=generalsettings\" method=post>\r\n             <TD class=tableheader>ОЖИДАЮЩИЕ ДЕПОЗИТЫ ПОЛЬЗОВАТЕЛЕЙ</TD>\r\n         <TR>\r\n ";
    echo "          <TD height=\"241\" vAlign=top>\r\n                   <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" bgColor=#cccccc border=0>\r\n                     <TBODY>\r\n                     <TR>\r\n                       <TD>\r\n           \t\t\t\t\t<TABLE cellSpacing=1 cellPadding=3 width=\"100%\" border=0>\r\n                           <TBODY>\r\n                           <TR class=colheader>\r\n\r\n                          ";
    echo "   <TD width=\"5%\"><div align=\"center\">Пользователь</div></TD>\r\n                             <TD width=\"10%\"><div align=\"center\">Тип</div></TD>\r\n                             <TD width=\"5%\"><div align=\"center\">Сумма</div></TD>\r\n                             <TD width=\"5%\"><div align=\"center\">Дата</div></TD>\r\n                             <TD width=\"5%\"><div align=\"center\">Время</div></TD>\r\n                             <TD";
    echo " width=\"10%\"><div align=\"center\">Статус</div></TD>\r\n                             <TD width=\"10%\"><div align=\"center\">IP</div></TD>\r\n                             <TD width=\"35%\"><div align=\"center\">Управление</div></TD>\r\n                           </TR>\r\n";
    $депозиты_база_запрос = @mysql_query( "select * from pay_deposits WHERE status='2' ORDER BY id DESC" );
    while ( $игры_база_лист = @mysql_fetch_array( $депозиты_база_запрос ) )
    {
        echo "                             <tr>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center><a href=\"admin_userlist.php?mode=viewuser&id=";
        $id_пользователь_запрос = @mysql_fetch_array( @mysql_query( "SELECT * FROM clients WHERE login='".$игры_база_лист[1]."'" ) );
        echo $id_пользователь_запрос['id'];
        echo "\">";
        echo $игры_база_лист[1];
        echo "</a></div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>\r\n                           ";
        echo $игры_база_лист[6];
        echo $игры_база_лист[7];
        echo "                           </div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>";
        echo $игры_база_лист[2];
        echo "</div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>";
        echo $игры_база_лист[3];
        echo "</div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>";
        echo $игры_база_лист[4];
        echo "</div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>\r\n                           ";
        if ( $игры_база_лист[8] == "0" )
        {
            echo "Не завершен";
        }
        if ( $игры_база_лист[8] == "1" )
        {
            echo "<font color=green>Оплачен</font>";
        }
        if ( $игры_база_лист[8] == "2" )
        {
            echo "<font color=orange>В обработке</font>";
        }
        if ( $игры_база_лист[8] == "3" )
        {
            echo "<font color=red>Заблокирован</font>";
        }
        echo "                           </div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>";
        echo $игры_база_лист[5];
        echo "</div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>\r\n                           \t\tПометить как - <a href=\"admin_pay_deposit.php?mode=status_pending&id=";
        echo $игры_база_лист[0];
        echo "\">Ожидающий</a> - <a href=\"admin_pay_deposit.php?mode=status_decline&id=";
        echo $игры_база_лист[0];
        echo "\">Отклоненный</a> - <a href=\"admin_pay_deposit.php?mode=delete&id=";
        echo $игры_база_лист[0];
        echo "\">Удалить</a>\r\n                           </div></td>\r\n                           </tr>\r\n";
    }
    echo "\r\n\r\n                           </TBODY>\r\n                           </TABLE>\r\n                \t\t</TD>\r\n                </TR>\r\n                </TBODY>\r\n           </TABLE>\r\n         </TD>\r\n         </TR></TBODY></TABLE></TD>\r\n     <TD><IMG src=\"templates/images/spacer.gif\" width=10></TD></TR>\r\n";
}
echo "\r\n";
if ( $режим == "complied" )
{
    echo "\r\n     <TD vAlign=top>\r\n       <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" border=0><!--begin top row-->\r\n         <TBODY>\r\n         <TR>\r\n           <TD><IMG height=13\r\n             src=\"templates/images/spacer.gif\"></TD></TR>\r\n         <TR class=printHidden>\r\n           <TD class=bannerline><IMG height=5\r\n             src=\"templates/images/spacer.gif\" width=2></TD></TR><!--end top row-->\r\n         <TR><!--be";
    echo "gin top banner-->\r\n           <TD class=banner height=40><!--add the tab navigation -->\r\n             <TABLE class=printHidden style=\"MARGIN-LEFT: 10px\" cellSpacing=0\r\n             cellPadding=0 width=\"100%\" border=0>\r\n               <TBODY>\r\n               <TR><!--section header-->\r\n                 <TD align=left>\r\n                   <DIV id=container>";
    echo "<S";
    echo "PAN class=pageheader>Финансы > ";
    echo "<S";
    echo "PAN class=subhead>Внесли </SPAN></SPAN><BR><BR>\r\n                   <UL id=nav>\r\n                     <DIV><A href=\"admin_pay_deposit.php?mode=pending\">В ожидании (";
    echo mysql_num_rows( mysql_query( "SELECT * FROM pay_deposits WHERE status='2'" ) );
    echo ")</A>\r\n\t\t\t\t\t <DIV><A class=selected href=\"admin_pay_deposit.php?mode=complied\">Оплаченно (";
    echo mysql_num_rows( mysql_query( "SELECT * FROM pay_deposits WHERE status='1'" ) );
    echo ")</A>\r\n\t\t\t\t\t <DIV><A href=\"admin_pay_deposit.php?mode=decline\">Отклонённые (";
    echo mysql_num_rows( mysql_query( "SELECT * FROM pay_deposits WHERE status='3'" ) );
    echo ")</A>\r\n\t\t\t\t\t <DIV><A href=\"admin_pay_deposit.php?mode=error\">Незавершенные (";
    echo mysql_num_rows( mysql_query( "SELECT * FROM pay_deposits WHERE status='0'" ) );
    echo ")</A>\r\n\t\t\t\t\t <DIV><A href=\"admin_pay_deposit.php\">Все (";
    echo mysql_num_rows( mysql_query( "SELECT * FROM pay_deposits" ) );
    echo ")</A>\r\n \t\t\t\t  </UL></DIV></TD></TR></TBODY></TABLE><!--end of tab navigation--></TD></TR><!--end banner -->\r\n         <TR><!--begin main content tables --->\r\n           <TD vAlign=top>\r\n             <TABLE cellSpacing=0 cellPadding=0 width=\"100%\">\r\n               <TBODY>\r\n               <TR>\r\n                 <TD width=10><IMG height=8\r\n                   src=\"templates/images/spacer.gif\"\r\n                 width=10>";
    echo "</TD>\r\n                 <TD>               </TD></TR></TBODY></TABLE>\r\n             ";
    echo "<S";
    echo "TYLE type=text/css>.drag {\r\n \tCURSOR: hand\r\n }\r\n </STYLE>\r\n             <DIV id=dHTMLToolTip\r\n             style=\"Z-INDEX: 1000; LEFT: 0px; VISIBILITY: hidden; WIDTH: 10px; POSITION: absolute; TOP: 0px; HEIGHT: 10px\"></DIV>\r\n           </TD></TR><FORM name=editst action=\"engine.php?form=generalsettings\" method=post>\r\n             <TD class=tableheader>ОПЛАЧЕННЫЕ ДЕПОЗИТЫ ПОЛЬЗОВАТЕЛЕЙ</TD>\r\n         <TR>\r\n";
    echo "           <TD height=\"241\" vAlign=top>\r\n                   <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" bgColor=#cccccc border=0>\r\n                     <TBODY>\r\n                     <TR>\r\n                       <TD>\r\n           \t\t\t\t\t<TABLE cellSpacing=1 cellPadding=3 width=\"100%\" border=0>\r\n                           <TBODY>\r\n                           <TR class=colheader>\r\n\r\n                         ";
    echo "    <TD width=\"5%\"><div align=\"center\">Пользователь</div></TD>\r\n                             <TD width=\"10%\"><div align=\"center\">Тип</div></TD>\r\n                             <TD width=\"5%\"><div align=\"center\">Сумма</div></TD>\r\n                             <TD width=\"5%\"><div align=\"center\">Дата</div></TD>\r\n                             <TD width=\"5%\"><div align=\"center\">Время</div></TD>\r\n                             <T";
    echo "D width=\"10%\"><div align=\"center\">Статус</div></TD>\r\n                             <TD width=\"10%\"><div align=\"center\">IP</div></TD>\r\n                             <TD width=\"35%\"><div align=\"center\">Управление</div></TD>\r\n                           </TR>\r\n";
    $депозиты_база_запрос = @mysql_query( "select * from pay_deposits WHERE status='1' ORDER BY id DESC" );
    while ( $игры_база_лист = @mysql_fetch_array( $депозиты_база_запрос ) )
    {
        echo "                             <tr>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center><a href=\"admin_userlist.php?mode=viewuser&id=";
        $id_пользователь_запрос = @mysql_fetch_array( @mysql_query( "SELECT * FROM clients WHERE login='".$игры_база_лист[1]."'" ) );
        echo $id_пользователь_запрос['id'];
        echo "\">";
        echo $игры_база_лист[1];
        echo "</a></div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>\r\n                           ";
        echo $игры_база_лист[6];
        echo $игры_база_лист[7];
        echo "                           </div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>";
        echo $игры_база_лист[2];
        echo "</div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>";
        echo $игры_база_лист[3];
        echo "</div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>";
        echo $игры_база_лист[4];
        echo "</div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>\r\n                           ";
        if ( $игры_база_лист[8] == "0" )
        {
            echo "Не завершен";
        }
        if ( $игры_база_лист[8] == "1" )
        {
            echo "<font color=green>Оплачен</font>";
        }
        if ( $игры_база_лист[8] == "2" )
        {
            echo "<font color=orange>В обработке</font>";
        }
        if ( $игры_база_лист[8] == "3" )
        {
            echo "<font color=red>Заблокирован</font>";
        }
        echo "                           </div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>";
        echo $игры_база_лист[5];
        echo "</div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>\r\n                           \t\tПометить как - <a href=\"admin_pay_deposit.php?mode=status_pending&id=";
        echo $игры_база_лист[0];
        echo "\">Ожидающий</a> - <a href=\"admin_pay_deposit.php?mode=status_decline&id=";
        echo $игры_база_лист[0];
        echo "\">Отклоненный</a> - <a href=\"admin_pay_deposit.php?mode=delete&id=";
        echo $игры_база_лист[0];
        echo "\">Удалить</a>\r\n                           </div></td>\r\n                           </tr>\r\n";
    }
    echo "\r\n\r\n                           </TBODY>\r\n                           </TABLE>\r\n                \t\t</TD>\r\n                </TR>\r\n                </TBODY>\r\n           </TABLE>\r\n         </TD>\r\n         </TR></TBODY></TABLE></TD>\r\n     <TD><IMG src=\"templates/images/spacer.gif\" width=10></TD></TR>\r\n\r\n\r\n";
}
echo "\r\n";
if ( $режим == "decline" )
{
    echo "        <TD vAlign=top>\r\n       <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" border=0><!--begin top row-->\r\n         <TBODY>\r\n         <TR>\r\n           <TD><IMG height=13\r\n             src=\"templates/images/spacer.gif\"></TD></TR>\r\n         <TR class=printHidden>\r\n           <TD class=bannerline><IMG height=5\r\n             src=\"templates/images/spacer.gif\" width=2></TD></TR><!--end top row-->\r\n         <TR><!--b";
    echo "egin top banner-->\r\n           <TD class=banner height=40><!--add the tab navigation -->\r\n             <TABLE class=printHidden style=\"MARGIN-LEFT: 10px\" cellSpacing=0\r\n             cellPadding=0 width=\"100%\" border=0>\r\n               <TBODY>\r\n               <TR><!--section header-->\r\n                 <TD align=left>\r\n                   <DIV id=container>";
    echo "<S";
    echo "PAN class=pageheader>Финансы > ";
    echo "<S";
    echo "PAN class=subhead>Внесли </SPAN></SPAN><BR><BR>\r\n                   <UL id=nav>\r\n                     <DIV><A href=\"admin_pay_deposit.php?mode=pending\">В ожидании (";
    echo mysql_num_rows( mysql_query( "SELECT * FROM pay_deposits WHERE status='2'" ) );
    echo ")</A>\r\n\t\t\t\t\t <DIV><A href=\"admin_pay_deposit.php?mode=complied\">Оплаченно (";
    echo mysql_num_rows( mysql_query( "SELECT * FROM pay_deposits WHERE status='1'" ) );
    echo ")</A>\r\n\t\t\t\t\t <DIV><A class=selected href=\"admin_pay_deposit.php?mode=decline\">Отклонённые (";
    echo mysql_num_rows( mysql_query( "SELECT * FROM pay_deposits WHERE status='3'" ) );
    echo ")</A>\r\n\t\t\t\t\t <DIV><A href=\"admin_pay_deposit.php?mode=error\">Незавершенные (";
    echo mysql_num_rows( mysql_query( "SELECT * FROM pay_deposits WHERE status='0'" ) );
    echo ")</A>\r\n\t\t\t\t\t <DIV><A href=\"admin_pay_deposit.php\">Все (";
    echo mysql_num_rows( mysql_query( "SELECT * FROM pay_deposits" ) );
    echo ")</A>\r\n \t\t\t\t  </UL></DIV></TD></TR></TBODY></TABLE><!--end of tab navigation--></TD></TR><!--end banner -->\r\n         <TR><!--begin main content tables --->\r\n           <TD vAlign=top>\r\n             <TABLE cellSpacing=0 cellPadding=0 width=\"100%\">\r\n               <TBODY>\r\n               <TR>\r\n                 <TD width=10><IMG height=8\r\n                   src=\"templates/images/spacer.gif\"\r\n                 width=10>";
    echo "</TD>\r\n                 <TD>               </TD></TR></TBODY></TABLE>\r\n             ";
    echo "<S";
    echo "TYLE type=text/css>.drag {\r\n \tCURSOR: hand\r\n }\r\n </STYLE>\r\n             <DIV id=dHTMLToolTip\r\n             style=\"Z-INDEX: 1000; LEFT: 0px; VISIBILITY: hidden; WIDTH: 10px; POSITION: absolute; TOP: 0px; HEIGHT: 10px\"></DIV>\r\n           </TD></TR><FORM name=editst action=\"engine.php?form=generalsettings\" method=post>\r\n             <TD class=tableheader>ОТКЛОНЁННЫЕ ДЕПОЗИТЫ ПОЛЬЗОВАТЕЛЕЙ</TD>\r\n         <TR>\r";
    echo "\n           <TD height=\"241\" vAlign=top>\r\n                   <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" bgColor=#cccccc border=0>\r\n                     <TBODY>\r\n                     <TR>\r\n                       <TD>\r\n           \t\t\t\t\t<TABLE cellSpacing=1 cellPadding=3 width=\"100%\" border=0>\r\n                           <TBODY>\r\n                           <TR class=colheader>\r\n\r\n                        ";
    echo "     <TD width=\"5%\"><div align=\"center\">Пользователь</div></TD>\r\n                             <TD width=\"10%\"><div align=\"center\">Тип</div></TD>\r\n                             <TD width=\"5%\"><div align=\"center\">Сумма</div></TD>\r\n                             <TD width=\"5%\"><div align=\"center\">Дата</div></TD>\r\n                             <TD width=\"5%\"><div align=\"center\">Время</div></TD>\r\n                             ";
    echo "<TD width=\"10%\"><div align=\"center\">Статус</div></TD>\r\n                             <TD width=\"10%\"><div align=\"center\">IP</div></TD>\r\n                             <TD width=\"35%\"><div align=\"center\">Управление</div></TD>\r\n                           </TR>\r\n";
    $депозиты_база_запрос = @mysql_query( "select * from pay_deposits WHERE status='3' ORDER BY id DESC" );
    while ( $игры_база_лист = @mysql_fetch_array( $депозиты_база_запрос ) )
    {
        echo "                             <tr>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center><a href=\"admin_userlist.php?mode=viewuser&id=";
        $id_пользователь_запрос = @mysql_fetch_array( @mysql_query( "SELECT * FROM clients WHERE login='".$игры_база_лист[1]."'" ) );
        echo $id_пользователь_запрос['id'];
        echo "\">";
        echo $игры_база_лист[1];
        echo "</a></div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>\r\n                           ";
        echo $игры_база_лист[6];
        echo $игры_база_лист[7];
        echo "                           </div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>";
        echo $игры_база_лист[2];
        echo "</div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>";
        echo $игры_база_лист[3];
        echo "</div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>";
        echo $игры_база_лист[4];
        echo "</div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>\r\n                           ";
        if ( $игры_база_лист[8] == "0" )
        {
            echo "Не завершен";
        }
        if ( $игры_база_лист[8] == "1" )
        {
            echo "<font color=green>Оплачен</font>";
        }
        if ( $игры_база_лист[8] == "2" )
        {
            echo "<font color=orange>В обработке</font>";
        }
        if ( $игры_база_лист[8] == "3" )
        {
            echo "<font color=red>Заблокирован</font>";
        }
        echo "                           </div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>";
        echo $игры_база_лист[5];
        echo "</div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>\r\n                           \t\tПометить как - <a href=\"admin_pay_deposit.php?mode=status_pending&id=";
        echo $игры_база_лист[0];
        echo "\">Ожидающий</a> - <a href=\"admin_pay_deposit.php?mode=status_decline&id=";
        echo $игры_база_лист[0];
        echo "\">Отклоненный</a> - <a href=\"admin_pay_deposit.php?mode=delete&id=";
        echo $игры_база_лист[0];
        echo "\">Удалить</a>\r\n                           </div></td>\r\n                           </tr>\r\n";
    }
    echo "\r\n\r\n                           </TBODY>\r\n                           </TABLE>\r\n                \t\t</TD>\r\n                </TR>\r\n                </TBODY>\r\n           </TABLE>\r\n         </TD>\r\n         </TR></TBODY></TABLE></TD>\r\n     <TD><IMG src=\"templates/images/spacer.gif\" width=10></TD></TR>\r\n";
}
echo "\r\n";
if ( $режим == "error" )
{
    echo "\r\n     <TD vAlign=top>\r\n       <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" border=0><!--begin top row-->\r\n         <TBODY>\r\n         <TR>\r\n           <TD><IMG height=13\r\n             src=\"templates/images/spacer.gif\"></TD></TR>\r\n         <TR class=printHidden>\r\n           <TD class=bannerline><IMG height=5\r\n             src=\"templates/images/spacer.gif\" width=2></TD></TR><!--end top row-->\r\n         <TR><!--be";
    echo "gin top banner-->\r\n           <TD class=banner height=40><!--add the tab navigation -->\r\n             <TABLE class=printHidden style=\"MARGIN-LEFT: 10px\" cellSpacing=0\r\n             cellPadding=0 width=\"100%\" border=0>\r\n               <TBODY>\r\n               <TR><!--section header-->\r\n                 <TD align=left>\r\n                   <DIV id=container>";
    echo "<S";
    echo "PAN class=pageheader>Финансы > ";
    echo "<S";
    echo "PAN class=subhead>Внесли </SPAN></SPAN><BR><BR>\r\n                   <UL id=nav>\r\n                     <DIV><A href=\"admin_pay_deposit.php?mode=pending\">В ожидании (";
    echo mysql_num_rows( mysql_query( "SELECT * FROM pay_deposits WHERE status='2'" ) );
    echo ")</A>\r\n\t\t\t\t\t <DIV><A href=\"admin_pay_deposit.php?mode=complied\">Оплаченно (";
    echo mysql_num_rows( mysql_query( "SELECT * FROM pay_deposits WHERE status='1'" ) );
    echo ")</A>\r\n\t\t\t\t\t <DIV><A href=\"admin_pay_deposit.php?mode=decline\">Отклонённые (";
    echo mysql_num_rows( mysql_query( "SELECT * FROM pay_deposits WHERE status='3'" ) );
    echo ")</A>\r\n\t\t\t\t\t <DIV><A class=selected href=\"admin_pay_deposit.php?mode=error\">Незавершенные (";
    echo mysql_num_rows( mysql_query( "SELECT * FROM pay_deposits WHERE status='0'" ) );
    echo ")</A>\r\n\t\t\t\t\t <DIV><A href=\"admin_pay_deposit.php\">Все (";
    echo mysql_num_rows( mysql_query( "SELECT * FROM pay_deposits" ) );
    echo ")</A>\r\n \t\t\t\t  </UL></DIV></TD></TR></TBODY></TABLE><!--end of tab navigation--></TD></TR><!--end banner -->\r\n         <TR><!--begin main content tables --->\r\n           <TD vAlign=top>\r\n             <TABLE cellSpacing=0 cellPadding=0 width=\"100%\">\r\n               <TBODY>\r\n               <TR>\r\n                 <TD width=10><IMG height=8\r\n                   src=\"templates/images/spacer.gif\"\r\n                 width=10>";
    echo "</TD>\r\n                 <TD>               </TD></TR></TBODY></TABLE>\r\n             ";
    echo "<S";
    echo "TYLE type=text/css>.drag {\r\n \tCURSOR: hand\r\n }\r\n </STYLE>\r\n             <DIV id=dHTMLToolTip\r\n             style=\"Z-INDEX: 1000; LEFT: 0px; VISIBILITY: hidden; WIDTH: 10px; POSITION: absolute; TOP: 0px; HEIGHT: 10px\"></DIV>\r\n           </TD></TR><FORM name=editst action=\"engine.php?form=generalsettings\" method=post>\r\n             <TD class=tableheader>НЕЗАВЕРШЕННЫЕ ДЕПОЗИТЫ ПОЛЬЗОВАТЕЛЕЙ</TD>\r\n         <TR";
    echo ">\r\n           <TD height=\"241\" vAlign=top>\r\n                   <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" bgColor=#cccccc border=0>\r\n                     <TBODY>\r\n                     <TR>\r\n                       <TD>\r\n           \t\t\t\t\t<TABLE cellSpacing=1 cellPadding=3 width=\"100%\" border=0>\r\n                           <TBODY>\r\n                           <TR class=colheader>\r\n\r\n                      ";
    echo "       <TD width=\"5%\"><div align=\"center\">Пользователь</div></TD>\r\n                             <TD width=\"10%\"><div align=\"center\">Тип</div></TD>\r\n                             <TD width=\"5%\"><div align=\"center\">Сумма</div></TD>\r\n                             <TD width=\"5%\"><div align=\"center\">Дата</div></TD>\r\n                             <TD width=\"5%\"><div align=\"center\">Время</div></TD>\r\n                           ";
    echo "  <TD width=\"10%\"><div align=\"center\">Статус</div></TD>\r\n                             <TD width=\"10%\"><div align=\"center\">IP</div></TD>\r\n                             <TD width=\"35%\"><div align=\"center\">Управление</div></TD>\r\n                           </TR>\r\n";
    $депозиты_база_запрос = @mysql_query( "select * from pay_deposits WHERE status='0' ORDER BY id DESC" );
    while ( $игры_база_лист = @mysql_fetch_array( $депозиты_база_запрос ) )
    {
        echo "                             <tr>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center><a href=\"admin_userlist.php?mode=viewuser&id=";
        $id_пользователь_запрос = @mysql_fetch_array( @mysql_query( "SELECT * FROM clients WHERE login='".$игры_база_лист[1]."'" ) );
        echo $id_пользователь_запрос['id'];
        echo "\">";
        echo $игры_база_лист[1];
        echo "</a></div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>\r\n                           ";
        echo $игры_база_лист[6];
        echo $игры_база_лист[7];
        echo "                           </div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>";
        echo $игры_база_лист[2];
        echo "</div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>";
        echo $игры_база_лист[3];
        echo "</div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>";
        echo $игры_база_лист[4];
        echo "</div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>\r\n                           ";
        if ( $игры_база_лист[8] == "0" )
        {
            echo "Не завершен";
        }
        if ( $игры_база_лист[8] == "1" )
        {
            echo "<font color=green>Оплачен</font>";
        }
        if ( $игры_база_лист[8] == "2" )
        {
            echo "<font color=orange>В обработке</font>";
        }
        if ( $игры_база_лист[8] == "3" )
        {
            echo "<font color=red>Заблокирован</font>";
        }
        echo "                           </div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>";
        echo $игры_база_лист[5];
        echo "</div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>\r\n                           \t\tПометить как - <a href=\"admin_pay_deposit.php?mode=status_pending&id=";
        echo $игры_база_лист[0];
        echo "\">Ожидающий</a> - <a href=\"admin_pay_deposit.php?mode=status_decline&id=";
        echo $игры_база_лист[0];
        echo "\">Отклоненный</a> - <a href=\"admin_pay_deposit.php?mode=delete&id=";
        echo $игры_база_лист[0];
        echo "\">Удалить</a>\r\n                           </div></td>\r\n                           </tr>\r\n";
    }
    echo "\r\n\r\n                           </TBODY>\r\n                           </TABLE>\r\n                \t\t</TD>\r\n                </TR>\r\n                </TBODY>\r\n           </TABLE>\r\n         </TD>\r\n         </TR></TBODY></TABLE></TD>\r\n     <TD><IMG src=\"templates/images/spacer.gif\" width=10></TD></TR>\r\n\r\n\r\n";
}
echo "\r\n";
if ( $режим == "login" && $id != "" && $id_фильтер == true )
{
    echo "\t";
    $имя_пользователя_запрос = mysql_fetch_array( mysql_query( "SELECT * FROM clients WHERE id='".$id."'" ) );
    $имя_пользователя = $имя_пользователя_запрос['login'];
    echo "\r\n     <TD vAlign=top>\r\n       <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" border=0><!--begin top row-->\r\n         <TBODY>\r\n         <TR>\r\n           <TD><IMG height=13\r\n             src=\"templates/images/spacer.gif\"></TD></TR>\r\n         <TR class=printHidden>\r\n           <TD class=bannerline><IMG height=5\r\n             src=\"templates/images/spacer.gif\" width=2></TD></TR><!--end top row-->\r\n         <TR><!--be";
    echo "gin top banner-->\r\n           <TD class=banner height=40><!--add the tab navigation -->\r\n             <TABLE class=printHidden style=\"MARGIN-LEFT: 10px\" cellSpacing=0\r\n             cellPadding=0 width=\"100%\" border=0>\r\n               <TBODY>\r\n               <TR><!--section header-->\r\n                 <TD align=left>\r\n                   <DIV id=container>";
    echo "<S";
    echo "PAN class=pageheader>Финансы > ";
    echo "<S";
    echo "PAN class=subhead>Внесли </SPAN></SPAN><BR><BR>\r\n                   <UL id=nav>\r\n                     <DIV><A href=\"admin_pay_deposit.php?mode=pending\">В ожидании (";
    echo mysql_num_rows( mysql_query( "SELECT * FROM pay_deposits WHERE status='2'" ) );
    echo ")</A>\r\n\t\t\t\t\t <DIV><A href=\"admin_pay_deposit.php?mode=complied\">Оплаченно (";
    echo mysql_num_rows( mysql_query( "SELECT * FROM pay_deposits WHERE status='1'" ) );
    echo ")</A>\r\n\t\t\t\t\t <DIV><A href=\"admin_pay_deposit.php?mode=decline\">Отклонённые (";
    echo mysql_num_rows( mysql_query( "SELECT * FROM pay_deposits WHERE status='3'" ) );
    echo ")</A>\r\n\t\t\t\t\t <DIV><A href=\"admin_pay_deposit.php?mode=error\">Незавершенные (";
    echo mysql_num_rows( mysql_query( "SELECT * FROM pay_deposits WHERE status='0'" ) );
    echo ")</A>\r\n\t\t\t\t\t <DIV><A class=selected href=\"admin_pay_deposit.php?mode=login&id=";
    echo $id;
    echo "\">Все: ";
    echo $имя_пользователя;
    echo " (";
    echo mysql_num_rows( mysql_query( "SELECT * FROM pay_deposits WHERE user='".$имя_пользователя."'" ) );
    echo ")</A>\r\n \t\t\t\t  </UL></DIV></TD></TR></TBODY></TABLE><!--end of tab navigation--></TD></TR><!--end banner -->\r\n         <TR><!--begin main content tables --->\r\n           <TD vAlign=top>\r\n             <TABLE cellSpacing=0 cellPadding=0 width=\"100%\">\r\n               <TBODY>\r\n               <TR>\r\n                 <TD width=10><IMG height=8\r\n                   src=\"templates/images/spacer.gif\"\r\n                 width=10>";
    echo "</TD>\r\n                 <TD>               </TD></TR></TBODY></TABLE>\r\n             ";
    echo "<S";
    echo "TYLE type=text/css>.drag {\r\n \tCURSOR: hand\r\n }\r\n </STYLE>\r\n             <DIV id=dHTMLToolTip\r\n             style=\"Z-INDEX: 1000; LEFT: 0px; VISIBILITY: hidden; WIDTH: 10px; POSITION: absolute; TOP: 0px; HEIGHT: 10px\"></DIV>\r\n           </TD></TR><FORM name=editst action=\"engine.php?form=generalsettings\" method=post>\r\n             <TD class=tableheader>НЕЗАВЕРШЕННЫЕ ДЕПОЗИТЫ ПОЛЬЗОВАТЕЛЕЙ</TD>\r\n         <TR";
    echo ">\r\n           <TD height=\"241\" vAlign=top>\r\n                   <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" bgColor=#cccccc border=0>\r\n                     <TBODY>\r\n                     <TR>\r\n                       <TD>\r\n           \t\t\t\t\t<TABLE cellSpacing=1 cellPadding=3 width=\"100%\" border=0>\r\n                           <TBODY>\r\n                           <TR class=colheader>\r\n\r\n                      ";
    echo "       <TD width=\"5%\"><div align=\"center\">Пользователь</div></TD>\r\n                             <TD width=\"10%\"><div align=\"center\">Тип</div></TD>\r\n                             <TD width=\"5%\"><div align=\"center\">Сумма</div></TD>\r\n                             <TD width=\"5%\"><div align=\"center\">Дата</div></TD>\r\n                             <TD width=\"5%\"><div align=\"center\">Время</div></TD>\r\n                           ";
    echo "  <TD width=\"10%\"><div align=\"center\">Статус</div></TD>\r\n                             <TD width=\"10%\"><div align=\"center\">IP</div></TD>\r\n                             <TD width=\"35%\"><div align=\"center\">Управление</div></TD>\r\n                           </TR>\r\n";
    $депозиты_база_запрос = @mysql_query( "select * from pay_deposits WHERE user='".$имя_пользователя."' ORDER BY id DESC" );
    while ( $игры_база_лист = @mysql_fetch_array( $депозиты_база_запрос ) )
    {
        echo "                             <tr>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center><a href=\"admin_userlist.php?mode=viewuser&id=";
        $id_пользователь_запрос = @mysql_fetch_array( @mysql_query( "SELECT * FROM clients WHERE login='".$игры_база_лист[1]."'" ) );
        echo $id_пользователь_запрос['id'];
        echo "\">";
        echo $игры_база_лист[1];
        echo "</a></div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>\r\n                           ";
        echo $игры_база_лист[6];
        echo $игры_база_лист[7];
        echo "                           </div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>";
        echo $игры_база_лист[2];
        echo "</div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>";
        echo $игры_база_лист[3];
        echo "</div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>";
        echo $игры_база_лист[4];
        echo "</div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>\r\n                           ";
        if ( $игры_база_лист[8] == "0" )
        {
            echo "Не завершен";
        }
        if ( $игры_база_лист[8] == "1" )
        {
            echo "<font color=green>Оплачен</font>";
        }
        if ( $игры_база_лист[8] == "2" )
        {
            echo "<font color=orange>В обработке</font>";
        }
        if ( $игры_база_лист[8] == "3" )
        {
            echo "<font color=red>Заблокирован</font>";
        }
        echo "                           </div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>";
        echo $игры_база_лист[5];
        echo "</div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>\r\n                           \t\tПометить как - <a href=\"admin_pay_deposit.php?mode=status_pending&id=";
        echo $игры_база_лист[0];
        echo "\">Ожидающий</a> - <a href=\"admin_pay_deposit.php?mode=status_decline&id=";
        echo $игры_база_лист[0];
        echo "\">Отклоненный</a> - <a href=\"admin_pay_deposit.php?mode=delete&id=";
        echo $игры_база_лист[0];
        echo "\">Удалить</a>\r\n                           </div></td>\r\n                           </tr>\r\n";
    }
    echo "\r\n\r\n                           </TBODY>\r\n                           </TABLE>\r\n                \t\t</TD>\r\n                </TR>\r\n                </TBODY>\r\n           </TABLE>\r\n         </TD>\r\n         </TR></TBODY></TABLE></TD>\r\n     <TD><IMG src=\"templates/images/spacer.gif\" width=10></TD></TR>\r\n\r\n\r\n";
}
echo "\r\n";
include_once( "templates/admin_footer.php" );
?>
