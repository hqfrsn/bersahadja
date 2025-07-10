	<title>Detail Menu</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
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
<div class="container py-5 mb-5 position-relative">
  
  <!-- Tombol Kembali Mengambang -->
  <a href="<?= base_url('menu'); ?>"
     class="btn btn-success rounded-circle shadow-sm position-absolute"
     style="top: -10px; left: -10px; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;"
     title="Kembali ke menu"
     data-bs-toggle="tooltip" data-bs-placement="right">
     <i class="fas fa-arrow-left"></i>
  </a>

		<?php foreach ($detail_produk as $dp): ?>
			<div class="bg-white rounded shadow p-4" data-aos="fade-up" data-aos-delay="100">
				<div class="row align-items-center g-4">
					<!-- Gambar Produk -->
					<div class="col-12 col-md-5 text-center" data-aos="zoom-in">
					  <img src="<?= base_url('assets/foto/' . $dp['gambar_produk']); ?>" class="img-fluid" alt="<?= $dp['nama_produk'] ?>">
					</div>

					<div class="col-12 col-md-7" data-aos="fade-left">
					  <h2 class="fw-bold"><?= $dp['nama_produk'] ?></h2>
					  <p class="text-muted mb-2">Kategori: <?= $dp['nama_kategori'] ?></p>
					  <p class="lead"><?= $dp['keterangan_produk'] ?></p>
		
					<form method="post" action="<?= base_url('menu/cart_add'); ?>">
						<input type="hidden" name="id_produk" value="<?= $dp['id_produk'] ?>">
						<input type="hidden" name="qty" value="1">
						<input type="hidden" name="id_kategori" value="<?= $dp['id_kategori'] ?>">
						<input type="hidden" name="redirect_url" id="redirect_url">
						<button type="submit" class="btn btn-outline-success w-100">Pesan Sekarang</button>
					</form>
				</div>

				</div>
			</div>

		<?php endforeach; ?>
	</div>
	
	<!-- End Container -->

	<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

	<script>
	  AOS.init({
	    duration: 1000,
	    once: true  
	  });

	  	var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
	  tooltipTriggerList.map(function (tooltipTriggerEl) {
	    return new bootstrap.Tooltip(tooltipTriggerEl);
	  });
	</script>

</body>

</html>