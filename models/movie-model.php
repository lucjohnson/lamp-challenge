<?php
// This class queries data from a database based on the given connection
class Movies {
    protected $conn;
    
    // Constructs the model using the given database connection
    public function __construct($conn) {
        $this->conn = $conn;
    }
    
    // Retrieves and returns all data about all movies from the database
    public function getAllMovies() {
        $sql = 'select * from movies';
        $stmt = $this->conn->prepare($sql);
        $success = $stmt->execute(array());
        if (!$success) {
            var_dump($stmt->errorInfo());
            return false;
        } else {
            return $stmt->fetchAll();
        }
    }
    
    // Retrieves and returns all data about all movies that have a title containing the passed parameter
    public function searchByTitle($q) {
        $sql = 'select * from movies where title like ?';
        $stmt = $this->conn->prepare($sql);
        $success = $stmt->execute(array("%$q%"));
        if (!$success) {
            var_dump($stmt->errorInfo());
            return false;
        } else {
            return $stmt->fetchAll();
        }
    }
    
    // Retrieves and returns all data about the single movie that is represented by the id passed as a parameter
    public function getMovieById($id) {
        $sql = 'select * from movies where movie_id = ?';
        $stmt = $this->conn->prepare($sql);
        $success = $stmt->execute(array($id));
        if (!$success) {
            var_dump($stmt->errorInfo());
            return false;
        } else {
            return $stmt->fetch();
        }
    }
}
?>