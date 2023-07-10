<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles/global.css">
  <link rel="stylesheet" href="./styles/login.css">

  <title>Entrar | StarFilms</title>
</head>

<body>
  <div>
    <form action="api/user/authenticate.php" class="login-form" method="post">
      <input type="text" name="email" class="input-text" placeholder="email@email.com">
      <input type="password" name="password" class="input-passowrd" placeholder="**********">

      <?php
      if (isset($_COOKIE['loginError'])) {
        echo "<span class='error'>" . $_COOKIE['loginError'] . "</span>";
      }
      ?>

      <button class="button-primary">ENTRAR</button>
      <a href="cadastrar.php">CADASTRE-SE</a>
    </form>
  </div>
</body>

</html>