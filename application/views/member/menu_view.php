<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Menu</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
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
	<?php $this->load->view('member/template/header'); ?>
	<?php $this->load->view('member/template/cart'); ?>
	<div class="d-flex">
		<button id="sidebarToggle">☰</button>
		<?php $this->load->view('member/template/sidebar'); ?>
		<div class="main-content">
			<div class="container mt-3">
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
							<i class="fas fa-check-circle me-2" style="color: green;"></i>
							<?= $this->session->flashdata('success') ?>
						</div>
					<?php endif; ?>
				</div>
				<div class="row">
					<?php if (empty($produk)): ?>
						<div class="col-12 text-center text-muted">Tidak ada produk pada menu ini.</div>
					<?php endif; ?>
					<?php foreach ($produk as $index => $p): ?>
						<div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
							<a href="<?= base_url('menu/detailmenu/' . $p['id_produk']); ?>" class="text-decoration-none w-100">
								<div class="card card-hover h-100">
									<img src="<?= base_url('assets/foto/' . $p['gambar_produk']); ?>" class="card-img-top" alt="<?= $p['nama_produk'] ?>">
									<div class="card-body">
										<p class="card-text"><?= $p['nama_produk'] ?><br><strong>Rp. <?= $p['harga_produk'] ?></strong></p>
									</div>
								</div>
							</a>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>

	<!-- Popup Nota Pembayaran -->
	<div class="modal fade" id="bayarModal" tabindex="-1" aria-labelledby="bayarModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered">
	    <?= form_open('pesanan/bayar') ?>
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="bayarModalLabel">Konfirmasi Pembayaran</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	        <p>Apakah Anda yakin ingin memproses pesanan ini?</p>
	        <div class="card" id="print">
	          <div class="card-header text-center">
	            <h5 class="mb-0"><b>Bersahadja Coffee Shop</b></h5>
	            <small>Jl. Contoh Raya No. 123, Kota Anda</small><br>
	            <small>Telp. 0812-3456-7890</small>
	          </div>
	          <div class="card-body">
	            <table class="table table-sm">
	              <thead>
	                <tr>
	                  <th>Produk</th>
	                  <th>Jumlah</th>
	                  <th>Subtotal</th>
	                </tr>
	              </thead>
	              <tbody>
	                <?php if (!empty($cart)) : ?>
	                  <?php foreach ($cart as $item) : ?>
	                    <tr>
	                      <td><?= $item['nama_produk'] ?></td>
	                      <td><?= $item['qty'] ?></td>
	                      <td>Rp <?= number_format($item['subtotal'], 0, ',', '.') ?></td>
	                    </tr>
	                  <?php endforeach; ?>
	                <?php else : ?>
	                  <tr><td colspan="3" class="text-center text-muted">Keranjang kosong</td></tr>
	                <?php endif; ?>
	              </tbody>
	            </table>
	            <ul class="list-unstyled">
	              <li class="d-flex justify-content-between">
	                <strong>Total:</strong>
	                <span id="modal-total">Rp <?= number_format($total, 0, ',', '.') ?></span>
	              </li>
	            </ul>
	            <p class="text-center mt-3">* TERIMA KASIH TELAH BERBELANJA *</p>
	          </div>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
	        <button type="submit" class="btn btn-success">Bayar</button>
	      </div>
	    </div>
	    <?= form_close() ?>
	  </div>
	</div>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
	<script>
		AOS.init({ duration: 800, once: true });
		function confirmBayar() {
			const total = <?= $total ?>;
			const jumlahUang = parseFloat(document.getElementById('jumlah_uang')?.value || 0);
			const kembalian = jumlahUang - total;
			document.getElementById('modal-total').innerText = 'Rp ' + total.toLocaleString('id-ID');
			document.getElementById('modal-jumlah-uang').innerText = 'Rp ' + jumlahUang.toLocaleString('id-ID');
			document.getElementById('modal-kembalian').innerText = 'Rp ' + (kembalian > 0 ? kembalian : 0).toLocaleString('id-ID');
			let modal = new bootstrap.Modal(document.getElementById('bayarModal'));
			modal.show();
		}
		setTimeout(() => {
			document.getElementById('error-alert')?.remove();
			document.getElementById('success-alert')?.remove();
		}, 3000);
	</script>
</body>
</html>
