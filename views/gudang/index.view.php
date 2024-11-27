<?php require base_path('views/partials/head.php') ?>

<div class="col">
    <section>

    <div class="mt-5">
    <a href="/gudang/create" class="btn btn-secondary">Tambah</a>
    </div>

    

        <div class="card mt-3">
    <table class="table table-striped mb-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Gudang</th>
                    <th>Alamat Gudang</th>
                    <th>Kode Pos</th>
                    <th>Deskripsi</th>
                    <th>Penanggung Jawab</th>
                    <th>Status</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($daftar_gudang as $gudang) : ?>
                    <tr>
                        <td><?= $gudang['id'] ?></td>
                        <td><?= $gudang['nama_gudang'] ?></td>
                        <td><?= $gudang['alamat_gudang'] ?></td>
                        <td><?= $gudang['kode_pos'] ?></td>
                        <td><?= $gudang['deskripsi'] ?></td>
                        <td><?= $gudang['status'] == 1 ? '<span class="badge rounded-pill bg-success">active</span>':'<span class="badge rounded-pill bg-danger">inactive</span>' ?></td>
                        <td>
                            <a href="/gudang/edit?id=<?= $gudang['id'] ?>" class="btn btn-warning">Edit</a>

                            <form action="/gudang" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda Yakin?')">
                                <input type="hidden" name="_method" value="delete">
                                <input type="hidden" name="id" value="<?= $gudang['id'] ?>">  
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