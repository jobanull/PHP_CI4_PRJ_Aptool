$(function () {
	$(".tombolTambahDataRole").on("click", function () {
		$("#TambahDataModalRole").html("Tambah Data Role");
		$(".modal-footer button[type=submit]").html("Tambah Data");
	});

	$(".tampilModalUbahRole").on("click", function () {
		$("#TambahDataModalRole").html("Ubah Data Role");
		$(".modal-footer button[type=submit]").html("Ubah Data");
	$(".modal-content form").attr(
			"action",
			"http://localhost/apkes/admin/editRole"           
		);	
		const id = $(this).data("id");
		console.log(id);
		$.ajax({
			url: "http://localhost/apkes/admin/getEditRole",
			data: { id: id },
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#role").val(data.role);
                $("#id").val(data.id);
			
			},
		});
	});
});
