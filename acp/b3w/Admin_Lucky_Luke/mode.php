<?
//Ковбой
$trim_mode=mysql_fetch_array(mysql_query( "SELECT *, substring(cast(mode as char),10,1) as mode1,
                                                     substring(cast(mode as char),9,1) as mode2,
                                                     substring(cast(mode as char),8,1) as mode3,
                                                     substring(cast(mode as char),7,1) as mode4
                                                     FROM `games_bank` WHERE name = '$game' "));
mysql_query($sqls);
if ($trim_mode[mode1]==1 or $trim_mode[mode1]==3 or $trim_mode[mode1]==5 or $trim_mode[mode1]==7){$mode0001=checked;}
if ($trim_mode[mode1]==2 or $trim_mode[mode1]==3 or $trim_mode[mode1]==6 or $trim_mode[mode1]==7){$mode0002=checked;}
if ($trim_mode[mode1]==4 or $trim_mode[mode1]==5 or $trim_mode[mode1]==6 or $trim_mode[mode1]==7){$mode0004=checked;}

if ($trim_mode[mode2]==1 or $trim_mode[mode2]==3 or $trim_mode[mode2]==5 or $trim_mode[mode2]==7){$mode0010=checked;}
if ($trim_mode[mode2]==2 or $trim_mode[mode2]==3 or $trim_mode[mode2]==6 or $trim_mode[mode2]==7){$mode0020=checked;}
if ($trim_mode[mode2]==4 or $trim_mode[mode2]==5 or $trim_mode[mode2]==6 or $trim_mode[mode2]==7){$mode0040=checked;}

if ($trim_mode[mode3]==1 or $trim_mode[mode3]==3 or $trim_mode[mode3]==5 or $trim_mode[mode3]==7){$mode0100=checked;}
if ($trim_mode[mode3]==2 or $trim_mode[mode3]==3 or $trim_mode[mode3]==6 or $trim_mode[mode3]==7){$mode0200=checked;}
if ($trim_mode[mode3]==4 or $trim_mode[mode3]==5 or $trim_mode[mode3]==6 or $trim_mode[mode3]==7){$mode0400=checked;}

if ($trim_mode[mode4]==1 or $trim_mode[mode4]==3 or $trim_mode[mode4]==5 or $trim_mode[mode4]==7){$mode1000=checked;}
if ($trim_mode[mode4]==2 or $trim_mode[mode4]==3 or $trim_mode[mode4]==6 or $trim_mode[mode4]==7){$mode2000=checked;}
if ($trim_mode[mode4]==4 or $trim_mode[mode4]==5 or $trim_mode[mode4]==6 or $trim_mode[mode4]==7){$mode4000=checked;}

?>