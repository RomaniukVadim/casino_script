// SETTING UP OUR POPUP
// 0 means disabled; 1 means enabled;
var popupStatus = 0;
var playTimeShort = 300000;
var playTime = 900000;

//loading popup with jQuery magic!
function loadPopup(gameContinue)
{
	//loads popup only if it is disabled
	if(popupStatus==0){
		$("#game_background").css({
			"opacity": "0.7"
		});
		$("#game_background").fadeIn("slow");

		if (gameContinue == true) {
			$("#game_continue").fadeIn("slow");
		} else {
			// Block
			$.get('http://' + window.location.host + '/overlay/index/' + current_game_id);

			$("#game_over").fadeIn("slow");
		}
		popupStatus = 1;
	}
}

//disabling popup with jQuery magic!
function disablePopup(register)
{
	// Play for real
	if (register == true) {
		if (typeof(forwardURL) != "undefined") { // Affiliate website
			if(top === self) { // Not iframe
				if(opener && typeof opener.document != 'undefined') {
					// Popup
					self.opener.location = forwardURL;
					window.opener.focus();
					self.close();
				} else {
					// Screen
					self.location = forwardURL;
					self.focus();
				}
			} else {
				if (targetURL == '_blank' || targetURL == 'popup') {
					window.open(forwardURL, '','width=800,height=600status=yes,menubar=yes,scrollbars=yes,toolbar=yes,location=yes,resizable=yes');
				} else {
					// Screen
					parent.location = forwardURL;
					parent.focus();
				}
			}
		} else { // Platform
			if(top === self) { // Not iframe
				if(opener && typeof opener.document != 'undefined') {
					// Popup
					self.opener.location = 'http://' + window.location.host + '/registration';
					window.opener.focus();
					self.close();
				} else {
					// Screen
					self.location = 'http://' + window.location.host + '/registration';
					self.focus();
				}
			} else { // Iframe
				if (targetURL == '_blank' || targetURL == 'popup') {
					window.open('http://' + window.location.host + '/registration', '','width=800,height=600status=yes,menubar=yes,scrollbars=yes,toolbar=yes,location=yes,resizable=yes');
				} else {
					// Screen
					parent.location = 'http://' + window.location.host + '/registration';
					parent.focus();
				}
			}
		}

	} else {
		
		//disables popup only if it is enabled
		if(popupStatus==1) {
			$("#game_background").fadeOut("slow");
			$("#game_continue").fadeOut("slow");
			$("#game_over").fadeOut("slow");
			popupStatus = 0;
		}

		if (typeof(forwardURL) != "undefined") { // Affiliate website
			setTimeout("loadPopup(false)", playTimeShort);
		} else {
			setTimeout("loadPopup(false)", playTime);
		}
	}
}

$(document).ready(function()
{
	//CLOSING POPUP
	//Click the x event!
	$("#game_continue_button").click(function(){
		disablePopup(false);
	});

	$("#game_close_button").click(function(){
		disablePopup(true);
	});

	$("#game_register_button").click(function(){
		disablePopup(true);
	});

	if (typeof(blocked) != "undefined") {
		loadPopup(false);
	} else {
		//LOADING POPUP
		if (typeof(forwardURL) != "undefined") { // Affiliate website
			setTimeout("loadPopup(true)", playTimeShort);
		} else {
			setTimeout("loadPopup(true)", playTime);
		}
	}
});
