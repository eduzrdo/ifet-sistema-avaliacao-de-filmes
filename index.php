<?php
require_once 'classes/System.php';
require_once 'utils/movie.php';

$system = new System();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./styles/global.css">
    <link rel="stylesheet" href="./styles/home.css">

    <script src="./styles/jsHome/home.js"></script>

    <title>Início ⭐ StarFilms</title>
</head>

<body>
    <div class="background-plane">
        <img class="" src="https://kanto.legiaodosherois.com.br/w728-h381-gnw-cfill-gcc-f:fbcover/wp-content/uploads/2020/10/legiao_AqDiIgmRJzNY.jpg.webp" alt="Plano de fundo de ">

        <div></div>
    </div>

    <?php require_once 'components/Header.php' ?>

    <main>
        <div class="movie-data">
            <h1 class="title">Harry Potter e o Prisioneiro de Azkaban</h1>

            <div class="score">
                <i class="ph-fill ph-star"></i>
                <i class="ph-fill ph-star"></i>
                <i class="ph-fill ph-star"></i>
                <i class="ph-fill ph-star"></i>
                <i class="ph ph-star"></i>
            </div>

            <div class="genres">
                <span class="body-text-small">Ficção</span>
                <span class="body-text-small">Fantasia</span>
                <span class="body-text-small">Família</span>
            </div>

            <button class="button-secondary">
                Ver avaliações
            </button>
        </div>

        <div class="best-movies">
            <?php
            foreach ($system->getMostRatedMovies() as $movie) {
                echo "
                    <div class='movie-card'>
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