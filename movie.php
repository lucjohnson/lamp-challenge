<?php
require_once 'connection.php';
require_once 'models/movie-model.php';

// Get connection to database to pass to Model 
$conn = getConnection();
// Create a new model with the connection established
$movieModel = new Movies($conn);
// Check to make sure an id is set and then query the data if it is, otherwise die
if(isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];
    $movie = $movieModel->getMovieById($id);
} else {
    die('You need to provide an ID');
}

// If an imdb_id is provided request the data from the omdb api and then merg the data into the db data previously retrieved
if($movie['imdb_id'] != '') {
    $imdbId = $movie['imdb_id'];
    $url = "http://www.omdbapi.com/?i=$imdbId&tomatoes=true";
    $json = file_get_contents($url);
    $omdbData = json_decode($json, true);
    $movie = array_merge($movie, $omdbData);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlentities($movie['title']) ?></title>
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/movie-detail.css">
</head>
<body>
    <main>
        <div class="container">
        <?php
            include 'views/movie-detail.php';
        ?>
        </div>
    </main>
    <?php
        include 'views/footer.php';
    ?>
</body>
</html>