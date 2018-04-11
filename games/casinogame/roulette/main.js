var readystatech = 0;
//var sSString = "Интернет казино igrat-v-ruletku.com";

function openGame(game,user,scr,minbet) {
	var wurl = '?game='+game+'&min='+minbet+'&user='+user+'';
	var w = parseInt(screen.width*0.8);
	var h = parseInt(screen.width*0.6);
	var x = parseInt((screen.width - w) / 2);
	var y = parseInt((screen.height - h) / 3);
	if (scr == "full") {
		window.open(wurl,'wmbet','fullscreen=yes,titlebar=no,status=0,location=0,toolbar=0,scrollbars=0');
	} else {
		window.open(wurl,'wmbet','menubar=0,status=1,resizable=1,top='+y+',height='+h+',left='+x+',width='+w+',location=0,toolbar=0,scrollbars=0').focus();
	}
} 





//========================================================

function exitGame() {
	//alert("exit");
	/*
	querystring = ""+ document.location;
	querystring = querystring.split("?")[1];
	querystring = querystring.split("&")[0];
	querystring = querystring.split("=")[1];
	if (querystring == "gamewindow") {
		window.close();
	} else {
		//alert('Подтвердите выход повторным нажатием кнопки!');
		javascript:history.back();
	}
	*/
	//window.close();
	document.location.href = "../../";

} 
//========================================================
function indexGame(url) {
		document.location.href = "?tst"+url;
} 

//========================================================

function showHistory(bets) {
	parent.document.main.SetVariable("newbets","10");
	parent.document.main.SetVariable("bets",bets);
}

//========================================================

function SignedLoginFormSubmit()
{
	//alert(readystatech);
	var alertstr = "Вы уверены, что Ваш WebMoney Keeper запущен? Если да, то : \r\n \r\n Элемент ActiveX, установленный на данной странице  и используемый при авторизации с Keeeper Classic  еще не скачался и не запустился. Возможно Ваш браузер не поддерживает ActiveX (их поддержка не включена в настройках) или еще не произведена полная загрузка элемента (300Kb) и его установка. Если ActiveX включены и поддерживаются (IE), то пожалуйста подождите полной загрузки и установки элемента  и нажмите ссылку авторизации снова.";
	if (readystatech == 2)
	{
		if (null !=AcceptWM) 
		{
		    var strLoginNameEx = new String(AcceptWM.strLoginName);
			window.signedloginform.WMID.value = AcceptWM.strLoginName;
			window.signedloginform.signString.value = AcceptWM.SignString(sSString);
			window.signedloginform.signedstring.value = sSString;
			var curTime = new Date();
			var sCurTime = new String("");
			sCurTime += (curTime.getMonth()+1) + "/";
			sCurTime += curTime.getDate() + "/";
			sCurTime += curTime.getYear() + " ";
			sCurTime += curTime.getHours() + ":";
			sCurTime += curTime.getMinutes() + ":";
			sCurTime += curTime.getSeconds();
			document.forms[0].curclienttime.value = sCurTime;
			//document.forms[0].action="SignedLoginAction.asp?SP=wmlogin.asp?";
			document.forms[0].submit();
		} else {
			window.alert(alertstr);
		}
	} else {
		window.alert(alertstr);
	}
}

//========================================================

function readyStateChange()
{
	if(AcceptWM.readyState==4){
		readystatech = 2;
		//alert("yes");
	}
}

//========================================================