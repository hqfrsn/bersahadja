<style>
	:root {
		--warna-hijau: #2E5A3B;
	}

	#sidebar {
		position: fixed;
		top: 102px;
		left: 0;
		height: calc(100vh - 100px);
		width: 165px;
		background-color: var(--warna-hijau);
		color: white;
		padding: 20px;
		z-index: 2000;
		overflow-y: auto;
		transition: transform 0.3s ease;
	}

	#sidebar h4 {
		color: white;
		font-weight: bold;
	}

	#sidebar .nav-link {
		color: white;
		font-weight: 500;
		text-align: center;
		padding: 10px 0;
		border-bottom: 1px solid rgba(255, 255, 255, 0.3);
	}

	#sidebar .nav-link:hover {
		background-color: rgba(255, 255, 255, 0.1);
		border-radius: 5px;
	}

	#img-sidebar {
		width: 40px;
		height: 40px;
		object-fit: cover;
		border-radius: 50%;
		margin-bottom: 5px;
	}

	#logo {
		width: 40px;
		height: 40px;
		margin-right: 8px;
	}

	.main-content {
		margin-left: 165px;
		padding: 20px;
	}

	#sidebar::-webkit-scrollbar {
		width: 0px;
		background: transparent;
	}

	#sidebar {
		scrollbar-width: none;
		-ms-overflow-style: none;
	}

	#sidebarToggle {
		display: none;
		position: fixed;
		top: 110px;
		left: 10px;
		z-index: 2100;
		background-color: var(--warna-hijau);
		color: white;
		border: none;
		padding: 10px 12px;
		border-radius: 5px;
	}

	@media (max-width: 575.98px) {
		#sidebar h4 {
			font-size: 16px;
			padding-top: 40px;
		}
	}

	@media (max-width: 767px) {
		#sidebar {
			transform: translateX(-100%);
		}

		#sidebar.active {
			transform: translateX(0);
		}

		#sidebarToggle {
			display: block;
		}

		.main-content {
			margin-left: 0;
		}
	}
</style>

<nav id="sidebar">
	<h4 class="text-center mb-4 d-flex align-items-center justify-content-center">
		<img src="<?= base_url('assets/foto/logo.png'); ?>" alt="Logo" style="height: 80px;">
	</h4>
	<ul class="nav flex-column">
		<?php foreach ($kategori as $k): ?>
			<li class="nav-item mb-2">
				<a class="nav-link" href="<?= site_url('menu/kategori/' . $k['id_kategori']) ?>">
					<img id="img-sidebar" src="<?= base_url('assets/foto/a.jpg'); ?>"><br>
					<?= $k['nama_kategori'] ?>
				</a>
			</li>
		<?php endforeach; ?>

		<li class="nav-item mb-2">
			<a class="nav-link" href="<?= base_url('menu') ?>">
				<img id="img-sidebar" src="<?= base_url('assets/foto/a.jpg'); ?>"><br>
				Makanan
			</a>
		</li>
		<li class="nav-item mb-2">
			<a class="nav-link" href="<?= base_url('menu') ?>">
				<img id="img-sidebar" src="<?= base_url('assets/foto/a.jpg'); ?>"><br>
				Makanan
			</a>
		</li>
		<li class="nav-item mb-2">
			<a class="nav-link" href="<?= base_url('menu') ?>">
				<img id="img-sidebar" src="<?= base_url('assets/foto/a.jpg'); ?>"><br>
				Makanan
			</a>
		</li>
		<li class="nav-item mb-2">
			<a class="nav-link" href="<?= base_url('menu') ?>">
				<img id="img-sidebar" src="<?= base_url('assets/foto/a.jpg'); ?>"><br>
				Makanan
			</a>
		</li>
		<li class="nav-item mb-2">
			<a class="nav-link" href="<?= base_url('menu') ?>">
				<img id="img-sidebar" src="<?= base_url('assets/foto/a.jpg'); ?>"><br>
				Makanan
			</a>
		</li>
		<li class="nav-item mb-2">
			<a class="nav-link" href="<?= base_url('menu') ?>">
				<img id="img-sidebar" src="<?= base_url('assets/foto/a.jpg'); ?>"><br>
				Makanan
			</a>
		</li>
		<li class="nav-item mb-2">
			<a class="nav-link" href="<?= base_url('menu') ?>">
				<img id="img-sidebar" src="<?= base_url('assets/foto/a.jpg'); ?>"><br>
				Makanan
			</a>
		</li>
	</ul>
</nav>

<script>
	document.getElementById('sidebarToggle').addEventListener('click', function() {
		document.getElementById('sidebar').classList.toggle('active');
	});
</script>