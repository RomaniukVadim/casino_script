<?php
defined('CASINOENGINE') or die("Доступ запрещен!");
include_once( "templates/admin_top.php" );
include_once( "templates/admin_menu.php" );
echo "\r\n";
$user_login = $_GET['login'];
if ( ( $режим == "" || $режим == "send" ) && $user_login == "" )
{
    echo "\r\n";
    echo "<s";
    echo "cript Language=\"JavaScript\">\r\n<!--\r\nfunction show_hide(value)\r\n{\r\n    document.getElementById('element').disabled = value;\r\n\tdocument.getElementById('element1').disabled = value;\r\n}\r\n-->\r\n</script>\r\n";
    echo "<S";
    echo "CRIPT LANGUAGE=\"JavaScript\">\r\n\r\nfunction Disab (val) {\r\nif(val==\"1\")\r\n{form1.gr11[0].disabled=false;\r\nform1.gr11[1].disabled=false;\r\nform1.gr12[0].disabled=true;form1.gr12[0].checked=false;\r\nform1.gr12[1].disabled=true;form1.gr12[1].checked=false}\r\nif(val==\"2\")\r\n{form1.gr11[0].disabled=true;form1.gr11[0].checked=false;\r\nform1.gr11[1].disabled=true;form1.gr11[1].checked=false;\r\nform1.gr12[0].disabl";
    echo "ed=false;\r\nform1.gr12[1].disabled=false}\r\n}\r\n</SCRIPT>\r\n\r\n     <TD vAlign=top>\r\n       <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" border=0><!--begin top row-->\r\n         <TBODY>\r\n         <TR>\r\n           <TD><IMG height=13\r\n             src=\"templates/images/spacer.gif\"></TD></TR>\r\n         <TR class=printHidden>\r\n           <TD class=bannerline><IMG height=5\r\n             src=\"templates/images/spacer.gi";
    echo "f\" width=2></TD></TR><!--end top row-->\r\n         <TR><!--begin top banner-->\r\n           <TD class=banner height=40><!--add the tab navigation -->\r\n             <TABLE class=printHidden style=\"MARGIN-LEFT: 10px\" cellSpacing=0\r\n             cellPadding=0 width=\"100%\" border=0>\r\n               <TBODY>\r\n               <TR><!--section header-->\r\n                 <TD align=left>\r\n                   <DIV id=contain";
    echo "er>";
    echo "<S";
    echo "PAN class=pageheader>Рассылка > ";
    echo "<S";
    echo "PAN class=subhead>Рассылка по ПМ(личные сообщения) </SPAN></SPAN><BR><BR>\r\n                   <UL id=nav>\r\n                     <LI><A class=selected href=\"admin_mass_pm.php\">Рассылка</A>\r\n             </LI></UL></DIV></TD></TR></TBODY></TABLE><!--end of tab navigation--></TD></TR><!--end banner -->\r\n         <TR><!--begin main content tables --->\r\n           <TD vAlign=top>\r\n             <TABLE cellSpacing=0 cellPaddin";
    echo "g=0 width=\"100%\">\r\n               <TBODY>\r\n               <TR>\r\n                 <TD width=10><IMG height=8\r\n                   src=\"templates/images/spacer.gif\"\r\n                 width=10></TD>\r\n                 <TD>               </TD></TR></TBODY></TABLE>\r\n             ";
    echo "<S";
    echo "TYLE type=text/css>.drag {\r\n \tCURSOR: hand\r\n }\r\n </STYLE>\r\n             <DIV id=dHTMLToolTip\r\n             style=\"Z-INDEX: 1000; LEFT: 0px; VISIBILITY: hidden; WIDTH: 10px; POSITION: absolute; TOP: 0px; HEIGHT: 10px\"></DIV>\r\n           </TD></TR>\r\n\r\n         <TR>\r\n           <TD height=\"241\" vAlign=top>\r\n                           <form method=\"post\" action=\"admin_mass_pm.php?mode=send\">\r\n           \t\t\t\t ";
    echo "  <TABLE class=editTable cellSpacing=0 cellPadding=5 border=0>\r\n                           <TBODY>\r\n                    \t   <TR>\r\n                             <TD class=colheader colSpan=4>Рассылка</TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD width=\"50%\" class=tabledata>Рассылка по всем пользователям (Всего найдено пользователей: <a href=\"admin_u";
    echo "serlist.php?&mode=list\">";
    echo mysql_num_rows( mysql_query( "SELECT * FROM clients" ) );
    echo "</a>):</TD>\r\n                             <TD class=tabledata colSpan=3><input type=\"Radio\" name=\"gr11\" value=\"pm_all\" onClick=\"show_hide(true)\"  ";
    if ( $_GET['login'] != "" )
    {
        echo "disabled=true ";
    }
    echo " value=\"Yes\"></TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=colheader colSpan=4>Сообщение</TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>Тема:</TD>\r\n                             <TD class=tabledata colSpan=3><INPUT name=\"subject\" id=\"casinoemail\" value=\"";
    echo $рассылка_тема;
    echo "\" size=80 maxLength=500></TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>Сообщение:</TD>\r\n                             <TD class=tabledata colSpan=3></TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata colspan=4>\r\n\r\n    <div id=\"alerts\">\r\n\t\t<noscript>\r\n\t\t\t<p>\r\n\t\t\t\t";
    echo "<s";
    echo "trong>CKEditor requires JavaScript to run</strong>. In a browser with no JavaScript\r\n\t\t\t\tsupport, like yours, you should still see the contents (HTML data) and you should\r\n\t\t\t\tbe able to edit it normally, without a rich editor interface.\r\n\t\t\t</p>\r\n\t\t</noscript>\r\n\t</div>\r\n\t<!-- This <fieldset> holds the HTML that you will usually find in your pages. -->\r\n\t<fieldset title=\"Output\">\r\n\t\t\t<p>\r\n\t\t\t";
    include_once( "ckeditor/ckeditor.php" );
    $initialValue = $рассылка_сообщение;
    $CKEditor = new CKEditor( );
    $CKEditor->basePath = "ckeditor/";
    $CKEditor->editor( "message", $initialValue );
    echo "\t\t\t</p>\r\n\t</fieldset>\r\n\r\n\t\t\t\t\t\t\t</TD></TR>\r\n                      \t\t<TR>\r\n                             <TD colSpan=4>\r\n                               <HR>                            </TD>\r\n                           <TR>\r\n                             <TD height=\"47\" colSpan=3 class=control><INPUT class=lgbutton type=submit value=\"Разослать\" name=Submit></TD>\r\n                             <TD class=tabledata> ";
    if ( $error != "" )
    {
        echo "<font color=red>".$error."</font>";
    }
    echo " </TD></TR></TBODY></TABLE>\r\n                           </form>\r\n         </TD>\r\n         </TR></TBODY></TABLE></TD>\r\n     <TD><IMG src=\"templates/images/spacer.gif\" width=10></TD></TR>\r\n\r\n";
}
echo "\r\n";
include_once( "templates/admin_footer.php" );
?>
