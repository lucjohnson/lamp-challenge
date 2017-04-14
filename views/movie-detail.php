<?php 
include 'views/formatting.php';
?>
<div class="row">
    <div class="col s12 m4">
        <?php 
        // If there is an imdb_id proxy the movie poster, if not show a default image
        if($imdb_id != '') {
            echo "<img src='poster.php?imdb_id=$imdb_id' alt='$title movie poster' class='responsive-img'>";
        } else { 
            echo '<img src="img/NoImageAvailable.jpg" alt="No image available" class="responsive-img">';
        } ?>
    </div>
    <div class="col s12 m8">
        <h1><?= $title ?></h1>
        <p><?= $rating . " | " . $genre . " | " . $prettyDate . " | " . $distributor ?></p>
        <p>Sold <?= $tickets ?> tickets, earning gross revenue of <?= $gross ?>.</p>
        <?php 
        // If the imdb data is availabe show it, if not just show the data from the database
        if($imdb_id != '') { 
            echo "<p>Plot: $synopsis</p>";
            echo "<p>IMDb rating: <span class='rating'>{$imdbRating}</span>/10 from $imdbReviews users | Rotten Tomatoes rating: Rated <span class='rating'>{$rottenRating}%</span> by $rottenReviews people | Metascore: <span class='rating'>{$metascore}</span>/100</p>";
            echo "<p>Critic Consensus: $consensus</p>";
        } ?>
    </div>
</div>