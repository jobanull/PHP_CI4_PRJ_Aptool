$(function () {
	$(".tombolTambahDataMenu").on("click", function () {
		$("#TambahDataModalMenu").html("Tambah Data Menu");
		$(".modal-footer button[type=submit]").html("Tambah Data");
	});

	$(".tampilModalUbahMenu").on("click", function () {
		$("#TambahDataModalMenu").html("Ubah Data Menu");
		$(".modal-footer button[type=submit]").html("Ubah Data");
	$(".modal-content form").attr(
			"action",
			"http://localhost/aptool/menu/editMenu"           
		);

		const id = $(this).data("id");
		console.log(id);

		$.ajax({
			url: "http://localhost/aptool/menu/getEditMenu",
			data: { id: id },
			method: "post",
			dataType: "json",
			success: function (data) {
                $("#id").val(data.id);
				$("#menu").val(data.menu);
			},
		});
	});
});
