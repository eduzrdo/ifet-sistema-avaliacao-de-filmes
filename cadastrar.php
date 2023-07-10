<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles/global.css">
  <link rel="stylesheet" href="./styles/login.css">

  <title>Cadastrar | StarFilms</title>
</head>

<body>
  <form action="api/user/register.php" class="login-form" method="post">
    <input type="text" name="email" class="input-text" placeholder="email@email.com">
    <input type="password" name="password" class="input-passowrd" placeholder="digite uma senha">
    <input type="password" name="confirmPassword" class="input-passowrd" placeholder="confirme a senha">

    <?php
    if (isset($_COOKIE['registerError'])) {
      echo "<span class='error'>" . $_COOKIE['registerError'] . "</span>";
    }
    ?>

    <button class="button-primary">CADASTRAR</button>
    <p>JÁ POSSUI CADASTRO?</p><a href="login.php">ENTRE AQUI</a>
  </form>
</body>

</html>