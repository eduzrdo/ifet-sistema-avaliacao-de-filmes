<?php
require_once './classes/System.php';
require_once './classes/User.php';
require_once './classes/Movie.php';
require_once './classes/Rating.php';
$system = new System();

$user1 = new User("Eduardo", "eduardoliveira.dev@gmail.com", "umasenhamuitofortona");
$movie1 = new Movie("Harry Potter e o Prisioneiro de Azkaban", "urlDaImagem");
$rating1 = new Rating($user1, $movie1, 3, "O melhor filme da saga!!");
$rating2 = new Rating($user1, $movie1, 4, "O melhor filme da saga!!");

echo $movie1->getAverageScore(); 

// $system->createUser($user1);
// $system->createMovie($movie1);
// $system->createRating($rating1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="./filmes/procurar.php" method="get">
        <input type="text" name="search" placeholder="Procurar filme">
        <button type="submit">Procurar</button>
    </form>

    <?php
    $data = [5, 4, 3, 2, 1];
    ?>


    <script>
        const data = [];

        <?php
        foreach ($data as $value) {
        ?> data.push(<?php echo $value; ?>) <?php
                                        }
                                            ?>

            console.log('Lista:');

            console.log(data);
    </script>
</body>

</html>