<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Framework</title>
    <link rel="website icon" href="/assets/img/cube.ico">
    <!-- CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>

<section>
  <div class="card text-center login border-0" style="width: 18rem;">
    <div class="card-body border-0">
      <h3 class="card-title">Welcome Back</h3>
      
      <form action="/login" method="post">
              <?php if (isset($errors)) : ?>
                <?php foreach ($errors as $error) : ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php endforeach; ?>
                <?php endif; ?>

                <div class="mb-1">
                    <label for="username" class="form-label"></label>
                    <input name="username" type="username" class="form-control" id="username" placeholder="Username">
                </div>
                <div class="mb-1">
                    <label for="password" class="form-label"></label>
                    <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                </div>

                <button class="btn btn-primary mt-3 mb-3" type="submit">Log in</button>
              </form>
            </div>
          </div>
    </section>

<?php require base_path('views/partials/footer.php') ?>