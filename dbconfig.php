<?php
// Include configuration file 
require_once 'config.php';

// Create database connection 
try {
    //code...
    $db = new \PDO(
        "mysql:dbname=" . DB_NAME . ";host=" . DB_HOST,
        DB_USERNAME,
        DB_PASSWORD,
        [\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']
    );
    
} catch (Exception $e) {
    //throw $th;    
    die("Connection failed: " . $e->getMessage());
}
