<?php
require_once 'classes/System.php';
require_once 'utils/movie.php';

$system = new System();

if (isset($_GET['id'])) {
    if ($_GET['id'] >= 0) {
        $movie = $system->getMostRatedMovies()[$_GET['id']];
    }
}

if (!isset($_GET['id'])) {
    $movie = $system->getMostRatedMovies()[0];
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./styles/global.css">
    <link rel="stylesheet" href="styles/filme.css">
    <link rel="stylesheet" href="./styles/home.css">

    <script src="./styles/jsHome/home.js"></script>

    <title>Início ⭐ StarFilms</title>
</head>

<body>
    <div class="background-plane">
        <img class="" src="<?php echo makeMovieBackdropPath($movie->getBackdropPath()); ?>" alt="Plano de fundo de <?php echo $movie->getTitle(); ?>">
        <div></div>
    </div>

    <?php require_once 'components/Header.php' ?>

    <main>
        <div class="movie-data">
            <h1 class="title"><?php echo $movie->getTitle(); ?></h1>

            <div class="score">
                <?php
                $filledStars = floor($movie->getAverageScore());

                for ($i = 0; $i < $filledStars; $i++) { echo "<i class='ph-fill ph-star'></i>" ; } for ($i=0; $i < 5 - $filledStars; $i++) { echo "<i class='ph ph-star'></i>" ; }  ?>
                    <span class="scorest button-text"><?php echo number_format($movie->getAverageScore(), 1, ".", "") ?></span>
            </div>

            <div class="genres">
                <span class="body-text-small">Ficção</span>
                <span class="body-text-small">Fantasia</span>
                <span class="body-text-small">Família</span>
            </div>

            <a href="filme.php?movieId=<?php echo $movie->getId(); ?>"><button class="button-secondary">
                    Ver avaliações
                </button></a>
        </div>

        <div class="best-movies">
            <?php
            foreach ($system->getMostRatedMovies() as $idmovie => $movie) {
                echo "
                <a href=index.php?id=$idmovie>
                    <div class='movie-card'>
                        <i class='ph-fill ph-star'> Top " . $idmovie + 1 . "</i>
                        <img src='" . makeMoviePoster($movie->getPosterPath()) . "' alt='" . $movie->getTitle() . "'>
                        <span class='body-text'>" . $movie->getTitle() . "</span>
                    </div>
                    
                ";
            }
            ?>
        </div>
    </main>
</body>

</html>