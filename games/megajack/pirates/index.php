<?php
  define("CASINOENGINE", true);
  session_start();
  include_once("../../../engine/core/games/game_secure.php");
  echo "<html>\r\n<head>\r\n<META content=\"text/html; charset=windows-1251\" http-equiv=Content-Type>\r\n<META content=\"PIRATES ISLAND\" name=description>\r\n<META content=ALL name=ROBOTS>\r\n";
  echo "<S";
  echo "CRIPT LANGUAGE=\"JavaScript\" TYPE=\"text/javascript\" src=\"pages/swfobject.js\"></SCRIPT>\r\n";
  echo "<S";
  echo "CRIPT LANGUAGE=\"JavaScript\" TYPE=\"text/javascript\" src=\"pages/main.js\"></SCRIPT>\r\n<title>PIRATES ISLAND</title>\r\n</head>\r\n\r\n<body style=\"background-image:url(logos.gif)\" topmargin=\"0\" bottommargin=\"0\" leftmargin=\"0\" rightmargin=\"0\" >\r\n<center>\r\n<object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0\" widt";
  echo "h=\"100%\" height=\"100%\" id=\"preloader\" align=\"middle\">\r\n<param name=\"allowScriptAccess\" value=\"sameDomain\" />\r\n<param name=\"movie\" value='preloader.swf?game=pirates&min=1&user=real' />\r\n<param name=\"menu\" VALUE=\"false\"/>\r\n<param name=\"quality\" value=\"best\" />\r\n<param name=\"bgcolor\" value=\"#003300\" />\r\n<embed src='preloader.swf?game=pirates&min=1&user=real' \r\n\tquality=\"best\" bgcolor=\"#003300\" width=\"100%\"";
  echo " height=\"100%\" name=\"preloader\" menu=\"false\"\r\n\talign=\"middle\" allowScriptAccess=\"sameDomain\" type=\"application/x-shockwave-flash\" \r\n\tpluginspage=\"http://www.macromedia.com/go/getflashplayer\" />\r\n</object>\r\n</center>\r\n</body>\r\n</html>";
?>