$(function () {
	$(".tombolTambahDataPemeriksaan").on("click", function () {
		$("#TambahDataModalLabelPemeriksaan").html("Tambah Data Pemeriksaan");
		$(".modal-footer button[type=submit]").html("Tambah Data");
	});

	$(".tampilModalUbahPemeriksaan").on("click", function () {
		$("#TambahDataModalLabelPemeriksaan").html("Ubah Data Pemeriksaan");
		$(".modal-footer button[type=submit]").html("Ubah Data");
		$(".modal-content form").attr(
			"action",
			"http://localhost/apkes/masterdata/ubah_data_pemeriksaan"
		);

		const id = $(this).data("id");
		console.log(id);

		$.ajax({
			url: "http://localhost/apkes/masterdata/getUbahDataPemeriksaan",
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
