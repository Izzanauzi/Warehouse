<?php

use App\Core\App;
use App\Core\Database;
use Rakit\Validation\Validator;

$validator = new Validator();
$db = App::resolve(Database::class);

$penerimaan = $db->query("SELECT * FROM `penerimaan` WHERE `id` = :id", [
    'id' => $_POST['id']
])->findOrFail();

$rules = [
    'nama_barang'     => 'required',
    'gudang_id'          => 'required',
    'keterangan'          => 'required',
];


$validation = $validator->validate($_POST, $rules);

if ($validation->fails()) {
    return view('penerimaan/edit.view.php', [
        'errors' => $validation->errors()->all(),
        'penerimaan' => $penerimaan
    ]);
}

$penerimaan = $db->query(
    "SELECT pn.id, pn.nama_barang, dg.nama_gudang, pn.keterangan, pn.status
    FROM penerimaan pn
    LEFT JOIN daftar_gudang dg ON pn.gudang_id = dg.id
    WHERE pn.deleted_at IS NULL
    AND dg.deleted_at IS NULL"
)->get();

$query = 'UPDATE `penerimaan` SET `nama_barang` = :nama_barang, `gudang_id` = :gudang_id, `keterangan` = :keterangan, `status` = :status, `updated_at` = :updated_at WHERE `id` = :id';
$params = [
    'id' => $_POST['id'],
    'nama_barang' => $_POST['nama_barang'],
    'gudang_id' => $_POST['gudang_id'],
    'keterangan' => $_POST['keterangan'],
    'status' => $_POST['status'] ?? 0,
    'updated_at' => date('Y-m-d H:i:s'),
];

$db->query($query, $params);

return redirect('/penerimaan');