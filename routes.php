<?php

$router->get('/', 'index.php')->only('auth');
$router->get('/about', 'about.php')->only('auth');

//login
$router->get('/login', 'auth/login.php');
$router->post('/login', 'auth/do_login.php');
$router->delete('/logout', 'auth/logout.php')->only('auth');


//penerimaan
$router->get('/penerimaan', 'penerimaan/index.php')->only('auth');
$router->post('/penerimaan', 'penerimaan/store.php')->only('auth');
$router->post('/penerimaan', 'penerimaan/update.php')->only('auth');
$router->put('/penerimaan', 'penerimaan/update.php')->only('auth');
$router->delete('/penerimaan', 'penerimaan/delete.php')->only('auth');
$router->get('/penerimaan/create', 'penerimaan/create.php')->only('auth');
$router->get('/penerimaan/edit', 'penerimaan/edit.php')->only('auth');

//pengeluaran
$router->get('/pengeluaran', 'pengeluaran/index.php')->only('auth');

//gudang
$router->get('/gudang', 'gudang/index.php')->only('auth');
$router->post('/gudang', 'gudang/store.php')->only('auth');
$router->post('/gudang', 'gudang/update.php')->only('auth');
$router->put('/gudang', 'gudang/update.php')->only('auth');
$router->delete('/gudang', 'gudang/delete.php')->only('auth');
$router->get('/gudang/create', 'gudang/create.php')->only('auth');
$router->get('/gudang/edit', 'gudang/edit.php')->only('auth');

//user
$router->get('/user', 'user/index.php')->only('auth');
$router->post('/user', 'user/store.php')->only('auth');
$router->post('/user', 'user/update.php')->only('auth');
$router->put('/user', 'user/update.php')->only('auth');
$router->delete('/user', 'user/delete.php')->only('auth');
$router->get('/user/create', 'user/create.php')->only('auth');
$router->get('/user/edit', 'user/edit.php')->only('auth');

