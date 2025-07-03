<style>
	body {
		padding-top: 120px;
	}

	.promo-banner {
		position: fixed;
		top: 0;
		width: 100%;
		background-color: #2E5A3B;
		z-index: 1040;
	}

	.navbar {
		position: fixed;
		top: 36px;
		width: 100%;
		z-index: 1030;
	}
</style>

<!-- Promo Banner -->
<div class="promo-banner text-white text-center py-2">
	Selamat datang di <strong>Bersahadja</strong> Coffee Shop.
</div>

<!-- Navbar -->
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
	<div class="container">
		<a class="navbar-brand" href="#">
			<img src="<?= base_url('assets/foto/logo.png'); ?>" alt="Logo" style="height: 40px;">
			B E R S A H A D J A
		</a>

		<!-- Toggle Button for Mobile -->
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
			aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<!-- Menu Links -->
		<div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
			<ul class="navbar-nav mb-2 mb-xxl-0 align-items-center">
				<li class="nav-item">
					<a class="nav-link" href="#">Makanan</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Minuman</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Paket</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Promo</a>
				</li>
			</ul>
		</div>
	</div>
</nav>