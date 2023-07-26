<?php
$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.themoviedb.org/3/search/movie?query=interestelar&include_adult=false&language=en-US&page=1",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => [
    "Authorization: Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJkODkzMmFmOTIxMGIxMDYwMTVlMGY3MmEwMmU3NzlkMSIsInN1YiI6IjYxZDNhNWUwYTIyZDNlMDA2N2IyYzExMiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.H99HXk-Rk7FtTL56qUkDm7z1nOclfyTBjUmMz1Hzwrw",
    "accept: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $data = json_decode($response);

  foreach ($data->results as $movie) {
    echo '<h1>' . $movie->id . '</h1>';
    echo '<h2>' . $movie->original_title . '</h2>';
  }
}
