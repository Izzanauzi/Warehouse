<?php

use App\Core\App;
use App\Core\Database;
use Cake\Database\Query;

$db = App::resolve(Database::class);

// $penerimaan = $db->query("SELECT `gudang_id`.*, AS `g_id` FROM `penerimaan` as `p` JOIN `daftar_gudang` ON g_id = `nama_gudang` WHERE `p`.`deleted_at` IS NULL")
//     ->get();
    
$penerimaan = $db->query(
    "SELECT pn.id, pn.nama_barang, dg.nama_gudang, pn.keterangan, pn.status
    FROM penerimaan pn
    LEFT JOIN daftar_gudang dg ON pn.gudang_id = dg.id
    WHERE pn.deleted_at IS NULL
    AND dg.deleted_at IS NULL"
)->get();

return view('penerimaan/index.view.php', [
    'penerimaan' => $penerimaan
]);