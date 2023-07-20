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
  <div class="background-plane">
    <img class="" src="assets/login-background.jpg" alt="Plano de fundo">

    <div></div>
  </div>

  <div class="login-img">
    <img src="./assets/starfilms-logo.svg" alt="">
  </div>

  <div>
    <form action="api/user/authenticate.php" class="login-form" method="post">
      <input type="email" name="email" class="input-text" placeholder="Seu email" required>
      <input type="password" name="password" class="input-text" placeholder="Sua senha" required>

      <?php
      if (isset($_COOKIE['loginError'])) {
        echo "<span class='error'>" . $_COOKIE['loginError'] . "</span>";
      }
      ?>

      <button class="button-primary">ENTRAR</button>
      <span>
        <a class="text" href="cadastrar.php">CADASTRE-SE</a>
      </span>
    </form>
  </div>
</body>

</html>