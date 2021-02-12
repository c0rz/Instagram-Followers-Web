$(document).ready(function () {
	$("#getfollowers").click(function () {
		$.ajax({
			url: "getfollowers",
			timeout: false,
			type: "POST",
			dataType: "JSON",
			success: function (hasil) {
				$("#getfollowers").removeAttr("disabled", "disabled");
				$("#getlikes").removeAttr("disabled", "disabled");
				if (hasil.result) {
					$("#followers").html(hasil.followers);
					$("#point").html(+hasil.point);
					$("#menu").html("" + hasil.content + "");
				} else $("#menu").html("" + hasil.content + "");
			},
			error: function (a, b, c) {
				$("#menu").html('<b><font color="red"><centeR>' + c + "</center></b>");
			},
			beforeSend: function () {
				$("#menu").html(
					'<span clas="help-block">Sedang memproses penambahan followers anda..</span>'
				);
			},
		});
		return false;
	});
	$("#getlikes").click(function () {
		$.ajax({
			url: "getlikes",
			timeout: false,
			type: "POST",
			dataType: "JSON",
			success: function (hasil) {
				$("#getfollowers").removeAttr("disabled", "disabled");
				$("#getlikes").removeAttr("disabled", "disabled");
				if (hasil.result) {
					$("#followers").html(hasil.followers);
					$("#point").html(+hasil.point);
					$("#menu").html("" + hasil.content + "");
				} else $("#menu").html("" + hasil.content + "");
			},
			error: function (a, b, c) {
				$("#menu").html('<b><font color="red"><centeR>' + c + "</center></b>");
			},
			beforeSend: function () {
				$("#menu").html(
					'<span clas="help-block">Sedang memproses penambahan followers anda..</span>'
				);
			},
		});
		return false;
	});
	// $("#getlikes").click(function () {
	// 	$.ajax({
	// 		url: "getlikes",
	// 		timeout: false,
	// 		type: "POST",
	// 		success: function (hasil) {
	// 			$("#menu").html("" + hasil + "");
	// 		},
	// 		error: function (a, b, c) {
	// 			$("#menu").html('<b><font color="red"><center>' + c + "</br></b>");
	// 		},
	// 		beforeSend: function () {
	// 			$("#menu").html(
	// 				'<span clas="help-block">Sedang memuat foto-foto anda..</span>'
	// 			);
	// 		},
	// 	});
	// 	return false;
	// });
});
function loadmore_(url, id, add) {
	$.ajax({
		url: url,
		data: add + "=" + id,
		timeout: false,
		type: "POST",
		success: function (hasil) {
			$("#menu").html(
				'<div class="box box-success"><div class="box-header with-border"><h3 class="box-title">Pilih Foto</h3></div><div class="box-body">' +
					hasil +
					"</div></div>"
			);
		},
		error: function (a, b, c) {
			$("#menu").load(url);
		},
		beforeSend: function () {
			$("#menu").html(
				'<div class="box box-primary"><div class="box-header with-border"><h3 class="box-title">Memuat..</h3></div><div class="box-body"><div class="row"><div class="text-center"><p><i class="fa fa-spinner fa-pulse fa-3x fa-fw margin-bottom"></i></p><span clas="help-block">Sedang memuat foto-foto anda..</span></div></div></div></div>'
			);
		},
	});
	return false;
}
function likes(id) {
	$.ajax({
		url: "lib/like.php",
		data: "media_id=" + id,
		timeout: false,
		type: "POST",
		dataType: "JSON",
		success: function (hasil) {
			if (hasil.result) {
				$("#point").html(+hasil.point);
				$("#menu").html(
					'</div><div class="box-body">' + hasil.content + "</div></div>"
				);
			} else $("#menu").html("" + hasil.content + "");
		},
		error: function (a, b, c) {
			$("#getfollowers").removeAttr("disabled", "disabled");
			$("#getlikes").removeAttr("disabled", "disabled");
			$("#menu").html('<b><font color="red"><centeR>' + c + "</center>");
		},
		beforeSend: function () {
			$("#getfollowers").removeAttr("disabled", "disabled");
			$("#getlikes").removeAttr("disabled", "disabled");
			$("#menu").html(
				'<span clas="help-block">Sedang memproses penambahan likes pada foto anda..</span>'
			);
		},
	});
	return false;
}
