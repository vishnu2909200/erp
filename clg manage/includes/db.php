<?php
// db.php

// Function to establish database connection
function connectDB()
{
    try {
        $db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
}

// Function to execute a SELECT query and fetch multiple rows
function selectQuery($query, $params = [])
{
    $db = connectDB();
    $stmt = $db->prepare($query);
    $stmt->execute($params);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $results;
}

// Function to execute an INSERT, UPDATE, or DELETE query
function executeQuery($query, $params = [])
{
    $db = connectDB();
    $stmt = $db->prepare($query);
    return $stmt->execute($params);
}

