<?php
define( "CASINOENGINE", true );
session_start( );
include_once( "../../../engine/core/games/game_secure.php" );
echo "<HTML><HEAD>\r\n<META http-equiv=Content-Type content=\"text/html; charset=windows-1251\">\r\n<title>Слот Остров</title>\r\n</HEAD>\r\n<body bgcolor=\"#000000\" leftMargin=0 rightMargin=0 bottomMargin=0 topMargin=0 marginheight=\"0\" marginwidth=\"0\"> \r\n<object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,2,0\" width=\"100%\"";
echo " height=\"100%\" id=\"test\" align=\"middle\">\r\n<param name=\"allowFullScreen\" value=\"true\" />\r\n<param name=\"movie\" value=\"index.swf\" />\r\n<param name=\"bgcolor\" value=\"#000000\" />\r\n<embed src=\"preloader.swf?game=island.swf&game_xcasle=181&game_yscale=168&game_x=0&game_y=0\" allowFullScreen=\"true\" bgcolor=\"#000000\" width=\"100%\" height=\"100%\"name=\"game\" align=\"middle\" type=\"application/x-shockwave-flash\" plugins";
echo "page=\"http://www.adobe.com/go/getflashplayer\" />\r\n</object>\r\n<center>\r\n<button onClick=\"window.location.href='/ru/games'\">Выход из Игры</button><br>\r\n</center>\r\n</BODY></HTML>\r\n";
?>
