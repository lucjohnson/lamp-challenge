<?php
require_once 'connection.php';
require_once 'models/movie-model.php';

$search = '';

// Get connection to database to send to Model
$conn = getConnection();
// Create a new model with the connection established
$movieModel = new Movies($conn);
// Check to see if there is a title parameter, if so set it to search variable and return only data 
// with titles containing the search query. If not set, return data of all movies
if(isset($_GET['title'])) {
    $search = $_GET['title'];
    $movies = $movieModel->searchByTitle($search);
} else {
    $movies = $movieModel->getAllMovies();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Movies</title>
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <main>
        <div class="container">
            <h1>[Movies 2k14]</h1>
            <form method="GET" action="">
                <input type="search" name="title" value= "<?= htmlentities($search) ?>" placeholder="search by title"> 
            </form>
        <?php
            include 'views/movie-list.php';
        ?>
        </div>
    </main>
    <?php
        include 'views/footer.php';
    ?>
</body>
</html>