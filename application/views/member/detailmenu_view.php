<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Detail Menu</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url('assets/css/menu.css') ?>">
</head>

<body>

	<!-- Header -->
	<?php $this->load->view('member/template/header'); ?>
	<!-- End Header -->

	<!-- Container -->
	<div class="container py-5">
		<?php foreach ($detail_menu as $dm): ?>
			<div class="bg-white rounded shadow p-4">
				<div class="row align-items-center g-4">
					<!-- Gambar Produk -->
					<div class="col-12 col-md-5 text-center">
						<img src="<?= base_url('assets/foto/' . $dm['gambar_produk']); ?>" class="img-fluid" alt="<?= $dm['nama_produk'] ?>">
					</div>

					<!-- Detail Produk -->
					<div class="col-12 col-md-7">

						<h2 class="fw-bold"><?= $dm['nama_produk'] ?></h2>
						<p class="text-muted mb-2">Kategori: <?= $dm['nama_kategori'] ?></p>
						<p class="lead"><?= $dm['keterangan_produk'] ?></p>

						<!-- Tombol -->
						<div class="text-center mt-4">
							<a href="<?= base_url('member/produk/transaksi_add/' . $dm['id_produk']) ?>" class="btn btn-pesan">
								Pesan Sekarang
							</a>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	<!-- End Container -->

</body>

</html>