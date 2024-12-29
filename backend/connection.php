<?php


$dsn = "mysql:host=localhost;dbname=nalum";
$dbusername = "root";
$dbpassword = "";

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "connection to database failed. Contact admin. Error-" . $e->getMessage();
    echo "Some error occurred. Retry or Contact Administrator";
    header("location:servererror.php");
    exit();
}
