<?php

define("_GAME_NAME", "LottoKeno");

include("common.php");

if (!is_user()) {
  header("Location: /");
  die();
}


print "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">\n";
print "<html>";
print "<head>";
print "<meta name=\"robots\" content=\"index, follow\">";
print "<meta name=\"keywords\" content=\"LottoKeno\">";
print "<title>LottoKeno</title>";
print "<meta name=\"keywords\" content=\"LottoKeno\">";
print "<script type=\"text/javascript\" src=\"flashobject.js\"></script>";
print "</head>";
print "<body bgcolor=\"#000000\" leftmargin=\"0\" topmargin=\"0\" marginwidth=\"0\" marginheight=\"0\">";
print "<div id=\"flashdemo\" style=\"background-color:#000000\">";
print "<object classid=\"application/x-shockwave-flash\" data=\"/cabs/flash/swflash.cab#version=6,0,29,0\" width=\"100%\" height=\"100%\" align=\"middle\">";
print "<param name=\"movie\" value=\"LottoKeno.swf\">";
print "<param name=\"quality\" value=\"high\" />";
print "<param name=\"wmode\" value=\"transparent\" />";
print "</object>";
print "</div>";
print "<script type=\"text/javascript\">";
print "var fo = new FlashObject(\"LottoKeno.swf\", \"\", \"100%\", \"100%\", \"7\", \"\");";
print "fo.addParam(\"wmode\", \"transparent\");";
print "fo.addParam(\"quality\", \"high\");";
print "fo.addParam(\"menu\", \"false\");";
print "fo.write(\"flashdemo\");";
print "</script>";
print "</body>";
print "</html>";



