<?php 

use App\Core\App;
use App\Core\Database;
use Rakit\Validation\Validator;

$validator = new Validator;
$db = App::resolve(Database::class);

$validation = $validator->validate($_POST, [
    'nama_gudang'           => 'required',
    'alamat_gudang'         => 'required',
    'kode_pos'              => 'required',
    'deskripsi'             => 'required',
    'pj'                    => 'required',
]);

if ($validation->fails()) {
    return view('gudang/create.view.php', [
        'errors' => $validation->errors()->all()
    ]);
}

$db->query('INSERT INTO `daftar_gudang` (`nama_gudang`, `alamat_gudang`, `kode_pos`, `deskripsi`, `pj`, `status`, `created_at`) VALUES (:nama_gudang, :alamat_gudang, :kode_pos, :deskripsi, :pj, :status, :created_at)', [
    'nama_gudang'           => $_POST['nama_gudang'],
    'alamat_gudang'         => $_POST['alamat_gudang'],
    'kode_pos'              => $_POST['kode_pos'],
    'deskripsi'             => $_POST['deskripsi'],
    'pj'                    => $_POST['pj'],
    'status'                => $_POST['status'] ?? 0,
    'created_at'            => date('Y-m-d H:i:s'),
]);


return redirect('/gudang');