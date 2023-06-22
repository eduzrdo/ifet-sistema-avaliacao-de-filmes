<?php
require_once '../services/searchMovie.php';

$search = $_GET['search'];

$response = searchMovie($search);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles.css">
  <title>Document</title>
</head>

<body>
  <?php
  if ($response[0]) {
    if (count($response[1]->results) > 0) {
      foreach ($response[1]->results as $movie) {
        echo
        '<div class="movie-card">'
          . '<h3>' . $movie->title . '</h3>'
          . '<span>' . $movie->id . '</span>'
          . '</div>';
      }
    } else {
      echo '<p>Nenhum filme encontrado.</p>';
    }
  } else {
    echo '<p>' . $response[1] . '</p>';
  }
  ?>
</body>

</html>