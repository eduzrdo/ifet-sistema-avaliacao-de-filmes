<?php
require_once './classes/System.php';
require_once './classes/User.php';
require_once './classes/Movie.php';
require_once './classes/Rating.php';
$system = new System();

// $user1 = new User("Eduardo", "eduardoliveira.dev@gmail.com", "umasenhamuitofortona");
// $movie1 = new Movie("Harry Potter e o Prisioneiro de Azkaban", "urlDaImagem");
// $rating1 = new Rating($user1, $movie1, 5, "O melhor filme da saga!!");

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
</body>
</html>
