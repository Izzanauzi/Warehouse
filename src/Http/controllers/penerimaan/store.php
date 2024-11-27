<?php 

use App\Core\App;
use App\Core\Database;
use Rakit\Validation\Validator;

$validator = new Validator;
$db = App::resolve(Database::class);

$validation = $validator->validate($_POST, [
    'nama_barang'           => 'required',
    'gudang_id'             => 'required',
    'keterangan'            => 'required',
]);

if ($validation->fails()) {
    return view('penerimaan/create.view.php', [
        'errors' => $validation->errors()->all()
    ]);
}

$db->query('INSERT INTO `penerimaan` (`nama_barang`, `gudang_id`, `keterangan`, `status`, `created_at`) VALUES (:nama_barang, :gudang_id, :keterangan, :status, :created_at)', [
    'nama_barang'           => $_POST['nama_barang'],
    'gudang_id'             => $_POST['gudang_id'],
    'keterangan'            => $_POST['keterangan'],
    'status'                => $_POST['status'] ?? 0,
    'created_at'            => date('Y-m-d H:i:s'),
]);


return redirect('/penerimaan');