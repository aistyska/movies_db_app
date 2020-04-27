<?php

function connectDB() {
    global $host, $db, $username, $password, $options;
    try {
        $conn = new PDO("mysql:host=$host;dbname=$db", $username, $password, $options);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
    return $conn;
}


function createCategory($cat_name) {
    $connection = connectDB();
    try {
        if ($connection) {
            $query = "INSERT INTO categories (category) VALUES (:genre)";
            $statement = $connection->prepare($query);
            $statement->bindParam(':genre', $cat_name, PDO::PARAM_STR);
            $statement->execute();
            header('Location:?p=categories_control');
        }
    } catch (PDOException $e) {
        echo 'Create category query failed: ' . $e->getMessage();
    }
    $connection = null;  // close a connection
}


function getAllCategories() {
    $connection = connectDB();
    $results = [];
    try {
        if($connection) {
            $query = "SELECT * FROM categories";
            $statement = $connection->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $connection = null;
    return $results;
}


function getCategory($cat_name){
    $connection = connectDB();
    $result = [];
    try {
        if ($connection) {
            $query = "SELECT * FROM categories WHERE category = :genre";
            $statement = $connection->prepare($query);
            $statement->bindParam(':genre', $cat_name, PDO::PARAM_STR);
            $statement->execute();
            $result = $statement->fetch();
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $connection = null;
    return $result;
}


function deleteCategory($id) {
    $connection = connectDB();
    try {
        if ($connection) {
            $query = "DELETE FROM categories WHERE id = :cat_id";
            $statement = $connection->prepare($query);
            $statement->bindParam(':cat_id', $id, PDO::PARAM_INT);
            $statement->execute();
            header('Location:?p=categories_control');
        }
    } catch (PDOException $e) {
        echo 'Delete category query failed: ' . $e->getMessage();
    }
    $connection = null;
}


function createMovie($movie) {
    $connection = connectDB();
    try {
        if ($connection) {
            $query = "INSERT into movies (title, about, year, director, imdb, cat_id) VALUES (:title, :about, :year, :director, :imdb, :cat_id)";
            $statement = $connection->prepare($query);
            $statement->bindParam(':title', $movie['title'], PDO::PARAM_STR);
            $statement->bindParam(':about', $movie['about'], PDO::PARAM_STR);
            $statement->bindParam(':year', $movie['year'], PDO::PARAM_INT);
            $statement->bindParam(':director', $movie['director'], PDO::PARAM_STR);
            $statement->bindParam(':imdb', $movie['imdb'], PDO::PARAM_STR);
            $statement->bindParam(':cat_id', $movie['cat_id'], PDO::PARAM_INT);
            $statement->execute();
            header('Location:?p=movies_control');
        }
    } catch (PDOException $e) {
        echo 'Create movie query failed: ' . $e->getMessage();
    }
    $connection = null;
}


function getAllMovies() {
    $connection = connectDB();
    $results = [];
    try {
        if ($connection) {
            $query = "SELECT movies.*, categories.category FROM movies JOIN categories ON movies.cat_id = categories.id";
            $statement = $connection->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $connection = null;
    return $results;
}


function getMovieByTitle($movie_title) {
    $connection = connectDB();
    $result = [];
    try {
        if ($connection) {
            $query = "SELECT * FROM movies WHERE title = :title";
            $statement = $connection->prepare($query);
            $statement->bindParam(':title', $movie_title, PDO::PARAM_STR);
            $statement->execute();
            $result = $statement->fetch();
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $connection = null;
    return $result;
}


function getMovieById($movie_id) {
    $connection = connectDB();
    $result = [];
    try {
        if ($connection) {
            $query = "SELECT movies.id, title, about, year, director, imdb, categories.category
                FROM movies
                JOIN categories ON movies.cat_id = categories.id
                WHERE movies.id = :id";
            $statement = $connection->prepare($query);
            $statement->bindParam(':id', $movie_id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetch();
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $connection = null;
    return $result;
}


function updateMovie($movie) {
    $connection = connectDB();
    try {
        if ($connection) {
            $query = "UPDATE movies SET title = :title, about = :about, year = :year, director = :director, imdb = :imdb, cat_id = :cat_id WHERE id = :id";
            $statement = $connection->prepare($query);
            $statement->bindParam(':title', $movie['title'], PDO::PARAM_STR);
            $statement->bindParam(':about', $movie['about'], PDO::PARAM_STR);
            $statement->bindParam(':year', $movie['year'], PDO::PARAM_INT);
            $statement->bindParam(':director', $movie['director'], PDO::PARAM_STR);
            $statement->bindParam(':imdb', $movie['imdb'], PDO::PARAM_STR);
            $statement->bindParam(':cat_id', $movie['cat_id'], PDO::PARAM_INT);
            $statement->bindParam(':id', $movie['id'], PDO::PARAM_INT);
            $statement->execute();
            header('Location:?p=movies_control');
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $connection = null;
}


function deleteMovie($movie_id) {
    $connection = connectDB();
    try {
        if($connection){
            $query = "DELETE FROM movies WHERE id = :id";
            $statement = $connection->prepare($query);
            $statement->bindParam(':id', $movie_id, PDO::PARAM_INT);
            $statement->execute();
            header('Location:?p=movies_control');
        }
    } catch (PDOException $e) {
        echo 'Delete movie query failed: ' . $e->getMessage();
    }
    $connection = null;
}


function validateAddMovieForm() {
    $validationErrors = [];

    if (empty($_POST['title'])) {
        $validationErrors['title'] = "Įveskite filmo pavadinimą";
    } elseif (strlen($_POST['title']) > 250) {
        $validationErrors['title'] = "Filmo pavadinimas yra per ilgas, įveskite trumpesnį";
    }
    if (!preg_match('/^([a-zA-ZąĄčČęĘėĖįĮšŠųŲūŪžŽ]+ ?)+$/', $_POST['director'])) {
        if (empty($_POST['director'])) {
            $validationErrors['director'] = "Įveskite režisierių";
        } else {
            $validationErrors['director'] = "Režisieriaus vardas ir pavardė turi būti sudaryta iš raidžių bei tarpų";
        }
    } elseif (strlen($_POST['director']) > 250) {
        $validationErrors['director'] = "Įveskite trumpesnį režisieriaus vardą ar pavardę";
    }
    if (empty($_POST['category'])) {
        $validationErrors['category'] = "Pasirinkite filmo žanrą";
    }
    if (!preg_match('/^\d{4}$/', $_POST['year'])) {
        $validationErrors['year'] = "Įveskite tik filmo išleidimo metus";
    }
    if ($_POST['year'] < 1878) {
        $validationErrors['year'] = "Teigiama, kad pirmas filmas buvo nufilmuotas 1878 metais. Įveskite arba pasitikrinkite jau įvestus filmo išleidimo metus";
    }
    if (!preg_match('/^(10([.,]0)?|\d([.,]\d)?)$/', $_POST['imdb'])) {
        $validationErrors['imdb'] = "Įveskite IMDB reitingą (nuo 0.0 iki 10.0)";
    }
    if (empty($_POST['about'])) {
        $validationErrors['about'] = "Įveskite filmo aprašymą";
    } elseif (strlen($_POST['about']) > 1000) {
        $validationErrors['about'] = "Sutrumpinkite filmo aprašymą";
    }
    return $validationErrors;
}
