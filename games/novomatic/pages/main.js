var readystatech = 0;

function openGame(game,user,scr,minbet) {
	var wurl = '?page=gamewindow&game='+game+'&min='+minbet+'&user='+user+'';
	var w = parseInt(screen.width*0.8);
	var h = parseInt(screen.width*0.6);
	var x = parseInt((screen.width - w) / 2);
	var y = parseInt((screen.height - h) / 3);
	if (scr == "full") {
		window.open(wurl,'jokerfon','fullscreen=yes,titlebar=no,status=0,location=0,toolbar=0,scrollbars=0');
	} else {
	window.open(wurl,'jokerfon',
	'menubar=0,status=1,resizable=1,top='+y+',height='+h+',left='+x+',width='+w+',location=0,toolbar=0,scrollbars=0'
	).focus();
	}
} 
//========================================================
function openFullScreen(scr) {
	var game = document.fgame.game.value;
	var minbet = document.fgame[1].value;
	var user = "demo";
	for (var i=1; i<=3; i++) {
		if (document.fgame[i].checked) {
			minbet = document.fgame[i].value;
		}
	}
	if (document.fgame[4].checked) {
		user = document.fgame[4].value;
	}
	var wurl = '?page=gamewindow&game='+game+'&min='+minbet+'&user='+user+'';
	var w = parseInt(screen.width*0.8);
	var h = parseInt(screen.width*0.6);
	var x = parseInt((screen.width - w) / 2);
	var y = parseInt((screen.height - h) / 3);
	if (scr == "full") {
		window.open(wurl,'jokerfon','fullscreen=yes,titlebar=no,status=0,location=0,toolbar=0,scrollbars=0');
	} else {
	window.open(wurl,'jokerfon',
	'menubar=0,status=1,resizable=1,top='+y+',height='+h+',left='+x+',width='+w+',location=0,toolbar=0,scrollbars=0'
	).focus();
	}
}

//========================================================
function exitGame() {
document.location.href = "/lobby/index.php";
/*
	querystring = ""+ document.location;
	querystring = querystring.split("?")[1];
	querystring = querystring.split("&")[0];
	querystring = querystring.split("=")[1];
	if (querystring == "gamewindow") {
		window.close();
	} else {
		document.location.href = "/lobby/index.php";
	}
	*/
} 
//========================================================
function indexGame(url) {
document.location.href = "/lobby/index.php";
/*
	querystring = ""+ document.location;
	querystring = querystring.split("?")[1];
	querystring = querystring.split("&")[0];
	querystring = querystring.split("=")[1];
	if (querystring == "gamewindow") {
		document.location.href = "?page=gamewindow&"+url;
	} else {
		document.location.href = "/lobby/index.php";
	}
	*/
} 
//========================================================

function showHistory(bets) {
	parent.document.main.SetVariable("newbets","10");
	parent.document.main.SetVariable("bets",bets);
}

//========================================================

function showOdd(odd) {
	parent.document.odd.location.href = "casher.php?action=odd&odd="+odd;
}


//========================================================