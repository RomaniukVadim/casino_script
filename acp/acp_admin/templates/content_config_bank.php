<?php
//Запрет прямого доступа
defined('CASINOENGINE') or die('Доступ Запрещен');

//Подключение шапки и меню
include_once( "templates/admin_top.php" );
include_once( "templates/admin_menu.php" );

if ($mode == "")
{
    echo "     <TD vAlign=top>\r\n       <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" border=0><!--begin top row-->\r\n         <TBODY>\r\n         <TR>\r\n           <TD><IMG height=13\r\n             src=\"templates/images/spacer.gif\"></TD></TR>\r\n         <TR class=printHidden>\r\n           <TD class=bannerline><IMG height=5\r\n             src=\"templates/images/spacer.gif\" width=2></TD></TR><!--end top row-->\r\n         <TR><!--begi";
    echo "n top banner-->\r\n           <TD class=banner height=40><!--add the tab navigation -->\r\n             <TABLE class=printHidden style=\"MARGIN-LEFT: 10px\" cellSpacing=0\r\n             cellPadding=0 width=\"100%\" border=0>\r\n               <TBODY>\r\n               <TR><!--section header-->\r\n                 <TD align=left>\r\n                   <DIV id=container>";
    echo "<S";
    echo "PAN class=pageheader>Настройки Казино > </span>";
    echo "<S";
    echo "PAN class=subhead><b>Настройки Банков </b>&nbsp;</SPAN><BR><BR>\r\n                   <UL id=nav>\r\n                     <LI><A class=selected href=\"admin_config_bank.php\">Все банки</A>\r\n             </LI></UL></DIV></TD></TR></TBODY></TABLE><!--end of tab navigation--></TD></TR><!--end banner -->\r\n         <TR><!--begin main content tables --->\r\n           <TD vAlign=top>\r\n             <TABLE cellSpacing=0 cellPadding=0 wi";
    echo "dth=\"100%\">\r\n               <TBODY>\r\n               <TR>\r\n                 <TD width=10><IMG height=8\r\n                   src=\"templates/images/spacer.gif\"\r\n                 width=10></TD>\r\n                 <TD>               </TD></TR></TBODY></TABLE>\r\n             ";
    echo "<S";
    echo "TYLE type=text/css>.drag {\r\n \tCURSOR: hand\r\n }\r\n </STYLE>\r\n             <DIV id=dHTMLToolTip\r\n             style=\"Z-INDEX: 1000; LEFT: 0px; VISIBILITY: hidden; WIDTH: 10px; POSITION: absolute; TOP: 0px; HEIGHT: 10px\"></DIV>\r\n           </TD></TR>\r\n             <TD class=tableheader>\r\n             \t<a href=\"admin_config_bank.php?mode=add\" class=\"style3\">Добавить банк</a>\r\n              </TD>\r\n           </TR";
    echo "></TBODY></TABLE>\r\n                   <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" bgColor=#cccccc border=0>\r\n                     <TBODY>\r\n                     <TR>\r\n                       <TD>\r\n                         <TABLE cellSpacing=1 cellPadding=3 width=\"100%\"\r\n border=0>\r\n                           <TBODY>\r\n                           <TR class=colheader>\r\n                             <TD width=\"";
    echo "10%\"><div align=\"center\">Название</div></TD>\r\n                             <TD width=\"7%\"><div align=\"center\">Сумма</div></TD>\r\n                             <TD width=\"5%\"><div align=\"center\">Процент банка</div></TD>\r\n                             <TD width=\"65%\"><div align=\"center\">Подключенные игры</div></TD>\r\n                             <TD width=\"20%\"><div align=\"center\">Управление</div></TD>\r\n                  ";
    echo "         </TR>\r\n ";
    $игры_название = "";
    $игры_банк = "";
    $банк_запрос = @mysql_query( "select * from games_bank ORDER BY id ASC" );
    while ( $банк_лист = @mysql_fetch_array( $банк_запрос ) )
    {
        $процент_джекпота_запрос = @mysql_query( "select * from games ORDER BY id ASC" );
        echo "\r\n                           <TR>\r\n                             <TD class=tabledata vAlign=top><div align=center>{$банк_лист['1']}</div></TD>\r\n                             <TD class=tabledata vAlign=top><div align=center>{$банк_лист['2']}руб.</div></TD>\r\n                             <TD class=tabledata vAlign=top><div align=center>{$банк_лист['3']}%</div></TD>\r\n                             <TD class=tabledata vAlign=top><div align=center>\r\n                             ";
        if ( $банк_лист[0] == "1" )
        {
            $игры_запрос = @mysql_query( "select * from games where id_funbank='{$банк_лист['0']}'" );
            while ( $игры_лист = @mysql_fetch_array( $игры_запрос ) )
            {
                if ( $игры_лист['extended'] == "0" )
                {
                    echo "<a href=\"admin_config_games.php?mode=edit&id=".$игры_лист['id']."\">".$игры_лист['name']."</a>, ";
                }
                else
                {
                    echo "<a href=\"admin_config_games.php?mode=edit_extended&id=".$игры_лист['id']."\">".$игры_лист['name']."</a>, ";
                }
            }
        }
        else
        {
            $игры_запрос = @mysql_query( "select * from games where id_bank='{$банк_лист['0']}'" );
            while ( $игры_лист = @mysql_fetch_array( $игры_запрос ) )
            {
                if ( $игры_лист['extended'] == "0" )
                {
                    echo "<a href=\"admin_config_games.php?mode=edit&id=".$игры_лист['id']."\">".$игры_лист['name']."</a>, ";
                }
                else
                {
                    echo "<a href=\"admin_config_games.php?mode=edit_extended&id=".$игры_лист['id']."\">".$игры_лист['name']."</a>, ";
                }
            }
        }
        echo "</div></TD>\r\n                             <TD class=tabledata vAlign=top>\r\n\t\t\t\t\t\t\t <div align=center>\r\n\t\t\t\t\t\t\t \t<A href=admin_config_bank.php?mode=edit&id={$банк_лист['0']}>Редактировать</A> -\r\n \t\t\t\t\t\t\t \t<a href=admin_config_bank.php?mode=delete&id={$банк_лист['0']}>[X]</a>\r\n\t\t\t\t\t\t\t</div>\r\n\t\t\t\t\t\t\t</TD>\r\n                           </TR>\r\n \t\t\t\t\t\t  ";
    }
    echo "                       </TBODY></TABLE></TD>\r\n                       </TR>\r\n                       <tr><td bgColor=#FFFFFF>\r\n                       <font color=\"red\"><center>Внимание! Суммарный процент 'Банка' и 'Джекпота' суммарно не может быть больше 100%</center></font>\r\n                       </td></tr>\r\n                       </TBODY></TABLE></TD></TR>\r\n\r\n               <TR>\r\n                 <TD colSpan=2 hei";
    echo "ght=10><IMG\r\n                   src=\"templates/images/spacer.gif\"\r\n                 width=1 height=\"1\"></TD>\r\n               </TR>\r\n";
}
echo "\r\n";
if ($mode == "edit" and $id)
{
    $банк_запрос = @mysql_fetch_array( @mysql_query( "select * from games_bank where id='{$id}'" ) );
    echo "\r\n     <TD vAlign=top>\r\n       <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" border=0><!--begin top row-->\r\n         <TBODY>\r\n         <TR>\r\n           <TD><IMG height=13\r\n             src=\"templates/images/spacer.gif\"></TD></TR>\r\n         <TR class=printHidden>\r\n           <TD class=bannerline><IMG height=5\r\n             src=\"templates/images/spacer.gif\" width=2></TD></TR><!--end top row-->\r\n         <TR><!--be";
    echo "gin top banner-->\r\n           <TD class=banner height=40><!--add the tab navigation -->\r\n             <TABLE class=printHidden style=\"MARGIN-LEFT: 10px\" cellSpacing=0\r\n             cellPadding=0 width=\"100%\" border=0>\r\n               <TBODY>\r\n               <TR><!--section header-->\r\n                 <TD align=left>\r\n\t\t\t\t\t<DIV id=container>";
    echo "<S";
    echo "PAN class=pageheader>Настройки Банков &nbsp;";
    echo "<S";
    echo "PAN class=subhead>> Редактировать банк</SPAN></SPAN><BR><BR>\r\n                   <UL id=nav>\r\n                     <LI><A href=\"admin_config_bank.php\">Все банки</A>\r\n             </LI></UL></DIV></TD></TR></TBODY></TABLE><!--end of tab navigation--></TD></TR><!--end banner -->\r\n         <TR><!--begin main content tables --->\r\n           <TD vAlign=top>\r\n             <TABLE cellSpacing=0 cellPadding=0 width=\"100%\">\r\n    ";
    echo "           <TBODY>\r\n               <TR>\r\n                 <TD width=10><IMG height=8\r\n                   src=\"templates/images/spacer.gif\"\r\n                 width=10></TD>\r\n                 <TD>               </TD></TR></TBODY></TABLE>\r\n             ";
    echo "<S";
    echo "TYLE type=text/css>.drag {\r\n \tCURSOR: hand\r\n }\r\n </STYLE>\r\n             <DIV id=dHTMLToolTip\r\n             style=\"Z-INDEX: 1000; LEFT: 0px; VISIBILITY: hidden; WIDTH: 10px; POSITION: absolute; TOP: 0px; HEIGHT: 10px\"></DIV>\r\n           </TD></TR>\r\n             <TD class=tableheader>\r\n             \tБАНКИ: <a href=\"admin_config_bank.php\" class=\"style2\" style=\"color:#FFFFFF;\">ВЕРНУТЬСЯ НАЗАД</a>\r\n           ";
    echo "   </TD>\r\n           </TR></TBODY></TABLE>\r\n \t\t\t\t\t\t   <form method=\"post\" action=\"admin_config_bank.php?mode=edit&id=";
    echo $id;
    echo "\">\r\n           \t\t\t\t   <TABLE class=editTable cellSpacing=0 cellPadding=5 border=0>\r\n                           <TBODY>\r\n                       \t   <TR>\r\n                             <TD class=colheader colSpan=4>Редактирование банка</TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>ID:</TD>\r\n                             <TD class=tabled";
    echo "ata colSpan=3>";
    echo $банк_запрос['id'];
    echo "</TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=colheader colSpan=4>Настройки банка</TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD width=\"50%\" class=tabledata>Название банка:</TD>\r\n                             <TD class=tabledata colSpan=3><INPUT name=name id=\"affilpercentage\" value=\"";
    echo $банк_запрос['name'];
    echo "\" size=50 maxLength=50></TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD width=\"50%\" class=tabledata>В банке денег:</TD>\r\n                             <TD class=tabledata colSpan=3><INPUT name=bank id=\"affilpercentage\" value=\"";
    echo $банк_запрос['bank'];
    echo "\" size=20 maxLength=20>руб. </TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD width=\"50%\" class=tabledata>Процент от каждой ставки игрока в банк:</TD>\r\n                             <TD class=tabledata colSpan=3><INPUT name=proc id=\"affilpercentage\" value=\"";
    echo $банк_запрос['proc'];
    echo "\" size=3 maxLength=3>% </TD>\r\n                           </TR>\r\n\r\n                           <TR>\r\n                             <TD colSpan=4>\r\n                               <HR>                            </TD>\r\n                           <TR>\r\n                             <TD height=\"47\" colSpan=3 class=control><INPUT class=lgbutton type=submit value=\"Обновить\" name=Submit> ";
    if ( $error != "" )
    {
        echo "<font color=red>".$error."</font>";
    }
    echo " </form>                            </TD>\r\n                             <TD class=tabledata>&nbsp;</TD></TR></TBODY></TABLE>\r\n                           </form>\r\n         </TD>\r\n\r\n               <TR>\r\n                 <TD colSpan=2 height=10><IMG\r\n                   src=\"templates/images/spacer.gif\"\r\n                 width=1 height=\"1\"></TD>\r\n               </TR>\r\n\r\n";
}
echo "\r\n\r\n";
if ($mode == "add" )
{
    echo "\r\n     <TD vAlign=top>\r\n       <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" border=0><!--begin top row-->\r\n         <TBODY>\r\n         <TR>\r\n           <TD><IMG height=13\r\n             src=\"templates/images/spacer.gif\"></TD></TR>\r\n         <TR class=printHidden>\r\n           <TD class=bannerline><IMG height=5\r\n             src=\"templates/images/spacer.gif\" width=2></TD></TR><!--end top row-->\r\n         <TR><!--be";
    echo "gin top banner-->\r\n           <TD class=banner height=40><!--add the tab navigation -->\r\n             <TABLE class=printHidden style=\"MARGIN-LEFT: 10px\" cellSpacing=0\r\n             cellPadding=0 width=\"100%\" border=0>\r\n               <TBODY>\r\n               <TR><!--section header-->\r\n                 <TD align=left>\r\n                   <DIV id=container>";
    echo "<S";
    echo "PAN class=pageheader>Настройки Банков &nbsp;";
    echo "<S";
    echo "PAN class=subhead>> Создать новый банк </SPAN></SPAN><BR><BR>\r\n                   <UL id=nav>\r\n                     <LI><A class=selected href=\"admin_config_bank.php\">Все банки</A>\r\n                   </LI></UL></DIV></TD></TR></TBODY></TABLE><!--end of tab navigation--></TD></TR><!--end banner -->\r\n         <TR><!--begin main content tables --->\r\n           <TD vAlign=top>\r\n             <TABLE cellSpacing=0 cellPadding";
    echo "=0 width=\"100%\">\r\n               <TBODY>\r\n               <TR>\r\n                 <TD width=10><IMG height=8\r\n                   src=\"templates/images/spacer.gif\"\r\n                 width=10></TD>\r\n                 <TD>               </TD></TR></TBODY></TABLE>\r\n             ";
    echo "<S";
    echo "TYLE type=text/css>.drag {\r\n \tCURSOR: hand\r\n }\r\n </STYLE>\r\n             <DIV id=dHTMLToolTip\r\n             style=\"Z-INDEX: 1000; LEFT: 0px; VISIBILITY: hidden; WIDTH: 10px; POSITION: absolute; TOP: 0px; HEIGHT: 10px\"></DIV>\r\n           </TD></TR>\r\n             <TD class=tableheader>\r\n\t\t\t\tБАНКИ: <a href=\"admin_config_bank.php\" class=\"style2\" style=\"color:#FFFFFF;\">ВЕРНУТЬСЯ НАЗАД</a>\r\n              </TD>\r\n ";
    echo "          </TR></TBODY></TABLE>\r\n\t\t\t\t\t\t\t<form method=\"post\" action=\"admin_config_bank.php?mode=add\">\r\n           \t\t\t\t   <TABLE class=editTable cellSpacing=0 cellPadding=5 border=0>\r\n                           <TBODY>\r\n                       \t   <TR>\r\n                             <TD class=colheader colSpan=4>Добавление банка</TD>\r\n                           </TR>\r\n                           <TR>\r\n           ";
    echo "                  <TD width=\"50%\" class=tabledata>Название банка:</TD>\r\n                             <TD class=tabledata colSpan=3><INPUT name=name id=\"affilpercentage\" value=\"\" size=50 maxLength=50></TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD width=\"50%\" class=tabledata>В банке денег:</TD>\r\n                             <TD class=tabledata colSpa";
    echo "n=3><INPUT name=bank id=\"affilpercentage\" value=\"\" size=20 maxLength=20>руб. </TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD width=\"50%\" class=tabledata>Процент от каждой ставки игрока в банк:</TD>\r\n                             <TD class=tabledata colSpan=3><INPUT name=proc id=\"affilpercentage\" value=\"\" size=3 maxLength=3>% </TD>\r\n                 ";
    echo "          </TR>\r\n\r\n                           <TR>\r\n                             <TD colSpan=4>\r\n                               <HR>                            </TD>\r\n                           <TR>\r\n                             <TD height=\"47\" colSpan=3 class=control><INPUT class=lgbutton type=submit value=\"Добавить\" name=Submit> ";
    if ( $error != "" )
    {
        echo "<font color=red>".$error."</font>";
    }
    echo " </form>                            </TD>\r\n                             <TD class=tabledata>&nbsp;</TD></TR></TBODY></TABLE>\r\n                           </form>\r\n         </TD>\r\n\r\n               <TR>\r\n                 <TD colSpan=2 height=10><IMG\r\n                   src=\"templates/images/spacer.gif\"\r\n                 width=1 height=\"1\"></TD>\r\n               </TR>\r\n\r\n";
}
echo "\r\n";
include_once( "templates/admin_footer.php" );
?>
