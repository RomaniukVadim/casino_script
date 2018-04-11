var psv4fRsid = "YV7shB9O46N2";
// safe-textlink@gecko.js

var psv4fRiso;
try {
	psv4fRiso = (opener != null) && (typeof(opener.name) != "unknown") && (opener.psv4fRwid != null);
} catch(e) {
	psv4fRiso = false;
}
if (psv4fRiso) {
	window.psv4fRwid = opener.psv4fRwid + 1;
	psv4fRsid = psv4fRsid + "_" + window.psv4fRwid;
} else {
	window.psv4fRwid = 1;
}
function psv4fRn() {
	return (new Date()).getTime();
}
var psv4fRs = psv4fRn();
function psv4fRst(f, t) {
	if ((psv4fRn() - psv4fRs) < 7200000) {
		return setTimeout(f, t * 1000);
	} else {
		return null;
	}
}
var psv4fRol = false;
function psv4fRow() {
	if (psv4fRol || (2 == 1)) {
		var pswo = "menubar=0,location=0,scrollbars=auto,resizable=1,status=0,width=500,height=460";
		var pswn = "pscw_" + psv4fRn();
		var url = "http://messenger.providesupport.com/messenger/netgaming.html?ps_s=" + psv4fRsid;
		if (false && !false) {
			window.open(url, pswn, pswo); 
		} else {
			var w = window.open("", pswn, pswo); 
			try {
				w.document.body.innerHTML += '<form id="pscf" action="http://messenger.providesupport.com/messenger/netgaming.html" method="post" target="' + pswn + '" style="display:none"><input type="hidden" name="ps_s" value="'+psv4fRsid+'"></form>';
				w.document.getElementById("pscf").submit();
			} catch (e) {
				w.location.href = url;
			}
		}
	} else if (2 == 2) {
		document.location = "http\u003a\u002f\u002fwww\u002enetgamingsolutions\u002ecom\u002fhelpdeskredirect";
	}
}
var psv4fRil;
var psv4fRit;
function psv4fRpi() {
	var il;
	if (3 == 2) {
		il = window.pageXOffset + 50;
	} else if (3 == 3) {
		il = (window.innerWidth * 50 / 100) + window.pageXOffset;
	} else {
		il = 50;
	}
	il -= (320 / 2);
	var it;
	if (3 == 2) {
		it = window.pageYOffset + 50;
	} else if (3 == 3) {
		it = (window.innerHeight * 50 / 100) + window.pageYOffset;
	} else {
		it = 50;
	}
	it -= (196 / 2);
	if ((il != psv4fRil) || (it != psv4fRit)) {
		psv4fRil = il;
		psv4fRit = it;
		var d = document.getElementById('civ4fR');
		if (d != null) {
			d.style.left  = Math.round(psv4fRil) + "px";
			d.style.top  = Math.round(psv4fRit) + "px";
		}
	}
	setTimeout("psv4fRpi()", 100);
}
var psv4fRlc = 0;
function psv4fRsi(t) {
	window.onscroll = psv4fRpi;
	window.onresize = psv4fRpi;
	psv4fRpi();
	psv4fRlc = 0;
	var url = "http://messenger.providesupport.com/" + ((t == 2) ? "auto" : "chat") + "-invitation/netgaming.html?ps_s=" + psv4fRsid + "&ps_t=" + psv4fRn() + "";
	var d = document.getElementById('civ4fR');
	if (d != null) {
		d.innerHTML = '<iframe allowtransparency="true" style="background:transparent;width:320;height:196" src="' + url + 
			'" onload="psv4fRld()" frameborder="no" width="320" height="196" scrolling="no"></iframe>';
	}
}
function psv4fRld() {
	if (psv4fRlc == 1) {
		var d = document.getElementById('civ4fR');
		if (d != null) {
			d.innerHTML = "";
		}
	}
	psv4fRlc++;
}
if (false) {
	psv4fRsi(1);
}
var psv4fRd = document.getElementById('scv4fR');
if (psv4fRd != null) {
	if (psv4fRol || (2 == 1) || (2 == 2)) {
		if (false) {
			psv4fRd.innerHTML = '<table style="display:inline" cellspacing="0" cellpadding="0" border="0"><tr><td align="center"><a href="#" onclick="psv4fRow(); return false;"><span id="psv4fRl">' + '\u003cimg src\u003d\'\u002fimages\u002fen\u005fEN\u002flivechat\u005fbutton\u005foffline\u002epng\' alt\u003d\'Livechat offline\' border\u003d\'0\'\u003e' + '</span></a></td></tr><tr><td align="center"><a href="http://www.providesupport.com/pb/netgaming" target="_blank"><img src="http://image.providesupport.com/lcbps.gif" width="140" height="17" border="0"></a></td></tr></table>';
		} else {
			psv4fRd.innerHTML = '<a href="#" onclick="psv4fRow(); return false;"><span id="psv4fRl">' + '\u003cimg src\u003d\'\u002fimages\u002fen\u005fEN\u002flivechat\u005fbutton\u005foffline\u002epng\' alt\u003d\'Livechat offline\' border\u003d\'0\'\u003e' + '</span></a>';
		}
	} else {
		psv4fRd.innerHTML = '';
	}
}
var psv4fRop = false;
function psv4fRco() {
	var w1 = psv4fRci.width - 1;
	psv4fRol = (w1 & 1) != 0;
	psv4fRsl(psv4fRol ? "\u003cimg src\u003d\'\u002fimages\u002fen\u005fEN\u002flivechat\u005fbutton\u005fonline\u002epng\' alt\u003d\'Livechat online\'border\u003d\'0\'\u003e" : "\u003cimg src\u003d\'\u002fimages\u002fen\u005fEN\u002flivechat\u005fbutton\u005foffline\u002epng\' alt\u003d\'Livechat offline\' border\u003d\'0\'\u003e");
	psv4fRscf((w1 & 2) != 0);
	var h = psv4fRci.height;

	if (h == 1) {
		psv4fRop = false;
	
	} else if ((h == 2) && (!psv4fRop)) {
		psv4fRop = true;
		psv4fRsi(1);

	} else if ((h == 3) && (!psv4fRop)) {
		psv4fRop = true;
		psv4fRsi(2);
	}
}
var psv4fRci = new Image();
psv4fRci.onload = psv4fRco;
var psv4fRpm = false;
var psv4fRcp = psv4fRpm ? 30 : 60;
var psv4fRct = null;
function psv4fRscf(p) {
	if (psv4fRpm != p) {
		psv4fRpm = p;
		psv4fRcp = psv4fRpm ? 30 : 60;
		if (psv4fRct != null) {
			clearTimeout(psv4fRct);
			psv4fRct = null;
		}
		psv4fRct = psv4fRst("psv4fRrc()", psv4fRcp);
	}
}
function psv4fRrc() {
	psv4fRct = psv4fRst("psv4fRrc()", psv4fRcp);
	try {
		psv4fRci.src = "http://image.providesupport.com/cmd/netgaming?" + "ps_t=" + psv4fRn() + "&ps_l=" + escape(document.location) + "&ps_r=" + escape(document.referrer) + "&ps_s=" + psv4fRsid + "" + "&platform=AMC&name=funplayer&vipstatus=none";
	} catch(e) {
	}
}
psv4fRrc();
var psv4fRcl = "\u003cimg src\u003d\'\u002fimages\u002fen\u005fEN\u002flivechat\u005fbutton\u005foffline\u002epng\' alt\u003d\'Livechat offline\' border\u003d\'0\'\u003e";
function psv4fRsl(l) {
	if (psv4fRcl != l) {
		var d = document.getElementById('psv4fRl');
		if (d != null) {
			d.innerHTML = l;
		}
		psv4fRcl = l;
	}
}

