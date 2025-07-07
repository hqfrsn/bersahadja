<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Produk</title>

	<!-- Custom fonts for this template -->
	<link href="<?php echo base_url() ?>sbadmin2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="<?php echo base_url() ?>sbadmin2/css/sb-admin-2.min.css" rel="stylesheet">

	<!-- Custom styles for this page -->
	<link href="<?php echo base_url() ?>sbadmin2/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>sbadmin2/toastr/flashdata.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/css/styleA.css" rel="stylesheet">
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
					<div id="modalContainer"></div>

					<div id="flashdata">
						<?php if ($this->session->flashdata('error')): ?>
							<div class="alert alert-danger" id="error-alert">
								<?= $this->session->flashdata('error') ?>
							</div>
						<?php endif; ?>

						<?php if ($this->session->flashdata('success')): ?>
							<div class="alert alert-success" id="success-alert">
								<?= $this->session->flashdata('success') ?>
							</div>
						<?php endif; ?>
					</div>

					<!-- Page Heading -->
					<h1 class="h3 mb-2 text-gray-800">Produk</h1>

					<!-- DataTales Example -->
					<div class="card shadow mb-4 mt-3">
						<div class="card-header d-flex">
							<h6 class="font-weight-bold text-primary mt-2 col-10">Produk</h6>
							<div class="col-2 mx-4">
								<a href="<?= site_url('admin/produk/produk_add') ?>" class="btn btn-primary"><i class="fas fa-solid fa-plus"></i> Produk</a>
							</div>
						</div>

						<div class="card-body">
							<div class="table-responsive">
								<div class="card">
									
								</div>
								<table class="table" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>ID</th>
											<th>Gambar Produk</th>
											<th>Nama Produk</th>
											<th>Harga Produk</th>
											<th>Kategori</th>
											<th>Status</th>
											<th>Keterangan Produk</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($produk as $p): ?>
											<tr>
												<td><?= $p['id_produk'] ?></td>
												<td>
													<img src="<?php echo base_url('assets/foto/' . $p['gambar_produk']); ?>" width="100" />
												</td>
												<td><?= $p['nama_produk'] ?></td>
												<td>Rp.<?= $p['harga_produk'] ?></td>
												<td><?= $p['nama_kategori'] ?></td>
												<td><?= $p['status_produk'] ?></td>
												<td><?= $p['keterangan_produk'] ?></td>
												<td class="d-flex">
													<button class="btn btn-sm btn-primary mr-1" onclick="updateStatus(<?= $p['id_produk']; ?>, 'Tersedia')">Tersedia</button>
													<button class="btn btn-sm btn-danger" onclick="updateStatus(<?= $p['id_produk']; ?>, 'Kosong')">Kosong</button>
													<a href="<?= site_url('admin/produk/produk_edit/' . $p['id_produk']) ?>" class="btn btn-warning" style="margin-right: 10px; margin-left: 10px;"><i class="fas fa-regular fa-pen-to-square"></i></a>

													<button class="btn btn-danger" onclick="confirmDelete('<?= $p['id_produk'] ?>')"><i class="fas fa-regular fa-trash-can"></i></button>
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- Delete Confirmation Modal -->
					<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="deleteModalLabel">Konfirmasi Penghapusan</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									Apakah Anda yakin ingin menghapus data ini?
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
									<a href="#" id="confirmDeleteBtn" class="btn btn-danger">Hapus</a>
								</div>
							</div>
						</div>
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

	<script>
		function confirmDelete(id) {
			const deleteUrl = "<?= site_url('admin/produk/produk_delete/') ?>" + id;
			$('#confirmDeleteBtn').attr('href', deleteUrl);
			$('#deleteModal').modal('show');
		}

		function updateStatus(id_produk, status) {
			$.post("<?= site_url('admin/produk/update_status'); ?>", {
				id: id_produk,
				status: status
			}, function(response) {
				location.reload();
			});
		}

		setTimeout(function() {
			var errorAlert = document.getElementById('error-alert');
			var successAlert = document.getElementById('success-alert');

			if (errorAlert) {
				errorAlert.style.display = 'none';
			}
			if (successAlert) {
				successAlert.style.display = 'none';
			}
		}, 3000);
	</script>

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