$(function () {
	// fungsi tambah pakan
	$(".tombolTambahPakan").on("click", function () {
		$("#modalLabelPakan").html("Form Tambah Pakan ");
		$(".modal-footer button[type=submit]").html("Tambah Data");
	});

	// fungsi edit pakan
	$(".tampilModalUbahPakan").on("click", function () {
		$("#modalLabelPakan").html("Form Edit Data Pakan");
		$(".modal-footer button[type=submit]").html("Edit Data");
		$(".modal-body form").attr(
			"action",
			"http://localhost/sipkan/admin/editPakan"
		);

		const id = $(this).data("id");

		$.ajax({
			url: "http://localhost/sipkan/admin/getPakanById",
			data: { id: id },
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#jenis_pakan").val(data.jenis_pakan);
				$("#stock").val(data.stock);
				$("#id").val(data.id);
			},
		});
	});
});
