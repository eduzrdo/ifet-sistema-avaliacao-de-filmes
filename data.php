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
  foreach ($system->getMovies() as $movie) {
    echo "<p>" . $movie->getTitle() . "</p>";
    echo "<p>Média de avaliações: " . $movie->getAverageScore() . "</p>";
    echo "<br>";
  }

  echo '<br>';

  foreach ($system->getUsers() as $user) {
    echo "<p>" . $user->getEmail() . "</p>";
  }

  echo '<br>';

  foreach ($system->getRatings() as $rating) {
    echo "<p>" . $rating->getScore() . " - " . $rating->getComment() . "</p>";
  }

  echo '<br>';

  echo '<pre>most rated movies<br>';
  var_dump($system->getMostRatedMovies());
  echo '</pre>';
  ?>
</body>

</html>