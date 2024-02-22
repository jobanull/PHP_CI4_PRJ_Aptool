$(function () {
	$(".tombolTambahDataAlatUkur").on("click", function () {
		$("#TambahDataModalLabelAlatUkur").html("Tambah Data Alat Ukur");
		$(".modal-footer button[type=submit]").html("Tambah Data");
	});

	$(".tampilModalUbahAlaUkur").on("click", function () {
		$("#TambahDataModalLabelAlatUkur").html("Ubah Data Alat Uku");
		$(".modal-footer button[type=submit]").html("Ubah Data");
		$(".modal-content form").attr(
			"action",
			"http://localhost/aptool/masterdata/ubah_alat_ukur"
		);

		const id = $(this).data("id");
		console.log(id);

		$.ajax({
			url: "http://localhost/aptool/masterdata/getUbahAlatUkur",
			data: { id: id },
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#bidang").val(data.bidang);
				$("#data_pemeriksaan").val(data.data_pemeriksaan);
				$("#sub_pemeriksaan").val(data.sub_pemeriksaan);
				$("#tarif").val(data.tarif);
				$("#nominal").val(data.nominal);
				$("#satuan").val(data.satuan);
				$("#id").val(data.id);
			},
		});
	});
});
