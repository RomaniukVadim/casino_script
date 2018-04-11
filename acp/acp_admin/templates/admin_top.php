<?php
echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\">\r\n <HTML><HEAD><TITLE>";
echo $title;
echo "</TITLE>\r\n <META http-equiv=Content-Type content=\"text/html; charset=windows-1251\">\r\n <META Http-Equiv=\"Cache-Control\" Content=\"no-cache\">\r\n\r\n\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"templates/ajax/lib/jquery.js\"></script>\r\n";
echo "<s";
echo "cript type='text/javascript' src='templates/ajax/lib/jquery.bgiframe.min.js'></script>\r\n";
echo "<s";
echo "cript type='text/javascript' src='templates/ajax/lib/jquery.ajaxQueue.js'></script>\r\n";
echo "<s";
echo "cript type='text/javascript' src='templates/ajax/lib/thickbox-compressed.js'></script>\r\n";
echo "<s";
echo "cript type='text/javascript' src='templates/ajax/jquery.autocomplete.pack.js'></script>\r\n\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"templates/ajax/jquery.autocomplete.css\" />\r\n\r\n\r\n";
echo "<s";
echo "cript type=\"text/javascript\">\r\n\$().ready(function() {\r\n\r\n\tfunction log(event, data, formatted) {\r\n\t\t\$(\"<li>\").html( !data ? \"No match!\" : \"Selected: \" + formatted).appendTo(\"#result\");\r\n\t}\r\n\t\r\n\tfunction formatItem(row) {\r\n\t\treturn row[0] + \" (";
echo "<s";
echo "trong>id: \" + row[1] + \"</strong>)\";\r\n\t}\r\n\tfunction formatResult(row) {\r\n\t\treturn row[0].replace(/(<.+?>)/gi, '');\r\n\t}\r\n\t\r\n\t\$(\"#searchuser\").autocomplete(\"ajax_search_user.php\", {\r\n\t\twidth: 260,\r\n\t\tselectFirst: false\r\n\t});\r\n\t\r\n\t\$(\":text, textarea\").result(log).next().click(function() {\r\n\t\t\$(this).prev().search();\r\n\t});\r\n\t\$(\"#searchuser\").result(function(event, data, formatted) {\r\n\t\tif (data)\r\n\t\t\t\$(t";
echo "his).parent().next().find(\"input\").val(data[1]);\r\n\t});\r\n});\r\n\r\nfunction submitMe() { \r\nif (window.event.keyCode == 13) \r\n{ \r\n\tdocument.myForm.submit(); \r\n} \r\n}\r\n\r\n</script>\r\n\r\n ";
echo "<S";
echo "CRIPT language=JavaScript src=\"templates/images/functions.js\" type=text/javascript></SCRIPT>\r\n <link rel=\"stylesheet\" href=\"templates/css/adminstyles.css\" type=\"text/css\" />\r\n ";
echo "<S";
echo "TYLE type=text/css media=print>.printHidden {\r\n \tDISPLAY: none\r\n }\r\n .tdSetting {\r\n \tHEIGHT: 1px\r\n }\r\n TABLE.tableBorder {\r\n \tBORDER-RIGHT: 1px solid; BORDER-TOP: 1px solid; BORDER-LEFT: 1px solid; BORDER-BOTTOM: 1px solid\r\n }\r\n </STYLE>\r\n ";
echo "<S";
echo "TYLE type=text/css media=screen>.printHidden {\r\n }\r\n .tdSetting {\r\n \tHEIGHT: 50px\r\n }\r\n TABLE.tableBorder {\r\n \tBORDER-TOP-WIDTH: 0px; BORDER-LEFT-WIDTH: 0px; BORDER-BOTTOM-WIDTH: 0px; BORDER-RIGHT-WIDTH: 0px\r\n }\r\n </STYLE>\r\n\t<link href=\"ckeditor/sample.css\" rel=\"stylesheet\" type=\"text/css\"/>\r\n </HEAD>\r\n <BODY leftMargin=0 topMargin=0 marginheight=\"0\" marginwidth=\"0\">\r\n <TABLE cellSpacing=0 cellPadding=";
echo "0 width=\"100%\">\r\n   <TBODY>\r\n   <TR>\r\n     <TD background=templates/images/bkgd_top_line_timp.gif colSpan=2 height=5><IMG height=5 src=\"templates/images/spacer.gif\" width=1></TD></TR>\r\n   <TR>\r\n     <TD><a href=\"index.php\"><IMG border=\"0\" src=\"templates/images/logo.png\"></a></TD>\r\n     <TD class=printHidden vAlign=top align=right>\r\n       <TABLE class=loginsw cellSpacing=0 cellPadding=4>\r\n         <TBODY>\r\n     ";
echo "    <TR>\r\n           <TD>\r\n \t\t  \t\t<form name=\"helpcl\" action=\"index.php\" method=\"get\">\r\n             \t\t<INPUT class=lgbutton type=submit value=\"Помощь Клиентам\" name=Submitonw>\r\n             \t</form>\r\n           </TD>\r\n           <TD vAlign=top><IMG height=25 src=\"templates/images/divider.gif\" width=4></TD>\r\n           <TD>\r\n           \t\t<form name=\"logout\" action=\"quit.php\" method=\"get\">\r\n             \t\t<INP";
echo "UT class=lgbutton type=submit value=\"Выход\" name=Submittwo>\r\n             \t</form>\r\n           </TD>\r\n         </TR>\r\n         </TBODY>\r\n       </TABLE> <div style=\"padding-right:10px;\"></div>\r\n     </TD>\r\n   </TR>\r\n   </TBODY>\r\n </TABLE>";
?>
