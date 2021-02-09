<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
  <?php if (isset($_SESSION["login"]) && $_SESSION['login'] == TRUE) : ?>
    <div class="alert alert-success mx-5 mt-5" role="alert">
      You are logged in thanks.
    </div>
    <form method="POST" action="../VALIDATE/sign_out.php">
      <button type="submit" class="btn btn-primary mx-5">Sign out</button>
    </form>
    <?php exit() ?>
  <?php elseif (isset($_SESSION["login"]) && $_SESSION['login'] == FALSE) : ?>
    <div class="alert alert-danger mx-5 mt-5" role="alert">
      Wrong E-mail or password please check them.
    </div>
  <?php endif; ?>

  <form class="mx-5 mt-5" method="POST" action="../VALIDATE/sign_in.php">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Username or email</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="user" value="<?= isset($_SESSION["user"]) ? $_SESSION['user'] : ""; ?>">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" name="pass">
    </div>
    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
    <button class="btn btn-primary"><a>Sign up</a></button>
  </form>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>