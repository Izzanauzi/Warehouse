<?php

use App\Core\App;
use App\Core\Database;

$db = App::resolve(Database::class);

$daftar_gudang = $db->query("SELECT * FROM `daftar_gudang` WHERE `deleted_at` IS NULL AND `status` = 1")->get();

return view('penerimaan/create.view.php', [
    'daftar_gudang' => $daftar_gudang
]);
