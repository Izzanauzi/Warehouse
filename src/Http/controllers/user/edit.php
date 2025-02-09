<?php

use App\Core\App;
use App\Core\Database;

$db = App::resolve(Database::class);

$users = $db->query("SELECT * FROM `users` WHERE `id` = :id", [
    'id' => $_GET['id']
])->find();

return view('user/edit.view.php', [
    'users' => $users
]);

