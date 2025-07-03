<style>
.cart-container {
  position: fixed;
  top: 120px; /* Sesuaikan tinggi dari atas */
  right: 20px; /* Menempel ke ujung kanan */
  width: 320px;
  background: #fff;
  border-radius: 15px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  padding: 20px;
  z-index: 10000; /* Pastikan muncul di atas elemen lain */
}

.cart-content {
  max-height: 300px; /* Atur sesuai kebutuhan */
  overflow-y: auto;
  transition: max-height 0.3s ease;
}


.cart-items {
  display: flex;
  flex-direction: column;
  gap: 15px;
}

.cart-item {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  border-bottom: 1px solid #ddd;
  padding-bottom: 10px;
}

.trash-icon {
  font-size: 25px;
  color: gray;
}

.cart-total {
  text-align: center;
  margin-top: 10px;
}

.cart-total p {
  font-size: 20px;
  font-weight: bold;
  color: #23233C;
}

.btn-primary {
  width: 100%;
  border: 2px solid #23233C;
  background: transparent;
  color: #23233C;
  font-weight: bold;
  border-radius: 10px;
  padding: 10px;
  transition: 0.3s;
}

.btn-primary:hover {
  background: #23233C;
  color: #fff;
}
/* Style untuk header keranjang */
.cart-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  cursor: pointer;
  padding-bottom: 10px;
  border-bottom: 1px solid #ddd;
  margin-bottom: 10px;
}

.cart-header span {
  font-size: 18px;
  font-weight: bold;
  color: #23233C;
}

.cart-header ion-icon {
  font-size: 24px;
  transition: transform 0.3s ease;
}

/* Saat konten keranjang disembunyikan */
.cart-content {
  transition: max-height 0.3s ease;
  overflow: hidden;
}

/* Jika ingin animasi lebih smooth, Anda bisa mengatur max-height ketika expanded */
.cart-container.expanded .cart-content {
  max-height: 500px; /* sesuaikan dengan tinggi konten maksimal */
}

.cart-container.collapsed .cart-content {
  max-height: 0;
  padding: 0;
  margin: 0;
}

.cart-container.expanded .cart-content {
  max-height: 500px; /* atau sesuai tinggi yang kamu mau */
  overflow-y: auto;
}

.cart-container.collapsed .cart-content {
  max-height: 0;
  padding: 0;
  margin: 0;
  overflow: hidden;
}

.cart-content::-webkit-scrollbar {
  width: 6px;
}

.cart-content::-webkit-scrollbar-thumb {
  background-color: #ccc;
  border-radius: 10px;
}

/* CART RESPONSIVE */
@media (max-width: 778px) {
  .cart-container {
    right: 10px;
    left: 10px;
    width: auto;
    top: 120px;
    padding: 15px;
  }
}

@media (max-width: 576px) {
  .cart-container {
    top: 110px;
    left: 10px;
    right: 10px;
    width: auto;
    padding: 15px;
  }

  .cart-header span {
    font-size: 16px;
  }

  .cart-total p {
    font-size: 18px;
  }

  .btn-primary {
    font-size: 14px;
    padding: 8px;
  }
}



</style>
 <?php if (!empty($cart)) : ?>
            <div class="cart-container">

                <div class="cart-header" onclick="toggleCart()">
                    <span>Keranjang</span>
                    <ion-icon id="toggleIcon" name="chevron-up-outline"></ion-icon>
                </div>

                <div class="cart-content">
                    <div class="cart-items">
                        <?php foreach ($cart as $item) : ?>
                            <div class="cart-item d-flex justify-content-between align-items-center mb-2">
                                <div>
                                    <h6 class="produk-name"><?= $item['nama_produk'] ?></h6>
                                    <p class="produk-price-qty">Rp. <?= number_format($item['harga'], 0, ',', '.') ?>/hari - Qty: <?= $item['qty'] ?></p>
                                    <p class="produk-subtotal">Sub Total: Rp. <?= number_format($item['subtotal'], 0, ',', '.') ?></p>
                                </div>
                                <a href="<?= base_url('menu/keranjang_delete/' . $item['id_produk']) ?>" class="trash-icon">
                                    <ion-icon name="trash-sharp"></ion-icon>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="cart-total">
                        <p>Total: Rp <?= number_format($total, 0, ',', '.') ?></p>
                        <button type="button" class="btn btn-primary btn-block" onclick="confirmBayar()">Book Now</button>
                    </div>
                </div>
            </div>
        <?php endif; ?>

<script type="text/javascript">
  if (window.innerWidth < 576) {
  cartContainer.classList.remove('expanded');
  cartContainer.classList.add('collapsed');
}

	function toggleCart() {
			const cartContainer = document.querySelector('.cart-container');
			const toggleIcon = document.getElementById('toggleIcon');

			// Toggle kelas 'collapsed'
			if (cartContainer.classList.contains('collapsed')) {
				cartContainer.classList.remove('collapsed');
				cartContainer.classList.add('expanded');
				// Ganti ikon menjadi panah ke atas
				toggleIcon.setAttribute('name', 'chevron-up-outline');
			} else {
				cartContainer.classList.remove('expanded');
				cartContainer.classList.add('collapsed');
				// Ganti ikon menjadi panah ke bawah
				toggleIcon.setAttribute('name', 'chevron-down-outline');
			}
		}

		// Secara default, tampilkan keranjang dalam keadaan expanded.
		document.addEventListener('DOMContentLoaded', function() {
			const cartContainer = document.querySelector('.cart-container');
			cartContainer.classList.add('expanded');
		});

		function confirmBayar() {
			window.location.href = "<?= base_url('menu') ?>";
		}

		setTimeout(function() {
			var errorAlert = document.getElementById('error-alert');
			var successAlert = document.getElementById('success-alert');

			if (errorAlert) errorAlert.style.display = 'none';
			if (successAlert) successAlert.style.display = 'none';
		}, 3000);

		document.getElementById('redirect_url').value = window.location.href;
</script>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>