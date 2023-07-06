<?php
function makeMovieBackdropPath($path) {
  return 'https://image.tmdb.org/t/p/original' . $path . '.jpg';
}

function makeMoviePoster($path) {
  return 'https://image.tmdb.org/t/p/w500' . $path . '.jpg';
}
