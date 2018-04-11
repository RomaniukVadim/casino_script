//SETTING UP OUR POPUP
//0 means disabled; 1 means enabled;
var popupStatus = 0;

//loading popup with jQuery magic!
function loadPopup(){
	//loads popup only if it is disabled
	if(popupStatus==0){
		$("#message_background").css({
			"opacity": "0.7"
		});
		$("#message_background").fadeIn("slow");
		$("#message").fadeIn("slow");
		popupStatus = 1;
	}
}

//disabling popup with jQuery magic!
function disablePopup(){
//disables popup only if it is enabled
	if(popupStatus==1){
		$("#message_background").fadeOut("slow");
		$("#message").fadeOut("slow");
		popupStatus = 0;
	}
}

//centering popup
function centerPopup(){
	//request data for centering
	var windowWidth = document.documentElement.clientWidth;
	var windowHeight = document.documentElement.clientHeight;
	var popupHeight = $("#message").height();
	var popupWidth = $("#message").width();
	//centering
	$("#message").css({
		"position": "absolute",
		"top": windowHeight/2-popupHeight/2,
		"left": windowWidth/2-popupWidth/2
	});
	//only need force for IE6

	$("#message_background").css({
		"height": windowHeight
	});

}

$(document).ready(function(){

	//LOADING POPUP
	//Click the button event!
	$("#button").click(function(){
	//centering with css
	centerPopup();
	//load popup
	loadPopup();
	});


	//CLOSING POPUP
	//Click the x event!
	$("#message_close").click(function(){
		disablePopup();
	});

	//Click out event!
	$("#message_background").click(function(){
		disablePopup();
	});

	//Press Escape event!
	$(document).keypress(function(e){
	if(e.keyCode==27 && popupStatus==1){
			disablePopup();
		}
	});

//following code will be here
});
