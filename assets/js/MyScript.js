// ========================= SweatAlert FlashData ==========================
const message = $(".flashData").data("message");
const tittle = $(".flashData").data("tittle");
const icon = $(".flashData").data("icon");
const flash = document.querySelector(".flashData");

if (message && tittle && icon) {
	Swal.fire({
		icon: icon,
		title: tittle,
		text: message,
		showConfirmButton: false,
		timer: 4000,
	});

	flash.remove();
}
// ========================= END SweatAlert FlashData ==========================

// ================== SWEETALERT BUTTON DELETE ==============================
$("table tbody").on("click", ".btnDelete", function (e) {
	e.preventDefault();

	const href = $(this).attr("href");

	const Delete = Swal.mixin({
		customClass: {
			confirmButton: "btn btn-success",
			cancelButton: "btn btn-danger cancelBtn",
		},
		buttonsStyling: false,
	});

	Delete.fire({
		title: "Kamu yakin?",
		text: "Data yang sudah dihapus tidak bisa kembali!",
		icon: "warning",
		showCancelButton: true,
		confirmButtonText: "Yes, delete it!",
		cancelButtonText: "No, cancel!",
		reverseButtons: true,
	}).then((result) => {
		if (result.isConfirmed) {
			document.location.href = href;
		} else if (
			/* Read more about handling dismissals below */
			result.dismiss === Swal.DismissReason.cancel
		) {
			Delete.fire("Cancelled", "Data tidak jadi dihapus!", "error");
		}
	});

	const cancelBtn = document.querySelector(".cancelBtn");
	cancelBtn.style.marginRight = "15px";
});
// ================== SWEETALERT BUTTON DELETE ==============================

// ========================= SELECTION TAMBAH USER - DIVISI =========================
$("#role").on("change", function (e) {
	if ($("#role").find(":selected").val() == "Petugas") {
		$("#selectdivisi").show();
	} else {
		$("#selectdivisi").hide();
	}
});
// ========================= END SELECTION TAMBAH USER - DIVISI =========================

// ================================ AJAX EDIT USER =================================
$("table tbody").on("click", ".edituser", function () {
	var id_user = $(this).data("iduser");
	console.log(id_user);

	const changeAction = document.querySelector(
		"#modal-edit-user .modal-body form"
	);
	changeAction.setAttribute(
		"action",
		base_url + "master/edit-user?id=" + id_user
	);

	$.ajax({
		// mengirim data berupa id ke url dibawah dengan method post dan dikembalikan dengan type data JSON
		url: base_url + "master/getDataModalEditUser",
		data: { id_user: id_user },
		method: "post",
		dataType: "JSON",

		// Jika semua diatas sudah dilakukan maka jalankan function berikut
		success: function (data) {
			console.log(data);
			$("#nama").val(data.nama);
			$("#nik").val(data.nik);
			$("#jenis_kelamin").val(data.jenis_kelamin);
			$("#alamat").val(data.alamat);
			$("#telepon").val(data.telepon);
			$('#role option[value="' + data.role + '"]').prop("selected", true);

			if (data.role == "Petugas") {
				$('#divisi option[value="' + data.divisi + '"]').prop("selected", true);
				$("#selectdivisi").show();
			} else {
				$("#selectdivisi").hide();
			}
		},
	});
});
// ================================ END AJAX EDIT USER =================================

// ================================ AJAX EDIT IKAN =================================
$("table tbody").on("click", ".editikan", function () {
	var id_ikan = $(this).data("idikan");
	console.log(id_ikan);

	const changeAction = document.querySelector(
		"#modal-edit-ikan .modal-body form"
	);
	changeAction.setAttribute(
		"action",
		base_url + "armada/edit-ikan?id=" + id_ikan
	);

	$.ajax({
		// mengirim data berupa id ke url dibawah dengan method post dan dikembalikan dengan type data JSON
		url: base_url + "armada/getDataModalEditIkan",
		data: { id_ikan: id_ikan },
		method: "post",
		dataType: "JSON",

		// Jika semua diatas sudah dilakukan maka jalankan function berikut
		success: function (data) {
			$("#nama_ikan").val(data.nama_ikan);
			$("#harga_perkilo").val(data.harga_perkilo);
		},
	});
});
// ================================ END AJAX EDIT IKAN =================================

// ================================== AJAX CEK MEMBER BY USERNAME ==================================
$("#cekakun").on("click", function () {
	const cekInvalid = document.querySelector(".is-invalid");
	if (cekInvalid) {
		document.querySelector("#telepon").classList.remove("is-invalid");
		document.querySelector("#alert").innerHTML = "";
	}

	var telepon = document.querySelector("#telepon").value;
	$.ajax({
		// mengirim data berupa id ke url dibawah dengan method post dan dikembalikan dengan type data JSON
		url: base_url + "armada/getDataUserBytelepon",
		data: { telepon: telepon },
		method: "post",
		dataType: "JSON",

		// Jika semua diatas sudah dilakukan maka jalankan function berikut
		success: function (data) {
			console.log(data);
			if (data.status == "success") {
				$("#nama_nelayan").val(data.nama);
			} else if (data.status == "error") {
				// Alert jika tidak ada data yang ditangkap
				document.querySelector("#telepon").classList.add("is-invalid");
				document.querySelector("#alert").innerHTML =
					'<i class="bx bx-radio-circle"></i> Akun tidak ditemukan!';

				// Jika tidak ada data yang ditangkap maka hilangkan semua value
				document.querySelector("#telepon").setAttribute("value", "");

				$("#nama_nelayan").val("");
			}
		},
		error: function () {
			// Alert jika tidak ada data yang ditangkap
			document.querySelector("#telepon").classList.add("is-invalid");
			document.querySelector("#alert").innerHTML =
				'<i class="bx bx-radio-circle"></i> Akun tidak ditemukan!';

			// Jika tidak ada data yang ditangkap maka hilangkan semua value
			document.querySelector("#telepon").setAttribute("value", "");

			$("#nama_nelayan").val("");
		},
	});
});
// ================================== END AJAX CEK MEMBER BY USERNAME ==================================

// ================================== AJAX GET DATA IKAN ==================================
$("#nama_ikan").on("change", function () {
	var id_ikan = $(this).find(":selected").val();
	console.log(id_ikan);

	$.ajax({
		// mengirim data berupa id ke url dibawah dengan method post dan dikembalikan dengan type data JSON
		url: base_url + "armada/getDataModalEditIkan",
		data: { id_ikan: id_ikan },
		method: "post",
		dataType: "JSON",

		// Jika semua diatas sudah dilakukan maka jalankan function berikut
		success: function (data) {
			let formatter = new Intl.NumberFormat("id-ID", {
				style: "currency",
				currency: "IDR",
			});
			$("#harga_perkilo").val(formatter.format(data.harga_perkilo));
			$("#harga_perkilo").attr("data-hargaperkilo", data.harga_perkilo);

			var jumlah_ikan = $("#jumlah_ikan").val();
			console.log(jumlah_ikan);

			$("#total").val(formatter.format(data.harga_perkilo * jumlah_ikan));
		},
		error: function () {
			$("#harga_perkilo").val(formatter.format(""));
			$("#harga_perkilo").attr("data-hargaperkilo", "");
		},
	});
});
// ================================== END AJAX GET DATA IKAN ==================================

//   ============================== GET TOTAL PENCATATAN IKAN ==================================
$("#jumlah_ikan").on("change paste keyup", function () {
	var harga_perkilo = $("#harga_perkilo").attr("data-hargaperkilo");
	var jumlah_ikan = $("#jumlah_ikan").val();

	let formatter = new Intl.NumberFormat("id-ID", {
		style: "currency",
		currency: "IDR",
	});
	$("#total").val(formatter.format(harga_perkilo * jumlah_ikan));
});
//   ============================== END GET TOTAL PENCATATAN IKAN ==================================

// ===================================== SECURITY PASSWORD PEMBELIAN ====================================
$("#metode").on("change", function (e) {
	if ($("#metode").find(":selected").val() == "Digital") {
		$('#tambah-pembelian').attr('data-toggle', 'modal');
		$('#tambah-pembelian').attr('data-target', '#modal-secure');
		$('#tambah-pembelian').attr('type', 'button');
		$('#tambah-service').attr('data-toggle', 'modal');
		$('#tambah-service').attr('data-target', '#modal-secure');
		$('#tambah-service').attr('type', 'button');
	} else if ($("#metode").find(":selected").val() == "Cash") {
		$('#tambah-pembelian').removeAttr('data-toggle');
		$('#tambah-pembelian').removeAttr('data-target');
		$('#tambah-pembelian').attr('type', 'submit');
		$('#tambah-service').removeAttr('data-toggle');
		$('#tambah-service').removeAttr('data-target');
		$('#tambah-service').attr('type', 'submit');
	}
});

$("#secure").on("click", function (e) {
	var password = $("#password").val();
	var nama = $("#nama_nelayan").val();

	if (nama != '') {
		telepon = $("#telepon").val();

		$.ajax({
			// mengirim data berupa id ke url dibawah dengan method post dan dikembalikan dengan type data JSON
			url: base_url + "waserda/secure",
			data: { password: password, telepon: telepon },
			method: "post",
			dataType: "JSON",

			// Jika semua diatas sudah dilakukan maka jalankan function berikut
			success: function (data) {
				if (data == true) {
					$('#form-tambah-pembelian').submit();
				} else if (data == false) {
					e.preventDefault();
					// Alert jika tidak ada data yang ditangkap
					document.querySelector("#password").classList.add("is-invalid");
					document.querySelector("#cekpassword").innerHTML =
						'<i class="bx bx-radio-circle"></i> Password salah!';

					// Jika tidak ada data yang ditangkap maka hilangkan semua value
					document.querySelector("#password").setAttribute("value", "");
				}
			},
			error: function () {
				e.preventDefault();
				// Alert jika tidak ada data yang ditangkap
				document.querySelector("#password").classList.add("is-invalid");
				document.querySelector("#cekpassword").innerHTML =
					'<i class="bx bx-radio-circle"></i> Password salah!';

				// Jika tidak ada data yang ditangkap maka hilangkan semua value
				document.querySelector("#password").setAttribute("value", "");
			},
		});
	} else {
		// Alert jika tidak ada data yang ditangkap
		document.querySelector("#password").classList.add("is-invalid");
		document.querySelector("#cekpassword").innerHTML =
			'<i class="bx bx-radio-circle"></i> Nomor Telepon / Nama Pembeli belum dimasukan!';

		// Jika tidak ada data yang ditangkap maka hilangkan semua value
		document.querySelector("#password").setAttribute("value", "");
	}
});

$("#tambah-pembelian").on("click", function (e) {
	if ($("#metode").find(":selected").val() == "Digital") {
		e.preventDefault();
	} else if ($("#metode").find(":selected").val() == "Cash") {
		$('#form-tambah-pembelian').submit();
	}
});
// ===================================== END SECURITY PASSWORD PEMBELIAN ====================================

// ===================================== SECURITY PASSWORD SERVICE ====================================
$("#secure2").on("click", function (e) {
	var password = $("#password").val();
	var nama = $("#nama_nelayan").val();

	if (nama != '') {
		telepon = $("#telepon").val();

		$.ajax({
			// mengirim data berupa id ke url dibawah dengan method post dan dikembalikan dengan type data JSON
			url: base_url + "bengkel/secure",
			data: { password: password, telepon: telepon },
			method: "post",
			dataType: "JSON",

			// Jika semua diatas sudah dilakukan maka jalankan function berikut
			success: function (data) {
				if (data == true) {
					$('#form-tambah-service').submit();
				} else if (data == false) {
					e.preventDefault();
					// Alert jika tidak ada data yang ditangkap
					document.querySelector("#password").classList.add("is-invalid");
					document.querySelector("#cekpassword").innerHTML =
						'<i class="bx bx-radio-circle"></i> Password salah!';

					// Jika tidak ada data yang ditangkap maka hilangkan semua value
					document.querySelector("#password").setAttribute("value", "");
				}
			},
			error: function () {
				e.preventDefault();
				// Alert jika tidak ada data yang ditangkap
				document.querySelector("#password").classList.add("is-invalid");
				document.querySelector("#cekpassword").innerHTML =
					'<i class="bx bx-radio-circle"></i> Password salah!';

				// Jika tidak ada data yang ditangkap maka hilangkan semua value
				document.querySelector("#password").setAttribute("value", "");
			},
		});
	} else {
		// Alert jika tidak ada data yang ditangkap
		document.querySelector("#password").classList.add("is-invalid");
		document.querySelector("#cekpassword").innerHTML =
			'<i class="bx bx-radio-circle"></i> Nomor Telepon / Nama Pembeli belum dimasukan!';

		// Jika tidak ada data yang ditangkap maka hilangkan semua value
		document.querySelector("#password").setAttribute("value", "");
	}
});

$("#tambah-service").on("click", function (e) {
	if ($("#metode").find(":selected").val() == "Digital") {
		e.preventDefault();
	} else if ($("#metode").find(":selected").val() == "Cash") {
		$('#form-tambah-service').submit();
	}
});
// ===================================== END SECURITY PASSWORD PEMBELIAN ====================================
