<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Menu</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url('assets/css/menu.css') ?>">
</head>

<body>
	<!-- Header -->
	<?php $this->load->view('member/template/header'); ?>
	<!-- End of Header -->

	<!-- Cart -->
	<?php $this->load->view('member/template/cart'); ?>
	<!-- End of Cart -->

	<!-- Content -->
	<div class="d-flex">

		<button id="sidebarToggle">☰</button>

		<!-- Sidebar -->
		<?php $this->load->view('member/template/sidebar'); ?>
		<!-- End of Sidebar -->

		<!-- Main Content -->
		<div class="main-content">
			<div class="flex-grow-1 p-4">
				<div class="container mt-3">

					<!-- Flashdata -->
					<div id="flashdata" style="max-width: 400px;">
						<?php if ($this->session->flashdata('error')): ?>
							<div class="alert alert-danger" id="error-alert">
								<?= $this->session->flashdata('error') ?>
							</div>
						<?php endif; ?>

						<?php if ($this->session->flashdata('success')): ?>
							<div class="alert shadow" style="background-color: white;" id="success-alert">
								<i class="fas fa-check-circle" style="margin-right: 10px; color: green;"></i>
								<?= $this->session->flashdata('success') ?>
							</div>
						<?php endif; ?>
					</div>

					<!-- Grid Menu -->
					<div class="row">
						<?php foreach ($menu as $index => $m): ?>
							<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mb-4 d-flex align-items-stretch fade-in-up"
								style="transition-delay: <?= $index * 100 ?>ms;">
								<a href="<?= base_url('menu/detailmenu/' . $m['id_produk']); ?>" class="text-decoration-none w-100">
									<div class="card card-hover h-100">
										<img src="<?= base_url('assets/foto/' . $m['gambar_produk']); ?>" class="card-img-top" alt="<?= $m['nama_produk'] ?>" loading="lazy">
										<div class="card-body">
											<p class="card-text"><?= $m['nama_produk'] ?><br><strong>Rp. <?= $m['harga_produk'] ?></strong></p>
										</div>
									</div>
								</a>
							</div>
						<?php endforeach; ?>
					</div>

				</div>
			</div>
			<!-- End of main content -->
		</div>
	</div>
	<!-- End of flex wrapper -->

	<script>
		document.addEventListener("DOMContentLoaded", function() {
			const items = document.querySelectorAll(".fade-in-up");
			items.forEach((item, i) => {
				setTimeout(() => {
					item.classList.add("show");
				}, i * 100); // animasi delay setiap item
			});
		});
	</script>

</body>

</html>