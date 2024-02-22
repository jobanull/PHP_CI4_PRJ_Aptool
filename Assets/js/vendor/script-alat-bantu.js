$(function () {
	$(".tombolTambahDataAlatBantu").on("click", function () {
		$("#TambahDataModalLabelAlatBantu").html("Tambah Data Alat Bantu");
		$(".modal-footer button[type=submit]").html("Tambah Data");
	});

	$(".tampilModalUbahAlatBantu").on("click", function () {
		$("#TambahDataModalLabelAlatBantu").html("Ubah Data Alat Uku");
		$(".modal-footer button[type=submit]").html("Ubah Data");
		$(".modal-content form").attr(
			"action",
			"http://localhost/aptool/masterdata/ubah_alat_bantu"
		);

		const id = $(this).data("id");
		console.log(id);

		$.ajax({
			url: "http://localhost/aptool/masterdata/getUbahAlatBantu",
			data: { id: id },
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#nama_alat").val(data.bidang);
				$("#merk").val(data.data_pemeriksaan);
				$("#kode").val(data.sub_pemeriksaan);
				$("#spesifikasi").val(data.tarif);
				$("#jumlah").val(data.nominal);
				$("#status").val(data.satuan);
				$("#pemakai").val(data.pemakai);
				$("#id").val(data.id);
			},
		});
	});
});
