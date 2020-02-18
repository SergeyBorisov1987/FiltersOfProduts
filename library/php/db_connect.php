<?php
error_reporting(E_ALL);
ini_set('display_startup_errors', 1);
ini_set('display_errors', '1');

$host = 'localhost';
$db   = 'pinta4';
$dbUsername = 'root';
$dbPassword = 'root';
$charset = 'utf8';

$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $dbUsername, $dbPassword);
    } catch (PDOException $e) {
        die('Подключение не удалось: ' . $e->getMessage());
    }