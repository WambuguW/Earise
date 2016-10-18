<?php
$dsn = 'mysql:dbname=esacco_main;host=localhost';
$user = 'root';
$password = '';

try {
    $dbhs = new PDO($dsn, $user, $password);
    
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
  
