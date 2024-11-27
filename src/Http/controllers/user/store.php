<?php 

use App\Core\App;
use App\Core\Database;
use Rakit\Validation\Validator;

$validator = new Validator;
$db = App::resolve(Database::class);

$validation = $validator->validate($_POST, [
    'nama_pengguna'     => 'required',
    'username'          => 'required',
    'password'          => 'required',
]);

if ($validation->fails()) {
    return view('user/create.view.php', [
        'errors' => $validation->errors()->all()
    ]);
}

$db->query('INSERT INTO `users` (`nama_pengguna`, `username`, `password`, `status`, `created_at`) VALUES (:nama_pengguna, :username, :password, :status, :created_at)', [
    'nama_pengguna'           => $_POST['nama_pengguna'],
    'username'         => $_POST['username'],
    'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
    'status'                => $_POST['status'] ?? 0,
    'created_at'            => date('Y-m-d H:i:s'),
]);


return redirect('/user');