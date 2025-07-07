<style>
.cart-container {
  position: fixed;
  top: 0;
  right: 0;
  height: 100vh;
  width: 350px;
  background: #fff;
  border-left: 1px solid #ddd;
  box-shadow: -2px 0 10px rgba(0, 0, 0, 0.1);
  z-index: 10000;
  padding: 20px;
  overflow-y: auto;
  transform: translateX(100%);
  transition: transform 0.3s ease-in-out;
}

.cart-container.show {
  transform: translateX(0);
}

.cart-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding-bottom: 10px;
  border-bottom: 1px solid #ddd;
  margin-bottom: 10px;
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

/* Responsive */
@media (max-width: 576px) {
  .cart-container {
    width: 100%;
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

<!-- Tombol toggle keranjang -->
<button id="cartToggleBtn" class="btn btn-light"
  style="position: fixed; top: 110px; right: 20px; z-index: 10001;">
  <ion-icon name="cart-outline" style="font-size: 29px; margin-top: 5px;"></ion-icon>
</button>

<div class="cart-container" id="cartDrawer">
  <div class="cart-header">
    <span>Keranjang</span>
    <ion-icon name="close-outline" onclick="closeCart()" style="cursor: pointer;"></ion-icon>
  </div>

  <div class="cart-content">
    <div class="cart-items">
      <?php if (!empty($cart)) : ?>
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
      <?php else : ?>
        <p class="text-muted text-center">Keranjang kosong</p>
      <?php endif; ?>
    </div>

    <?php if (!empty($cart)) : ?>
      <div class="cart-total">
        <p>Total: Rp <?= number_format($total, 0, ',', '.') ?></p>
        <button type="button" class="btn btn-primary btn-block" onclick="confirmBayar()">Book Now</button>
      </div>
    <?php endif; ?>
  </div>
</div>


<script>
    const cartToggleBtn = document.getElementById('cartToggleBtn');
  const cartDrawer = document.getElementById('cartDrawer');

  if (cartToggleBtn && cartDrawer) {
    cartToggleBtn.addEventListener('click', () => {
      cartDrawer.classList.add('show');
      cartToggleBtn.style.display = 'none'; // SEMBUNYIKAN tombol saat dibuka
    });

    document.addEventListener('click', function (e) {
      if (!cartDrawer.contains(e.target) && !cartToggleBtn.contains(e.target)) {
        cartDrawer.classList.remove('show');
        cartToggleBtn.style.display = 'block'; // MUNCULKAN kembali tombol
      }
    });
  }

  function closeCart() {
    cartDrawer.classList.remove('show');
    cartToggleBtn.style.display = 'block'; // MUNCULKAN kembali tombol
  }

  function confirmBayar() {
    window.location.href = "<?= base_url('menu') ?>";
  }
</script>


	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>