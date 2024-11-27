<?php require base_path('views/partials/head.php') ?>

<div class="col">
    <section>

    <div class="mt-5">
    <a href="/penerimaan/create" class="btn btn-secondary">Tambah</a>
    </div>

    

        <div class="card mt-3">
    <table class="table table-striped mb-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Nama Gudang</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($penerimaan as $terima) : ?>
                    <tr>
                        <td><?= $terima['id'] ?></td>
                        <td><?= $terima['nama_barang'] ?></td>
                        <td><?= $terima['nama_gudang'] ?></td>
                        <td><?= $terima['keterangan'] ?></td>
                        <td><?= $terima['status'] == 1 ? '<span class="badge rounded-pill bg-success">active</span>':'<span class="badge rounded-pill bg-danger">inactive</span>' ?></td>
                        <td>
                            <a href="/penerimaan/edit?id=<?= $terima['id'] ?>" class="btn btn-warning">Edit</a>

                            <form action="/penerimaan" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda Yakin?')">
                                <input type="hidden" name="_method" value="delete">
                                <input type="hidden" name="id" value="<?= $terima['id'] ?>">  
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