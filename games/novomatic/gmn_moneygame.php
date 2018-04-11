<?php

error_reporting( E_ALL & ~E_NOTICE );
unset( $l );
session_start( );
session_register( $l );


if ( !isset( $l ) )
{
    header( "Location: /lobby/login.php" );
    exit( );
}

session_start( );
$HTTP_SESSION_VARS['vl'] = $dur;

?>



<html>
<head>


<title>moneygame</title>

<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript" src="pages/swfobject.js"></SCRIPT>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript" src="pages/main.js"></SCRIPT>
</head>
<body topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0" bgcolor="#003300">
<center>

<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0" width="100%" height="100%" id="loader" align="middle">
<param name="allowScriptAccess" value="sameDomain" />
<param name="allowFullScreen" value="true" />
<param name="movie" value="slots/slotmenu.swf?game=moneygame&min=1&user=real&cur=RUR&denoms=1|2|3|4|5|10|15|20|30|40|50|100&loadpath=/slots/" />
<param name="quality" value="high" />
<param name="bgcolor" value="#3c3c3c" />
<embed src="slots/slotmenu.swf?game=moneygame&min=1&user=real&cur=RUR&denoms=1|2|3|4|5|10|15|20|30|40|50|100&loadpath=/slots/" quality="high" bgcolor="#3c3c3c" width="100%" height="100%" name="loader" align="middle" allowScriptAccess="sameDomain" allowFullScreen="true" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer" />
</object>

</center></body></html>