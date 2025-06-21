<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gudang</title>
  <link rel="website icon" href="/assets/img/cube.ico">
  <!-- CSS -->
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/styles.css">
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-2">
        <section>
          <div class="d-flex flex-column flex-shrink-0 p-3 text-dark sidebar border-end" style="width: 280px;">
            <a href="" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
              <span class="fs-4 text-dark<?= urlIs('/') ? '' : ''; ?>" href="/">
                <h3>Warehouse</h3>
              </span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
              <li class="nav-item">
                <a class="nav-link text-dark mb-1 <?= urlIs('/') ? 'active' : ''; ?>" href="/">Dasboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark mb-1 <?= urlIs('/penerimaan') ? 'active' : ''; ?>" href="/penerimaan">Penerimaan Barang</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark mb-1 <?= urlIs('/pengeluaran') ? 'active' : ''; ?>" href="/pengeluaran">Pengeluaran Barang</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark mb-1 <?= urlIs('/inventory') ? 'active' : ''; ?>" href="/">Inventory</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark mb-1 <?= urlIs('/gudang') ? 'active' : ''; ?>" href="/gudang">Daftar Gudang</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark mb-1 <?= urlIs('/report') ? 'active' : ''; ?>" href="/">Report</a>
              </li>
            </ul>
            <hr>
            <div class="dropup">
              <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                <img src="/Assets/img/user-profile.png" alt="" width="32" height="32" class="rounded-circle me-2 mr-3">
                <strong>User</strong>
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">New project...</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <form class="d-flex" action="/logout" method="post" onsubmit="return confirm('Apakah anda yakin ingin logout?')">
                  <input type="hidden" name="_method" value="delete">
                  <li><a class="dropdown-item"><button class="border-0 btn-logout" type="submit">Logout</button></a></li>

                </form>
              </ul>
            </div>
          </div>
        </section>
      </div>