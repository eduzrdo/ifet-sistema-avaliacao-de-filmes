<?php
require_once 'classes/System.php';
require_once 'utils/movie.php';

$system = new System();

function mapper($movie)
{
    return [
        "id" => $movie->getId(),
        "title" => $movie->getTitle(),
        "averageScore" => $movie->getAverageScore(),
        "posterPath" => $movie->getPosterPath(),
        "backdropPath" => $movie->getBackdropPath(),
    ];
}

$mostRatedMoviesArray = array_map('mapper', $system->getMostRatedMovies());
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
        <img class="background-image" src="<?php echo makeMovieBackdropPath($mostRatedMoviesArray[0]["backdropPath"]); ?>" alt="Plano de fundo de <?php echo $mostRatedMoviesArray[0]["title"]; ?>">
        <div></div>
    </div>

    <?php require_once 'components/Header.php' ?>

    <main>
        <div class="movie-data">
            <h1 class="title"><?php echo $mostRatedMoviesArray[0]["title"]; ?></h1>

            <div class="score">
                <div class="score-stars">
                    <?php
                    $filledStars = floor($mostRatedMoviesArray[0]["averageScore"]);

                    for ($i = 0; $i < $filledStars; $i++) {
                        echo "<i class='ph-fill ph-star'></i>";
                    }
                    for ($i = 0; $i < 5 - $filledStars; $i++) {
                        echo "<i class='ph ph-star'></i>";
                    }  ?>
                </div>
                <span class="scorest button-text"><?php echo number_format($mostRatedMoviesArray[0]["averageScore"], 1, ".", "") ?></span>
            </div>

            <!-- <div class="genres">
                <span class="body-text-small">Ficção</span>
                <span class="body-text-small">Fantasia</span>
                <span class="body-text-small">Família</span>
            </div> -->

            <a class="button button-secondary movie-link" href="filme.php?movieId=<?php echo $mostRatedMoviesArray[0]["id"]; ?>">Ver avaliações</a>
        </div>

        <div class="best-movies">
            <?php
            foreach ($mostRatedMoviesArray as $movieIndex => $movie) {
                echo "
                <button href=index.php?id=" . $movie['id'] . " class='movie-card' data-backdroppath='" . makeMovieBackdropPath($movie['backdropPath']) . "' data-title='" . $movie['title'] . "' data-id='" . $movie['id'] . "' data-id='" . $movie['id'] . "' data-averageScore='" . $movie['averageScore'] . "''>
                    <div class='movie-card-stars'>
                        <i class='ph-fill ph-star'></i>
                        <i class='ph-fill ph-star'></i>
                    </div>
                    <span class='movie-position'>Top " . $movieIndex + 1 . "</span>
                    <img src='" . makeMoviePoster($movie['posterPath']) . "' alt='" . $movie['title'] . "'>
                    <span class='body-text'>" . $movie['title'] . "</span>
                </button>
                ";
            }
            ?>
        </div>
    </main>

    <script>
        const movieLinkElement = document.querySelector('.movie-link');
        const titleElement = document.querySelector('.title');
        const scoreElement = document.querySelector('.scorest');
        const backgroundElement = document.querySelector('.background-image');
        const scoreStarsContainer = document.querySelector('.score-stars');

        const filledStar = document.createElement("i");
        filledStar.className = 'ph-fill ph-star';
        const emptyStar = document.createElement("i");
        emptyStar.className = 'ph ph-star';

        function selectMovie(event) {
            const movieId = event.currentTarget.getAttribute('data-id');
            const movieTitle = event.currentTarget.getAttribute('data-title');
            const movieAverageScore = event.currentTarget.getAttribute('data-averageScore');
            const movieBackdropPath = event.currentTarget.getAttribute('data-backdroppath');

            titleElement.innerText = movieTitle;
            backgroundElement.src = movieBackdropPath;
            movieLinkElement.href = 'filme.php?movieId=' + movieId;
            scoreElement.innerText = Number(movieAverageScore).toFixed(1).replace(',', '.');

            const scoreAbsolute = Math.floor(movieAverageScore);

            let firstStar = scoreStarsContainer.firstElementChild;

            while (firstStar) {
                firstStar.remove();
                firstStar = scoreStarsContainer.firstElementChild;
            }

            for (let i = 0; i < scoreAbsolute; i++) {
                const filledStar = document.createElement("i");
                filledStar.className = 'ph-fill ph-star';
                scoreStarsContainer.appendChild(filledStar);
            }

            for (let i = 0; i < 5 - scoreAbsolute; i++) {
                const emptyStar = document.createElement("i");
                emptyStar.className = 'ph ph-star';
                scoreStarsContainer.appendChild(emptyStar);
            }
        }

        const buttons = Array.from(document.querySelectorAll('.movie-card'));
        buttons.forEach(button => {
            button.onclick = selectMovie;
        });
    </script>
</body>

</html>