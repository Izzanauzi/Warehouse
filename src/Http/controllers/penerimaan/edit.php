<?php

use App\Core\App;
use App\Core\Database;

$db = App::resolve(Database::class);

$daftar_gudang = $db->query("SELECT * FROM `daftar_gudang` WHERE `deleted_at` IS NULL AND `status` = 1")->get();

$penerimaan = $db->query("SELECT * FROM `penerimaan` WHERE `id` = :id", [
    'id' => $_GET['id']
])->find();

return view('penerimaan/edit.view.php', [
    'penerimaan' => $penerimaan
]);

