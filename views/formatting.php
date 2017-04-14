<?php
    // This view formats all of the data returned from the datbase and also creates simpler variable names to represent all data
    $id = htmlentities($movie['movie_id']);
    $title = htmlentities($movie['title']);
    $anchor = "<a href='movie.php?id=$id'>" . $title . "</a>"; 
    
    $date = DateTime::createFromFormat('Y-m-d', htmlentities($movie['released']));
    $listDate = $date->format('j-M-Y');
    $prettyDate = $date->format('F jS, Y');
    
    $tickets = number_format(htmlentities($movie['tickets']));
    
    $gross = '$' . number_format(htmlentities($movie['gross']));
    
    $imdb_id = htmlentities($movie['imdb_id']);
    
    $genre = htmlentities($movie['genre']);
    
    $rating = htmlentities($movie['rating']);
    
    $distributor = htmlentities($movie['distributor']);
    
    $synopsis = htmlentities($movie['Plot']);
    
    $imdbRating = htmlentities($movie['imdbRating']);
    
    $imdbReviews = htmlentities($movie['imdbVotes']);
    
    $rottenRating = htmlentities($movie['tomatoMeter']);
    
    $rottenReviews = htmlentities($movie['tomatoReviews']);
    
    $metascore = htmlentities($movie['Metascore']);
    
    $consensus = htmlentities($movie['tomatoConsensus']);
?>