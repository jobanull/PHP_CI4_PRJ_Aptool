$(function () {
	$(".tombolTambahDataAlatUkur").on("click", function () {
		$("#TambahDataModalLabelAlatUkur").html("Tambah Data Alat Ukur");
		$(".modal-footer button[type=submit]").html("Tambah Data");
	});

	$(".tampilModalUbahAlatUkur").on("click", function () {
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
				// $("#nama_alat").val(data.bidang);
				// $("#merk").val(data.data_pemeriksaan);
				// $("#kode").val(data.sub_pemeriksaan);
				// $("#spesifikasi").val(data.tarif);
				// $("#jumlah").val(data.nominal);
				// $("#status").val(data.satuan);
				// $("#pemakai").val(data.pemakai);
				// $("#id").val(data.id);
			},
		});
	});
});
