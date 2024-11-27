<?php

use App\Core\App;
use App\Core\Database;
use Rakit\Validation\Validator;

$validator = new Validator();
$db = App::resolve(Database::class);

$users = $db->query("SELECT * FROM `users` WHERE `id` = :id", [
    'id' => $_POST['id']
])->findOrFail();

$rules = [
    'nama_pengguna'     => 'required',
    'username'          => 'required',
];

if (!empty($_POST['password'])) {
    $rules = array_merge($rules, [
        'password' => 'required|min:6',
        'confirm_password' => 'required|same:password',
    ]);
}


$validation = $validator->validate($_POST, $rules);

if ($validation->fails()) {
    return view('user/edit.view.php', [
        'errors' => $validation->errors()->all(),
        'users' => $users
    ]);
}

$query = 'UPDATE `users` SET `nama_pengguna` = :nama_pengguna, `username` = :username, `password` = :password, `status` = :status, `updated_at` = :updated_at WHERE `id` = :id';
$params = [
    'id' => $_POST['id'],
    'nama_pengguna' => $_POST['nama_pengguna'],
    'username' => $_POST['username'],
    'password' => $_POST['password'],
    'status' => $_POST['status'] ?? 0,
    'updated_at' => date('Y-m-d H:i:s'),
];

$db->query($query, $params);

return redirect('/user');