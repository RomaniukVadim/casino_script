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
    echo "PAN class=subhead>Внесли </SPAN></SPAN><BR><BR>\r\n                   <UL id=nav>\r\n                     <DIV><A href=\"admin_pay_withdrawals.php?mode=pending\">В обработке (";
    echo mysql_num_rows( mysql_query( "SELECT * FROM pay_withdrawals WHERE status='0'" ) );
    echo ")</A>\r\n\t\t\t\t\t <DIV><A href=\"admin_pay_withdrawals.php?mode=complied\">Оплаченно (";
    echo mysql_num_rows( mysql_query( "SELECT * FROM pay_withdrawals WHERE status='1'" ) );
    echo ")</A>\r\n\t\t\t\t\t <DIV><A href=\"admin_pay_withdrawals.php?mode=decline\">Блокированные (";
    echo mysql_num_rows( mysql_query( "SELECT * FROM pay_withdrawals WHERE status='2'" ) );
    echo ")</A>\r\n\t\t\t\t\t <DIV><A class=selected href=\"admin_pay_withdrawals.php\">Все (";
    echo mysql_num_rows( mysql_query( "SELECT * FROM pay_withdrawals" ) );
    echo ")</A>\r\n \t\t\t\t  </UL></DIV></TD></TR></TBODY></TABLE><!--end of tab navigation--></TD></TR><!--end banner -->\r\n         <TR><!--begin main content tables --->\r\n           <TD vAlign=top>\r\n             <TABLE cellSpacing=0 cellPadding=0 width=\"100%\">\r\n               <TBODY>\r\n               <TR>\r\n                 <TD width=10><IMG height=8\r\n                   src=\"templates/images/spacer.gif\"\r\n                 width=10>";
    echo "</TD>\r\n                 <TD>               </TD></TR></TBODY></TABLE>\r\n             ";
    echo "<S";
    echo "TYLE type=text/css>.drag {\r\n \tCURSOR: hand\r\n }\r\n </STYLE>\r\n             <DIV id=dHTMLToolTip\r\n             style=\"Z-INDEX: 1000; LEFT: 0px; VISIBILITY: hidden; WIDTH: 10px; POSITION: absolute; TOP: 0px; HEIGHT: 10px\"></DIV>\r\n           </TD></TR><FORM name=editst action=\"engine.php?form=generalsettings\" method=post>\r\n             <TD class=tableheader>ВЫПЛАТЫ ПОЛЬЗОВАТЕЛЯМ</TD>\r\n         <TR>\r\n           <T";
    echo "D height=\"241\" vAlign=top>\r\n                   <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" bgColor=#cccccc border=0>\r\n                     <TBODY>\r\n                     <TR>\r\n                       <TD>\r\n           \t\t\t\t\t<TABLE cellSpacing=1 cellPadding=3 width=\"100%\" border=0>\r\n                           <TBODY>\r\n\r\n                           <TR class=colheader>\r\n\r\n                             <TD wid";
    echo "th=\"5%\"><div align=\"center\">Пользователь</div></TD>\r\n<!--                             <TD width=\"5%\"><div align=\"center\">Внёс/Снял</div></TD> -->\r\n                             <TD width=\"5%\"><div align=\"center\">Тип</div></TD>\r\n                             <TD width=\"5%\"><div align=\"center\">Сумма</div></TD>\r\n                             <TD width=\"10%\"><div align=\"center\">Дата</div></TD>\r\n                             ";
    echo "<TD width=\"10%\"><div align=\"center\">Время</div></TD>\r\n                             <TD width=\"10%\"><div align=\"center\">Статус</div></TD>\r\n                             <TD width=\"20%\"><div align=\"center\">История</div></TD>\r\n                             <TD width=\"25%\"><div align=\"center\">Управление</div></TD>\r\n                           </TR>\r\n";
    $платежи_база_запрос = @mysql_query( "select * from pay_withdrawals ORDER BY id DESC" );
    while ( $игры_база_лист = @mysql_fetch_array( $платежи_база_запрос ) )
    {
        echo "                             <tr>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center><a href=\"admin_userlist.php?mode=viewuser&id=";
        $id_пользователь_запрос = @mysql_fetch_array( @mysql_query( "SELECT * FROM clients WHERE login='".$игры_база_лист[1]."'" ) );
        echo $id_пользователь_запрос['id'];
        echo "\">";
        echo $игры_база_лист[1];
        echo "</a></div></td>\r\n<!--                           <td class=\"tabledata\" vAlign=middle><div align=center>ццц</div></td> -->\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>\r\n                           ";
        echo $игры_база_лист[5];
        echo "                           </div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>";
        echo $игры_база_лист[2];
        echo "</div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>";
        echo $игры_база_лист[3];
        echo "</div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>";
        echo $игры_база_лист[4];
        echo "</div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>\r\n                           ";
        if ( $игры_база_лист[7] == "0" )
        {
            echo "В обработке";
        }
        if ( $игры_база_лист[7] == "1" )
        {
            echo "<font color=green>Оплачен</font>";
        }
        if ( $игры_база_лист[7] == "2" )
        {
            echo "<font color=red>Заблокирован</font>";
        }
        echo "                           </div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>\r\n                           <a href=\"admin_statistic_history.php?mode=login&id=";
        echo $id_пользователь_запрос['id'];
        echo "\">\r\n\t\t\t\t\t\t\t\tДеньги:";
        echo mysql_num_rows( @mysql_query( "SELECT * FROM games_stats WHERE login='".$игры_база_лист[1]."' and mode='real'" ) );
        echo " -\r\n\t\t\t\t\t\t\t\tФаны:";
        echo mysql_num_rows( @mysql_query( "SELECT * FROM games_stats WHERE login='".$игры_база_лист[1]."' and mode='fun'" ) );
        echo "\t\t\t\t\t\t   </a><br>\r\n\t\t\t\t\t\t\t";
        $number_deposit = @mysql_num_rows( @mysql_query( "select * from pay_deposits where user='".$игры_база_лист[1]."'" ) );
        echo "\t\t\t\t\t\t\tДепозитов: ";
        echo $number_deposit;
        echo "\r\n\t\t\t\t\t\t   </div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>\r\n                           \t\t";
        if ( $игры_база_лист[7] != "1" )
        {
            echo "                           \t\t\t<a href=\"admin_pay_withdrawals.php?mode=transaction&id=";
            echo $игры_база_лист[0];
            echo "\">Обработать платеж</a>\r\n                           \t\t";
        }
        else
        {
            echo "                           \t\t\tПлатеж обработан\r\n                           \t\t";
        }
        echo "                           \t\t\t- <a href=\"admin_pay_withdrawals.php?mode=status_decline&id=";
        echo $игры_база_лист[0];
        echo "\">Заблокировать</a>\r\n                           </div></td>\r\n                           </tr>\r\n";
    }
    echo "\r\n\r\n                           </TBODY>\r\n                           </TABLE>\r\n                \t\t</TD>\r\n                </TR>\r\n                </TBODY>\r\n           </TABLE>\r\n         </TD>\r\n         </TR></TBODY></TABLE></TD>\r\n     <TD><IMG src=\"templates/images/spacer.gif\" width=10></TD></TR>\r\n\r\n\r\n";
}
echo "\r\n";
if ( $режим == "transaction" && $id != "" && $id_фильтер == true )
{
    $депозиты_база_запрос = @mysql_fetch_array( @mysql_query( "select * from pay_withdrawals where id='".$id."'" ) );
    $desc = "Перевод №:".$депозиты_база_запрос['id'].", на сумму: ".$депозиты_база_запрос['amount'].$депозиты_база_запрос['type'].". Удачи Вам!";
    $desc = htmlspecialchars( $desc );
    echo "\r\n     <TD vAlign=top>\r\n       <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" border=0><!--begin top row-->\r\n         <TBODY>\r\n         <TR>\r\n           <TD><IMG height=13\r\n             src=\"templates/images/spacer.gif\"></TD></TR>\r\n         <TR class=printHidden>\r\n           <TD class=bannerline><IMG height=5\r\n             src=\"templates/images/spacer.gif\" width=2></TD></TR><!--end top row-->\r\n         <TR><!--be";
    echo "gin top banner-->\r\n           <TD class=banner height=40><!--add the tab navigation -->\r\n             <TABLE class=printHidden style=\"MARGIN-LEFT: 10px\" cellSpacing=0\r\n             cellPadding=0 width=\"100%\" border=0>\r\n               <TBODY>\r\n               <TR><!--section header-->\r\n                 <TD align=left>\r\n                   <DIV id=container>";
    echo "<S";
    echo "PAN class=pageheader>Финансы > ";
    echo "<S";
    echo "PAN class=subhead> Выплаты пользователю </SPAN></SPAN><BR><BR>\r\n                   <UL id=nav>\r\n                     <LI><A href=\"admin_pay_withdrawals.php\">Все выплаты</A>\r\n             </LI></UL></DIV></TD></TR></TBODY></TABLE><!--end of tab navigation--></TD></TR><!--end banner -->\r\n         <TR><!--begin main content tables --->\r\n           <TD vAlign=top>\r\n             <TABLE cellSpacing=0 cellPadding=0 width=\"100%";
    echo "\">\r\n               <TBODY>\r\n               <TR>\r\n                 <TD width=10><IMG height=8\r\n                   src=\"templates/images/spacer.gif\"\r\n                 width=10></TD>\r\n                 <TD>               </TD></TR></TBODY></TABLE>\r\n             ";
    echo "<S";
    echo "TYLE type=text/css>.drag {\r\n \tCURSOR: hand\r\n }\r\n </STYLE>\r\n             <DIV id=dHTMLToolTip\r\n             style=\"Z-INDEX: 1000; LEFT: 0px; VISIBILITY: hidden; WIDTH: 10px; POSITION: absolute; TOP: 0px; HEIGHT: 10px\"></DIV>\r\n           </TD></TR>\r\n             <TD class=tableheader>ВЫВОД СРЕДСТВ: <a href=\"";
    echo $_SERVER['HTTP_REFERER'];
    echo "\">ВЕРНУТСЯ НАЗАД</a></TD>\r\n         <TR>\r\n           <TD height=\"241\" vAlign=top>\r\n                           <form method=\"post\" action=\"admin_pay_withdrawals.php?mode=status_ok&id=";
    echo $депозиты_база_запрос['id'];
    echo "\">\r\n           \t\t\t\t   <TABLE class=editTable cellSpacing=0 cellPadding=5 border=0>\r\n                           <TBODY>\r\n                       \t   <TR>\r\n                             <TD class=colheader colSpan=4>Данные перевода</TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>Номер заказа:</TD>\r\n                             <TD class=t";
    echo "abledata colSpan=3>";
    echo $депозиты_база_запрос['id'];
    echo "</TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>Логин:</TD>\r\n                             <TD class=tabledata colSpan=3>";
    echo $депозиты_база_запрос['user'];
    echo "</TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>Платежная система:</TD>\r\n                             <TD class=tabledata colSpan=3>";
    if ( $депозиты_база_запрос['type'] == "WMR" )
    {
        echo "WebMoney";
    }
    if ( $депозиты_база_запрос['type'] == "WMZ" )
    {
        echo "WebMoney";
    }
    if ( $депозиты_база_запрос['type'] == "WME" )
    {
        echo "WebMoney";
    }
    if ( $депозиты_база_запрос['type'] == "WMU" )
    {
        echo "WebMoney";
    }
    echo "                             </TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD width=\"50%\" class=tabledata>Кошелёк:</TD>\r\n                             <TD class=tabledata colSpan=3>";
    if ( $депозиты_база_запрос['type'] == "WMR" )
    {
        echo $депозиты_база_запрос['type_purse'];
    }
    if ( $депозиты_база_запрос['type'] == "WMZ" )
    {
        echo $депозиты_база_запрос['type_purse'];
    }
    if ( $депозиты_база_запрос['type'] == "WME" )
    {
        echo $депозиты_база_запрос['type_purse'];
    }
    if ( $депозиты_база_запрос['type'] == "WMU" )
    {
        echo $депозиты_база_запрос['type_purse'];
    }
    echo "</TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD width=\"50%\" class=tabledata>Денег к выводу:</TD>\r\n                             <TD class=tabledata colSpan=3>";
    echo $депозиты_база_запрос['amount'];
    echo "                             ";
    if ( $депозиты_база_запрос['type'] == "WMR" )
    {
        echo " рублей";
    }
    if ( $депозиты_база_запрос['type'] == "WMZ" )
    {
        echo " долларов";
    }
    if ( $депозиты_база_запрос['type'] == "WME" )
    {
        echo " евро";
    }
    if ( $депозиты_база_запрос['type'] == "WMU" )
    {
        echo " гривен";
    }
    echo "                             </TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD width=\"50%\" class=tabledata>Ссылка на оплату:</TD>\r\n                             <TD class=tabledata colSpan=3><a style=\"color:#FF0000;\" href=\"wmk:payto?Purse=";
    if ( $депозиты_база_запрос['type'] == "WMR" )
    {
        echo $депозиты_база_запрос['type_purse'];
    }
    if ( $депозиты_база_запрос['type'] == "WMZ" )
    {
        echo $депозиты_база_запрос['type_purse'];
    }
    if ( $депозиты_база_запрос['type'] == "WME" )
    {
        echo $депозиты_база_запрос['type_purse'];
    }
    if ( $депозиты_база_запрос['type'] == "WMU" )
    {
        echo $депозиты_база_запрос['type_purse'];
    }
    echo "&Amount=";
    echo $депозиты_база_запрос['amount'];
    echo "&Desc=";
    echo $desc;
    echo "&BringToFront=Y\">Зачислить деньги на ";
    echo $депозиты_база_запрос['type'];
    echo " кошелек</a></TD>\r\n                           </TR>\r\n                             <TD height=\"47\" colSpan=3 class=control><INPUT type=submit value=\"Подтвердить оплату\" name=Submit> ";
    if ( $error != "" )
    {
        echo "<font color=red>".$error."</font>";
    }
    echo " </form>                            </TD>\r\n                             <TD class=tabledata>&nbsp;</TD></TR></TBODY></TABLE>\r\n                           </form>\r\n         </TD>\r\n         </TR></TBODY></TABLE></TD>\r\n     <TD><IMG src=\"templates/images/spacer.gif\" width=10></TD></TR>\r\n\r\n\r\n";
}
echo "\r\n";
if ( $режим == "pending" )
{
    echo "\r\n     <TD vAlign=top>\r\n       <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" border=0><!--begin top row-->\r\n         <TBODY>\r\n         <TR>\r\n           <TD><IMG height=13\r\n             src=\"templates/images/spacer.gif\"></TD></TR>\r\n         <TR class=printHidden>\r\n           <TD class=bannerline><IMG height=5\r\n             src=\"templates/images/spacer.gif\" width=2></TD></TR><!--end top row-->\r\n         <TR><!--be";
    echo "gin top banner-->\r\n           <TD class=banner height=40><!--add the tab navigation -->\r\n             <TABLE class=printHidden style=\"MARGIN-LEFT: 10px\" cellSpacing=0\r\n             cellPadding=0 width=\"100%\" border=0>\r\n               <TBODY>\r\n               <TR><!--section header-->\r\n                 <TD align=left>\r\n                   <DIV id=container>";
    echo "<S";
    echo "PAN class=pageheader>Финансы > ";
    echo "<S";
    echo "PAN class=subhead>Внесли </SPAN></SPAN><BR><BR>\r\n                   <UL id=nav>\r\n                     <DIV><A class=selected href=\"admin_pay_withdrawals.php?mode=pending\">В обработке (";
    echo mysql_num_rows( mysql_query( "SELECT * FROM pay_withdrawals WHERE status='0'" ) );
    echo ")</A>\r\n\t\t\t\t\t <DIV><A href=\"admin_pay_withdrawals.php?mode=complied\">Оплаченно (";
    echo mysql_num_rows( mysql_query( "SELECT * FROM pay_withdrawals WHERE status='1'" ) );
    echo ")</A>\r\n\t\t\t\t\t <DIV><A href=\"admin_pay_withdrawals.php?mode=decline\">Блокированные (";
    echo mysql_num_rows( mysql_query( "SELECT * FROM pay_withdrawals WHERE status='2'" ) );
    echo ")</A>\r\n\t\t\t\t\t <DIV><A href=\"admin_pay_withdrawals.php\">Все (";
    echo mysql_num_rows( mysql_query( "SELECT * FROM pay_withdrawals" ) );
    echo ")</A>\r\n \t\t\t\t  </UL></DIV></TD></TR></TBODY></TABLE><!--end of tab navigation--></TD></TR><!--end banner -->\r\n         <TR><!--begin main content tables --->\r\n           <TD vAlign=top>\r\n             <TABLE cellSpacing=0 cellPadding=0 width=\"100%\">\r\n               <TBODY>\r\n               <TR>\r\n                 <TD width=10><IMG height=8\r\n                   src=\"templates/images/spacer.gif\"\r\n                 width=10>";
    echo "</TD>\r\n                 <TD>               </TD></TR></TBODY></TABLE>\r\n             ";
    echo "<S";
    echo "TYLE type=text/css>.drag {\r\n \tCURSOR: hand\r\n }\r\n </STYLE>\r\n             <DIV id=dHTMLToolTip\r\n             style=\"Z-INDEX: 1000; LEFT: 0px; VISIBILITY: hidden; WIDTH: 10px; POSITION: absolute; TOP: 0px; HEIGHT: 10px\"></DIV>\r\n           </TD></TR><FORM name=editst action=\"engine.php?form=generalsettings\" method=post>\r\n             <TD class=tableheader>ВЫПЛАТЫ ПОЛЬЗОВАТЕЛЯМ</TD>\r\n         <TR>\r\n           <T";
    echo "D height=\"241\" vAlign=top>\r\n                   <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" bgColor=#cccccc border=0>\r\n                     <TBODY>\r\n                     <TR>\r\n                       <TD>\r\n           \t\t\t\t\t<TABLE cellSpacing=1 cellPadding=3 width=\"100%\" border=0>\r\n                           <TBODY>\r\n                           <TR class=colheader>\r\n\r\n                             <TD width";
    echo "=\"5%\"><div align=\"center\">Пользователь</div></TD>\r\n                             <TD width=\"5%\"><div align=\"center\">Тип</div></TD>\r\n                             <TD width=\"5%\"><div align=\"center\">Сумма</div></TD>\r\n                             <TD width=\"10%\"><div align=\"center\">Дата</div></TD>\r\n                             <TD width=\"10%\"><div align=\"center\">Время</div></TD>\r\n                             <TD width=\"10";
    echo "%\"><div align=\"center\">Статус</div></TD>\r\n                             <TD width=\"35%\"><div align=\"center\">Управление</div></TD>\r\n                           </TR>\r\n";
    $платежи_база_запрос = @mysql_query( "select * from pay_withdrawals where status='0' ORDER BY id DESC" );
    while ( $игры_база_лист = @mysql_fetch_array( $платежи_база_запрос ) )
    {
        echo "                             <tr>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center><a href=\"admin_userlist.php?mode=viewuser&id=";
        $id_пользователь_запрос = @mysql_fetch_array( @mysql_query( "SELECT * FROM clients WHERE login='".$игры_база_лист[1]."'" ) );
        echo $id_пользователь_запрос['id'];
        echo "\">";
        echo $игры_база_лист[1];
        echo "</a></div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>\r\n                           ";
        echo $игры_база_лист[5];
        echo "                           </div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>";
        echo $игры_база_лист[2];
        echo "</div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>";
        echo $игры_база_лист[3];
        echo "</div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>";
        echo $игры_база_лист[4];
        echo "</div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>\r\n                           ";
        if ( $игры_база_лист[7] == "0" )
        {
            echo "В обработке";
        }
        if ( $игры_база_лист[7] == "1" )
        {
            echo "<font color=green>Оплачен</font>";
        }
        if ( $игры_база_лист[7] == "2" )
        {
            echo "<font color=red>Заблокирован</font>";
        }
        echo "                           </div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>\r\n                           \t\t";
        if ( $игры_база_лист[7] != "1" )
        {
            echo "                           \t\t\t<a href=\"admin_pay_withdrawals.php?mode=transaction&id=";
            echo $игры_база_лист[0];
            echo "\">Обработать платеж</a>\r\n                           \t\t";
        }
        else
        {
            echo "                           \t\t\tПлатеж обработан\r\n                           \t\t";
        }
        echo "                           \t\t\t- <a href=\"admin_pay_withdrawals.php?mode=status_decline&id=";
        echo $игры_база_лист[0];
        echo "\">Заблокировать</a>\r\n                           </div></td>\r\n                           </tr>\r\n";
    }
    echo "\r\n\r\n                           </TBODY>\r\n                           </TABLE>\r\n                \t\t</TD>\r\n                </TR>\r\n                </TBODY>\r\n           </TABLE>\r\n         </TD>\r\n         </TR></TBODY></TABLE></TD>\r\n     <TD><IMG src=\"templates/images/spacer.gif\" width=10></TD></TR>\r\n\r\n";
}
echo "\r\n";
if ( $режим == "complied" )
{
    echo "\r\n     <TD vAlign=top>\r\n       <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" border=0><!--begin top row-->\r\n         <TBODY>\r\n         <TR>\r\n           <TD><IMG height=13\r\n             src=\"templates/images/spacer.gif\"></TD></TR>\r\n         <TR class=printHidden>\r\n           <TD class=bannerline><IMG height=5\r\n             src=\"templates/images/spacer.gif\" width=2></TD></TR><!--end top row-->\r\n         <TR><!--be";
    echo "gin top banner-->\r\n           <TD class=banner height=40><!--add the tab navigation -->\r\n             <TABLE class=printHidden style=\"MARGIN-LEFT: 10px\" cellSpacing=0\r\n             cellPadding=0 width=\"100%\" border=0>\r\n               <TBODY>\r\n               <TR><!--section header-->\r\n                 <TD align=left>\r\n                   <DIV id=container>";
    echo "<S";
    echo "PAN class=pageheader>Финансы > ";
    echo "<S";
    echo "PAN class=subhead>Внесли </SPAN></SPAN><BR><BR>\r\n                   <UL id=nav>\r\n                     <DIV><A href=\"admin_pay_withdrawals.php?mode=pending\">В обработке (";
    echo mysql_num_rows( mysql_query( "SELECT * FROM pay_withdrawals WHERE status='0'" ) );
    echo ")</A>\r\n\t\t\t\t\t <DIV><A class=selected href=\"admin_pay_withdrawals.php?mode=complied\">Оплаченно (";
    echo mysql_num_rows( mysql_query( "SELECT * FROM pay_withdrawals WHERE status='1'" ) );
    echo ")</A>\r\n\t\t\t\t\t <DIV><A href=\"admin_pay_withdrawals.php?mode=decline\">Блокированные (";
    echo mysql_num_rows( mysql_query( "SELECT * FROM pay_withdrawals WHERE status='2'" ) );
    echo ")</A>\r\n\t\t\t\t\t <DIV><A href=\"admin_pay_withdrawals.php\">Все (";
    echo mysql_num_rows( mysql_query( "SELECT * FROM pay_withdrawals" ) );
    echo ")</A>\r\n \t\t\t\t  </UL></DIV></TD></TR></TBODY></TABLE><!--end of tab navigation--></TD></TR><!--end banner -->\r\n         <TR><!--begin main content tables --->\r\n           <TD vAlign=top>\r\n             <TABLE cellSpacing=0 cellPadding=0 width=\"100%\">\r\n               <TBODY>\r\n               <TR>\r\n                 <TD width=10><IMG height=8\r\n                   src=\"templates/images/spacer.gif\"\r\n                 width=10>";
    echo "</TD>\r\n                 <TD>               </TD></TR></TBODY></TABLE>\r\n             ";
    echo "<S";
    echo "TYLE type=text/css>.drag {\r\n \tCURSOR: hand\r\n }\r\n </STYLE>\r\n             <DIV id=dHTMLToolTip\r\n             style=\"Z-INDEX: 1000; LEFT: 0px; VISIBILITY: hidden; WIDTH: 10px; POSITION: absolute; TOP: 0px; HEIGHT: 10px\"></DIV>\r\n           </TD></TR><FORM name=editst action=\"engine.php?form=generalsettings\" method=post>\r\n             <TD class=tableheader>ВЫПЛАТЫ ПОЛЬЗОВАТЕЛЯМ</TD>\r\n         <TR>\r\n           <T";
    echo "D height=\"241\" vAlign=top>\r\n                   <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" bgColor=#cccccc border=0>\r\n                     <TBODY>\r\n                     <TR>\r\n                       <TD>\r\n           \t\t\t\t\t<TABLE cellSpacing=1 cellPadding=3 width=\"100%\" border=0>\r\n                           <TBODY>\r\n                           <TR class=colheader>\r\n\r\n                             <TD width";
    echo "=\"5%\"><div align=\"center\">Пользователь</div></TD>\r\n                             <TD width=\"5%\"><div align=\"center\">Тип</div></TD>\r\n                             <TD width=\"5%\"><div align=\"center\">Сумма</div></TD>\r\n                             <TD width=\"10%\"><div align=\"center\">Дата</div></TD>\r\n                             <TD width=\"10%\"><div align=\"center\">Время</div></TD>\r\n                             <TD width=\"10";
    echo "%\"><div align=\"center\">Статус</div></TD>\r\n                             <TD width=\"35%\"><div align=\"center\">Управление</div></TD>\r\n                           </TR>\r\n";
    $платежи_база_запрос = @mysql_query( "select * from pay_withdrawals where status='1' ORDER BY id DESC" );
    while ( $игры_база_лист = @mysql_fetch_array( $платежи_база_запрос ) )
    {
        echo "                             <tr>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center><a href=\"admin_userlist.php?mode=viewuser&id=";
        $id_пользователь_запрос = @mysql_fetch_array( @mysql_query( "SELECT * FROM clients WHERE login='".$игры_база_лист[1]."'" ) );
        echo $id_пользователь_запрос['id'];
        echo "\">";
        echo $игры_база_лист[1];
        echo "</a></div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>\r\n                           ";
        echo $игры_база_лист[5];
        echo "                           </div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>";
        echo $игры_база_лист[2];
        echo "</div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>";
        echo $игры_база_лист[3];
        echo "</div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>";
        echo $игры_база_лист[4];
        echo "</div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>\r\n                           ";
        if ( $игры_база_лист[7] == "0" )
        {
            echo "В обработке";
        }
        if ( $игры_база_лист[7] == "1" )
        {
            echo "<font color=green>Оплачен</font>";
        }
        if ( $игры_база_лист[7] == "2" )
        {
            echo "<font color=red>Заблокирован</font>";
        }
        echo "                           </div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>\r\n                           \t\t";
        if ( $игры_база_лист[7] != "1" )
        {
            echo "                           \t\t\t<a href=\"admin_pay_withdrawals.php?mode=transaction&id=";
            echo $игры_база_лист[0];
            echo "\">Обработать платеж</a>\r\n                           \t\t";
        }
        else
        {
            echo "                           \t\t\tПлатеж обработан\r\n                           \t\t";
        }
        echo "                           \t\t\t- <a href=\"admin_pay_withdrawals.php?mode=status_decline&id=";
        echo $игры_база_лист[0];
        echo "\">Заблокировать</a>\r\n                           </div></td>\r\n                           </tr>\r\n";
    }
    echo "\r\n\r\n                           </TBODY>\r\n                           </TABLE>\r\n                \t\t</TD>\r\n                </TR>\r\n                </TBODY>\r\n           </TABLE>\r\n         </TD>\r\n         </TR></TBODY></TABLE></TD>\r\n     <TD><IMG src=\"templates/images/spacer.gif\" width=10></TD></TR>\r\n\r\n";
}
echo "\r\n";
if ( $режим == "decline" )
{
    echo "\r\n     <TD vAlign=top>\r\n       <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" border=0><!--begin top row-->\r\n         <TBODY>\r\n         <TR>\r\n           <TD><IMG height=13\r\n             src=\"templates/images/spacer.gif\"></TD></TR>\r\n         <TR class=printHidden>\r\n           <TD class=bannerline><IMG height=5\r\n             src=\"templates/images/spacer.gif\" width=2></TD></TR><!--end top row-->\r\n         <TR><!--be";
    echo "gin top banner-->\r\n           <TD class=banner height=40><!--add the tab navigation -->\r\n             <TABLE class=printHidden style=\"MARGIN-LEFT: 10px\" cellSpacing=0\r\n             cellPadding=0 width=\"100%\" border=0>\r\n               <TBODY>\r\n               <TR><!--section header-->\r\n                 <TD align=left>\r\n                   <DIV id=container>";
    echo "<S";
    echo "PAN class=pageheader>Финансы > ";
    echo "<S";
    echo "PAN class=subhead>Внесли </SPAN></SPAN><BR><BR>\r\n                   <UL id=nav>\r\n                     <DIV><A href=\"admin_pay_withdrawals.php?mode=pending\">В обработке (";
    echo mysql_num_rows( mysql_query( "SELECT * FROM pay_withdrawals WHERE status='0'" ) );
    echo ")</A>\r\n\t\t\t\t\t <DIV><A href=\"admin_pay_withdrawals.php?mode=complied\">Оплаченно (";
    echo mysql_num_rows( mysql_query( "SELECT * FROM pay_withdrawals WHERE status='1'" ) );
    echo ")</A>\r\n\t\t\t\t\t <DIV><A class=selected href=\"admin_pay_withdrawals.php?mode=decline\">Блокированные (";
    echo mysql_num_rows( mysql_query( "SELECT * FROM pay_withdrawals WHERE status='2'" ) );
    echo ")</A>\r\n\t\t\t\t\t <DIV><A href=\"admin_pay_withdrawals.php\">Все (";
    echo mysql_num_rows( mysql_query( "SELECT * FROM pay_withdrawals" ) );
    echo ")</A>\r\n \t\t\t\t  </UL></DIV></TD></TR></TBODY></TABLE><!--end of tab navigation--></TD></TR><!--end banner -->\r\n         <TR><!--begin main content tables --->\r\n           <TD vAlign=top>\r\n             <TABLE cellSpacing=0 cellPadding=0 width=\"100%\">\r\n               <TBODY>\r\n               <TR>\r\n                 <TD width=10><IMG height=8\r\n                   src=\"templates/images/spacer.gif\"\r\n                 width=10>";
    echo "</TD>\r\n                 <TD>               </TD></TR></TBODY></TABLE>\r\n             ";
    echo "<S";
    echo "TYLE type=text/css>.drag {\r\n \tCURSOR: hand\r\n }\r\n </STYLE>\r\n             <DIV id=dHTMLToolTip\r\n             style=\"Z-INDEX: 1000; LEFT: 0px; VISIBILITY: hidden; WIDTH: 10px; POSITION: absolute; TOP: 0px; HEIGHT: 10px\"></DIV>\r\n           </TD></TR><FORM name=editst action=\"engine.php?form=generalsettings\" method=post>\r\n             <TD class=tableheader>ВЫПЛАТЫ ПОЛЬЗОВАТЕЛЯМ</TD>\r\n         <TR>\r\n           <T";
    echo "D height=\"241\" vAlign=top>\r\n                   <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" bgColor=#cccccc border=0>\r\n                     <TBODY>\r\n                     <TR>\r\n                       <TD>\r\n           \t\t\t\t\t<TABLE cellSpacing=1 cellPadding=3 width=\"100%\" border=0>\r\n                           <TBODY>\r\n                           <TR class=colheaderIT>\r\n                           <TD colspan";
    echo "=8>Модули</TD>\r\n                           </TR>\r\n                           <TR class=colheader>\r\n\r\n                             <TD width=\"5%\"><div align=\"center\">Пользователь</div></TD>\r\n                             <TD width=\"5%\"><div align=\"center\">Тип</div></TD>\r\n                             <TD width=\"5%\"><div align=\"center\">Сумма</div></TD>\r\n                             <TD width=\"10%\"><div align=\"center\">";
    echo "Дата</div></TD>\r\n                             <TD width=\"10%\"><div align=\"center\">Время</div></TD>\r\n                             <TD width=\"10%\"><div align=\"center\">Статус</div></TD>\r\n                             <TD width=\"35%\"><div align=\"center\">Управление</div></TD>\r\n                           </TR>\r\n";
    $платежи_база_запрос = @mysql_query( "select * from pay_withdrawals where status='2' ORDER BY id DESC" );
    while ( $игры_база_лист = @mysql_fetch_array( $платежи_база_запрос ) )
    {
        echo "                             <tr>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center><a href=\"admin_userlist.php?mode=viewuser&id=";
        $id_пользователь_запрос = @mysql_fetch_array( @mysql_query( "SELECT * FROM clients WHERE login='".$игры_база_лист[1]."'" ) );
        echo $id_пользователь_запрос['id'];
        echo "\">";
        echo $игры_база_лист[1];
        echo "</a></div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>\r\n                           ";
        echo $игры_база_лист[5];
        echo "                           </div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>";
        echo $игры_база_лист[2];
        echo "</div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>";
        echo $игры_база_лист[3];
        echo "</div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>";
        echo $игры_база_лист[4];
        echo "</div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>\r\n                           ";
        if ( $игры_база_лист[7] == "0" )
        {
            echo "В обработке";
        }
        if ( $игры_база_лист[7] == "1" )
        {
            echo "<font color=green>Оплачен</font>";
        }
        if ( $игры_база_лист[7] == "2" )
        {
            echo "<font color=red>Заблокирован</font>";
        }
        echo "                           </div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>\r\n                           \t\t";
        if ( $игры_база_лист[7] != "1" )
        {
            echo "                           \t\t\t<a href=\"admin_pay_withdrawals.php?mode=transaction&id=";
            echo $игры_база_лист[0];
            echo "\">Обработать платеж</a>\r\n                           \t\t";
        }
        else
        {
            echo "                           \t\t\tПлатеж обработан\r\n                           \t\t";
        }
        echo "                           \t\t\t- <a href=\"admin_pay_withdrawals.php?mode=status_decline&id=";
        echo $игры_база_лист[0];
        echo "\">Заблокировать</a>\r\n                           </div></td>\r\n                           </tr>\r\n";
    }
    echo "\r\n\r\n                           </TBODY>\r\n                           </TABLE>\r\n                \t\t</TD>\r\n                </TR>\r\n                </TBODY>\r\n           </TABLE>\r\n         </TD>\r\n         </TR></TBODY></TABLE></TD>\r\n     <TD><IMG src=\"templates/images/spacer.gif\" width=10></TD></TR>\r\n\r\n";
}
echo "\r\n";
if ( $режим == "login" && $id != "" && $id_фильтер == true )
{
    $имя_пользователя_запрос = mysql_fetch_array( mysql_query( "SELECT * FROM clients WHERE id='".$id."'" ) );
    $имя_пользователя = $имя_пользователя_запрос['login'];
    echo "     <TD vAlign=top>\r\n       <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" border=0><!--begin top row-->\r\n         <TBODY>\r\n         <TR>\r\n           <TD><IMG height=13\r\n             src=\"templates/images/spacer.gif\"></TD></TR>\r\n         <TR class=printHidden>\r\n           <TD class=bannerline><IMG height=5\r\n             src=\"templates/images/spacer.gif\" width=2></TD></TR><!--end top row-->\r\n         <TR><!--begi";
    echo "n top banner-->\r\n           <TD class=banner height=40><!--add the tab navigation -->\r\n             <TABLE class=printHidden style=\"MARGIN-LEFT: 10px\" cellSpacing=0\r\n             cellPadding=0 width=\"100%\" border=0>\r\n               <TBODY>\r\n               <TR><!--section header-->\r\n                 <TD align=left>\r\n                   <DIV id=container>";
    echo "<S";
    echo "PAN class=pageheader>Финансы > ";
    echo "<S";
    echo "PAN class=subhead>Внесли </SPAN></SPAN><BR><BR>\r\n                   <UL id=nav>\r\n                     <DIV><A href=\"admin_pay_withdrawals.php?mode=pending\">В обработке (";
    echo mysql_num_rows( mysql_query( "SELECT * FROM pay_withdrawals WHERE status='0'" ) );
    echo ")</A>\r\n\t\t\t\t\t <DIV><A href=\"admin_pay_withdrawals.php?mode=complied\">Оплаченно (";
    echo mysql_num_rows( mysql_query( "SELECT * FROM pay_withdrawals WHERE status='1'" ) );
    echo ")</A>\r\n\t\t\t\t\t <DIV><A href=\"admin_pay_withdrawals.php?mode=decline\">Блокированные (";
    echo mysql_num_rows( mysql_query( "SELECT * FROM pay_withdrawals WHERE status='2'" ) );
    echo ")</A>\r\n\t\t\t\t\t <DIV><A href=\"admin_pay_withdrawals.php\">Все (";
    echo mysql_num_rows( mysql_query( "SELECT * FROM pay_withdrawals" ) );
    echo ")</A>\r\n\t\t\t\t\t <LI><A class=selected href=\"admin_pay_withdrawals.php?mode=login&id=";
    echo $id;
    echo "\">Все: ";
    echo $имя_пользователя;
    echo " (";
    echo mysql_num_rows( mysql_query( "SELECT * FROM pay_withdrawals WHERE user='".$имя_пользователя."'" ) );
    echo ")</A>\r\n \t\t\t\t  </UL></DIV></TD></TR></TBODY></TABLE><!--end of tab navigation--></TD></TR><!--end banner -->\r\n         <TR><!--begin main content tables --->\r\n           <TD vAlign=top>\r\n             <TABLE cellSpacing=0 cellPadding=0 width=\"100%\">\r\n               <TBODY>\r\n               <TR>\r\n                 <TD width=10><IMG height=8\r\n                   src=\"templates/images/spacer.gif\"\r\n                 width=10>";
    echo "</TD>\r\n                 <TD>               </TD></TR></TBODY></TABLE>\r\n             ";
    echo "<S";
    echo "TYLE type=text/css>.drag {\r\n \tCURSOR: hand\r\n }\r\n </STYLE>\r\n             <DIV id=dHTMLToolTip\r\n             style=\"Z-INDEX: 1000; LEFT: 0px; VISIBILITY: hidden; WIDTH: 10px; POSITION: absolute; TOP: 0px; HEIGHT: 10px\"></DIV>\r\n           </TD></TR><FORM name=editst action=\"engine.php?form=generalsettings\" method=post>\r\n             <TD class=tableheader>ВЫПЛАТЫ ПОЛЬЗОВАТЕЛЯМ</TD>\r\n         <TR>\r\n           <T";
    echo "D height=\"241\" vAlign=top>\r\n                   <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" bgColor=#cccccc border=0>\r\n                     <TBODY>\r\n                     <TR>\r\n                       <TD>\r\n           \t\t\t\t\t<TABLE cellSpacing=1 cellPadding=3 width=\"100%\" border=0>\r\n                           <TBODY>\r\n                           <TR class=colheader>\r\n\r\n                             <TD width";
    echo "=\"5%\"><div align=\"center\">Пользователь</div></TD>\r\n                             <TD width=\"5%\"><div align=\"center\">Тип</div></TD>\r\n                             <TD width=\"5%\"><div align=\"center\">Сумма</div></TD>\r\n                             <TD width=\"10%\"><div align=\"center\">Дата</div></TD>\r\n                             <TD width=\"10%\"><div align=\"center\">Время</div></TD>\r\n                             <TD width=\"10";
    echo "%\"><div align=\"center\">Статус</div></TD>\r\n                             <TD width=\"35%\"><div align=\"center\">Управление</div></TD>\r\n                           </TR>\r\n";
    $платежи_база_запрос = @mysql_query( "select * from pay_withdrawals where user='".$имя_пользователя."' ORDER BY id DESC" );
    while ( $игры_база_лист = @mysql_fetch_array( $платежи_база_запрос ) )
    {
        echo "                             <tr>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center><a href=\"admin_userlist.php?mode=viewuser&id=";
        $id_пользователь_запрос = @mysql_fetch_array( @mysql_query( "SELECT * FROM clients WHERE login='".$игры_база_лист[1]."'" ) );
        echo $id_пользователь_запрос['id'];
        echo "\">";
        echo $игры_база_лист[1];
        echo "</a></div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>\r\n                           ";
        echo $игры_база_лист[5];
        echo "                           </div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>";
        echo $игры_база_лист[2];
        echo "</div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>";
        echo $игры_база_лист[3];
        echo "</div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>";
        echo $игры_база_лист[4];
        echo "</div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>\r\n                           ";
        if ( $игры_база_лист[7] == "0" )
        {
            echo "В обработке";
        }
        if ( $игры_база_лист[7] == "1" )
        {
            echo "<font color=green>Оплачен</font>";
        }
        if ( $игры_база_лист[7] == "2" )
        {
            echo "<font color=red>Заблокирован</font>";
        }
        echo "                           </div></td>\r\n                           <td class=\"tabledata\" vAlign=middle><div align=center>\r\n                           \t\t";
        if ( $игры_база_лист[7] != "1" )
        {
            echo "                           \t\t\t<a href=\"admin_pay_withdrawals.php?mode=transaction&id=";
            echo $игры_база_лист[0];
            echo "\">Обработать платеж</a>\r\n                           \t\t";
        }
        else
        {
            echo "                           \t\t\tПлатеж обработан\r\n                           \t\t";
        }
        echo "                           \t\t\t- <a href=\"admin_pay_withdrawals.php?mode=status_decline&id=";
        echo $игры_база_лист[0];
        echo "\">Заблокировать</a>\r\n                           </div></td>\r\n                           </tr>\r\n";
    }
    echo "\r\n\r\n                           </TBODY>\r\n                           </TABLE>\r\n                \t\t</TD>\r\n                </TR>\r\n                </TBODY>\r\n           </TABLE>\r\n         </TD>\r\n         </TR></TBODY></TABLE></TD>\r\n     <TD><IMG src=\"templates/images/spacer.gif\" width=10></TD></TR>\r\n\r\n";
}
echo "\r\n";
include_once( "templates/admin_footer.php" );
?>
