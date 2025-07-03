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
	<!-- End of Header -->

	<div id="modalContainer"></div>

	<!-- Cart -->
	<?php $this->load->view('member/template/cart'); ?>
	<!-- End of Cart -->

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

					</div>
				</div>
			</div>

			<!-- Tombol -->
			<div class="row">
				<div class="col-6 mt-3">
					<a href="<?= base_url('member/produk/transaksi_add/' . $dm['id_produk']) ?>" class="btn btn-pesan w-100">
						Pesan Sekarang
					</a>
				</div>
				<div class="col-6 mt-3">
					<form method="post" action="<?= base_url('menu/cart_add'); ?>">
						<input type="hidden" name="id_produk" value="<?= $dm['id_produk'] ?>">
						<input type="hidden" name="qty" value="1">
						<input type="hidden" name="id_kategori" value="<?= $dm['id_kategori'] ?>">
						<input type="hidden" name="redirect_url" id="redirect_url">
						<button type="submit" class="btn btn-outline-success w-100">Pesan Sekarang</button>
					</form>
				</div>
			</div>

		<?php endforeach; ?>
	</div>
	<!-- End Container -->

</body>

</html>