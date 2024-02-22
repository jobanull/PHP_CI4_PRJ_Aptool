$(function () {
	$(".tombolTambahDataBidang").on("click", function () {
		$("#TambahDataModalLabelBidang").html("Tambah Data Bidang");
		$(".modal-footer button[type=submit]").html("Tambah Data");
	});

	$(".tampilModalUbahBidang").on("click", function () {
		$("#TambahDataModalLabelBidang").html("Ubah Data Bidang");
		$(".modal-footer button[type=submit]").html("Ubah Data");
		$(".modal-content form").attr(
			"action",
			"http://localhost/aptool/masterdata/Ubah_Bidang_Pemeriksaan"
		);

		const id = $(this).data("id");
		console.log(id);

		$.ajax({
			url: "http://localhost/aptool/masterdata/getUbahBidang",
			data: { id: id },
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#bidang").val(data.bidang);
				$("#id").val(data.id);
			},
		});
	});
});
