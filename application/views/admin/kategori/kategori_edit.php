<div class="modal fade" id="editKategoriModal" tabindex="-1" role="dialog" aria-labelledby="editKategoriModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editkategoriModalLabel">Edit kategori</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= validation_errors() ?>
				<?= form_open('Admin/kategori/kategori_editsave/' . $kategori['id_kategori']) ?>
				<div class="form-group">
					<label for="nama_kategori">Kategori</label>
					<input type="text" name="nama_kategori" class="form-control" id="nama_kategori" value="<?= $kategori['nama_kategori'] ?>" required>
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