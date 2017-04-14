<?php
// Establishes connection to database with credentials provided in separate file
function getConnection() {
    require_once 'secret/db-credentials.php';
    
    try {
        $conn = new PDO("mysql:host=$dbHost;dbname=$dbDatabase",
            $dbUser, $dbPassword);

        return $conn;
        
    } catch(PDOException $e) {
        die('Could not connect to database ' . $e);
    }
}
?>