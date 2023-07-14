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
  <div class="background-plane">
    <img class="" src="assets/login-background.jpg" alt="Plano de fundo">

    <div></div>
  </div>

  <div class="login-img">
    <img src="./assets/starfilms-logo.svg" alt="">
  </div>

  <div>
    <form action="api/user/signup.php" class="login-form" method="post">
      <input type="email" name="email" class="input-text" placeholder="email@email.com" required>
      <input type="password" name="password" class="input-text" placeholder="digite uma senha" required>
      <input type="password" name="confirmPassword" class="input-text" placeholder="confirme a senha" required>

      <?php
      if (isset($_COOKIE['registerError'])) {
        echo "<span class='error'>" . $_COOKIE['registerError'] . "</span>";
      }
      ?>

      <button class="button-primary">CADASTRAR</button>
      <span class="text">JÁ POSSUI CADASTRO? <a href="login.php">ENTRE AQUI</a></span>
    </form>
  </div>
</body>

</html>