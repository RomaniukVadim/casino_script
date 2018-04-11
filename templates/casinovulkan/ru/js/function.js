function submitenter(myfield,e)
{
var keycode;
if (window.event) keycode = window.event.keyCode;
else if (e) keycode = e.which;
else return true;

if (keycode == 13)
   {
   myfield.form.submit();
   return false;
   }
else
   return true;
}

function add_favorite(a) {
title=document.title;
url=document.location;
try {
// Internet Explorer
window.external.AddFavorite(url, title);
}
catch (e) {
try {
// Mozilla
window.sidebar.addPanel(title, url, "");
}
catch (e) {
// Opera
if (typeof(opera)=="object") {
a.rel="sidebar";
a.title=title;
a.url=url;
return true;
}
else {
// Unknown
alert('Ваш браузер не поддерживает автоматическое добавление закладок. Нажмите Ctrl-D чтобы добавить страницу в закладки.');
}
}
}
return false;
}
function checkform(wm){

	if(wm == 'R'){
		if(document.R.LMI_PAYMENT_AMOUNT.value < 1){alert('Минимальная сумма пополнения 1 WMR');}
		else{document.R.submit();}
	}

}
if (document.getElementById('autoProcessor') != null) {
	document.getElementById('autoProcessor').submit();
}
