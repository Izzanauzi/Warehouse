<?php require base_path('views/partials/head.php') ?>

<div class="col">
    <section>

    <div class="mt-5">
    <a href="/user/create" class="btn btn-secondary">Tambah</a>
    </div>

    

        <div class="card mt-3">
    <table class="table table-striped mb-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Pengguna</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Status</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['nama_pengguna'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['password'] ?></td>
                        <td><?= $user['status'] == 1 ? '<span class="badge rounded-pill bg-success">active</span>':'<span class="badge rounded-pill bg-danger">inactive</span>' ?></td>
                        <td>
                            <a href="/user/edit?id=<?= $user['id'] ?>" class="btn btn-warning">Edit</a>

                            <form action="/user" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda Yakin?')">
                                <input type="hidden" name="_method" value="delete">
                                <input type="hidden" name="id" value="<?= $user['id'] ?>">  
                            <button class="btn btn-danger" type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>  
        </div>
    </section>
          </div>
        </div>
      </div>

<?php require base_path('views/partials/footer.php') ?>