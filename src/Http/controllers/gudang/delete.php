<?php

use App\Core\App;
use App\Core\Database;

$db = App::resolve(Database::class);

$daftar_gudang = $db->query("SELECT * FROM `daftar_gudang` WHERE `id` = :id", [
    'id' => $_POST['id']
])->findOrFail();

$db->query("UPDATE `daftar_gudang` SET `deleted_at` = :deleted_at WHERE `id` = :id", [
    'deleted_at' => date('Y-m-d H:i:s'),
    'id' => $_POST['id']
]);

return redirect('/gudang');