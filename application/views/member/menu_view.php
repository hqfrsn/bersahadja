<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Menu</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url('assets/css/menu.css') ?>">

	<style type="text/css">
		.progress-bar-timer {
			position: absolute;
			bottom: 0;
			left: 0;
			height: 4px;
			background-color: green;
			width: 100%;
			animation: shrink 3s linear forwards;
			border-radius: 0 0 5px 5px;
			z-index: 10;
		}

		.alert {
			position: relative;
			overflow: hidden;
		}

		@keyframes shrink {
			from { width: 100%; }
			to { width: 0%; }
		}

		.main-content {
			flex-grow: 1;
			min-width: 0;
			padding: 20px;
		}
	</style>
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
			<div class="container mt-3">

				<!-- Flashdata -->
				<div id="flashdata" style="max-width: 400px;">
					<?php if ($this->session->flashdata('error')): ?>
						<div class="alert alert-danger position-relative" id="error-alert">
							<div class="progress-bar-timer bg-danger"></div>
							<?= $this->session->flashdata('error') ?>
						</div>
					<?php endif; ?>

					<?php if ($this->session->flashdata('success')): ?>
						<div class="alert shadow position-relative" style="background-color: white;" id="success-alert">
							<div class="progress-bar-timer bg-success"></div>
							<i class="fas fa-check-circle" style="margin-right: 10px; color: green;"></i>
							<?= $this->session->flashdata('success') ?>
						</div>
					<?php endif; ?>
				</div>

				<!-- Grid Menu -->
				<div class="row">
					<?php if (empty($produk)): ?>
						<div class="col-12 text-center text-muted">Tidak ada produk pada menu ini.</div>
					<?php endif; ?>

					<?php foreach ($produk as $index => $p): ?>
						<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mb-4 d-flex align-items-stretch"
						     data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
							<a href="<?= base_url('menu/detailmenu/' . $p['id_produk']); ?>" class="text-decoration-none w-100">
								<div class="card card-hover h-100">
									<img src="<?= base_url('assets/foto/' . $p['gambar_produk']); ?>" class="card-img-top" alt="<?= $p['nama_produk'] ?>" loading="lazy">
									<div class="card-body">
										<p class="card-text"><?= $p['nama_produk'] ?><br><strong>Rp. <?= $p['harga_produk'] ?></strong></p>
									</div>
								</div>
							</a>
						</div>
					<?php endforeach; ?>
				</div>

			</div>
			<!-- End of main content -->
		</div>
	</div>
	<!-- End of flex wrapper -->

	<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
	<script>
		AOS.init({
			duration: 800,
			once: true
		});

		document.addEventListener("DOMContentLoaded", function() {
			const items = document.querySelectorAll(".fade-in-up");
			items.forEach((item, i) => {
				setTimeout(() => {
					item.classList.add("show");
				}, i * 100);
			});
		});

		setTimeout(function () {
			const errorAlert = document.getElementById('error-alert');
			const successAlert = document.getElementById('success-alert');
			if (errorAlert) errorAlert.style.display = 'none';
			if (successAlert) successAlert.style.display = 'none';
		}, 3000);
	</script>

</body>
</html>
