<?php
if(isset($_GET['imdb_id']) && $_GET['imdb_id'] != '') {
    $id = $_GET['imdb_id'];
}
// Get the poster's URL from the omdb api
$url = "http://www.omdbapi.com/?i=$id";
$json = file_get_contents($url);
$omdbData = json_decode($json, true);
$imageUrl = $omdbData['Poster'];

// cURL the given image URL and stream back to the client with caching and cross-domain headers
$ch = curl_init();
curl_setopt ($ch, CURLOPT_URL, $imageUrl);
header('Access-Control-Allow-Origin: *');
header('Content-Type: image/jpeg');
header('Cache-Control: public, max-age=86400');
curl_exec($ch);
curl_close($ch);
?>