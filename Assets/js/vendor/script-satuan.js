$(function () {
	$(".tombolTambahDataSatuan").on("click", function () {
		$("#TambahDataModalLabelSatuan").html("Tambah Data Satuan");
		$(".modal-footer button[type=submit]").html("Tambah Data");
	});

	$(".tampilModalUbahSatuan").on("click", function () {
		$("#TambahDataModalLabelSatuan").html("Ubah Data Satuan");
		$(".modal-footer button[type=submit]").html("Ubah Data");
		$(".modal-content form").attr(
			"action",
			"http://localhost/apkes/masterdata/ubah_satuan"
		);

		const id = $(this).data("id");
		console.log(id);

		$.ajax({
			url: "http://localhost/apkes/masterdata/getUbahSatuan",
			data: { id: id },
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#satuan").val(data.satuan);
				$("#id").val(data.id);
			},
		});
	});
});
