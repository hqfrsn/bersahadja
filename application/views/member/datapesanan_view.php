<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }

        .section-title {
            font-weight: 700;
            font-size: 1.8rem;
            margin-top: 30px;
            margin-bottom: 20px;
            text-align: center;
            color: #343a40;
        }

        .card-pesanan {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 25px;
        }

        .card-pesanan .card-body {
            padding: 1.5rem;
        }

        .badge-status {
            font-size: 0.9rem;
            padding: 5px 10px;
            border-radius: 12px;
        }

        .badge-proses {
            background-color: #ffc107;
            color: #212529;
        }

        .badge-selesai {
            background-color: #28a745;
        }

        .badge-cancel {
            background-color: #dc3545;
        }

        .produk-list {
            margin-top: 15px;
        }

        .produk-item {
            padding: 8px 0;
            border-bottom: 1px solid #dee2e6;
        }

        .produk-item:last-child {
            border-bottom: none;
        }

        .produk-nama {
            font-weight: 500;
        }

        .produk-info {
            font-size: 0.9rem;
            color: #555;
        }

        .btn-sm {
            font-size: 0.8rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="section-title">Riwayat Pesanan Anda</h2>

        <?php if (!empty($pesanan)) : ?>
            <?php foreach ($pesanan as $p) : ?>
                <div class="card card-pesanan">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start flex-wrap">
                            <div>
                                <h5 class="mb-1">Pesanan #<?= $p['id_pesanan'] ?></h5>
                                <p class="mb-1 text-muted">Tanggal: <?= date('d M Y, H:i', strtotime($p['tanggal_pesanan'])) ?></p>
                                <span class="badge badge-status 
                                    <?= $p['status_pesanan'] == 'proses' ? 'badge-proses' : ($p['status_pesanan'] == 'selesai' ? 'badge-selesai' : 'badge-cancel') ?>">
                                    <?= ucfirst($p['status_pesanan']) ?>
                                </span>
                            </div>
                            <div class="mt-2 mt-md-0">
                                <?php if ($p['status_pesanan'] === 'proses') : ?>
                                    <a href="<?= base_url('pesanan/status_pesanan/' . $p['id_pesanan'] . '/cancel') ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Batalkan pesanan ini?')">Batalkan</a>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Detail Produk -->
                        <div class="produk-list mt-3">
                            <h6 class="mb-2">Detail Produk:</h6>
                            <?php foreach ($detail_pesanan as $dp) : ?>
                                <?php if ($dp['id_pesanan'] == $p['id_pesanan']) : ?>
                                    <div class="produk-item">
                                    	<div>
                                    		<img src="<?= base_url('assets/foto/' . $dp['gambar_produk']); ?>" class="card-img-top" alt="<?= $dp['nama_produk'] ?>" loading="lazy">
                                    	</div>
                                        <div class="produk-nama"><?= $dp['nama_produk'] ?></div>
                                        <div class="produk-info">Jumlah: <?= $dp['qty'] ?> | Subtotal: Rp <?= number_format($dp['subtotal'], 0, ',', '.') ?></div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="alert alert-warning text-center">
                Belum ada pesanan yang dilakukan.
            </div>
        <?php endif; ?>
    </div>

    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>
