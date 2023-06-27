  <?php
  class Filme
  {
    private $avaliacoes;

    public function __construct($avaliacoes)
    {
      $this->avaliacoes = $avaliacoes;
    }

    function getAvaliacoes()
    {
      return $this->avaliacoes;
    }
  };

  $filme5 = new Filme(13);
  $filme4 = new Filme(11);
  $filme3 = new Filme(7);
  $filme2 = new Filme(6);
  $filme1 = new Filme(2);

  $novoFilme = new Filme(7);

  $filmesMaisAvaliados = array(
    $filme5,
    $filme4,
    $filme3,
    $filme2,
    $filme1,
  );

  $novoVetor = array_filter($filmesMaisAvaliados, function ($filme) use ($novoFilme) {
    return $filme->getAvaliacoes() >= $novoFilme->getAvaliacoes();
  });

  $quantidadeNovoVetor = count($novoVetor);

  // 3 | 5 | 5 - 3 - 1 = 1;
  // 2 | 5 | 5 - 2 - 1 = 2;
  // 5 - $quantidadeNovoVetor - 1

  $vetorRestante = array_slice($filmesMaisAvaliados, $quantidadeNovoVetor, 5 - count($novoVetor) - 1);

  $novoFilmesMaisAvaliados = array_merge($novoVetor, [$novoFilme], $vetorRestante);

  echo '<pre>';
  var_dump($filmesMaisAvaliados);
  echo '</pre>';

  echo '<pre>';
  var_dump($novoVetor);
  echo '</pre>';

  echo '<pre>';
  var_dump($novoFilmesMaisAvaliados);
  echo '</pre>';

  ?>
