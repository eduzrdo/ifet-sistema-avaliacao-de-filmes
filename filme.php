<?php
require_once 'services/searchMovie.php';
require_once 'classes/System.php';
require_once 'utils/movie.php';

$movieId = $_GET['movieId'];

// $movieId = 338953; // Animais Fantásticos: Os Segredos de Dumbledore
// $movieId = 22; // Piratas do Caribe: A Maldição do Pérola Negra
// $movieId = 177572; // Operação Big Hero (Big Hero 6)
// $movieId = 671; // Harry Potter e a Pedra Filosofal
// $movieId = 673; // Harry Potter e o Prisioneiro de Azkaban
// $movieId = 675; // Harry Potter e a Ordem da Fênix

$movie = getMovieFromApi($movieId);

// echo '<pre>';
// var_dump($movie);
// echo '</pre>';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="https://unpkg.com/@phosphor-icons/web"></script>

  <link rel="stylesheet" href="styles/global.css">
  <link rel="stylesheet" href="styles/movie.css">

  <title>Avaliações - <?php echo $movie[1]->title; ?></title>
</head>

<body>
  <div class="background-plane">
    <img class="" src="<?php echo makeMovieBackdropPath($movie[1]->backdrop_path); ?>" alt="Plano de fundo de <?php echo $movie[1]->title; ?>">

    <div></div>
  </div>

  <?php include 'components/Header.php' ?>

  <main>
    <img src="<?php echo makeMoviePoster($movie[1]->poster_path); ?>" alt="Poster de Interestelar">

    <div class="movie-info">
      <h1 class="title"><?php echo $movie[1]->title; ?></h1>

      <div class="stars">
        <i class="ph-fill ph-star"></i>
        <i class="ph-fill ph-star"></i>
        <i class="ph-fill ph-star"></i>
        <i class="ph-fill ph-star"></i>
        <i class="ph ph-star"></i>
        <span class="score button-text">4.9</span>
      </div>

      <p class="body-text">
        <?php echo $movie[1]->overview ?>
      </p>
    </div>
  </main>

  <div>
    <form action="">
      <textarea class="input-text" name="comment" id="" cols="30" rows="5" placeholder="Escreva um avaliação sobre o filme"></textarea>

      <div>
        <button class="button-primary">AVALIAR</button>
        <button class="button-secondary">APAGAR</button>
      </div>
    </form>
  </div>

  <div class="ratings-container">
    <h2 class="subtitle">Avaliações</h2>

    <div class="rating-list">
      <div class="rating">
        <h3 class="body-text-bold">Zé das Couve</h3>
        <p class="body-text">Com uma trilha sonora arrebatadora e efeitos visuais impressionantes, Interestelar é uma experiência cinematográfica inesquecível que desafia nossa percepção do universo e nos faz refletir sobre o nosso lugar nele.</p>
        <span class="body-text-small">05/07/2023 - 09:06</span>
      </div>

      <div class="rating">
        <h3 class="body-text-bold">Zé das Couve</h3>
        <p class="body-text">Com uma trilha sonora arrebatadora e efeitos visuais impressionantes, Interestelar é uma experiência cinematográfica inesquecível que desafia nossa percepção do universo e nos faz refletir sobre o nosso lugar nele.</p>
        <span class="body-text-small">05/07/2023 - 09:06</span>
      </div>

      <div class="rating">
        <h3 class="body-text-bold">Zé das Couve</h3>
        <p class="body-text">Com uma trilha sonora arrebatadora e efeitos visuais impressionantes, Interestelar é uma experiência cinematográfica inesquecível que desafia nossa percepção do universo e nos faz refletir sobre o nosso lugar nele.</p>
        <span class="body-text-small">05/07/2023 - 09:06</span>
      </div>
    </div>
  </div>
</body>

</html>