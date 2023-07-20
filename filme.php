<?php
require_once 'services/movie.php';
require_once 'classes/System.php';
require_once 'classes/Movie.php';
require_once 'utils/movie.php';

$system = new System();

session_start();

$movieId = $_GET['movieId'];

$movie = $system->findMovie(intval($movieId));
$hasRatings;
$message;

if ($movie[0] === true) {
  $hasRatings = true;
  $movie = $movie[1];
} else {
  $hasRatings = false;
  $message = $movie[1];
  $movieData = getMovieFromApi($movieId);
  $movie = new Movie($movieData[1]->id, $movieData[1]->title, $movieData[1]->poster_path, $movieData[1]->backdrop_path, $movieData[1]->overview);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="https://unpkg.com/@phosphor-icons/web"></script>

  <link rel="stylesheet" href="styles/global.css">
  <link rel="stylesheet" href="styles/filme.css">

  <title>Avaliações - <?php echo $movie->getTitle(); ?></title>
</head>

<body>
  <div class="background-plane">
    <img class="" src="<?php echo makeMovieBackdropPath($movie->getBackdropPath()); ?>" alt="Plano de fundo de <?php echo $movie->getTitle(); ?>">

    <div></div>
  </div>

  <?php require_once 'components/Header.php' ?>

  <main>
    <img src="<?php echo makeMoviePoster($movie->getPosterPath()); ?>" alt="Poster de Interestelar">

    <div class="movie-info">
      <h1 class="title"><?php echo $movie->getTitle(); ?></h1>

      <div class="stars">
        <?php
        if ($hasRatings) {
          $filledStars = floor($movie->getAverageScore());

          for ($i = 0; $i < $filledStars; $i++) {
            echo "<i class='ph-fill ph-star'></i>";
          }

          for ($i = 0; $i < 5 - $filledStars; $i++) {
            echo "<i class='ph ph-star'></i>";
          }
        }
        ?>
        <span class="score button-text"><?php echo number_format($movie->getAverageScore(), 1, ".", "") ?></span>
      </div>

      <p class="body-text">
        <?php echo $movie->getOverview() ?>
      </p>
    </div>
  </main>

  <div>
    <form action="api/movie/rate.php?movieId=<?php echo $movieId; ?>" method="post">
      <div class="form-stars">
        <span class="body-text-bold">Escolha uma nota de 1 a 5</span>

        <div class="score-selection">
          <label>
            <input type="radio" name="score" value="1" class="star-input" required>
            <i class="ph ph-star"></i>
          </label>
          <label>
            <input type="radio" name="score" value="2" class="star-input">
            <i class="ph ph-star"></i>
          </label>
          <label>
            <input type="radio" name="score" value="3" class="star-input">
            <i class="ph ph-star"></i>
          </label>
          <label>
            <input type="radio" name="score" value="4" class="star-input">
            <i class="ph ph-star"></i>
          </label>
          <label>
            <input type="radio" name="score" value="5" class="star-input">
            <i class="ph ph-star"></i>
          </label>
        </div>
      </div>

      <textarea class="input-text" name="comment" id="" cols="30" rows="5" placeholder="Escreva um avaliação sobre o filme" required></textarea>

      <div class="form-buttons">
        <button class="button-primary">AVALIAR</button>
        <!-- <button class="button-secondary">APAGAR</button> -->
      </div>
    </form>
  </div>

  <div class="ratings-container">
    <h2 class="subtitle">Avaliações</h2>

    <div class="rating-list">
      <?php
      if ($hasRatings) {
        foreach ($movie->getRatings() as $rating) {
          echo "
            <div class='rating'>
              <div>
                <h3 class='body-text-bold'>" . $rating->getUser()->getName() . "</h3>
                <div class='rating-score'>";
          for ($i = 0; $i < $rating->getScore(); $i++) {
            echo "<i class='ph-fill ph-star'></i>";
          }
          echo
          "</div>
              </div>
              <p class='body-text'>" . $rating->getComment() . "</p>
            </div>
              ";
          // <span class='body-text-small date'>05/07/2023 - 09:06</span>
        }
      } else {
        echo "<span class='no-movies'>$message <span onclick='focusCommentField()'>Seja o primeiro! 😁</span></span>";
      }
      ?>

      <span onclick='focusCommentField()'></span>

      <!-- COMMENT -->
      <!-- <div class="rating">
        <div>
          <h3 class="body-text-bold">Zé das Couve</h3>
          <div class="rating-score">
            <i class="ph-fill ph-star"></i>
            <i class="ph-fill ph-star"></i>
            <i class="ph-fill ph-star"></i>
            <i class="ph-fill ph-star"></i>
            <i class="ph-fill ph-star"></i>
          </div>
        </div>
        <p class="body-text">Com uma trilha sonora arrebatadora e efeitos visuais impressionantes, Interestelar é uma experiência cinematográfica inesquecível que desafia nossa percepção do universo e nos faz refletir sobre o nosso lugar nele.</p>
        <span class="body-text-small date">05/07/2023 - 09:06</span>
      </div> -->
    </div>
  </div>

  <script src="scripts/movie.js"></script>
</body>

</html>