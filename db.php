<?php
$host = 'localhost';
$dbname = 'crud-frutas';
$username = 'root';
$password = '';

try {
    $pdo = new PDO ("mysql:host=$host; dbname=$dbname;charset=utf8", $username, $password);
    $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOExpetion $e) {
    echo 'Erro ao conectar ao banco de dados: '
    . $e->getMessage ();
    exit;
}