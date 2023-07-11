<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pag Inicial</title>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script src="./styles/jsHome/home.js"></script>
    <link rel="stylesheet" href="./styles/global.css">
    <link rel="stylesheet" href="./styles/home.css">
</head>

<body>
    <section class="backgroundIMG">
        <div class="gradient"></div>
        <div class="content-all">
            <nav class="header page-header">
                <div class="logo">
                    <img src="../ifet-sistema-avaliacao-de-filmes/assets/starfilms-logo.svg" alt="foda-se se vc n encherga">
                </div>
                <div class="navigation nav-text">
                    <p>Principal</p>
                    <p>Melhores Avaliados</p>
                    <p>Mais Avalaidos</p>
                </div>
                <div class="search" onmouseleave="animationClose()">
                    <input type="text" id="input-search" placeholder="Busca"><i class="ph ph-magnifying-glass" onclick="animationOpen()"></i>
                </div>
            </nav>
            <header class="content">
                <h1 class="title">The Witcher</h1>
                <p>1 Temporada</p>
                <div class="star">
                    <i class="ph-fill ph-star"></i>
                    <i class="ph-fill ph-star"></i>
                    <i class="ph-fill ph-star"></i>
                    <i class="ph ph-star"></i>
                    <i class="ph ph-star"></i>
                    <span class="score button-text">3.5</span>
                </div>
                <div class="genres">
                    <p>Crime</p>
                    <p>Drama</p>
                    <p>Misterio</p>
                </div>
                <button class="button-text">Ver Comentarios</button>
            </header>
            <footer class="carousel">
                <p class="movie-emphasis"><img src="https://cdn.ome.lt/NFcSrPoyGkmpMAf20eH0CNaAf6M=/770x0/smart/uploads/conteudo/fotos/3606754-witcher_poster.jpg" alt="">The Witcher</p>
                <p class="movie-emphasis"><img src="https://cdn.ome.lt/NFcSrPoyGkmpMAf20eH0CNaAf6M=/770x0/smart/uploads/conteudo/fotos/3606754-witcher_poster.jpg" alt="">The Witcher</p>
                <p class="movie-emphasis"><img src="https://i0.wp.com/almanaque21.com.br/wp-content/uploads/2019/12/CAPA-1.png?fit=2490%2C3201&ssl=1" alt="">Star Wars</p>
                <p class="movie-emphasis"><img src="https://cdn.ome.lt/NFcSrPoyGkmpMAf20eH0CNaAf6M=/770x0/smart/uploads/conteudo/fotos/3606754-witcher_poster.jpg" alt="">The Witcher</p>
                <p class="movie-emphasis"><img src="https://cdn.ome.lt/NFcSrPoyGkmpMAf20eH0CNaAf6M=/770x0/smart/uploads/conteudo/fotos/3606754-witcher_poster.jpg" alt="">The Witcher</p>
            </footer>
        </div>
    </section>
</body>

</html>