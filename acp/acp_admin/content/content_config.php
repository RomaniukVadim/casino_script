<?php
defined('CASINOENGINE') or die("Доступ запрещен!");
include_once( "templates/admin_top.php" );
include_once( "templates/admin_menu.php" );
$конфигурация_запрос = @mysql_fetch_array( @mysql_query( "select * from casino_settings" ) );
echo "\r\n     <TD vAlign=top>\r\n       <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" border=0><!--begin top row-->\r\n         <TBODY>\r\n         <TR>\r\n           <TD><IMG height=13\r\n             src=\"templates/images/spacer.gif\"></TD></TR>\r\n         <TR class=printHidden>\r\n           <TD class=bannerline><IMG height=5\r\n             src=\"templates/images/spacer.gif\" width=2></TD></TR><!--end top row-->\r\n         <TR><!--be";
echo "gin top banner-->\r\n           <TD class=banner height=40><!--add the tab navigation -->\r\n             <TABLE class=printHidden style=\"MARGIN-LEFT: 10px\" cellSpacing=0\r\n             cellPadding=0 width=\"100%\" border=0>\r\n               <TBODY>\r\n               <TR><!--section header-->\r\n                 <TD align=left>\r\n                   <DIV id=container>";
echo "<S";
echo "PAN class=pageheader>Настойки Казино > ";
echo "<S";
echo "PAN class=subhead>Главные Настройки </SPAN></SPAN><BR><BR>\r\n                   <UL id=nav>\r\n                     <LI><A class=selected href=\"#\">Конфигурация</A>\r\n             </LI></UL></DIV></TD></TR></TBODY></TABLE><!--end of tab navigation--></TD></TR><!--end banner -->\r\n         <TR><!--begin main content tables --->\r\n           <TD vAlign=top>\r\n             <TABLE cellSpacing=0 cellPadding=0 width=\"100%\">\r\n        ";
echo "       <TBODY>\r\n               <TR>\r\n                 <TD width=10><IMG height=8\r\n                   src=\"templates/images/spacer.gif\"\r\n                 width=10></TD>\r\n                 <TD>               </TD></TR></TBODY></TABLE>\r\n             ";
echo "<S";
echo "TYLE type=text/css>.drag {\r\n \tCURSOR: hand\r\n }\r\n </STYLE>\r\n             <DIV id=dHTMLToolTip\r\n             style=\"Z-INDEX: 1000; LEFT: 0px; VISIBILITY: hidden; WIDTH: 10px; POSITION: absolute; TOP: 0px; HEIGHT: 10px\"></DIV>\r\n           </TD></TR>\r\n             <TD class=tableheader>ГЛАВНЫЕ НАСТРОЙКИ </TD>\r\n         <TR>\r\n           <TD height=\"241\" vAlign=top>\r\n                           <form method=\"post\"";
echo " action=\"admin_config.php?mode=edit\">\r\n           \t\t\t\t   <TABLE class=editTable cellSpacing=0 cellPadding=5 border=0>\r\n                           <TBODY>\r\n                       \t   <TR>\r\n                             <TD class=colheader colSpan=4>Основные настройки</TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>Адрес сайта:</TD>\r\n  ";
echo "                           <TD class=tabledata colSpan=3><INPUT name=siteadress id=\"casinoemail\" value=\"";
echo $конфигурация_запрос['siteadress'];
echo "\" size=30 maxLength=100> Без http:// вначале и без / в конце. Пример site.ru</TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>Название сайта:</TD>\r\n                             <TD class=tabledata colSpan=3><INPUT name=sitename id=\"casinoemail\" value=\"";
echo $конфигурация_запрос['sitename'];
echo "\" size=50 maxLength=500></TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>Keyword сайта:</TD>\r\n                             <TD class=tabledata colSpan=3><INPUT name=keywords id=\"casinoemail\" value=\"";
echo $конфигурация_запрос['keywords'];
echo "\" size=50 maxLength=2000></TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>Description сайта:</TD>\r\n                             <TD class=tabledata colSpan=3><INPUT name=description id=\"casinoemail\" value=\"";
echo $конфигурация_запрос['description'];
echo "\" size=50 maxLength=2000></TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>Количество FUN при регистрации:</TD>\r\n                             <TD class=tabledata colSpan=3><INPUT name=fun_reg id=\"casinoemail\" value=\"";
echo $конфигурация_запрос['fun_reg'];
echo "\" size=10 maxLength=10></TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>Количество FUN в день:</TD>\r\n                             <TD class=tabledata colSpan=3><INPUT name=fun_day id=\"casinoemail\" value=\"";
echo $конфигурация_запрос['fun_day'];
echo "\" size=10 maxLength=10></TD>\r\n                           </TR>\r\n\r\n                           <TR>\r\n                             <TD class=colheader colSpan=4>Настройки партнёров</TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD width=\"50%\" class=tabledata>Процент со ставки партнёрам:</TD>\r\n                             <TD class=tabledata colSpan=3><I";
echo "NPUT name=partnerproc id=\"affilpercentage\" value=\"";
echo $конфигурация_запрос['partnerproc'];
echo "\" size=3 maxLength=3>% </TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD width=\"50%\" class=tabledata>Прцент со ставки партнёрам со своим доменом или сайтом:</TD>\r\n                             <TD class=tabledata colSpan=3><INPUT name=partnerprocdomain id=\"affilpercentage\" value=\"";
echo $конфигурация_запрос['partnerprocdomain'];
echo "\" size=3 maxLength=3>% </TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=colheader colSpan=4>Основной язык</TD></TR>\r\n                           <TR>\r\n                             <TD class=tabledata>Выбери язык сайта</TD>\r\n                             <TD class=tabledata colSpan=3>\r\n                               ";
echo "<S";
echo "ELECT name=\"languagesite\" size=\"1\" id=\"language\">\r\n                               <option value=\"1\" ";
if ( $конфигурация_запрос['languagesite'] == "1" )
{
    echo "selected";
}
echo ">Русский</option>\r\n                             </SELECT> </TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>Выбери язык админки</TD>\r\n                             <TD class=tabledata colSpan=3>\r\n                              ";
echo "<S";
echo "ELECT name=\"languageadmin\" size=\"1\" id=\"language\">\r\n                               <option value=\"1\" ";
if ( $конфигурация_запрос['languageadmin'] == "1" )
{
    echo "selected";
}
echo ">Русский</option>\r\n                             </SELECT> </TD>\r\n                           </TR>\r\n\r\n                           <TR>\r\n                             <TD class=colheader colSpan=4>Бонусы</TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>Бонус при регистрации:</TD>\r\n                             <TD class=tabledata colSpan=3><IN";
echo "PUT name=bonusreg id=\"casinoemail\" value=\"";
echo $конфигурация_запрос['bonusreg'];
echo "\" size=10 maxLength=10> WMR</TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>Каждодневный бонус:</TD>\r\n                             <TD class=tabledata colSpan=3><INPUT name=bonustuday id=\"adminemail\" value=\"";
echo $конфигурация_запрос['bonustuday'];
echo "\" size=10 maxLength=10> WMR</TD>\r\n                           </TR>\r\n\r\n                           <TR>\r\n                             <TD class=colheader colSpan=4>Контакты</TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>E-Mail Казино:</TD>\r\n                             <TD class=tabledata colSpan=3><INPUT name=emailcasino id=\"casinoe";
echo "mail\" value=\"";
echo $конфигурация_запрос['emailcasino'];
echo "\" size=30 maxLength=100></TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata noWrap>E-Mail Тех. Поддержки: </TD>\r\n                             <TD class=tabledata colSpan=3><INPUT name=emailadmin id=\"adminemail\" value=\"";
echo $конфигурация_запрос['emailadmin'];
echo "\" size=30 maxLength=100></TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata noWrap>ICQ Администратора: </TD>\r\n                             <TD class=tabledata colSpan=3><INPUT name=icqadmin id=\"adminemail\" value=\"";
echo $конфигурация_запрос['icqadmin'];
echo "\" size=10 maxLength=10></TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=colheader colSpan=4>Уведомления</TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>При пополнение счета:</TD>\r\n                             <TD class=tabledata colSpan=3><input type=checkbox name=\"notesin";
echo "\" value=\"yes\" ";
if ( $конфигурация_запрос['notesin'] == "yes" )
{
    echo "checked";
}
echo "></TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>При выводе средств: </TD>\r\n                             <TD class=tabledata colSpan=3><input type=checkbox name=\"notesout\" value=\"yes\" ";
if ( $конфигурация_запрос['notesout'] == "yes" )
{
    echo "checked";
}
echo "></TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>При регистрации: </TD>\r\n                             <TD class=tabledata colSpan=3><input type=checkbox name=\"notesres\" value=\"yes\" ";
if ( $конфигурация_запрос['notesres'] == "yes" )
{
    echo "checked";
}
echo "></TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD colSpan=4>\r\n                               <HR>                            </TD>\r\n                           <TR>\r\n                             <TD height=\"47\" colSpan=3 class=control><INPUT class=lgbutton type=submit value=\"Обновить\" name=Submit> ";
if ( $error != "" )
{
    echo "<font color=red>".$error."</font>";
}
echo " </form>                            </TD>\r\n                             <TD class=tabledata>&nbsp;</TD></TR></TBODY></TABLE>\r\n                           </form>\r\n         </TD>\r\n         </TR></TBODY></TABLE></TD>\r\n     <TD><IMG src=\"templates/images/spacer.gif\" width=10></TD></TR>\r\n";
include_once( "templates/admin_footer.php" );
?>
