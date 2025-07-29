<?php
if (!defined('APP_SECURE')) {
	die('Direct access not allowed');
}
$title = "Add Item";

include("koneksi.php");
include("function/format_tanggal.php");
include("function/format_rupiah.php");

$currentMonth = date('m');
$currentYear = date('Y');

// Loop through the months (assuming you have an array of month options)
$months = [
	'00' => 'NOL',
	'01' => 'JAN',
	'02' => 'FEB',
	'03' => 'MAR',
	'04' => 'APR',
	'05' => 'MEI',
	'06' => 'JUN',
	'07' => 'JUL',
	'08' => 'AUG',
	'09' => 'SEP',
	'10' => 'OKT',
	'11' => 'NOV',
	'12' => 'DES'
	// Add more months as needed
];
$tahun = [
	'2023' => '2023',
	'2024' => '2024',
	'2025' => '2025'
	// Add more year as needed
];

/* sql tahun */
//$currentYear = date('Y');
//$sqlthn = "SELECT DISTINCT left(tgl_invo,4) as tahun FROM transwo GROUP BY transwo.tgl_invo";
//$ressthn = mysqli_query($conn1, $sqlthn);

?>

<!--
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
-->

<link href="https://cdn.datatables.net/v/bs5/dt-2.3.2/b-3.2.4/b-html5-3.2.4/cr-2.1.1/date-1.5.6/r-3.0.5/rr-1.5.0/sp-2.3.4/sl-3.0.1/sr-1.4.1/datatables.min.css" rel="stylesheet" integrity="sha384-4DWSO9AjW1QxrJuyO+Of6/hUOUppxivbkkTRhNAEsK2Fs5zLuBfAlnLixGHC7adt" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js" integrity="sha384-VFQrHzqBh5qiJIU0uGU5CIW3+OWpdGGJM9LBnGbuIH2mkICcFZ7lPd/AAtI7SNf7" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js" integrity="sha384-/RlQG9uf0M2vcTw3CX7fbqgbj/h8wKxw7C3zu9/GxcBPRKOEcESxaxufwRXqzq6n" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-2.3.2/b-3.2.4/b-html5-3.2.4/cr-2.1.1/date-1.5.6/r-3.0.5/rr-1.5.0/sp-2.3.4/sl-3.0.1/sr-1.4.1/datatables.min.js" integrity="sha384-VBCFY5iuTaoOOvRnyA7CzLy/tCe0ocjSZc7pySzX2ucJfF88ZiZJphpnAMOkc1zv" crossorigin="anonymous"></script>

<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
	<div class="breadcrumb-title pe-3">Product</div>
	<div class="ps-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="javascript:;"></a></li>
				<li><i class="fa-solid fa-box"></i> Inventory</li>
			</ol>
		</nav>
	</div>
	<div class="ms-auto">
		<div class="btn-group" role="group">
		</div>
	</div>
</div>
<!--end breadcrumb-->
<div class="row">
	<div class="col-12 col-lg-12">
		<div class="card shadow-white">
			<div class="card-header p-4">
				<div class="row">
					<div class="col-2">
						<h5>Coa List</h5>
					</div>
					<div class="col-6">
						<div class="row g-3">
							<div class="input-group input-group-sm">
								<span class="input-group-text col-6"><strong>Pilih Tahun / Bulan Berjalan</strong></span>
								<div class="col-3">
									<select name="thn" id="thn" class="form-select">
										<option value="">Tahun</option>
										<?php
										foreach ($tahun as $value => $label) {
											// Check if the current month matches the value of the option
											if ($currentYear == $value) {
												// If yes, add the 'selected' attribute
												echo "<option value=\"$value\" selected>$label</option>";
											} else {
												// Otherwise, just output the option without the 'selected' attribute
												echo "<option value=\"$value\">$label</option>";
											}
										} ?>
									</select>
								</div>
								<div class="col-3">
									<select name="bln" id="bln" class="form-select">
										<option value="">Bulan</option>
										<?php
										foreach ($months as $value => $label) {
											// Check if the current month matches the value of the option
											if ($currentMonth == $value) {
												// If yes, add the 'selected' attribute
												echo "<option value=\"$value\" selected>$value $label</option>";
											} else {
												// Otherwise, just output the option without the 'selected' attribute
												echo "<option value=\"$value\">$value $label</option>";
											}
										} ?>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="col-2 p-1">
						<button type="button" class="btn btn-primary waves-effect btn-sm" data-bs-target="#ModalAdd" data-bs-toggle="modal"><i class="leading-icon fa fa-plus-circle"></i> Tambah Data</button>
					</div>
				</div>
			</div>
			<div class="card-body p-4">
				<div id="tbljurnal"></div>
			</div>
			<div class="card-footer bg-transparent position-relative">
			</div>
		</div>
	</div>
</div>

<!-- Modal Popup untuk Tambah Data -->
<div class="modal fade" id="ModalAdd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content shadow-lg1">
			<form class="form-horizontal" action="" id="formtambah" method="POST" enctype="multipart/form-data">
				<div class="modal-header bg-gray-200 ">
					<h5 class="modal-title text-xm font-weight-bold text-info text-uppercase text text-shadow1" id="detailModalLabel"><strong>Tambah Data</strong></h5>
					<button type="button" class="btn btn-light" data-bs-dismiss="modal" aria-label="Close">x</button>
				</div>
				<div class="modal-body">
					<div class="row g-3 align-items-center">
						<div class="input-group input-group-sm md-3">
							<span class="input-group-text col-3"><strong>Kode Jurnal</strong></span>
							<div class="col">
								<input type="text" name="norek" id="norek" class="form-control" aria-labelledby="norek" required>
							</div>
						</div>
					</div>
					<div class="row g-3 align-items-center">
						<div class="input-group input-group-sm">
							<span class="input-group-text col-3"><strong>Nama Jurnal</strong></span>
							<div class="col">
								<input type="text" name="nmrek" id="nmrek" class="form-control" aria-labelledby="nmrek" required>
							</div>
						</div>
					</div>
					<div class="row g-3 align-items-center">
						<div class="input-group input-group-sm">
							<span class="input-group-text col-3"><strong>Tipe</strong></span>
							<div class="col">
								<select name="tprek" id="tprek" class="form-select" aria-label="Default select example" required>
									<option value="">D/K</option>
									<option value="D">DEBET</option>
									<option value="K">KREDIT</option>
								</select>
							</div>
							<span class="input-group-text col-3"><strong>Grup</strong></span>
							<div class="col">
								<select name="grrek" id="grrek" class="form-select" aria-label="Default select example" required>
									<option value="">1/2/3/4/5</option>
									<option value="1">ASET</option>
									<option value="2">HUTANG</option>
									<option value="3">MODAL</option>
									<option value="4">PENDAPATAN</option>
									<option value="5">BIAYA</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row g-3 align-items-center">
						<div class="input-group input-group-sm">
							<span class="input-group-text col-3"><strong>Saldo Awal</strong></span>
							<div class="col">
								<input type="number" name="saldo" id="saldo" class="form-control" aria-labelledby="nmsaldorek" value="0">
							</div>
						</div>
					</div>
					<div class="row g-3 align-items-center">
						<div class="input-group input-group-sm">
							<span class="input-group-text col-3"><strong>Debet</strong></span>
							<div class="col">
								<input type="number" name="debet" id="debet" class="form-control" aria-labelledby="debet" value="0">
							</div>
							<span class="input-group-text col-3"><strong>Debet Penutup</strong></span>
							<div class="col">
								<input type="number" name="debt" id="debt" class="form-control" aria-labelledby="debt" value="0">
							</div>
						</div>
					</div>
					<div class="row g-3 align-items-center">
						<div class="input-group input-group-sm">
							<span class="input-group-text col-3"><strong>Kredit</strong></span>
							<div class="col">
								<input type="number" name="kredit" id="kredit" class="form-control text-end" aria-labelledby="kredit" value="0">
							</div>
							<span class="input-group-text col-3"><strong>Kredit Penutup</strong></span>
							<div class="col">
								<input type="number" name="kred" id="kred" class="form-control text-end" aria-labelledby="kred" value="0">
							</div>
						</div>
					</div>
					<div class="row g-3 align-items-center">
						<div class="input-group input-group-sm">
							<span class="input-group-text col-3"><strong>Amount</strong></span>
							<div class="col">
								<input type="number" name="amount" id="amount" class="form-control text-end" aria-labelledby="amount" value="0">
							</div>
						</div>
					</div>
					<div class="row g-3 align-items-center">
						<div class="input-group input-group-sm">
							<span class="input-group-text col-3"><strong>Saldo Akhir</strong></span>
							<div class="col">
								<input type="number" name="akhir" id="akhir" class="form-control text-end" aria-labelledby="akhir" value="0">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="reset" class="btn btn-danger waves-effect btn-sm" data-bs-dismiss="modal"><i class="leading-icon fa fa-cancel"></i> Batal</button>
					<button type="submit" class="btn btn-success waves-effect btn-sm" name="submit"><i class="leading-icon fa fa-save"></i> Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal Popup untuk Edit Data -->
<div class="modal fade" id="ModalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content shadow-lg1">
			<form method="post" id="formedit" enctype="multipart/form-data">
				<div class="modal-header">
					<h5 class="modal-title text-xm font-weight-bold text-info text-uppercase text text-shadow1" id="exampleModalLabel">Edit Data</h5>
					<button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal" aria-label="Close">x</button>
				</div>
				<div class="modal-body">
					<div id="dataedit"></div>
				</div>
				<div class="modal-footer">
					<button type="reset" class="btn btn-danger waves-effect btn-sm" data-bs-dismiss="modal"><i class="leading-icon fa fa-cancel"></i> Batal</button>
					<button type="submit" class="btn btn-success waves-effect btn-sm" name="submit"><i class="leading-icon fa fa-save"></i> Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal Popup untuk Hapus Data -->
<div class="modal fade" id="ModalHapus" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content shadow-lg1">
			<form method="post" id="formdelete">
				<div class="modal-header">
					<h5 class="modal-title text-xm font-weight-bold text-danger text-uppercase" id="exampleModalLabel">Hapus Data</h5>
					<button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal" aria-label="Close">x</button>
				</div>
				<div class="modal-body">
					<div id="datadelete"></div>
				</div>
				<div class="modal-footer">
					<button type="reset" class="btn btn-danger waves-effect btn-sm" data-bs-dismiss="modal"><i class="leading-icon fa fa-cancel"></i> Tidak</button>
					<button type="submit" class="btn btn-success waves-effect btn-sm" name="submit"><i class="leading-icon fa fa-save"></i> Ya, Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	//melakukan penambahan data
	$('#formtambah').on('submit', (function(e) {
		e.preventDefault();
		//var dataform = $("#formtambah").serialize();
		var formData = new FormData(this);
		$.ajax({
			url: "glcoa01_insert.php",
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,
			dataType: 'json',
			success: function(response) {
				if (response.success) {
					Swal.fire({
						title: "Success",
						text: response.message,
						icon: "success"
					});
					$("#formtambah").trigger("reset");
					$('#ModalAdd').modal('hide');
					$('#halaman2').load('glcoa01.php');
				} else {
					Swal.fire({
						title: "Error",
						text: response.message,
						icon: "error"
					});
				}
			}
		})
	}))


	//menampilkan data yang akan diedit
	$(document).on('click', '#editjurnal', function(e) {
		e.preventDefault();
		$("#ModalEdit").modal('show');
		$.post('glcoa01_edit.php', {
				norek: $(this).attr('data-id')
			},
			function(html) {
				$("#dataedit").html(html);
			}
		);
	});

	//melakukan update data yang diedit
	$("#formedit").submit(function(e) {
		e.preventDefault();
		//var dataform = $("#formedit").serialize();
		var formData = new FormData(this);
		$.ajax({
			url: "glcoa01_update.php",
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,
			dataType: 'json',
			success: function(response) {
				if (response.success) {
					Swal.fire({
						title: "Success",
						text: response.message,
						icon: "success"
					});
					$('#ModalEdit').modal('hide');
					$('#halaman2').load('jurnal.php');
				} else {
					Swal.fire({
						title: "Error",
						text: response.message,
						icon: "error"
					});
				}
			}
		});
	});

	//menampilkan konfirmasi data yang akan dihapus
	$(document).on('click', '#deletejurnal', function(e) {
		e.preventDefault();
		$("#ModalHapus").modal('show');
		$.post('glcoa01_hapus.php', {
				norek: $(this).attr('data-id')
			},
			function(html) {
				$("#datadelete").html(html);
			}
		);
	});

	//melakukan penghapusan data
	$('#formdelete').submit(function(e) {
		e.preventDefault();
		//var dataform = $("#formdelete").serialize();
		var formData = new FormData(this);
		$.ajax({
			url: "glcoa01_hapus1.php",
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,
			dataType: 'json',
			success: function(response) {
				if (response.success) {
					Swal.fire({
						title: "Success",
						text: response.message,
						icon: "success"
					});
					$('#ModalHapus').modal('hide');
					$('#halaman2').load('glcoa01.php');
				} else {
					Swal.fire({
						title: "Error",
						text: response.message,
						icon: "error"
					});
				}
			}
		})
	})

	filter_jurnal();

	function filter_jurnal() {
		var action = 'getfilter';
		var bln = $('#bln').val();
		var thn = $('#thn').val();

		// ajax script
		$.ajax({
			type: 'POST',
			url: 'glcoa01_get.php',
			data: {
				action: action,
				bln: bln,
				thn: thn

			},
			cache: true,
			success: function(html) {
				$('#tbljurnal').html(html);
			}
		});
	}

	$('#bln').change(function() {
		filter_jurnal();
	});

	function load_data() {
		$.ajax({
			url: 'glcoa01_load.php',
			type: 'POST',
			data: {
				action: 'getfilter'
			}, // jika perlu
			success: function(response) {
				$('#halaman2').html(response);
			},
			error: function(xhr) {
				console.log('Gagal memuat data: ' + xhr.responseText);
			}
		});
	}
</script>