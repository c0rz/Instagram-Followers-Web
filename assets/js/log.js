$("#login").css("display", "block");
$("#login-cekpoint-1").css("display", "none");
$("#login-cekpoint-2").css("display", "none");
$("#btn-login").click(function () {
	$("form#login").text(function () {
		var pdata = $(this).serialize();
		var purl = "masuk/";
		$.ajax({
			url: purl,
			data: pdata,
			timeout: false,
			type: "POST",
			dataType: "JSON",
			success: function (hasil) {
				$("input").removeAttr("disabled", "disabled");
				$("button").removeAttr("disabled", "disabled");
				$("#btn-login").html(
					"<i class='lni lni-instagram'></i> Masuk dengan akun Instagram"
				);
				if (hasil.result) {
					window.location.replace(hasil.redirect);
					$("#status").html(hasil.content);
				} else if (hasil.cekpoint == 1) {
					$("#login").css("display", "none");
					$("#login-cekpoint-1").css("display", "block");
					$("#login-cekpoint-2").css("display", "none");
				}
				$("#status").html(hasil.content);
			},
			error: function (a, b, c) {
				$("input").removeAttr("disabled", "disabled");
				$("button").removeAttr("disabled", "disabled");
				$("#btn-login").html(
					"<i class='lni lni-instagram'></i> Masuk dengan akun Instagram"
				);
				$("#status").text(c);
			},
			beforeSend: function () {
				$("input").attr("disabled", "disabled");
				$("#btn-login").html("PROSESS..");
				$("button").attr("disabled", "disabled");
			},
		});
	});
});
$("#btn-login-cekpoint-1").click(function () {
	$("form#login-cekpoint-1").text(function () {
		var pdata = $(this).serialize();
		var purl = "action/cekpoint.php";
		$.ajax({
			url: purl,
			data: pdata,
			timeout: false,
			type: "POST",
			dataType: "JSON",
			success: function (hasil) {
				$("input").removeAttr("disabled", "disabled");
				$("button").removeAttr("disabled", "disabled");
				$("#btn-login-cekpoint-1").html("Next Step");
				if (hasil.result == true) {
					//window.location.replace(hasil.redirect);
					$("#status").html(hasil.content);
					$("#login").css("display", "none");
					$("#login-cekpoint-1").css("display", "none");
					$("#login-cekpoint-2").css("display", "block");
				} else $("#status").html(hasil.content);
			},
			error: function (a, b, c) {
				$("input").removeAttr("disabled", "disabled");
				$("button").removeAttr("disabled", "disabled");
				$("#btn-login-cekpoint-1").html("Next Step");
				$("#status").text(c);
			},
			beforeSend: function () {
				$("input").attr("disabled", "disabled");
				$("#btn-login-cekpoint-1").html("PROSESS..");
				$("button").attr("disabled", "disabled");
			},
		});
	});
});
$("#btn-login-cekpoint-2").click(function () {
	$("form#login-cekpoint-2").text(function () {
		var pdata = $(this).serialize();
		var purl = "action/cekpoint.php";
		$.ajax({
			url: purl,
			data: pdata,
			timeout: false,
			type: "POST",
			dataType: "JSON",
			success: function (hasil) {
				$("input").removeAttr("disabled", "disabled");
				$("button").removeAttr("disabled", "disabled");
				$("#btn-login-cekpoint-2").html("Next Step");
				if (hasil.result == true) {
					window.location.replace(hasil.redirect);
					$("#status").html(hasil.content);
				} else $("#status").html(hasil.content);
			},
			error: function (a, b, c) {
				$("input").removeAttr("disabled", "disabled");
				$("button").removeAttr("disabled", "disabled");
				$("#btn-login-cekpoint-2").html("Next Step");
				$("#status").text(c);
			},
			beforeSend: function () {
				$("input").attr("disabled", "disabled");
				$("#btn-login-cekpoint-2").html("PROSESS..");
				$("button").attr("disabled", "disabled");
			},
		});
	});
});
