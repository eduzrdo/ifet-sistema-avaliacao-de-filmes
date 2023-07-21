<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles/global.css">
  <link rel="stylesheet" href="./styles/login.css">

  <title>Cadastrar ⭐ StarFilms</title>
</head>

<body>
  <div class="background-plane">
    <img class="" src="assets/login-background.jpg" alt="Plano de fundo">

    <div></div>
  </div>

  <img class="logo-img" src="./assets/starfilms-logo.svg" alt="Logo StarFilms">

  <div>
    <form action="api/user/signup.php" class="login-form" method="post">
      <input type="email" name="email" class="input-text" placeholder="Informe seu email" required>
      <input type="text" name="name" class="input-text" placeholder="Seu nome" required>
      <input type="password" name="password" class="input-text" placeholder="Digite uma senha" required>
      <input type="password" name="confirmPassword" class="input-text" placeholder="Confirme a senha" required>

      <?php
      if (isset($_COOKIE['registerError'])) {
        echo "<span class='error'>" . $_COOKIE['registerError'] . "</span>";
      }
      ?>

      <button class="button-primary">CADASTRAR</button>
      <span class="text">JÁ POSSUI CADASTRO? <a href="entrar.php">ENTRE AQUI</a></span>
    </form>
  </div>

  <div></div>
</body>

</html>