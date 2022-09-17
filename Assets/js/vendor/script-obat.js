$(function () {
	$(".tombolTambahDataObat").on("click", function () {
		$("#TambahDataModalLabelObat").html("Tambah Data Obat");
		$(".modal-footer button[type=submit]").html("Tambah Data");
	});

	$(".tampilModalUbahObat").on("click", function () {
		$("#TambahDataModalLabelObat").html("Ubah Data Obat");
		$(".modal-footer button[type=submit]").html("Ubah Data");
		$(".modal-content form").attr(
			"action",
			"http://localhost/apkes/masterdata/Ubah_Data_Obat"
		);

		const id = $(this).data("id");
		console.log(id);

		$.ajax({
			url: "http://localhost/apkes/masterdata/getDataObatById",
			data: { id: id },
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#nama_obat").val(data.nama_obat);
				$("#jenis_obat").val(data.jenis_obat);
				$("#harga").val(data.harga);
				$("#stock").val(data.stock);
				$("#satuan").val(data.satuan);
				$("#id").val(data.id);
			},
		});
	});
});
