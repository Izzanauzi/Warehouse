<?php

use App\Core\App;
use App\Core\Database;
use Rakit\Validation\Validator;

$validator = new Validator();
$db = App::resolve(Database::class);

$daftar_gudang = $db->query("SELECT * FROM `daftar_gudang` WHERE `id` = :id", [
    'id' => $_POST['id']
])->findOrFail();

$rules = [
    'nama_gudang'           => 'required',
    'alamat_gudang'         => 'required',
    'kode_pos'              => 'required',
    'deskripsi'             => 'required',
    'pj'                    => 'required',
];

$validation = $validator->validate($_POST, $rules);

if ($validation->fails()) {
    return view('gudang/edit.view.php', [
        'errors' => $validation->errors()->all(),
        'daftar_gudang' => $daftar_gudang
    ]);
}

$query = 'UPDATE `daftar_gudang` SET `nama_gudang` = :nama_gudang, `alamat_gudang` = :alamat_gudang, `kode_pos` = :kode_pos, `deskripsi` = :deskripsi, `pj` = :pj, `status` = :status, `updated_at` = :updated_at WHERE `id` = :id';
$params = [
    'id' => $_POST['id'],
    'nama_gudang' => $_POST['nama_gudang'],
    'alamat_gudang' => $_POST['alamat_gudang'],
    'kode_pos' => $_POST['kode_pos'],
    'deskripsi' => $_POST['deskripsi'],
    'pj' => $_POST['pj'],
    'status' => $_POST['status'] ?? 0,
    'updated_at' => date('Y-m-d H:i:s'),
];

$db->query($query, $params);

return redirect('/gudang');