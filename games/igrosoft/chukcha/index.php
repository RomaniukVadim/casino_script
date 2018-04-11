<?php
define( "CASINOENGINE", true );
session_start( );
include_once( "../../../engine/core/games/game_secure.php" );
echo "<HTML>\r\n<HEAD>\r\n<META http-equiv=Content-Type content=\"text/html; charset=windows-1251\">\r\n<title>Слот автомат - Chukcha</title>\r\n\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"/templates/vegas/ru/js/jquery.min.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"/templates/vegas/ru/js/jquery.easing.1.3.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"/alertbox/sexyalertbox.v1.2.jquery.js\"></script>\r\n\r\n   ";
echo "<s";
echo "cript>\r\n        function showwin(){\r\n                jQuery.ajax({\r\n                        url: \"/jackpot/jackpotwin.php\",\r\n                        cache: false,\r\n                        success: function(text){\r\n                                \$(\"#numberjp\").text(text);\r\n                                prn=parseInt(text);\r\n\t\t\t\t\t\t\t\tif (text != '') { alert(text); }\r\n                        \t\t}\r\n  ";
echo "              });\r\n        }\r\n\t\t \$(document).ready(\r\n                function(){ showwin(); setInterval('showwin()',1000); }\r\n         );\r\n\r\n</script>\r\n\r\n</HEAD>\r\n\r\n\r\n<body bgcolor=\"#000000\" leftMargin=0 rightMargin=0 bottomMargin=0 topMargin=0 marginheight=\"0\" marginwidth=\"0\">\r\n<object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540009\" codebase=\"http://fpdownload.macromedia.com/pub/shockwave/cabs/f";
echo "lash/swflash.cab#version=9,0,18,0\" width=\"100%\" height=\"100%\" id=\"test\" align=\"middle\">\r\n<param name=\"allowFullScreen\" value=\"true\" />\r\n<param name=\"movie\" value=\"preloader.swf?game=chukcha.swf&game_xcasle=181&game_yscale=168&game_x=0&game_y=0\" />\r\n<param name=\"bgcolor\" value=\"#000000\" />\r\n<embed src=\"preloader.swf?game=chukcha.swf&game_xcasle=181&game_yscale=168&game_x=0&game_y=0\" allowFullScreen=\"tr";
echo "ue\" bgcolor=\"#000000\" width=\"100%\" height=\"100%\"name=\"game\" align=\"middle\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" />\r\n</object>\r\n</BODY></HTML>\r\n";
?>
