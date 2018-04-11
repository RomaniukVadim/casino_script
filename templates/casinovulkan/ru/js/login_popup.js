$(function() {
	$("#login_form").submit(function() {
		if ($("#login").val().length < 1 || $("#password").val().length < 1) {
			$("#login_error").text("¬ведите данные").show();
			return false;
		}

		$.fancybox.showLoading();

		$.ajax({
			type	 : "POST",
			cache	 : false,
			url		 : loginUrl,
			data	 : $(this).serializeArray(),
			dataType : "json",
			success: function(data) {
				if (data.status == "0") {
					$.fancybox.close();
					location.href = data.url;
				} else if (data.status == "1") {
					$.fancybox.hideLoading();
					var message = data.message;
					console.log(message);
					$("#login_error").text(message).show();
				} else {
					$.fancybox.hideLoading();
				}
/*
				if (data < 0) {
					// Error
					$.fancybox.hideLoading();
					$("#login_error").text("Invalid data").show();
				} else {
					// OK
					$.fancybox.close();
					$("#login_validated").show();
				}
*/
			}
		});

		return false;
	});
});

function showLoginForm() {
	$("#login_error").hide();
	
	$.fancybox($('#login_form'), {
		'closeBtn': true
	});
}