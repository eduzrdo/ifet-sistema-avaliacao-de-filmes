<?php
require_once 'services/searchMovie.php';

$movieId = 338953;

getMovieFromApi($movieId);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="https://unpkg.com/@phosphor-icons/web"></script>

  <link rel="stylesheet" href="styles/global.css">
  <link rel="stylesheet" href="styles/movie.css">

  <title>Avaliações - Interestelar</title>
</head>

<body>
  <div class="background-plane">
    <img class="" src="https://image.tmdb.org/t/p/original/rAiYTfKGqDCRIIqo664sY9XZIvQ.jpg" alt="Plano de fundo d Interestelar">

    <div></div>
  </div>

  <?php include 'components/Header.php' ?>

  <main>
    <img src="https://image.tmdb.org/t/p/w300/gEU2QniE6E77NI6lCU6MxlNBvIx.jpg" alt="Poster de Interestelar">

    <div class="movie-info">
      <h1 class="title">Interestelar</h1>

      <div class="stars">
        <i class="ph-fill ph-star"></i>
        <i class="ph-fill ph-star"></i>
        <i class="ph-fill ph-star"></i>
        <i class="ph-fill ph-star"></i>
        <i class="ph ph-star"></i>
        <span class="score button-text">4.9</span>
      </div>

      <p class="body-text">Interestelar é uma obra-prima cinematográfica que transcende as fronteiras do espaço e tempo. Com uma narrativa envolvente e personagens cativantes, o filme nos leva a uma jornada emocionante através de buracos negros e dimensões desconhecidas, enquanto explora temas profundos como amor, sacrifício e a busca incansável pela sobrevivência da humanidade. Com uma trilha sonora arrebatadora e efeitos visuais impressionantes, Interestelar é uma experiência cinematográfica inesquecível que desafia nossa percepção do universo e nos faz refletir sobre o nosso lugar nele.</p>
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