<?php

use App\Core\App;
use App\Core\Database;
use Firebase\JWT\JWT;
use Rakit\Validation\Validator;

$db = App::resolve(Database::class);
$validator = new Validator();

$validation = $validator->validate($_POST, [
    'username' => 'required',
    'password' => 'required'
]);

if ($validation->fails()){
    return view('auth/login.view.php',[
        'errors' => $validation->errors()->all()
    ]);
}

$user = $db->query("SELECT * FROM `users` WHERE `username` = :username", [
    'username' => $_POST['username']
])->find();

if (!$user) {
    return view('auth/login.view.php', [
        'errors' => ['Username atau password tidak tepat.']
    ]);
}

if (!password_verify($_POST['password'], $user['password'])) {
    return view('auth/login.view.php', [
        'errors' => ['Username atau password tidak tepat.']
    ]);
}

$expire_at = time() + (60 * 60 * 24 * 2);
$expire_at_db = date('Y-m-d H:i:s', $expire_at);
$ip_address = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];

$config = require base_path('config.php');

$token = JWT::encode([
    'iat' => $expire_at,
    'user' => [
        'id' => $user['id'],
        'nama_pengguna' => $user['nama_pengguna'],
        'username' => $user['username'],
    ]
], $config['jwt']['key'], 'HS256');

$db->query("INSERT INTO `sessions` SET `user_id` = :user_id, `token` = :token, `start_at` = :start_at, `expire_at` = :expire_at, `ip_address` = :ip_address, `user_agent` = :user_agent", [
    'user_id' => $user['id'],
    'token' => $token,
    'start_at' => date('Y-m-d H:i:s'),
    'expire_at' => $expire_at_db,
    'ip_address' => $ip_address,
    'user_agent' => $user_agent
]);

setcookie('X-SESSION-APP', $token, $expire_at, '/');
return redirect('/');