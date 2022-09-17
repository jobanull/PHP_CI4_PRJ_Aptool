$(function () {
	$(".tombolTambahDataPengirim").on("click", function () {
		$("#TambahDataModalLabelPengirim").html("Tambah Data Pengirim");
		$(".modal-footer button[type=submit]").html("Tambah Data");
	});

	$(".tampilModalUbahPengirim").on("click", function () {
		$("#TambahDataModalLabelPengirim").html("Ubah Data Pengirim");
		$(".modal-footer button[type=submit]").html("Ubah Data");
		$(".modal-content form").attr(
			"action",
			"http://localhost/apkes/masterdata/ubah_pengirim_pasien"
		);

		const id = $(this).data("id");
		console.log(id);

		$.ajax({
			url: "http://localhost/apkes/masterdata/getUbahPengirimPasien",
			data: { id: id },
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#nama_dokter").val(data.nama_dokter);
				$("#email").val(data.email);
				$("#spesialis").val(data.spesialis);
				$("#telepon").val(data.telepon);
				$("#tgl_lahir").val(data.tgl_lahir);
				$("#alamat").val(data.alamat);
				$("#id").val(data.id);
			},
		});
	});
});
