<?php
defined('CASINOENGINE') or die('Доступ запрещен');

include_once( "templates/admin_top.php" );
include_once( "templates/admin_menu.php" );

$admin_query = @mysql_fetch_array( @mysql_query( "select * from casino_admin" ) );
echo "\r\n     <TD vAlign=top>\r\n       <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" border=0>\r\n         <TBODY>\r\n         <TR>\r\n           <TD><IMG height=13 src=\"templates/images/spacer.gif\"></TD></TR>\r\n         <TR class=printHidden>\r\n           <TD class=bannerline><IMG height=5 src=\"templates/images/spacer.gif\" width=2></TD></TR>\r\n         <TR>\r\n           <TD class=banner height=40>\r\n             <TABLE class=pri";
echo "ntHidden style=\"MARGIN-LEFT: 10px\" cellSpacing=0 cellPadding=0 width=\"100%\" border=0>\r\n               <TBODY>\r\n               <TR>\r\n                 <TD align=left>\r\n                   <DIV id=container>";
echo "<S";
echo "PAN class=pageheader style=\"float:left;\">Настройки Казино > </span>";
echo "<S";
echo "PAN class=subhead> <b>&nbsp;Изменить пароль</b></SPAN><BR><BR>\r\n                   <UL id=nav>\r\n\t                 <LI><A class=\"selected\" href=\"#\">Профиль</A>\r\n                    </UL>\r\n                   </DIV>\r\n                 </TD>\r\n               </TR>\r\n               </TBODY>\r\n             </TABLE>\r\n           </TD>\r\n         </TR>\r\n         <TR>\r\n           <TD vAlign=top>\r\n             <TABLE cellSpacing=0 c";
echo "ellPadding=0 width=\"100%\">\r\n               <TBODY>\r\n               <TR>\r\n                 <TD width=10><IMG height=8 src=\"templates/images/spacer.gif\" width=10></TD>\r\n               </TR>\r\n               </TBODY>\r\n             </TABLE>\r\n             <DIV id=dHTMLToolTip style=\"Z-INDEX: 1000; LEFT: 0px; VISIBILITY: hidden; WIDTH: 10px; POSITION: absolute; TOP: 0px; HEIGHT: 10px\"></DIV>\r\n           </TD></TR>\r\n";
echo "\r\n           <TD height=\"241\" vAlign=top>\r\n           \t\t\t\t   <form method=\"post\" action=\"admin_config_profile.php\">\r\n           \t\t\t\t   <input name=\"action\" type=\"hidden\" value=\"update\">\r\n           \t\t\t\t   <TABLE class=editTable cellSpacing=0 cellPadding=5 border=0>\r\n                           <TBODY>\r\n                           <TR>\r\n                             <TD class=colheader colSpan=4>Детали профи";
echo "ля</TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>Логин:</TD>\r\n                             <TD colSpan=3 class=tabledata>";
echo "<s";
echo "trong><input name=\"login\" type=\"text\" value=\"";
echo $admin_query['login'];
echo "\" /></strong></TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>Новый пароль:</TD>\r\n                             <TD class=tabledata colSpan=3><input name=\"pass\" type=\"text\" value=\"\" /></TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>Новый пароль2:</TD>\r\n            ";
echo "                 <TD class=tabledata colSpan=3><input name=\"pass2\" type=\"text\" value=\"\" /></TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>E-Mail Адрес:</TD>\r\n                             <TD colSpan=3 class=tabledata>";
echo "<s";
echo "trong><input name=\"email\" type=\"text\" value=\"";
echo $admin_query['email'];
echo "\" /></strong></TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD><input type=\"submit\" class=lgbutton value=\"Изменить\" /></TD>\r\n                             <TD><font color=red>";
echo $error;
echo "</font></TD>\r\n                           </TR>\r\n\r\n                           </TBODY></TABLE>\r\n                           </form>\r\n           </TD>\r\n         </TR></TBODY></TABLE></TD>\r\n\r\n\r\n\r\n";
include_once( "templates/admin_footer.php" );
?>
