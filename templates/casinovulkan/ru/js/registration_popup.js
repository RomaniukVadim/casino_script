$(function() {
	$("#reg_form").submit(function() {
		if ($("#uid").val().length < 1 || $("#pass1").val().length < 1 || $("#pass2").val().length < 1 || 
			$("#email").val().length < 1 || $("#captcha_code").val().length < 1) {
				$("#reg_error").text("Заполните все поля").show();
				return false;
		}

		$.fancybox.showLoading();

		$.ajax({
			type	 : "POST",
			cache	 : false,
			url		 : registrationUrl,
			data	 : $(this).serializeArray(),
			dataType : "json",
			success: function(data) {
				if (data.status == "0") {
					$.fancybox.close();
					location.href = data.url;
				} else if (data.status == "1") {
					$.fancybox.hideLoading();
					$("#captcha").attr("src", "/engine/securimage/securimage_show_example.php?" + Math.random());
					var message = data.message;
					$("#reg_error").html(message).show();
				} else {
					$.fancybox.hideLoading();
				}
			}
		});

		return false;
	});
});

function showRegistrationForm() {
	$("#reg_error").hide();
	
	$.fancybox($('#reg_form'), {
		'closeBtn': true
	});
}