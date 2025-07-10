<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Riwayat Pesanan</title>
	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
	<style type="text/css">
		body {
			font-family: 'Poppins', sans-serif;
			background-color: #f8f9fa;
			padding-top: 80px;
		}

		.card {
			margin: auto;
			margin-bottom: 30px;
			box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
		}

		.card-header {
			padding: 10px;
		}
	</style>
</head>

<body>
	<div class="container">
		<div class="card">
			<div class="card-header">
				<h2 class="mb-0">Riwayat Penyewaan</h2>
			</div>
			<div class="card-body">
				<?php if (!empty($sewa)) : ?>
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>ID Pesanan</th>
									<th>Status</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($pesanan as $p) : ?>
									<tr>
										<td><?= $s['id_pesanan'] ?></td>
										<td><?= date('d-m-Y', strtotime($s['tanggal_pesanan'])) ?></td>
										<td>
											<span class="badge bg-info text-dark">
												<?= ucfirst($s['status_sewa']) ?>
											</span>
										</td>
										<td>
											<a href="<?= base_url('member/datasewa/detail_sewa/' . $s['id_sewa']) ?>" class="btn btn-sm btn-outline-primary">Detail</a>
											<?php if ($s['status_sewa'] !== 'cancel') : ?>
												<a href="<?= base_url('member/datasewa/cancel/' . $s['id_sewa']) ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin ingin membatalkan?')">Batalkan</a>
											<?php endif; ?>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				<?php else : ?>
					<div class="alert alert-warning" role="alert">
						Belum ada riwayat penyewaan.
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>