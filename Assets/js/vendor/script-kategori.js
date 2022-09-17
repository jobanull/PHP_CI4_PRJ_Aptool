$(function () {
	$(".tombolTambahDataKategori").on("click", function () {
		$("#TambahDataModalLabelKategori").html("Tambah Data Kategori");
		$(".modal-footer button[type=submit]").html("Tambah Data");
	});

	$(".tampilModalUbahKategori").on("click", function () {
		$("#TambahDataModalLabelKategori").html("Ubah Data Kategori");
		$(".modal-footer button[type=submit]").html("Ubah Data");
		$(".modal-content form").attr(
			"action",
			"http://localhost/apkes/masterdata/ubah_kategori_pasien"
		);

		const id = $(this).data("id");
		console.log(id);

		$.ajax({
			url: "http://localhost/apkes/masterdata/getUbahKategoriPasien",
			data: { id: id },
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#kategori").val(data.kategori);
				$("#id").val(data.id);
			},
		});
	});
});
