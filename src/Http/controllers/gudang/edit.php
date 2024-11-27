<?php

use App\Core\App;
use App\Core\Database;

$db = App::resolve(Database::class);

$daftar_gudang = $db->query("SELECT * FROM `daftar_gudang` WHERE `id` = :id", [
    'id' => $_GET['id']
])->find();

return view('gudang/edit.view.php', [
    'daftar_gudang' => $daftar_gudang
]);

