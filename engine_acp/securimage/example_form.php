<?php
  session_start();
  echo "<html>\r\n<head>\r\n  <title>Securimage Test Form</title>\r\n</head>\r\n\r\n<body>\r\n\r\n";
  if (empty($_POST)) {
      echo "<form method=\"POST\">\r\nUsername:<br />\r\n<input type=\"text\" name=\"username\" /><br />\r\nPassword:<br />\r\n<input type=\"text\" name=\"password\" /><br /><br />\r\n\r\n<div style=\"width: 430px; float: left; height: 90px\">\r\n      <img id=\"siimage\" align=\"left\" style=\"padding-right: 5px; border: 0\" src=\"securimage_show.php?sid=";
      echo md5(time());
      echo "\" />\r\n\r\n        <object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0\" width=\"19\" height=\"19\" id=\"SecurImage_as3\" align=\"middle\">\r\n\t\t\t    <param name=\"allowScriptAccess\" value=\"sameDomain\" />\r\n\t\t\t    <param name=\"allowFullScreen\" value=\"false\" />\r\n\t\t\t    <param name=\"movie\" value=\"securimage_play.swf?a";
      echo "udio=securimage_play.php&bgColor1=#777&bgColor2=#fff&iconColor=#000&roundedCorner=5\" />\r\n\t\t\t    <param name=\"quality\" value=\"high\" />\r\n\t\t\t\r\n\t\t\t    <param name=\"bgcolor\" value=\"#ffffff\" />\r\n\t\t\t    <embed src=\"securimage_play.swf?audio=securimage_play.php&bgColor1=#777&bgColor2=#fff&iconColor=#000&roundedCorner=5\" quality=\"high\" bgcolor=\"#ffffff\" width=\"19\" height=\"19\" name=\"SecurImage_as3\" align=\"midd";
      echo "le\" allowScriptAccess=\"sameDomain\" allowFullScreen=\"false\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" />\r\n\t\t\t  </object>\r\n\r\n        <br />\r\n        \r\n        <!-- pass a session id to the query string of the script to prevent ie caching -->\r\n        <a tabindex=\"-1\" style=\"border-style: none\" href=\"#\" title=\"Refresh Image\" onclick=\"document.getElemen";
      echo "tById('siimage').src = 'securimage_show.php?sid=' + Math.random(); return false\"><img src=\"images/refresh.gif\" alt=\"Reload Image\" border=\"0\" onclick=\"this.blur()\" align=\"bottom\" /></a>\r\n</div>\r\n<div style=\"clear: both\"></div>\r\nCode:<br />\r\n\r\n<!-- NOTE: the \"name\" attribute is \"code\" so that \$img->check(\$_POST['code']) will check the submitted form field -->\r\n<input type=\"text\" name=\"code\" size=\"12\" /><br /";
      echo "><br />\r\n\r\n<input type=\"submit\" value=\"Submit Form\" />\r\n</form>\r\n\r\n";
  } else {
      include("securimage.php");
      $img   = new Securimage();
      $valid = $img->check($_POST['code']);
      if ($valid == true) {
          echo "<center>Thanks, you entered the correct code.<br />Click <a href=\"{$_SERVER['PHP_SELF']}\">here</a> to go back.</center>";
      } else {
          echo "<center>Sorry, the code you entered was invalid.  <a href=\"javascript:history.go(-1)\">Go back</a> to try again.</center>";
      }
  }
  echo "\r\n</body>\r\n</html>\r\n";
?>