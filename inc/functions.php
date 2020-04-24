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