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
                    <form action="/user" method="post">
                        <div class="mb-3">
                            <label for="nama_pengguna" class="form-label">Nama Pengguna</label>
                            <input name="nama_pengguna" type="text" class="form-control" id="nama_pengguna" placeholder="Nama Pengguna"  value="<?= old('nama_pengguna') ?>">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">username</label>
                            <input name="username" type="text" class="form-control" id="username" placeholder="username"  value="<?= old('username') ?>">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input name="password" type="password" class="form-control" id="password" placeholder="Password"  value="<?= old('password') ?>">
                        </div>
                        <div class="mb-3">
                            <label for="confirmPasswordInput" class="form-label">Konfirmasi Password</label>
                            <input name="confirm_password" type="password" class="form-control" id="confirmPasswordInput" placeholder="Konfirmasi Password">
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