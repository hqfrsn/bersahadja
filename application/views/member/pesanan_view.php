<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Form Pesanan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: #f4f6f9;
      font-family: 'Poppins', sans-serif;
    }

    .card {
      border: none;
      border-radius: 15px;
    }

    .form-label {
      font-weight: 600;
    }

    .table th, .table td {
      vertical-align: middle;
    }

    .table thead {
      background-color: #e9ecef;
    }

    .btn-primary {
      background-color: #007bff;
      border: none;
    }

    .btn-primary:hover {
      background-color: #0056b3;
    }

    .btn-outline-secondary:hover {
      background-color: #dee2e6;
    }

    .section-title {
      font-weight: 700;
      font-size: 1.5rem;
      color: #343a40;
      margin-bottom: 1rem;
    }

    .total-box {
      font-weight: bold;
      font-size: 1.1rem;
      border-top: 1px solid #dee2e6;
      padding-top: 10px;
    }
  </style>
</head>
<body>
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="card shadow p-4">
          <h2 class="section-title text-center">Formulir Pemesanan</h2>

          <?= validation_errors('<div class="alert alert-danger">', '</div>') ?>
          <?= form_open('pesanan/bayar') ?>

          <!-- Tabel Keranjang -->
          <div class="mb-4">
            <h5 class="mb-3">Keranjang Belanja</h5>
            <div class="table-responsive">
              <table class="table table-bordered table-striped">
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
                    <tr>
                      <td colspan="3" class="text-center text-muted">Keranjang kosong</td>
                    </tr>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>

            <div class="text-end total-box">
              Total: Rp <?= number_format($total, 0, ',', '.') ?>
            </div>
          </div>

          <!-- Tombol Aksi -->
          <div class="d-flex justify-content-between mt-4">
            <a href="<?= base_url('menu') ?>" class="btn btn-outline-secondary">← Kembali ke Menu</a>
            <button type="submit" class="btn btn-primary">Bayar Sekarang</button>
          </div>

          <?= form_close() ?>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
