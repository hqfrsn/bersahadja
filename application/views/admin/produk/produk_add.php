<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Tambah Produk</title>

	<!-- Custom fonts for this template -->
	<link href="<?php echo base_url() ?>sbadmin2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link
		href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="<?php echo base_url() ?>sbadmin2/css/sb-admin-2.min.css" rel="stylesheet">

	<!-- Custom styles for this page -->
	<link href="<?php echo base_url() ?>sbadmin2/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<?php $this->load->view('admin/template/sidebar'); ?>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Header -->
				<?php $this->load->view('admin/template/header'); ?>
				<!-- End of Header -->

				<!-- Begin Page Content -->
				<div class="container-fluid">

					<div class="container">
						<h1 class="mb-4">Tambah Produk</h1>

						<!-- Display Validation Errors -->
						<?= validation_errors() ?>
						<?= form_open('Admin/Produk/produk_addsave') ?>

						<!-- Nama Produk -->
						<div class="mb-3">
							<label for="nama_produk" class="form-label">Nama Produk</label>
							<input type="text" name="nama_produk" class="form-control" id="nama_produk" required>
						</div>

						<div class="form-group">
							<label>Kategori</label>
							<select name="id_kategori" class="form-control">
								<?php foreach ($kategori as $k): ?>
									<option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>

						<!-- Harga produk -->
						<div class="mb-3">
							<label for="harga_produk" class="form-label">Harga Produk</label>
							<input type="text" name="harga_produk" class="form-control" id="harga_produk" required>
						</div>

						<!-- Gambar Produk -->
						<div class="mb-3">
							<label for="gambar_produk" class="form-label">Gambar Produk</label>
							<input type="file" name="gambar_produk" class="form-control" id="gambar_produk" required>
						</div>

						<!-- Keterangan Produk -->
						<div class="mb-3">
							<label for="keterangan_produk" class="form-label">Keterangan Produk</label>
							<textarea name="keterangan_produk" class="form-control" id="keterangan_produk" rows="4" required></textarea>
						</div>

						<!-- Submit Buttons -->
						<div class="d-flex justify-content-between">
							<button type="submit" class="btn btn-primary">Simpan</button>
							<a href="<?= site_url('Admin/Produk') ?>" class="btn btn-secondary">Kembali</a>
						</div>

						<?= form_close(); ?>
					</div>

				</div>
				<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->

			<!-- Footer -->
			<?php $this->load->view('admin/template/footer'); ?>
			<!-- End of Footer -->

		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<!-- Bootstrap core JavaScript-->
	<script src="<?php echo base_url() ?>sbadmin2/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url() ?>sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?php echo base_url() ?>sbadmin2/vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?php echo base_url() ?>sbadmin2/js/sb-admin-2.min.js"></script>

	<!-- Page level plugins -->
	<script src="<?php echo base_url() ?>sbadmin2/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url() ?>sbadmin2/vendor/datatables/dataTables.bootstrap4.min.js"></script>

	<!-- Page level custom scripts -->
	<script src="<?php echo base_url() ?>sbadmin2/js/demo/datatables-demo.js"></script>

</body>

</html>