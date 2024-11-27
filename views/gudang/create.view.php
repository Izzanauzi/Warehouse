<?php require base_path('views/partials/head.php') ?>

    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                <?php if (isset($errors)) : ?>
                        <?php foreach ($errors as $error) : ?>
                            <div class="alert alert-danger"><?= $error ?></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <form action="/gudang" method="post">
                        <div class="mb-3">
                            <label for="nama_gudang" class="form-label">Nama Gudang</label>
                            <input name="nama_gudang" type="text" class="form-control" id="nama_gudang" placeholder="Nama Gudang"  value="<?= old('nama_gudang') ?>">
                        </div>
                        <div class="mb-3">
                            <label for="alamat_gudang" class="form-label">Alamat Gudang</label>
                            <input name="alamat_gudang" type="text" class="form-control" id="alamat_gudang" placeholder="Alamat Gudang"  value="<?= old('alamat_gudang') ?>">
                        </div>
                        <div class="mb-3">
                            <label for="kode_pos" class="form-label">Kode Pos</label>
                            <input name="kode_pos" type="integer" class="form-control" id="kode_pos" placeholder="Kode Pos"  value="<?= old('kode_pos') ?>">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3" placeholder="Deskripsi"><?= old('deskripsi') ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="pj" class="form-label">Penanggung Jawab</label>
                            <input name="pj" type="text" class="form-control" id="pj" placeholder="Penanggung Jawab"value="<?= old('pj') ?>">
                        </div>
                        <div class="form-check">
                            <input name="status" class="form-check-input" type="checkbox" value="1" id="status" <?= old('status') == 1 ? 'checked' : '' ?>>
                            <label class="form-check-label" for="status">
                                Aktif
                            </label>
                        </div>
                        <div class="text-end mt-3">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require base_path('views/partials/footer.php') ?>