$(function () {
	$(".tombolTambahDataSubMenu").on("click", function () {
		$("#TambahDataModalSubMenu").html("Tambah Data Sub Menu");
		$(".modal-footer button[type=submit]").html("Tambah Data");
	});

	$(".tampilModalUbahSubMenu").on("click", function () {
		$("#TambahDataModalSubMenu").html("Ubah Data Sub Menu");
		$(".modal-footer button[type=submit]").html("Ubah Data");
	$(".modal-content form").attr(
			"action",
			"http://localhost/apkes/menu/editSubMenu"           
		);

		const id = $(this).data("id");
		console.log(id);

		$.ajax({
			url: "http://localhost/apkes/menu/getEditSubMenu",
			data: { id: id },
			method: "post",
			dataType: "json",
			success: function (data) {
                $("#id").val(data.id);
				$("#title").val(data.title);
				$("#menu_id").val(data.menu_id);
				$("#url").val(data.url);
				$("#icon").val(data.icon);
				$("#is_active").val(1);		
			},
		});
	});
});
