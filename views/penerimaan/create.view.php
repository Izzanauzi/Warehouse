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
                <form action="/penerimaan" method="post">
                    <div class="mb-3">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input name="nama_barang" type="text" class="form-control" id="nama_barang" placeholder="Nama Barang" value="<?= old('nama_barang') ?>">
                    </div>
                    <div class="mb-3">
                        <label for="gudangSelect" class="form-label">Lokasi Gudang</label>
                        <select name="gudang_id" id="gudangSelect" class="form-select">
                            <option values="">Pilih Gudang</option>
                            <?php foreach ($daftar_gudang as $gudang) : ?>
                                <option name="gudang_id" value="<?= $gudang['id'] ?>" <?= old('gudang_id') == $gudang['id'] ? 'checked' : '' ?>><?= $gudang['nama_gudang'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea name="keterangan" class="form-control" id="keterangan" rows="3" placeholder="Keterangan"><?= old('keterangan') ?></textarea>
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