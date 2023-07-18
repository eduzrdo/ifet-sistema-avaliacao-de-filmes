<?php
require_once 'classes/System.php';

$system = new System();

echo '<pre>';
var_dump(count($system->getUsers()[0]->getRatings()));
echo '</pre>';

echo '<pre>';
var_dump($system->getUsers()[0]->getRatings());
echo '</pre>';

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="styles/global.css">

  <title>Painel - Usuários</title>
</head>

<body>
  <?php require_once 'components/Header.php' ?>

  <?php
  foreach ($system->getUsers() as $user) {
    echo "<p>" . $user->getEmail() . "</p>";
  }
  ?>
</body>

</html>