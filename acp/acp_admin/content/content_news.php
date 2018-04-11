<?php
defined('CASINOENGINE') or die("Доступ запрещен!");
include_once( "templates/admin_top.php" );
include_once( "templates/admin_menu.php" );
echo "\r\n\r\n";
if ( $режим == "" )
{
    echo "\r\n     <TD vAlign=top>\r\n       <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" border=0><!--begin top row-->\r\n         <TBODY>\r\n         <TR>\r\n           <TD><IMG height=13\r\n             src=\"templates/images/spacer.gif\"></TD></TR>\r\n         <TR class=printHidden>\r\n           <TD class=bannerline><IMG height=5\r\n             src=\"templates/images/spacer.gif\" width=2></TD></TR><!--end top row-->\r\n         <TR><!--be";
    echo "gin top banner-->\r\n           <TD class=banner height=40><!--add the tab navigation -->\r\n             <TABLE class=printHidden style=\"MARGIN-LEFT: 10px\" cellSpacing=0\r\n             cellPadding=0 width=\"100%\" border=0>\r\n               <TBODY>\r\n               <TR><!--section header-->\r\n                 <TD align=left>\r\n                   <DIV id=container>";
    echo "<S";
    echo "PAN class=pageheader>Новости &nbsp;";
    echo "<S";
    echo "PAN class=subhead>> Список новостей </SPAN></SPAN><BR><BR>\r\n                   \t<UL id=nav>\r\n                    \t<LI><A class=selected href=\"admin_news.php\">Новости (";
    echo mysql_num_rows( @mysql_query( "SELECT * FROM casino_news where approve='0'" ) );
    echo ")</A>\r\n             \t\t</UL></DIV></TD></TR></TBODY></TABLE><!--end of tab navigation--></TD></TR><!--end banner -->\r\n         <TR><!--begin main content tables --->\r\n           <TD vAlign=top>\r\n             <TABLE cellSpacing=0 cellPadding=0 width=\"100%\">\r\n               <TBODY>\r\n               <TR>\r\n                 <TD width=10><IMG height=8\r\n                   src=\"templates/images/spacer.gif\"\r\n                 w";
    echo "idth=10></TD>\r\n                 <TD>               </TD></TR></TBODY></TABLE>\r\n             ";
    echo "<S";
    echo "TYLE type=text/css>.drag {\r\n \tCURSOR: hand\r\n }\r\n </STYLE>\r\n             <DIV id=dHTMLToolTip\r\n             style=\"Z-INDEX: 1000; LEFT: 0px; VISIBILITY: hidden; WIDTH: 10px; POSITION: absolute; TOP: 0px; HEIGHT: 10px\"></DIV>\r\n           </TD></TR>\r\n             <TD class=tableheader>\r\n             \t<a href=\"admin_news.php?mode=addnews\" class=\"style3\">Добавить новость</a>\r\n              </TD>\r\n           </TR";
    echo "></TBODY></TABLE>\r\n                   <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" bgColor=#cccccc border=0>\r\n                     <TBODY>\r\n                     <TR>\r\n                       <TD>\r\n                         <TABLE cellSpacing=1 cellPadding=3 width=\"100%\" border=0>\r\n                           <TBODY>\r\n                           <TR class=colheader>\r\n\r\n                             <TD width=\"";
    echo "10%\"><div align=\"center\">Дата</div></TD>\r\n                             <TD width=\"70%\"><div align=\"center\">Название</div></TD>\r\n                             <TD width=\"25%\"><div align=\"center\">Управление</div></TD>\r\n                           </TR>\r\n ";
    $новости_база_запрос = @mysql_query( "select * from casino_news ORDER BY id DESC" );
    while ( $новости_база_лист = @mysql_fetch_array( $новости_база_запрос ) )
    {
        echo "\r\n                           <TR>\r\n\r\n                             <TD class=tabledata vAlign=top><div align=center>{$новости_база_лист['1']}</div></TD>\r\n                             <TD class=tabledata width=\"10%\" vAlign=top><div align=left>{$новости_база_лист['2']}</div></TD>\r\n\r\n                             <TD class=tabledata vAlign=top>\r\n\t\t\t\t\t\t\t <div align=center>\r\n\t\t\t\t\t\t\t \t<A href=admin_news.php?mode=edit&id={$новости_база_лист['0']}>Редактировать</A> - <A href=admin_news.php?mode=delete&id={$новости_база_лист['0']}>Удалить</A>\r\n\t\t\t\t\t\t\t</div>\r\n\t\t\t\t\t\t\t</TD>\r\n                           </TR>\r\n \t\t\t\t\t\t  ";
    }
    echo "                       </TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR><!-- closes 3 tables -->\r\n               <TR>\r\n                 <TD colSpan=2 height=10><IMG\r\n                   src=\"templates/images/spacer.gif\"\r\n                 width=1 height=\"1\"></TD>\r\n               </TR>\r\n\r\n\r\n";
}
echo "\r\n";
if ( $режим == "addnews" )
{
    echo "     <TD vAlign=top>\r\n       <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" border=0><!--begin top row-->\r\n         <TBODY>\r\n         <TR>\r\n           <TD><IMG height=13\r\n             src=\"templates/images/spacer.gif\"></TD></TR>\r\n         <TR class=printHidden>\r\n           <TD class=bannerline><IMG height=5\r\n             src=\"templates/images/spacer.gif\" width=2></TD></TR><!--end top row-->\r\n         <TR><!--begi";
    echo "n top banner-->\r\n           <TD class=banner height=40><!--add the tab navigation -->\r\n             <TABLE class=printHidden style=\"MARGIN-LEFT: 10px\" cellSpacing=0\r\n             cellPadding=0 width=\"100%\" border=0>\r\n               <TBODY>\r\n               <TR><!--section header-->\r\n                 <TD align=left>\r\n                   <DIV id=container>";
    echo "<S";
    echo "PAN class=pageheader>Новости > ";
    echo "<S";
    echo "PAN class=subhead>Добавление новости </SPAN></SPAN><BR><BR>\r\n                   <UL id=nav>\r\n                     <LI><A href=\"admin_news.php\">Новости (";
    echo mysql_num_rows( @mysql_query( "SELECT * FROM casino_news where approve='0'" ) );
    echo ")</A>\r\n             \t   </LI></UL></DIV></TD></TR></TBODY></TABLE><!--end of tab navigation--></TD></TR><!--end banner -->\r\n         <TR><!--begin main content tables --->\r\n           <TD vAlign=top>\r\n             <TABLE cellSpacing=0 cellPadding=0 width=\"100%\">\r\n               <TBODY>\r\n               <TR>\r\n                 <TD width=10><IMG height=8\r\n                   src=\"templates/images/spacer.gif\"\r\n            ";
    echo "     width=10></TD>\r\n                 <TD>               </TD></TR></TBODY></TABLE>\r\n             ";
    echo "<S";
    echo "TYLE type=text/css>.drag {\r\n \tCURSOR: hand\r\n }\r\n </STYLE>\r\n             <DIV id=dHTMLToolTip\r\n             style=\"Z-INDEX: 1000; LEFT: 0px; VISIBILITY: hidden; WIDTH: 10px; POSITION: absolute; TOP: 0px; HEIGHT: 10px\"></DIV>\r\n           </TD></TR>\r\n             <TD class=tableheader>ДОБАВЛЕНИЕ НОВОСТИ: <a href=\"";
    echo $_SERVER['HTTP_REFERER'];
    echo "\">ВЕРНУТСЯ НАЗАД</a></TD>\r\n         <TR>\r\n           <TD height=\"241\" vAlign=top>\r\n                           <form method=\"post\" action=\"admin_news.php?mode=addnews\">\r\n           \t\t\t\t   <TABLE class=editTable cellSpacing=0 cellPadding=5 border=0>\r\n                           <TBODY>\r\n                       \t   <TR>\r\n                             <TD class=colheader colSpan=4>Параметры новости</TD>\r\n         ";
    echo "                  </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>Название:</TD>\r\n                             <TD class=tabledata colSpan=3><INPUT name=\"title\" id=\"casinoemail\" value=\"\" size=50 maxLength=100> </TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>Keywords:</TD>\r\n                     ";
    echo "        <TD class=tabledata colSpan=3><INPUT name=\"keywords\" id=\"casinoemail\" value=\"\" size=50 maxLength=100> </TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>Description:</TD>\r\n                             <TD class=tabledata colSpan=3><INPUT name=\"descr\" id=\"casinoemail\" value=\"\" size=50 maxLength=100> </TD>\r\n                       ";
    echo "    </TR>\r\n                           <TR>\r\n                             <TD width=\"50%\" class=tabledata>Дата:</TD>\r\n                             <TD class=tabledata colSpan=3><INPUT name=\"date\" id=\"affilpercentage\" value=\"";
    echo date( "Y-m-d" );
    echo "\" size=10 maxLength=10></TD>\r\n                           </TR>\r\n                                   <TR>\r\n                             <TD class=colheader colSpan=4>Краткая новость</TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD colspan=\"4\">\r\n\r\n\t<div id=\"alerts\">\r\n\t\t<noscript>\r\n\t\t\t<p>\r\n\t\t\t\t";
    echo "<s";
    echo "trong>CKEditor requires JavaScript to run</strong>. In a browser with no JavaScript\r\n\t\t\t\tsupport, like yours, you should still see the contents (HTML data) and you should\r\n\t\t\t\tbe able to edit it normally, without a rich editor interface.\r\n\t\t\t</p>\r\n\t\t</noscript>\r\n\t</div>\r\n\t<!-- This <fieldset> holds the HTML that you will usually find in your pages. -->\r\n\t<fieldset title=\"Output\">\r\n\t\t\t<p>\r\n\t\t\t";
    include_once( "ckeditor/ckeditor.php" );
    $initialValue = $форма_news_short;
    $CKEditor = new CKEditor( );
    $CKEditor->basePath = "ckeditor/";
    $CKEditor->editor( "news_short", $initialValue );
    echo "\t\t\t</p>\r\n\t</fieldset>\r\n\r\n\r\n                             </TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=colheader colSpan=4>Полная новость</TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD colspan=\"4\">\r\n\r\n\t<div id=\"alerts\">\r\n\t\t<noscript>\r\n\t\t\t<p>\r\n\t\t\t\t";
    echo "<s";
    echo "trong>CKEditor requires JavaScript to run</strong>. In a browser with no JavaScript\r\n\t\t\t\tsupport, like yours, you should still see the contents (HTML data) and you should\r\n\t\t\t\tbe able to edit it normally, without a rich editor interface.\r\n\t\t\t</p>\r\n\t\t</noscript>\r\n\t</div>\r\n\t<!-- This <fieldset> holds the HTML that you will usually find in your pages. -->\r\n\t<fieldset title=\"Output\">\r\n\t\t\t<p>\r\n\t\t\t";
    include_once( "ckeditor/ckeditor.php" );
    $initialValue = $форма_news_full;
    $CKEditor = new CKEditor( );
    $CKEditor->basePath = "ckeditor/";
    $CKEditor->editor( "news_full", $initialValue );
    echo "\t\t\t</p>\r\n\t</fieldset>\r\n                   \t\t   </TD>\r\n                           </TR>\r\n\r\n                           <TR>\r\n                             <TD colSpan=4>\r\n                               <HR>                            </TD>\r\n                           <TR>\r\n                             <TD height=\"47\" colSpan=3 class=control><INPUT class=lgbutton type=submit value=\"Добавить новость\" name=Submit>";
    echo " ";
    if ( $error != "" )
    {
        echo "<font color=red>".$error."</font>";
    }
    echo " </form>                            </TD>\r\n                             <TD class=tabledata>&nbsp;</TD></TR></TBODY></TABLE>\r\n                           </form>\r\n         </TD>\r\n         </TR></TBODY></TABLE></TD>\r\n     <TD><IMG src=\"templates/images/spacer.gif\" width=10></TD></TR>\r\n\r\n\r\n";
}
echo "\r\n\r\n";
if ( $режим == "edit" && $id != "" && $id_фильтер == true )
{
    $новости_редактор = mysql_fetch_array( mysql_query( "SELECT * FROM casino_news WHERE id='".$id."'" ) );
    echo "     <TD vAlign=top>\r\n       <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" border=0><!--begin top row-->\r\n         <TBODY>\r\n         <TR>\r\n           <TD><IMG height=13\r\n             src=\"templates/images/spacer.gif\"></TD></TR>\r\n         <TR class=printHidden>\r\n           <TD class=bannerline><IMG height=5\r\n             src=\"templates/images/spacer.gif\" width=2></TD></TR><!--end top row-->\r\n         <TR><!--begi";
    echo "n top banner-->\r\n           <TD class=banner height=40><!--add the tab navigation -->\r\n             <TABLE class=printHidden style=\"MARGIN-LEFT: 10px\" cellSpacing=0\r\n             cellPadding=0 width=\"100%\" border=0>\r\n               <TBODY>\r\n               <TR><!--section header-->\r\n                 <TD align=left>\r\n                   <DIV id=container>";
    echo "<S";
    echo "PAN class=pageheader>Новости > ";
    echo "<S";
    echo "PAN class=subhead>Добавление новости </SPAN></SPAN><BR><BR>\r\n                   <UL id=nav>\r\n                     <LI><A href=\"admin_news.php\">Новости (";
    echo mysql_num_rows( @mysql_query( "SELECT * FROM casino_news where approve='0'" ) );
    echo ")</A>\r\n             \t   </LI></UL></DIV></TD></TR></TBODY></TABLE><!--end of tab navigation--></TD></TR><!--end banner -->\r\n         <TR><!--begin main content tables --->\r\n           <TD vAlign=top>\r\n             <TABLE cellSpacing=0 cellPadding=0 width=\"100%\">\r\n               <TBODY>\r\n               <TR>\r\n                 <TD width=10><IMG height=8\r\n                   src=\"templates/images/spacer.gif\"\r\n            ";
    echo "     width=10></TD>\r\n                 <TD>               </TD></TR></TBODY></TABLE>\r\n             ";
    echo "<S";
    echo "TYLE type=text/css>.drag {\r\n \tCURSOR: hand\r\n }\r\n </STYLE>\r\n             <DIV id=dHTMLToolTip\r\n             style=\"Z-INDEX: 1000; LEFT: 0px; VISIBILITY: hidden; WIDTH: 10px; POSITION: absolute; TOP: 0px; HEIGHT: 10px\"></DIV>\r\n           </TD></TR>\r\n             <TD class=tableheader>ДОБАВЛЕНИЕ НОВОСТИ: <a href=\"";
    echo $_SERVER['HTTP_REFERER'];
    echo "\">ВЕРНУТСЯ НАЗАД</a></TD>\r\n         <TR>\r\n           <TD height=\"241\" vAlign=top>\r\n                           <form method=\"post\" action=\"admin_news.php?mode=edit&id=";
    echo $id;
    echo "\">\r\n           \t\t\t\t   <TABLE class=editTable cellSpacing=0 cellPadding=5 border=0>\r\n                           <TBODY>\r\n                       \t   <TR>\r\n                             <TD class=colheader colSpan=4>Параметры новости</TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>Нзавание:</TD>\r\n                             <TD class=tab";
    echo "ledata colSpan=3><INPUT name=\"title\" id=\"casinoemail\" value=\"";
    echo $новости_редактор['title'];
    echo "\" size=50 maxLength=100> </TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>Keywords:</TD>\r\n                             <TD class=tabledata colSpan=3><INPUT name=\"keywords\" id=\"casinoemail\" value=\"";
    echo $новости_редактор['keywords'];
    echo "\" size=50 maxLength=100> </TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=tabledata>Description:</TD>\r\n                             <TD class=tabledata colSpan=3><INPUT name=\"descr\" id=\"casinoemail\" value=\"";
    echo $новости_редактор['descr'];
    echo "\" size=50 maxLength=100> </TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD width=\"50%\" class=tabledata>Дата:</TD>\r\n                             <TD class=tabledata colSpan=3><INPUT name=\"date\" id=\"affilpercentage\" value=\"";
    echo $новости_редактор['date'];
    echo "\" size=10 maxLength=10></TD>\r\n                           </TR>\r\n                                   <TR>\r\n                             <TD class=colheader colSpan=4>Краткая новость</TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD colspan=\"4\">\r\n\r\n\t<div id=\"alerts\">\r\n\t\t<noscript>\r\n\t\t\t<p>\r\n\t\t\t\t";
    echo "<s";
    echo "trong>CKEditor requires JavaScript to run</strong>. In a browser with no JavaScript\r\n\t\t\t\tsupport, like yours, you should still see the contents (HTML data) and you should\r\n\t\t\t\tbe able to edit it normally, without a rich editor interface.\r\n\t\t\t</p>\r\n\t\t</noscript>\r\n\t</div>\r\n\t<!-- This <fieldset> holds the HTML that you will usually find in your pages. -->\r\n\t<fieldset title=\"Output\">\r\n\t\t\t<p>\r\n\t\t\t";
    include_once( "ckeditor/ckeditor.php" );
    $initialValue = $новости_редактор['short_story'];
    $CKEditor = new CKEditor( );
    $CKEditor->basePath = "ckeditor/";
    $CKEditor->editor( "news_short", $initialValue );
    echo "\t\t\t</p>\r\n\t</fieldset>\r\n\r\n\r\n                             </TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD class=colheader colSpan=4>Полная новость</TD>\r\n                           </TR>\r\n                           <TR>\r\n                             <TD colspan=\"4\">\r\n\r\n\t<div id=\"alerts\">\r\n\t\t<noscript>\r\n\t\t\t<p>\r\n\t\t\t\t";
    echo "<s";
    echo "trong>CKEditor requires JavaScript to run</strong>. In a browser with no JavaScript\r\n\t\t\t\tsupport, like yours, you should still see the contents (HTML data) and you should\r\n\t\t\t\tbe able to edit it normally, without a rich editor interface.\r\n\t\t\t</p>\r\n\t\t</noscript>\r\n\t</div>\r\n\t<!-- This <fieldset> holds the HTML that you will usually find in your pages. -->\r\n\t<fieldset title=\"Output\">\r\n\t\t\t<p>\r\n\t\t\t";
    include_once( "ckeditor/ckeditor.php" );
    $initialValue = $новости_редактор['full_story'];
    $CKEditor = new CKEditor( );
    $CKEditor->basePath = "ckeditor/";
    $CKEditor->editor( "news_full", $initialValue );
    echo "\t\t\t</p>\r\n\t</fieldset>\r\n                   \t\t   </TD>\r\n                           </TR>\r\n\r\n                           <TR>\r\n                             <TD colSpan=4>\r\n                               <HR>                            </TD>\r\n                           <TR>\r\n                             <TD height=\"47\" colSpan=3 class=control><INPUT class=lgbutton type=submit value=\"Отредактировать\" name=Submit> ";
    if ( $error != "" )
    {
        echo "<font color=red>".$error."</font>";
    }
    echo " </form>                            </TD>\r\n                             <TD class=tabledata>&nbsp;</TD></TR></TBODY></TABLE>\r\n                           </form>\r\n         </TD>\r\n         </TR></TBODY></TABLE></TD>\r\n     <TD><IMG src=\"templates/images/spacer.gif\" width=10></TD></TR>\r\n\r\n";
}
echo "\r\n";
include_once( "templates/admin_footer.php" );
?>
