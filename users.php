<?php
require_once 'classes/System.php';

$system = new System();
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
  foreach ($system->getRatings() as $rating) {
    echo "<p>" . $rating->getId() . " -> " . $rating->getComment() . " - " . $rating->getUser()->getId() . "</p>";
  }
  ?>
</body>

</html>