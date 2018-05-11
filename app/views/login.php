<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <title>Login - Camagru</title>
</head>

<?php include __DIR__ . "/header.php" ?>

<section class="section">
<div class="container">
    <form method="POST" action="/login">
        <div class="field">
          <p class="control has-icons-left">
            <input class="input" type="text" placeholder="Username" name="username" required>
            <span class="icon is-small is-left">
              <i class="fas fa-user"></i>
            </span>
          </p>
        </div>
        <div class="field">
          <p class="control has-icons-left">
            <input class="input" type="password" placeholder="Password" name="password" required>
            <span class="icon is-small is-left">
              <i class="fas fa-lock"></i>
            </span>
          </p>
        </div>
        <div class="field">
          <p class="control">
            <a href="/signup">
                No account, need to sign-up ?
            </a>
          </p>
        </div>
        <div class="field">
          <p class="control">
            <input type="submit" class="button is-warning is-inverted" value="Login">
          </p>
        </div>
    </form>
</div>
</section>

<?php include __DIR__ . "/footer.php" ?>