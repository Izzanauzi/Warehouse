<?php require base_path('views/partials/head.php') ?>

<div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <?php if (isset($errors)) : ?>
                        <?php foreach ($errors as $error) : ?>
                            <div class="alert alert-danger"><?= $error ?></div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <form action="/gudang" method="post">
                        <input type="hidden" name="_method" value="put">
                        <input type="hidden" name="id" value="<?= $daftar_gudang['id'] ?>">

                        <div class="mb-3">
                            <label for="nama_gudang" class="form-label">Nama Gudang</label>
                            <input name="nama_gudang" type="text" class="form-control" id="nama_gudang" placeholder="Nama Lengkap" value="<?= old('nama_gudang', $daftar_gudang['nama_gudang']) ?>">
                        </div>
                        <div class="mb-3">
                            <label for="alamat_gudang" class="form-label">Alamat Gudang</label>
                            <input name="alamat_gudang" type="text" class="form-control" id="alamat_gudang" placeholder="Alamat Gudang" value="<?= old('alamat_gudang', $daftar_gudang['alamat_gudang']) ?>">
                        </div>
                        <div class="mb-3">
                            <label for="kode_pos" class="form-label">Kode Pos</label>
                            <input name="kode_pos" type="kode_pos" class="form-control" id="kode_pos" placeholder="Kode Pos" value="<?= old('kode_pos', $daftar_gudang['kode_pos']) ?>">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3"><?= old('deskripsi', $daftar_gudang['deskripsi']) ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="pj" class="form-label">Penanggung Jawab</label>
                            <input name="pj" type="pj" class="form-control" id="pj" placeholder="Penanggung Jawab" value="<?= old('pj', $daftar_gudang['pj']) ?>">
                        </div>
                        <div class="form-check">
                            <input name="status" class="form-check-input" type="checkbox" value="1" id="statusCheckbox" <?= old('status', $daftar_gudang['status']) == 1 ? 'checked' : '' ?>>
                            <label class="form-check-label" for="statusCheckbox">
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