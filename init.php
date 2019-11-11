<?php

spl_autoload_register(function ($class) {
    $path = __DIR__ . "/app/" . $class . '.php';
    
    if (file_exists($path)) {
        require_once $path;
    }
});

$domen = 'https://student-list.000webhostapp.com/';
$host = "localhost";
$username = "id11500210_ururu2909root";
$password = 'Fenedi07';

try {
    $pdo = new PDO("mysql:host=$host; dbname=id11500210_studentlistdb", $username, $password);
} catch (PDOException $e) {
    echo "Ошибка соединения: " . $e->getMessage();
    exit;
}

$StudentService = new StudentService($pdo);
$student = isset($_COOKIE['user']) ? $StudentService->getStudentById($_COOKIE['user']) : false;
$linker = new Linker($domen);