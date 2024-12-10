<?php
$dsn = 'mysql:host=localhost;dbname=btth01_cse485';
$username = 'root';
$password = '';

try {
    $conn = new PDO($dsn, $username, $password);
    
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}
?>
