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

<section class="section hero is-centered is-light is-bold">
<div class="container">
<div class="field">
    <p class="control">
        <span class="subtitle">New info:</span>
    </p>
    </div>
    <div class="field has-addons">
      <p class="control has-icons-left">
        <input class="input" type="text" placeholder="New Username" name="username">
        <span class="icon is-small is-left">
          <i class="fas fa-user"></i>
        </span>
      </p>
      <p class="control">
        <input type="submit" class="button is-warning is-inverted" value="Send">
      </p>
    </div>
    <div class="field has-addons">
        <p class="control has-icons-left has-icons-right">
        <input class="input" type="email" placeholder="New Email" name="email">
        <span class="icon is-small is-left">
            <i class="fas fa-envelope"></i>
        </span>
        </p>
        <p class="control">
        <input type="submit" class="button is-warning is-inverted" value="Send">
      </p>
    </div>
    <form action="/set_pwd" method="post">
    <div class="field has-addons">
      <p class="control has-icons-left">
        <input class="input" type="password" placeholder="New Password" name="password" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$">
        <span class="icon is-small is-left">
          <i class="fas fa-lock"></i>
        </span>
      </p>
      <p class="control">
        <input type="submit" class="button is-warning is-inverted" value="Send">
      </p>
    </div>
    </form>
</div>
  </section>

<?php include __DIR__ . "/footer.php" ?>