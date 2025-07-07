<div class="modal fade" id="addMenuModal" tabindex="-1" role="dialog" aria-labelledby="addMenuModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addMenuModalLabel">Tambah Menu</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= validation_errors() ?>
				<?= form_open('Admin/menu/menu_addsave') ?>
				<div class="form-group">
					<label for="nama_menu">Kategori Menu</label>
					<input type="text" name="nama_menu" class="form-control" id="nama_menu" required>
				</div>
				<div class="form-group">
					<label for="gambar_menu">Gambar Menu</label>
					<input type="file" name="gambar_menu" class="form-control" id="gambar_menu" required>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
				<?= form_close() ?>
			</div>
		</div>
	</div>
</div>